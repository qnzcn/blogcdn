<?php
//前端Ajax合集
function xintheme_index_list6(){

    $page = sanitize_text_field($_POST['data']['page']);

    $args = array(
        'paged'       => $page,
        'post_type'   => 'post',
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        //'post__not_in' => get_option( 'sticky_posts' ),

    );
    $category_posts = new WP_Query( $args );

    if( $category_posts->have_posts() ){ 
        $i = 0;
        while( $category_posts->have_posts() ) : $category_posts->the_post();
            $post = get_post();?>
		<article class="blog-post hentry row align-items-center">
		<div class="blog-post-thumbnail-zone col-12 col-lg-6">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=768&h=512&zc=1" class="blog-post-thumbnail" alt="<?php the_title(); ?>" sizes="(max-width: 768px) 100vw, 768px" width="768" height="512"></a>
		</div>
		<div class="blog-post-text-zone col-12 col-lg-6">
			<div class="author align-items-end">
				<?php echo get_avatar( get_the_author_meta('email'), '35' ); ?>
				<div class="author-info">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a>
				</div>
			</div>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="meta">
					<span><i class="fa fa-bars"></i> 
					<?php  
						$category = get_the_category();
						if($category[0]){
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
						};
					?>
					</span>&nbsp;
					<span class="date"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d') ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-eye"></i> <?php post_views('',''); ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-comments"></i> <?php echo get_post($post->ID)->comment_count; ?></span>
			</div>
			<p>
				<?php if ( wp_is_mobile() ){ ?>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 75,"……"); ?>
				<?php }else { ?>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 210,"……"); ?>
				<?php } ?>
			</p>
		</div>
		</article>
        <?php    unset($post);
            $i++;
        endwhile;
    }else{
        echo 0; 
    }

    die();
}
add_action( 'wp_ajax_xintheme_index_list6' , 'xintheme_index_list6' );
add_action( 'wp_ajax_nopriv_xintheme_index_list6' , 'xintheme_index_list6' );

function xintheme_index_list5(){

    $page = sanitize_text_field($_POST['data']['page']);

    $args = array(
        'paged'       => $page,
        'post_type'   => 'post',
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        //'post__not_in' => get_option( 'sticky_posts' ),

    );
    $category_posts = new WP_Query( $args );

    if( $category_posts->have_posts() ){ 
        $i = 0;
        while( $category_posts->have_posts() ) : $category_posts->the_post();
            $post = get_post();?>
		<div class="card">
			<article class="hentry">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=768&h=512&zc=1" class="card-img" alt="<?php the_title(); ?>" sizes="(max-width: 768px) 100vw, 768px" width="768" height="512">
			</a>
			<div class="card-img-overlay">
				<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="card-meta">
					<?php echo get_avatar( get_the_author_meta('email'), '20' ); ?>
					<span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a></span>
					<span class="author"><i class="fa fa-bars"></i> 
					<?php  
						$category = get_the_category();
						if($category[0]){
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
						};
					?>
					</span>
					<span class="date"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d') ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-eye"></i> <?php post_views('',''); ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-comments"></i> <?php echo get_post($post->ID)->comment_count; ?></span>
				</p>
			</div>
			</article>
		</div>
        <?php    unset($post);
            $i++;
        endwhile;
    }else{
        echo 0; 
    }

    die();
}
add_action( 'wp_ajax_xintheme_index_list5' , 'xintheme_index_list5' );
add_action( 'wp_ajax_nopriv_xintheme_index_list5' , 'xintheme_index_list5' );

