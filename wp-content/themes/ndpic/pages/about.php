<?php 
/* Template Name: 单页合集 */ 
get_header(); 
get_template_part( 'template-parts/loop/loop', 'nav' );
?>

	<div class="uk-padding uk-container">
		<div class="uk-container">
			<h3 class="page-title"><?php the_title(); ?></h3>
		</div>	
	</div>
	<div class="uk-container">
		<div class="page-about uk-margin-medium-bottom" uk-grid>
			<div class="uk-width-1-6 uk-margin-bottom uk-visible@s">
				<div class="page-menu b-a uk-background-default">
					<ul class="uk-list uk-margin-remove">
						<?php aye_menu('page-nav'); ?>
					</ul>
				</div>
			</div>
			<div class="uk-width-1-1@s uk-width-5-6@m uk-width-5-6@l uk-width-5-6@xl">
				<div class="page-main single-content b-r-4 b-a uk-padding uk-background-default uk-margin-medium-bottom">
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
		</div>
	</div>
<?php get_footer(); ?>
