<div class="sidebar">
    <?php 
    	$side_card = _aye('side_card');
    	if (is_array( $side_card) ):
    
    
    	if ($side_card) {
    		foreach ($side_card['enabled'] as $key => $value) {
    			get_template_part( 'template-parts/card/card', $key );
    		}
    	}
    	endif;
	?>
</div>