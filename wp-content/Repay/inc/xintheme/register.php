<?php
define( 'THEME_URL', get_bloginfo('template_directory') );
function theme_load_scripts() {
	wp_register_style( 'style', THEME_URL.'/css/style.css', array(), XinTheme, 'all'  );
    wp_register_style( 'bootstrap', THEME_URL.'/css/bootstrap.min.css', array(), XinTheme, 'all'  );
	wp_register_style( 'font-awesome', THEME_URL.'/inc/frame/assets/css/font-awesome.min.css', array(), XinTheme, 'all'  );
    wp_register_style( 'modified-bootstrap', THEME_URL.'/css/modified-bootstrap.css', array(), XinTheme, 'all'  );

    wp_register_script( 'general-scripts', THEME_URL . '/js/general-scripts.js', array('jquery'), XinTheme, true );
    wp_register_script( 'bootstrap', THEME_URL . '/js/bootstrap.min.js', array('jquery'), XinTheme, true );
	wp_register_script( 'popper', THEME_URL . '/js/popper.min.js', array(), XinTheme, true );
	wp_register_script( 'stickthis', THEME_URL . '/js/stickthis.js', array(), XinTheme, true );
	wp_register_script( 'jq-sticky-anything', THEME_URL . '/js/jq-sticky-anything.min.js', array(), XinTheme, true );
    wp_localize_script( 'jquery', 'site_url', array("ajax_url"=>admin_url("admin-ajax.php"),"url_theme"=>get_template_directory_uri() ) );
    
	wp_enqueue_style( 'balloon.min', THEME_URL . '/css/balloon.min.css', array(), XinTheme );
	wp_enqueue_script( 'jquery.min', THEME_URL . '/js/jquery.min.js', array(), XinTheme, true );//加载JQ库
	if( !is_admin() )
    {
	wp_enqueue_style('style');
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('modified-bootstrap');

    wp_enqueue_script('general-scripts');
    wp_enqueue_script('bootstrap');
	wp_enqueue_script('popper');
	wp_enqueue_script('stickthis');
	wp_enqueue_script('jq-sticky-anything');

	wp_enqueue_script( 'jquery-ui-accordion' );//加载accordion库
    wp_enqueue_script( 'jquery-ui-tabs' );//加载tabs库
	}

	wp_enqueue_script( 'baguetteBox', THEME_URL. '/js/baguetteBox.min.js', array(), XinTheme, true );
	wp_enqueue_script( 'wow', THEME_URL. '/js/wow.min.js', array(), XinTheme, true );
	wp_enqueue_script( 'support', THEME_URL . '/js/support.js', array(), XinTheme, true );
	wp_enqueue_script( 'app', THEME_URL . '/js/app.js', array(), XinTheme, true );//加载核心库

	wp_localize_script( 'app', 'Theme' , array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	));

    
}
add_action('wp_enqueue_scripts', 'theme_load_scripts');