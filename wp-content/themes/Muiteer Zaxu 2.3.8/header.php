<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Muiteer
 */

?>

<!DOCTYPE html>
<!--[if lt IE 10]> <html <?php language_attributes(); ?> class="old-ie-browser<?php echo (get_theme_mod('muiteer_site_grayscale') == "enabled") ? ' grayscale' : ''; ?>" xmlns="//www.w3.org/1999/xhtml"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" <?php echo (get_theme_mod('muiteer_site_grayscale') == "enabled") ? 'class="grayscale"' : ''; ?>> <!--<![endif]-->
<head id="head">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
	<meta http-equiv="Access-Control-Allow-Origin" content="*">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="applicable-device" content="pc, mobile">
	<meta name="renderer" content="webkit">
	<meta name="MobileOptimized" content="320">
	<meta name="msapplication-tap-highlight" content="no" />
	<?php
		if ( get_template_directory() === get_stylesheet_directory() ) {
			echo '<meta name="version" content="' . wp_get_theme()->get('Version') . '" />',
			     '<meta name="theme-parent" content="' . wp_get_theme()->get('Name') . '" />',
			     '<meta name="theme-child" content="N/A" />';
		} else {
			echo '<meta name="version" content="' . wp_get_theme()->parent()->get('Version') . '" />',
			     '<meta name="theme-parent" content="' . wp_get_theme()->parent()->get('Name') . '" />',
				 '<meta name="theme-child" content="' . wp_get_theme()->get('Name') . '" />';
		};
	?>
	<meta name="author" content="Muiteer, mail@muiteer.com" />
	<meta name="designer" content="Muiteer" />
	<meta name="copyright" content="© Muiteer" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php
		muiteer_screen_client_support();
		wp_head();
		// WeChat JSSDK
		if (get_theme_mod('muiteer_wechat_js_sdk') == 'enabled') {
			muiteer_jssdk($post->ID);
		}
		// User select
		if (get_theme_mod('muiteer_site_user_select') == 'disabled') {
			$no_select = "no-select";
		}
	?>
</head>

<body id="body" <?php body_class( array($no_select) ); ?>>
	<?php
	   muiteer_screen_response_tips();
	   muiteer_global_navigation();
	?>
	<div id="site" class="header-content-wrapper">
		<div class="site-carry">
			<?php
				global $post;
				if ( isset($post) ) {
					muiteer_slide($post->ID);
				}
			?>
			<div id="content" class="site-content">
				<div id="primary" class="content-area wrapper">
					<main id="main" class="site-main">