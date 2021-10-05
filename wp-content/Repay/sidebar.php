<aside class="sidebar col-12 col-sm-6 col-md-6 col-lg-3 mx-auto align-items-center widget-area" id="secondary">
	<?php 
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_right')) : endif; 

	if (is_single()){
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_post')) : endif; 
	}

	else if (is_page()){
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_page')) : endif; 
	}

	else if (is_home()){
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_sidebar')) : endif; 
	}
	else {
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('widget_other')) : endif; 
	}
	?>
</aside>