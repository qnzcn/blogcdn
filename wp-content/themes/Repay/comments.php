<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mathilda
 */

if ( post_password_required() ) {
	return;
}
?>

<?php if(comments_open() != false): ?>

	<section id="comments" class="comments wow fadeInUp">
		<div class="comments-main">
	<h3 id="comments-list-title"><i class="fa fa-comment"></i><span class="noticom"><?php comments_popup_link('暂无评论', '1 条评论', '% 条评论'); ?> </span></h3>
	<div id="respond_box">
		<div id="respond" class="comment-respond">
		<div class="cancel-comment-reply">
			<?php cancel_comment_reply_link('取消回复'); ?>
		</div>
	
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php print '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
    <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">	
      <?php if ( $user_ID ) : ?>
      <p class="loginby"><?php print '登录者：'; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php print '[ 退出 ]'; ?></a></p>
	
	<?php endif; ?>
	<?php if ( ! $user_ID ): ?>
	<div id="comment-author-info">		
			<input type="text" name="author" id="author" class="commenttext" placeholder="Name"  value="<?php echo $comment_author; ?>" size="22" tabindex="1" placeholder="Name" />
			<label for="author"></label>				
			<input type="text" name="email" id="email" class="commenttext" value="<?php echo $comment_author_email; ?>" size="22" placeholder="Email" tabindex="2" />
			<label for="email"></label>				
			<input type="text" name="url" id="url" class="commenttext" value="<?php echo $comment_author_url; ?>" size="22"placeholder="http://"  tabindex="3" />
			<label for="url"></label>		
	</div>
      <?php endif; ?>
      <div class="clear"></div>
      
		<div class="comarea">
		<div class="visitor-avatar">
		<?php if ( $user_ID )://判断是否登录，获取admin头像 ?>
		<?php global $current_user;get_currentuserinfo();echo get_avatar( $current_user->user_email, 60); ?>
		<?php elseif($comment_author_email): ?>		
		<img class="v-avatar" src="<?php echo get_avatar_url( $comment_author_email, array('size'=>$avatar_size));?>">
		<?php else: ?>
		<img class="v-avatar" src="<?php bloginfo('template_url'); ?>/images/visit-ava.jpg">
		<?php endif; ?>
		</div>
		
		<textarea name="comment" id="comment" placeholder="输入评论内容..." tabindex="4" cols="50" rows="5"></textarea>
		</div>
		
		<?php if(xintheme('ma_comment_unlock') && !is_user_logged_in()) { ?>
		<div class="comment-form-validate" data-balloon="滑动解锁后提交评论" data-balloon-pos="right">
		<label class="ma-checkbox-label">
			<input class="ma-checkbox-radio" type="checkbox" name="no-robot">
			<span class="ma-no-robot-checkbox ma-checkbox-radioInput"></span>
		</label>				
             </div>
		<?php } ?>	 
		
		<div class="com-footer">
			<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="发表评论"/>
			<?php comment_id_fields(); ?>
			
		</div>
		<?php do_action('comment_form', $post->ID); ?>
    </form>
	<div class="clear"></div>
    <?php endif; // If registration required and not logged in ?>
  </div>
  </div>	
	<div id="loading-comments"><span></span></div>
	<?php if(have_comments()): ?>
		<ul class="commentwrap">
			<?php wp_list_comments('type=comment&callback=akina_comment_format&max_depth=10000'); ?>	
		</ul>
	 <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comments-navi">
				<?php paginate_comments_links('prev_text=<&next_text=>');?>
			</nav>	
	<?php endif; ?>
	<?php else : ?>
	<div class="not-comment">暂无评论...</div>
	<?php endif; ?>		
	</div>
	</section>
	<?php else : ?>
	<div class="commclose">评论已关闭...</div>

<?php endif; ?>

