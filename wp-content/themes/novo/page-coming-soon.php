<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Novo
 */

/*
Template Name: Coming soon page
*/

get_header(); 
$id = uniqid('countdown-');

if(get_field('date')) {
	$year = mysql2date('Y', get_field('date'));
	$month = mysql2date('m', get_field('date'))-1;
	$day = mysql2date('j', get_field('date'));
	$hour = mysql2date('H', get_field('date'));
	$minutes = mysql2date('i', get_field('date'));

	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.js' );
	wp_enqueue_script( 'novo-script', get_template_directory_uri() . '/js/scripts.js' );

	wp_add_inline_script('novo-script', "jQuery(document).ready(function(jQuery) {
	  	/*------------------------------------------------------------------
		[ Coming soon countdown ]
		*/

		var ts = new Date(".$year.", ".$month.", ".$day.", ".$hour.", ".$minutes.");

		if(jQuery('.".esc_html($id)."').length > 0){
			jQuery('.".esc_html($id)."').countdown({
				timestamp	: ts,
				days_h		: '".esc_html__('Days', 'novo')."',
				hours_h		: '".esc_html__('Hours', 'novo')."',
				minutes_h	: '".esc_html__('Minutes', 'novo')."',
				seconds_h	: '".esc_html__('Seconds', 'novo')."',
			});
		}
	});");
}

$bg = '';

if(function_exists('yprm_get_image')) {
  $bg = yprm_get_image(yprm_get_theme_setting('coming_soon_bg')['media']['id'], 'bg');
}
?>

<section class="main-row">
	<div class="container-fluid no-padding">
		<!-- Banner -->
		<div class="banner-area external-indent">
			<div class="banner-social-buttons">
			    <div class="links">
			    	<?php if(yprm_get_theme_setting('social_buttons_content')) { ?>
						<?php echo yprm_get_theme_setting('social_buttons_content') ?>
					<?php } ?>
			    </div>
			</div>
			<div class="banner banner-coming-soon white">
				<div class="item tac" style="<?php echo esc_attr($bg) ?>">
				<div class="container">
					<div class="cell middle">
						<?php if(get_field('date')) { ?>
							<div id="countdown" class="<?php echo esc_attr($id) ?> medium"></div>
						<?php } if(!empty(yprm_get_theme_setting('coming_soon_heading'))) { ?>
							<h1 class="b-coming-heading"><?php echo wp_kses_post(yprm_get_theme_setting('coming_soon_heading')) ?></h1>
						<?php } if(yprm_get_theme_setting('coming_soon_subscribe_code')) { ?>
							<p><?php echo wp_kses_post(yprm_get_theme_setting('coming_soon_subscribe_desc')) ?></p>
							<div class="tac"><?php echo do_shortcode(yprm_get_theme_setting('coming_soon_subscribe_code')) ?></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- END Banner -->
	</div>
</section>
<?php get_footer('empty');
