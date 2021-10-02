<?php
/**
 * Muiteer rating functions
 *
 * @since 2.0.8
*/

if ( !defined('ABSPATH') ) exit;
if ( !function_exists('thumbs_rating_scripts') ):
	function thumbs_rating_scripts() {
		wp_enqueue_script('thumbs_rating_scripts', get_template_directory_uri() . '/inc/rating/assets/js/rating.js', array('jquery'), '4.0.1');
		wp_localize_script( 'thumbs_rating_scripts', 'thumbs_rating_ajax', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('rating-nonce')
		) );
	}
	add_action('wp_footer', 'thumbs_rating_scripts');
endif;

if ( !function_exists('thumbs_rating_getlink') ):
	function thumbs_rating_getlink($post_ID = '', $type_of_vote = '') {
		$thumb_up_icon = muiteer_icon('thumb_up', 'icon');
		$thumb_down_icon = muiteer_icon('thumb_down', 'icon');

		$post_ID = intval(sanitize_text_field($post_ID) );
		$type_of_vote = intval( sanitize_text_field($type_of_vote) );

		$thumbs_rating_link = "";

		if($post_ID == '') $post_ID = get_the_ID();

		$thumbs_rating_up_count = get_post_meta($post_ID, '_thumbs_rating_up', true) != '' ? get_post_meta($post_ID, '_thumbs_rating_up', true) : '0';
		$thumbs_rating_down_count = get_post_meta($post_ID, '_thumbs_rating_down', true) != '' ? get_post_meta($post_ID, '_thumbs_rating_down', true) : '0';

		$link_up = '
			<a href="javascript:void(0);" class="button button-primary button-round button-small rating-like'. ( (isset($thumbs_rating_up_count) && intval($thumbs_rating_up_count) > 0 ) ? ' rating-voted' : '' ) .'" data-post-id="' . $post_ID . '" data-type="1">' . $thumb_up_icon . '<span class="badge">' . $thumbs_rating_up_count . '</span></a>
		';
		$link_down = '
			<a href="javascript:void(0);" class="button button-primary button-round button-small rating-dislike'. ( (isset($thumbs_rating_down_count) && intval($thumbs_rating_down_count) > 0 ) ? ' rating-voted' : '' ) .'" data-post-id="' . $post_ID . '" data-type="2">' . $thumb_down_icon . '<span class="badge">' . $thumbs_rating_down_count . '</span></a>
		';

		$thumbs_rating_link = '
			<section class="rating-container" id="rating-'.$post_ID.'" data-content-id="'.$post_ID.'">
		';
		
		global $post;
		if ($post->post_type == 'portfolio') {
			if (get_theme_mod('muiteer_portfolio_rating') == 'all') {
				$thumbs_rating_link .= $link_up;
				$thumbs_rating_link .= $link_down;
			} elseif (get_theme_mod('muiteer_portfolio_rating') =='like') {
				$thumbs_rating_link .= $link_up;
			} elseif (get_theme_mod('muiteer_portfolio_rating') =='dislike') {
				$thumbs_rating_link .= $link_down;
			} elseif (get_theme_mod('muiteer_portfolio_rating') == '') {
				$thumbs_rating_link .= $link_up;
				$thumbs_rating_link .= $link_down;
			}
		} elseif ($post->post_type == 'post') {
			if (get_theme_mod('muiteer_post_rating') == 'all') {
				$thumbs_rating_link .= $link_up;
				$thumbs_rating_link .= $link_down;
			} elseif (get_theme_mod('muiteer_post_rating') == 'like') {
				$thumbs_rating_link .= $link_up;
			} elseif (get_theme_mod('muiteer_post_rating') == 'dislike') {
				$thumbs_rating_link .= $link_down;
			} elseif (get_theme_mod('muiteer_post_rating') == '') {
				$thumbs_rating_link .= $link_up;
				$thumbs_rating_link .= $link_down;
			}
		}
		$thumbs_rating_link .= '</section>';
		return $thumbs_rating_link;
	}
endif;

