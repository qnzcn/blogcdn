<div class="ws">
	<div class="related-posts row">
		<div class="card-deck">
			<?php
			$post_num = 3;
			$exclude_id = $post->ID;
			$posttags = get_the_tags(); $i = 0;
			if ( $posttags ) {
			$tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->term_id . ',';
			$args = array(
			'post_status' => 'publish',
			'tag__in' => explode(',', $tags),
			'post__not_in' => explode(',', $exclude_id),
			'ignore_sticky_posts' => 1,
			'orderby' => 'comment_date',
			'posts_per_page' => $post_num
			);
			query_posts($args);
			while( have_posts() ) { the_post(); ?>
			<div class="custom-card">
				<div class="card bg-black text-white">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=414&h=281&zc=1" class="card-img" alt="<?php the_title(); ?>">
					</a>
					<div class="card-img-overlay">
						<h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
				</div>
				<div class="meta-zone">
					<?php echo get_avatar( get_the_author_meta('email'), '20' ); ?> <span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a></span><span class="date"><?php the_time('Y-m-d') ?></span>
				</div>
			</div>
			<?php
			$exclude_id .= ',' . $post->ID; $i ++;
			} wp_reset_query();
			}
			if ( $i < $post_num ) {
			$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
			$args = array(
			'category__in' => explode(',', $cats),
			'post__not_in' => explode(',', $exclude_id),
			'ignore_sticky_posts' => 1,
			'orderby' => 'comment_date',
			'posts_per_page' => $post_num - $i
			);
			query_posts($args);
			while( have_posts() ) { the_post(); ?>
			<div class="custom-card">
				<div class="card bg-black text-white">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=414&h=281&zc=1" class="card-img" alt="<?php the_title(); ?>">
					</a>
					<div class="card-img-overlay">
						<h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
				</div>
				<div class="meta-zone">
					<?php echo get_avatar( get_the_author_meta('email'), '20' ); ?> <span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a></span><span class="date"><?php the_time('Y-m-d') ?></span>
				</div>
			</div>
			<?php $i++;
			} wp_reset_query();
			}
			if ( $i  == 0 )  echo '<h4 class="card-title">暂无相关文章!</h4>';
			?>
		</div>
	</div>
</div>