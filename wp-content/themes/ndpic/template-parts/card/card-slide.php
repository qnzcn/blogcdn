<div class="card shadow uk-margin-bottom">
	<div class="b-r-4 uk-height-1-1 uk-flex-middle uk-background-default uk-overflow-hidden uk-position-relative">
		<div class="title uk-flex uk-flex-middle uk-position-absolute uk-position-z-index">
			<i class="uk-display-inline-block"><img src="<?php bloginfo('template_url'); ?>/static/images/icon-recom.png"/></i>
			<span class="uk-text-small" style="color: #fff">推荐</span>
		</div>
		<div class="slide uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: fade">
		    <ul class="uk-slideshow-items">
		        <?php 
					$slide = _aye('slide'); 
					if ($slide){
					foreach ( $slide as $key => $value){
				?>
				<li>
		        	<a href="<?php echo $value['link']; ?>" target="_blank">
		            	<img src="<?php echo $value['img']; ?>" alt="<?php the_title(); ?>" uk-cover />
		      		</a>
		        </li>
				<?php  }} ?>
		    </ul>
		    <a class="slide-arrow slide-arrow-left uk-position-center-left uk-position-small"  uk-slideshow-item="previous">
		    	<i class="iconfont icon-arrow-left"></i>
		    </a>
		    <a class="slide-arrow slide-arrow-right uk-position-center-right uk-position-small" uk-slideshow-item="next">
		    	<i class="iconfont icon-arrow-right"></i>
		    </a>
			<ul class="uk-slideshow-nav uk-text-center uk-position-bottom-center"></ul>
		</div>
	</div>
</div>