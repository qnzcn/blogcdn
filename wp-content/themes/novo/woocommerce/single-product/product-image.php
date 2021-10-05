<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     4.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
?>
<div class="images popup-gallery">
	<?php if ( $product->is_on_sale() ) : ?>

		<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale', 'novo' ) . '</span>', $post, $product ); ?>

	<?php endif; ?>
	<?php
		if ( has_post_thumbnail() ) {
			$attachment_count = count( $product->get_gallery_image_ids() );
			$gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
			$props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
			$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
			) );
			$thumb = get_post_meta( $post->ID, '_thumbnail_id', true );
			$image_array = wp_get_attachment_image_src( $thumb , 'full' );
			if(function_exists('get_field') && get_field('product_video_url') && class_exists('VideoUrlParser')) {
				echo '<div class="product-image"><a href="#" data-type="video" data-size="960x640" data-video="<div class=&quot;wrapper&quot;><div class=&quot;video-wrapper&quot;><iframe class=&quot;pswp__video&quot; width=&quot;1920&quot; height=&quot;1080&quot; src=&quot;'.VideoUrlParser::get_url_embed(get_field('product_video_url')).'&amp;controls=0&amp;showinfo=0&quot; frameborder=&quot;0&quot; allowfullscreen></iframe></div></div>" style="background-image: url('.VideoUrlParser::get_cover(get_field('product_video_url')).');"><i class="music-and-multimedia-play-button"></i></a></div>';
			} else {
				echo '<div class="">';
					echo apply_filters(
						'woocommerce_single_product_image_html',
						sprintf(
							'<a href="%s" itemprop="image" class="woocommerce-main-image" title="%s" data-size="%s">%s</a>',
							esc_url( $props['url'] ),
							esc_attr( $props['caption'] ),
							esc_attr( $image_array[1].'x'.$image_array[2] ),
							$image
						),
						$post->ID
					);
				echo '</div>';
			}
		} else {
			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'novo' ) ), $post->ID );
		}

		do_action( 'woocommerce_product_thumbnails' );
	?>
</div>
