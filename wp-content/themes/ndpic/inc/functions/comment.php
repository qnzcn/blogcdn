<?php
/*
 * ------------------------------------------------------------------------------
 * 评论添加@
 * ------------------------------------------------------------------------------
 */
add_filter('comment_text', function($comment_text) {
    $comment_ID = get_comment_ID();
    $comment = get_comment($comment_ID);
    if ($comment->comment_parent) {
        $parent_comment = get_comment($comment->comment_parent);
        $comment_text = '<a href="#comment-' . $comment->comment_parent . '"><span class="parent-icon">@' . $parent_comment->comment_author . '</a></span> ' . $comment_text;
    }
    return $comment_text;
});

/*
 * ------------------------------------------------------------------------------
 * 直接去掉函数 comment_class() 和 body_class() 中输出的 "comment-author-" 和 "author-"
 * 避免 WordPress 登录用户名被暴露 
 * ------------------------------------------------------------------------------
 */

function comment_body_class($content){
    $pattern = "/(.*?)([^>]*)author-([^>]*)(.*?)/i";
    $replacement = '$1$4';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
add_filter('comment_class', 'comment_body_class');
add_filter('body_class', 'comment_body_class');



/*
 * ------------------------------------------------------------------------------
 * 评论列表
 * ------------------------------------------------------------------------------
 */
function xintheme_theme_list_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	global $commentcount,$wpdb, $post;
	if(!$commentcount) { 
		$comments = get_comments(['post_id'=>$post->ID]);
		$cnt = count($comments);
		$page = get_query_var('cpage');
		$cpp=get_option('comments_per_page');
		if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page	== ceil($cnt / $cpp))) {
			$commentcount = $cnt + 1;
		} else {
			$commentcount = intval($cpp) *intval( $page) + 1;
		}
	}
?>

<div id="comment-<?php comment_ID() ?>" <?php comment_class('comment-main'); ?>>
	<div class="comment-head uk-flex uk-flex-middle">
		<div class="uk-flex-1 uk-flex uk-flex-middle">
			<div class="avatar">
				<?php
					if(get_option('users_can_register')){
						echo get_avatar( $comment->user_id,24);
					}else{
						echo get_avatar($comment,24);
					}
				?>
			</div>
			<span class="text-header">
				<?php /*wpjam_comment_level($comment);*/ comment_author_link();?>
			</span>
		</div>
		<div class="data uk-text-right">
			<span>
				<?php comment_date() ?> <?php comment_time() ?>
			</span>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => "回复"))) ?>
		</div>
	</div>
	<div class="comment-content">
		<?php comment_text() ?>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<font style="color:#C00; font-style:inherit">您的评论正在等待审核中...</font>
		<?php endif; ?>
	</div>
</div>

<?php }


/*
 * ------------------------------------------------------------------------------
 * 评论回复 邮件通知
 * ------------------------------------------------------------------------------
 */
add_action('comment_post',function ($comment_id) {
	$comment = get_comment($comment_id);
	$parent_id = $comment->comment_parent ? $comment->comment_parent : '';
	$spam_confirmed = $comment->comment_approved;
	if (($parent_id != '') && ($spam_confirmed != 'spam')) {
		$wp_email = 'no-reply@' . preg_replace('#^www.#', '', strtolower($_SERVER['SERVER_NAME'])); //e-mail 发出点, no-reply 可改为可用的 e-mail.
		$to = trim(get_comment($parent_id)->comment_author_email);
		$subject = '您在 [' . get_option("blogname") . '] 的留言有了回复';
		$message = '
<table cellpadding="0" cellspacing="0" class="email-container" align="center" width="550" style="font-size: 15px; font-weight: normal; line-height: 22px; text-align: left; border: 1px solid rgb(177, 213, 245); width: 550px;">
<tbody><tr>
<td>
<table cellpadding="0" cellspacing="0" class="padding" width="100%" style="padding-left: 40px; padding-right: 40px; padding-top: 30px; padding-bottom: 35px;">
<tbody>
<tr class="logo">
<td align="center">
<table class="logo" style="margin-bottom: 10px;">
<tbody>
<tr>
<td>
<span style="font-size: 22px;padding: 10px 20px;margin-bottom: 5%;color: #65c5ff;border: 1px solid;box-shadow: 0 5px 20px -10px;border-radius: 2px;display: inline-block;">' . get_option("blogname") . '</span>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr class="content">
<td>
<hr style="height: 1px;border: 0;width: 100%;background: #eee;margin: 15px 0;display: inline-block;">
<p>Hi ' . trim(get_comment($parent_id)->comment_author) . '!<br>您评论在 "' . get_the_title($comment->comment_post_ID) . '":</p>
<p style="background: #eee;padding: 1em;text-indent: 2em;line-height: 30px;">' . trim(get_comment($parent_id)->comment_content) . '</p>
<p>'. $comment->comment_author .' 给您的答复:</p>
<p style="background: #eee;padding: 1em;text-indent: 2em;line-height: 30px;">' . trim($comment->comment_content) . '</p>
</td>
</tr>
<tr>
<td align="center">
<table cellpadding="12" border="0" style="font-family: Lato, \'Lucida Sans\', \'Lucida Grande\', SegoeUI, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 25px; color: #444444; text-align: left;">
<tbody><tr>
<td style="text-align: center;">
<a target="_blank" style="color: #fff;background: #65c5ff;box-shadow: 0 5px 20px -10px #44b0f1;border: 1px solid #44b0f1;width: 200px;font-size: 14px;padding: 10px 0;border-radius: 2px;margin: 10% 0 5%;text-align:center;display: inline-block;text-decoration: none;" href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看详情</a>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>

<table border="0" cellpadding="0" cellspacing="0" align="center" class="footer" style="max-width: 550px; font-family: Lato, \'Lucida Sans\', \'Lucida Grande\', SegoeUI, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; color: #444444; text-align: left; padding: 20px 0; font-weight: normal;">
<tbody><tr>
<td align="center" style="text-align: center; font-size: 12px; line-height: 18px; color: rgb(163, 163, 163); padding: 5px 0px;">
</td>
</tr>
<tr>
<td style="text-align: center; font-weight: normal; font-size: 12px; line-height: 18px; color: rgb(163, 163, 163); padding: 5px 0px;">
<p>Please do not reply to this message , because it is automatically sent.</p>
<p>© '.date("Y").' <a name="footer_copyright" href="' . home_url() . '" style="color: rgb(43, 136, 217); text-decoration: underline;" target="_blank">' . get_option("blogname") . '</a></p>
</td>
</tr>
</tbody>
</table>';
		$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
		$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
		wp_mail( $to, $subject, $message, $headers );
	}
});