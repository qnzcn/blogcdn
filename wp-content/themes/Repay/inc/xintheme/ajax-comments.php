<?php
/**
 * Ajax comments by Willin Kan.
 * mode by dong
 *
 */
function ajax_comment(){
/*if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) { //有这句会失效
	header('Allow: POST');
	header('HTTP/1.1 405 Method Not Allowed');
	header('Content-Type: text/plain');
	exit;
}*/

/** Sets up the WordPress Environment. */
	if($_POST['action'] == 'ajax_comment_post' && 'POST' == $_SERVER['REQUEST_METHOD']){
		global $wpdb;
		nocache_headers();
		
		$comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;
		
		$post = get_post($comment_post_ID);

		if ( empty($post->comment_status) ) {
			do_action('comment_id_not_found', $comment_post_ID);
			err(__('无效的评论状态.')); // 將 exit 改為錯誤提示
		}

		// get_post_status() will get the parent status for attachments.
		$status = get_post_status($post);

		$status_obj = get_post_status_object($status);

		if ( !comments_open($comment_post_ID) ) {
			do_action('comment_closed', $comment_post_ID);
			err(__('Sorry, 评论已关闭.')); // 將 wp_die 改為錯誤提示
		} elseif ( 'trash' == $status ) {
			do_action('comment_on_trash', $comment_post_ID);
			err(__('无效的评论状态.')); // 將 exit 改為錯誤提示
		} elseif ( !$status_obj->public && !$status_obj->private ) {
			do_action('comment_on_draft', $comment_post_ID);
			err(__('无效的评论状态.')); // 將 exit 改為錯誤提示
		} elseif ( post_password_required($comment_post_ID) ) {
			do_action('comment_on_password_protected', $comment_post_ID);
			err(__('评论密码保护')); // 將 exit 改為錯誤提示
		} else {
			do_action('pre_comment_on_post', $comment_post_ID);
		}

		$comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
		$comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
		$comment_author_url   = ( isset($_POST['url']) )     ? trim($_POST['url']) : null;
		$comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;
		$edit_id              = ( isset($_POST['edit_id']) ) ? $_POST['edit_id'] : null; // 提取 edit_id

		// If the user is logged in
		$user = wp_get_current_user();
		if ( $user->ID ) {
			if ( empty( $user->display_name ) )
				$user->display_name=$user->user_login;
			$comment_author       = $wpdb->escape($user->display_name);
			$comment_author_email = $wpdb->escape($user->user_email);
			$comment_author_url   = $wpdb->escape($user->user_url);
			if ( current_user_can('unfiltered_html') ) {
				if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
					kses_remove_filters(); // start with a clean slate
					kses_init_filters(); // set up the filters
				}
			}
		} else {
			if ( get_option('comment_registration') || 'private' == $status )
				err(__('Sorry, 你必须登陆后才可评论.')); // 將 wp_die 改為錯誤提示
		}

		$comment_type = '';

		if ( get_option('require_name_email') && !$user->ID ) {
			if ( 6 > strlen($comment_author_email) || '' == $comment_author )
				err( __('错误: 请填写必须的表单.') ); // 將 wp_die 改為錯誤提示
			elseif ( !is_email($comment_author_email))
				err( __('错误: 请填写可用的邮箱.') ); // 將 wp_die 改為錯誤提示
		}

		if ( '' == $comment_content )
			err( __('错误: 请填写评论内容.') ); // 將 wp_die 改為錯誤提示



		// 增加: 檢查重覆評論功能
		$dupe = "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = '$comment_post_ID' AND ( comment_author = '$comment_author' ";
		if ( $comment_author_email ) $dupe .= "OR comment_author_email = '$comment_author_email' ";
		$dupe .= ") AND comment_content = '$comment_content' LIMIT 1";
		if ( $wpdb->get_var($dupe) ) {
			err(__('你已经发表过相同的内容!'));
		}

		// 增加: 檢查評論太快功能
		if ( $lasttime = $wpdb->get_var( $wpdb->prepare("SELECT comment_date_gmt FROM $wpdb->comments WHERE comment_author = %s ORDER BY comment_date DESC LIMIT 1", $comment_author) ) ) { 
		$time_lastcomment = mysql2date('U', $lasttime, false);
		$time_newcomment  = mysql2date('U', current_time('mysql', 1), false);
		$flood_die = apply_filters('comment_flood_filter', false, $time_lastcomment, $time_newcomment);
		if ( $flood_die ) {
			err(__('您的评论太过频繁.'));
			}
		}

		$comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;

		$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');

		// 增加: 檢查評論是否正被編輯, 更新或新建評論
		if ( $edit_id ){
		$comment_id = $commentdata['comment_ID'] = $edit_id;
		wp_update_comment( $commentdata );
		} else {
		$comment_id = wp_new_comment( $commentdata );
		}

		$comment = get_comment($comment_id);
		do_action('set_comment_cookies', $comment, $user);

		//$location = empty($_POST['redirect_to']) ? get_comment_link($comment_id) : $_POST['redirect_to'] . '#comment-' . $comment_id; //取消原有的刷新重定向
		//$location = apply_filters('comment_post_redirect', $location, $comment);

		//wp_redirect($location);

		$comment_depth = 1;   //为评论的 class 属性准备的
		$tmp_c = $comment;
		while($tmp_c->comment_parent != 0){
			$comment_depth++;
			$tmp_c = get_comment($tmp_c->comment_parent);
		}

		//此处非常必要，无此处下面的评论无法输出 by mufeng
		$GLOBALS['comment'] = $comment;

		//以下是評論式樣, 不含 "回覆". 要用你模板的式樣 copy 覆蓋.
		?>



		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID ?>">
					<div id="comment-<?php comment_ID(); ?>" class="comment_body contents">	
						<div class="profile">
							<a href="<?php comment_author_url(); ?>"><?php echo get_avatar( $comment, 50 );?></a>
						</div>						
								<section class="commeta">
									<div class="left">
										<h4 class="author"><a href="<?php comment_author_url(); ?>"><?php echo get_avatar( $comment, 50 );?><?php comment_author(); ?><span class="isauthor" title="<?php esc_attr_e('Author', 'akina'); ?>"></span></a></h4>
									</div>
									<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
									<div class="right">
										<div class="info"><time datetime="<?php comment_date('Y-m-d'); ?>"><?php comment_date(get_option('date_format')); ?></time></div>
									</div>
								</section>
							<div class="body">
								<?php comment_text(); ?>
							</div>
					</div>
		<?php
		die();
	}else{return;}
}
add_action('init','ajax_comment');

// 增加: 錯誤提示功能
function err($ErrMsg) {
    header('HTTP/1.1 405 Method Not Allowed');
	header('Content-Type: text/plain;charset=UTF-8');
    echo $ErrMsg;
    exit;
}