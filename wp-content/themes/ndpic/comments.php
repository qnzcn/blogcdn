<?php if(post_password_required()) return;?>

<div id="comments" class="shadow uk-margin-top comments uk-background-default">
	<div class="comments-title b-b uk-flex uk-flex-middle">
		<span class="uk-flex-1">评论</span>
	<?php comments_number('<span class="uk-text-small uk-text-muted">暂无评论</span>', '<span class="uk-text-small uk-text-muted"><strong class="uk-text-warning">1</strong> 条评论</span>', '<span class="uk-text-small uk-text-muted"><strong class="uk-text-warning">%</strong> 条评论</span>' );?>
	</div>
	<div class="comment-list">
		<div id="respond" class="uk-flex comment-from uk-margin-bottom">
			<div class="avatar uk-margin-right">
				<?php
				if( is_user_logged_in() ){
					$user_id = get_current_user_id();
					$current_user = wp_get_current_user();
				?>
				<?php echo get_avatar( $user_id,46 );?>
				<?php }else{?>
				<?php echo get_avatar( $comment,46 );?>
				<?php }?>
			</div>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="uk-form uk-width-1-1">
				<?php if( is_user_logged_in() ){?>
				<textarea name="comment" id="comment" rows="3" class="b-r-4 uk-textarea uk-width-1-1 uk-text-small uk-margin-bottom" placeholder="Hi，<?php echo $current_user->display_name; ?>，请输入您的评论内容..."></textarea>
				<div class="comt-tips"><?php comment_id_fields(); do_action('comment_form', $post->ID); ?></div>
				<button class="uk-button change-color btn b-r-4">评论</button>
				<?php }else{?>
				<textarea name="comment" id="comment" rows="3" class="b-r-4 uk-textarea uk-width-1-1 uk-text-small uk-margin-bottom" readonly="readonly" placeholder="您必须登录后才能发布评论..." disabled></textarea>
				<?php }?>
			</form>
		</div>

		<?php if(have_comments()){ ?>
		<?php wp_list_comments('type=comment'); ?>

		<?php if( get_comment_pages_count() > 1 ){?>
		<!-- 评论翻页 -->
		<div class="pager primary">
			<?php the_comments_pagination(['prev_text'=>'<i class="fa fa-angle-double-left"></i>', 'next_text'=>'<i class="fa fa-angle-double-right"></i>']); ?>
		</div>
		<?php } ?>
		<?php } ?>
		<!-- 评论已关闭 -->
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' ); ?></p>
		<?php } ?>
	</div>
</div>