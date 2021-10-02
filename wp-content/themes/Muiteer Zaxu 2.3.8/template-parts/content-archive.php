<?php
/**
 * Template part for displaying results in archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Muiteer
 */

?>

<article id="post-<?php the_ID(); ?>" class="related-article" itemscope itemtype="http://schema.org/Article">
	<?php muiteer_minimal_article(); ?>
</article>
