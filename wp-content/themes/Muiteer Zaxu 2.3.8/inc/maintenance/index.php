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
	<meta name="author" content="Muiteer, mail@muiteer.com" />
	<meta name="designer" content="Muiteer" />
	<meta name="copyright" content="© Muiteer" />
	<meta name="keywords" content="<?php bloginfo('name'); ?>">
	<meta name="description" content="<?php echo esc_html__('The website is under maintenance, please try again later.', 'muiteer'); ?>">
	<?php muiteer_head_icon(); ?>
	<title><?php bloginfo('name'); ?> &#8212; <?php echo esc_html__('Coming Soon...', 'muiteer'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/inc/maintenance/assets/css/maintenance.css?v=1.0.1'; ?>">
	<script type="text/javascript" src="<?php echo includes_url(). 'js/jquery/jquery.js'; ?>"></script>
	<?php
		echo '
			<style type="text/css">
				html {
		';
		if ( get_theme_mod('muiteer_maintenance_background_color') ) {
			echo '
				background-color: ' . get_theme_mod('muiteer_maintenance_background_color') . ';
			';
		} else {
			echo '
				background-color: #f2f2f2;
			';
		}
		if ( get_theme_mod('muiteer_maintenance_text_color') ) {
			echo '
				color: ' . get_theme_mod('muiteer_maintenance_text_color') . ';
			';
		} else {
			echo '
				color: #333;
			';
		}
		echo '
			}
		';
		echo '
			footer a {
		';
		if ( get_theme_mod('muiteer_maintenance_text_color') ) {
			echo '
				color: ' . get_theme_mod('muiteer_maintenance_text_color') . ';
			';
		} else {
			echo '
				color: #333;
			';
		}
		echo '
			}
		';
		if ( get_theme_mod('muiteer_maintenance_background_image') ) {
			echo '
				.maintenance-background-image {
					background-image: url(' . get_theme_mod('muiteer_maintenance_background_image') . ');
				}

				.maintenance-background-image:after {
					background-color: rgba(' . muiteer_hex2RGB(get_theme_mod('muiteer_maintenance_background_color', '#f2f2f2'), true) . ', .6);
				}
			';
		}
		echo '
			</style>
		';
	?>
</head>
<body>
	<?php
		if (get_theme_mod('muiteer_maintenance_background_image') !== '') {
			echo '
				<section class="maintenance-background-image"></section>
			';
		}
	?>
	<section class="maintenance-main-wrapper">
		<div class="maintenance-main-box">
			<h1><?php echo esc_html__('Sorry', 'muiteer'); ?></h1>
			<h2><?php echo esc_html__('The website is under maintenance, please try again later.', 'muiteer'); ?></h2>
			<?php
				if (get_theme_mod('muiteer_maintenance_countdown_switch') == "enabled") {
					echo '
						<section class="countdown-container" data-deadline="' . date( "Y/m/d H:i:s", strtotime( get_theme_mod('muiteer_maintenance_countdown_launch_date') ) ) . '" data-current="' . date( "Y/m/d H:i:s", strtotime( current_time("mysql") ) ) . '">
							<h3 class="countdown-desc">' . esc_html__('The website will be launched on:', 'muiteer') . '</h3>
							<ul class="countdown-content">
								<li>
									<span class="digits days">00</span>
									<i>:</i>
									<span class="label">' . esc_html__('Days', 'muiteer') . '</span>
								</li>
								<li>
									<span class="digits hours">00</span>
									<i>:</i>
									<span class="label">' . esc_html__('Hours', 'muiteer') . '</span>
								</li>
								<li>
									<span class="digits minutes">00</span>
									<i>:</i>
									<span class="label">' . esc_html__('Minutes', 'muiteer') . '</span>
								</li>
								<li>
									<span class="digits seconds">00</span>
									<span class="label">' . esc_html__('Seconds', 'muiteer') . '</span>
								</li>
							</ul>
						</section>
					';
				};
			?>
		</div>
	</section>
	<footer>
		<div class="maintenance-footer-wrapper">
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
		};

		if (get_theme_mod('muiteer_maintenance_countdown_switch') == "enabled") {
			echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/inc/maintenance/assets/js/maintenance.js?v=1.0.1"></script>';
		};
	?>
</body>
</html>