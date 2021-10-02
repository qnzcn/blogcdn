<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Muiteer
 */

?>

<?php if ( is_home() && current_user_can('publish_posts') ) : ?>
	<div class="no-result">
		<h3><?php esc_html_e('You have not published any articles.', 'muiteer'); ?></h3>
		<p class="publish-post"><?php echo __('Ready to publish your first post?', 'muiteer') . ' <a href="' . esc_url( admin_url('post-new.php') ) . '" class="button button-primary button-mini">' . __('Get started here', 'muiteer') . '</a>'; ?></p>
	</div>
<?php elseif ( is_search() ) : ?>
	<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'muiteer'); ?></p>
	<?php
		get_search_form();
else : ?>
	<div class="no-result">
		<h3><?php esc_html_e('Oops! No articles have been published here.', 'muiteer'); ?></h3>
		<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'muiteer'); ?></p>
		<?php get_search_form(); ?>
	</div>
<?php endif; ?>