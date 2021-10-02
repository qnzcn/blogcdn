<?php 
$home_cat = _aye('home_cat');
$article_num = _aye('article_num');
$home_show = _aye('home_show');

?>
<section class="images">
	<div class="ajaxMain uk-grid-small uk-margin-top" uk-grid="masonry: true">
		<?php query_posts('&showposts='.$article_num); while (have_posts()) : the_post(); ?>
		<div class="ajaxItem uk-width-1-2 uk-width-1-3@m  uk-width-1-4@l  uk-width-1-5@xl">
		    <?php 
		        if($home_show == '1'){
	                get_template_part( 'template-parts/loop/loop', 'img' );
	            }else {
	                get_template_part( 'template-parts/loop/loop', 'masonry' );
	            }
		    ?>
		</div>
		<?php endwhile; wp_reset_query(); ?>
	</div>
	<?php if( _aye('home_load' ) == 1){?>
	<div class="fenye uk-text-center uk-margin-medium uk-width-1-1 uk-margin-large-top">
		<?php fenye(); ?>
	</div>
	<? }else{ ?>
	<div id="pagination" class="ajaxBtn uk-text-center uk-margin-large-top uk-margin-large-bottom">
		<?php next_posts_link(__('点击查看更多')); ?>
	</div>
	<?php } ?>
</section>