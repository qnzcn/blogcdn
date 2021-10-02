<?php
/**
 * Template part for displaying minimal article list in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Muiteer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('related-article'); ?> itemscope itemtype="http://schema.org/Article">
	<?php muiteer_minimal_article(); ?>
</article>
