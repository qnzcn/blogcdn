<?php
/**
 * Muiteer helper functions
 *
 * @package Muiteer
*/

/** String to HEX
 *
 * @since 2.3.0
*/

if ( !function_exists('muiteer_strToHex') ) :
	function muiteer_strToHex($str) {
		$hex = "";
		for($i = 0; $i < strlen($str); $i++ )
		$hex .= dechex( ord( $str[$i] ) );
		$hex = strtoupper($hex);
		return $hex;
	}
endif;

/** RGB to HEX
 *
 * @since 1.0.0
*/

if ( !function_exists('muiteer_hex2RGB') ) :
	function muiteer_hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
		$hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); 
		$rgbArray = array();
		if (strlen($hexStr) == 6) { 
			$colorVal = hexdec($hexStr);
			$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
			$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
			$rgbArray['blue'] = 0xFF & $colorVal;
		} elseif (strlen($hexStr) == 3) { 
			$rgbArray['red'] = hexdec( str_repeat(substr($hexStr, 0, 1), 2) );
			$rgbArray['green'] = hexdec( str_repeat(substr($hexStr, 1, 1), 2) );
			$rgbArray['blue'] = hexdec( str_repeat(substr($hexStr, 2, 1), 2) );
		} else {
			return false;
		}
		return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; 
	}
endif;

/** Redefine the_excerpt
 *
 * @since 1.0.0
*/

if ( !function_exists('muiteer_excerpt') ) :
	function muiteer_excerpt() {
		global $post;
		$postid = $post->ID;
	    if ( has_excerpt() ) {
	    	// Has excerpt content
	    	$output = get_the_excerpt($postid);
		    $output = apply_filters('wptexturize', $output);
		    $output = apply_filters('convert_chars', $output);
		    $str_length = mb_strlen($output, 'utf-8');
		    if($str_length > 140) {
		    	$output = mb_substr($output, 0, 140, 'utf-8') . "...";
		    } else {
		    	$output = mb_substr($output, 0, 140, 'utf-8');
			}
	    } else {
	    	// No excerpt content
	    	$page_object = get_page($postid);
	    	$content = $page_object->post_content;
	    	
	    	if ( !empty($content) ) {
		    	$output = strip_tags( preg_replace("~(?:\[/?)[^\]]+/?\]~s", '', $content) );
		    	$output = str_replace(array("\r", "\n"), "", $output);
		    	$str_length = mb_strlen($output, 'utf-8');
		    	if($str_length > 140) {
			    	$output = mb_substr($output, 0, 140, 'utf-8') . "...";
			    } else {
			    	if ($str_length < 1) {
			    		$output = "...";
			    	} else {
			    		$output = mb_substr($output, 0, 140, 'utf-8');
			    	}
				}
		    }
	    }
	    return $output;
	}
endif;

/** Outputs social icon
 *
 * @since 1.0.0
*/

if ( !function_exists('muiteer_social_icon') ) :
	function muiteer_social_icon() {
		if (get_theme_mod('muiteer_social_icon', 'disabled') === 'enabled') {
			$jianshu = muiteer_icon('jianshu', 'icon');
			$twitter = muiteer_icon('twitter', 'icon');
			$facebook = muiteer_icon('facebook', 'icon');
			$pinterest = muiteer_icon('pinterest', 'icon');
			$five_hundred_px = muiteer_icon('500px', 'icon');
			$dribbble = muiteer_icon('dribbble', 'icon');
			$instagram = muiteer_icon('instagram', 'icon');
			$linkedin = muiteer_icon('linkedin', 'icon');
			$soundcloud = muiteer_icon('soundcloud', 'icon');
			$medium = muiteer_icon('medium', 'icon');
			$weibo = muiteer_icon('weibo', 'icon');
			$qq = muiteer_icon('qq', 'icon');
			$qzone = muiteer_icon('qzone', 'icon');
			$zhihu = muiteer_icon('zhihu', 'icon');
			$behance = muiteer_icon('behance', 'icon');
			$lofter = muiteer_icon('lofter', 'icon');
			$tieba = muiteer_icon('tieba', 'icon');
			$xiongzhang = muiteer_icon('xiongzhang', 'icon');
			$xiaohongshu = muiteer_icon('xiaohongshu', 'icon');
			$douban = muiteer_icon('douban', 'icon');
			$netease_music = muiteer_icon('netease_music', 'icon');
			$taobao = muiteer_icon('taobao', 'icon');
			$youku = muiteer_icon('youku', 'icon');
			$bilibili = muiteer_icon('bilibili', 'icon');
			$youtube = muiteer_icon('youtube', 'icon');
			$google_plus = muiteer_icon('google_plus', 'icon');
			$github = muiteer_icon('github', 'icon');
			$codepen = muiteer_icon('codepen', 'icon');
			$wechat = muiteer_icon('wechat', 'icon');
			$tiktok = muiteer_icon('tiktok', 'icon');
			$muiteer = muiteer_icon('muiteer', 'icon');
			$email = muiteer_icon('email', 'icon');
		}

		// Social media items start
			if (get_theme_mod('muiteer_social_muiteer') != '') {
				$widget_content .= '
					<li>
						<a class="muiteer" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_muiteer') ) . '" title="' . esc_html__('Learn more about this theme...', 'muiteer') . '">' . $muiteer . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_email') != '') {
				$widget_content .= '
					<li>
						<a class="email"  href="mailto:' . get_theme_mod('muiteer_social_email') . '">' . $email . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_wechat_qr_code') != '') {
				$widget_content .= '
					<li>
						<a class="wechat" href="javascript:;">' . $wechat . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_tiktok_qr_code') != '') {
				$widget_content .= '
					<li>
						<a class="tiktok" href="javascript:;">' . $tiktok . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_weibo') != '') {
				$widget_content .= '
					<li>
						<a class="weibo" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_weibo') ) . '" rel="nofollow">' . $weibo . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_qq') != '') {
				$widget_content .= '
					<li>
						<a class="qq" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_qq') ) . '">' . $qq . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_qzone') != '') {
				$widget_content .= '
					<li>
						<a class="qzone" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_qzone') ) . '" rel="nofollow">' . $qzone . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_zhihu') != '') {
				$widget_content .= '
					<li>
						<a class="zhihu" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_zhihu') ) . '" rel="nofollow">' . $zhihu . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_behance') != '') {
				$widget_content .= '
					<li>
						<a class="behance" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_behance') ) . '" rel="nofollow">' . $behance . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_lofter') != '') {
				$widget_content .= '
					<li>
						<a class="lofter" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_lofter') ) . '" rel="nofollow">' . $lofter . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_tieba') != '') {
				$widget_content .= '
					<li>
						<a class="tieba" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_tieba') ) . '" rel="nofollow">' . $tieba . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_xiongzhang') != '') {
				$widget_content .= '
					<li>
						<a class="xiongzhang" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_xiongzhang') ) . '" rel="nofollow">' . $xiongzhang . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_xiaohongshu') != '') {
				$widget_content .= '
					<li>
						<a class="xiaohongshu" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_xiaohongshu') ) . '" rel="nofollow">' . $xiaohongshu . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_douban') != '') {
				$widget_content .= '
					<li>
						<a class="douban" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_douban') ) . '" rel="nofollow">' . $douban . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_netease_music') != '' ) {
				$widget_content .= '
					<li>
						<a class="netease-music" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_netease_music') ) . '" rel="nofollow">' . $netease_music . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_taobao') != '') {
				$widget_content .= '
					<li>
						<a class="taobao" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_taobao') ) . '" rel="nofollow">' . $taobao . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_youku') != '') {
				$widget_content .= '
					<li>
						<a class="youku" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_youku') ) . '" rel="nofollow">' . $youku . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_bilibili') != '') {
				$widget_content .= '
					<li>
						<a class="bilibili" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_bilibili') ) . '" rel="nofollow">' . $bilibili . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_youtube') != '') {
				$widget_content .= '
					<li>
						<a class="youtube" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_youtube') ) . '" rel="nofollow">' . $youtube . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_google_plus') != '') {
				$widget_content .= '
					<li>
						<a class="google-plus" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_google_plus') ) . '" rel="nofollow">' . $google_plus . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_github') != '') {
				$widget_content .= '
					<li>
						<a class="github" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_github') ) . '" rel="nofollow">' . $github . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_codepen') != '') {
				$widget_content .= '
					<li>
						<a class="codepen" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_codepen') ) . '" rel="nofollow">' . $codepen . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_500px') != '') {
				$widget_content .= '
					<li>
						<a class="500px" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_500px') ) . '" rel="nofollow">' . $five_hundred_px . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_dribbble') != '') {
				$widget_content .= '
					<li>
						<a class="dribbble" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_dribbble') ) . '" rel="nofollow">' . $dribbble . '</a>
					</li>
				';
			}
			if ( get_theme_mod('muiteer_social_facebook') != '') {
				$widget_content .= '
					<li>
						<a class="facebook" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_facebook') ) . '" rel="nofollow">' . $facebook . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_instagram') != '') {
				$widget_content .= '
					<li>
						<a class="instagram" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_instagram') ) . '" rel="nofollow">' . $instagram . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_linkedin') != '') {
				$widget_content .= '
					<li>
						<a class="linkedin" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_linkedin') ) . '" rel="nofollow">' . $linkedin . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_pinterest') != '') {
				$widget_content .= '
					<li>
						<a class="pinterest" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_pinterest') ) . ' rel="nofollow"">' . $pinterest . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_soundcloud') != '') {
				$widget_content .= '
					<li>
						<a class="soundcloud" target="_blank" href="' .  esc_url( get_theme_mod( 'muiteer_social_soundcloud') ) . '" rel="nofollow">' . $soundcloud . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_twitter') != '' ) {
				$widget_content .= '
					<li>
						<a class="twitter" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_twitter') ) . '" rel="nofollow">' . $twitter . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_medium') != '') {
				$widget_content .= '
					<li>
						<a class="medium" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_medium') ) . '" rel="nofollow">' . $medium . '</a>
					</li>
				';
			}
			if (get_theme_mod('muiteer_social_jianshu') != '') {
				$widget_content .= '
					<li>
						<a class="jianshu" target="_blank" href="' .  esc_url( get_theme_mod('muiteer_social_jianshu') ) . '" rel="nofollow">' . $jianshu . '</a>
					</li>
				';
			}
		// Social media items end

		$output .= '<section class="social-icon-container">';
		$output .= '<ul>';
		$output .= $widget_content;
		$output .= '</ul>';
		$output .= '</section>';

		if ($widget_content != "") {
			echo $output;
		}
	}
endif;

/** Outputs search bar
 *
 * @since 1.0.0
*/

if ( !function_exists('muiteer_search_form') ) :
	function muiteer_search_form($form) {
	    $form = '
			<form role="search" method="get" class="searchform" action="' . esc_url( home_url('/') ) . '" >
				<span class="search-icon"></span>
				<input type="search" autocomplete="off" placeholder="' . esc_html__('Search', 'muiteer') . '" name="s" />
		    </form>
	   ';
	    return $form;
	}
endif;
add_filter('get_search_form', 'muiteer_search_form');

/** Outputs global navigation
 *
 * @since 1.0.0
*/

