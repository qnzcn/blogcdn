<div class="card shadow uk-margin-bottom">
	<div class="b-r-4 uk-height-1-1 uk-background-default uk-overflow-hidden">
		<div class="title uk-flex uk-flex-middle">
			<div class="uk-flex-1 uk-flex uk-flex-middle">
				<i class="uk-display-inline-block"><img src="<?php bloginfo('template_url'); ?>/static/images/icon-tags.png"/></i>
				<span class="uk-text-small">标签</span>
			</div>
			<a href="/tags" uk-tooltip="查看更多"><i class="iconfont icon-gengduo"></i></a>
		</div>
		<div class="tags uk-margin-remove">
			<?php wp_tag_cloud('number=16&orderby=count&order=DESC&smallest=12&largest=12&unit=px'); ?>
		</div>
	</div>
</div>