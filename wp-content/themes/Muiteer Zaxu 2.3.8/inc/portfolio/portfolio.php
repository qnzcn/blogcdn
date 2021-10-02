<?php
	add_action('init', 'portfolio_init', 0);
	add_theme_support('post-thumbnails', array('portfolio', 'gallery') );
	add_action('restrict_manage_posts', 'add_taxonomy_filters');
	add_action('right_now_content_table_end', 'add_portfolio_counts');

	function portfolio_init() {
		/**
		 * Enable the Portfolio custom post type
		 * http://codex.wordpress.org/Function_Reference/register_post_type
		 */
		$labels = array(
			'name' => __('Portfolio', 'muiteer'),
			'singular_name' => __('Portfolio Item', 'muiteer'),
			'add_new' => __('Add New Item', 'muiteer'),
			'add_new_item' => __('Add New Portfolio Item', 'muiteer'),
			'edit_item' => __('Edit Portfolio Item', 'muiteer'),
			'new_item' => __('Add New Portfolio Item', 'muiteer'),
			'view_item' => __('View Item', 'muiteer'),
			'search_items' => __('Search Portfolio', 'muiteer'),
			'not_found' => __('No portfolio items found', 'muiteer'),
			'not_found_in_trash' => __('No portfolio items found in trash', 'muiteer')
		);
		
		$args = array(
			'labels' => $labels,
			'public' => true,
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'author', 'custom-fields', 'revisions'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "portfolio"), // Permalinks format
			'menu_position' => 5,
			'menu_icon' => 'dashicons-portfolio',
			'has_archive' => true,
			'show_in_rest' => true,
		);
		$args = apply_filters('muiteer_args', $args);
		register_post_type('portfolio', $args);
		
		/**
		 * Register a taxonomy for Portfolio Tags
		 * http://codex.wordpress.org/Function_Reference/register_taxonomy
		 */
		$taxonomy_portfolio_tag_labels = array(
			'name' => __('Portfolio Tags', 'muiteer'),
			'singular_name' => __('Portfolio Tag', 'muiteer'),
			'search_items' => __('Search Portfolio Tags', 'muiteer'),
			'popular_items' => __('Popular Portfolio Tags', 'muiteer'),
			'all_items' => __('All Portfolio Tags', 'muiteer'),
			'parent_item' => __('Parent Portfolio Tag', 'muiteer'),
			'parent_item_colon' => __('Parent Portfolio Tag:', 'muiteer'),
			'edit_item' => __('Edit Portfolio Tag', 'muiteer'),
			'update_item' => __('Update Portfolio Tag', 'muiteer'),
			'add_new_item' => __('Add New Portfolio Tag', 'muiteer'),
			'new_item_name' => __('New Portfolio Tag Name', 'muiteer'),
			'separate_items_with_commas' => __('Separate portfolio tags with commas', 'muiteer'),
			'add_or_remove_items' => __('Add or remove portfolio tags', 'muiteer'),
			'choose_from_most_used' => __('Choose from the most used portfolio tags', 'muiteer'),
			'menu_name' => __('Portfolio Tags', 'muiteer')
		);
		
		$taxonomy_portfolio_tag_args = array(
			'labels' => $taxonomy_portfolio_tag_labels,
			'public' => true,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'show_tagcloud' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'portfolio_tag'),
			'show_admin_column' => true,
			'query_var' => true,
			'show_in_rest' => true,
		);
		
		register_taxonomy('portfolio_tag', array('portfolio'), $taxonomy_portfolio_tag_args);
		
		/**
		 * Register a taxonomy for Portfolio Categories
		 * http://codex.wordpress.org/Function_Reference/register_taxonomy
		 */
		$taxonomy_portfolio_category_labels = array(
			'name' => __('Portfolio Categories', 'muiteer'),
			'singular_name' => __('Portfolio Category', 'muiteer'),
			'search_items' => __('Search Portfolio Categories', 'muiteer'),
			'popular_items' => __('Popular Portfolio Categories', 'muiteer'),
			'all_items' => __('All Portfolio Categories', 'muiteer'),
			'parent_item' => __('Parent Portfolio Category', 'muiteer'),
			'parent_item_colon' => __('Parent Portfolio Category:', 'muiteer'),
			'edit_item' => __('Edit Portfolio Category', 'muiteer'),
			'update_item' => __('Update Portfolio Category', 'muiteer'),
			'add_new_item' => __('Add New Portfolio Category', 'muiteer'),
			'new_item_name' => __('New Portfolio Category Name', 'muiteer'),
			'separate_items_with_commas' => __('Separate portfolio categories with commas', 'muiteer'),
			'add_or_remove_items' => __('Add or remove portfolio categories', 'muiteer' ),
			'choose_from_most_used' => __('Choose from the most used portfolio categories', 'muiteer'),
			'menu_name' => __('Portfolio Categories', 'muiteer'),
		);
		
		$taxonomy_portfolio_category_args = array(
			'labels' => $taxonomy_portfolio_category_labels,
			'public' => true,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_tagcloud' => true,
			'hierarchical' => true,
			'rewrite' => array('slug' => 'portfolio_category'),
			'query_var' => true,
			'show_in_rest' => true,
		);
		register_taxonomy('portfolio_category', array('portfolio'), $taxonomy_portfolio_category_args);
		
	}

	/**
	 * Adds taxonomy filters to the portfolio admin page
	 * Code artfully lifed from http://pippinsplugins.com
	 */
	function add_taxonomy_filters() {
		global $typenow;
		$taxonomies = array('portfolio_category');
		if ($typenow == 'portfolio') {
			foreach ($taxonomies as $tax_slug) {
				$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
				$tax_obj = get_taxonomy( $tax_slug );
				$tax_name = $tax_obj->labels->name;
				$terms = get_terms($tax_slug);
				if ( count( $terms ) > 0) {
					echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
					echo "<option value=''>$tax_name</option>";
					foreach ( $terms as $term ) {
						echo '<option value=' . $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count . ')</option>';
					}
					echo "</select>";
				}
			}
		}
	}

	/**
	 * Add Portfolio count to "Right Now" Dashboard Widget
	 */
	function add_portfolio_counts() {
		if ( !post_type_exists('portfolio') ) {
			return;
		}
		$num_posts = wp_count_posts('portfolio');
		$num = number_format_i18n($num_posts->publish);
		$text = _n( 'Portfolio Item', 'Portfolio Items', intval($num_posts->publish) );
		if ( current_user_can('edit_posts') ) {
			$num = "<a href='edit.php?post_type=portfolio'>$num</a>";
			$text = "<a href='edit.php?post_type=portfolio'>$text</a>";
		}
		echo '<td class="first b b-portfolio">' . $num . '</td>';
		echo '<td class="t portfolio">' . $text . '</td>';
		echo '</tr>';
		if ($num_posts->pending > 0) {
			$num = number_format_i18n($num_posts->pending);
			$text = _n( 'Portfolio Item Pending', 'Portfolio Items Pending', intval($num_posts->pending) );
			if ( current_user_can('edit_posts') ) {
				$num = "<a href='edit.php?post_status=pending&post_type=portfolio'>$num</a>";
				$text = "<a href='edit.php?post_status=pending&post_type=portfolio'>$text</a>";
			}
			echo '<td class="first b b-portfolio">' . $num . '</td>';
			echo '<td class="t portfolio">' . $text . '</td>';
			echo '</tr>';
		}
	}
?>