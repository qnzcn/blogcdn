<div class="item shadow b-r-4 uk-background-default uk-overflow-hidden">
	<a class="thumb uk-display-block uk-cover-container" href="<?php the_permalink(); ?>" target="_blank">
		<img src="<?php echo post_thumbnail_src(); ?>"  alt="<?php the_title(); ?>" />
	</a>
	<div class="uk-padding-small">
	    <div class="title uk-text-truncate">
	        <a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>
	    </div>
		<div class="info uk-flex uk-flex-middle uk-margin-top uk-text-muted uk-text-small">
			<div class="uk-flex-1"><?php the_author_posts_link(); ?></div>
			<span><?php echo time_since($post->post_date);?> 创建</span>
		</div>
	</div>
</div> 
    



