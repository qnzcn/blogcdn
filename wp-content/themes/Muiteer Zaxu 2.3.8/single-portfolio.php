<?php
/**
 * The template for displaying all single portfolio types.
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
				</header>
				<div class="entry-content">
					<?php
						// Portfolio information start
						global $post;
						if (muiteer_get_field('portfolio_info_visibility', $post->ID) === true) {
							
							$client = muiteer_get_field('portfolio_info_client', $post->ID);
							$team = muiteer_get_field('portfolio_info_team', $post->ID);
							$type = muiteer_get_field('portfolio_info_type', $post->ID);
							$address = muiteer_get_field('portfolio_info_address', $post->ID);
							$date = muiteer_get_field('portfolio_info_date', $post->ID);
							$link = muiteer_get_field('portfolio_info_link', $post->ID);

							$counter = 0;
							while( have_rows('portfolio_info_repeater', $post->ID) ): the_row();
								$counter++;
								$title = get_sub_field('portfolio_title', $post->ID);
								$content = get_sub_field('portfolio_content', $post->ID);
							endwhile;

							if ( !empty($client) || !empty($team) || !empty($type) || !empty($address) || !empty($date) || !empty($link) || !empty($title) && !empty($content) ) {
								echo '
									<section class="portfolio-info-section">
										<ul role="rowgroup" class="portfolio-info-list">
								';

								// Client
								if ( !empty($client) ) {
									echo '
										<li role="role" class="portfolio-info-item">
											<div role="rowheader" class="portfolio-info-title">
												<h3>' . esc_html__('Client', 'muiteer') . '</h3>
											</div>
											<div role="cell gridcell" class="portfolio-info-content">
												<p>' . $client . '</p>
											</div>
										</li>
									';
								};

								// Team
								if ( !empty($team) ) {
									echo '
										<li role="role" class="portfolio-info-item">
											<div role="rowheader" class="portfolio-info-title">
												<h3>' . esc_html__('Team', 'muiteer') . '</h3>
											</div>
											<div role="cell gridcell" class="portfolio-info-content">
												<p>' . $team . '</p>
											</div>
										</li>
									';
								};

								// Type
								if ( !empty($type) ) {
									echo '
										<li role="role" class="portfolio-info-item">
											<div role="rowheader" class="portfolio-info-title">
												<h3>' . esc_html__('Type', 'muiteer') . '</h3>
											</div>
											<div role="cell gridcell" class="portfolio-info-content">
												<p>' . $type . '</p>
											</div>
										</li>
									';
								};

								// Address
								if ( !empty($address) ) {
									echo '
										<li role="role" class="portfolio-info-item">
											<div role="rowheader" class="portfolio-info-title">
												<h3>' . esc_html__('Address', 'muiteer') . '</h3>
											</div>
											<div role="cell gridcell" class="portfolio-info-content">
												<p>' . $address . '</p>
											</div>
										</li>
									';
								};

								// Date
								if ( !empty($date) ) {
									echo '
										<li role="role" class="portfolio-info-item">
											<div role="rowheader" class="portfolio-info-title">
												<h3>' . esc_html__('Date', 'muiteer') . '</h3>
											</div>
											<div role="cell gridcell" class="portfolio-info-content">
												<p>' . $date . '</p>
											</div>
										</li>
									';
								};

								// Link
								if ( !empty($link) ) {
									echo '
										<li role="role" class="portfolio-info-item">
											<div role="rowheader" class="portfolio-info-title">
												<h3>' . esc_html__('Link', 'muiteer') . '</h3>
											</div>
											<div role="cell gridcell" class="portfolio-info-content">
												<a href="' . $link . '" rel="nofollow" target="_blank" class="button button-primary button-small portfolio-info-link">' . esc_html__('Visit the Website', 'muiteer') . '</a>
											</div>
										</li>
									';
								};

								// Other information
								$counter = 0;
								while( have_rows('portfolio_info_repeater', $post->ID) ): the_row();
									$counter++;
									$title = get_sub_field('portfolio_title', $post->ID);
									$content = get_sub_field('portfolio_content', $post->ID);
									if ( !empty($title) && !empty($content) ) {
										echo '
											<li role="role" class="portfolio-info-item">
												<div role="rowheader" class="portfolio-info-title">
													<h3>' . $title . '</h3>
												</div>
												<div role="cell gridcell" class="portfolio-info-content">
													<p>' . $content . '</p>
												</div>
											</li>
										';
									};
								endwhile;

								echo '
										</ul>
									</section>
								';
							}
						}
						// Portfolio information end

						the_content();

						if ( !is_attachment() ) {
							if (get_theme_mod('muiteer_portfolio_rating') !== 'disabled') {
								echo thumbs_rating_getlink();
							}
						}
					?>
				</div>
				<?php muiteer_recommend_post_navigation("portfolio"); ?>
				<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
				<?php muiteer_quick_button(); ?>
			</article>
		<?php endif; ?>
<?php get_footer();
