<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Muiteer
 */

get_header(); ?>
    <?php
	    if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
	    	echo '<div class="muiteer-lazy-load not-found" muiteer-data-src="' . esc_url( get_theme_mod('muiteer_404_bg') ) . '"></div>';
	    } else {
	    	echo '<div class="not-found" style="background-image: url(' . get_theme_mod('muiteer_404_bg') . ')"></div>';
	    }
    ?>
	<section class="not-found-container">
		<div class="not-found-box">
			<h1><?php esc_html_e('Oops!', 'muiteer'); ?></h1>
			<?php
				if (get_theme_mod('muiteer_404_slogan') == '') {
					echo '<h3>' . esc_html__('The page you&rsquo;re looking for can&rsquo;t be found. Please try again later.', 'muiteer') . '</h3>';
				} else {
					echo '
						<h3>' . esc_html__(get_theme_mod('muiteer_404_slogan'), 'muiteer') . '</h3>
					';
				}
			?>
			<a class="button button-primary button-round ajax-link" href="<?php echo esc_url( home_url('/') ); ?>"><?php esc_html_e('Return to the homepage', 'muiteer'); ?></a>
		</div>
	</section>
<?php get_footer();
