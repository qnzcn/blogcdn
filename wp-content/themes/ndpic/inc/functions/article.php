<?php
/*
 * ------------------------------------------------------------------------------
 * WordPress文章特色缩略图
 * ------------------------------------------------------------------------------
 */
//添加特色缩略图支持
if ( function_exists('add_theme_support') )add_theme_support('post-thumbnails');

//输出缩略图地址
function post_thumbnail_src(){
	$default_thumb = _aye('default_thum');
	global $post;
	if( $values = get_post_custom_values("thumbnail") ) { //输出自定义域图片地址
		$values = get_post_custom_values("thumbnail");
		$post_thumbnail_src = $values [0];
	} elseif( has_post_thumbnail() ){ //如果有特色缩略图，则输出缩略图地址
		$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
		$post_thumbnail_src = $thumbnail_src [0];
	} else {
		$post_thumbnail_src = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$post_thumbnail_src = $matches [1] [0]; //获取该图片 src
		if(empty($post_thumbnail_src)){
			$post_thumbnail_src = $default_thumb; //如果日志中没有图片，则显示默认图片
		}
	};
	echo $post_thumbnail_src;
}


/*
 * ------------------------------------------------------------------------------
 * WordPress文章上一篇下一篇显示缩略图
 * ------------------------------------------------------------------------------
 */

function yg_pageturn_thumb($id){
	$single_thumb = _aye('default_thum');
	if (has_post_thumbnail($id)) {
		echo get_the_post_thumbnail( $id, '', '' );
	} else {
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post( $id )->post_content, $matches);
		if(empty($first_img)){ //Defines a default image
			$first_img= $single_thumb;
		}
		echo '<img class="uk-overlay-scale uk-width-1-1" src="'.$first_img.'" alt="'.get_post( $post_id )->post_title.'" />';
	}
}



/*
 * ------------------------------------------------------------------------------
 * WordPress自动为文章添加标签
 * ------------------------------------------------------------------------------
 */
if(_aye('auto_add_tags') == true):

add_action('save_post', 'auto_add_tags');
function auto_add_tags(){
	$tags = get_tags( array('hide_empty' => false) );
	$post_id = get_the_ID();
	$post_content = get_post($post_id)->post_content;
	if ($tags) {
		foreach ( $tags as $tag ) {
			// 如果文章内容出现了已使用过的标签，自动添加这些标签
			if ( strpos($post_content, $tag->name) !== false)
				wp_set_post_tags( $post_id, $tag->name, true );
		}
	}
}

endif;


/*
 * ------------------------------------------------------------------------------
 * WordPress文章关键词自动添加内链
 * ------------------------------------------------------------------------------
 */
if(_aye('single_tag_link') == true):