if ( !function_exists('muiteer_global_navigation') ) :
	function muiteer_global_navigation() {
		// Get wp navigation
		function muiteer_get_wp_navigation() {
			if ( has_nav_menu('primary') ) {
				wp_nav_menu( array(
					'menu' => '',
					'container' => 'nav',
					'container_class' => '',
					'container_id' => '',
					'menu_class' => 'main-menu',
					'menu_id' => '',
					'echo' => true,
					'fallback_cb' => '',
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'item_spacing' => 'preserve',
					'depth' => '',
					'walker' => '',
					'theme_location' => 'primary',
					)
				);

			} else {
				echo '
					<nav class="menu-navigation-container" role="navigation">
						<ul class="main-menu">
							<li class="menu-item">
								<a href="' . esc_url( home_url('/') ) . '" class="ajax-link">' . __('Home', 'muiteer') . '</a>
							</li>
				';
				
				if ( is_user_logged_in() ) {
					echo '
						<li class="menu-item">
							<a href="' . esc_url( admin_url('nav-menus.php') ) . '">' . __('Set Up Your Menu', 'muiteer') . '</a>
						</li>
					';
				};
				
				echo '
						</ul>
					</nav>
				';
			}
		};

		// Add ajax link class
		function muiteer_add_ajax_link($ulclass) {
		   return preg_replace('/<a /', '<a class="ajax-link"', $ulclass);
		}
		add_filter('wp_nav_menu','muiteer_add_ajax_link');

		// Add sub menu toggle start
		function muiteer_add_sub_menu_toggle($item_output, $item, $depth, $args) {
		    if ($args->theme_location == 'primary') {
		        if ( in_array('menu-item-has-children', $item->classes) ) {
		            $item_output = str_replace(
		            	$args->link_after . '</a>',
		            	$args->link_after . '</a><div class="sub-menu-toggle"></div>',
		            	$item_output
		            );
		        }
		    }
		    return $item_output;
		}
		add_filter('walker_nav_menu_start_el', 'muiteer_add_sub_menu_toggle', 10, 4);
		// Add sub menu toggle end

		// Get navigation logo
		function muiteer_navigation_logo() {
			$logo = get_theme_mod('muiteer_logo');
			$is_logo = is_file( $_SERVER['DOCUMENT_ROOT'] . '/' . parse_url($logo, PHP_URL_PATH) );
			if ($logo && $is_logo) {
				$filetype = wp_check_filetype($logo)['ext'];
				if ($filetype == "svg") {
					$svg_inline_content = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/' . parse_url($logo, PHP_URL_PATH) );
					$svg_inline_content_new = str_replace("<svg", "<svg preserveAspectRatio='xMinYMid'", $svg_inline_content);
					echo '
						<span class="link-title">' . get_bloginfo('name') . '</span>
					';
					echo $svg_inline_content_new;
				} else {
					echo '
						<img src="' . $logo . '" alt="' . get_bloginfo('name') . '" itemprop="logo" style="height: ' . esc_attr( get_theme_mod('muiteer_logo_height', 30) ) . 'px" />
					';
				}
			} else {
				echo '
					<h2>
						<span itemprop="name">' . get_bloginfo('name') . '</span>
					</h2>
				';
			}
		};

		// Get navigation status
		if (get_theme_mod('muiteer_navigation_status', 'sticky') === 'sticky') {
			$navigation_status = "sticky";
		} else if (get_theme_mod('muiteer_navigation_status', 'sticky') === 'auto') {
			$navigation_status = "auto";
		} else if (get_theme_mod('muiteer_navigation_status', 'sticky') === 'normal') {
			$navigation_status = "normal";
		};

		// Get navigation logo status
		if ( get_theme_mod('muiteer_logo') ) {
			$image_logo_status = 'image-logo-enabled';
		} else {
			$image_logo_status = 'image-logo-disabled';
		}

		// Get hamburger menu status
		if (get_theme_mod('muiteer_hamburger_menu', 'response') === 'always') {
			$hamburger_menu_status = "hamburger-menu-always-display";
		} else if (get_theme_mod('muiteer_hamburger_menu', 'response') === 'response') {
			$hamburger_menu_status = "hamburger-menu-response-display";
		}

		// Get shopping bag toggle status
		function muiteer_shopping_bag_toggle() {
			if ( class_exists('WooCommerce') ) {
				if (get_theme_mod('muiteer_shopping_bag', 'enabled') === 'enabled') {
					$woocommerce_cart_count = WC()->cart->get_cart_contents_count();
					if ($woocommerce_cart_count != 0) {
						$badge =  '<span class="badge">' . $woocommerce_cart_count . '</span>';
					};
					echo '
						<li class="shopping-bag-toggle content-item">
							' . $badge . '
							<div class="shopping-bag-content">
								<div class="shopping-bag-list">
									<h3 class="shopping-bag-title">' . __('My Cart', 'muiteer') . '</h3>
					';
					woocommerce_mini_cart();
					echo '
								</div">
							</div>
						</li>
					';
				}
			}
		}

		// Get search status
		if (get_theme_mod('muiteer_site_search', 'enabled') === 'enabled') {
			$search_status = 'search-enabled';
		} else {
			$search_status = 'search-disabled';
		}

		// Get search toggle status
		function muiteer_search_toggle() {
			if (get_theme_mod('muiteer_site_search', 'enabled') === 'enabled') {
				echo '<li class="search-toggle content-item"></li>';
			}
		}

		// Get search bar status
		function muiteer_search_bar($device) {
			if (get_theme_mod('muiteer_site_search', 'enabled') === 'enabled') {
				if ($device === "desktop") {
					echo '<section class="search-bar-container desktop">';
						echo '<div class="search-bar-box wrapper">';
							get_search_form();
						echo '</div>';
					echo '</section>';
				} else {
					echo '<div class="search-bar-container wrapper">';
						get_search_form();
					echo '</div>';
				}
			}
		}

		// Get background music toggle status
		function muiteer_background_music_toggle() {
			if ( get_theme_mod('muiteer_background_music') ) {
				echo '
					<li class="background-music-toggle content-item">
						<div class="buffering-icon"></div>
						<div class="equalizer-icon">
							<span class="line"></span>
							<span class="line"></span>
							<span class="line"></span>
						</div>
					</li>
				';
			}
		}

		// Get share toggle status
		function muiteer_share_toggle() {
			if (get_theme_mod('muiteer_site_share', 'enabled') === 'enabled') {
				echo '
					<li class="share-toggle content-item">
						<div class="share-icon"></div>
					</li>
				';
			}
		}

		echo '<header class="global-navigation-container ' . $navigation_status . ' ' . $hamburger_menu_status . ' ' . $image_logo_status . ' ' . $search_status . '">';
			echo '<div class="global-navigation-holder wrapper">';
				echo '<a href="' . esc_url( home_url('/') ) . '" class="navigation-logo ajax-link">';
					muiteer_navigation_logo();
				echo '</a>';
				echo '<ul class="content-list">';
					echo '<li class="normal-menu-container content-item">';
						muiteer_get_wp_navigation();
					echo '</li>';
					muiteer_background_music_toggle();
					muiteer_share_toggle();
					muiteer_search_toggle();
					muiteer_shopping_bag_toggle();
					echo '<li class="hamburger-menu-toggle content-item"></li>';
				echo '</ul>';
			echo '</div>';
		echo '</header>';
		echo '<section class="hamburger-menu-container">';
			muiteer_search_bar("mobile");
			echo '<div class="hamburger-menu-content wrapper">';
				muiteer_get_wp_navigation();
			echo '</div>';
		echo '</section>';
	}
endif;

/** Individual comment structure
 *
 * @since 1.0.0
*/

if ( !function_exists('muiteer_comment') ) :
	function muiteer_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		global $post;
		switch ($comment->comment_type) :
			case '' :
		?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<article itemscope itemtype="http://schema.org/Comment">
				<div class="comment-avatar">
					<?php
						echo get_avatar($comment, 160, $default='');
						if ( $post = get_post($post->ID) ) {
							if ($comment->user_id === $post->post_author) {
								echo '<span class="by-author">' . muiteer_icon('krown', 'icon') . '</span>';
							}
						}
					?>
					</div>
				<div class="comment-content">
					<div class="comment-meta">
						<h6 class="comment-title">
							<?php echo ( get_comment_author_url() != '' ? '<a itemprop="creator" href="' . get_comment_author_url() . '" target="blank">' . get_comment_author() . '</a>' : comment_author() ); ?>
						</h6>
						<span class="comment-date" itemprop="dateCreated">
							<?php echo comment_date( esc_html__('M j \a\t h:i', 'muiteer') ); ?>
						</span>
					</div>
					<div class="comment-text">
						<div itemprop="text">
							<?php if ($comment->comment_approved == '0') : ?>
								<p><em class="await"><?php esc_html_e('Your comment is awaiting moderation.', 'muiteer'); ?></em></p>
							<?php endif; ?>
							<?php comment_text(); ?>
						</div>
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => 3, 'reply_text' => esc_html__('reply', 'muiteer') ) ) ); ?>
					</div>
				</div>
			</article>
		<?php
			break;
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php esc_html_e('Pingback:', 'muiteer'); ?> <?php comment_author_link(); ?><?php edit_comment_link(esc_html__('(Edit)', 'muiteer'), ' '); ?></p>
		</li>
		<?php
			break;
		endswitch;
	}
endif; 

/** Redefine navigation in blog/archive/search pages
 *
 * @since 1.0.0
*/

if ( !function_exists('muiteer_posts_navigation') ) :
	function muiteer_posts_navigation($query = null) {
		if ($query === null) {
			global $wp_query;
			$query = $wp_query;
		}
		$page = $query->query_vars['paged'] === 0 ? 1 : $query->query_vars['paged'];
		$pages = $query->max_num_pages;
		$output = '';
		if($pages > 1) {
			$output .= '
				<section class="post-pagination-container">
					<div class="post-pagination-box">
			';
				$output .= '<a class="prev ajax-link"' . ($page - 1 >= 1 ? ' href="' . esc_url( get_pagenum_link($page - 1) ) . '"' : '') . '></a>';
				$output .= '<a class="next ajax-link"' . ($page + 1 <= $pages ? ' href="' . esc_url( get_pagenum_link($page + 1) ) . '"' : '') . '></a>';
			$output .= '
					</div>
				</section>
			';
		}
		echo $output;
	}
endif;

/** Get the archive title 
 *
 * @since 1.0.0
*/

if ( !function_exists('muiteer_archive_title') ) :
	function muiteer_archive_title() {
		// We need such a function because the default WP one returns everything in a single string
		if ( is_category() ) {
			$title = esc_html__('Category', 'muiteer');
			$subtitle = single_cat_title('', false);
		} elseif ( is_tag() ) {
			$title = esc_html__('Tag', 'muiteer');
			$subtitle = single_tag_title('', false);
		} elseif ( is_author() ) {
			$title = esc_html__('Author', 'muiteer');
			$subtitle = get_the_author();
		} elseif ( is_year() ) {
			$title = esc_html__('Year', 'muiteer');
			$subtitle = get_the_date( esc_html_x('Y', 'yearly archives date format', 'muiteer') );
		} elseif ( is_month() ) {
			$subtitle = esc_html__('Month', 'muiteer');
			$title = get_the_date( esc_html_x('F Y', 'monthly archives date format', 'muiteer') );
		} elseif ( is_day() ) {
			$title = esc_html__('Day', 'muiteer');
			$subtitle = get_the_date( esc_html_x('F j, Y', 'daily archives date format', 'muiteer') );
		} elseif ( is_post_type_archive() ) {
			$title =  esc_html__('Archives', 'muiteer');
			$subtitle = post_type_archive_title('', false);
		} elseif ( is_tax() ) {
			$tax = get_taxonomy(get_queried_object()->taxonomy);
			$title = $tax->labels->singular_name;
			$subtitle = single_term_title('', false);
		} else {
			$title = esc_html__('Archives', 'muiteer');
		}
		echo '
			<header class="related-header">
				<h1>' . $title . '<span class="keyword">' . $subtitle . '</span></h1>
			</header>
		';
	}
endif;

/** Outputs recommended post
 *
 * @since 2.2.0
*/

