<?php 
/* Template Name: 热门标签 */ 
get_header(); 
get_template_part( 'template-parts/loop/loop', 'search' );
get_template_part( 'template-parts/loop/loop', 'nav' );?>
<section class="uk-container uk-margin-large-top">
	<div class="uk-flex uk-flex-middle">
		<div class="single-head uk-flex-1">
			<div class="uk-margin-large-bottom uk-padding-remove-left">
				<h1 class="uk-h2 uk-margin-small-bottom"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<div class="uk-margin-large-bottom" uk-grid="masonry: true">
		<?php 
		$tags_list = get_tags('orderby=count&order=DESC&number=44');
		if($tags_list) { 
			foreach($tags_list as $tag) {
				echo '<div class="uk-width-1-1@s uk-width-1-4@m uk-width-1-4@l uk-width-1-4@xl"><div class="page-tags-item uk-background-default b-a b-r-4"><div class="uk-margin-bottom b-b"><a class="name uk-margin-bottom uk-display-inline-block uk-position-relative" href="'.get_tag_link($tag).'">'. $tag->name .'</a><small class="uk-text-muted">x '. $tag->count .'</small></div>'; 
				$posts = get_posts( "tag_id=". $tag->term_id ."&numberposts=5" );
				if( $posts ){
					foreach( $posts as $post ) {
						setup_postdata( $post );
						echo '<li><a href="'.get_permalink().'">';
						echo the_title();	
						echo '</a></li>';
					}
				}
				echo '</div></div>';
			} 
		} 
		?>

	</div>
</section>
<?php get_footer(); ?>
