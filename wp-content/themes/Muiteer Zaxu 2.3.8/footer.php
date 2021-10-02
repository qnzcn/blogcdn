<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Muiteer
 */

?>
						</main>
					</div>
				</div>
			</div>
		</div>

		<?php if (get_theme_mod('muiteer_post_widget_sidebar', 'disabled') === 'enabled' && is_singular('post') || get_theme_mod('muiteer_portfolio_widget_sidebar', 'disabled') === 'enabled' && is_singular("portfolio") ) : ?>
			<aside class="site-sidebar">
				<div class="site-sidebar-wrap">
					<header class="site-sidebar-header">
						<div class="site-sidebar-title">
							<span class="close"></span>
							<h3><?php echo esc_html__('Sidebar', 'muiteer'); ?></h3>
						</div>
					</header>
					<div class="site-sidebar-content">
						<?php dynamic_sidebar('sidebar-main'); ?>
					</div>
				</div>
			</aside>
		<?php endif; ?>

		<footer class="site-footer wrapper" role="contentinfo">
			<?php
				// Social icon
				if (get_theme_mod('muiteer_social_icon', 'disabled') === 'enabled') {
					muiteer_social_icon();
				};

				// Google Analytics
				if (get_theme_mod('muiteer_google_analytics') != '') {
					echo "
						<script type='text/javascript'>
							(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
						      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
						      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
						      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
						      ga('create', '" . get_theme_mod('muiteer_google_analytics') . "', 'auto');
						      ga('send', 'pageview');
						</script>
					";
				};
			?>
			<section class="footer-statement-container">
				<?php muiteer_footer_information(); ?>
			</section>
		</footer>
		
		<?php
			// Loading transition
			if (get_theme_mod('muiteer_page_transition', 'linear') === "rotate") {
				$loading_mode = "rotate";
			} else if (get_theme_mod('muiteer_page_transition', 'linear') === "swipe") {
				$loading_mode = "swipe";
			} else if (get_theme_mod('muiteer_page_transition', 'linear') === "linear") {
				$loading_mode = "linear";
			};
			echo '<section class="page-loading-transition ' . $loading_mode . '"></section>';

			muiteer_search_bar("desktop");
			muiteer_sharing("desktop");
			muiteer_site_poster();
			muiteer_global_qrcode_popup("sharing");

			// WeChat
			if ( get_theme_mod('muiteer_social_icon', 'disabled') === 'enabled' ) {
				if ( get_theme_mod('muiteer_social_wechat_qr_code') != '') {
					muiteer_global_qrcode_popup("wechat");
				}
			};

			// TikTok
			if (get_theme_mod('muiteer_social_icon', 'disabled') === 'enabled') {
				if (get_theme_mod('muiteer_social_tiktok_qr_code') != '') {
					muiteer_global_qrcode_popup("tiktok");
				}
			};
		?>
		
		<div class="compatible-tips-container">
			<div class="message">
				<p><?php esc_html_e('We noticed that your browser version is too low. This site requires a more modern browser to fully display, we recommend that you can download Google Chrome browser to browse this site.', 'muiteer'); ?></p>
				<a href="<?php echo esc_url('https://www.google.com/chrome/'); ?>" rel="nofollow" target="_blank" class="button button-primary button-small"><?php esc_html_e('Download Chrome', 'muiteer'); ?></a>
			</div>
		</div>

		<?php wp_footer(); ?>
		<noscript><?php esc_html_e('Your browser does not support JavaScript!', 'muiteer'); ?></noscript>
	</body>
</html>