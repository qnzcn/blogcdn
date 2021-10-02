<?php
/*
 * ------------------------------------------------------------------------------
 * 优化加速
 * ------------------------------------------------------------------------------
 */

	//WordPress禁用古腾堡编辑器
	if(_aye('gtb_editor') == true):

	add_filter ('use_block_editor_for_post','__return_false');
	remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles');

	endif;

	//WordPress禁用谷歌字体
	if(_aye('googleapis') == true):

	function wp_style_del_web( $src, $handle ) {
		if( strpos(strtolower($src),'fonts.googleapis.com') ){
			$src=''; 
		}	
		return $src;
	}
	add_filter( 'style_loader_src', 'wp_style_del_web', 2, 2 );
	function wp_script_del_web( $src, $handle ) {
		$src_low = strtolower($src);
		if( strpos($src_low,'maps.googleapis.com') ){
			return  str_replace('maps.googleapis.com','ditu.google.cn',$src_low); //google地图
		}	
		if( strpos($src_low,'ajax.googleapis.com') ){
			return  str_replace('ajax.googleapis.com','ajax.useso.com',$src_low); //google库用360替代
		}
		if( strpos($src_low,'twitter.com') || strpos($src_low,'facebook.com')  || strpos($src_low,'youtube.com') ){
			return ''; //无法访问直接去除
		}	
		return $src;
	}
	add_filter( 'script_loader_src', 'wp_script_del_web', 2, 2 );

	endif;


	// WordPress去掉分类链接中的category
	if(_aye('category') == true):
	
	add_action( 'load-themes.php', 'no_category_base_refresh_rules');
	add_action('created_category', 'no_category_base_refresh_rules');
	add_action('edited_category', 'no_category_base_refresh_rules');
	add_action('delete_category', 'no_category_base_refresh_rules');
	function no_category_base_refresh_rules() {
		global $wp_rewrite;
		$wp_rewrite -> flush_rules();
	}
	add_action('init', 'no_category_base_permastruct');
	function no_category_base_permastruct() {
		global $wp_rewrite, $wp_version;
		if (version_compare($wp_version, '3.4', '<')) {
			// For pre-3.4 support
			$wp_rewrite -> extra_permastructs['category'][0] = '%category%';
		} else {
			$wp_rewrite -> extra_permastructs['category']['struct'] = '%category%';
		}
	}
	// Add our custom category rewrite rules
	add_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');
	function no_category_base_rewrite_rules($category_rewrite) {
		//var_dump($category_rewrite);// For Debugging
		$category_rewrite = array();
		$categories = get_categories(array('hide_empty' => false));
		foreach ($categories as $category) {
			$category_nicename = $category -> slug;
			if ($category -> parent == $category -> cat_ID)// recursive recursion
				$category -> parent = 0;
			elseif ($category -> parent != 0)
				$category_nicename = get_category_parents($category -> parent, false, '/', true) . $category_nicename;
			$category_rewrite['(' . $category_nicename . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
			$category_rewrite['(' . $category_nicename . ')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
			$category_rewrite['(' . $category_nicename . ')/?$'] = 'index.php?category_name=$matches[1]';
		}
		// Redirect support from Old Category Base
		global $wp_rewrite;
		$old_category_base = get_option('category_base') ? get_option('category_base') : 'category';
		$old_category_base = trim($old_category_base, '/');
		$category_rewrite[$old_category_base . '/(.*)$'] = 'index.php?category_redirect=$matches[1]';
		//var_dump($category_rewrite);// For Debugging
		return $category_rewrite;
	}
	// Add 'category_redirect' query variable
	add_filter('query_vars', 'no_category_base_query_vars');
	function no_category_base_query_vars($public_query_vars) {
		$public_query_vars[] = 'category_redirect';
		return $public_query_vars;
	}
	// Redirect if 'category_redirect' is set
	add_filter('request', 'no_category_base_request');
	function no_category_base_request($query_vars) {
		//print_r($query_vars);// For Debugging
		if (isset($query_vars['category_redirect'])) {
			$catlink = trailingslashit(get_option('home')) . user_trailingslashit($query_vars['category_redirect'], 'category');
			status_header(301);
			header("Location: $catlink");
			exit();
		}
		return $query_vars;
	}

	endif;

	//禁用emoji相关
	if(_aye('emoji') == true):

	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('admin_print_styles', 'print_emoji_styles');    
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');    
	remove_action('embed_head', 'print_emoji_detection_script');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

	endif;

	
	//禁用修订
	//if(_aye('article_revision') == true):

	//define('WP_POST_REVISIONS', false);

	//endif;


/*
 * ------------------------------------------------------------------------------
 * 精简头部
 * ------------------------------------------------------------------------------
 */
	
	//移除头部工具栏
	if(_aye('toolbar') == true):

	add_filter( 'show_admin_bar', '__return_false' );

	endif;

	//WordPress禁用REST API
	if(_aye('rest_api') == true):

	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

	endif;

	//移除wp-json链接
	if(_aye('wpjson') == true):

	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

	endif;


	//移除头部多余Emoji JavaScript代码
	if(_aye('emoji_script') == true):

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 

	endif;


	//移除WordPress版本
	if(_aye('wp_generator') == true):

	remove_action( 'wp_head', 'wp_generator' );

	endif;

	//移除离线编辑器开放接口
	if(_aye('rsd_link') == true):

	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );

	endif;


	//清除前后文、第一篇文章、主页meta信息
	if(_aye('index_rel_link') == true):

	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	endif;

	//移除文章、分类和评论feed
	if(_aye('feed') == true):

	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 ); 
	remove_action('wp_head','wp_resource_hints',2);

	endif;


/*
 * ------------------------------------------------------------------------------
 * 去除自带小工具
 * ------------------------------------------------------------------------------
 */
add_action("widgets_init", function() {
	unregister_widget("WP_Widget_Pages");//页面
	unregister_widget("WP_Widget_Calendar");//文章日程表
	unregister_widget("WP_Widget_Archives");//文章归档
	unregister_widget("WP_Widget_Meta");//登入/登出，管理，Feed 和 WordPress 链接
	unregister_widget("WP_Widget_Search");//搜索
	unregister_widget("WP_Widget_Categories");//分类目录
	unregister_widget("WP_Widget_Recent_Posts");//近期文章
	unregister_widget("WP_Widget_Recent_Comments");//近期评论
	unregister_widget("WP_Widget_RSS");//RSS订阅
	unregister_widget("WP_Widget_Links");//链接
	//unregister_widget("WP_Widget_Text");//文本
	unregister_widget("WP_Widget_Tag_Cloud");//标签云
	//unregister_widget("WP_Nav_Menu_Widget");//自定义菜单
	unregister_widget("WP_Widget_Media_Audio");//音频
	//unregister_widget("WP_Widget_Media_Image");//图片
	unregister_widget("WP_Widget_Media_Video");//视频
	unregister_widget("WP_Widget_Media_Gallery");//画廊
});