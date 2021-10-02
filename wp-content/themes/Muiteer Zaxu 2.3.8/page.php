<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
					muiteer_recent_post();
					// Get friendly link start
						if (muiteer_get_field('friendly_link_status') == 1) {
							if ( is_front_page() ) {
								// Get page id of friend link template
								$page_details = get_pages(
									array(
										'post_type' => 'page',
										'fields' => 'ids',
										'nopaging' => true,
										'hierarchical' => 0,
										'meta_key' => '_wp_page_template',
										'meta_value' => 'templates/template-link.php',
									)
								);
								foreach($page_details as $page) {
									$page_id = $page->ID;
								}
								$quantity = muiteer_get_field('friendly_link_quantity');
								muiteer_friendly_link($page_id, "slide", $quantity);
							}
						}
					// Get friendly link end
				?>
			</div>
		</article>
	<?php endwhile; ?>		
<?php get_footer();
