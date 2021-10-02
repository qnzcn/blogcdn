<?php 
$website_title = _aye('website_title');
$website_keywords = _aye('website_keywords');
$website_description = _aye('website_description');
$category = get_the_category();
$cat_name = $category[0]->cat_name;
if($cat_name){
    $cat_name = $cat_name.'_';
}else {
    $cat_name = '';
}
?>
<title><?php 
	if ( is_home() ) {
		if ($website_title == null) {
			echo '请在后台主题设置填写站标题';
		}else {
			echo $website_title;
		}
	}elseif ( is_category() ) {
		_e(trim(wp_title('',0)));_e('_'); $paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页_',$paged); bloginfo('name');
	}elseif ( is_single() ){
		_e(trim(wp_title('',0)));_e('_');_e($cat_name);bloginfo('name');
	}elseif ( is_search() ) {
		_e('搜索 '); $key = wp_specialchars($s, 1); _e($key.' '); _e('的相关内容_');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页_',$paged); bloginfo('name');
	}elseif ( get_post_type()) { 
		_e(trim(wp_title('',0)));_e('_');bloginfo('name');
	}elseif ( is_404() ) {
		_e('抱歉，您访问的页面走丢了_');bloginfo('name');
	}elseif ( is_author() ) {
		_e('「');_e(trim(wp_title('',0)));_e('」的个人主页_');bloginfo('name');
	}elseif(is_page()){
		_e(trim(wp_title('',0)));_e('_');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页_',$paged); bloginfo('name');
	}elseif ( is_month() ) {
		the_time('Y年n月');_e('的文章归档');_e('_');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页_',$paged); bloginfo('name');
	}elseif ( is_day() ) {
		the_time('Y年n月j日');_e('的文章归档');_e('_');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页_',$paged); bloginfo('name');
	}elseif (function_exists('is_tag')){
		if ( is_tag() ) {
			_e('');single_tag_title("", true);_e(' 相关文章列表');_e('_');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页_',$paged); bloginfo('name');
		}
	}
	?>
</title>
<?php
$keywords = $website_keywords;
$description = $website_description;
if (is_home()){
	$keywords = $keywords;
	$description = $description;
} elseif ( is_category() ) { 
		$description = category_description();
		$keywords = $keywords;
} elseif (is_single()){
	$keywords = '收录唯美图片';
	if(wp_get_post_tags($post->ID)){
		$tags = wp_get_post_tags($post->ID);
		foreach ($tags as $tag ) {
			$keywords = $tag->name.",".$keywords;
		}
	}else{
		$keywords = $website_keywords;
	}
	if ($post->post_excerpt) {
		$description = $post->post_excerpt;
	}else {
		global $more; 
		$more = 1; //1=全文 0=摘要 
		$my_content = strip_tags(get_the_excerpt(), $post->post_content); //获得文章 
		$my_content = str_replace(array('rn', 'r', 'n', ' ', 't', 'o', 'x0B',''),'',$my_content); //去掉空格
		$my_content = mb_strimwidth( $my_content, 0, 180, '...');
		$description = $my_content;
	}
} elseif(function_exists('is_tag')){
	if( is_tag() ) {
		$keyword = '收录唯美图片';
		$keywords = trim(wp_title('',0)).",".$keyword;
		$description = trim(wp_title('',0));
	}
}if ( is_search() ) {
	$keywords = $index_keywords;
	$description = $key; 
}?>
		<meta name="keywords" content="<?php echo $keywords; ?>" />
		<meta name="description" content="<?php echo $description; ?>" />
