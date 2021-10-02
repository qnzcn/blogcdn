<?php
/**
 * Muiteer Theme Customizer.
 *
 * @package Muiteer
 */

function muiteer_customize_register($wp_customize) {
	require_once get_template_directory() . '/inc/customizer/customizer-classes.php';

	// ********General start********
		$wp_customize->add_section( 'general', array(
			'title' => esc_html__('General', 'muiteer'),
			'priority' => 1,
		) );
		// Sub sections start
			// Content maximum width
			$wp_customize->add_setting(
				'muiteer_content_maximum_width', array(
					'default' => '120rem',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_content_maximum_width',
				array(
					'label' => esc_html__('Content maximum width', 'muiteer'),
					'section' => 'general',
					'settings' => 'muiteer_content_maximum_width',
					'type' => 'select',
					'choices' => array(
						'100rem' => esc_html__('1000 Pixels', 'muiteer'),
						'120rem' => esc_html__('1200 Pixels (Recommended)', 'muiteer'),
						'140rem' => esc_html__('1400 Pixels', 'muiteer'),
						'180rem' => esc_html__('1800 Pixels', 'muiteer'),
					)
				)
			);

			// Typography
			$wp_customize->add_setting(
				'muiteer_typography', array(
					'default' => 'default',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_typography',
				array(
					'label' => esc_html__('Typography', 'muiteer'),
					'section' => 'general',
					'settings' => 'muiteer_typography',
					'type' => 'select',
					'choices' => array(
						'default' => esc_html__('Default', 'muiteer'),
						'aleo' => esc_html__('Aleo', 'muiteer'),
						'avenir-next' => esc_html__('Avenir Next', 'muiteer'),
						'butler' => esc_html__('Butler', 'muiteer'),
						'century_gothic' => esc_html__('Century Gothic', 'muiteer'),
						'comfortaa' => esc_html__('Comfortaa', 'muiteer'),
						'din' => esc_html__('Din', 'muiteer'),
						'lucida_grande' => esc_html__('Lucida Grande', 'muiteer'),
						'signika' => esc_html__('Signika', 'muiteer'),
						'tungsten' => esc_html__('Tungsten', 'muiteer'),
					)
				)
			);

			// Page Transition
			$wp_customize->add_setting(
				'muiteer_page_transition', array(
					'default' => 'linear',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_page_transition',
				array(
					'label' => esc_html__('Page Transition', 'muiteer'),
					'description' => esc_html__('Loading page transition animation.', 'muiteer'),
					'section' => 'general',
					'settings' => 'muiteer_page_transition',
					'type' => 'select',
					'choices' => array(
						'rotate' => esc_html__('Rotate mode', 'muiteer'),
						'swipe' => esc_html__('Swipe mode', 'muiteer'),
						'linear' => esc_html__('Linear mode', 'muiteer'),
					)
				)
			);

			// Text selection
			$wp_customize->add_setting(
				'muiteer_site_user_select', array(
					'default' => 'enabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_site_user_select',
				array(
					'label' => esc_html__('Text selection', 'muiteer'),
					'description' => esc_html__('The mouse select the web text.', 'muiteer'),
					'section' => 'general',
					'settings' => 'muiteer_site_user_select',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Grayscale
			$wp_customize->add_setting(
				'muiteer_site_grayscale', array(
					'default' => 'disabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_site_grayscale',
				array(
					'label' => esc_html__('Grayscale', 'muiteer'),
					'description' => esc_html__('Set the grayscale mode for your website.', 'muiteer'),
					'section' => 'general',
					'settings' => 'muiteer_site_grayscale',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Scroll top button
			$wp_customize->add_setting(
				'muiteer_scroll_top_button', array(
					'default' => 'disabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_scroll_top_button',
				array(
					'label' => esc_html__('Scroll top button', 'muiteer'),
					'section' => 'general',
					'settings' => 'muiteer_scroll_top_button',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Google analytics
			$wp_customize->add_setting(
				'muiteer_google_analytics', array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_footer'
				)
			);
			$wp_customize->add_control('muiteer_google_analytics', 
				array(
					'label' => esc_html__('Google analytics', 'muiteer'),
					'description' => esc_html__('Please enter your tracking ID.', 'muiteer'),
					'input_attrs' => array(
						'placeholder' => esc_html__('UA-63278821-1', 'muiteer'),
					),
					'section' => 'general',
					'settings' => 'muiteer_google_analytics',
					'type' => 'text'
				)
			);
		// Sub sections end
	// ********General end********

	// ********Color scheme start********
		$wp_customize->add_section( 'color_scheme', array(
		    'title' => esc_html__('Color scheme', 'muiteer'),
		    'priority' => 3,
		) );

		// Sub sections start
			// Dynamic color
			$wp_customize->add_setting(
				'muiteer_dynamic_color', array(
					'default' => 'disabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_dynamic_color',
				array(
					'label' => esc_html__('Dynamic color', 'muiteer'),
					'description' => esc_html__('Android 10, iOS 13.0 or macOS 10.14 and later support.', 'muiteer'),
					'section' => 'color_scheme',
					'settings' => 'muiteer_dynamic_color',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Background
			$wp_customize->add_setting(
				'muiteer_bg_color', array(
					'default' => '#f2f2f2',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => 'postMessage',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'muiteer_bg_color', 
					array(
						'label'      => esc_html__('Background', 'muiteer'),
						'section'    => 'color_scheme',
						'settings'   => 'muiteer_bg_color'
					)
				) 
			);

			// Text
			$wp_customize->add_setting(
				'muiteer_txt_color', array(
					'default' => '#333333',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => 'postMessage',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
				$wp_customize, 
				'muiteer_txt_color', 
				array(
					'label' => esc_html__('Text', 'muiteer'),
					'section' => 'color_scheme',
					'settings' => 'muiteer_txt_color'
				) ) 
			);

			// Accent
			$wp_customize->add_setting(
				'muiteer_acc_color', array(
					'default' => '#0088cc',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => 'postMessage',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'muiteer_acc_color', 
					array(
						'label' => esc_html__('Accent', 'muiteer'),
						'section' => 'color_scheme',
						'settings' => 'muiteer_acc_color'
					)
				) 
			);
		// Sub sections end
	// ********Color scheme end********

	// ********Navigation start********
		$wp_customize->add_section( 'navigation', array(
			'title' => esc_html__('Navigation', 'muiteer'),
			'priority' => 4,
		) );
		// Sub sections start
			// Logo
			$wp_customize->add_setting(
				'muiteer_logo', array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'muiteer_logo',
					array(
						'label' => esc_html__('Logo', 'muiteer'),
						'section' => 'navigation',
						'settings' => 'muiteer_logo',
					)
				)
			);

			// Logo Height
			$wp_customize->add_setting(
				'muiteer_logo_height', array(
					'default' => '30',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_sanitize_basic_number'
				)
			);
			$wp_customize->add_control('muiteer_logo_height', 
				array(
					'label' => esc_html__('Logo Height', 'muiteer'),
					'section' => 'navigation',
					'settings' => 'muiteer_logo_height',
					'type' => 'number',
					'input_attrs' => array(
						'min' => 5,
						'max' => 30,
						'step' => 1,
					),
				)
			);

			// Navigation Status
			$wp_customize->add_setting(
				'muiteer_navigation_status', array(
					'default' => 'sticky',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_navigation_status',
				array(
					'label' => esc_html__('Navigation Status', 'muiteer'),
					'section' => 'navigation',
					'settings' => 'muiteer_navigation_status',
					'type' => 'select',
					'choices' => array(
						'sticky' => esc_html__('Scroll with the page', 'muiteer'),
						'normal' => esc_html__('Do not scroll with the page', 'muiteer'),
						'auto' => esc_html__('Scroll up to show, scroll down to hide', 'muiteer')
					)
				)
			);

			// Hamburger Menu
			$wp_customize->add_setting(
				'muiteer_hamburger_menu', array(
					'default' => 'response',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_hamburger_menu',
				array(
					'label' => esc_html__('Hamburger Menu', 'muiteer'),
					'section' => 'navigation',
					'settings' => 'muiteer_hamburger_menu',
					'type' => 'select',
					'choices' => array(
						'always' => esc_html__('Always Display', 'muiteer'),
						'response' => esc_html__('Response', 'muiteer')
					)
				)
			);

			// Share
			$wp_customize->add_setting(
				'muiteer_site_share', array(
					'default' => 'enabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_site_share',
				array(
					'label' => esc_html__('Share', 'muiteer'),
					'section' => 'navigation',
					'settings' => 'muiteer_site_share',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Search
			$wp_customize->add_setting(
				'muiteer_site_search', array(
					'default' => 'enabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_site_search',
				array(
					'label' => esc_html__('Search', 'muiteer'),
					'section' => 'navigation',
					'settings' => 'muiteer_site_search',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Shopping bag
			if ( class_exists('WooCommerce') ) {
				$wp_customize->add_setting(
					'muiteer_shopping_bag', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_shopping_bag',
					array(
						'label' => esc_html__('Shopping Bag', 'muiteer'),
						'section' => 'navigation',
						'settings' => 'muiteer_shopping_bag',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);
			}

			// Background Music
			$wp_customize->add_setting(
				'muiteer_background_music', array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Upload_Control(
					$wp_customize, 'muiteer_background_music', array(
						'label' => esc_html__('Background Music', 'muiteer'),
						'section'  => 'navigation',
						'settings' => 'muiteer_background_music',
						'mime_type' => 'audio',
					)
				)
			);
		// Sub sections end
	// ********Navigation end********

	// ********Footer start********
		$wp_customize->add_panel( 'footer', array(
		    'title' => esc_html__('Footer', 'muiteer'),
		    'priority' => 5,
		) );

		// ========Sub Social section start========
			$wp_customize->add_section( 'social', array(
				'title' => esc_html__('Social', 'muiteer'),
				'panel' => 'footer',
			) );
			// Sub sections start
				// Show social icon
				$wp_customize->add_setting(
					'muiteer_social_icon', array(
						'default' => 'disabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_social_icon',
					array(
						'label' => esc_html__('Social icon', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_icon',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Muiteer link
				$wp_customize->add_setting(
					'muiteer_social_muiteer', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_muiteer', 
					array(
						'label' => esc_html__('Muiteer link', 'muiteer'),
						'input_attrs' => array(
							'placeholder' => esc_html__('http://muiteer.com', 'muiteer'),
						),
						'section' => 'social',
						'settings' => 'muiteer_social_muiteer',
						'type' => 'text'
					)
				);

				// Email address
				$wp_customize->add_setting(
					'muiteer_social_email', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_email', 
					array(
						'label' => esc_html__('Email address', 'muiteer'),
						'description' => esc_html__('No "mailto:".', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_email',
						'type' => 'text'
					)
				);

				// WeChat QR Code
				$wp_customize->add_setting(
					'muiteer_social_wechat_qr_code', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw'
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize,
						'muiteer_social_wechat_qr_code',
						array(
							'label' => esc_html__('WeChat QR Code', 'muiteer'),
							'description' => esc_html__('Upload WeChat QR Code image.', 'muiteer'),
							'section' => 'social',
							'settings' => 'muiteer_social_wechat_qr_code',
						)
					)
				);

				// TikTok QR Code
				$wp_customize->add_setting(
					'muiteer_social_tiktok_qr_code', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw'
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize,
						'muiteer_social_tiktok_qr_code',
						array(
							'label' => esc_html__('TikTok QR Code', 'muiteer'),
							'description' => esc_html__('Upload TikTok QR Code image.', 'muiteer'),
							'section' => 'social',
							'settings' => 'muiteer_social_tiktok_qr_code',
						)
					)
				);

				// Weibo link
				$wp_customize->add_setting(
					'muiteer_social_weibo', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_weibo', 
					array(
						'label' => esc_html__('Weibo link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_weibo',
						'type' => 'text'
					)
				);

				// QQ link
				$wp_customize->add_setting(
					'muiteer_social_qq', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_qq', 
					array(
						'label' => esc_html__('QQ link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_qq',
						'type' => 'text'
					)
				);

				// QZone link
				$wp_customize->add_setting(
					'muiteer_social_qzone', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_qzone', 
					array(
						'label' => esc_html__('QZone link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_qzone',
						'type' => 'text'
					)
				);

				// Zhihu link
				$wp_customize->add_setting(
					'muiteer_social_zhihu', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_zhihu', 
					array(
						'label' => esc_html__('Zhihu link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_zhihu',
						'type' => 'text'
					)
				);

				// Lofter link
				$wp_customize->add_setting(
					'muiteer_social_lofter', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_lofter', 
					array(
						'label' => esc_html__('Lofter link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_lofter',
						'type' => 'text'
					)
				);

				// Tieba link
				$wp_customize->add_setting(
					'muiteer_social_tieba', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_tieba', 
					array(
						'label' => esc_html__('Tieba link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_tieba',
						'type' => 'text'
					)
				);

				// Xiongzhang link
				$wp_customize->add_setting(
					'muiteer_social_xiongzhang', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_xiongzhang', 
					array(
						'label' => esc_html__('Xiongzhang link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_xiongzhang',
						'type' => 'text'
					)
				);

				// Jianshu link
				$wp_customize->add_setting(
					'muiteer_social_jianshu', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_jianshu', 
					array(
						'label' => esc_html__('Jianshu link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_jianshu',
						'type' => 'text'
					)
				);

				// Xiaohongshu link
				$wp_customize->add_setting(
					'muiteer_social_xiaohongshu', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_xiaohongshu', 
					array(
						'label' => esc_html__('Xiaohongshu link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_xiaohongshu',
						'type' => 'text'
					)
				);

				// Douban link
				$wp_customize->add_setting(
					'muiteer_social_douban', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_douban', 
					array(
						'label' => esc_html__('Douban link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_douban',
						'type' => 'text'
					)
				);

				// NetEase Music link
				$wp_customize->add_setting(
					'muiteer_social_netease_music', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_netease_music', 
					array(
						'label' => esc_html__('NetEase Music link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_netease_music',
						'type' => 'text'
					)
				);

				// Taobao link
				$wp_customize->add_setting(
					'muiteer_social_taobao', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_taobao', 
					array(
						'label' => esc_html__('Taobao link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_taobao',
						'type' => 'text'
					)
				);

				// Youku link
				$wp_customize->add_setting(
					'muiteer_social_youku', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_youku', 
					array(
						'label' => esc_html__('Youku link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_youku',
						'type' => 'text'
					)
				);

				// Bilibili link
				$wp_customize->add_setting(
					'muiteer_social_bilibili', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_bilibili', 
					array(
						'label' => esc_html__('Bilibili link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_bilibili',
						'type' => 'text'
					)
				);

				// YouTube link
				$wp_customize->add_setting(
					'muiteer_social_youtube', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_youtube', 
					array(
						'label' => esc_html__('YouTube link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_youtube',
						'type' => 'text'
					)
				);

				// Google Plus link
				$wp_customize->add_setting(
					'muiteer_social_google_plus', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_google_plus', 
					array(
						'label' => esc_html__('Google Plus link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_google_plus',
						'type' => 'text'
					)
				);

				// Github link
				$wp_customize->add_setting(
					'muiteer_social_github', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_github', 
					array(
						'label' => esc_html__('Github link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_github',
						'type' => 'text'
					)
				);

				// CodePen link
				$wp_customize->add_setting(
					'muiteer_social_codepen', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_codepen', 
					array(
						'label' => esc_html__('CodePen link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_codepen',
						'type' => 'text'
					)
				);

				// 500px link
				$wp_customize->add_setting(
					'muiteer_social_500px', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_500px', 
					array(
						'label' => esc_html__('500px link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_500px',
						'type' => 'text'
					)
				);

				// Bēhance link
				$wp_customize->add_setting(
					'muiteer_social_behance', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_behance', 
					array(
						'label' => esc_html__('Bēhance link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_behance',
						'type' => 'text'
					)
				);

				// Dribbble link
				$wp_customize->add_setting(
					'muiteer_social_dribbble', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_dribbble', 
					array(
						'label' => esc_html__('Dribbble link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_dribbble',
						'type' => 'text'
					)
				);

				// Facebook link
				$wp_customize->add_setting(
					'muiteer_social_facebook', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_facebook', 
					array(
						'label' => esc_html__('Facebook link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_facebook',
						'type' => 'text'
					)
				);

				// Instagram link
				$wp_customize->add_setting(
					'muiteer_social_instagram', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_instagram', 
					array(
						'label' => esc_html__('Instagram link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_instagram',
						'type' => 'text'
					)
				);

				// LinkedIn link
				$wp_customize->add_setting(
					'muiteer_social_linkedin', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_linkedin', 
					array(
						'label' => esc_html__('LinkedIn link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_linkedin',
						'type' => 'text'
					)
				);

				// Pinterest link
				$wp_customize->add_setting(
					'muiteer_social_pinterest', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_pinterest', 
					array(
						'label' => esc_html__('Pinterest link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_pinterest',
						'type' => 'text'
					)
				);

				// Soundcloud link
				$wp_customize->add_setting(
					'muiteer_social_soundcloud', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_soundcloud', 
					array(
						'label' => esc_html__('Soundcloud link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_soundcloud',
						'type' => 'text'
					)
				);

				// Twitter link
				$wp_customize->add_setting(
					'muiteer_social_twitter', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_twitter', 
					array(
						'label' => esc_html__('Twitter link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_twitter',
						'type' => 'text'
					)
				);

				// Medium link
				$wp_customize->add_setting(
					'muiteer_social_medium', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_social'
					)
				);
				$wp_customize->add_control('muiteer_social_medium', 
					array(
						'label' => esc_html__('Medium link', 'muiteer'),
						'section' => 'social',
						'settings' => 'muiteer_social_medium',
						'type' => 'text'
					)
				);
			// Sub sections end
		// ========Sub Social section end========

		// ========Sub Statement section start========
			$wp_customize->add_section( 'statement', array(
				'title' => esc_html__('Statement', 'muiteer'),
				'panel' => 'footer',
			) );

			// Sub sections start
				// Website created time
				$wp_customize->add_setting(
					'muiteer_web_created_time', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_footer'
					)
				);
				$wp_customize->add_control('muiteer_web_created_time', 
					array(
						'label' => esc_html__('Website created on:', 'muiteer'),
						'description' => '',
						'input_attrs' => array(
							'placeholder' => esc_html__('Please enter your website created time...', 'muiteer'),
						),
						'section' => 'statement',
						'settings' => 'muiteer_web_created_time',
						'type' => 'number'
					)
				);

				// Thanks for Muiteer
				$wp_customize->add_setting(
					'muiteer_thanks_for_muiteer', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_thanks_for_muiteer',
					array(
						'label' => esc_html__('Thanks for Muiteer', 'muiteer'),
						'description' => esc_html__('Show theme developer information for visitors.', 'muiteer'),
						'section' => 'statement',
						'settings' => 'muiteer_thanks_for_muiteer',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Thanks for WordPress
				$wp_customize->add_setting(
					'muiteer_thanks_for_wordpress', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_thanks_for_wordpress',
					array(
						'label' => esc_html__('Thanks for WordPress', 'muiteer'),
						'description' => esc_html__('Show CMS system information for visitors.', 'muiteer'),
						'section' => 'statement',
						'settings' => 'muiteer_thanks_for_wordpress',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// ICP Number (Only apply to China Mainland)
				$wp_customize->add_setting(
					'muiteer_icp_num', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_footer'
					)
				);
				$wp_customize->add_control('muiteer_icp_num', 
					array(
						'label' => esc_html__('ICP Number (Only apply to China Mainland)', 'muiteer'),
						'description' => esc_html__('Please DO NOT USE link.', 'muiteer'),
						'input_attrs' => array(
							'placeholder' => esc_html__('沪ICP备12345678号-1', 'muiteer'),
						),
						'section' => 'statement',
						'settings' => 'muiteer_icp_num',
						'type' => 'text'
					)
				);

				// ICP Certificate Number (Only apply to China Mainland)
				$wp_customize->add_setting(
					'muiteer_icp_cert_num', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_footer'
					)
				);
				$wp_customize->add_control('muiteer_icp_cert_num', 
					array(
						'label' => esc_html__('ICP Certificate Number (Only apply to China Mainland)', 'muiteer'),
						'description' => esc_html__('Please DO NOT USE link.', 'muiteer'),
						'input_attrs' => array(
							'placeholder' => esc_html__('沪ICP证123456号', 'muiteer'),
						),
						'section' => 'statement',
						'settings' => 'muiteer_icp_cert_num',
						'type' => 'text'
					)
				);

				// Public Network Security Number (Only apply to China Mainland)
				$wp_customize->add_setting(
					'muiteer_public_network_security_num', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_footer'
					)
				);
				$wp_customize->add_control('muiteer_public_network_security_num', 
					array(
						'label' => esc_html__('Public Network Security Number (Only apply to China Mainland)', 'muiteer'),
						'description' => esc_html__('Please DO NOT USE link.', 'muiteer'),
						'input_attrs' => array(
							'placeholder' => esc_html__('沪公网安备 12345678901234号', 'muiteer'),
						),
						'section' => 'statement',
						'settings' => 'muiteer_public_network_security_num',
						'type' => 'text'
					)
				);

				// Extra content
				$wp_customize->add_setting(
					'muiteer_extra_content', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_textarea'
					)
				);
				$wp_customize->add_control('muiteer_extra_content', 
					array(
						'label' => esc_html__('Extra content', 'muiteer'),
						'description' => esc_html__('Custom your extra content on footer. (Support HTML Code)', 'muiteer'),
						'input_attrs' => array(
							'placeholder' => esc_html__('Please enter your extra content...', 'muiteer')
						),
						'section' => 'statement',
						'settings' => 'muiteer_extra_content',
						'type' => 'textarea'
					)
				);
			// Sub sections end
		// ========Sub Statement section end========
	// ********Footer end********

	// ********Blog start********
		$wp_customize->add_section( 'blog', array(
			'title' => esc_html__('Blog', 'muiteer'),
			'priority' => 6,
		) );
		// Sub sections start
			// Recommended post
			$wp_customize->add_setting(
				'muiteer_recommend_post', array(
					'default' => 'disabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_recommend_post',
				array(
					'label' => esc_html__('Recommended post', 'muiteer'),
					'section' => 'blog',
					'settings' => 'muiteer_recommend_post',
					'type' => 'select',
					'choices' => array(
						'disabled' => esc_html__('Disabled', 'muiteer'),
						'random' => esc_html__('Random', 'muiteer'),
						'specified' => esc_html__('Specified', 'muiteer')
					)
				)
			);

			// Recommended post cover ratio
			$wp_customize->add_setting(
				'muiteer_recommend_post_cover_ratio', array(
					'default' => '4_3',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_recommend_post_cover_ratio',
				array(
					'label' => esc_html__('Recommended post cover ratio', 'muiteer'),
					'section' => 'blog',
					'settings' => 'muiteer_recommend_post_cover_ratio',
					'type' => 'select',
					'choices' => array(
						'1_1' => esc_html__('1:1', 'muiteer'),
						'4_3' => esc_html__('4:3', 'muiteer'),
						'16_9' => esc_html__('16:9', 'muiteer')
					)
				)
			);

			// Specified post
			$wp_customize->add_setting( 'muiteer_specified_post', array(
				'default' => 'none',
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'muiteer_validate_specified_post'
			) );
			$wp_customize->add_control(
				new WP_Customize_Post_Select_Multiple(
					$wp_customize,
					'muiteer_blog_carousel',
					array(
						'label' => esc_html__('Specified post', 'muiteer'),
						'description' => esc_html__('You should select at least three posts by pressing the Ctrl (Cmd) key.', 'muiteer'),
						'section' => 'blog',
						'settings' => 'muiteer_specified_post',
					)
				)
			);

			// Blog per page
			$wp_customize->add_setting(
				'muiteer_blog_per_page', array(
					'default' => get_option('posts_per_page'),
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_input_blog_per_page'
				)
			);
			$wp_customize->add_control('muiteer_blog_per_page', 
				array(
					'label' => esc_html__('Blog per page', 'muiteer'),
					'input_attrs' => array(
						'min' => 1,
						'step'  => 1,
						'placeholder' => esc_html__('Please enter quantity...', 'muiteer'),
					),
					'section' => 'blog',
					'settings' => 'muiteer_blog_per_page',
					'type' => 'number',
				)
			);

			// Blog filter
			$wp_customize->add_setting(
				'muiteer_blog_filter', array(
					'default' => 'text',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_blog_filter',
				array(
					'label' => esc_html__('Blog filter', 'muiteer'),
					'section' => 'blog',
					'settings' => 'muiteer_blog_filter',
					'type' => 'select',
					'choices' => array(
						'thumbnail' => esc_html__('Thumbnail & Text', 'muiteer'),
						'text' => esc_html__('Plain Text', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Browse mode
			$wp_customize->add_setting(
				'muiteer_blog_browse_mode', array(
					'default' => 'overlay',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_blog_browse_mode',
				array(
					'label' => esc_html__('Browse mode', 'muiteer'),
					'section' => 'blog',
					'settings' => 'muiteer_blog_browse_mode',
					'type' => 'select',
					'choices' => array(
						'overlay' => esc_html__('Morphing modal overlay', 'muiteer'),
						'separate' => esc_html__('Separate page', 'muiteer')
					)
				)
			);

			// Blog cover ratio
			$wp_customize->add_setting(
				'muiteer_blog_cover_ratio', array(
					'default' => 'responsive',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_blog_cover_ratio',
				array(
					'label' => esc_html__('Blog cover ratio', 'muiteer'),
					'section' => 'blog',
					'settings' => 'muiteer_blog_cover_ratio',
					'type' => 'select',
					'choices' => array(
						'responsive' => esc_html__('Responsive', 'muiteer'),
						'1_1' => esc_html__('1:1', 'muiteer'),
						'4_3' => esc_html__('4:3', 'muiteer'),
						'16_9' => esc_html__('16:9', 'muiteer')
					)
				)
			);

			// Rating button
			$wp_customize->add_setting(
				'muiteer_post_rating', array(
					'default' => 'all',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_post_rating',
				array(
					'label' => esc_html__('Rating button', 'muiteer'),
					'section' => 'blog',
					'settings' => 'muiteer_post_rating',
					'type' => 'select',
					'choices' => array(
						'disabled' => esc_html__('Disabled', 'muiteer'),
						'like' => esc_html__('Like button only', 'muiteer'),
						'dislike' => esc_html__('Dislike button only', 'muiteer'),
						'all' => esc_html__('Like & dislike button', 'muiteer'),
					)
				)
			);

			// Article Navigation
			$wp_customize->add_setting(
				'muiteer_recommend_blog_navigation', array(
					'default' => 'enabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_recommend_blog_navigation',
				array(
					'label' => esc_html__('Article Navigation', 'muiteer'),
					'section' => 'blog',
					'settings' => 'muiteer_recommend_blog_navigation',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Widget sidebar
			$wp_customize->add_setting(
				'muiteer_post_widget_sidebar', array(
					'default' => 'disabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_post_widget_sidebar',
				array(
					'label' => esc_html__('Widget sidebar', 'muiteer'),
					'section' => 'blog',
					'settings' => 'muiteer_post_widget_sidebar',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Blog style
			$wp_customize->add_setting(
				'muiteer_blog_style', array(
					'default' => 'grid',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_blog_style',
				array(
					'label' => esc_html__('Blog style', 'muiteer'),
					'section' => 'blog',
					'settings' => 'muiteer_blog_style',
					'type' => 'select',
					'choices' => array(
						'minimal' => esc_html__('Minimal', 'muiteer'),
						'grid' => esc_html__('Grid', 'muiteer')
					)
				)
			);

			// Grid columns
			$wp_customize->add_setting(
				'muiteer_blog_cols', array(
					'default' => 'auto',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_blog_cols',
				array(
					'label' => esc_html__('Grid columns', 'muiteer'),
					'section' => 'blog',
					'settings' => 'muiteer_blog_cols',
					'type' => 'select',
					'choices' => array(
						'auto' => esc_html__('Auto', 'muiteer'),
						'2' => esc_html__('2', 'muiteer'),
						'3' => esc_html__('3', 'muiteer'),
						'4' => esc_html__('4', 'muiteer')
					)
				)
			);
		// Sub sections end
	// ********Blog end********

	// ********Portfolio start********
		$wp_customize->add_section( 'portfolio', array(
			'title' => esc_html__('Portfolio', 'muiteer'),
			'priority' => 7,
		) );
		// Sub sections start
			// Portfolio per page
			$wp_customize->add_setting(
				'muiteer_portfolio_per_page', array(
					'default' => get_option('posts_per_page'),
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_input'
				)
			);
			$wp_customize->add_control('muiteer_portfolio_per_page', 
				array(
					'label' => esc_html__('Portfolio per page', 'muiteer'),
					'input_attrs' => array(
						'min' => 1,
						'step'  => 1,
						'placeholder' => esc_html__('Please enter quantity...', 'muiteer'),
					),
					'section' => 'portfolio',
					'settings' => 'muiteer_portfolio_per_page',
					'type' => 'number',
				)
			);

			// Portfolio filter
			$wp_customize->add_setting(
				'muiteer_portfolio_filter', array(
					'default' => 'text',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_portfolio_filter',
				array(
					'label' => esc_html__('Portfolio filter', 'muiteer'),
					'section' => 'portfolio',
					'settings' => 'muiteer_portfolio_filter',
					'type' => 'select',
					'choices' => array(
						'thumbnail' => esc_html__('Thumbnail & Text', 'muiteer'),
						'text' => esc_html__('Plain Text', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Browse mode
			$wp_customize->add_setting(
				'muiteer_portfolio_browse_mode', array(
					'default' => 'overlay',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_portfolio_browse_mode',
				array(
					'label' => esc_html__('Browse mode', 'muiteer'),
					'section' => 'portfolio',
					'settings' => 'muiteer_portfolio_browse_mode',
					'type' => 'select',
					'choices' => array(
						'overlay' => esc_html__('Morphing modal overlay', 'muiteer'),
						'separate' => esc_html__('Separate page', 'muiteer')
					)
				)
			);

			// Portfolio cover ratio
			$wp_customize->add_setting(
				'muiteer_portfolio_cover_ratio', array(
					'default' => 'responsive',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_portfolio_cover_ratio',
				array(
					'label' => esc_html__('Portfolio cover ratio', 'muiteer'),
					'section' => 'portfolio',
					'settings' => 'muiteer_portfolio_cover_ratio',
					'type' => 'select',
					'choices' => array(
						'responsive' => esc_html__('Responsive', 'muiteer'),
						'1_1' => esc_html__('1:1', 'muiteer'),
						'4_3' => esc_html__('4:3', 'muiteer'),
						'16_9' => esc_html__('16:9', 'muiteer')
					)
				)
			);

			// Grid columns
			$wp_customize->add_setting(
				'muiteer_portfolio_cols', array(
					'default' => 'auto',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_portfolio_cols',
				array(
					'label' => esc_html__('Grid columns', 'muiteer'),
					'section' => 'portfolio',
					'settings' => 'muiteer_portfolio_cols',
					'type' => 'select',
					'choices' => array(
						'auto' => esc_html__('Auto', 'muiteer'),
						'2' => esc_html__('2', 'muiteer'),
						'3' => esc_html__('3', 'muiteer'),
						'4' => esc_html__('4', 'muiteer')
					)
				)
			);

			// Rating button
			$wp_customize->add_setting(
				'muiteer_portfolio_rating', array(
					'default' => 'all',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_portfolio_rating',
				array(
					'label' => esc_html__('Rating button', 'muiteer'),
					'section' => 'portfolio',
					'settings' => 'muiteer_portfolio_rating',
					'type' => 'select',
					'choices' => array(
						'disabled' => esc_html__('Disabled', 'muiteer'),
						'like' => esc_html__('Like button only', 'muiteer'),
						'dislike' => esc_html__('Dislike button only', 'muiteer'),
						'all' => esc_html__('Like & dislike button', 'muiteer'),
					)
				)
			);

			// Article Navigation
			$wp_customize->add_setting(
				'muiteer_recommend_portfolio_navigation', array(
					'default' => 'enabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_recommend_portfolio_navigation',
				array(
					'label' => esc_html__('Article Navigation', 'muiteer'),
					'section' => 'portfolio',
					'settings' => 'muiteer_recommend_portfolio_navigation',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Widget sidebar
			$wp_customize->add_setting(
				'muiteer_portfolio_widget_sidebar', array(
					'default' => 'disabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_portfolio_widget_sidebar',
				array(
					'label' => esc_html__('Widget sidebar', 'muiteer'),
					'section' => 'portfolio',
					'settings' => 'muiteer_portfolio_widget_sidebar',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);
		// Sub sections end
	// ********Portfolio end********

	// ********Documentation start********
		if (get_theme_mod('muiteer_dashboard_doc_type', 'disabled') == 'enabled') {
			$wp_customize->add_section( 'documentation', array(
				'title' => esc_html__('Documentation', 'muiteer'),
				'priority' => 8,
			) );
			// Sub sections start
				// Documentation Navigation
				$wp_customize->add_setting(
					'muiteer_doc_navigation', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_doc_navigation',
					array(
						'label' => esc_html__('Documentation Navigation', 'muiteer'),
						'section' => 'documentation',
						'settings' => 'muiteer_doc_navigation',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Email Feedback
				$wp_customize->add_setting(
					'muiteer_doc_email_feedback', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_doc_email_feedback',
					array(
						'label' => esc_html__('Email Feedback', 'muiteer'),
						'section' => 'documentation',
						'settings' => 'muiteer_doc_email_feedback',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);
	
				// Email Address
				$wp_customize->add_setting(
					'muiteer_doc_email_address', array(
						'default' => get_option('admin_email'),
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_footer'
					)
				);
				$wp_customize->add_control('muiteer_doc_email_address', 
					array(
						'label' => esc_html__('Email Address', 'muiteer'),
						'description' => esc_html__('The email address where the feedbacks should sent to', 'muiteer'),
						'input_attrs' => array(
							'placeholder' => '',
						),
						'section' => 'documentation',
						'settings' => 'muiteer_doc_email_address',
						'type' => 'text'
					)
				);
	
				// Helpful Feedback
				$wp_customize->add_setting(
					'muiteer_doc_helpful_feedback', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_doc_helpful_feedback',
					array(
						'label' => esc_html__('Helpful Feedback', 'muiteer'),
						'section' => 'documentation',
						'settings' => 'muiteer_doc_helpful_feedback',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);
			// Sub sections end
		}
	// ********Documentation end********

	// ********404 start********
		$wp_customize->add_section( '404', array(
		    'title' => esc_html__('404', 'muiteer'),
		    'priority' => 9,
		) );
		// Sub sections start
			// 404 page background image
			$wp_customize->add_setting(
				'muiteer_404_bg', array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'muiteer_404_bg',
					array(
						'label' => esc_html__('404 page background image', 'muiteer'),
						'section' => '404',
						'settings' => 'muiteer_404_bg'
					)
				)
			);

			// 404 page slogan
			$wp_customize->add_setting(
				'muiteer_404_slogan', array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_textarea'
				)
			);
			$wp_customize->add_control('muiteer_404_slogan', 
				array(
					'label' => esc_html__('404 page slogan', 'muiteer'),
					'description' => esc_html__('When page can&rsquo;t be found. Show 404 slogan for visitors.', 'muiteer'),
					'input_attrs' => array(
						'placeholder' => esc_html__('Please enter 404 slogan...', 'muiteer')
					),
					'section' => '404',
					'settings' => 'muiteer_404_slogan',
					'type' => 'textarea'
				)
			);
		// Sub sections end
	// ********404 end********

	// ********Advanced start********
		$wp_customize->add_panel( 'advanced_panel', array(
		    'title' => esc_html__('Advanced', 'muiteer'),
		    'priority' => 10,
		) );
		// ========Sub Login Page section start========
			$wp_customize->add_section( 'advanced_login', array(
				'title' => esc_html__('Login Page', 'muiteer'),
				'panel' => 'advanced_panel',
			) );
			// Sub sections start
				// WordPress Logo
				$wp_customize->add_setting(
					'muiteer_login_wp_logo', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_login_wp_logo',
					array(
						'label' => esc_html__('WordPress Logo', 'muiteer'),
						'section' => 'advanced_login',
						'settings' => 'muiteer_login_wp_logo',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Back to Homepage Link
				$wp_customize->add_setting(
					'muiteer_login_back_to_homepage_link', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_login_back_to_homepage_link',
					array(
						'label' => esc_html__('Back to Homepage Link', 'muiteer'),
						'section' => 'advanced_login',
						'settings' => 'muiteer_login_back_to_homepage_link',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Account Sharing
				$wp_customize->add_setting(
					'muiteer_login_account_sharing', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_login_account_sharing',
					array(
						'label' => esc_html__('Account Sharing', 'muiteer'),
						'section' => 'advanced_login',
						'settings' => 'muiteer_login_account_sharing',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Math Captcha
				$wp_customize->add_setting(
					'muiteer_login_captcha', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_login_captcha',
					array(
						'label' => esc_html__('Math Captcha', 'muiteer'),
						'section' => 'advanced_login',
						'settings' => 'muiteer_login_captcha',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);
			// Sub sections end
		// ========Sub Login Page section end========

		// ========Sub Dashboard section start========
			$wp_customize->add_section( 'advanced_dashboard', array(
				'title' => esc_html__('Dashboard', 'muiteer'),
				'description' => esc_html__('Warning: Those function only for developer.', 'muiteer'),
				'panel' => 'advanced_panel',
			) );

			// Sub sections start
				// ACF Editor Menu
				if ( class_exists('ACF') ) {
					$wp_customize->add_setting(
						'muiteer_dashboard_acf_editor_menu', array(
							'default' => 'disabled',
							'type' => 'theme_mod',
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'muiteer_validate_select'
						)
					);
					$wp_customize->add_control('muiteer_dashboard_acf_editor_menu',
						array(
							'label' => esc_html__('ACF Editor Menu', 'muiteer'),
							'section' => 'advanced_dashboard',
							'settings' => 'muiteer_dashboard_acf_editor_menu',
							'type' => 'select',
							'choices' => array(
								'enabled' => esc_html__('Enabled', 'muiteer'),
								'disabled' => esc_html__('Disabled', 'muiteer')
							)
						)
					);
				}

				// Admin Bar WordPress Logo
				$wp_customize->add_setting(
					'muiteer_dashboard_admin_bar_wp_logo', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_admin_bar_wp_logo',
					array(
						'label' => esc_html__('Admin Bar WordPress Logo', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_admin_bar_wp_logo',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// WordPress Block-based Editor
				$wp_customize->add_setting(
					'muiteer_dashboard_wp_block_based_editor', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_wp_block_based_editor',
					array(
						'label' => esc_html__('WordPress Block-based Editor', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_wp_block_based_editor',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Welcome Panel
				$wp_customize->add_setting(
					'muiteer_dashboard_welcome_panel', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_welcome_panel',
					array(
						'label' => esc_html__('Welcome Panel', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_welcome_panel',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// At a Glance
				$wp_customize->add_setting(
					'muiteer_dashboard_right_now', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_right_now',
					array(
						'label' => esc_html__('At a Glance', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_right_now',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Activity
				$wp_customize->add_setting(
					'muiteer_dashboard_activity', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_activity',
					array(
						'label' => esc_html__('Activity', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_activity',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Quick Press
				$wp_customize->add_setting(
					'muiteer_dashboard_quick_press', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_quick_press',
					array(
						'label' => esc_html__('Quick Press', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_quick_press',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// WordPress Events and News
				$wp_customize->add_setting(
					'muiteer_dashboard_primary', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_primary',
					array(
						'label' => esc_html__('WordPress Events and News', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_primary',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Site Health
				$wp_customize->add_setting(
					'muiteer_dashboard_site_health', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_site_health',
					array(
						'label' => esc_html__('Site Health', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_site_health',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Screen Options Tab
				$wp_customize->add_setting(
					'muiteer_dashboard_screen_options_tab', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_screen_options_tab',
					array(
						'label' => esc_html__('Screen Options Tab', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_screen_options_tab',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Help Tab
				$wp_customize->add_setting(
					'muiteer_dashboard_help_tab', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_help_tab',
					array(
						'label' => esc_html__('Help Tab', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_help_tab',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Post Type
				$wp_customize->add_setting(
					'muiteer_dashboard_post_type', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_multiple_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_post_type',
					array(
						'label' => esc_html__('Post Type', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_post_type',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'administrator' => esc_html__('Administrator Only', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Portfolio Type
				$wp_customize->add_setting(
					'muiteer_dashboard_portfolio_type', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_multiple_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_portfolio_type',
					array(
						'label' => esc_html__('Portfolio Type', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_portfolio_type',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'administrator' => esc_html__('Administrator Only', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Page Type
				$wp_customize->add_setting(
					'muiteer_dashboard_page_type', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_multiple_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_page_type',
					array(
						'label' => esc_html__('Page Type', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_page_type',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'administrator' => esc_html__('Administrator Only', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Documentation Type
				$wp_customize->add_setting(
					'muiteer_dashboard_doc_type', array(
						'default' => 'disabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_doc_type',
					array(
						'label' => esc_html__('Documentation Type', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_doc_type',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Tools
				$wp_customize->add_setting(
					'muiteer_dashboard_tools', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_multiple_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_tools',
					array(
						'label' => esc_html__('Tools', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_tools',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'administrator' => esc_html__('Administrator Only', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Copyright Information
				$wp_customize->add_setting(
					'muiteer_dashboard_copyright', array(
						'default' => 'disabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_copyright',
					array(
						'label' => esc_html__('Copyright Information', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_copyright',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Theme Version Information
				$wp_customize->add_setting(
					'muiteer_dashboard_theme_version', array(
						'default' => 'disabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_theme_version',
					array(
						'label' => esc_html__('Theme Version Information', 'muiteer'),
						'section' => 'advanced_dashboard',
						'settings' => 'muiteer_dashboard_theme_version',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);
			// Sub sections end
		// ========Sub Dashboard section end========

		// ========Sub Maintenance section start========
			$wp_customize->add_section( 'advanced_maintenance', array(
				'title' => esc_html__('Maintenance', 'muiteer'),
				'panel' => 'advanced_panel',
			) );

			// Sub sections start
				// Maintenance Status
				$wp_customize->add_setting(
					'muiteer_maintenance_switch', array(
						'default' => 'disabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_maintenance_switch',
					array(
						'label' => esc_html__('Maintenance Status', 'muiteer'),
						'section' => 'advanced_maintenance',
						'settings' => 'muiteer_maintenance_switch',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Allow Access to Your Website
				$wp_customize->add_setting(
					'muiteer_maintenance_user_role', array(
						'default' => 'administrator',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_multiple_select'
					)
				);
				$wp_customize->add_control('muiteer_maintenance_user_role',
					array(
						'label' => esc_html__('Allow Access to Your Website', 'muiteer'),
						'section' => 'advanced_maintenance',
						'settings' => 'muiteer_maintenance_user_role',
						'type' => 'select',
						'choices' => array(
							'administrator' => esc_html__('Administrator Only', 'muiteer'),
							'logged' => esc_html__('Logged in user', 'muiteer')
						)
					)
				);

				// Countdown Status
				$wp_customize->add_setting(
					'muiteer_maintenance_countdown_switch', array(
						'default' => 'disabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_maintenance_countdown_switch',
					array(
						'label' => esc_html__('Countdown Status', 'muiteer'),
						'section' => 'advanced_maintenance',
						'settings' => 'muiteer_maintenance_countdown_switch',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Launch Date
				$wp_customize->add_setting(
					'muiteer_maintenance_countdown_launch_date', array(
						'default' => date("Y-m-d H:i:s"),
						'type' => 'theme_mod',
						'transport' => 'refresh',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_sanitize_date_time'
					)
				);
				$wp_customize->add_control('muiteer_maintenance_countdown_launch_date',
					array(
					   'label' => esc_html__('Launch Date', 'muiteer'),
					   'section' => 'advanced_maintenance',
					   'settings' => 'muiteer_maintenance_countdown_launch_date',
					   'twelve_hour_format' => false,
					   'type' => 'date_time'
					)
				);

				// Text Color
				$wp_customize->add_setting(
					'muiteer_maintenance_text_color', array(
						'default' => '#333333',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_hex_color'
					)
				);
				$wp_customize->add_control( 
					new WP_Customize_Color_Control( 
					$wp_customize, 
					'muiteer_maintenance_text_color', 
					array(
						'label' => esc_html__('Text Color', 'muiteer'),
						'section' => 'advanced_maintenance',
						'settings' => 'muiteer_maintenance_text_color'
					) ) 
				);

				// Background Color
				$wp_customize->add_setting(
					'muiteer_maintenance_background_color', array(
						'default' => '#f2f2f2',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_hex_color'
					)
				);
				$wp_customize->add_control( 
					new WP_Customize_Color_Control( 
						$wp_customize, 
						'muiteer_maintenance_background_color', 
						array(
							'label' => esc_html__('Background Color', 'muiteer'),
							'section' => 'advanced_maintenance',
							'settings' => 'muiteer_maintenance_background_color'
						)
					) 
				);

				// Background Image
				$wp_customize->add_setting(
					'muiteer_maintenance_background_image', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw'
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
					$wp_customize,
					'muiteer_maintenance_background_image',
					array(
						'label' => esc_html__('Background Image', 'muiteer'),
						'description' => esc_html__('Recommended to use 1920px × 1080px image. The background image will be set to full screen.', 'muiteer'),
						'section' => 'advanced_maintenance',
						'settings' => 'muiteer_maintenance_background_image'
					)
					)
				);
			// Sub sections end
		// ========Sub Maintenance section end========

		// ========Sub Screen Response section start========
			$wp_customize->add_section( 'advanced_screen', array(
				'title' => esc_html__('Screen Response', 'muiteer'),
				'panel' => 'advanced_panel',
			) );

			// Sub sections start
				// Screen Support
				$wp_customize->add_setting(
					'muiteer_screen_support', array(
						'default' => 'all',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_multiple_select'
					)
				);
				$wp_customize->add_control('muiteer_screen_support',
					array(
						'label' => esc_html__('Screen Support', 'muiteer'),
						'section' => 'advanced_screen',
						'settings' => 'muiteer_screen_support',
						'type' => 'select',
						'choices' => array(
							'all' => esc_html__('All', 'muiteer'),
							'landscape' => esc_html__('Landscape Only', 'muiteer'),
							'portrait' => esc_html__('Portrait Only', 'muiteer')
						)
					)
				);

				// Device/Client Support
				$wp_customize->add_setting(
					'muiteer_screen_client_support', array(
						'default' => 'all',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_multiple_select'
					)
				);
				$wp_customize->add_control('muiteer_screen_client_support',
					array(
						'label' => esc_html__('Device/Client Support', 'muiteer'),
						'section' => 'advanced_screen',
						'settings' => 'muiteer_screen_client_support',
						'type' => 'select',
						'choices' => array(
							'all' => esc_html__('All', 'muiteer'),
							'desktop' => esc_html__('Desktop Only', 'muiteer'),
							'mobile' => esc_html__('Mobile Only', 'muiteer'),
							'wechat' => esc_html__('WeChat Only', 'muiteer')
						)
					)
				);
			// Sub sections end
		// ========Sub Screen Response section end========

		// ========Performance section start========
			$wp_customize->add_section( 'advanced_performance', array(
				'title' => esc_html__('Performance', 'muiteer'),
				'panel' => 'advanced_panel',
			) );

			// Sub sections start
				// PJAX powered
				$wp_customize->add_setting(
					'muiteer_site_ajax', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_site_ajax',
					array(
						'label' => esc_html__('PJAX powered', 'muiteer'),
						'description' => esc_html__('If you set the background music, please enable it.', 'muiteer'),
						'section' => 'advanced_performance',
						'settings' => 'muiteer_site_ajax',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Image lazy loading
				$wp_customize->add_setting(
					'muiteer_site_lazy_loading', array(
						'default' => 'enabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_site_lazy_loading',
					array(
						'label' => esc_html__('Image lazy loading', 'muiteer'),
						'section' => 'advanced_performance',
						'settings' => 'muiteer_site_lazy_loading',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Media Library Attachment Rename
				$wp_customize->add_setting(
					'muiteer_dashboard_attachment_rename', array(
						'default' => 'disabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_multiple_select'
					)
				);
				$wp_customize->add_control('muiteer_dashboard_attachment_rename',
					array(
						'label' => esc_html__('Media Library Attachment Rename', 'muiteer'),
						'description' => esc_html__('Attachments will be renamed automatically when upload.', 'muiteer'),
						'section' => 'advanced_performance',
						'settings' => 'muiteer_dashboard_attachment_rename',
						'type' => 'select',
						'choices' => array(
							'disabled' => esc_html__('Disabled', 'muiteer'),
							'timestamp' => esc_html__('According to the Timestamp', 'muiteer'),
							'md5' => esc_html__('According to the MD5 hash', 'muiteer')
						)
					)
				);

				// Media Library Image Compression Quality
				$wp_customize->add_setting(
					'muiteer_image_compress', array(
						'default' => 'disabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_multiple_select'
					)
				);
				$wp_customize->add_control('muiteer_image_compress',
					array(
						'label' => esc_html__('Media Library Image Compression Quality', 'muiteer'),
						'description' => esc_html__('Images will be compressed automatically when upload.', 'muiteer'),
						'section' => 'advanced_performance',
						'settings' => 'muiteer_image_compress',
						'type' => 'select',
						'choices' => array(
							'disabled' => esc_html__('Disabled', 'muiteer'),
							'high' => esc_html__('High (Recommended)', 'muiteer'),
							'medium' => esc_html__('Medium', 'muiteer'),
							'low' => esc_html__('Low', 'muiteer')
						)
					)
				);

				// Media Library Image Size Limit
				$wp_customize->add_setting(
					'muiteer_image_size_limit', array(
						'default' => 'disabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_multiple_select'
					)
				);
				$wp_customize->add_control('muiteer_image_size_limit',
					array(
						'label' => esc_html__('Media Library Image Size Limit', 'muiteer'),
						'description' => esc_html__('Images will be resized automatically when upload.', 'muiteer'),
						'section' => 'advanced_performance',
						'settings' => 'muiteer_image_size_limit',
						'type' => 'select',
						'choices' => array(
							'disabled' => esc_html__('Disabled', 'muiteer'),
							'2560' => esc_html__('Max width 2560 pixels', 'muiteer'),
							'1920' => esc_html__('Max width 1920 pixels (Recommended)', 'muiteer'),
							'1280' => esc_html__('Max width 1280 pixels', 'muiteer'),
						)
					)
				);
			// Sub sections end
		// ========Performance section start========

		// ========WeChat section start========
			$wp_customize->add_section( 'advanced_wechat', array(
				'title' => esc_html__('WeChat', 'muiteer'),
				'panel' => 'advanced_panel',
			) );
			// Sub sections start
				// WeChat JS-SDK
				$wp_customize->add_setting(
					'muiteer_wechat_js_sdk', array(
						'default' => 'disabled',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_select'
					)
				);
				$wp_customize->add_control('muiteer_wechat_js_sdk',
					array(
						'label' => esc_html__('WeChat JS-SDK', 'muiteer'),
						'description' => esc_html__('Your domain name must be set to secured domain name on WeChat official accounts platform.', 'muiteer'),
						'section' => 'advanced_wechat',
						'settings' => 'muiteer_wechat_js_sdk',
						'type' => 'select',
						'choices' => array(
							'enabled' => esc_html__('Enabled', 'muiteer'),
							'disabled' => esc_html__('Disabled', 'muiteer')
						)
					)
				);

				// Developer ID (AppID)
				$wp_customize->add_setting(
					'muiteer_wechat_app_id', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_input'
					)
				);
				$wp_customize->add_control('muiteer_wechat_app_id', 
					array(
						'label' => esc_html__('Developer ID (AppID)', 'muiteer'),
						'input_attrs' => array(
							'placeholder' => esc_html__('Please enter AppID...', 'muiteer'),
						),
						'section' => 'advanced_wechat',
						'settings' => 'muiteer_wechat_app_id',
						'type' => 'text'
					)
				);

				// Developer password (AppSecret)
				$wp_customize->add_setting(
					'muiteer_wechat_app_secret', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_input'
					)
				);
				$wp_customize->add_control('muiteer_wechat_app_secret', 
					array(
						'label' => esc_html__('Developer password (AppSecret)', 'muiteer'),
						'input_attrs' => array(
							'placeholder' => esc_html__('Please enter AppSecret...', 'muiteer'),
						),
						'section' => 'advanced_wechat',
						'settings' => 'muiteer_wechat_app_secret',
						'type' => 'text'
					)
				);

				// Global sharing thumbnail
				$wp_customize->add_setting(
					'muiteer_wechat_global_sharing_thumbnail', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint'
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Cropped_Image_Control(
						$wp_customize,
						'muiteer_wechat_global_sharing_thumbnail',
						array(
							'label' => esc_html__('Global sharing thumbnail', 'muiteer'),
							'description' => esc_html__('Recommended to use 600px × 600px image. (You can also set single post or page separately)', 'muiteer'),
							'section' => 'advanced_wechat',
							'settings' => 'muiteer_wechat_global_sharing_thumbnail',
							'width' => 600,
							'height' => 600,
							'flex_width ' => false,
							'flex_height ' => false,
						)
					)
				);

				// Global sharing description
				$wp_customize->add_setting(
					'muiteer_wechat_global_sharing_description', array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'muiteer_validate_textarea'
					)
				);
				$wp_customize->add_control('muiteer_wechat_global_sharing_description', 
					array(
						'label' => esc_html__('Global sharing description', 'muiteer'),
						'description' => esc_html__('You can also set single post or page separately.', 'muiteer'),
						'input_attrs' => array(
							'placeholder' => esc_html__('Please enter global sharing description...', 'muiteer')
						),
						'section' => 'advanced_wechat',
						'settings' => 'muiteer_wechat_global_sharing_description',
						'type' => 'textarea'
					)
				);
			// Sub sections end
		// ========WeChat section end========
	// ********Advanced end********

	// ********Site Identity start********
		// Sub sections start
			// Favicon
			$wp_customize->add_setting(
				'muiteer_favicon_image', array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_favicon_image_sanitize_image'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
				$wp_customize,
				'muiteer_favicon_image',
				array(
					'label' => esc_html__('Favicon', 'muiteer'),
					'description' => esc_html__('Upload favicon image (JPG/PNG format). Suggested image dimensions at most: 194 × 194 pixels.', 'muiteer'),
					'section' => 'title_tagline',
					'settings' => 'muiteer_favicon_image'
				)
				)
			);

			// Pinned Tab Icon
			$wp_customize->add_setting(
				'muiteer_pinned_tab_icon', array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_pinned_tab_icon_sanitize_image'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
				$wp_customize,
				'muiteer_pinned_tab_icon',
				array(
					'label' => esc_html__('Pinned Tab Icon', 'muiteer'),
					'description' => esc_html__('Upload pinned tab icon image (SVG format). Pinned tab icon use 100% black for all vectors with a transparent background and set to 16 × 16 pixels.', 'muiteer'),
					'section' => 'title_tagline',
					'settings' => 'muiteer_pinned_tab_icon',
				)
				)
			);

			// Pinned Tab Icon Background Color
			$wp_customize->add_setting(
				'muiteer_pinned_tab_icon_background_color', array(
					'default' => '#ff3b30',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'transport' => 'postMessage',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'muiteer_pinned_tab_icon_background_color', 
					array(
						'label' => esc_html__('Pinned Tab Icon Background Color', 'muiteer'),
						'section' => 'title_tagline',
						'settings' => 'muiteer_pinned_tab_icon_background_color'
					)
				) 
			);

			// Progressive Web Apps
			$wp_customize->add_setting(
				'muiteer_pwas', array(
					'default' => 'disabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_pwas',
				array(
					'label' => esc_html__('Progressive Web Apps (PWAs)', 'muiteer'),
					'section' => 'title_tagline',
					'settings' => 'muiteer_pwas',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Apple Touch Icon
			$wp_customize->add_setting(
				'muiteer_apple_touch_icon', array(
					'default' => '',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Cropped_Image_Control(
					$wp_customize,
					'muiteer_apple_touch_icon',
					array(
						'label' => esc_html__('Apple Touch Icon', 'muiteer'),
						'description' => esc_html__('Upload apple touch icon image (JPG/PNG format). Suggested image dimensions at most 1200 × 1200 pixels.', 'muiteer'),
						'section' => 'title_tagline',
						'settings' => 'muiteer_apple_touch_icon',
						'width' => 1200,
						'height' => 1200,
						'flex_width ' => false,
						'flex_height ' => false,
					)
				)
			);
		// Sub sections end
	// ********Site Identity end********

	// ********WooCommerce start********
		if ( class_exists('WooCommerce') ) {
			$wp_customize->add_section( 'muiteer_woocommerce_shop_page', array(
				'title' => esc_html__('Shop page', 'muiteer'),
				'panel' => 'woocommerce',
				'priority' => 1,
			) );
			// Sub sections start
			// Product per page
			$wp_customize->add_setting(
				'muiteer_product_per_page', array(
					'default' => get_option('posts_per_page'),
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_input'
				)
			);
			$wp_customize->add_control('muiteer_product_per_page', 
				array(
					'label' => esc_html__('Product per page', 'muiteer'),
					'description' => esc_html__('Change number of products that are displayed per page.', 'muiteer'),
					'input_attrs' => array(
						'min' => 1,
						'step'  => 1,
						'placeholder' => esc_html__('Please enter quantity...', 'muiteer'),
					),
					'section' => 'muiteer_woocommerce_shop_page',
					'settings' => 'muiteer_product_per_page',
					'type' => 'number',
				)
			);

			// Product cover ratio
			$wp_customize->add_setting(
				'muiteer_product_cover_ratio', array(
					'default' => 'responsive',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_product_cover_ratio',
				array(
					'label' => esc_html__('Product cover ratio', 'muiteer'),
					'section' => 'muiteer_woocommerce_shop_page',
					'settings' => 'muiteer_product_cover_ratio',
					'type' => 'select',
					'choices' => array(
						'responsive' => esc_html__('Responsive', 'muiteer'),
						'1_1' => esc_html__('1:1', 'muiteer'),
						'4_3' => esc_html__('4:3', 'muiteer'),
						'16_9' => esc_html__('16:9', 'muiteer')
					)
				)
			);

			// Grid columns
			$wp_customize->add_setting(
				'muiteer_product_cols', array(
					'default' => 'auto',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_product_cols',
				array(
					'label' => esc_html__('Grid columns', 'muiteer'),
					'section' => 'muiteer_woocommerce_shop_page',
					'settings' => 'muiteer_product_cols',
					'type' => 'select',
					'choices' => array(
						'auto' => esc_html__('Auto', 'muiteer'),
						'2' => esc_html__('2', 'muiteer'),
						'3' => esc_html__('3', 'muiteer'),
						'4' => esc_html__('4', 'muiteer')
					)
				)
			);

			// Default product sorting
			$wp_customize->add_setting(
				'muiteer_default_product_sorting', array(
					'default' => 'date',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_default_product_sorting',
				array(
					'label' => esc_html__('Default product sorting', 'muiteer'),
					'description' => esc_html__('How should products be sorted in the catalog by default?', 'muiteer'),
					'section' => 'muiteer_woocommerce_shop_page',
					'settings' => 'muiteer_default_product_sorting',
					'type' => 'select',
					'choices' => array(
						'menu_order' => esc_html__('Default sorting (custom ordering + name)', 'muiteer'),
						'popularity' => esc_html__('Popularity (sales)', 'muiteer'),
						'rating' => esc_html__('Average rating', 'muiteer'),
						'date' => esc_html__('Sort by most recent', 'muiteer'),
						'price' => esc_html__('Sort by price (asc)', 'muiteer'),
						'price_desc' => esc_html__('Sort by price (desc)', 'muiteer')
					)
				)
			);

			// Product category
			$wp_customize->add_setting(
				'muiteer_product_category', array(
					'default' => 'enabled',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_select'
				)
			);
			$wp_customize->add_control('muiteer_product_category',
				array(
					'label' => esc_html__('Product category', 'muiteer'),
					'section' => 'muiteer_woocommerce_shop_page',
					'settings' => 'muiteer_product_category',
					'type' => 'select',
					'choices' => array(
						'enabled' => esc_html__('Enabled', 'muiteer'),
						'disabled' => esc_html__('Disabled', 'muiteer')
					)
				)
			);

			// Default product category sorting
			$wp_customize->add_setting(
				'muiteer_default_product_category_sorting', array(
					'default' => 'name',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_default_product_category_sorting',
				array(
					'label' => esc_html__('Default product category sorting', 'muiteer'),
					'description' => esc_html__('How should product categories be sorted in the catalog by default?', 'muiteer'),
					'section' => 'muiteer_woocommerce_shop_page',
					'settings' => 'muiteer_default_product_category_sorting',
					'type' => 'select',
					'choices' => array(
						'menu_order' => esc_html__('Default sorting (custom ordering + name)', 'muiteer'),
						'name' => esc_html__('Sort by name (asc)', 'muiteer'),
						'name_desc' => esc_html__('Sort by name (desc)', 'muiteer')
					)
				)
			);
			// Sub sections end

			$wp_customize->add_section( 'muiteer_woocommerce_product_details_page', array(
				'title' => esc_html__('Product details page', 'muiteer'),
				'panel' => 'woocommerce',
				'priority' => 2,
			) );

			// Product preview image ratio
			$wp_customize->add_setting(
				'muiteer_product_preview_image_ratio', array(
					'default' => '1_1',
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'muiteer_validate_multiple_select'
				)
			);
			$wp_customize->add_control('muiteer_product_preview_image_ratio',
				array(
					'label' => esc_html__('Product preview image ratio', 'muiteer'),
					'section' => 'muiteer_woocommerce_product_details_page',
					'settings' => 'muiteer_product_preview_image_ratio',
					'type' => 'select',
					'choices' => array(
						'responsive' => esc_html__('Responsive', 'muiteer'),
						'1_1' => esc_html__('1:1', 'muiteer'),
						'4_3' => esc_html__('4:3', 'muiteer'),
						'16_9' => esc_html__('16:9', 'muiteer')
					)
				)
			);
			// Sub sections end
		}
	// ********WooCommerce end********
}
add_action('customize_register', 'muiteer_customize_register');

// Sanitize function start
	function muiteer_validate_select($select_box) {
		if ( in_array($select_box, array('enabled', 'disabled', 'always'), true) ) {
			return $select_box;
		}
	}

	function muiteer_validate_multiple_select($input, $setting) {
		return $input;
	}

	function muiteer_sanitize_font($font) {
		return $font;
	}

	function muiteer_sanitize_basic_number($number) {
		return absint($number);
	}

	function muiteer_validate_specified_post($input) {
		return $input;
	}

	function muiteer_validate_social($input) {
		return esc_html($input);
	}

	function muiteer_validate_footer($input) {
		return esc_html($input);
	}

	function muiteer_validate_input($input) {
		return esc_html($input);
	}

	function muiteer_validate_input_blog_per_page($input) {
		update_option('posts_per_page', $input);
		return esc_html($input);
	}

	function muiteer_validate_textarea($textarea) {
		return esc_html($textarea);
	}

	function muiteer_pinned_tab_icon_sanitize_image($image) {
		$mimes = array(
			'svg' => 'image/svg+xml'
		);
		$file = wp_check_filetype($image, $mimes);
		return ($file['ext'] ? $image : $image->default);
	}

	function muiteer_favicon_image_sanitize_image($image) {
		if ( empty($image) ) {
			$file = wp_upload_dir()['basedir'] . '/' . 'favicon.ico';
			wp_delete_file($file);
			return $image;
		} else {
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'png' => 'image/png'
			);
			$file = wp_check_filetype($image, $mimes);

			$source = $_SERVER['DOCUMENT_ROOT'].wp_make_link_relative($image);
			$destination = wp_upload_dir()['basedir'] . '/' . 'favicon.ico';
			$ico_lib = new PHP_ICO(
				$source,
				array(
					array(16, 16),
					array(32, 32),
					array(48, 48),
					array(64, 64),
					array(128, 128)
				)
			);
			$ico_lib->save_ico($destination);

			return ($file['ext'] ? $image : $image->default);
		}
	}

	function muiteer_sanitize_date_time($input) {
		$date = new DateTime($input);
		return $date->format('Y-m-d H:i:s');
	}
// Sanitize function end
