<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Muiteer
 */

// Blog
$blog_style = get_theme_mod('muiteer_blog_style', 'grid');
$blog_cols = get_theme_mod('muiteer_blog_cols', 'auto');
$blog_browse_mode = get_theme_mod('muiteer_blog_browse_mode', 'overlay');

get_header(); ?>

	<?php if ($blog_style == 'minimal') : ?>
		<?php muiteer_recommend_post(); ?>
	<?php else : ?>

	<?php
		// Recommended post
		muiteer_recommend_post();
		
		// Blog filter
		if ( have_posts() ) {
			if (get_theme_mod('muiteer_blog_filter', 'text') === 'text') {
				muiteer_post_filter('post', 'text');
			}
			if (get_theme_mod('muiteer_blog_filter', 'text') === 'thumbnail') {
				muiteer_post_filter('post', 'thumbnail');
			}
			wp_reset_postdata();
		}
	?>

	<div class="blog portfolio-grid" data-browse-mode="<?php echo $blog_browse_mode; ?>" data-columns="<?php echo $blog_cols; ?>">

	<?php endif; ?>
		<?php
			// Get post quantity
			if (get_theme_mod('muiteer_blog_per_page') === "") {
				$posts_per_page = get_option('posts_per_page');
			} else {
				$posts_per_page = get_theme_mod('muiteer_blog_per_page');
			}

			$args = array(
				'post_type' => 'post',
				'paged' => ( get_query_var('paged') ) ? get_query_var('paged') : 1,
				'posts_per_page' => $posts_per_page,
				'post_status' => 'publish',
				'suppress_filters' => false,
			);

			$all_posts = new WP_Query($args);

			if ( $all_posts->have_posts() ) {
				while ( $all_posts->have_posts() ) : $all_posts->the_post();
					get_template_part('template-parts/content', $blog_style);
				endwhile; 
				wp_reset_query();
			} else {
				get_template_part('template-parts/content', 'none');
			}
		?>
	</div>
	<?php muiteer_posts_navigation(); ?>

<?php get_footer();
