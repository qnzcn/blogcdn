<?php
	/**
	 * The template for displaying search results pages.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
	 *
	 * @package Muiteer
	 */

	get_header();
?>

<header class="related-header">
	<h1><?php esc_html_e('Search', 'muiteer'); ?><span class="keyword"><?php the_search_query(); ?></span></h1>
</header>
<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			get_template_part('template-parts/content', 'search');
		endwhile;
		wp_reset_postdata();
		muiteer_posts_navigation();
	else :
		get_template_part('template-parts/content', 'none');
	endif;
?>
<?php get_footer();
