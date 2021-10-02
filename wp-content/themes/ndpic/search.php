<?php 
    get_header();
    get_template_part( 'template-parts/loop/loop', 'search' );
    get_template_part( 'template-parts/loop/loop', 'nav' );
?>
<?php
	$allsearch = new WP_Query("s=$s&showposts=-1");
	$key = wp_specialchars($s, 1);
	$count = $allsearch->post_count;
	echo '<h1 class="uk-h3">「'. $key .'」</h1>';
	echo '<p class="uk-display-block uk-text-muted uk-margin-remove">共搜索到<strong> ' . $count .' </strong>条「' . $key .'」的相关内容。</p>' ;
	wp_reset_query(); 
?>
<section class="images">
	<div class="ajaxMain uk-grid-small uk-margin-top" uk-grid="masonry: true">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="ajaxItem uk-width-1-2 uk-width-1-3@m  uk-width-1-4@l  uk-width-1-5@xl">
			<?php get_template_part( 'template-parts/loop/loop', 'img' ); ?>
		</div>
		<?php endwhile; else: ?>
			<div class="uk-width-1-1">
			<div class="uk-alert-primary uk-width-1-2 uk-container" uk-alert>
				<a class="uk-alert-close" uk-close></a>
				<p class="uk-padding-small uk-text-center">这是一个没有灵魂的搜索词...</p>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="fenye uk-text-center uk-margin-medium uk-width-1-1 uk-margin-large-top">
		<?php fenye(); ?>
	</div>
</section>
<?php get_footer(); ?>