function xintheme_index_list4(){

    $page = sanitize_text_field($_POST['data']['page']);

    $args = array(
        'paged'       => $page,
        'post_type'   => 'post',
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        //'post__not_in' => get_option( 'sticky_posts' ),

    );
    $category_posts = new WP_Query( $args );

    if( $category_posts->have_posts() ){ 
        $i = 0;
        while( $category_posts->have_posts() ) : $category_posts->the_post();
            $post = get_post();?>
		<div class="card">
			<article class="hentry">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=768&h=512&zc=1" class="card-img-top" alt="<?php the_title(); ?>" sizes="(max-width: 768px) 100vw, 768px" width="768" height="512">
			</a>
			<div class="card-body">
				<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="card-text">
				<?php if ( wp_is_mobile() ){ ?>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 75,"……"); ?>
				<?php }else { ?>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 115,"……"); ?>
				<?php } ?>
				</p>
				<p class="card-meta">
					<?php echo get_avatar( get_the_author_meta('email'), '20' ); ?>
					<span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a></span>
					<span class="author"><i class="fa fa-bars"></i> 
					<?php  
						$category = get_the_category();
						if($category[0]){
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
						};
					?>
					</span>
					<span class="date"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d') ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-eye"></i> <?php post_views('',''); ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-comments"></i> <?php echo get_post($post->ID)->comment_count; ?></span>
				</p>
			</div>
			</article>
		</div>
        <?php    unset($post);
            $i++;
        endwhile;
    }else{
        echo 0; 
    }

    die();
}
add_action( 'wp_ajax_xintheme_index_list4' , 'xintheme_index_list4' );
add_action( 'wp_ajax_nopriv_xintheme_index_list4' , 'xintheme_index_list4' );

function xintheme_index_list3(){

    $page = sanitize_text_field($_POST['data']['page']);

    $args = array(
        'paged'       => $page,
        'post_type'   => 'post',
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        //'post__not_in' => get_option( 'sticky_posts' ),

    );
    $category_posts = new WP_Query( $args );

    if( $category_posts->have_posts() ){ 
        $i = 0;
        while( $category_posts->have_posts() ) : $category_posts->the_post();
            $post = get_post();?>
		<div class="card">
			<article class="hentry">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=768&h=512&zc=1" class="card-img" alt="<?php the_title(); ?>" sizes="(max-width: 768px) 100vw, 768px" width="768" height="512">
			</a>
			<div class="card-img-overlay">
				<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="card-meta">
					<?php echo get_avatar( get_the_author_meta('email'), '20' ); ?>
					<span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a></span>
					<span class="author"><i class="fa fa-bars"></i> 
					<?php  
						$category = get_the_category();
						if($category[0]){
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
						};
					?>
					</span>
					<span class="date"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d') ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-eye"></i> <?php post_views('',''); ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-comments"></i> <?php echo get_post($post->ID)->comment_count; ?></span>
				</p>
			</div>
			</article>
		</div>
        <?php    unset($post);
            $i++;
        endwhile;
    }else{
        echo 0; 
    }

    die();
}
add_action( 'wp_ajax_xintheme_index_list3' , 'xintheme_index_list3' );
add_action( 'wp_ajax_nopriv_xintheme_index_list3' , 'xintheme_index_list3' );

function xintheme_index_list2(){

    $page = sanitize_text_field($_POST['data']['page']);

    $args = array(
        'paged'       => $page,
        'post_type'   => 'post',
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        //'post__not_in' => get_option( 'sticky_posts' ),

    );
    $category_posts = new WP_Query( $args );

    if( $category_posts->have_posts() ){ 
        $i = 0;
        while( $category_posts->have_posts() ) : $category_posts->the_post();
            $post = get_post();?>
		<div class="card">
			<article class="hentry">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=768&h=433&zc=1" class="card-img-top" alt="<?php the_title(); ?>" sizes="(max-width: 768px) 100vw, 768px" width="768" height="433">
			</a>
			<div class="card-body">
				<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="card-text">
				<?php if ( wp_is_mobile() ){ ?>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 75,"……"); ?>
				<?php }else { ?>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 115,"……"); ?>
				<?php } ?>
				</p>
				<p class="card-meta">
					<?php echo get_avatar( get_the_author_meta('email'), '20' ); ?>
					<span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a></span>
					<span class="author"><i class="fa fa-bars"></i> 
					<?php  
						$category = get_the_category();
						if($category[0]){
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
						};
					?>
					</span>
					<span class="date"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d') ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-eye"></i> <?php post_views('',''); ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-comments"></i> <?php echo get_post($post->ID)->comment_count; ?></span>
				</p>
			</div>
			</article>
		</div>
        <?php    unset($post);
            $i++;
        endwhile;
    }else{
        echo 0; 
    }

    die();
}
add_action( 'wp_ajax_xintheme_index_list2' , 'xintheme_index_list2' );
add_action( 'wp_ajax_nopriv_xintheme_index_list2' , 'xintheme_index_list2' );

