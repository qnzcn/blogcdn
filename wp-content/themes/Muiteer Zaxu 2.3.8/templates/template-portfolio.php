<?php
/**
 * Template Name: Portfolio
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Muiteer
 */

// Portfolio
$portfolio_cols = get_theme_mod('muiteer_portfolio_cols', 'auto');
$portfolio_browse_mode = get_theme_mod('muiteer_portfolio_browse_mode', 'overlay');

get_header(); ?>
	<?php
		// Portfolio filter
		$args = array(
			'post_type' => 'portfolio',
		);
		$all_posts = new WP_Query($args);
		
		if ( $all_posts->have_posts() ) {
			if (get_theme_mod('muiteer_portfolio_filter', 'text') === 'text') {
				muiteer_post_filter('portfolio', 'text');
			}
			if ( get_theme_mod('muiteer_portfolio_filter', 'text' ) === 'thumbnail') {
				muiteer_post_filter('portfolio', 'thumbnail');
			}
			wp_reset_postdata();
		}
	?>

	<div class="portfolio-grid" data-browse-mode="<?php echo $portfolio_browse_mode; ?>" data-columns="<?php echo $portfolio_cols; ?>"> 
		<?php
			// Get post quantity
			if (get_theme_mod('muiteer_portfolio_per_page') === "") {
				$posts_per_page = get_option('posts_per_page');
			} else {
				$posts_per_page = get_theme_mod('muiteer_portfolio_per_page');
			}

			$args = array(
				'post_type' => 'portfolio',
				'paged' => get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1),
				'posts_per_page' => $posts_per_page,
				'post_status' => 'publish',
				'suppress_filters' => false,
			);
			
			$all_posts = new WP_Query($args);

			if ( $all_posts->have_posts() ) {
				while ( $all_posts->have_posts() ) : $all_posts->the_post();
					get_template_part('template-parts/content', 'portfolio');
				endwhile; 
				wp_reset_query();
			} else {
				get_template_part('template-parts/content', 'none');
			}
		?>
	</div>

	<?php muiteer_posts_navigation($all_posts); ?>
<?php get_footer();
