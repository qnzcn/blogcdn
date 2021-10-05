<style>
.blog-post .photo {
    margin-right: 10px;
    width: 26px;
    height: 26px;
    float: left;
    border-radius: 50%;
}
</style>
<div class="slice type7">
	<h2 class="slice-title">最新文章</h2>
	<div class="card-deck more-posts-deck xintheme_index_list6">
		<?php
			$args = array(
			'ignore_sticky_posts' => 1,
			'paged' => $paged
			);	
			query_posts($args);
			if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>
		<article class="blog-post hentry row align-items-center">
		<div class="blog-post-thumbnail-zone col-12 col-lg-6">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=768&h=512&zc=1" class="blog-post-thumbnail" alt="<?php the_title(); ?>" sizes="(max-width: 768px) 100vw, 768px" width="768" height="512"></a>
		</div>
		<div class="blog-post-text-zone col-12 col-lg-6">
			<div class="author align-items-end">
				<?php echo get_avatar( get_the_author_meta('email'), '35' ); ?>
				<div class="author-info">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a>
				</div>
			</div>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="meta">
					<span><i class="fa fa-bars"></i> 
					<?php  
						$category = get_the_category();
						if($category[0]){
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
						};
					?>
					</span>&nbsp;
					<span class="date"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d') ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-eye"></i> <?php post_views('',''); ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-comments"></i> <?php echo get_post($post->ID)->comment_count; ?></span>
			</div>
			<p>
				<?php if ( wp_is_mobile() ){ ?>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 75,"……"); ?>
				<?php }else { ?>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 240,"……"); ?>
				<?php } ?>
			</p>
		</div>
		</article>
		<?php endwhile; endif; wp_reset_query();?>
	</div>
	<?php if( $GLOBALS["wp_query"]->max_num_pages > 1 ){ ?>
	<div class="load-more-posts-container">
		<a class="ajax_load btn-load-more-posts" data-action="xintheme_index_list6" data-page="2" ontouchstart="">加载更多</a>
	</div>
	<?php } ?>
</div>