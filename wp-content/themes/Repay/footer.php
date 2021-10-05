	<footer class="footer">
	<div class="container">
		<div class="social-icons">
			<?php 
			$footer_qq_url = xintheme('footer_qq_url');
			if( xintheme('footer_qq') ) : ?>
			<a rel="nofollow" target="_blank" href="<?php echo $footer_qq_url; ?>"><i class="fa fa-qq"></i></a>
			<?php endif; ?>
			<?php if( xintheme('footer_weixin') ) : ?>
			<a class="wechat"><i class="fa fa-wechat"></i><div class="wechatimg2"><img src="<?php echo xintheme_img('footer_weixin_img','');?>"></div></a>
			<?php endif; ?>
			<?php 
			$footer_mail_url = xintheme('footer_mail_url');
			if( xintheme('footer_mail') ) : ?>
			<a rel="nofollow" target="_blank" href="mailto:<?php echo $footer_mail_url; ?>"><i class="fa fa-envelope"></i></a>
			<?php endif; ?>
			<?php 
			$footer_weibo_url = xintheme('footer_weibo_url');
			if( xintheme('footer_weibo') ) : ?>
			<a rel="nofollow" target="_blank" href="<?php echo $footer_weibo_url; ?>"><i class="fa fa-weibo"></i></a>
			<?php endif; ?>
		</div>
		<p class="copyright">
			Copyright <?php echo date('Y'); ?> <?php bloginfo('name'); ?> <?php echo xintheme('footer_icp');?> Theme by <a href="http://www.xintheme.com">XINTHEME</a>
		</p>
	</div>
	</footer>
	<a href="#" class="buttontop-top"><i class="fa fa-arrow-up"></i></a>
</div>
<script type='text/javascript'>
/* <![CDATA[ */
var sticky_anything_engage = {"element":".sidebar","topspace":"0","minscreenwidth":"991","maxscreenwidth":"999999","zindex":"1","legacymode":"","dynamicmode":"","debugmode":"","pushup":".footer","adminbar":"1"};
/* ]]> */
</script>
<?php wp_footer(); ?>
<?php echo xintheme('foot_code');?>
</body>
</html>