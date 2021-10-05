<?php if( xintheme('index_banner') ) : ?>
<div id="carousel" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php  
			$sticky = get_option('sticky_posts');  
			rsort( $sticky );  
			$sticky = array_slice( $sticky, 0, 3);   
			query_posts( array( 'post__in' => $sticky, 'ignore_sticky_posts'=>3, 'posts_per_page'=>3) );
			if (have_posts()) : $count = 1; 
			while (have_posts()) : the_post();  
		?>
		<?php if($count == 1){?>
		<div class="carousel-item active">
			<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=1921&h=1573&zc=1" class="d-block w-100 carousel-image" alt="<?php the_title(); ?>" title="First slide" width="1921" height="1573">
			<div class="carousel-caption d-block">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="d-sm-block d-md-none">
					<a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 80,"……"); ?></a>
				</p>
				<p class="d-none d-md-block">
					<a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 125,"……"); ?></a>
				</p>
			</div>
		</div>
		<?php }else{?>
		<div class="carousel-item">
			<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=1921&h=1573&zc=1" class="d-block w-100 carousel-image" alt="<?php the_title(); ?>" title="First slide" width="1921" height="1573">
			<div class="carousel-caption d-block">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="d-sm-block d-md-none">
					<a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 80,"……"); ?></a>
				</p>
				<p class="d-none d-md-block">
					<a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 125,"……"); ?></a>
				</p>
			</div>
		</div>
		<?php }$count++;?>
		<?php endwhile; endif; wp_reset_query();?> 
	</div>
	<a class="carousel-control-next" href="#carousel" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
</div>
<?php endif; ?>