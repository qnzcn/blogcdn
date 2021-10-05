<?php

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'yprm_woocommerce_template_loop_product_thumbnail', 10);

/**
 * WooCommerce Loop Product Thumbs
 **/

if (!function_exists('yprm_woocommerce_template_loop_product_thumbnail')) {
  function yprm_woocommerce_template_loop_product_thumbnail() {
    echo yprm_woocommerce_get_product_thumbnail();
  }
}

/**
 * WooCommerce Product Thumbnail
 **/

if (!function_exists('yprm_woocommerce_get_product_thumbnail')) {

  function yprm_woocommerce_get_product_thumbnail($size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0) {
    global $post, $woocommerce, $product, $woocommerce_loop;
    if (!$placeholder_width) {
      $placeholder_width = wc_get_image_size('shop_catalog')['width'];
    }

    if (!$placeholder_height) {
      $placeholder_height = wc_get_image_size('shop_catalog')['height'];
    }

    $class = implode(' ', array_filter(array(
      'button',
      'product_type_' . $product->get_type(),
      $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
      $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : '',
    )));

    $thumb_size = 'shop_catalog';

    if((isset($woocommerce_loop['type']) && $woocommerce_loop['type'] == 'masonry') || !isset($woocommerce_loop['type']) && yprm_get_theme_setting('shop_type') == 'masonry') {
      $thumb_size = 'medium';
    }

    $output = '<div class="image">';
    $output .= apply_filters('woocommerce_loop_add_to_cart_link',
      sprintf('<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s"><span>%s</span></a>',
        esc_url($product->add_to_cart_url()),
        esc_attr(isset($quantity) ? $quantity : 1),
        esc_attr($product->get_id()),
        esc_attr($product->get_sku()),
        esc_attr($class),
        esc_html($product->add_to_cart_text())
      ),
      $product);

    $output .= '<a href="' . get_the_permalink() . '">';
    if (has_post_thumbnail()) {
      
      $output .= get_the_post_thumbnail($post->ID, $thumb_size);
      if ($attachment_ids = $product->get_gallery_image_ids() && $thumb_size != 'medium') {
        if (isset($attachment_ids[1])) {
          $output .= wp_get_attachment_image($attachment_ids[1], $thumb_size, '', array('class' => 'show'));
        }
      }

    } else {

      $output .= '<img src="' . wc_placeholder_img_src() . '" alt="Placeholder" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';

    }

    $output .= '</a></div>';

    return $output;
  }
}

/**
 * WooCommerce Single Meta
 **/
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'yprm_woocommerce_template_single_meta_remove_category', 5);

function yprm_woocommerce_template_single_meta_remove_category() {

  global $post, $product;

  ?>
	<div class="product_meta">

	  <?php do_action('woocommerce_product_meta_start'); ?>

	  <?php if (wc_product_sku_enabled() && $product->get_sku() && ($product->get_sku() || $product->is_type('variable'))): ?>

	    <span class="sku_wrapper"><?php _e('SKU:', 'novo'); ?> <span class="sku" itemprop="sku"><?php echo ($sku = $product->get_sku()) ? $sku : __('---', 'novo'); ?></span></span>

	  <?php endif; ?>


	  <?php do_action('woocommerce_product_meta_end'); ?>

	</div>

<?php }

function yprm_related_products_limit() {
  global $product;
  $orderby = '';
  $columns = 4;
  $related = $product->get_related(4);
  $args = array(
    'post_type' => 'product',
    'no_found_rows' => 1,
    'posts_per_page' => 4,
    'ignore_sticky_posts' => 1,
    'orderby' => $orderby,
    'post__in' => $related,
    'post__not_in' => array($product->get_id()),
  );
  return $args;
}
add_filter('woocommerce_related_products_args', 'yprm_related_products_limit');

/**
 * The order of the blocks
 **/

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments) {
  global $woocommerce;

  ob_start();
  ?>
	<div class="header-minicart woocommerce header-minicart-novo">
		<?php $count = $woocommerce->cart->cart_contents_count;
  if ($count == 0) { ?>
		<div class="hm-cunt"><i class="basic-ui-icon-shopping-cart"></i><span><?php echo esc_html($count) ?></span></div>
		<?php } else { ?>
		<a class="hm-cunt" href="<?php echo esc_url(wc_get_cart_url()) ?>"><i class="basic-ui-icon-shopping-cart"></i><span><?php echo esc_html($count) ?></span></a>
		<?php } ?>
		<div class="minicart-wrap">
			<?php woocommerce_mini_cart(); ?>
		</div>
	</div>
	<?php
$fragments['.header-minicart-novo'] = ob_get_clean();

  return $fragments;
}

add_filter('jpeg_quality', 'yprm_filter_theme_image_full_quality');
add_filter('wp_editor_set_quality', 'yprm_filter_theme_image_full_quality');

function yprm_filter_theme_image_full_quality($quality) {
  return 100;
}