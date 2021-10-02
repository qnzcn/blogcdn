<?php

/*
 * ------------------------------------------------------------------------------
 * WordPress开启友情链接管理
 * ------------------------------------------------------------------------------
 */

add_filter( 'pre_option_link_manager_enabled', '__return_true' );


/*
 * ------------------------------------------------------------------------------
 * WordPress搜索结果排除所有页面、自定义分类
 * ------------------------------------------------------------------------------
 */

//搜索结果排除所有页面
function search_filter_page($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts','search_filter_page');

//搜索结果排除自定义分类(post_type)
function searchAll( $query ) {
	if ( $query->is_search ) { $query->set( 'post_type', array( 'site' )); } 
	return !$query;
}
add_filter( 'the_search_query', 'searchAll' );

