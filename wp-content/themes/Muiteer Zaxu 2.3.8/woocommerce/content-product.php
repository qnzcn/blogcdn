<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty($product) || ! $product->is_visible() ) {
	return;
}
?>

<?php
	$product_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail')[0];
	if( empty($product_thumbnail) ) {
		$product_image = get_template_directory_uri() . '/assets/img/default-post-thumbnail.jpg';
		list($width, $height) = getimagesize(get_template_directory() . '/assets/img/default-post-thumbnail.jpg');
	} else {
		$product_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
		// Get image metadata
		$source = wp_get_attachment_metadata( get_post_thumbnail_id() );
		$width = $source['width'];
		$height = $source['height'];
	}

	$cover_ratio = get_theme_mod('muiteer_product_cover_ratio', 'responsive');
    if ($cover_ratio == "responsive") {
    	// Response
		$ratio = $width / $height;
	    $targetWidth = 100 / $ratio * $ratio;
	    $targetHeight = $targetWidth / $ratio;
    } else if ($cover_ratio == "1_1") {
    	// 1:1
    	$targetHeight = 100;
    	$ellipsis = " ellipsis";
    } else if ($cover_ratio == "4_3") {
    	// 4:3
    	$targetHeight = 66.667;
    	$ellipsis = " ellipsis";
    } else if ($cover_ratio == "16_9") {
    	// 16:9
    	$targetHeight = 56.215;
    	$ellipsis = " ellipsis";
    }
?>

<?php
	// Get category list
	$categories = wp_get_post_terms($product->get_id(), 'product_cat');
	$category_list = '';
	foreach($categories as $category) {
		$category_list_item = muiteer_strToHex($category -> name);
	}
?>

<article id="post-<?php echo get_the_ID(); ?>" class="<?php echo $category_list_item; ?> product-item-card">
	<div class="product-item-box">
		<a class="product-item-link ajax-link" href="<?php the_permalink(); ?>">
			<?php
				if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
					echo '
						<figure class="featured-image" style="padding-bottom: ' . $targetHeight. '%;" data-width="' . $width . '" data-height="' . $height . '">
							<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="muiteer-lazy-load' . ($product->get_stock_status() == "outofstock" ? ' out-of-stock' : null) . '" muiteer-data-src="' . $product_image . '" />
							' . ( $product->is_on_sale() ? '<span class="badge sale background-blur">' . esc_html__( 'Sale', 'muiteer' ) . '</span>' : null ) .
							( $product->get_stock_status() == "outofstock" ? '<span class="badge stock background-blur">' . esc_html__('Out of Stock', 'muiteer') . '</span>' : null ) .
							( $product->get_stock_status() == "onbackorder" ? '<span class="badge stock background-blur">' . esc_html__('On Backorder', 'muiteer') . '</span>' : null ) . '
						</figure>
					';
				} else {
					echo '
						<figure class="featured-image" style="padding-bottom: ' . $targetHeight. '%;" data-width="' . $width . '" data-height="' . $height . '">
							<img src="' . $product_image . '"' . ( $product->get_stock_status() == "outofstock" ? ' class="out-of-stock"' : null ) . ' />
							' . ( $product->is_on_sale() ? '<span class="badge sale background-blur">' . esc_html__( 'Sale', 'muiteer' ) . '</span>' : null ) .
							( $product->get_stock_status() == "outofstock" ? '<span class="badge stock background-blur">' . esc_html__('Out of Stock', 'muiteer') . '</span>' : null ) .
							( $product->get_stock_status() == "onbackorder" ? '<span class="badge stock background-blur">' . esc_html__('On Backorder', 'muiteer') . '</span>' : null ) . '
						</figure>
					';
				}
			?>
		</a>
		<header class="product-info">
			<h3 class="product-name<?php echo $ellipsis ?>"><?php echo get_the_title(); ?></h3>
			<div class="product-control">
				<?php wc_get_template('loop/price.php'); ?>
			</div>
		</header>
	</div>
</article>