<?php 
    get_header();
    get_template_part( 'template-parts/loop/loop', 'search' );
    get_template_part( 'template-parts/loop/loop', 'nav' );
?>
<section class="uk-grid-small uk-margin-top" uk-grid>
	<div class="uk-width-1-1 uk-width-1-1@m uk-width-expand@l uk-width-expand@xl">
		<div class="single b-r-4 shadow uk-background-default">
		    <?php while ( have_posts() ) : the_post(); ?>
			<div class="b-b uk-padding">
				<h1 class="uk-h5 uk-margin-remove"><?php the_title(); ?></h1>
				<div class="info uk-margin-small-top uk-flex uk-flex-middle uk-text-small">
				    <span class="uk-margin-medium-right"><?php the_author_posts_link(); ?></span>
			        <span class="uk-margin-medium-right uk-text-muted"><?php the_time('Y-m-d') ?> 创建</span>
			        <span class="uk-flex uk-flex-middle uk-text-muted"><i class="iconfont icon-see"></i><?php post_views('', ''); ?></span>
			    </div>
			</div>
			<div class="singleWarp uk-padding">
				<?php the_content(); ?>
			</div>
    		<?php if (_aye('single_cop') == true ): ?>
            <div class="b-t uk-padding uk-text-muted">
            	<div class="uk-margin-remove-bottom">
            	    <p class="uk-margin-small-bottom uk-margin-remove-top">标题：<?php the_title(); ?></p>
            	    <p class="uk-margin-small-bottom uk-margin-small-top">分类：<?php $category = get_the_category();	if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';} ?></p>
            		<p class="uk-margin-small-bottom uk-margin-small-top">链接：<?php the_permalink(); ?></p>
            		<p class="uk-margin-remove-bottom uk-margin-small-top">版权：<?php echo _aye('single_cop_text'); ?></p>
            	</div>
            </div>
            <?php endif ?>
			<div class="singleTags b-t uk-padding-small">
    			<div class="uk-text-truncate">
    				<i class="iconfont icon-discount"></i><?php the_tags('', '', '') ?>
    			</div>
    		</div>
			<?php endwhile; ?>
		</div>
		<?php if(_aye('comments_close') == true ): ?>	
		<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template( '', true ); ?>
		<?php endif; ?>
		<?php endif; ?>
	</div>
	<div class="uk-width-1-1 uk-width-1-1@m uk-width-auto@l uk-width-auto@lx">
		<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>
