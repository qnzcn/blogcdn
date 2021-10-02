<?php if ( is_user_logged_in() ): ?> 
<div class="card shadow uk-margin-bottom">
	<div class="b-r-4 uk-height-1-1 uk-background-default uk-overflow-hidden uk-position-relative">
		<div class="title uk-flex uk-flex-middle">
			<div class="uk-flex-1 uk-flex uk-flex-middle">
				<i class="uk-display-inline-block"><img src="<?php bloginfo('template_url'); ?>/static/images/icon-user.png"/></i>
				<span class="uk-text-small">我的</span>
			</div>
		</div>
		<?php 
			global $current_user;
	        $user_id = get_current_user_id();
	    	$current_user = wp_get_current_user();
	    	$authorID = $current_user->ID;
        	$args = array(
        	    'post_author' => $authorID 
        	);
        	$author_comments = get_comments($args);
        ?>
        <div class="card-author b-r-4 uk-height-1-1 uk-flex-middle uk-overflow-hidden">
        	<div class="uk-flex uk-flex-middle" >
        		<a class="avatar b-r-4 uk-overflow-hidden uk-display-inline-block"><?php echo get_avatar( $authorID ,'48' ); ?></a>
        		<div class="uk-margin-small-left">
        			<span class="author-name uk-margin-remove uk-display-block uk-text-bold"><?php echo $current_user->display_name; ?></span>
        			<span class="roles-admin uk-display-inline-block"><?php check_user_role() ?></span>
        		</div>
        	</div>
        	<div class="author-des uk-text-muted uk-margin-top uk-margin-bottom">
        	<?php 
        		$description =get_the_author_meta( 'description', $authorID );
                if(!$description){
                    echo '我很懒。';
                }else {
                    echo get_the_author_meta( 'description', $authorID );
                }
        	?></div>
        	<div class="author-count b-t uk-position-bottom">
        		<div class="uk-grid-collapse" uk-grid>
        			<div class="author-count-item uk-position-relative uk-text-center uk-width-1-4">
        				<span>文章</span>
        				<div class="uk-text-bold"><?php echo count_user_posts($user_id); ?></div>
        			</div>
        			<div class="author-count-item uk-position-relative uk-text-center uk-width-1-4">
        				<span>收藏</span>
        				<div class="uk-text-bold"><?php
									$author = the_author_ID();
									$args = array(
										'post_author' => $author // fill in post author ID
									);
									$author_comments = get_comments($args);
									echo count($author_comments);
									?></div>
        			</div>
        			<div class="author-count-item uk-position-relative uk-text-center uk-width-1-4">
        				<span>评论</span>
        				<div class="uk-text-bold"><?php echo count($author_comments); ?></div>
        			</div>
        			<div class="author-count-item uk-position-relative uk-text-center uk-width-1-4">
        				<span>浏览</span>
        				<div class="uk-text-bold uk-margin-remove uk-text-truncate"><?php echo cx_posts_views($user_id); ?></div>
        			</div>
        		</div>
        	</div>
        </div>
	</div>
</div>
<?php endif; ?> 