<?php
/**
 * Template Name: Friendly Link
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Muiteer
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>">
			<div class="entry-content page-content">
				<?php
					the_content();
					muiteer_friendly_link($post->ID, "all", "-1");
				?>
			</div>
		</article>
	<?php endwhile; ?>	
<?php get_footer();
