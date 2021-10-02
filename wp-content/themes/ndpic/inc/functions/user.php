<?php

/*
 * ------------------------------------------------------------------------------
 * 个人资料添加字段
 * ------------------------------------------------------------------------------
 */

add_filter('user_contactmethods', 'boke112_user_contact');
function boke112_user_contact($user_contactmethods){
	$user_contactmethods['qq'] = 'QQ号';
	$user_contactmethods['weibo'] = '微博';
	$user_contactmethods['weixin'] = '微信';
	unset( $contactmethods['yim'] );
	unset( $contactmethods['aim'] );
	unset( $contactmethods['jabber'] );
	return $user_contactmethods;
}

/*
 * ------------------------------------------------------------------------------
 * 仅显示当前用户的文章、媒体文件
 * ------------------------------------------------------------------------------
 */
add_action('pre_get_posts', function ( $wp_query_obj ) {
	global $current_user, $pagenow;
	if( !is_a( $current_user, 'WP_User') )
		return;
	if( 'admin-ajax.php' != $pagenow || $_REQUEST['action'] != 'query-attachments' )
		return;
	if( !current_user_can( 'manage_options' ) && !current_user_can('manage_media_library') )
		$wp_query_obj->set('author', $current_user->ID );
	return;
});


/*
 * ------------------------------------------------------------------------------
 * 当前作者文章浏览总数
 * ------------------------------------------------------------------------------
 */
if(!function_exists('cx_posts_views')) {
	function cx_posts_views($author_id = 1 ,$display = true) {
		global $wpdb;
		$sql = "SELECT SUM(meta_value+0) FROM $wpdb->posts left join $wpdb->postmeta on ($wpdb->posts.ID = $wpdb->postmeta.post_id) WHERE meta_key = 'views' AND post_author =$author_id";
		$comment_views = intval($wpdb->get_var($sql));
		if($display) {
			echo number_format_i18n($comment_views);
		} else {
			return $comment_views;
		}
	}
}


/*
 * ------------------------------------------------------------------------------
 * 用户中心获取作者角色
 * ------------------------------------------------------------------------------
 */
 
function check_user_role() {
    $user_group_name = _aye('user_group_name');
    
    if( current_user_can( 'manage_options' ) ) {
        if(!$user_group_name['user_admin']){
            echo '管理员';
        }else {
            echo $user_group_name['user_admin'];
        }
    }
    if( current_user_can( 'publish_pages' ) && !current_user_can( 'manage_options' ) ) {
        if(!$user_group_name['user_edit']){
            echo '编辑';
        }else {
            echo $user_group_name['user_edit'];
        }
    }
    if( current_user_can( 'publish_posts' ) && !current_user_can( 'publish_pages' ) ) {
        if(!$user_group_name['user_author']){
            echo '作者';
        }else {
            echo $user_group_name['user_author'];
        }
    }
    if( current_user_can( 'edit_posts' ) && !current_user_can( 'publish_posts' ) ) {
        if(!$user_group_name['user_contributor']){
            echo '贡献者';
        }else {
            echo $user_group_name['user_contributor'];
        }
    }
    if( current_user_can( 'read' ) && !current_user_can( 'edit_posts' ) ) {
        if(!$user_group_name['user_subscriber']) {
            echo '订阅者';
        }else {
            echo $user_group_name['user_subscriber'];
        }
    }
}