function xintheme_index_list1(){

    $page = sanitize_text_field($_POST['data']['page']);

    $args = array(
        'paged'       => $page,
        'post_type'   => 'post',
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        //'post__not_in' => get_option( 'sticky_posts' ),

    );
    $category_posts = new WP_Query( $args );

    if( $category_posts->have_posts() ){ 
        $i = 0;
        while( $category_posts->have_posts() ) : $category_posts->the_post();
            $post = get_post();?>
		<div class="card">
			<article class="hentry">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=768&h=523&zc=1" class="card-img-top" alt="<?php the_title(); ?>" sizes="(max-width: 768px) 100vw, 768px" width="768" height="523">
			</a>
			<div class="card-body">
				<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="card-text">
				<?php if ( wp_is_mobile() ){ ?>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 75,"……"); ?>
				<?php }else { ?>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 80,"……"); ?>
				<?php } ?>
				</p>
				<p class="card-meta">
					<?php echo get_avatar( get_the_author_meta('email'), '20' ); ?>
					<span class="author">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a>
					</span>
					<span class="author"><i class="fa fa-bars"></i> 
					<?php  
						$category = get_the_category();
						if($category[0]){
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
						};
					?>
					</span>
					<span class="date"><i class="fa fa-clock-o"></i> <?php echo timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ); ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-eye"></i> <?php post_views('',''); ?></span>&nbsp;&nbsp;
					<span><i class="fa fa-comments"></i> <?php echo get_post($post->ID)->comment_count; ?></span>
				</p>
			</div>
			</article>
		</div>
        <?php    unset($post);
            $i++;
        endwhile;
    }else{
        echo 0; 
    }

    die();
}
add_action( 'wp_ajax_xintheme_index_list1' , 'xintheme_index_list1' );
add_action( 'wp_ajax_nopriv_xintheme_index_list1' , 'xintheme_index_list1' );

/**
 * 分类页面Ajax
 */
function xintheme_cat_list(){

    $page = sanitize_text_field($_POST['data']['page']);
    $cat = sanitize_text_field($_POST['data']['cat']);

    $args = array(
        'cat'                 => $cat,
        'paged'               => $page,
        'post_type'   => 'post',
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        'post__not_in' => get_option( 'sticky_posts' ),
    );
    $category_posts = new WP_Query( $args );

    if( $category_posts->have_posts() ){ 
        $i = 0;
        while( $category_posts->have_posts() ) : $category_posts->the_post();
            $post = get_post();?>
				<article class="blog-post hentry row align-items-center">
				<div class="blog-post-thumbnail-zone col-12 col-lg-6">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo xintheme_thumb(); ?>&w=768&h=523&zc=1" class="blog-post-thumbnail" alt="<?php the_title(); ?>" sizes="(max-width: 768px) 100vw, 768px" width="768" height="523"></a>
				</div>
				<div class="blog-post-text-zone col-12 col-lg-6">
					<div class="author align-items-end">
						<?php echo get_avatar( get_the_author_meta('email'), '35' ); ?>
						<div class="author-info">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" title="作者：<?php echo get_the_author() ?>" rel="author"><?php echo get_the_author() ?></a>
						</div>
					</div>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="meta">
						<span><i class="fa fa-bars"></i> 
						<?php  
							$category = get_the_category();
							if($category[0]){
							echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
							};
						?>
						</span>&nbsp;
						<span class="date"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d') ?></span>&nbsp;&nbsp;
						<span><i class="fa fa-eye"></i> <?php post_views('',''); ?></span>&nbsp;&nbsp;
						<span><i class="fa fa-comments"></i> <?php echo get_post($post->ID)->comment_count; ?></span>
					</div>
					<p>
					<?php if ( wp_is_mobile() ){ ?>
						<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 75,"……"); ?>
					<?php }else { ?>
						<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250,"……"); ?>
					<?php } ?>
					</p>
				</div>
				</article>
        <?php    unset($post);
            $i++;
        endwhile;
    }else{
        echo 0; 
    }

    die();
}
add_action( 'wp_ajax_xintheme_cat_list' , 'xintheme_cat_list' );
add_action( 'wp_ajax_nopriv_xintheme_cat_list' , 'xintheme_cat_list' );