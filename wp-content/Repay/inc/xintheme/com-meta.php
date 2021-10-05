<?php
/**
 * Theme depot functions file
 * @package Louie
 * @since Theme version 1.0.0
 */

/**
 * 评论数据
 */
function comments_data( $postid = false ) {

	if ($postid) {
		$comments = get_comments( 'status=approve&type=comment&post_id='.$postid ); // 当前文章评论
		$count = get_comment_count($postid);
	}
	else {
		$comments = get_comments( array( 'status' => 'approve' ) ); // 所有评论
		$count = get_comment_count();
	}

	$admin_email = get_bloginfo( 'admin_email' );
	$data = array();
	$temp = array();
	$user_count = 0; // 计算评论的人数
	$comment_count = $count['approved']; // 获取评论数量
	
	foreach ($comments as $comment) {

		$id = $comment->comment_ID;
		$author = $comment->comment_author;
		$email = $comment->comment_author_email;
		$url = $comment->comment_author_url;
		$date = $comment->comment_date;
		$content = $comment->comment_content;
		$master = array($admin_email);

		if ( $postid ) { // 非文章下忽略 直接调用 count
			$total_comment_number = get_comments( array( 'author_email' => $email ) );
			$total_count = 0; // 计算访客个人在整站的评论总数
			foreach ( $total_comment_number as $comm ) {
				$total_count += 1;
			}
		}

		if ( ! in_array( $email, $temp ) ) {
			$temp[] = $email;
			$user_count++;
		}
		
		$m = 0;
		foreach ( $master as $value ) {
			if ( $email == $value ) {
				$m = 1;
			}
		}
		if ( $m == 0 ) {
			$k = -1;
			foreach ( $data as $item => $comm ) {
				if ( $email == $comm['email'] ) {
					$k = $item;
					break;
				}
			}
			if ( $k > -1 ) {
				$data[$k]['number'] += 1;
			}
			else {
				$data[] = array( 
					'recent_id' => $id,
					'author' => $author,
					'email' => $email,
					'url' => $url,
					'date' => $date,
					'number' => 1,
					'content' => $content,
					'count' => array($user_count, $comment_count),
					'total_count' => $total_count
				);
			}
		}
	}

	return $data;
}

/**
 * 访客
 */
function comment_tourist( $postid ) {
	$comments = comments_data($postid);
	if ($comments) {	
		$i = 0;
		$info = '';
		foreach ( $comments as $key => $comment ) {
			$name = $comment['author'];
			$url = $comment['url'];
			$avatar = get_avatar_url( $comment['email'], array( 'size'=> 24 ) );
			$count = $comment['count']; // 统计当前文章的评论总数和评论人数
			if ($url) {
				$i++;
				if ($i < 15) {
					$tourist = '<a href="'. $url .'" rel="nofollow" target="_blank" class="tourist-home tips-top" aria-label="'. $name .'"><img src="'. $avatar .'" width="24" class="avatar avatar-24"></a>';
					$info .= '<li class="item">';
					$info .= $tourist;
					$info .= '</li>';
				}
			}
		}
		echo $info;
	}
	else {
		echo '<li class="more-speak">没有任何评论信息 ...</li>';
	}
}

/**
 * 头衔
 */
function site_rank( $comment_author_email, $user_id ) {
    $comment_rank = xintheme( 'comment_rank' );
	if ( ! $comment_rank ) return false;

	$v1 = xintheme( 'comment_rank_1' );
	$v2 = xintheme( 'comment_rank_2' );
	$v3 = xintheme( 'comment_rank_3' );
	$v4 = xintheme( 'comment_rank_4' );
	$v5 = xintheme( 'comment_rank_5' );
	$v6 = xintheme( 'comment_rank_6' );

	global $wpdb;
	$adminEmail = get_option( 'admin_email' );
	$num = count( $wpdb->get_results( "SELECT comment_ID as author_count FROM $wpdb->comments WHERE comment_author_email = '$comment_author_email' " ) );

	if ( $num > 0 && $num < 6 ) {
		$rank = $v1;
	}
	elseif ( $num > 5 && $num < 11 ) {
		$rank = $v2;
	}
	elseif ( $num > 10 && $num < 16 ) {
		$rank = $v3;
	}
	elseif ($num > 15 && $num < 21) {
		$rank = $v4;
	}
	elseif ( $num > 20 && $num < 26 ) {
		$rank = $v5;
	}
	elseif ( $num > 25 ) {
		$rank = $v6;
	}

	if( $comment_author_email != $adminEmail )
		return $rank = '<span class="rank" data-balloon="头衔：'. $rank .' , 全站累计评论数：'. $num .'" data-balloon-pos="right">( '. $rank .' )</span>';
}

/**
 * 评论高亮作者
 */
function is_master($email = '') {
    if( empty($email) ) return;
    $handsome = array( '1' => ' ', );
    $adminEmail = get_option( 'admin_email' );
    if( $email == $adminEmail )
    echo '<i class="iconfont is-author" data-balloon="网站管理员" data-balloon-pos="right"><i class="fa fa-user"></i></i>';
    elseif( in_array( $email, $handsome ) )
    echo '<i class="iconfont is-author" aria-label="网站管理员" data-balloon-pos="right"><i class="fa fa-user"></i></i>';
}

