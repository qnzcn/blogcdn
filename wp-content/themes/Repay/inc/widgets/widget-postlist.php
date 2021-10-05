<?php
//2和1文章插件
//widget neori_recent_posts_widget

add_action('widgets_init', create_function('', 'return register_widget("neori_recent_posts_widget");'));
class neori_recent_posts_widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'description' => '可以选择显示最新文章、随机文章。' );
		parent::__construct('neori_recent_posts_widget', __('文章展示（图文）'), $widget_ops);
	}

    function widget($args, $instance) {
        extract( $args );
		$limit = $instance['limit'];
		$title = apply_filters('widget_name', $instance['title']);
		$cat          = $instance['cat'];
		$orderby      = $instance['orderby'];
		echo $before_widget;
		echo $before_title.$title.$after_title; 
        echo ztmao_widget_postlist($orderby,$limit,$cat);
        echo $after_widget;	
    }

	function form($instance) {
		$instance['title'] = ! empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$instance['orderby'] = ! empty( $instance['orderby'] ) ? esc_attr( $instance['orderby'] ) : '';
		$instance['cat'] = ! empty( $instance['cat'] ) ? esc_attr( $instance['cat'] ) : '';
		$instance['limit']    = isset( $instance['limit'] ) ? absint( $instance['limit'] ) : 5;
?>
<p style="clear: both;padding-top: 5px;">
	<label>显示标题：（例如：最新文章、随机文章）
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
	</label>
</p>
<p>
	<label> 排序方式：
		<select style="width:100%;" id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" style="width:100%;">
			<option value="date" <?php selected('date', $instance['orderby']); ?>>发布时间</option>
			<option value="rand" <?php selected('rand', $instance['orderby']); ?>>随机文章</option>
		</select>
	</label>
</p>
<p>
	<label>
		分类限制：
		<p>只显示指定分类，填写数字，用英文逗号隔开，例如：1,2 </p>
		<p>排除指定分类的文章，填写负数，用英文逗号隔开，例如：-1,-2。</p>
		<input style="width:100%;" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="text" value="<?php echo $instance['cat']; ?>" size="24" />
	</label>
</p>
<p>
	<label> 显示数目：
		<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" value="<?php echo $instance['limit']; ?>" />
	</label>
</p>
<p><?php show_category() ?><br/><br/></p>
<?php
	}
}

function ztmao_widget_postlist($orderby,$limit,$cat){
?>

<div class="recent-posts-widget">
			<?php
				$args = array(
								'post_status' => 'publish', // 只选公开的文章.
								'post__not_in' => array(get_the_ID()),//排除当前文章
								'ignore_sticky_posts' => 1, // 排除置頂文章.
								'orderby' =>  $orderby, // 排序方式.
								'cat'     => $cat,
								'order'   => 'DESC',
								'showposts' => $limit,
								'tax_query' => array( array( 
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array(
									//请根据需要保留要排除的文章形式
									'post-format-aside',
									
									),
								'operator' => 'NOT IN',
								) ),
							);
				$query_posts = new WP_Query();
				$query_posts->query($args);
				$i=1;
				while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>
				<?php if($i == 1){ ?>
				
	<div class="recent-post row">
		<div class="recent-post-thumbnail col-5">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img width="1024" height="695" src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=1024&h=695&zc=1" class="recent-post-image wp-post-image" alt="<?php the_title(); ?>">
			</a>
		</div>
		<div class="recent-post-text col-7 d-flex align-items-center">
			<h2 class="recent-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="recent-title"><?php echo mb_strimwidth(get_the_title(), 0, 36, '……'); ?></a>
			</h2>
		</div>
	</div>

				<?php }else{ ?>
	<div class="recent-post row">
		<div class="recent-post-thumbnail col-5">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img width="1024" height="695" src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=1024&h=695&zc=1" class="recent-post-image wp-post-image" alt="<?php the_title(); ?>">
			</a>
		</div>
		<div class="recent-post-text col-7 d-flex align-items-center">
			<h2 class="recent-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="recent-title"><?php echo mb_strimwidth(get_the_title(), 0, 36, '……'); ?></a>
			</h2>
		</div>
	</div>
				<?php } $i++;} wp_reset_query();?>

		</div>

<?php
}
?>