if ( !function_exists('muiteer_recommend_post') ) :
	function muiteer_recommend_post() {
		// Recommended post cover ratio start
		$recommended_post_cover_ratio = get_theme_mod('muiteer_recommend_post_cover_ratio', '4_3');
		
		if ($recommended_post_cover_ratio == "1_1") {
			$recommended_post_target_height = 100;
		} else if ($recommended_post_cover_ratio == "16_9") {
			$recommended_post_target_height = 56.215;
		} else {
			$recommended_post_target_height = 66.667;
		};

		echo '
			<style type="text/css">
				.recent-post-carousel-container.recommended-post gallery ul li .tile-card .tile-media picture {
					padding-bottom: ' . $recommended_post_target_height . '%;
				}
			</style>
		';
		// Recommended post cover ratio end
		$recommend_mode = get_theme_mod('muiteer_recommend_post', 'disabled');
		if ($recommend_mode !== "disabled") {
			echo '<section class="recent-post-carousel-wrapper">';
				echo '
					<header class="recent-post-carousel-header">
						<h3>' . esc_html__('Recommended for You', 'muiteer') . '</h3>
					</header>
				';
				$args =  array(
					'numberposts' => 1,
					'post_type' => 'post',
					'post_status' => 'publish',
					'suppress_filters' => false
				);

				$post_query = new WP_Query($args);

				if ( $post_query -> have_posts() ) {
					// Has post
					if ($recommend_mode == "specified") {
						// Specified post
						$recommend_post = get_theme_mod('muiteer_specified_post', 'none');
						if ($recommend_post !== 'none' && ! empty($recommend_post) && $recommend_post[0] !== 'none') {
							echo '
								<section class="recent-post-carousel-container wide-screen wrapper recommended-post">
									<gallery>
										<ul class="swiper-wrapper">
							';
							$all_posts = new WP_Query(
								array(
									'post__in' => $recommend_post,
									'ignore_sticky_posts' => 1
								)
							);
							while ( $all_posts -> have_posts() ) : $all_posts -> the_post();
								muiteer_recommend_post_item(null);
							endwhile;
							wp_reset_postdata();
							echo '
										</ul>
										<div class="swiper-button-next background-blur"></div>
										<div class="swiper-button-prev background-blur"></div>
										<div class="swiper-pagination"></div>
									</gallery>
								</section>
							';
						} else {
							// No post
							muiteer_no_item_tips( esc_html__('Sorry! Currently no post available.', 'muiteer') );
						};
					} else if ($recommend_mode == "random") {
						// Random post
						echo '
							<section class="recent-post-carousel-container wide-screen wrapper recommended-post">
								<gallery>
									<ul class="swiper-wrapper">
						';
						$args = array(
							'numberposts' => 6,
							'orderby'   => 'rand',
							'post_type' => 'post',
							'post_status' => 'publish',
							'suppress_filters' => false
						);
						$post_query = new WP_Query($args);
						$random_posts = wp_get_recent_posts($args);
						foreach($random_posts as $random) {
							muiteer_recommend_post_item( $random["ID"] );
						};
						echo '
									</ul>
									<div class="swiper-button-next background-blur"></div>
									<div class="swiper-button-prev background-blur"></div>
									<div class="swiper-pagination"></div>
								</gallery>
							</section>
						';
					};
					wp_reset_postdata();
				} else {
					// No post
					muiteer_no_item_tips( esc_html__('Sorry! Currently no post available.', 'muiteer') );
				};
			echo '</section>';
		}
	}

	function muiteer_recommend_post_item($post_id) {
		echo '<li class="swiper-slide">';
			$img = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'large')[0];
			if ( empty($img) ) {
				$img = get_template_directory_uri() . '/assets/img/default-post-thumbnail@2x.jpg';
			};
			echo '
				<a href="' . get_the_permalink($post_id) . '" class="tile-card ajax-link">
					<div class="tile-media">
						<picture>
			';

			if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
				echo '
					<img data-src=' . $img . ' src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="  alt="' . get_the_title($post_id) . '" class="swiper-lazy" />
					<div class="swiper-lazy-preloader"></div>
				';
			} else {
				echo '
					<img src=' . $img . ' alt="' . get_the_title($post_id) . '" />
				';
			};
			
			echo '
						</picture>
					</div>
					<div class="tile-content-text">
						<h3>' . get_the_title($post_id) . '</h3>
						<time role="text" datetime="' . get_the_time('c', $post_id) . '" itemprop="datePublished">' . get_the_time("Y-m-d", $post_id) . '</time>
					</div>
				</a>
			';
		echo '</li>';
		wp_reset_query();
	}
endif;

/** Outputs sharing
 *
 * @since 2.2.5
*/

if ( !function_exists('muiteer_sharing') ) :
	function muiteer_sharing() {
		if (get_theme_mod('muiteer_site_share', 'enabled') === 'enabled') {
			// Site sharing start
				echo '
					<section class="site-sharing-container">
						<div class="site-sharing-content" data-subject="' . __("Recommended a great website for you:", "muiteer") . '" data-body="' . __("Visit this link to learn more details:", "muiteer") . '">
							<span class="title">' . __("Share This Page", "muiteer") . '</span>
							<ul>
								<li class="poster">
									' . muiteer_icon('poster', 'icon') . '
									<span class="title">' . __("Build Poster", "muiteer") . '</span>
								</li>
								<li class="link">
									' . muiteer_icon('link', 'icon') . '
									<span class="title" data-default="' . __("Copy Link", "muiteer") . '" data-success="' . __("Copied", "muiteer") . '" data-error="' . __("Error", "muiteer") . '">' . __("Copy Link", "muiteer") . '</span>
								</li>
								<li class="wechat">
									' . muiteer_icon('wechat', 'icon') . '
									<span class="title">' . __("WeChat", "muiteer") . '</span>
								</li>
								<li class="email">
									' . muiteer_icon('email', 'icon') . '
									<span class="title">' . __("Email", "muiteer") . '</span>
								</li>
								<li class="weibo">
									' . muiteer_icon('weibo', 'icon') . '
									<span class="title">' . __("Weibo", "muiteer") . '</span>
								</li>
								<li class="qzone">
									' . muiteer_icon('qzone', 'icon') . '
									<span class="title">' . __("QZone", "muiteer") . '</span>
								</li>
								<li class="facebook">
									' . muiteer_icon('facebook', 'icon') . '
									<span class="title">' . __("Facebook", "muiteer") . '</span>
								</li>
								<li class="twitter">
									' . muiteer_icon('twitter', 'icon') . '
									<span class="title">' . __("Twitter", "muiteer") . '</span>
								</li>
							</ul>
						</div>
					</section>
				';
			// Site sharing end
		}
	}
endif;

/** Outputs site poster
 *
 * @since 2.2.5
*/

if ( !function_exists('muiteer_site_poster') ) :
	function muiteer_site_poster() {
		if (get_theme_mod('muiteer_site_share', 'enabled') === 'enabled') {
			// Get featured image
			$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full")[0];

			if ( empty($featured_image) ) {
				$featured_image = get_template_directory_uri() . '/assets/img/default-post-thumbnail@2x.jpg';
				$width = 1920;
				$height = 1080;
			} else {
				// Get featured image metadata
				$source = wp_get_attachment_metadata( get_post_thumbnail_id($post->ID) );
				$width = $source['width'];
				$height = $source['height'];
			}

			$ratio = $width / $height;
		  	$targetWidth = 768 / $ratio * $ratio;
		  	$targetHeight = $targetWidth / $ratio;

			// Get title
			$title = esc_attr( get_the_title($post->ID) );
			if ( is_front_page() ) {
				$title = get_bloginfo('name');
			}

			// Get description
			$description =  muiteer_get_field('muiteer_seo_description', $post->ID);
			if ( empty($description) ) {
				$description = wp_strip_all_tags( muiteer_excerpt() );
			}

			// Site poster start
				echo '
					<section class="site-poster-container">
						<div class="site-poster-content">
							<div class="card" data-cover="' . $featured_image . '" data-width="' . $targetWidth . '" data-height="' . $targetHeight . '" data-title="' . $title . '" data-description="' . $description . '" data-tips="' . __("Scan the QR code to learn more details", "muiteer") . '">
								<span class="loading"></span>
								<div class="close-button">
									<span class="icon background-blur"></span>
								</div>
							</div>
						</div>
					</section>
				';
			// Site poster end
		}
	}
endif;

/** Outputs global qrcode popup
 *
 * @since 2.2.5
*/

if ( !function_exists('muiteer_global_qrcode_popup') ) :
	function muiteer_global_qrcode_popup($type) {
		if ($type === "sharing") {
			if (get_theme_mod('muiteer_site_share', 'enabled') === 'enabled') {
				echo '
					<section class="global-qrcode-container ' . $type . '">
						<div class="qrcode-box">
							<picture></picture>
							<span class="tips">' . __("Scan the QR code via WeChat", "muiteer") . '</span>
						</div>
					</section>
				';
			}
		}

		if ($type === "wechat") {
			echo '
				<section class="global-qrcode-container ' . $type . '">
					<div class="qrcode-box">
						<picture>
							<img src="' .  esc_url( get_theme_mod('muiteer_social_wechat_qr_code') ) . '" alt="' . esc_html__('WeChat QR Code', 'muiteer') . '" />
						</picture>
						<span class="tips">' . __("Scan the QR code to add on WeChat", "muiteer") . '</span>
					</div>
				</section>
			';
		};

		if ($type === "tiktok") {
			echo '
				<section class="global-qrcode-container ' . $type . '">
					<div class="qrcode-box">
						<picture>
							<img src="' .  esc_url( get_theme_mod('muiteer_social_tiktok_qr_code') ) . '" alt="' . esc_html__('TikTok QR Code', 'muiteer') . '" />
						</picture>
					</div>
				</section>
			';
		};
	}
endif;

/** Outputs JSSDK functions
 *
 * @since 2.2.0
*/

if ( !function_exists('muiteer_jssdk') ) :
	function muiteer_jssdk($postid) {
		//WeChat JSSDK start
		function getaccess_token(){
			$appid = get_theme_mod('muiteer_wechat_app_id');
			$appsecret = get_theme_mod('muiteer_wechat_app_secret');
			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$data = curl_exec($ch);
			curl_close($ch);
			$data = json_decode($data,true);
			return $data['access_token'];
		}
		function getjsapi_ticket(){
			$access_token = getaccess_token();
			$url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token={$access_token}";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$data = curl_exec($ch);
			curl_close($ch);
			$data = json_decode($data,true);
			return $data['ticket'];
		}
		function createNonceStr($length = 16) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$str = "";
			for ($i = 0; $i < $length; $i++) {
				$str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
			}
			return $str;
		}
		function getSignPackage() {
			$jsapiTicket = getjsapi_ticket();
			$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
			$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$timestamp = time();
			$nonceStr = createNonceStr();
			$string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
			$signature = sha1($string);
			$signPackage = array(
				"appId" => get_theme_mod('muiteer_wechat_app_id'),
				"nonceStr" => $nonceStr,
				"timestamp" => $timestamp,
				"url" => $url,
				"signature" => $signature
			);
			return $signPackage; 
		}
		$signPackage = getSignPackage();
		//WeChat JSSDK end

		echo '
			<script type="text/javascript">
		      jQuery(document).ready(function($) {
		        function WeChat(title, desc, link, imgUrl) {
		        	wx.config({
			            debug: false,
			            appId: "' . $signPackage["appId"] . '",
			            timestamp: ' . $signPackage["timestamp"] . ',
			            nonceStr: "' . $signPackage["nonceStr"] . '",
			            signature: "' . $signPackage["signature"] . '",
			            jsApiList: [
				            "checkJsApi",
				            "onMenuShareTimeline",
				            "onMenuShareAppMessage",
				            "onMenuShareQQ",
				            "onMenuShareWeibo",
				            "hideMenuItems",
				            "showMenuItems",
				            "hideAllNonBaseMenuItem",
				            "showAllNonBaseMenuItem",
				            "translateVoice",
				            "startRecord",
				            "stopRecord",
				            "onRecordEnd",
				            "playVoice",
				            "pauseVoice",
				            "stopVoice",
				            "uploadVoice",
				            "downloadVoice",
				            "chooseImage",
				            "previewImage",
				            "uploadImage",
				            "downloadImage",
				            "getNetworkType",
				            "openLocation",
				            "getLocation",
				            "hideOptionMenu",
				            "showOptionMenu",
				            "closeWindow",
				            "scanQRCode",
				            "chooseWXPay",
				            "openProductSpecificView",
				            "addCard",
				            "chooseCard",
				            "openCard"
			            ]
		            });
		            wx.ready(function() {
		            	wx.onMenuShareTimeline({
							title: title,
							link: link,
							imgUrl: imgUrl,
							success: function () {
								//alert("Success!");
							},
							cancel: function () {
								//alert("Cancel!");
							}
						});
						wx.onMenuShareAppMessage({
							title: title,
							desc: desc,
							link: link,
							imgUrl: imgUrl,
							success: function () {
								//alert("Success!");
							},
							cancel: function () {
								//alert("Cancel!");
							}
						});
						wx.onMenuShareQQ({
							title: title,
							desc: desc,
							link: link,
							imgUrl: imgUrl,
							success: function () {
								//alert("Success!");
							},
							cancel: function () {
								//alert("Cancel!");
							}
						});
						wx.onMenuShareQZone({
							title: title,
							desc: desc,
							link: link,
							imgUrl: imgUrl,
							success: function () {
								//alert("Success!");
							},
							cancel: function () {
								//alert("Cancel!");
							}
						});
						wx.hideMenuItems({
							  menuList: ["menuItem:readMode"]
						});
					});
		        };
		        var title = $("title").text(),
			        link = "' . get_permalink() . '",
		';

		//Check global sharing description start
		if (get_theme_mod("muiteer_wechat_global_sharing_description") !== "") {
			echo '
				desc = "' . mb_convert_encoding(get_theme_mod("muiteer_wechat_global_sharing_description"), "UTF-8", "HTML-ENTITIES") . '",
			';
		} else {
			echo '
				desc = $("meta[name=description]").attr("content"),
			';
		}
		//Check global sharing description end

		//Check global sharing thumbnail start
		if ( !empty( get_theme_mod("muiteer_wechat_global_sharing_thumbnail") ) ) {
			echo '
		        imgUrl = "' . wp_get_attachment_image_src(get_theme_mod("muiteer_wechat_global_sharing_thumbnail"), 'thumbnail')[0] . '";
			';
		} else {
			if ( has_post_thumbnail($postid) ) {
				echo '
			        imgUrl = "' . wp_get_attachment_image_src(get_post_thumbnail_id($postid), 'thumbnail')[0] . '";
				';
			} else {
				echo '
			        imgUrl = "' . get_template_directory_uri() . "/assets/img/default-wechat-thumbnail.jpg" . '";
				';
			}
		}
		//Check global sharing thumbnail end

		echo '
				WeChat(title, desc, link, imgUrl);
		      });
		    </script>
		';
	}
