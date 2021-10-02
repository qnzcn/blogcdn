<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Muiteer
 */

get_header(); ?>
<?php
	if ( have_posts() ) : ?>
		<?php muiteer_archive_title(); ?>
		<?php
			while ( have_posts() ) : the_post();
				get_template_part('template-parts/content', 'archive');
			endwhile;
			wp_reset_postdata();
			muiteer_posts_navigation();
			else :
				get_template_part('template-parts/content', 'none');
			endif;
		?>
<?php get_footer();
