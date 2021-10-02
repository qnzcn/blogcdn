<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Muiteer
 */

get_header(); ?>
		<?php if ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">
				<header class="entry-header">
					<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
					<div class="time">
						<time datetime="<?php the_time('c'); ?>" itemprop="datePublished">
							<?php the_time("Y-m-d"); ?>
						</time>
					</div>
				</header>
				<div class="entry-content">
					<?php
						the_content();

						// Tag start
							$post_tags = get_the_tags();
							if ($post_tags) {
								echo '<section class="post-tags">';
									foreach($post_tags as $tag) {
										echo '<a href="' . get_site_url() . '/?tag=' . $tag->slug . '" class="' . $tag->slug . ' ajax-link">' . $tag->name . '</a>';
									}
								echo '</section>';
							}
						// Tag end

						if ( !is_attachment() ) {
							if (get_theme_mod('muiteer_post_rating') !== 'disabled') {
								echo thumbs_rating_getlink();
							}
						}
					?>
				</div>
				<?php muiteer_recommend_post_navigation("blog"); ?>
				<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
				<?php muiteer_quick_button(); ?>
			</article>
		<?php endif; ?>
<?php get_footer();