if ( !function_exists('thumbs_rating_add_vote_callback') ):
	function thumbs_rating_add_vote_callback() {
		check_ajax_referer('rating-nonce', 'nonce');
		global $wpdb;
		$post_ID = intval( $_POST['postid'] );
		$type_of_vote = intval( $_POST['type'] );

		if ($type_of_vote == 1) {
			$meta_name = "_thumbs_rating_up";

		} elseif ($type_of_vote == 2) {
			$meta_name = "_thumbs_rating_down";
		}
		$thumbs_rating_count = get_post_meta($post_ID, $meta_name, true) != '' ? get_post_meta($post_ID, $meta_name, true) : '0';
		$thumbs_rating_count = $thumbs_rating_count + 1;

		update_post_meta($post_ID, $meta_name, $thumbs_rating_count);

		$results = thumbs_rating_getlink($post_ID, $type_of_vote);

		die($results);
	}
	add_action('wp_ajax_thumbs_rating_add_vote', 'thumbs_rating_add_vote_callback');
	add_action('wp_ajax_nopriv_thumbs_rating_add_vote', 'thumbs_rating_add_vote_callback');
endif;

if ( !function_exists('thumbs_rating_columns') ):
	//Post
	function thumbs_rating_post_columns($columns) {
		if (get_theme_mod('muiteer_post_rating') == 'all') {
		    return array_merge($columns,
		    	array(
		    		'thumbs_rating_up_count' =>  esc_html__('Like', 'muiteer'),
		    		'thumbs_rating_down_count' => esc_html__('Dislike', 'muiteer')
		    	)
		    );
		} elseif (get_theme_mod('muiteer_post_rating') == 'like') {
			return array_merge($columns,
		    	array(
		    		'thumbs_rating_up_count' => esc_html__('Like', 'muiteer')
		    	)
		    );
		} elseif (get_theme_mod('muiteer_post_rating') == 'dislike') {
			return array_merge($columns,
		    	array(
		    		'thumbs_rating_down_count' => esc_html__('Dislike', 'muiteer')
		    	)
		    );
		} elseif (get_theme_mod('muiteer_post_rating') == '') {
			return array_merge($columns,
		    	array(
		    		'thumbs_rating_up_count' => esc_html__('Like', 'muiteer'),
		    		'thumbs_rating_down_count' => esc_html__('Dislike', 'muiteer')
		    	)
		    );
		}
	}

	if (get_theme_mod('muiteer_post_rating') != 'disabled') {
		add_filter('manage_post_posts_columns', 'thumbs_rating_post_columns');
	}

	//Portfolio
	function thumbs_rating_portfolio_columns($columns) {
	    if (get_theme_mod('muiteer_portfolio_rating') == 'all') {
		    return array_merge($columns,
		    	array(
		    		'thumbs_rating_up_count' => esc_html__('Like', 'muiteer'),
		    		'thumbs_rating_down_count' => esc_html__('Dislike', 'muiteer')
		    	)
		    );
		} elseif (get_theme_mod('muiteer_portfolio_rating') == 'like') {
			return array_merge($columns,
		    	array(
		    		'thumbs_rating_up_count' => esc_html__('Like', 'muiteer')
		    	)
		    );
		} elseif (get_theme_mod('muiteer_portfolio_rating') == 'dislike') {
			return array_merge($columns,
		    	array(
		    		'thumbs_rating_down_count' => esc_html__('Dislike', 'muiteer')
		    	)
		    );
		} elseif (get_theme_mod('muiteer_portfolio_rating') == '') {
			return array_merge($columns,
		    	array(
		    		'thumbs_rating_up_count' => esc_html__('Like', 'muiteer'),
		    		'thumbs_rating_down_count' => esc_html__('Dislike', 'muiteer')
		    	)
		    );
		}
	}
	if (get_theme_mod('muiteer_portfolio_rating') != 'disabled') {
		add_filter('manage_portfolio_posts_columns', 'thumbs_rating_portfolio_columns');
	}
endif;

if ( !function_exists('thumbs_rating_column_values') ):
	function thumbs_rating_column_values($column, $post_id) {
	    switch ($column) {
		case 'thumbs_rating_up_count' :
		   	echo get_post_meta($post_id, '_thumbs_rating_up', true) != '' ? get_post_meta($post_id, '_thumbs_rating_up', true) : '0';
		   break;

		case 'thumbs_rating_down_count' :
		      echo get_post_meta($post_id, '_thumbs_rating_down', true) != '' ? get_post_meta($post_id, '_thumbs_rating_down', true) : '0';
		    break;
	    }
	}
	add_action('manage_posts_custom_column', 'thumbs_rating_column_values', 10, 2);
	add_action('manage_pages_custom_column', 'thumbs_rating_column_values', 10, 2);
endif;

