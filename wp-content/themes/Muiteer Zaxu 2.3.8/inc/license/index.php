<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head>
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
			echo '<meta name="version" content="'. wp_get_theme()->get('Version') .'" />',
			     '<meta name="theme-parent" content="'. wp_get_theme()->get('Name') .'" />',
			     '<meta name="theme-child" content="N/A" />';
		} else {
			echo '<meta name="version" content="'. wp_get_theme()->parent()->get('Version') .'" />',
			     '<meta name="theme-parent" content="'. wp_get_theme()->parent()->get('Name').'" />',
				 '<meta name="theme-child" content="'. wp_get_theme()->get('Name') .'" />';
		};
	?>
	<meta name="muiteer-license" content="Unverified" />
	<meta name="author" content="Muiteer, mail@muiteer.com" />
	<meta name="designer" content="Muiteer" />
	<meta name="copyright" content="© Muiteer" />
	<meta name="keywords" content="<?php bloginfo('name'); ?>">
	<?php muiteer_set_license_description(); ?>
	<?php muiteer_head_icon(); ?>
	<title><?php bloginfo('name'); ?> &#8212; <?php muiteer_set_license_title() ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/inc/license/assets/css/license.css?v=1.0.1'; ?>">
</head>
<body>
	<div class="license-main-wrapper">
		<div class="license-main-box">
			<h1><?php echo esc_html__('Sorry', 'muiteer'); ?></h1>
			<h2><?php muiteer_set_license_tips(); ?></h2>
		</div>
	</div>
	<footer>
		<div class="license-footer-wrapper">
			<?php muiteer_footer_information(); ?>
		</div>
	</footer>
	<?php
		if (get_theme_mod('muiteer_google_analytics') != '') {
			echo "
				<script type='text/javascript'>
					(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				      ga('create', '" . get_theme_mod('muiteer_google_analytics') . "', 'auto');
				      ga('send', 'pageview');
				</script>
			";
		}
	?>
</body>
</html>