endif;

/** Outputs social sharing meta tags
 *
 * @since 1.0.0
*/

if ( !function_exists('muiteer_social_meta') ) :
	function muiteer_social_meta() {
		global $post;
		if ( isset($post) ) {
			if ( muiteer_get_field('muiteer_seo_keywords', $post->ID) ) {
				echo '<meta name="keywords" content="' . muiteer_get_field('muiteer_seo_keywords', $post->ID) . '" />';
			} else {
				echo '<meta name="keywords" content="' . esc_attr( get_bloginfo('name') ) . '" />';
			}
			if ( muiteer_get_field('muiteer_seo_description', $post->ID) ) {
				echo '<meta name="description" content="' . muiteer_get_field('muiteer_seo_description', $post->ID) . '" />';
			} else {
				echo '<meta name="description" content="' . wp_strip_all_tags( muiteer_excerpt() ) . '" />';
			}
			echo '<meta id="meta-ogsitename" property="og:site_name" content="' . esc_attr( get_bloginfo('name') ) . '" />';
			if ( muiteer_get_field('muiteer_seo_description', $post->ID) ) {
				echo '<meta id="meta-description" property="og:description" content="' . muiteer_get_field('muiteer_seo_description', $post->ID) . '" />';
			} else {
				echo '<meta id="meta-description" property="og:description" content="' . wp_strip_all_tags( muiteer_excerpt() ) . '" />';
			}
		    echo '<meta id="meta-ogtitle" property="og:title" content="' . esc_attr( get_the_title() ) . '" />';
		    echo '<meta id="meta-ogtype" property="og:type" content="article" />';
		    echo '<meta id="meta-ogurl" property="og:url" content="' . esc_url( get_permalink() ) . '" />';
		    echo '<meta id="meta-twittercard" name="twitter:card" value="summary" />';
		    echo '<meta id="meta-twittertitle" name="twitter:title" content="' . esc_attr( get_the_title() ) . '" />';
		    if ( muiteer_get_field('muiteer_seo_description', $post->ID) ) {
				echo '<meta id="meta-twitterdescription" property="twitter:description" content="' . muiteer_get_field('muiteer_seo_description', $post->ID) . '" />';
			} else {
				echo '<meta id="meta-twitterdescription" property="twitter:description" content="' . wp_strip_all_tags( muiteer_excerpt() ) . '" />';
			}
		}
	}
endif;

/** Outputs minimal article 
 *
 * @since 2.0.4
*/

if ( !function_exists('muiteer_minimal_article') ) :
	function muiteer_minimal_article() {
		$default_img = "data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==";
		echo '
			<a href="' . get_the_permalink() . '" class="ajax-link">
		';
		if ( has_post_thumbnail() ) {
			if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
				echo '
					<picture>
						<img src="' . $default_img . '" muiteer-data-src="' . wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0] . '" alt="' . get_the_title() . '" class="muiteer-lazy-load" />
					</picture>
				';
			} else {
				echo '
					<picture>
						<img src="' . wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0] . '" alt="' . get_the_title() . '" />
					</picture>
				';
			}
		} else {
			if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
				echo '
					<picture>
						<img src="' . $default_img . '" muiteer-data-src="' . get_template_directory_uri() . '/assets/img/default-page-thumbnail.jpg' . '" alt="' . get_the_title() . '" class="muiteer-lazy-load" />
					</picture>
				';
			} else {
				echo '
					<picture>
						<img src="' . get_template_directory_uri() . '/assets/img/default-page-thumbnail.jpg' . '" alt="' . get_the_title() . '" />
					</picture>
				';
			}
		}
		echo '
			<div class="related-description">
			<h3>' . get_the_title() . '</h3>
		';
		if (muiteer_get_field('muiteer_seo_description', $post->ID) ) {
			echo '
				<p>' . muiteer_get_field('muiteer_seo_description', $post->ID) . '</p>
			';
		} elseif ( !empty( muiteer_excerpt() ) ) {
			echo '
				<p>' . muiteer_excerpt() . '</p>
			';
		}
		echo '
			<time datetime="' . get_the_time('c') . '" itemprop="datePublished">' . get_the_time("Y-m-d") . '</time>
			</div>
			</a>
		';
	}
endif;

/** Outputs post navigation
 *
 * @since 2.1.0
*/

if ( !function_exists('muiteer_recommend_post_navigation') ) :
	function muiteer_recommend_post_navigation($post_type) {
		if (get_theme_mod('muiteer_recommend_' . $post_type . '_navigation', 'enabled') === 'enabled') {
			$next_post = get_adjacent_post(false, '', true, 'category');
			$prev_post = get_adjacent_post(false, '', false, 'category');
			if ( empty($prev_post) && empty($next_post) ) {
			} elseif ( empty($prev_post) ) {
				$output = '
				<section class="post-navigation-container no-prev">
					<h2>' . esc_html__('Article Navigation', 'muiteer') . '</h2>
					<div class="post-navigation-box">
				';
			} elseif ( empty($next_post) ) {
				$output = '
				<section class="post-navigation-container no-next">
					<h2>' . esc_html__('Article Navigation', 'muiteer') . '</h2>
					<div class="post-navigation-box">
				';
			} elseif ( !empty($prev_post) && !empty($next_post) ) {
				$output = '
				<section class="post-navigation-container">
					<h2>' . esc_html__('Article Navigation', 'muiteer') . '</h2>
					<div class="post-navigation-box">
				';
			}
			if ( !empty($prev_post) ) {
				$output .= '<a class="prev ajax-link" href="' . get_the_permalink($prev_post->ID) . '">';
				if ( has_post_thumbnail($prev_post) ) {
					if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
						$output .= '
							<picture>
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" muiteer-data-src="' . wp_get_attachment_image_src(get_post_thumbnail_id($prev_post), 'large')[0] . '" alt="' . get_the_title($prev_post) . '" class="muiteer-lazy-load" />
							</picture>
						';
					} else {
						$output .= '
							<picture>
								<img src="' . wp_get_attachment_image_src(get_post_thumbnail_id($prev_post), 'large')[0] . '" alt="' . get_the_title($prev_post) . '" />
							</picture>
						';
					}
				} else {
					if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
						$output .= '
							<picture>
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" muiteer-data-src="' . get_template_directory_uri() . '/assets/img/default-page-thumbnail.jpg' . '" alt="' . get_the_title($prev_post) . '" class="muiteer-lazy-load" />
							</picture>
						';
					} else {
						$output .= '
							<picture>
								<img src="' . get_template_directory_uri() . '/assets/img/default-page-thumbnail.jpg' . '" alt="' . get_the_title($prev_post) . '" />
							</picture>
						';
					}
				}
				$output .= '
						<div class="post-info">
							<h3 class="post-title"><span class="post-nav">' . esc_html__('Previous Article', 'muiteer') . '</span>' . get_the_title($prev_post) . '</h3>
							<time datetime="' . get_the_time('c', $prev_post) . '" itemprop="datePublished">' . get_the_time("Y-m-d", $prev_post)  . '</time>
						</div>
						<span class="icon"></span>
					</a>
				';
			};
			if ( !empty($next_post) ) {
				$output .= '<a class="next ajax-link" href="' . get_the_permalink($next_post->ID) . '">';
				if ( has_post_thumbnail($next_post) ) {
					if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
						$output .= '
							<picture>
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" muiteer-data-src="' . wp_get_attachment_image_src(get_post_thumbnail_id($next_post), 'large')[0] . '" alt="' . get_the_title($next_post) . '" class="muiteer-lazy-load" />
							</picture>
						';
					} else {
						$output .= '
							<picture>
								<img src="' . wp_get_attachment_image_src(get_post_thumbnail_id($next_post), 'large')[0] . '" alt="' . get_the_title($next_post) . '" />
							</picture>
						';
					}
				} else {
					if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
						$output .= '
							<picture>
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" muiteer-data-src="' . get_template_directory_uri() . '/assets/img/default-page-thumbnail.jpg' . '" alt="' . get_the_title($next_post) . '" class="muiteer-lazy-load" />
							</picture>
						';
					} else {
						$output .= '
							<picture>
								<img src="' . get_template_directory_uri() . '/assets/img/default-page-thumbnail.jpg' . '" alt="' . get_the_title($next_post) . '" />
							</picture>
						';
					}
				}
				$output .= '
						<div class="post-info">
							<h3 class="post-title"><span class="post-nav">' . esc_html__('Next Article', 'muiteer') . '</span>' . get_the_title($next_post) . '</h3>
							<time datetime="' . get_the_time('c', $next_post) . '" itemprop="datePublished">' . get_the_time("Y-m-d", $next_post)  . '</time>
						</div>
						<span class="icon"></span>
					</a>
				';
			}
			if ( !empty($prev_post) || !empty($next_post) ) {
				$output .= '
					</div>
				</section>
				';
			}
			echo $output;
		}
	}
endif;

/** Outputs recent post functions
 *
 * @since 2.2.0
*/

