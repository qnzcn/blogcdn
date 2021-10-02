<section class="uk-slider" uk-slider style="padding-bottom:10px">
	<div class="uk-grid uk-grid-small uk-slider-items uk-child-width-1-4@xl uk-child-width-1-3@l  uk-child-width-1-2@m  uk-child-width-1-1@s">
		<?php 
        	$home_card = _aye('home_card');
        	if (is_array( $home_card) ):
        	if ($home_card) {
        		foreach ($home_card['enabled'] as $key => $value) {
        			get_template_part( 'template-parts/card/card', $key );
        		}
        	}
        	endif;
		?>
	</div>
</section>