<div class="card shadow uk-margin-bottom">
	<div class="b-r-4 uk-height-1-1 uk-flex-middle uk-background-default uk-overflow-hidden">
		<div class="title uk-flex uk-flex-middle">
			<i class="uk-display-inline-block"><img src="<?php bloginfo('template_url'); ?>/static/images/icon-time.png"/></i>
			<span class="uk-text-small">最新</span>
		</div>
		<ul class="notice uk-margin-remove">
            <?php query_posts('showposts=5'); ?>
            <?php while (have_posts()) : the_post(); ?>  
		    <li>
				<a class="uk-display-block uk-text-truncate" href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a>
			</li>
			<?php endwhile; wp_reset_query(); ?>
		</ul>
	</div>
</div>