if ( !function_exists('muiteer_recent_post') ) :
	function muiteer_recent_post() {
		if ( is_front_page() ) {
			if (muiteer_get_field('recent_post_post') == 1 || muiteer_get_field('recent_portfolio_post') == 1) {
				// Post cover ratio start
				$blog_cover_ratio = muiteer_get_field('recent_post_cover_ratio');
				$portfolio_cover_ratio = muiteer_get_field('recent_portfolio_cover_ratio');
				
				if ($blog_cover_ratio == "1_1") {
					$blog_target_height = 100;
				} else if ($blog_cover_ratio == "16_9") {
					$blog_target_height = 56.215;
				} else {
					$blog_target_height = 66.667;
				};

				if ($portfolio_cover_ratio == "1_1") {
					$portfolio_target_height = 100;
				} else if ($portfolio_cover_ratio == "16_9") {
					$portfolio_target_height = 56.215;
				} else {
					$portfolio_target_height = 66.667;
				};

				echo '
					<style type="text/css">
						.recent-post-carousel-container.post gallery ul li .tile-card .tile-media picture {
							padding-bottom: ' . $blog_target_height . '%;
						}

						.recent-post-carousel-container.portfolio gallery ul li .tile-card .tile-media picture {
							padding-bottom: ' . $portfolio_target_height . '%;
						}
					</style>
				';
				// Post cover ratio end

				// Recent post carousel start
				function recent_post_carousel($recent_post_type) {
					$args =  array(
						'numberposts' => muiteer_get_field('recent_' . $recent_post_type . '_quantity'),
						'post_type' => $recent_post_type,
						'post_status' => 'publish',
						'suppress_filters' => false
					);
					$post_query = new WP_Query($args);
					if ( $post_query -> have_posts() ) {
						$recent_posts = wp_get_recent_posts($args);
						echo '
							<section class="recent-post-carousel-container wide-screen wrapper ' . $recent_post_type . '">
								<gallery>
									<ul class="swiper-wrapper">
						';
							foreach($recent_posts as $recent){
								echo '<li class="swiper-slide">';
									$img = wp_get_attachment_image_src(get_post_thumbnail_id( $recent["ID"] ), 'large')[0];
									if ( empty($img) ) {
										$img = get_template_directory_uri() . '/assets/img/default-post-thumbnail@2x.jpg';
									};
									echo '
										<a href="' . get_the_permalink( $recent["ID"] ) . '" class="tile-card ajax-link">
											<div class="tile-media">
												<picture>
									';

									if (get_theme_mod('muiteer_site_lazy_loading', 'enabled' ) == "enabled") {
										echo '
											<img data-src=' . $img . ' src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="  alt="' . get_the_title( $recent["ID"] ) . '" class="swiper-lazy" />
											<div class="swiper-lazy-preloader"></div>
										';
									} else {
										echo '
											<img src=' . $img . ' alt="' . get_the_title( $recent["ID"] ) . '" />
										';
									};
									
									echo '
												</picture>
											</div>
											<div class="tile-content-text">
												<h3>' . get_the_title( $recent["ID"] ) . '</h3>
												<time role="text" datetime="' . get_the_time( 'c', $recent["ID"] ) . '" itemprop="datePublished">' . get_the_time("Y-m-d", $recent["ID"]) . '</time>
											</div>
										</a>
									';
								echo '</li>';
							};
							wp_reset_postdata();
						echo '
									</ul>
									<div class="swiper-button-next background-blur"></div>
									<div class="swiper-button-prev background-blur"></div>
									<div class="swiper-pagination"></div>
								</gallery>
							</section>
						';
					} else {
						muiteer_no_item_tips( esc_html__('Sorry! Currently no post available.', 'muiteer') );
					};
					wp_reset_query();
				};
				// Recent post carousel end

				echo '<section class="recent-post-carousel-wrapper">';
					// Get recent blog post start
					if (muiteer_get_field('recent_post_post') == 1) {
						if ( esc_url( get_the_permalink( get_option('page_for_posts') ) ) == get_the_permalink($post->ID) ) {
							echo '
								<header class="recent-post-carousel-header">
									<h3>' . esc_html__('Recent Blog', 'muiteer') . '</h3>
								</header>
							';
						} else {
							echo '
								<header class="recent-post-carousel-header">
									<h3>' . esc_html__('Recent ', 'muiteer') . get_the_title( get_option('page_for_posts') ) . '</h3>
									<a href="' . esc_url( get_the_permalink( get_option('page_for_posts') ) ) . '" class="ajax-link">' . esc_html__('See All', 'muiteer') . '<span></span></a>
								</header>
							';
						};
						recent_post_carousel("post");
					};
					// Get recent blog post end

					// Get recent portfolio post start
					$portfolio_pages = get_pages( array(
						'meta_key' => '_wp_page_template',
						'meta_value' => 'templates/template-portfolio.php',
					) );
					foreach($portfolio_pages as $portfolio_page) {
						$post_homepage_link = get_page_link($portfolio_page->ID);
					}

					if (muiteer_get_field('recent_portfolio_post') == 1) {
						if ( empty($post_homepage_link) ) {
							echo '
								<header class="recent-post-carousel-header">
									<h3>' . esc_html__('Recent Portfolio', 'muiteer') . '</h3>
								</header>
							';
						} else {
							echo '
								<header class="recent-post-carousel-header">
									<h3>' . esc_html__('Recent ', 'muiteer') . get_the_title($portfolio_page->ID) . '</h3>
									<a href="' . $post_homepage_link . '" class="ajax-link">' . esc_html__('See All', 'muiteer') . '<span></span></a>
								</header>
							';
						};
						recent_post_carousel("portfolio");
					};
					// Get recent portfolio post end
				echo '</section>';
			}
		}
		// Recent post end
	}
endif;

/** Outputs post filter
 *
 * @since 2.2.0
*/

if ( !function_exists('muiteer_post_filter') ) : 
	function muiteer_post_filter($post_type, $style) {
		global $post;
		if ($post_type == 'post') {
			// Category
			$categories = get_categories(
				array(
					'hide_empty' => 1,
					'taxonomy' => 'category',
				)
			);

			// Get post homepage link
			$post_homepage_link = get_the_permalink( get_option('page_for_posts') );
		} else {
			// Category
			$categories = get_categories(
				array(
					'hide_empty' => 1,
					'taxonomy' => $post_type . '_category',
				)
			);

			// Get portfolio homepage link
			$portfolio_pages = get_pages( array(
				'meta_key' => '_wp_page_template',
				'meta_value' => 'templates/template-portfolio.php',
			) );
			foreach($portfolio_pages as $portfolio_page) {
				$post_homepage_link = get_page_link($portfolio_page->ID);
			};
		};
		$output .= '<section class="filter-carousel-container wide-screen '. $style .'">';
			$count_posts = wp_count_posts($post_type);
			$published_posts = $count_posts -> publish;
			if ($style == 'thumbnail') {
				$output .= '
					<div class="filter-headline">
						<h3>' . esc_html__('Category', 'muiteer') . '</h3>
					</div>
					<div class="filter-carousel">
						<ul class="swiper-wrapper">
				';
				$output .= '
					<li class="swiper-slide all current">
						<a href="' . $post_homepage_link . '" data-filter="*" class="filter-list-item swiper-lazy">
							<div class="name">' . esc_html__('All', 'muiteer') . '<span class="badge background-blur">' . $published_posts . '</span></div>
						</a>
					</li>
				';
				foreach ($categories as $filter) {
					// Get category link
					$category_link = get_category_link($filter -> cat_ID);

					// Get first featured image from category start
						if ($post_type == 'post') {
							$args = array(
								'post_type' => $post_type,
								'category_name' => $filter -> name,
								'posts_per_page' => -1,
								'orderby' => 'date',
								'order' => 'ASC',
								'hide_empty' => true,
								'post_status' => 'publish',
								'suppress_filters' => false,
							);
						} else {
							$args = array(
								'post_type' => $post_type,
								'portfolio_category' => $filter -> name,
								'posts_per_page' => -1,
								'orderby' => 'date',
								'order' => 'ASC',
								'hide_empty' => true,
								'post_status' => 'publish',
								'suppress_filters' => false,
							);
						}
						$all_posts = new WP_Query($args); 
						while ( $all_posts -> have_posts() ) : $all_posts -> the_post();
							$post_id = $post -> ID;
						endwhile; 
						wp_reset_query();

						$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'medium')[0];
						if( empty($featured_image) ) {
							$featured_image = get_template_directory_uri() . '/assets/img/default-post-thumbnail.jpg';
						}
					// Get first featured image from category end

					$output .= '
						<li class="swiper-slide">
					';
					if(get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
						$output .= '
							<a href="' . $category_link .'" data-filter=".' . muiteer_strToHex($filter -> name) . '" data-background="' . $featured_image . '" class="filter-list-item swiper-lazy">
						';
					} else {
						$output .= '
							<a href="' . $category_link .'" data-filter=".' . muiteer_strToHex($filter -> name) . '" style="background-image: url(' . $featured_image . ');" class="filter-list-item">
						';
					};
					$output .= '
								<div class="name">' . $filter -> name . '<span class="badge background-blur">' . $filter -> count . '</span></div>
							</a>
						</li>
					';
				}
			} elseif ($style == 'text') {
				$output .= '
					<div class="filter-headline">
						<h3>' . esc_html__('Category', 'muiteer') . '</h3>
					</div>
					<div class="filter-carousel">
						<ul class="swiper-wrapper">
				';
				$output .= '
					<li class="swiper-slide all current">
						<a href="' . $post_homepage_link . '" data-filter="*" class="filter-list-item">
							<div class="name">' . esc_html__('All', 'muiteer') . '<span class="badge">' . $published_posts . '</span></div>
						</a>
					</li>
				';
				foreach ($categories as $filter) {
					// Get category link
					$category_link = get_category_link($filter -> cat_ID);
					$output .= '
						<li class="swiper-slide">
							<a href="' . $category_link . '" data-filter=".' . muiteer_strToHex($filter -> name) . '" class="filter-list-item">
								<div class="name">' . $filter -> name . '<span class="badge">' . $filter -> count . '</span></div>
							</a>
						</li>
					';
				}
			};
		$output .= '</ul></div></section>';
		echo $output;
	}
endif;

/** Outputs post list
 *
 * @since 2.2.0
*/

if ( !function_exists('muiteer_post_list') ) : 
	function muiteer_post_list($post_type, $post_id) {
		$source_image_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail')[0];
		if( empty($source_image_thumbnail) ) {
			$source_image_original = get_template_directory_uri() . '/assets/img/default-post-thumbnail.jpg';
			$source_image_retina = get_template_directory_uri() . '/assets/img/default-post-thumbnail@2x.jpg';
			list($width, $height) = getimagesize(get_template_directory() . '/assets/img/default-post-thumbnail@2x.jpg');
		} else {
			$source_image_original = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
			$source_image_retina = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
			// Get image metadata
			$source = wp_get_attachment_metadata(get_post_thumbnail_id());
			$width = $source['width'];
			$height = $source['height'];
		}
	    $cover_ratio = get_theme_mod('muiteer_' . $post_type . '_cover_ratio', 'responsive');
	    if ($cover_ratio == "responsive") {
	    	// Response
			$ratio = $width / $height;
		    $targetWidth = 100 / $ratio * $ratio;
		    $targetHeight = $targetWidth / $ratio;
	    } else if ($cover_ratio == "1_1") {
	    	// 1:1
	    	$targetHeight = 100;
	    	$ellipsis = " ellipsis";
	    } else if ($cover_ratio == "4_3") {
	    	// 4:3
	    	$targetHeight = 66.667;
	    	$ellipsis = " ellipsis";
	    } else if ($cover_ratio == "16_9") {
	    	// 16:9
	    	$targetHeight = 56.215;
	    	$ellipsis = " ellipsis";
	    }

	    // Get category list
	    $category_post_type = ($post_type == "blog") ? 'category' : $post_type . '_category';
	    $categories = wp_get_post_terms($post_id, $category_post_type);
		$category_list = '';
		foreach($categories as $category) {
			$category_list_item .= muiteer_strToHex($category -> name) . " ";
		}

	    echo '
		    <article id="post-' . get_the_ID() . '" class="' . $category_list_item . ' ' . join( ' ', get_post_class("post-item-card") ) . '">
				<a class="post-item-link ajax-link" href="' . get_permalink() . '">
					<div class="post-featured-image-box">
		';

		if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
			echo '<div class="post-featured-image muiteer-lazy-load" style="padding-top: ' . $targetHeight . '%;" data-width="' . $width . '" data-height="' . $height . '" muiteer-data-src="' . $source_image_original . '" muiteer-data-src-retina="' . $source_image_retina .'"></div>';
		} else {
			echo '<div class="post-featured-image" style="padding-top: ' . $targetHeight . '%; background-image: url(' . $source_image_original . '); background-image: -webkit-image-set(url(' . $source_image_retina . ') 2x); background-image: -moz-image-set(url(' . $source_image_retina . ') 2x); background-image: -o-image-set(url(' . $source_image_retina . ') 2x); background-image: image-set(url(' . $source_image_retina . ') 2x);" data-width="' . $width . '" data-height="' . $height . '"></div>';
		}

		echo '
					</div>
					<header class="post-caption">
						<h2 class="post-title'. $ellipsis .'">' . get_the_title() . '</h2>
						<time class="post-time" datetime="' . get_the_time("c") . '" itemprop="datePublished">' . get_the_time("Y-m-d") . '</time>
					</header>
				</a>
			</article>
	    ';
	}
