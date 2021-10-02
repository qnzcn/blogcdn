<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

muiteer_no_item_tips( esc_html__('Your cart is currently empty.', 'muiteer') );

if (wc_get_page_id( 'shop' ) > 0) : ?>
	<p class="return-to-shop">
		<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop') ) ); ?>" class="button button-primary wc-backward ajax-link">
			<?php esc_html_e('Return to shop', 'woocommerce'); ?>
		</a>
	</p>
<?php endif; ?>
