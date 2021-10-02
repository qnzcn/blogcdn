<?php get_header(); ?>
<?php
    get_template_part( 'template-parts/loop/loop', 'search' );
    get_template_part( 'template-parts/loop/loop', 'nav' );
?>
<section class="uk-margin-medium-top">
    <div class="author images">
    	<h4>TA的动态</h4>
    	<div class="ajaxMain uk-grid-small uk-margin-top" uk-grid="masonry: true">
    		<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
    		<div class="ajaxItem uk-width-1-2 uk-width-1-2@s  uk-width-1-3@m  uk-width-1-5@x  uk-width-1-5@xl">
    			<?php get_template_part( 'template-parts/loop/loop', 'img' );?>
    		</div>
    		<?php endwhile; endif; ?>
    	</div>
    	<div class="fenye uk-text-center uk-margin-medium uk-width-1-1 uk-margin-large-top">
    		<?php fenye(); ?>
    	</div>
    </div>
</section>
<?php get_footer(); ?>