if ( !function_exists('thumbs_rating_sortable_columns') ):
	function thumbs_rating_sortable_columns($columns) {
		$columns['thumbs_rating_up_count'] = 'thumbs_rating_up_count';
		$columns['thumbs_rating_down_count'] = 'thumbs_rating_down_count';
		return $columns;
	}
	add_action('admin_init', 'thumbs_rating_sort_all_public_post_types');
	function thumbs_rating_sort_all_public_post_types() {
		foreach (get_post_types(array('public' => true), 'names') as $post_type_name) {
			add_action('manage_edit-' . $post_type_name . '_sortable_columns', 'thumbs_rating_sortable_columns');
		}
		add_filter('request', 'thumbs_rating_column_sort_orderby');
	}
	function thumbs_rating_column_sort_orderby($vars) {
		if ( isset($vars['orderby'] ) && 'thumbs_rating_up_count' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				'meta_key' => '_thumbs_rating_up',
				'orderby' => 'meta_value_num'
			) );
		}
		if ( isset( $vars['orderby'] ) && 'thumbs_rating_down_count' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				'meta_key' => '_thumbs_rating_down',
				'orderby' => 'meta_value_num'
			) );
		}
		return $vars;
	}
endif;

if ( !function_exists('thumbs_rating_show_up_votes') ):
	function thumbs_rating_show_up_votes($post_id = "") {
	   if ($post_id == "") {
	   	$post_id = get_the_ID();
	   } else {
	   	$post_id = intval( sanitize_text_field($post_id) );
	   }
	   return get_post_meta($post_id, '_thumbs_rating_up', true) != '' ? get_post_meta($post_id, '_thumbs_rating_up', true) : '0';
	}
endif;

if ( !function_exists('thumbs_rating_show_down_votes') ):
	function thumbs_rating_show_down_votes ($post_id = "") {
	   if ($post_id == "") {
	   	$post_id = get_the_ID();
	   } else {
		$post_id = intval( sanitize_text_field($post_id) );
	   }
	   return get_post_meta($post_id, '_thumbs_rating_down', true) != '' ? get_post_meta($post_id, '_thumbs_rating_down', true) : '0';
	}
endif;

if ( !function_exists('thumbs_rating_top_func') ):
	function thumbs_rating_top_func($atts) {
		$return = '';
		extract( shortcode_atts(array(
			'exclude_posts' => '',
			'type' => 'positive',
			'posts_per_page' => 5,
			'category' => '',
			'show_votes' => 'yes',
			'post_type' => 'any',
			'show_both' => 'no',
			'order' => 'DESC',
			'orderby' => 'meta_value_num'
		), $atts) );
		if ($type == 'positive') {
			$meta_key = '_thumbs_rating_up';
			$other_meta_key = '_thumbs_rating_down';
			$sign = "+";
			$other_sign = "-";
		} else {
			$meta_key = '_thumbs_rating_down';
			$other_meta_key = '_thumbs_rating_up';
			$sign = "-";
			$other_sign = "+";
		}
	    $args = array (
			'post__not_in' => explode(",", $exclude_posts),
	    	'post_type' => $post_type,
			'post_status' => 'publish',
			'cat' => $category,
			'pagination' => false,
			'posts_per_page' => $posts_per_page,
			'cache_results' => true,
			'meta_key' => $meta_key,
			'order'	 => $order,
			'orderby' => $orderby,
			'ignore_sticky_posts' => true
		);
		$thumbs_ratings_top_query = new WP_Query($args);
		if ( $thumbs_ratings_top_query->have_posts() ) :
			$return .= '<ol class="rating-top-list">';
			while ( $thumbs_ratings_top_query->have_posts() ) {
				$thumbs_ratings_top_query->the_post();
				$return .= '<li>';
				$return .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
				if ($show_votes == "yes") {
					$meta_values = get_post_meta(get_the_ID(), $meta_key);
						$return .= ' (' . $sign;
						if (sizeof($meta_values) > 0) {
							$return .= $meta_values[0];
						} else {
							$return .= "0";
						}
						if ($show_both == 'yes') {
							$other_meta_values = get_post_meta(get_the_ID(), $other_meta_key);
							$return .= " " . $other_sign;
							if (sizeof($other_meta_values) > 0) {
								$return .= $other_meta_values[0];
							} else {
								$return .= "0";
							}
						}
						$return .= ')';
					}
				}
				$return .= '</li>';
			$return .= '</ol>';
			wp_reset_postdata();
		endif;
		return $return;
	}
	add_shortcode('thumbs_rating_top', 'thumbs_rating_top_func');
endif;

function thumbs_rating_shortcode_func($att) {
	$return = thumbs_rating_getlink();
	return $return;
}
add_shortcode('rating-buttons', 'thumbs_rating_shortcode_func');
