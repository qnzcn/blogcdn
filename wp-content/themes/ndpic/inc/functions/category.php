<?php

/*
 * ------------------------------------------------------------------------------
 * WordPress添加自定义菜单
 * ------------------------------------------------------------------------------
 */
register_nav_menus(
	array(
		'page-nav' => __( '页面菜单' ),
		'main-nav' => __( '主菜单' ),
	)
);


/**
 * aye_menu() 函数
 * 功能：直接调用WordPress菜单的li
 * @Param string $str			要截取的原始字符串
 * @Param int $len				截取的长度
 * @Param string $suffix		字符串结尾的标识
 * @Return string					处理后的字符串
 */
function aye_menu($location){
    if ( function_exists( 'wp_nav_menu' ) && has_nav_menu($location) ) {
        wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => $location, 'depth'=>2 ) );
    } else {
        echo '<li><a href="'.get_bloginfo('url').'/wp-admin/nav-menus.php">请到[后台->外观->菜单]中设置菜单。</a></li>';
    }

}


/*
 * ------------------------------------------------------------------------------
 * WordPress去除菜单多余类名
 * ------------------------------------------------------------------------------
 */

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item','current-post-ancestor','current-menu-ancestor','current-menu-parent')) : '';
}

/*
 * ------------------------------------------------------------------------------
 * WordPress获取当前分类一周文章数量
 * ------------------------------------------------------------------------------
 */
function wt_get_category_count($input = '') {
    global $wpdb;
    if($input == '') {
        $category = get_the_category();
        return $category[0]->category_count;
    }
    elseif(is_numeric($input)) {
        $SQL = "SELECT {$wpdb->term_taxonomy}.count FROM {$wpdb->terms},  {$wpdb->term_taxonomy} WHERE {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id AND {$wpdb->term_taxonomy}.term_id = {$input}";
        return $wpdb->get_var($SQL);
    }
    else {
        $SQL = "SELECT {$wpdb->term_taxonomy}.count FROM {$wpdb->terms}, {$wpdb->term_taxonomy} WHERE {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id AND {$wpdb->terms}.slug='{$input}'";
        return $wpdb->get_var($SQL);
    }
}
    
    
/*
 * ------------------------------------------------------------------------------
 * WordPress面包屑
 * ------------------------------------------------------------------------------
 */

function cmp_breadcrumbs() {
	$delimiter = '<i class="iconfont icon-arrow-right"></i>'; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		echo '<div class="crumb uk-padding-small uk-text-small uk-padding-remove-horizontal">'.__( '<i class="iconfont icon-shouye1"></i>' , 'cmp' );
		global $post;
		$homeLink = home_url();
		echo ' <a itemprop="breadcrumb" href="' . $homeLink . '">' . __( '首页' , 'cmp' ) . '</a> ' . $delimiter . ' ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		} elseif ( is_day() ) { // 天 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) { // 月 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) { // 年 存档
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) { // 文章
			if ( get_post_type() != 'post' ) { // 自定义文章类型
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else { // 文章 post
				$cat = get_the_category(); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
				echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) { // 附件
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( '搜索「%s」的结果如下：', 'cmp' ),  get_search_query() );
			echo  $after;
		} elseif ( is_tag() ) { //标签 存档
			echo $before ;
			printf( __( 'Tag Archives: %s', 'cmp' ), single_tag_title( '', false ) );
			echo  $after;
		} elseif ( is_author() ) { // 作者存档
			global $author;
			$userdata = get_userdata($author);
			echo $before ;
			printf( __( 'Author Archives: %s', 'cmp' ),  $userdata->display_name );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( '没有找到', 'cmp' );
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( '( Page %s )', 'cmp' ), get_query_var('paged') );
		}
		echo '</div>';
	}
}


/*
 * ------------------------------------------------------------------------------
 * WordPress分页
 * ------------------------------------------------------------------------------
 */

function fenye(){
	$args = array(
		'prev_next'          => 0,
		'format'       => '?paged=%#%',
		'before_page_number' => '',
		'mid_size'           => 2,
		'current' => max( 1, get_query_var('paged') ),
		'prev_next'    => True,
		'prev_text'    => __('上一页'),
		'next_text'    => __('下一页'),

	);
	$page_arr=paginate_links($args); 
	if ($page_arr) {
		echo $page_arr;
	}else{

	}
}


/*
 * ------------------------------------------------------------------------------
 * WordPress分类描述删除p标签
 * ------------------------------------------------------------------------------
 */

function deletehtml($description) {
	$description = trim($description);
	$description = strip_tags($description,'');
	return ($description);
}
add_filter('category_description', 'deletehtml');



/*
 * ------------------------------------------------------------------------------
 * 使子分类的category页面渲染父category页面的模板
 * ------------------------------------------------------------------------------
 */
add_filter('category_template', 'f_category_template');
function f_category_template($template){
	$category = get_queried_object();
	if($category->parent !='0'){
		while($category->parent !='0'){
			$category = get_category($category->parent);
		}
	}
	
	$templates = array();
 
	if ( $category ) {
		$templates[] = "category-{$category->slug}.php";
		$templates[] = "category-{$category->term_id}.php";
	}
	$templates[] = 'category.php';
	return locate_template( $templates );
}


/*
 * ------------------------------------------------------------------------------
 * WordPress获取子分类
 * ------------------------------------------------------------------------------
 */
function get_category_root_id($cat) {
	$this_category = get_category($cat);
	while($this_category->category_parent) {
		$this_category = get_category($this_category->category_parent); 
	}
	return $this_category->term_id; 
}
function get_category_cat() { 
	$catID = get_query_var('cat');
	$thisCat = get_category($catID);
	$parentCat = get_category($thisCat->parent);
	echo get_category_link($parentCat->term_id);
}


/*
 * ------------------------------------------------------------------------------
 * WordPress获取分类和子分类文章数量
 * ------------------------------------------------------------------------------
 */
function get_cat_postcount($id) {
 // 获取当前分类信息
 $cat = get_category($id);
 
 // 当前分类文章数
 $count = (int) $cat->count;
 
 // 获取当前分类所有子孙分类
 $tax_terms = get_terms('category', array('child_of' => $id));
 
 foreach ($tax_terms as $tax_term) {
  // 子孙分类文章数累加
  $count +=$tax_term->count;
 }
 return $count;
}


/*
 * ------------------------------------------------------------------------------
 * WordPress文章访问计数（勿删、必须）
 * ------------------------------------------------------------------------------
 */

function record_visitors(){
	if (is_singular()) {
		global $post;
		$post_ID = $post->ID;
		if($post_ID){
			$post_views = (int)get_post_meta($post_ID, 'views', true);
			if(!update_post_meta($post_ID, 'views', ($post_views+1))) 
			{
				add_post_meta($post_ID, 'views', 1, true);
			}
		}
	}
}
add_action('wp_head', 'record_visitors');  
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
	global $post;
	$post_ID = $post->ID;
	$views = (int)get_post_meta($post_ID, 'views', true);
	if ($echo) echo $before, number_format($views), $after;
	else return $views;
};

/*
 * ------------------------------------------------------------------------------
 * WordPress获取全站文章浏览量
 * ------------------------------------------------------------------------------
 */
function all_view() {
    global $wpdb;
    $count=0;
    $views= $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key='views'");
    foreach($views as $key=>$value)
    {
        $meta_value=$value->meta_value;
        if($meta_value!=' '){
            $count+=(int)$meta_value;
    }
}
return $count;
}
