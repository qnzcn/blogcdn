<?php 
    global $wp_query;
    $cat_ID = get_query_var('cat');
?>
<section class="nav shadow b-r-4 uk-flex uk-flex-middle uk-background-default uk-position-relative uk-margin-medium-top">
	<ul class="uk-flex-1">
		<?php aye_menu('main-nav'); ?>
	</ul>
	<?php if(is_category()){ ?>
	<div>共<span class="uk-text-warning"><?php echo get_cat_postcount($cat_ID);?></span>图集</div>
	<?php } ?>
</section>