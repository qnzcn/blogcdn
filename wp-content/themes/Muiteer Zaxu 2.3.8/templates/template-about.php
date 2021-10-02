<?php
/**
 * Template Name: About
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
					muiteer_brand_wall($post->ID);
					the_content();
				?>
			</div>
		</article>
	<?php endwhile; ?>	
<?php get_footer();
