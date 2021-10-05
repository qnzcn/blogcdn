<?php get_header();?>
<div class="container">
	<div class="row">
		<div class="content col-lg-12 mx-auto align-items-center">
			<article class="page type-page status-publish hentry">
			<div class="entry-content">
				<?php include( 'template-parts/banner.php' ); ?>
				<?php $list_type = xintheme('list_region');
				if($list_type == 'list1' ) : include( 'template-parts/index-list/list-1.php' );
				elseif($list_type == 'list2') : include( 'template-parts/index-list/list-2.php' );
				elseif($list_type == 'list3') : include( 'template-parts/index-list/list-3.php' );
				elseif($list_type == 'list4') : include( 'template-parts/index-list/list-4.php' );
				elseif($list_type == 'list5') : include( 'template-parts/index-list/list-5.php' );
				elseif($list_type == 'list6') : include( 'template-parts/index-list/list-6.php' );
				else : include( 'template-parts/index-list/list-1.php' );
				endif; ?>
			</div>
			</article>
		</div>
	</div>
</div>
<?php get_footer();?>