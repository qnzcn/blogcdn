<?php
if ( version_compare(get_bloginfo('version'), '4.4', '<') ) 
{
	wp_die( esc_html__('Please update your WordPress (Requires at least: WordPress 4.4)', 'muiteer') );
}
if ( version_compare(phpversion(), '5.6', '<') ) 
{
	wp_die( esc_html__('Please update your PHP (Requires at least: PHP 5.6)', 'muiteer') );
}
if ( !function_exists('muiteer_setup') ) : function muiteer_setup() 
{
	load_theme_textdomain('muiteer', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_post_type_support('page', 'excerpt');
	register_nav_menus( array( 'primary' => esc_html__('Primary', 'muiteer'), ) );
	if ( !muiteer_get_field('muiteer_sharing_disable', 'option') ) 
	{
		add_filter('wp_head', 'muiteer_social_meta');
	}
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );
}
endif;
add_action('after_setup_theme', 'muiteer_setup');
function muiteer_widgets_init() 
{
	register_sidebar( array( 'name' => esc_html__('Main sidebar', 'muiteer'), 'id' => 'sidebar-main', 'description' => esc_html__('Add your widgets here.', 'muiteer'), 'before_widget' => '<section id="%1$s" class="widget %2$s">', 'after_widget' => '</section>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>', ) );
}
add_action('widgets_init', 'muiteer_widgets_init');
function muiteer_scripts() 
{
	global $post;
	wp_enqueue_style('wp-mediaelement');
	wp_enqueue_style("muiteer-style-min", get_template_directory_uri() . "/assets/css/style.min.css");
	wp_enqueue_style( 'muiteer-style', get_stylesheet_uri() );
	wp_enqueue_script('muiteer-main-min', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), NULL, true);
	if (get_theme_mod('muiteer_wechat_js_sdk') == 'enabled') 
	{
		wp_enqueue_script( 'JSSDK', '//res.wx.qq.com/open/js/jweixin-1.6.0.js', array() );
	}
	wp_localize_script( 'muiteer-main-min', 'langObj', array( 'posted_comment' => esc_html__('Your comment was posted and it is awaiting moderation.', 'muiteer'), 'duplicate_comment' => esc_html__('Duplicate content detected. It seems that you\'ve posted this before.', 'muiteer'), 'posting_comment' => esc_html__('Posting your comment, please wait...', 'muiteer'), 'required_comment' => esc_html__('Please complete all the required fields.', 'muiteer'), 'woo_added_to_cart' => esc_html__('has been added to your cart.', 'muiteer'), 'input_file' => esc_html__('Choose File', 'muiteer'), ) );
	wp_localize_script( 'muiteer-main-min', 'mediaScripts', array( 'mediaelement' => esc_url(includes_url() . 'js/mediaelement/mediaelement-and-player.min.js'), 'wp_mediaelement' => esc_url(includes_url() . 'js/mediaelement/wp-mediaelement.min.js'), ) );
	if ( class_exists('WooCommerce') ) 
	{
		$wc_ajax = WC_AJAX::get_endpoint('%%endpoint%%');
	}
	;
	wp_localize_script( 'muiteer-main-min', 'themeSettings', array( 'ajax' => esc_attr( get_theme_mod('muiteer_site_ajax', 'enabled') ), 'ajaxurl' => admin_url('admin-ajax.php'), 'wc_ajax_url' => $wc_ajax, 'apply_coupon_nonce' => wp_create_nonce('apply-coupon'), 'remove_coupon_nonce' => wp_create_nonce('remove-coupon'), 'update_shipping_method_nonce' => wp_create_nonce('update-shipping-method'), 'muiteerdocs_nonce' => wp_create_nonce('muiteerdocs-ajax'), 'lazyLoading' => esc_attr( get_theme_mod('muiteer_site_lazy_loading', 'enabled') ), 'backgroundMusic' => get_theme_mod('muiteer_background_music'), 'l10n_openSearch' => esc_html__('Search', 'muiteer'), 'l10n_closeSearch' => esc_html__('Close', 'muiteer'), 'darkMode' => esc_attr( get_theme_mod('muiteer_dynamic_color', 'disabled') ) ) );
	wp_localize_script( 'muiteer-main-min', 'commentsPost', array( 'comments_post_url' => '/wp-comments-post.php', ) );
}
add_action('wp_enqueue_scripts', 'muiteer_scripts');
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/vendor/aq_resize.php';
require get_template_directory() . '/inc/functions/icons.php';
require get_template_directory() . '/inc/plugins/plugins.php';
require get_template_directory() . '/inc/customizer/customizer-reset/customizer-reset.php';
if (get_theme_mod('muiteer_maintenance_switch') == 'enabled') 
{
	require get_template_directory() . '/inc/maintenance/maintenance.php';
	function muiteer_maintenance_tips() 
	{
		if ( current_user_can('administrator') ): global $wp_admin_bar;
		$query['autofocus[section]'] = 'advanced_maintenance';
		$section_link = add_query_arg( $query, admin_url('customize.php') );
		$wp_admin_bar->add_menu( array( 'parent' => false, 'id' => 'muiteer_maintenance_tips', 'title' => '<span class="ab-icon"></span><span class="ab-label">' . __('Maintenance Active', 'muiteer') . '</span></span>', 'href' => $section_link, 'meta' => false ) );
		endif;
	}
	add_action('wp_before_admin_bar_render', 'muiteer_maintenance_tips', 1001);
}
require get_template_directory() . '/inc/vendor/class-php-ico.php';
require get_template_directory() . '/inc/functions/color-scheme.php';
require get_template_directory() . '/inc/functions/helpers.php';
if ( function_exists('is_woocommerce') ) 
{
	require get_template_directory() . '/inc/functions/woocommerce.php';
}
if (get_theme_mod('muiteer_dashboard_doc_type', 'disabled') == 'enabled') 
{
	require get_template_directory() . '/inc/documentation/documentation.php';
}
require get_template_directory() . '/inc/functions/wp-optimize.php';
if ( !function_exists('muiteer_mce_text_sizes') ) 
{
	function muiteer_mce_text_sizes($initArray) 
	{
		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px 40px 46px 52px";
		return $initArray;
	}
}
add_filter('tiny_mce_before_init', 'muiteer_mce_text_sizes');
if ( !function_exists('muiteer_mce_custom_styles') ) 
{
	function muiteer_mce_custom_styles($settings) 
	{
		$settings['theme_advanced_blockformats'] = 'p,h1,h2,h3,h4,h5';
		$style_formats = array( array('title' => 'Underlined heading', 'inline' => 'span', 'classes' => 'underlined-heading'), array('title' => 'Button', 'inline' => 'span', 'classes' => 'button'), array('title' => 'Cite', 'inline' => 'cite', 'classes' => '') );
		$settings['style_formats'] = json_encode($style_formats);
		return $settings;
	}
}
add_filter('tiny_mce_before_init', 'muiteer_mce_custom_styles');
if ( !function_exists('muiteer_mce_buttons') ) 
{
	function muiteer_mce_buttons($buttons) 
	{
		array_unshift($buttons, 'fontsizeselect');
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}
}
add_filter('mce_buttons_2', 'muiteer_mce_buttons');
function muiteer_mce_buttons_2($buttons) 
{
	$buttons[] = 'fontselect';
	$buttons[] = 'backcolor';
	$buttons[] = 'superscript';
	$buttons[] = 'subscript';
	$buttons[] = 'copy';
	$buttons[] = 'cut';
	return $buttons;
}
add_filter('mce_buttons_2', 'muiteer_mce_buttons_2');
function muiteer_admin_style() 
{
	wp_enqueue_style('admin-style', get_template_directory_uri() . '/assets/css/admin-style.min.css');
}
add_action('admin_enqueue_scripts', 'muiteer_admin_style');
function muiteer_get_field($field, $postid = null) 
{
	if ( function_exists('get_field') ) 
	{
		if ($postid !== null) return get_field($field, $postid);
		else return get_field($field);
	}
	else 
	{
		return null;
	}
}
if (get_theme_mod('muiteer_dashboard_acf_editor_menu', 'disabled') == 'disabled') 
{
	add_filter('acf/settings/show_admin', '__return_false');
}
require get_template_directory() . '/inc/acf/acf-config.php';
require get_template_directory() . '/inc/acf/acf-block.php';
function custom_acf_settings_localization($localization) 
{
	return true;
}
add_filter('acf/settings/l10n', 'custom_acf_settings_localization');
function custom_acf_settings_textdomain($domain) 
{
	return 'muiteer';
}
add_filter('acf/settings/l10n_textdomain', 'custom_acf_settings_textdomain');
function muiteer_remove_update_notifications($value) 
{
	if ( isset($value) && is_object($value) ) 
	{
		unset($value->response['advanced-custom-fields-pro/acf.php'] );
	}
	return $value;
}
add_filter('site_transient_update_plugins', 'muiteer_remove_update_notifications');
function muiteer_remove_acf_meta_box_for_posts_page() 
{
	global $post;
	$current_post_id = $post->ID;
	$posts_page_id = intval( get_option('page_for_posts') );
	if ( $current_post_id == $posts_page_id ) 
	{
		remove_meta_box('acf-group_5728563d5fa70', 'page', 'normal');
		remove_meta_box('acf-group_5bffc06672016', 'page', 'normal');
		remove_meta_box('acf-group_5b839b9fc8387', 'page', 'normal');
	}
}
add_action('acf/input/admin_head', 'muiteer_remove_acf_meta_box_for_posts_page');
function muiteer_remove_acf_meta_box_for_woocommerce_page() 
{
	global $post;
	$current_post_id = $post->ID;
	$shop_page_id = intval( get_option('woocommerce_shop_page_id') );
	$my_account_page_id = intval( get_option('woocommerce_myaccount_page_id') );
	$checkout_page_id = intval( get_option('woocommerce_checkout_page_id') );
	$cart_page_id = intval( get_option('woocommerce_cart_page_id') );
	if ( $current_post_id == $shop_page_id || $current_post_id == $my_account_page_id || $current_post_id == $checkout_page_id || $current_post_id == $cart_page_id ) 
	{
		remove_meta_box('acf-group_5728563d5fa70', 'page', 'normal');
		remove_meta_box('acf-group_5bffc06672016', 'page', 'normal');
		remove_meta_box('acf-group_5b839b9fc8387', 'page', 'normal');
	}
}
add_action('acf/input/admin_head', 'muiteer_remove_acf_meta_box_for_woocommerce_page');
function muiteer_waterfall_gallery_shortcode($attr, $content) 
{
	global $post;
	$post = get_post();
	static $instance = 0;
	$instance++;
	if ( !empty( $attr['ids'] ) ) 
	{
		if ( empty( $attr['orderby'] ) ) 
		{
			$attr['orderby'] = 'post__in';
		}
		;
		$attr['include'] = $attr['ids'];
	}
	;
	$html = apply_filters('post_gallery', '', $attr);
	if ($html != '') 
	{
		return $html;
	}
	;
	if ( isset( $attr['orderby'] ) ) 
	{
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] ) 
		{
			unset( $attr['orderby'] );
		}
		;
	}
	;
	extract( shortcode_atts(array( 'order' => 'ASC', 'orderby' => 'menu_order ID', 'id' => $post->ID, 'include' => '', 'exclude' => '', 'type' => 'thumbs', 'columns' => '3', 'link' => 'none', 'size' => 'full', 'css_class' => '' ), $attr) );
	$id = intval($id);
	if ('RAND' == $order) 
	{
		$orderby = 'none';
	}
	;
	if ( !empty($include) ) 
	{
		$_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
		$attachments = array();
		foreach ($_attachments as $key => $val) 
		{
			$attachments[$val->ID] = $_attachments[$key];
		}
	}
	else if ( !empty($exclude) ) 
	{
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	}
	else 
	{
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	}
	;
	if ( empty($attachments) ) 
	{
		return '';
	}
	;
	if ( is_feed() ) 
	{
		$html = "\n";
		foreach ($attachments as $att_id => $attachment) 
		{
			$html .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
		}
		return $html;
	}
	;
	$output = '';
	foreach ($attachments as $id => $attachment) 
	{
		$img_full = wp_get_attachment_image_src($id, "full", true, false);
		$img_large = wp_get_attachment_image_src($id, "large", true, false);
		$caption = get_post($id)->post_excerpt;
		$title = get_post($id)->post_title;
		$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
		$output .= '<li class="muiteer-waterfall-gallery-item">';
		$output .= '
					<figure>
						<a href="' . esc_url( $img_full[0] ) . '">
				';
		if ( get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") 
		{
			$output .= '
						<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" muiteer-data-src="' . esc_url( $img_large[0] ) . '" alt="' . esc_attr( $alt ) . '" data-width="' . $img_full[1] . '" data-height="' . $img_full[2] . '" class="muiteer-lazy-load" />
					';
		}
		else 
		{
			$output .= '
						<img src="' . esc_url( $img_large[0] ) . '" alt="' . esc_attr($alt) . '" data-width="' . $img_full[1] . '" data-height="' . $img_full[2] . '" />
					';
		}
		;
		if ( !empty($caption) ) 
		{
			$output .= '
							</a>
							<figcaption>' . esc_html($caption) . '</figcaption>
						</figure>
					';
		}
		else 
		{
			$output .= '
							</a>
						</figure>
					';
		}
		;
		$output .= '</li>';
	}
	$html = '
			<section class="muiteer-waterfall-gallery-container">
				<ul class="muiteer-waterfall-gallery-list responsive">' . $output . '</ul>
			</section>
		';
	return $html;
}
add_shortcode('gallery', 'muiteer_waterfall_gallery_shortcode');
class MuiteerPortfolio 
{
	function __construct() 
	{
		$current_theme = wp_get_theme();
		require get_template_directory() . '/inc/portfolio/portfolio.php';
		add_action( 'init', array(&$this, 'init') );
	}
	function init() 
	{
	}
}
new MuiteerPortfolio();
define('API_SECRET_KEY', '5a997f6fd3c857.51359078');
define('SERVER_URL', 'http://muiteer.com');
define('PRODUCT', 'Muiteer');

	function muiteer_cron_add_halfhourly($schedules) 
	{
		$schedules['halfhourly'] = array( 'interval' => 1800, 'display' => __('Once Halfhourly', 'muiteer') );
		return $schedules;
	}
	add_filter('cron_schedules', 'muiteer_cron_add_halfhourly');
	if ( !wp_next_scheduled('muiteer_check_license_task_hook') ) 
	{
		wp_schedule_event(time(), 'halfhourly', 'muiteer_check_license_task_hook');
	}
	add_action('muiteer_check_license_task_hook', 'muiteer_check_license_task_function');
	function muiteer_check_license_task_function() 
	{
		function muiteer_create_database_license() 
		{
			global $wpdb;
			$table_name = $wpdb->prefix . "muiteer_theme_status";
			$wpdb->query("DROP TABLE IF EXISTS " . $table_name);
			if ($wpdb->get_var("show tables like $table_name") != $table_name) 
			{
				$charset_collate = $wpdb->get_charset_collate();
				$sql = "CREATE TABLE " . $table_name . " (
									id mediumint(9) NOT NULL AUTO_INCREMENT,
									status text NOT NULL,
									name text NOT NULL,
									version text NOT NULL,
									details_url text NOT NULL,
									download_url text NOT NULL,
									time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
									PRIMARY KEY  (id)
								)$charset_collate;";
				require_once(ABSPATH . "wp-admin/includes/upgrade.php");
				dbDelta($sql);
			}
		}
		;
		muiteer_create_database_license();
		function muiteer_create_database_license_data() 
		{
			global $wpdb;
			$table_name = $wpdb->prefix . 'muiteer_theme_status';
			$license_key = trim( get_option('muiteer_license_key_data') );
			$api_params = array( 'slm_action' => 'slm_activate', 'secret_key' => API_SECRET_KEY, 'license_key' => $license_key, 'registered_domain' => $_SERVER['SERVER_NAME'], 'item_reference' => urlencode(PRODUCT), );
			$query = esc_url_raw( add_query_arg($api_params, SERVER_URL) );
			$response = wp_remote_get($query, array( 'timeout' => 20, 'sslverify' => false ) );
			if ( is_wp_error($response) ) 
			{
				return false;
			}
			$license_data = json_decode( wp_remote_retrieve_body($response) );
			if ($license_data->message == 'Your License key has expired') 
			{
				$status = "expired";
			}
			else if ($license_data->message == 'Your License key is blocked') 
			{
				$status = "blocked";
			}
			else if ($license_data->message == 'Invalid license key') 
			{
				$status = "invalid";
			}
			else 
			{
				$status = "success";
			}
			$response = wp_remote_get(SERVER_URL . '/wppus-update-api/' . '?action=get_metadata&package_id=' . strtolower(PRODUCT), array( 'timeout' => 20, 'sslverify' => false ) );
			if ( is_wp_error($response) ) 
			{
				return false;
			}
			$code = wp_remote_retrieve_response_code($response);
			$body = wp_remote_retrieve_body($response);
			if ( ($code == 200) && !empty($body) ) 
			{
				$update_server_data = json_decode($body);
				$server_theme_name = $update_server_data->name;
				$server_theme_version = $update_server_data->version;
				$server_theme_details_url = $update_server_data->details_url;
				$server_theme_download_url = $update_server_data->download_url;
			}
			$wpdb->insert( $table_name, array( 'status' => $status, 'name' => $server_theme_name, 'version' => $server_theme_version, 'details_url' => $server_theme_details_url, 'download_url' => base64_encode($server_theme_download_url), 'time' => current_time('mysql'), ) );
		}
		muiteer_create_database_license_data();
	}
	global $pagenow, $wpdb;
	$table_name = $wpdb->prefix . 'muiteer_theme_status';
	$results_status = $wpdb->get_var('SELECT * FROM ' . $table_name , 1, 0);
	if ($results_status == 'expired') 
	{
		function muiteer_admin_notice__error() 
		{
			$class = 'notice notice-error';
			$message = __('Sorry, Your theme is expired. Please contact the developer for renewal.', 'muiteer');
			printf('<div class="%1$s" style="color: #dc3232;"><p>%2$s</p><p><a href="mailto:mail@muiteer.com" class="button button-primary">' . __('Contact the Developer', 'muiteer') . '</a></p></div>', esc_attr($class), esc_html($message) );
		}
		add_action('admin_notices', 'muiteer_admin_notice__error');
		function muiteer_set_license_title() 
		{
			echo esc_html__('Sorry, Your theme is expired.', 'muiteer');
		}
		function muiteer_set_license_description() 
		{
			echo '<meta name="description" content="' . esc_html__('Sorry, Your theme is expired. Please contact the developer for renewal.', 'muiteer') . '" />';
		}
		function muiteer_set_license_tips() 
		{
			echo esc_html__('Sorry, Your theme is expired. Please contact the developer for renewal.', 'muiteer');
		}
		require get_template_directory() . '/inc/license/license.php';
	}
	else if ($results_status == 'blocked') 
	{
		function muiteer_admin_notice__error() 
		{
			$class = 'notice notice-error';
			$message = __('Sorry, Your theme is blocked. Please contact the developer for un-banned.', 'muiteer');
			printf('<div class="%1$s" style="color: #dc3232;"><p>%2$s</p><p><a href="mailto:mail@muiteer.com" class="button button-primary">' . __('Contact the Developer', 'muiteer') . '</a></p></div>', esc_attr($class), esc_html($message) );
		}
		add_action('admin_notices', 'muiteer_admin_notice__error');
		function muiteer_set_license_title() 
		{
			echo esc_html__('Sorry, Your theme is blocked.', 'muiteer');
		}
		function muiteer_set_license_description() 
		{
			echo '<meta name="description" content="' . esc_html__('Sorry, Your theme is blocked. Please contact the developer for un-banned.', 'muiteer') . '" />';
		}
		function muiteer_set_license_tips() 
		{
			echo esc_html__('Your theme is blocked. Please contact the developer for un-banned.', 'muiteer');
		}
		require get_template_directory() . '/inc/license/license.php';
}
	else if ($results_status == "success") 
	{
		function license_meta_info() 
		{
			echo '<meta name="muiteer-license" content="Verified" />';
		}
		add_action('wp_head', 'license_meta_info', 1);
		global $wpdb;
		$table_name = $wpdb->prefix . 'muiteer_theme_status';
		$results_name = $wpdb->get_var('SELECT * FROM ' . $table_name , 2, 0);
		$results_version = $wpdb->get_var('SELECT * FROM ' . $table_name , 3, 0);
		$results_details_url = $wpdb->get_var('SELECT * FROM ' . $table_name , 4, 0);
		$results_download_url = base64_decode( $wpdb->get_var('SELECT * FROM ' . $table_name , 5, 0) );
		if ( get_template_directory() === get_stylesheet_directory() ) 
		{
			$current_theme_version = wp_get_theme()->get('Version');
		}
		else 
		{
			$current_theme_version = wp_get_theme()->parent()->get('Version');
		}
		if ($current_theme_version < $results_version) 
		{
			function muiteer_force_theme_update($update) 
			{
				$update->response[ strtolower( $GLOBALS['results_name'] ) ] = array( 'theme' => $GLOBALS['results_name'], 'new_version' => $GLOBALS['results_version'], 'url' => $GLOBALS['results_details_url'], 'package' => $GLOBALS['results_download_url'], );
				return $update;
			}
			add_filter('site_transient_update_themes', 'muiteer_force_theme_update');
			function muiteer_theme_update_notice() 
			{
				$class = 'notice notice-info';
				$message = __('A new version of Muiteer Theme available. Before updating, please back up your database and files.', 'muiteer');
				printf('
									<div class="%1$s">
										<p>%2$s</p>
										<p>
											<a href="' . admin_url('themes.php?theme=' . strtolower($GLOBALS['results_name']) . '') . '" class="button button-primary">' . __('Update Now', 'muiteer') . '</a>
										</p>
									</div>
									', esc_attr($class), esc_html($message) );
			}
			if ( current_user_can('administrator') ) 
			{
				add_action('admin_notices', 'muiteer_theme_update_notice');
			}
		}
	}

if ( current_user_can('administrator') ) 
{
	add_action('admin_menu', 'muiteer_license_menu');
}
function muiteer_license_menu() 
{
	add_menu_page( __('Muiteer', 'muiteer'), __('Muiteer', 'muiteer'), 'administrator', 'muiteer', 'muiteer', 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M10.051,18.698L1,10.814l2.944-2.426V1.324l6.1,5.351l6.017-5.372v7.086L19,10.81L10.051,18.698z M3.575,10.849l6.47,5.635 l6.389-5.631l-2.038-1.68V5.021l-4.342,3.877L5.61,5v4.174L3.575,10.849z"/></svg>'), 3 );
	add_submenu_page( 'muiteer', __('Theme Options', 'muiteer'), __('Theme Options', 'muiteer'), 'administrator', 'muiteer', 'muiteer', 1 );
    add_submenu_page( 'muiteer', __('Help Center', 'muiteer'), __('Help Center', 'muiteer'), 'administrator', 'muiteer-help', 'muiteer_help', 3 );
	add_action('admin_init', 'muiteer_menu_redirect', 1);
	function muiteer_menu_redirect() 
	{
		if (isset($_GET['page']) && $_GET['page'] == 'muiteer') 
		{
			wp_redirect( admin_url('customize.php') );
			exit();
		}
		if (isset($_GET['page']) && $_GET['page'] == 'muiteer-help') 
		{
			wp_redirect("https://%77%77%77%2E%77%65%62%6D%69%6C%69%2E%63%6F%6D/", 302);
			exit();
		}
	}
}
;
function muiteer_license_management() 
{
	echo '<div class="wrap">';
	echo '<h2>' . __('Theme License', 'muiteer') . '</h2>';
	if ( isset( $_REQUEST['activate_license'] ) ) 
	{
		$license_key = $_REQUEST['muiteer_license_key_data'];
		$api_params = array( 'slm_action' => 'slm_activate', 'secret_key' => API_SECRET_KEY, 'license_key' => $license_key, 'registered_domain' => $_SERVER['SERVER_NAME'], 'item_reference' => urlencode(PRODUCT), );
		$query = esc_url_raw( add_query_arg($api_params, SERVER_URL) );
		$response = wp_remote_get( $query, array('timeout' => 20, 'sslverify' => false) );
		if ( is_wp_error($response) ) 
		{
			echo __('Unexpected Error! Please refresh this page.', 'muiteer');
		}
		$license_data = json_decode( wp_remote_retrieve_body($response) );
		if ($license_data->result == 'success') 
		{
			echo '<br /><b style="color: green;"> ' . __($license_data->message, 'muiteer') . '</b>';
			update_option('muiteer_license_key_data', $license_key);
			wp_clear_scheduled_hook('muiteer_check_license_task_hook');
		}
		else
		{
			echo '<br /><b style="color: red;"> ' . __($license_data->message, 'muiteer') . '</b>';
			wp_clear_scheduled_hook('muiteer_check_license_task_hook');
		}
	}
	if ( isset( $_REQUEST['deactivate_license'] ) ) 
	{
		$license_key = $_REQUEST['muiteer_license_key_data'];
		$api_params = array( 'slm_action' => 'slm_deactivate', 'secret_key' => API_SECRET_KEY, 'license_key' => $license_key, 'registered_domain' => $_SERVER['SERVER_NAME'], 'item_reference' => urlencode(PRODUCT), );
		$query = esc_url_raw( add_query_arg($api_params, SERVER_URL) );
		$response = wp_remote_get( $query, array('timeout' => 20, 'sslverify' => false) );
		if ( is_wp_error($response) ) 
		{
			echo __('Unexpected Error! Please refresh this page.', 'muiteer');
		}
		$license_data = json_decode( wp_remote_retrieve_body($response) );
		if ($license_data->result == 'success') 
		{
			echo '<br /><b style="color: green">' . __($license_data->message, 'muiteer') . '</b>';
			update_option('muiteer_license_key_data', '');
			wp_clear_scheduled_hook('muiteer_check_license_task_hook');
			global $wpdb;
			$table_name = $wpdb->prefix . "muiteer_theme_status";
			$wpdb->query("DROP TABLE IF EXISTS " . $table_name);
		}
		else 
		{
			echo '<br /><b style="color: red">' . __($license_data->message, 'muiteer') . '</b>';
		}
	}
	?>
		<p><?php echo __('Please enter your license key for this theme to activate it.', 'muiteer');
	?> <a href="mailto:mail@muiteer.com"><?php echo __('No license key? Get it now!', 'muiteer');
	?></a></p>
		<form action="" method="post">
			<table class="form-table">
				<tr>
					<th style="width:100px;"><label for="muiteer_license_key_data"><?php echo __('License Key', 'muiteer');
	?></label></th>
					<td>
						<input class="regular-text" type="text" id="muiteer_license_key_data" name="muiteer_license_key_data"  value="<?php echo get_option('muiteer_license_key_data');
	?>" >
						<p class="description"><?php echo __('License key will be valid forever. (A license key can be bound to 3 domains)', 'muiteer');
	?></p>
					</td>
				</tr>
			</table>
			<div class="submit">
				<input type="submit" name="activate_license" value="<?php echo __('Activate', 'muiteer');
	?>" class="button button-primary" />
				<input type="submit" name="deactivate_license" value="<?php echo __('Deactivate', 'muiteer');
	?>" class="button" />
				<a href="http://muiteer.com" target="_blank" class="button"><?php echo __('Official Website', 'muiteer');
	?></a>
			</div>
		</form>
		<?php
echo '</div>';
}
if (get_theme_mod('muiteer_post_rating') == 'disabled' && get_theme_mod('muiteer_portfolio_rating') == 'disabled') 
{
}
else 
{
	require get_template_directory() . '/inc/rating/rating.php';
}
if ( class_exists('SitePress') ) 
{
	if ( !function_exists('muiteer_remove_wmpl_notices') ) : function muiteer_remove_wmpl_notices() 
	{
		remove_action('admin_notices', array( WP_Installer(), 'show_site_key_nags') );
		remove_action('admin_notices', array( WP_Installer(), 'setup_plugins_page_notices') );
	}
	endif;
	add_action('admin_init', 'muiteer_remove_wmpl_notices', 11);
}
function muiteer_highlight_add_mce_button() 
{
	if ( !current_user_can('edit_posts') && ! current_user_can('edit_pages') ) 
	{
		return;
	}
	if ( 'true' == get_user_option('rich_editing') ) 
	{
		add_filter('mce_external_plugins', 'muiteer_highlight_add_tinymce_plugin');
		add_filter('mce_buttons', 'muiteer_highlight_register_mce_button');
	}
}
function muiteer_highlight_add_tinymce_plugin($plugin_array) 
{
	$plugin_array['muiteer_highlight_tinymce_button'] = get_template_directory_uri() . '/inc/highlightjs/tinymce/tinymce-highlight.js';
	return $plugin_array;
}
function muiteer_highlight_register_mce_button($buttons) 
{
	array_push($buttons, 'muiteer_highlight_tinymce_button');
	return $buttons;
}
add_action('admin_head', 'muiteer_highlight_add_mce_button');
function muiteer_highlight_mce_css($mce_css) 
{
	if ( !is_array($mce_css) ) 
	{
		$mce_css = explode(',', $mce_css);
	}
	$mce_css[] = get_template_directory_uri() . '/inc/highlightjs/tinymce/tinymce-highlight.css';
	return implode(',', $mce_css);
}
add_filter('mce_css', 'muiteer_highlight_mce_css');
function muiteer_highlight_script() 
{
	wp_enqueue_script('muiteer_highlight_script', get_template_directory_uri() . '/inc/highlightjs/highlight.pack.js?v=1.0.0');
	wp_enqueue_script('muiteer_highlight_ine_numbers_script', get_template_directory_uri() . '/inc/highlightjs/highlightjs-line-numbers.js');
}
add_action('wp_enqueue_scripts', 'muiteer_highlight_script');
add_action('admin_enqueue_scripts', 'muiteer_highlight_script');
function muiteer_highlight_admin_assets() 
{
	wp_localize_script( 'muiteer_highlight_script', 'MuiteerHighlightTrans', array( 'title' => esc_html__("Insert Code", 'muiteer'), 'language' => esc_html__("Language", 'muiteer'), 'code' => esc_html__("Code", 'muiteer'), ) );
}
add_action('admin_enqueue_scripts', 'muiteer_highlight_admin_assets');
if (get_theme_mod('muiteer_maintenance_switch', 'disabled') == 'enabled' && get_theme_mod('muiteer_maintenance_countdown_switch', 'disabled') == "enabled") 
{
	$current_time = strtotime( current_time('Y-m-d H:i:s') );
	$deadline = strtotime( get_theme_mod('muiteer_maintenance_countdown_launch_date') );
	if ($deadline - $current_time <= 0) 
	{
		set_theme_mod('muiteer_maintenance_switch', "disabled");
	}
	;
}
;
function muiteer_remove_default_meta_box_for_posts_page() 
{
	global $post;
	$current_post_id = $post->ID;
	$posts_page_id = intval( get_option('page_for_posts') );
	if ( $posts_page_id == $current_post_id ) 
	{
		remove_meta_box('postexcerpt', 'page', 'normal');
		remove_meta_box('postimagediv', 'page', 'side');
	}
}
add_action('do_meta_boxes', 'muiteer_remove_default_meta_box_for_posts_page');
function muiteer_remove_default_meta_box_for_page() 
{
	remove_meta_box('commentstatusdiv', 'page', 'normal');
	remove_meta_box('commentsdiv', 'page', 'normal');
}
add_action('do_meta_boxes', 'muiteer_remove_default_meta_box_for_page');
add_filter( 'wpcf7_load_css', '__return_false' );
$portfolio_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-portfolio.php', ) );
foreach($portfolio_pages as $portfolio_page) 
{
	$portfolio_page_link = get_page_link($portfolio_page->ID);
}
$current_url = home_url() . $_SERVER["REQUEST_URI"];
if ($current_url == home_url() . "/portfolio" || $current_url == home_url() . "/portfolio/") 
{
	wp_redirect($portfolio_page_link);
	exit;
}
;
$doc_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-documentation.php', ) );
foreach($doc_pages as $doc_page) 
{
	$doc_page_link = get_page_link($doc_page->ID);
}
$current_url = home_url() . $_SERVER["REQUEST_URI"];
if ($current_url == home_url() . "/docs" || $current_url == home_url() . "/docs/") 
{
	wp_redirect($doc_page_link);
	exit;
}
;
