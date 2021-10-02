<?php

/*
 * ------------------------------------------------------------------------------
 * 引入css、JavaScript文件
 * ------------------------------------------------------------------------------
 */
function aye_scripts(){
	$theme_assets = get_template_directory_uri() . '/static';
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_deregister_script('l10n');
		wp_enqueue_style('uikit',		$theme_assets . '/css/uikit.min.css', 							array(), '', 'all');
		wp_enqueue_style ( 'style'		,get_template_directory_uri()."/style.css",					array(), '', 'all');
		wp_enqueue_script('jquery', 		$theme_assets . '/js/jquery.min.js',					array(), '', false);
		wp_enqueue_script('uikit',			$theme_assets . '/js/uikit.min.js',						array('jquery'), '', false);
		wp_enqueue_script('index',			$theme_assets . '/js/index.js',							array('jquery'), '', true );
		
	}
}
add_action('wp_enqueue_scripts', 'aye_scripts');