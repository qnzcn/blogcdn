<?php get_header();?>
<style>.entry-content {margin: 1.5em 0 0 !important;}</style>
<div class="single-thumbnail" style="background-image: url('<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=1927&h=1447&zc=1')">
	<div class="container">
		<div class="single-thumbnail-inside row align-items-end">
			<div class="single-title-zone ws-sr col">
				<span class="category">
					<?php  
						$category = get_the_category();
						if($category[0]){
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
						};
					?>
				</span>
				<h1><?php the_title(); ?></h1>
				<span class="date"><?php the_time('Y-m-d') ?></span>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row sr">
		<div class="content col-lg-9 mx-auto align-items-center">
			<?php while( have_posts() ): the_post(); $p_id = get_the_ID(); ?>
			<div class="single-top-area clearfix">
				<div class="author">
					<?php echo get_avatar( get_the_author_meta('email'), '57' ); ?>
					<div class="author-info">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a>
						<p>
							<?php if(get_the_author_meta('description')){ echo the_author_meta( 'description' );}else{echo'我还没有学会写个人说明！'; }?>
						</p>
					</div>
				</div>
				<!--div class="social-icons row align-items-center">
					预留分享
				</div-->
			</div>
			<article class="post hentry">
			<div class="entry-content">
				
					<?php the_content(); ?>
				
				<div class="tags">
					<?php the_tags('', ' ', ''); ?>
				</div>
				<div class="single-bottom-area">
					<!--div class="social-icons row align-items-center">
            			预留分享
					</div-->
				</div>
			</div>
			</article>
			<?php endwhile; ?>
			<?php include( 'template-parts/related.php' ); ?>
			<?php comments_template( '', true ); ?>
</div>
<?php get_sidebar();?>
</div>
</div>
<?php get_footer();?>


















