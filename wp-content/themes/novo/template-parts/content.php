<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package novo
 */


$class = "";

$type = 'horizontal';

$id = get_the_ID(); 
$item = get_post($id);
setup_postdata($item);
$name = $item->post_title;
$thumb = get_post_meta( $id, '_thumbnail_id', true );
$link = get_permalink($id);

$desc_size = '455';

if(function_exists('get_field') && !empty(get_field('short_desc'))) {
	$desc = strip_tags(strip_shortcodes(get_field('short_desc')));
} else {
	$desc = strip_tags(strip_shortcodes($item->post_content));
}

$desc = substr($desc, 0, $desc_size);
$desc = rtrim($desc, "!,.-");
$desc = substr($desc, 0, strrpos($desc, ' '))."...";

$class = "";
if(!empty($thumb)) {
	$class = " with-image";
}

if(!class_exists('WPBakeryShortCode')) {
	$class .= " min";
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item col-12'.$class) ?>>
	<div class="wrap">
		<?php if(!empty($thumb)) { ?>
		<div class="img"><a href="<?php echo esc_url($link); ?>" style="background-image: url(<?php echo wp_get_attachment_image_src($thumb, 'large')[0] ?>);"></a></div>
		<?php } ?>
		<div class="content">
			<h5><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($name); ?></a></h5>
			<div class="date">
				<?php if(is_sticky()) { ?>
				<div class="sticky-a"><i class="basic-ui-icon-clip"></i> <span><?php echo esc_html__('Sticky ', 'novo') ?></span></div>
				<?php } ?>
				<?php echo get_the_date() ?>
			</div>
			<?php if(!class_exists('WPBakeryShortCode')) { ?>
			<div class="text"><?php the_content(); ?></div>
			<?php } else { ?>
			<p><?php echo esc_html($desc); ?></p>
			<?php } if(function_exists('wp_link_pages')) { ?>
			<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>')); ?>
			<?php } ?>
		</div>
		<div class="clear"></div>
		<div class="bottom like-on comment-on">
			<?php if(function_exists('zilla_likes')){ ?>
			<div class="col"><?php echo zilla_likes($id) ?></div>
			<?php } ?>
			<div class="col"><i class="multimedia-icon-speech-bubble-1"></i> <a href="<?php echo esc_url($link); ?>#comments"><?php echo get_comments_number_text() ?></a></div>
		</div>
	</div>
</article>
<?php wp_reset_postdata(); ?> 