				</main>
				<footer id="footer" class="uk-margin-large-top uk-overflow-hidden">
					<?php 
						if(_aye('link_show') == true ): 
						if (is_home() || is_front_page()) :
					?>
					<div class="link uk-container uk-text-center uk-margin-bottom">
					    <ul class="uk-margin-remove uk-padding-small">
    				    	<?php wp_list_bookmarks('title_li='); ?>
    					</ul>
					</div>
					<?php endif; endif; ?>
					<div class="footDB uk-text-center">
						<?php aye_menu('page-nav'); ?>
					</div>
					<div class="footCop uk-text-center uk-margin-top uk-margin-medium-bottom uk-text-muted">
						<span class="uk-margin-right"><?php echo _aye('cop_text'); ?></span>
						<?php if(_aye('show_beian') == true): ?>
						<span class="uk-margin-right">鄂ICP备18001037号</span>
						<?php endif; ?>
						<?php if(_aye('load_time') == true ): ?>
						<span class="uk-margin-right uk-visible@s">共 <?php echo get_num_queries(); ?> 次Sql查询，耗时 <?php timer_stop(1); ?> 秒</span>
						<?php endif;?>
					</div>
					<div class="gotop b-a b-r-4 uk-animation-slide-bottom-small uk-background-default">
					   	<?php 
    					    $gotop_qq = _aye('gotop_qq'); 
    					    $gotop_wx = _aye('gotop_wx'); 
    					    $dark_show = _aye('dark_show');
    					?>
    					<a class="b-b uk-display-block" href="#header" uk-scroll><i class="iconfont icon-arrow-up"></i></a>
    					<?php if($dark_show == true): ?>
    					<a class="night b-b uk-display-block" href="javascript:switchNightMode()" target="_self" uk-tooltip="白昼/黑夜模式切换"><i class="iconfont icon-nightmode-fill"></i></a>
    					<?php endif; ?>
    					<a class="b-b uk-display-block" href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo $gotop_qq ?>&amp;Site=ioshenmue&amp;Menu=yes" rel="nofollow" target="_blank"><i class="iconfont icon-QQ"></i></a>
    					<a class="b-b uk-display-block" href="#wecha" uk-toggle><i class="iconfont icon-wechat-fill"></i></a>
    					<a class="b-b uk-display-block" href="#footer" uk-scroll><i class="iconfont icon-arrow-down"></i></a>
    				</div>
    				<div id="wecha" uk-modal>
                        <div class="uk-modal-dialog uk-modal-body uk-text-center">
                            <div class="b-b uk-padding-remove-bottom uk-margin-bottom">
        	                    <h3 class="uk-display-block">扫码添加好友</h3>
                	        </div>
                	         <p><img src="<?php echo $gotop_wx ?>" /></p>
                        </div>
                    </div>
                    
					<?php wp_footer(); ?>
				</footer>
			</main>
		</div>
	</body>
</html>
