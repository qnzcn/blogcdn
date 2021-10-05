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
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     4.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

	$prev = get_permalink(get_adjacent_post(false,'',false));
	$next = get_permalink(get_adjacent_post(false,'',true));

?>
	<div class="prod-nav">
		<?php if(get_permalink() != $prev ) { ?>
		<a href="<?php echo esc_url($prev); ?>"><i class="base-icons-left-arrow-3"></i></a>
		<?php } ?>
		<?php if(get_permalink() != $next ) { ?>
		<a href="<?php echo esc_url($next); ?>"><i class="base-icons-right-arrow-3"></i></a>
		<?php } ?>
	</div>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<div class="heading-decor"><h1 class="h2">', '</h1></div>' ); ?>
	<div class="date"><?php the_date() ?></div>
	<div class="row">
    <div class="col-12 col-md-6">
      <?php
        /**
         * woocommerce_before_single_product_summary hook.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        do_action( 'woocommerce_before_single_product_summary' );
      ?>
    </div>
    <div class="col-12 col-md-6">
      <div class="summary entry-summary">

        <?php
          /**
           * woocommerce_single_product_summary hook.
           *
           * @hooked woocommerce_template_single_title - 5
           * @hooked woocommerce_template_single_rating - 10
           * @hooked woocommerce_template_single_price - 20
           * @hooked woocommerce_template_single_excerpt - 10
           * @hooked woocommerce_template_single_add_to_cart - 30
           * @hooked woocommerce_template_single_meta - 40
           * @hooked woocommerce_template_single_sharing - 50
           */
          do_action( 'woocommerce_single_product_summary' );
        ?>

      </div><!-- .summary -->
    </div>
	</div>
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