$match_num_from = 1; //一个关键字少于多少不替换
$match_num_to = 1; //一个关键字最多替换次数
//连接到WordPress的模块
add_filter('the_content','tag_link',1);
//按长度排序
function tag_sort($a, $b){
	if ( $a->name == $b->name ) return 0;
	return ( strlen($a->name) > strlen($b->name) ) ? -1 : 1;
}
//改变标签关键字
function tag_link($content){
	global $match_num_from,$match_num_to;
	$posttags = get_the_tags();
	if ($posttags) {
		usort($posttags, "tag_sort");
		foreach($posttags as $tag) {
			$link = get_tag_link($tag->term_id);
			$keyword = $tag->name;
			//连接代码
			$cleankeyword = stripslashes($keyword);
			$url = "<a href=\"$link\" title=\"".str_replace('%s',addcslashes($cleankeyword, '$'),__('查看所有文章关于 %s'))."\"";
			$url .= 'target="_blank"';
			$url .= ">".addcslashes($cleankeyword, '$')."</a>";
			$limit = rand($match_num_from,$match_num_to);
			//不连接的代码
			$content = preg_replace( '|(<a[^>]+>)(.*)('.$ex_word.')(.*)(</a[^>]*>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
			$content = preg_replace( '|(<img)(.*?)('.$ex_word.')(.*?)(>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
			$cleankeyword = preg_quote($cleankeyword,'\'');
			$regEx = '\'(?!((<.*?)|(<a.*?)))('. $cleankeyword . ')(?!(([^<>]*?)>)|([^>]*?</a>))\'s' . $case;
			$content = preg_replace($regEx,$url,$content,$limit);
			$content = str_replace( '%&&&&&%', stripslashes($ex_word), $content);
		}
	}
	return $content; 
}

endif;


/*
 * ------------------------------------------------------------------------------
 * WordPress给文章外链添加nofollow
 * ------------------------------------------------------------------------------
 */
if(_aye('single_nofollow') == true):
	
add_filter('the_content','web589_the_content_nofollow',999);
function web589_the_content_nofollow($content){
	preg_match_all('/href="(.*?)"/',$content,$matches);
	if($matches){
		foreach($matches[1] as $val){
			if( strpos($val,home_url())===false ) $content=str_replace("href=\"$val\"", "href=\"$val\" rel=\"external nofollow\" ",$content);
		}
	}
	return $content;
}

endif;

/*
 * ------------------------------------------------------------------------------
 * WordPress文章图片alt
 * ------------------------------------------------------------------------------
 */
if( _aye('single_img_alt') == true ):

function image_alt_tag($content){
	global $post;preg_match_all('/<img (.*?)\/>/', $content, $images);
	if(!is_null($images)) {foreach($images[1] as $index => $value)
	{
		$new_img = str_replace('<img', '<img alt="'.get_the_title().'"', $images[0][$index]);
		$content = str_replace($images[0][$index], $new_img, $content);}}
	return $content;
}
add_filter('the_content', 'image_alt_tag', 99999);

endif;


/*
 * ------------------------------------------------------------------------------
 * WordPress上传文件重命名
 * ------------------------------------------------------------------------------
 */

if( _aye('single_upload_filter') == true ):

function git_upload_filter($file) {
	$time = date("YmdHis");
	$file['name'] = $time . "" . mt_rand(1, 100) . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
	return $file;
}
add_filter('wp_handle_upload_prefilter', 'git_upload_filter');

endif;

/*
 * ------------------------------------------------------------------------------
 * WordPress删除文章时删除图片附件
 * ------------------------------------------------------------------------------
 */

if( _aye('single_delete_post_and_img') == true ):
	
function delete_post_and_attachments($post_ID) {
	global $wpdb;
	//删除特色图片
	$thumbnails = $wpdb->get_results( "SELECT * FROM $wpdb->postmeta WHERE meta_key = '_thumbnail_id' AND post_id = $post_ID" );
	foreach ( $thumbnails as $thumbnail ) {
		wp_delete_attachment( $thumbnail->meta_value, true );
	}
	//删除图片附件
	$attachments = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_parent = $post_ID AND post_type = 'attachment'" );
	foreach ( $attachments as $attachment ) {
		wp_delete_attachment( $attachment->ID, true );
	}
	$wpdb->query( "DELETE FROM $wpdb->postmeta WHERE meta_key = '_thumbnail_id' AND post_id = $post_ID" );
}
add_action('before_delete_post', 'delete_post_and_attachments');

endif;



/*
 * ------------------------------------------------------------------------------
 * WordPress发布时间修改格式
 * ------------------------------------------------------------------------------
 */

function dopt($e){
	return stripslashes(get_option($e));
}

function time_since($older_date, $newer_date = false)
{
	$chunks = array(
		array(60 * 60 * 24 * 365 , '年'),
		array(60 * 60 * 24 * 30 , '月'),
		array(60 * 60 * 24 * 7, '周'),
		array(60 * 60 * 24 , '天'),
		array(60 * 60 , '小时'),
		array(60 , '分钟'),
	);

	$newer_date = ($newer_date == false) ? (time()+(60*60*get_settings("gmt_offset"))) : $newer_date;
	$since = $newer_date - abs(strtotime($older_date));

	//根据自己的需要调整时间段，下面的24则表示小时，根据需要调整吧
	if($since < 60 * 60 * 24){
		for ($i = 0, $j = count($chunks); $i < $j; $i++)
		{
			$seconds = $chunks[$i][0];
			$name = $chunks[$i][1];

			if (($count = floor($since / $seconds)) != 0)
			{
				break;
			}
		}

		$out = ($count == 1) ? '1 '.$name : "$count {$name}";
		return $out."前";
	}else{
		the_time(get_option('date_format'));
	}
}
