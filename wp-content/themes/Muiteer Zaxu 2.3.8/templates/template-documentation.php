<?php
/**
 * Template Name: Documentation
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Muiteer
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>">
			<div class="entry-content page-content">
				<?php the_content(); ?>

				<?php
					if (get_theme_mod('muiteer_dashboard_doc_type', 'disabled') == 'enabled') {
						$defaults = array(
							'include' => 'any',
							'exclude' => '',
							'items' => 10
						);
				
						$args = wp_parse_args($args, $defaults);
						$arranged = array();
				
						$parent_args = array(
							'post_type' => 'docs',
							'parent' => 0,
							'sort_column' => 'menu_order'
						);
				
						if ( 'any' != $args['include'] ) {
							$parent_args['include'] = $args['include'];
						}
				
						if ( !empty( $args['exclude'] ) ) {
							$parent_args['exclude'] = $args['exclude'];
						}
				
						$parent_docs = get_pages($parent_args);

						foreach ($parent_docs as $root) {
							$sections = get_children( array(
								'post_parent' => $root->ID,
								'post_type' => 'docs',
								'post_status' => 'publish',
								'orderby' => 'menu_order',
								'order' => 'ASC',
								'posts_per_page' => (int) $args['items'],
								'suppress_filters' => false,
							) );
			
							$arranged[] = array(
								'doc' => $root,
								'sections' => $sections
							);
						}
					}
				?>

				<?php if ($arranged && get_theme_mod('muiteer_dashboard_doc_type', 'disabled') == 'enabled') : ?>
					<div class="muiteerdocs-shortcode-wrap">
						<ul class="muiteerdocs-docs-list">
							<?php foreach ($arranged as $main_doc) : ?>
								<li class="muiteerdocs-docs-single">
									<h3><a href="<?php echo get_permalink($main_doc['doc']->ID); ?>"><?php echo $main_doc['doc']->post_title; ?></a></h3>
									<?php if ( $main_doc['sections'] ) : ?>
										<div class="inside">
											<ul class="muiteerdocs-doc-sections">
												<?php foreach ($main_doc['sections'] as $section) : ?>
													<li><a href="<?php echo get_permalink($section->ID); ?>"><?php echo $section->post_title; ?></a></li>
												<?php endforeach; ?>
											</ul>
										</div>
									<?php endif; ?>
									<div class="muiteerdocs-doc-link">
										<a href="<?php echo get_permalink($main_doc['doc']->ID); ?>"><?php echo __("View Details", "muiteer"); ?></a>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
				
			</div>
		</article>
	<?php endwhile; ?>	
<?php get_footer();