endif;

/** Outputs muiteer slide
 *
 * @since 2.2.0
*/

if ( !function_exists('muiteer_slide') ) :
	function muiteer_slide($postid) {
		global $post;

		function muiteer_hex_to_rgb($hex, $alpha = false) {
		   $hex = str_replace('#', '', $hex);
		   $length = strlen($hex);
		   $rgb['r'] = hexdec( $length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0) );
		   $rgb['g'] = hexdec( $length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0) );
		   $rgb['b'] = hexdec( $length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0) );
		   if ($alpha) {
		      $rgb['a'] = $alpha;
		   }
		   return $rgb;
		}

		if ( !(is_search() || is_archive() || is_home() ) && muiteer_get_field('slide_visibility', $postid) === true ) {
			// Public parameters.

			// Get autoplay value.
			$autoplayValue = muiteer_get_field('slide_autoplay', $postid) * 1000;

			// Get scroll with the content value.
			$scroll_with_content = (muiteer_get_field('slide_scroll_with_the_content', $postid) == 1) ? '' : ' sticky';

			// Get height value.
			$height = muiteer_get_field('slide_height', $postid );

			// Get content visibility value.
			$content_visibility = muiteer_get_field('slide_content_visibility', $postid);
			
			// Slide enabled.
			$output .= '<section class="hero-slide-container' . $scroll_with_content . '" data-slide-height="' . $height . '" data-content-visibility="' . $content_visibility . '" data-prev-next-buttons="' . muiteer_get_field('slide_previous_and_next_buttons', $postid) . '" data-navi-dots="' . muiteer_get_field('slide_navigation_dots', $postid) . '" data-autoplay="' . $autoplayValue . '">';
				// Page background opacity
				$page_bg_opacity_start = 1 - muiteer_get_field('page-bg-opacity-s', $postid) / 100;
				$page_bg_opacity_end = 1 - muiteer_get_field('page-bg-opacity', $postid) / 100;
				$output .= '
					<style type="text/css">
						.hero-slide-container {
							opacity: ' . $page_bg_opacity_start . ';
						}
						.hero-slide-container.active {
							opacity: ' . $page_bg_opacity_end . ';
						}
					</style>
				';

				// Slide count
				$slide_counter = 0;
				while( have_rows('slide_content', $postid) ): the_row();
					$slide_counter++;
				endwhile;

				if ($slide_counter <= 1) {
					$slide_count = ' data-slide-count="single"';
				} else {
					$slide_count = ' data-slide-count="multiple"';
				};

				$output .= '<gallery><ul class="swiper-wrapper"' . $slide_count . '>';

				$counter = 0;
				while( have_rows('slide_content', $postid) ): the_row();
					$counter++;
					// Desktop parameters.
					$desktop_file = get_sub_field('slide_image_or_video_desktop', $postid);
					$desktop_video_cover = get_sub_field('slide_video_cover_desktop', $postid);
					$desktop_lazyload_cover = (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") ? ' data-background="' . $desktop_video_cover . '"' : ' style="background-image: url(' . $desktop_video_cover . ');"';
					$desktop_overlay_opacity = get_sub_field('slide_overlay_opacity_desktop', $postid) / 100;
					$desktop_overlay_color = get_sub_field('slide_overlay_color_desktop', $postid);
					$desktop_overlay_rgba = muiteer_hex_to_rgb($desktop_overlay_color, $desktop_overlay_opacity);
					$desktop_rgba = $desktop_overlay_rgba['r'] . ', ' . $desktop_overlay_rgba['g'] . ', ' . $desktop_overlay_rgba['b'] . ', ' . $desktop_overlay_rgba['a'];
					$desktop_caption_color = get_sub_field('slide_caption_color_desktop', $postid);
					$desktop_animation =  (get_sub_field('slide_animation_desktop', $postid) == 1) ? ' animation' : '';
					$desktop_link =  get_sub_field('slide_link_desktop', $postid);
					$desktop_ajax = ( !empty($desktop_link) ) ? 'ajax-link ' : '';
					$desktop_title = get_sub_field('slide_title_desktop', $postid);
					$desktop_subtitle = get_sub_field('slide_subtitle_desktop', $postid);
					$desktop_lazyload_file = (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") ? ' data-background="' . $desktop_file . '"' : ' style="background-image: url(' . $desktop_file . ');"'; 
					
					// Pad parameters.
					$pad_file = get_sub_field('slide_image_or_video_pad', $postid);
					$pad_video_cover = get_sub_field('slide_video_cover_pad', $postid);
					$pad_lazyload_cover = (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") ? ' data-background="' . $pad_video_cover . '"' : ' style="background-image: url(' . $pad_video_cover . ');"';
					$pad_overlay_opacity = get_sub_field('slide_overlay_opacity_pad', $postid) / 100;
					$pad_overlay_color = get_sub_field('slide_overlay_color_pad', $postid);
					$pad_overlay_rgba = muiteer_hex_to_rgb($pad_overlay_color, $pad_overlay_opacity);
					$pad_rgba = $pad_overlay_rgba['r'] . ', ' . $pad_overlay_rgba['g'] . ', ' . $pad_overlay_rgba['b'] . ', ' . $pad_overlay_rgba['a'];
					$pad_caption_color = get_sub_field('slide_caption_color_pad', $postid);
					$pad_animation =  (get_sub_field('slide_animation_pad', $postid ) == 1) ? ' animation' : '';
					$pad_link =  get_sub_field('slide_link_pad', $postid );
					$pad_ajax = ( !empty($pad_link) ) ? 'ajax-link ' : '';
					$pad_title = get_sub_field('slide_title_pad', $postid );
					$pad_subtitle = get_sub_field('slide_subtitle_pad', $postid );
					$pad_lazyload_file = (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") ? ' data-background="' . $pad_file . '"' : ' style="background-image: url(' . $pad_file . ');"'; 
					
					// Mobile parameters.
					$mobile_file = get_sub_field('slide_image_or_video_mobile', $postid);
					$mobile_video_cover = get_sub_field('slide_video_cover_mobile', $postid);
					$mobile_lazyload_cover = (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") ? ' data-background="' . $mobile_video_cover . '"' : ' style="background-image: url(' . $mobile_video_cover . ');"';
					$mobile_overlay_opacity = get_sub_field('slide_overlay_opacity_mobile', $postid) / 100;
					$mobile_overlay_color = get_sub_field('slide_overlay_color_mobile', $postid);
					$mobile_overlay_rgba = muiteer_hex_to_rgb($mobile_overlay_color, $mobile_overlay_opacity);
					$mobile_rgba = $mobile_overlay_rgba['r'] . ', ' . $mobile_overlay_rgba['g'] . ', ' . $mobile_overlay_rgba['b'] . ', ' . $mobile_overlay_rgba['a'];
					$mobile_caption_color = get_sub_field('slide_caption_color_mobile', $postid);
					$mobile_animation =  (get_sub_field('slide_animation_mobile', $postid) == 1) ? ' animation' : '';
					$mobile_link =  get_sub_field('slide_link_mobile', $postid);
					$mobile_ajax = ( !empty($mobile_link) ) ? 'ajax-link ' : '';
					$mobile_title = get_sub_field('slide_title_mobile', $postid);
					$mobile_subtitle = get_sub_field('slide_subtitle_mobile', $postid);
					$mobile_lazyload_file = (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") ? ' data-background="' . $mobile_file . '"' : ' style="background-image: url(' . $mobile_file . ');"';

					$desktop_path_info = pathinfo($desktop_file);
					$desktop_extension = $desktop_path_info['extension'];

					$pad_path_info = pathinfo($pad_file);
					$pad_extension = $pad_path_info['extension'];

					$mobile_path_info = pathinfo($mobile_file);
					$mobile_extension = $mobile_path_info['extension'];

					// ********Set Slide Start********
						$output .= '<li class="swiper-slide" data-index="' . $counter . '">';
							// ********For Desktop Start********
							if ($desktop_extension == 'mp4') {
								// File is video.
								$output .= '
									<div class="slide-media-box has-video desktop' . $desktop_animation . '" data-overlay-color="' . $desktop_overlay_color . '" data-text-color="' . $desktop_caption_color . '">
										<div class="slide-video" data-video="' . $desktop_file . '">
								';
									if ( !empty($desktop_video_cover) ) {
										$output .= '
											<div class="slide-video-cover-box">
												<div class="slide-video-cover swiper-lazy"' . $desktop_lazyload_cover . '"></div>
											</div>
										';
									}
								$output .= '</div>';

									// Output overlay
									$output .= '
										<div class="slide-overlay-wrapper" style="background-color: rgba(' . $desktop_rgba . ');"></div>
									';

									// Output slide content.
									if ( !empty($desktop_title) || !empty($desktop_subtitle) || !empty($desktop_link) ) {
										$output .= '<div class="slide-caption-wrapper wrapper" style="color: ' . $desktop_caption_color . '">';
											if ( !empty($desktop_title) ) {
												$output .= '<h2 class="headline">' . $desktop_title . '</h2>';
											};
											if ( !empty($desktop_subtitle) ) {
												$output .= '<h3 class="subhead">' . $desktop_subtitle . '</h3>';
											};
											if ( !empty($desktop_link) ) {
												$output .= '<a href="' . $desktop_link . '" class="' . $desktop_ajax . 'slide-link button button-primary" style="color: ' . $desktop_overlay_color . ' !important; background-color: ' . $desktop_caption_color . ';">' .esc_html__('Learn more', 'muiteer') . '</a>';
											};
										$output .= '</div>';
									};
								$output .= '</div>';
							} else {
								// File is image.
								$output .= '
									<div class="slide-media-box desktop' . $desktop_animation . '" data-overlay-color="' . $desktop_overlay_color . '" data-text-color="' . $desktop_caption_color . '">
										<div class="slide-media swiper-lazy"' . $desktop_lazyload_file . '></div>
								';
									// Output link
									$output .= '' . $desktop_has_link . '';

									// Output overlay
									$output .= '
										<div class="slide-overlay-wrapper" style="background-color: rgba(' . $desktop_rgba . ');"></div>
									';

									// Output slide content.
									if ( !empty($desktop_title) || !empty($desktop_subtitle) || !empty($desktop_link) ) {
										$output .= '<div class="slide-caption-wrapper wrapper" style="color: ' . $desktop_caption_color . '">';
											if ( !empty($desktop_title) ) {
												$output .= '<h2 class="headline">' . $desktop_title . '</h2>';
											};
											if ( !empty($desktop_subtitle) ) {
												$output .= '<h3 class="subhead">' . $desktop_subtitle . '</h3>';
											};
											if ( !empty($desktop_link) ) {
												$output .= '<a href="' . $desktop_link . '" class="' . $desktop_ajax . 'slide-link button button-primary" style="color: ' . $desktop_overlay_color . ' !important; background-color: ' . $desktop_caption_color . ';">' .esc_html__('Learn more', 'muiteer') . '</a>';
											};
										$output .= '</div>';
									};
								$output .= '</div>';
							};
							// ********For Desktop End********

							// ********For Pad Start********
							if ( !empty($pad_file) ) {
								if ($pad_extension == 'mp4') {
									// File is video.
									$output .= '
										<div class="slide-media-box has-video pad' . $pad_animation . '" data-overlay-color="' . $pad_overlay_color . '" data-text-color="' . $pad_caption_color . '">
											<div class="slide-video" data-video="' . $pad_file . '">
									';
										if (!empty($pad_video_cover)) {
											$output .= '
												<div class="slide-video-cover-box">
													<div class="slide-video-cover swiper-lazy"' . $pad_lazyload_cover . '"></div>
												</div>
											';
										}
									$output .= '</div>';

										// Output link
										$output .= '' . $pad_has_link . '';

										// Output overlay
										$output .= '
											<div class="slide-overlay-wrapper" style="background-color: rgba(' . $pad_rgba . ');"></div>
										';

										// Output slide content.
										if ( !empty($pad_title) || !empty($pad_subtitle) || !empty($pad_link) ) {
											$output .= '<div class="slide-caption-wrapper wrapper" style="color: ' . $pad_caption_color . '">';
												if ( !empty($pad_title) ) {
													$output .= '<h2 class="headline">' . $pad_title . '</h2>';
												};
												if ( !empty($pad_subtitle) ) {
													$output .= '<h3 class="subhead">' . $pad_subtitle . '</h3>';
												};
												if ( !empty($pad_link) ) {
													$output .= '<a href="' . $pad_link . '" class="' . $pad_ajax . 'slide-link button button-primary" style="color: ' . $pad_overlay_color . ' !important; background-color: ' . $pad_caption_color . ';">' .esc_html__('Learn more', 'muiteer') . '</a>';
												};
											$output .= '</div>';
										};
									$output .= '</div>';
								} else {
									// File is image.
									$output .= '
										<div class="slide-media-box pad' . $pad_animation . '" data-overlay-color="' . $pad_overlay_color . '" data-text-color="' . $pad_caption_color . '">
											<div class="slide-media swiper-lazy"' . $pad_lazyload_file . '></div>
									';
										// Output link
										$output .= '' . $pad_has_link . '';

										// Output overlay
										$output .= '
											<div class="slide-overlay-wrapper" style="background-color: rgba(' . $pad_rgba . ');"></div>
										';

										// Output slide content.
										if ( !empty($pad_title) || !empty($pad_subtitle) || !empty($pad_link) ) {
											$output .= '<div class="slide-caption-wrapper wrapper" style="color: ' . $pad_caption_color . '">';
												if ( !empty($pad_title) ) {
													$output .= '<h2 class="headline">' . $pad_title . '</h2>';
												};
												if ( !empty($pad_subtitle) ) {
													$output .= '<h3 class="subhead">' . $pad_subtitle . '</h3>';
												};
												if ( !empty($pad_link) ) {
													$output .= '<a href="' . $pad_link . '" class="' . $pad_ajax . 'slide-link button button-primary" style="color: ' . $pad_overlay_color . ' !important; background-color: ' . $pad_caption_color . ';">' .esc_html__('Learn more', 'muiteer') . '</a>';
												};
											$output .= '</div>';
										};
									$output .= '</div>';
								}
							};
							// ********For Pad End********

							// ********For Mobile Start********
							if ( !empty($mobile_file) ) {
								if ($mobile_extension == 'mp4') {
									// File is video.
									$output .= '
										<div class="slide-media-box has-video mobile' . $mobile_animation . '" data-overlay-color="' . $mobile_overlay_color . '" data-text-color="' . $mobile_caption_color . '">
											<div class="slide-video" data-video="' . $mobile_file . '">
									';
										if (!empty($mobile_video_cover)) {
											$output .= '
												<div class="slide-video-cover-box">
													<div class="slide-video-cover swiper-lazy"' . $mobile_lazyload_cover . '"></div>
												</div>
											';
										}
									$output .= '</div>';

										// Output overlay
										$output .= '
											<div class="slide-overlay-wrapper" style="background-color: rgba(' . $mobile_rgba . ');"></div>
										';

										// Output slide content.
										if ( !empty($mobile_title) || !empty($mobile_subtitle) || !empty($mobile_link) ) {
											$output .= '<div class="slide-caption-wrapper wrapper" style="color: ' . $mobile_caption_color . '">';
												if ( !empty($mobile_title) ) {
													$output .= '<h2 class="headline">' . $mobile_title . '</h2>';
												};
												if ( !empty($mobile_subtitle) ) {
													$output .= '<h3 class="subhead">' . $mobile_subtitle . '</h3>';
												};
												if ( !empty($mobile_link) ) {
													$output .= '<a href="' . $mobile_link . '" class="' . $mobile_ajax . 'slide-link button button-primary" style="color: ' . $mobile_overlay_color . ' !important; background-color: ' . $mobile_caption_color . ';">' .esc_html__('Learn more', 'muiteer') . '</a>';
												};
											$output .= '</div>';
										};
									$output .= '</div>';
								} else {
									// File is image.
									$output .= '
										<div class="slide-media-box mobile' . $mobile_animation . '" data-overlay-color="' . $mobile_overlay_color . '" data-text-color="' . $mobile_caption_color . '">
											<div class="slide-media swiper-lazy"' . $mobile_lazyload_file . '></div>
									';
										// Output overlay
										$output .= '
											<div class="slide-overlay-wrapper" style="background-color: rgba(' . $mobile_rgba . ');"></div>
										';

										// Output slide content.
										if ( !empty($mobile_title) || !empty($mobile_subtitle) || !empty($mobile_link) ) {
											$output .= '<div class="slide-caption-wrapper wrapper" style="color: ' . $mobile_caption_color . '">';
												if ( !empty($mobile_title) ) {
													$output .= '<h2 class="headline">' . $mobile_title . '</h2>';
												};
												if ( !empty($mobile_subtitle) ) {
													$output .= '<h3 class="subhead">' . $mobile_subtitle . '</h3>';
												};
												if ( !empty($mobile_link) ) {
													$output .= '<a href="' . $mobile_link . '" class="' . $mobile_ajax . 'slide-link button button-primary" style="color: ' . $mobile_overlay_color . ' !important; background-color: ' . $mobile_caption_color . ';">' .esc_html__('Learn more', 'muiteer') . '</a>';
												};
											$output .= '</div>';
										};
									$output .= '</div>';
								}
							};
							// ********For Mobile End********
						$output .= '</li>';
					// ********Set Slide End********
				endwhile;

				$output .= '</gallery></ul>';

				if (muiteer_get_field('slide_previous_and_next_buttons', $postid) == 1 && $slide_counter > 1) {
					$output .= '
						<div class="swiper-button-prev background-blur"></div>
						<div class="swiper-button-next background-blur"></div>
					';
				};
				if (muiteer_get_field('slide_navigation_dots', $postid) == 1 && $slide_counter > 1) {
					$output .= '<div class="swiper-pagination"></div>';
				};
			$output .= '</section>';
		} else {
			// Slide disabled.
			$output .= '';
		};

		echo $output;
	}
endif;

/** Outputs friendly link
 *
 * @since 2.2.1
*/

if ( !function_exists('muiteer_friendly_link') ) :
	function muiteer_friendly_link($postid, $mode, $count) {
		if ($mode == "slide") {
			echo '<section class="friendly-link-carousel-wrapper">';
			if ( $postid == get_option('page_on_front') ) {
				echo '
					<header class="recent-post-carousel-header">
						<h3>' . esc_html__('Friendly Link', 'muiteer') . '</h3>
					</header>
				';
			} else {
				echo '
					<header class="recent-post-carousel-header">
						<h3>' . get_the_title($postid) . '</h3>
						<a href="' . get_permalink($postid) . '" class="ajax-link">' . esc_html__('See All', 'muiteer') . '<span></span></a>
					</header>
				';
			};
		};

		$counter = 0;
		while( have_rows('friendly_member', $postid) ): the_row();
			$counter++;
		endwhile;

		if ($counter >= 1) {
			if ($mode == "slide") {
				echo '
					<section class="friendly-link-carousel-container wide-screen wrapper">
						<div class="friendly-link-carousel">
							<ul class="swiper-wrapper">
				';
			} else {
				echo '
					<section class="friendly-link-container">
						<ul class="friendly-link-list">
				';
			};

			$counter = 0;
			while(have_rows('friendly_member', $postid) ): the_row();
				$counter++;

				if ($counter > $count && $mode == "slide") {
					break;
				} else {
					// Value
					$friendly_link = get_sub_field('friendly_link', $postid);
					$default_avatar = get_template_directory_uri() . '/assets/img/default-avatar.jpg';
					$friendly_avatar = wp_get_attachment_image_src(get_sub_field('friendly_avatar', $postid), 'thumbnail')[0];
					$friendly_name = get_sub_field('friendly_name', $postid);
					$friendly_description = get_sub_field('friendly_description', $postid);
					
					if ($mode == "slide") {
						echo '<li class="swiper-slide">';
					} else {
						echo '<li class="friendly-link-item">';
					};
					echo '<div class="friendly-link-content">';
					// Avatar
					if ( empty($friendly_avatar) ) {
						if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
							if ($mode == "slide") {
								echo '
									<picture>
										<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src=' . $default_avatar . ' alt="' . $friendly_name . '" class="swiper-lazy" />
									</picture>
								';
							} else {
								echo '
									<picture>
										<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" muiteer-data-src=' . $default_avatar . ' alt="' . $friendly_name . '" class="muiteer-lazy-load" />
									</picture>
								';
							};
						} else {
							echo '
								<picture>
									<img src=' . $default_avatar . ' alt="' . $friendly_name . '" />
								</picture>
							';
						};
					} else {
						if (get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
							if ($mode == "slide") {
								echo '
									<picture>
										<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src=' . $friendly_avatar . ' alt="' . $friendly_name . '" class="swiper-lazy" />
									</picture>
								';
							} else {
								echo '
									<picture>
										<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" muiteer-data-src=' . $friendly_avatar . ' alt="' . $friendly_name . '" class="muiteer-lazy-load" />
									</picture>
								';
							};
						} else {
							echo '
								<picture>
									<img src=' . $friendly_avatar . ' alt="' . $friendly_name . '" />
								</picture>
							';
						};
					};
					// Description
					if ( empty($friendly_description) ) {
						echo '
							<div class="friendly-link-summary no-description">
								<h3 class="name">' . $friendly_name . '</h3>
								<span class="description">...</span>
							</div>
						';
					} else {
						echo '
							<div class="friendly-link-summary">
								<h3 class="name">' . $friendly_name . '</h3>
								<span class="description">' . $friendly_description . '</span>
							</div>
						';
					};
					// Link
					echo '<a href="' . $friendly_link . '" rel="nofollow" target="_blank" class="button button-round button-mini">' . esc_html__('Visit', 'muiteer') . '</a>';
					echo '
							</div>
						</li>
					';
				}
			endwhile;

			echo '
					</ul>
				</section>
			';
		} else {
			if ($mode == "slide") {
				muiteer_no_item_tips( esc_html__('Sorry! Currently no friendly link available.', 'muiteer') );
			};
		};

		if ($mode == "slide") {
			echo '</section>';
		};
	}
endif;

/** Outputs brand wall
 *
 * @since 2.2.5
*/

if ( !function_exists('muiteer_brand_wall') ) :
	function muiteer_brand_wall($postid) {
		if ( muiteer_get_field('about_brand_wall_visibility', $postid) == 1 ) {
			$counter = 0;
			while( have_rows('about_brand_wall_repeater', $postid) ): the_row();
				$counter++;
			endwhile;
			if ($counter >= 1) {

				// View mode
				if (muiteer_get_field('about_brand_wall_view_mode', $postid) == 'grid') {
					echo '
						<section class="brand-wall-container grid-mode">
					';
				} else {
					echo '
						<section class="brand-wall-container river-mode wide-screen">
					';
				};

				echo '
					<ul class="brand-wall-list">
				';

				while( have_rows('about_brand_wall_repeater', $postid) ): the_row();
					echo '<li class="brand-wall-item">';
						// Value
						$brand_logo = wp_get_attachment_image_src(get_sub_field('about_brand_logo', $postid), 'medium')[0];
						
						$string = get_sub_field('about_brand_name', $postid);
						$brand_name = $string ? '<span class="brand-name">' . $string . '</span>' : '';

						// Brand logo
						if ( empty($brand_logo) ) {
							if (muiteer_get_field('about_brand_wall_view_mode', $postid) == 'grid' &&  get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
								// Grid mode & lazyload
								echo '
									<picture>
										<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" muiteer-data-src="' . get_template_directory_uri() . '/assets/img/default-avatar.jpg" class="muiteer-lazy-load" />
										'. $brand_name .'
									</picture>
								';
							} else {
								// River mode & no lazyload
								echo '
									<picture>
										<img src="' . get_template_directory_uri() . '/assets/img/default-avatar.jpg" />
										'. $brand_name .'
									</picture>
								';
							};
						} else {
							if (muiteer_get_field('about_brand_wall_view_mode', $postid) == 'grid' &&  get_theme_mod('muiteer_site_lazy_loading', 'enabled') == "enabled") {
								// Grid mode & lazyload
								echo '
									<picture>
										<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" muiteer-data-src="' . $brand_logo . '" class="muiteer-lazy-load" />
										'. $brand_name .'
									</picture>
								';
							} else {
								// River mode & no lazyload
								echo '
									<picture>
										<img src="' . $brand_logo . '" />
										'. $brand_name .'
									</picture>
								';
							};
						};
					echo '</li>';
				endwhile;

				echo '
						</ul>
					</section>
				';
			};
		};
	}
endif;

/** Outputs quick button
 *
 * @since 2.0.0
*/

if ( !function_exists('muiteer_quick_button') ) :
	function muiteer_quick_button() {
		global $post;

		$sidebar_icon = muiteer_icon('quick_button_sidebar', 'icon');
		$close_icon = muiteer_icon('quick_button_close', 'icon');
		$comment_icon = muiteer_icon('quick_button_comment', 'icon');
		$filter_icon = muiteer_icon('quick_button_filter', 'icon');
		$scroll_top_icon = muiteer_icon('quick_button_scroll_top', 'icon');

		if ( function_exists('is_woocommerce') ) {
	        if ( is_product() ) {
	        	$product_page = true;
	        } else {
	        	$product_page = false;
	        }
	    } else {
	    	$product_page = false;
	    }

		if ( is_single() && $product_page == false ) {
			if ( is_singular("post") ) {
				// Blog
				if (get_theme_mod('muiteer_post_widget_sidebar', 'disabled') === 'enabled') {
					echo '
						<section class="quick-button-container background-blur">
							<div class="sidebar quick-button">' . $sidebar_icon . '</div>
					';
				} else {
					echo '
						<section class="quick-button-container background-blur">
					';
				}

				// Close button
				if( esc_url( get_the_permalink( get_option('page_for_posts') ) ) == get_the_permalink($post->ID) ) {
					echo '
						<a class="close quick-button ajax-link" href="' . esc_url( home_url('/') ) . '">' . $close_icon . '</a>
					';
				} else {
					echo '
						<a class="close quick-button ajax-link" href="' . esc_url( get_the_permalink( get_option('page_for_posts') ) ) . '">' . $close_icon . '</a>
					';
				}
			} elseif ( is_singular("portfolio") ) {
				//Portfolio

				if (get_theme_mod('muiteer_portfolio_widget_sidebar', 'disabled') === 'enabled') {
					echo '
						<section class="quick-button-container background-blur">
							<div class="sidebar quick-button">' . $sidebar_icon . '</div>
					';
				} else {
					echo '
						<section class="quick-button-container background-blur">
					';
				}

				// Close button
				$portfolio_pages = get_pages( array(
					'meta_key' => '_wp_page_template',
					'meta_value' => 'templates/template-portfolio.php',
				) );
				foreach($portfolio_pages as $portfolio_page) {
					$post_homepage_link = get_page_link($portfolio_page->ID);
				};

				if( empty($post_homepage_link) ) {
					echo '
						<a class="close quick-button ajax-link" href="' . esc_url( home_url('/') ) . '">' . $close_icon . '</a>
					';
				} else {
					echo '
						<a class="close quick-button ajax-link" href="' . $post_homepage_link . '">' . $close_icon . '</a>
					';
				}
			} elseif ( is_singular("docs") ) {
				// Documentation
				echo '
					<section class="quick-button-container background-blur quick-button-desc documentation">
						<div class="quick-button-desc-box">
							' . $sidebar_icon . '
							<span class="context">' . __("Documentation Contents", "muiteer") . '</span>
						</div>
					</section>
				';
			}

			if ( is_singular("post") || is_singular("portfolio") ) {
					// Comments
					if ( comments_open() || get_comments_number() ) {
						if ( !post_password_required($post->ID) ) {
							if( get_comments_number('0', '1', '%') == "0") {
								echo '
									<div class="comments quick-button">' . $comment_icon . '</div>
								';
							} else {
								echo '
									<div class="comments quick-button">
										' . $comment_icon . '
										<span class="badge">' . get_comments_number('0', '1', '%') . '</span>
									</div>
								';
							};
						};
					};

					// Scroll top
					if (get_theme_mod('muiteer_scroll_top_button', 'disabled') === 'enabled') {
						echo '<div class="scroll-top quick-button invisible">' . $scroll_top_icon . '</div>';
					}
				echo '</section>';
			}
		} elseif ( is_shop() ) {
			// WooCommerce
			if (get_theme_mod('muiteer_product_category', 'enabled') == 'enabled') {
				echo '
					<section class="quick-button-container background-blur quick-button-desc woocommerce">
						<div class="quick-button-desc-box">
							' . $sidebar_icon . '
							<span class="context">' . __("Category", "muiteer") . '</span>
						</div>
					</section>
				';
			};
		}
	}
endif;

/** Outputs footer information
 *
 * @since 2.2.6
*/

if ( !function_exists('muiteer_footer_information') ) :
	function muiteer_footer_information() {
		// Copyright content start
			$web_created_time_str = get_theme_mod('muiteer_web_created_time');
			echo '<div class="copyright">';
				if ($web_created_time_str) {
					$web_created_time = $web_created_time_str . '-';
				};
				echo esc_html__('Copyright &copy;', 'muiteer') . ' ' . $web_created_time . date("Y") . ' ' . str_replace( array('http://', 'https://'), '', get_site_url() ) . '. ' . esc_html__('All rights reserved.', 'muiteer');
				if (get_theme_mod('muiteer_thanks_for_muiteer', 'enabled') === 'enabled') {
					echo '
						' . esc_html__('Theme created by', 'muiteer') . ' <a href="http://muiteer.com/" target="_blank">Muiteer</a>.
					';
				};
				if (get_theme_mod('muiteer_thanks_for_wordpress', 'enabled') === 'enabled') {
					echo '
						' . esc_html__('Powered by', 'muiteer') . ' <a href="http://wordpress.org/" rel="nofollow" target="_blank">WordPress</a>.
					';
				};
			echo '</div>';
		// Copyright content end

		// ICP, ICP Cert & Public Network Security content start
			// ICP Number
			$icp_num_str = get_theme_mod('muiteer_icp_num');

			// ICP Certificate Number
			$icp_cert_num_str = get_theme_mod('muiteer_icp_cert_num');

			// Public Network Security Number
			$pub_num_str = get_theme_mod('muiteer_public_network_security_num');
			if ( preg_match('/\d+/', $pub_num_str, $arr) ) {
				$pub_num = $arr[0];
			};

			if ($icp_num_str || $icp_cert_num_str || $pub_num_str) {
				echo '<div class="policy-info">';
					if ($icp_num_str) {
						echo '<a href="http://www.beian.miit.gov.cn/" rel="nofollow" target="_blank">' . $icp_num_str . '</a>';
					};
					if ($icp_cert_num_str) {
						echo '<a href="https://tsm.miit.gov.cn/dxxzsp/" rel="nofollow" target="_blank">' . $icp_cert_num_str . '</a>';
					};
					if ($pub_num_str) {
						echo '<a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=' . $pub_num . '" rel="nofollow" target="_blank">' . $pub_num_str . '</a>';
					};
				echo '</div>';
			};
		// ICP, ICP Cert & Public Network Security content end

		// Extra content start
			if (get_theme_mod('muiteer_extra_content') != '') {
				echo '
					<div class="extra-content">
						' . html_entity_decode( get_theme_mod('muiteer_extra_content') ) . '
					</div>
				';
			};
		// Extra content end
	}
endif;

/** Outputs no item tips
 *
 * @since 2.3.0
*/

if ( !function_exists('muiteer_no_item_tips') ) :
	function muiteer_no_item_tips($context) {
		echo '
			<section class="no-item-tips-container">
				' . muiteer_icon('information', 'icon') . '
				<span class="context">' . $context . '</span>
			</section>
		';
	}
endif;

/** Outputs screen response tips
 *
 * @since 2.3.0
*/

if ( !function_exists('muiteer_screen_response_tips') ) :
	function muiteer_screen_response_tips() {
		if (get_theme_mod('muiteer_screen_support') == 'portrait') {
			echo '
				<style type="text/css">
					.screen-response-container.landscape-tips {
						display: -webkit-box;
						display: flex;
					}
					@media screen and (orientation:landscape) {
						.screen-response-container.landscape-tips {
							display: -webkit-box;
							display: flex;
						}
					}
					@media screen and (orientation:portrait) {
						.screen-response-container.landscape-tips {
							display: none;
						}
					}
				</style>
	   	       <section class="screen-response-container landscape-tips">
		           <div class="screen-response-tips">
			           <h1>' . __("Sorry", "muiteer") . '</h1>
			           <h2>' . __("This page only supports portrait mode.", "muiteer") . '</h2>
		           </div>
	           </section>
	   	   ';
		} elseif (get_theme_mod('muiteer_screen_support') == 'landscape') {
			echo '
				<style type="text/css">
					.screen-response-container.portrait-tips {
						display: -webkit-box;
						display: flex;
					}
					@media screen and (orientation:landscape) {
						.screen-response-container.portrait-tips {
							display: none;
						}
					}
					@media screen and (orientation:portrait) {
						.screen-response-container.portrait-tips {
							display: -webkit-box;
							display: flex;
						}
					}
				</style>
				<section class="screen-response-container portrait-tips">
					<div class="screen-response-tips">
						<h1>' . __("Sorry", "muiteer") . '</h1>
						<h2>' . __("This page only supports landscape mode.", "muiteer") . '</h2>
					</div>
				</section>
			';
		};
	}
endif;

/** Outputs screen client support
 *
 * @since 2.3.0
*/

if ( !function_exists('muiteer_screen_client_support') ) :
	function muiteer_screen_client_support() {
		if (get_theme_mod('muiteer_screen_client_support') == 'wechat') {
			if ( !is_customize_preview() ) {
				echo '
					<script type="text/javascript">
						var useragent = navigator.userAgent;
						if (useragent.match(/MicroMessenger/i) != "MicroMessenger") {
							alert("' . __('Please visit this page on WeChat.', 'muiteer') . '");
							// Close current page
							var opened = window.open("about:blank", "_self");
							opened.opener = null;
						    opened.close();
						}
					</script>
				';
			}
		} elseif (get_theme_mod('muiteer_screen_client_support') == 'desktop') {
			if ( !is_customize_preview() ) {
				echo '
					<script type="text/javascript">
						if (navigator.userAgent.match(/mobile/i)) {
							alert("' . __('Please visit this page on desktop.', 'muiteer') . '");
							// Close current page
							var opened = window.open("about:blank", "_self");
							opened.opener = null;
						    opened.close();
						}
					</script>
				';
			}
		} elseif (get_theme_mod('muiteer_screen_client_support') == 'mobile') {
			if ( !is_customize_preview() ) {
				echo '
					<script type="text/javascript">
						if (!navigator.userAgent.match(/mobile/i)) {
							alert("' . __('Please visit this page on mobile.', 'muiteer') . '");
							// Close current page
							var opened = window.open("about:blank", "_self");
							opened.opener = null;
						    opened.close();
						}
					</script>
				';
			}
		}
	}
endif;