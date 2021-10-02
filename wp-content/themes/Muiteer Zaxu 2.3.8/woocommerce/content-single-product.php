<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<section class="single-product-content-container entry-content">
		<section class="muiteer-slider-gallery-container">
			<?php
				// Get product gallery ratio start
					$product_image_ratio = get_theme_mod('muiteer_product_preview_image_ratio', '1_1');
				// Get product gallery ratio end
			?>
			<gallery data-autoplay="0" data-height="<?php echo $product_image_ratio; ?>">
				<ul class="swiper-wrapper">
					<?php
						// Get slide image start
							global $product;
							$lazy_load = get_theme_mod('muiteer_site_lazy_loading', 'enabled');
							$galleries = $product -> get_gallery_attachment_ids();
							$product_image = get_post_thumbnail_id($product -> ID);

							if ($galleries) {
								// Has product gallery
								foreach($galleries as $gallery) {
									$gallery_large = wp_get_attachment_image_src($gallery, 'large');
									$gallery_full = wp_get_attachment_image_src($gallery, 'full');
									echo '
										<li class="swiper-slide">
											<figure>
									';
									if ($lazy_load == "enabled") {
										echo '
											<a href="' . $gallery_full[0] . '">
												<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . $gallery_large[0] . '" data-width="' . $gallery_large[1] . '" data-height="' . $gallery_large[2] . '" alt="' . get_the_title() . '" class="swiper-lazy" />
												<div class="swiper-lazy-preloader"></div>
											</a>
										';
									} else {
										echo '
											<a href="' . $gallery_full[0] . '">
												<img src="' . $gallery_large[0] . '" data-width="' . $gallery_large[1] . '" data-height="' . $gallery_large[2] . '" alt="' . get_the_title() . '" />
											</a>
										';
									};
									echo '
											</figure>
										</li>
									';
								};
							} else if ($product_image) {
								// Has product image
								$product_image_large =  wp_get_attachment_image_src( get_post_thumbnail_id($product -> ID), "large" );
								$product_image_full =  wp_get_attachment_image_src( get_post_thumbnail_id($product -> ID), "full" );
								echo '
									<li class="swiper-slide">
										<figure>
								';
								if ($lazy_load == "enabled") {
									echo '
										<a href="' . $product_image_full[0] . '">
											<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . $product_image_large[0] . '" data-width="' . $product_image_large[1] . '" data-height="' . $product_image_large[2] . '" alt="' . get_the_title() . '" class="swiper-lazy" />
											<div class="swiper-lazy-preloader"></div>
										</a>
									';
								} else {
									echo '
										<a href="' . $product_image_full[0] . '">
											<img src="' . $product_image_large[0] . '" data-width="' . $product_image_large[1] . '" data-height="' . $product_image_large[2] . '" alt="' . get_the_title() . '" />
										</a>
									';
								};
								echo '
										</figure>
									</li>
								';
							} else {
								// No product image & no product gallery
								$default_product_image = get_template_directory_uri() . '/assets/img/default-post-thumbnail@2x.jpg';
								echo '
									<li class="swiper-slide">
										<figure>
								';
								if ($lazy_load == "enabled") {
									echo '
										<a href="' . $default_product_image . '">
											<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . $default_product_image . '" data-width="1920" data-height="1080" alt="' . get_the_title() . '" class="swiper-lazy" />
											<div class="swiper-lazy-preloader"></div>
										</a>
									';
								} else {
									echo '
										<a href="' . $default_product_image . '">
											<img src="' . $default_product_image . '" data-width="1920" data-height="1080" alt="' . get_the_title() . '" />
										</a>
									';
								};
								echo '
										</figure>
									</li>
								';
							};
						// Get slide image end
					?>
				</ul>
				<div class="swiper-button-next background-blur"></div>
				<div class="swiper-button-prev background-blur"></div>
				<div class="swiper-pagination"></div>
			</gallery>
		</section>

		<section class="summary entry-summary-container">
			<h1 class="product-title"><?php echo get_the_title(); ?></h1>
			<?php
				do_action('woocommerce_single_product_summary');
				// Product accordion content start
					if ( get_the_excerpt() || $product -> has_attributes() || $product -> has_dimensions() || $product -> has_weight() ) {
						echo '
							<section class="muiteer-accordion-container">
								<div class="muiteer-accordion-list">
						';

						// Product short description start
							if ( get_the_excerpt() ) {
								echo '
									<div class="muiteer-accordion-item active short-desc">
										<header>
											<h3>' . esc_html__('Product Short Description', 'muiteer') . '</h3>
											<span class="icon"></span>
										</header>
										<div class="muiteer-accordion-content" style="display: block;">
											<div class="muiteer-accordion-body">
								';
								the_excerpt();
								echo '
											</div>
										</div>
									</div>
								';
							}
						// Product short description end

						// Product additional information start
							if ( $product -> has_attributes() || $product -> has_dimensions() || $product -> has_weight() ) {
								echo '
									<div class="muiteer-accordion-item active additional-info">
										<header>
											<h3>' . esc_html__('Additional Information', 'muiteer') . '</h3>
											<span class="icon"></span>
										</header>
										<div class="muiteer-accordion-content" style="display: block;">
											<div class="muiteer-accordion-body">
								';
								$product -> list_attributes();
								echo '
											</div>
										</div>
									</div>
								';
							}
						// Product additional information end

						echo '
								</div>
							</section>
						';
					}
				// Product accordion content end
			?>
		</section>
	</section>

	<section class="product-details-container">
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</section>
	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action('woocommerce_after_single_product_summary');
	?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>
