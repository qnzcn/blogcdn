<?php 
	get_header(); 
    $cat_style =  get_term_meta( $cat, 'cat_style', true );
    get_template_part( 'template-parts/loop/loop', 'search' );
    get_template_part( 'template-parts/home/home', 'card' );
    get_template_part( 'template-parts/loop/loop', 'nav' );
?>
<section class="category images uk-margin-top">
	<div class="ajaxMain uk-grid-small" uk-grid="masonry: true">
		<?php 
		    if ( have_posts() ) :  while ( have_posts() ) : the_post(); 
		    if ($cat_style == '1'){
		?>
		<div class="ajaxItem uk-width-1-1 uk-width-1-2@m uk-width-1-3@l uk-width-1-3@xl">
			<?php get_template_part( 'template-parts/loop/loop', 'text' );?>
		</div>
    	<?php } elseif ($cat_style == '3') { ?>
		<div class="ajaxItem uk-width-1-2 uk-width-1-3@m uk-width-1-4@l uk-width-1-5@xl">
			<?php get_template_part( 'template-parts/loop/loop', 'masonry' );?>
		</div>
		<?php }else { ?>
		<div class="ajaxItem uk-width-1-2 uk-width-1-3@m uk-width-1-4@l uk-width-1-5@xl">
			<?php get_template_part( 'template-parts/loop/loop', 'img' );?>
		</div>
		<?php } ?>
		
		<?php endwhile; else : ?>
		<p>抱歉，此分类暂无文章！</p>
		<?php endif; ?>
	</div>
	<?php if( _aye('cat_load' ) == 1){?>
	<div class="fenye uk-text-center uk-margin-medium uk-width-1-1 uk-margin-large-top">
		<?php fenye(); ?>
	</div>
	<? }else{ ?>
	<div id="pagination" class="ajaxBtn uk-text-center uk-margin-large-top uk-margin-large-bottom">
		<?php next_posts_link(__('点击查看更多')); ?>
	</div>
	<?php } ?>
</section>
<?php get_footer(); ?>