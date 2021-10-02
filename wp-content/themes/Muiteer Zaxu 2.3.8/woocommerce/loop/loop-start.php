<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( !defined('ABSPATH') ) {
	exit;
}
?>

<section class="product-content-container">
	<?php
		muiteer_product_category("desktop");
		muiteer_product_category("mobile");
	?>
	<section class="product-list-container">
		<?php if ( is_shop() || is_product_category() || is_product_tag() ): ?>
			<header class="product-list-header">
				<?php if ( is_product_category() ): ?>
					<!-- Category page -->
					<h2 class="title"><?php echo esc_html__('Category', 'muiteer'); ?>: <?php single_cat_title(); ?></h2>
				<?php elseif ( is_product_tag() ) : ?>
					<!-- Tag page -->
					<h2 class="title"><?php echo esc_html__('Tag', 'muiteer'); ?>: <?php single_tag_title(); ?></h2>
				<?php elseif ( is_shop() ) : ?>
					<!-- Shop page -->
					<h2 class="title" data-original-title="<?php echo esc_html__('All Products', 'muiteer'); ?>" data-category-title="<?php echo esc_html__('Category', 'muiteer'); ?>: "><?php echo esc_html__('All Products', 'muiteer'); ?></h2>
				<?php endif; ?>
			</header>
		<?php endif; ?>
		<div class="product-grid" data-columns="<?php echo get_theme_mod('muiteer_product_cols', 'auto'); ?>">