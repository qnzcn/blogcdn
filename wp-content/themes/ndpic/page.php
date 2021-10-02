<?php
/*
Template Name: 默认
*/
?>
<?php 
get_header(); 
get_template_part( 'template-parts/loop/loop', 'nav' );
?>
<section class="uk-container uk-margin-medium-bottom">
	<div class="uk-flex uk-flex-middle">
		<div class="uk-flex-1">
			<div class="uk-padding uk-padding-remove-left">
				<h1 class="uk-h2 uk-margin-small-bottom"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<div class="uk-container">
		<div class="uk-background-default single-content uk-padding uk-margin-medium-bottom">
			<?php while(have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; ?>
		</div>	
		<?php if(_aye('comments_close') == true ): ?>	
		<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template( '', true ); ?>
		<?php endif; ?>
		<?php endif; ?>

	</div>
</section>
<?php get_footer(); ?>