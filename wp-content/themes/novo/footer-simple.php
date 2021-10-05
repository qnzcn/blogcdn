<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package novo
 */
?>
			<?php if(yprm_get_theme_setting('footer') == 'show') { ?>
				<footer class="site-footer simple main-row">
					<div class="container-fluid">
						<div class="copyright"><?php echo wp_kses(yprm_get_theme_setting('copyright_text'), 'post') ?></div>
					</div>
				</footer>
			<?php } ?>
		</div>
		
		<?php wp_footer(); ?>

	</body>
</html>
