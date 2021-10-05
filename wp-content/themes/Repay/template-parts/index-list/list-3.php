<style>.btn-load-more-posts {margin-left: 0px;}</style>
<div class="slice type4">
	<h2 class="slice-title">最新文章</h2>
	<div class="card-deck xintheme_index_list3">
		<?php
			$args = array(
			'ignore_sticky_posts' => 1,
			'paged' => $paged
			);	
			query_posts($args);
			if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>
		<div class="card">
			<article class="hentry">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=768&h=512&zc=1" class="card-img" alt="<?php the_title(); ?>" sizes="(max-width: 768px) 100vw, 768px" width="768" height="512">
			</a>
			<div class="card-img-overlay">
				<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="card-meta">
					<?php echo get_avatar( get_the_author_meta('email'), '20' ); ?>
					<span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a></span>
					<span class="author"><i class="fa fa-bars"></i> 
					<?php  
						$category = get_the_category();
						if($category[0]){
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
						};
					?>
					</span>
					<span class="date"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d') ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-eye"></i> <?php post_views('',''); ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-comments"></i> <?php echo get_post($post->ID)->comment_count; ?></span>
				</p>
			</div>
			</article>
		</div>
		<?php endwhile; endif; wp_reset_query();?>
	</div>
	<?php if( $GLOBALS["wp_query"]->max_num_pages > 1 ){ ?>
	<div class="load-more-posts-container">
		<a class="ajax_load btn-load-more-posts" data-action="xintheme_index_list3" data-page="2" ontouchstart="">加载更多</a>
	</div>
	<?php } ?>
</div>