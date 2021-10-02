<?php
	if( function_exists('acf_add_local_field_group') ):
		if (get_theme_mod('muiteer_dynamic_color', 'disabled') == 'disabled') {
			// ********Page style start********
				acf_add_local_field_group(array (
					'key' => 'group_5728563d5fa70',
					'title' => esc_html__('Page Style', 'muiteer'),
					'fields' => array (
						array (
							'key' => 'field_573d6a96b8bb1',
							'label' => esc_html__('Color scheme', 'muiteer'),
							'name' => 'page-scheme',
							'type' => 'true_false',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'message' => esc_html__('Use unique different color scheme for this page', 'muiteer'),
							'default_value' => 0,
						),
						array (
							'key' => 'field_5728566adc859',
							'label' => esc_html__('Background color', 'muiteer'),
							'name' => 'page-bg-color',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_573d6a96b8bb1',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
							'wrapper' => array (
								'width' => 33,
								'class' => '',
								'id' => '',
							),
							'default_value' => '#f2f2f2',
						),
						array (
							'key' => 'field_5728568adc860',
							'label' => esc_html__('Text color', 'muiteer'),
							'name' => 'page-txt-color',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_573d6a96b8bb1',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
							'wrapper' => array (
								'width' => 33,
								'class' => '',
								'id' => '',
							),
							'default_value' => '#333333',
						),
						array (
							'key' => 'field_573d6acab8ba2',
							'label' => esc_html__('Accent color', 'muiteer'),
							'name' => 'page-acc-color',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_573d6a96b8bb1',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
							'wrapper' => array (
								'width' => 33,
								'class' => '',
								'id' => '',
							),
							'default_value' => '#0088cc',
						),
						array (
							'key' => 'field_5728de3dc85b',
							'label' => esc_html__('Background opacity (start)', 'muiteer'),
							'name' => 'page-bg-opacity-s',
							'type' => 'range',
							'instructions' => esc_html__('The page background is opacity before scrolling.', 'muiteer'),
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 50,
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'min' => '',
							'max' => '',
							'step' => '',
							'prepend' => '',
							'append' => '',
						),
						array (
							'key' => 'field_572856c3dc85b',
							'label' => esc_html__('Background opacity (end)', 'muiteer'),
							'name' => 'page-bg-opacity',
							'type' => 'range',
							'instructions' => esc_html__('The page background is opacity after scrolling.', 'muiteer'),
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 50,
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'min' => '',
							'max' => '',
							'step' => '',
							'prepend' => '',
							'append' => '',
						),
					),
					'location' => array (
						array (
							array (
								'param' => 'post_type',
								'operator' => '==',
								'value' => 'page',
							),
						),
						array (
							array (
								'param' => 'post_type',
								'operator' => '==',
								'value' => 'portfolio',
							),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => '',
					'active' => 1,
					'description' => '',
				));
			// ********Page style end********

			// ********Post style start********
				acf_add_local_field_group(array (
					'key' => 'group_5728563d5fa71',
					'title' => esc_html__('Page Style', 'muiteer'),
					'fields' => array (
						array (
							'key' => 'field_573d6a96b8ba0',
							'label' => esc_html__('Color scheme', 'muiteer'),
							'name' => 'page-scheme',
							'type' => 'true_false',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'message' => esc_html__('Use unique different color scheme for this page', 'muiteer'),
							'default_value' => 0,
						),
						array (
							'key' => 'field_5728566adc858',
							'label' => esc_html__('Background color', 'muiteer'),
							'name' => 'page-bg-color',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_573d6a96b8ba0',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
							'wrapper' => array (
								'width' => 25,
								'class' => '',
								'id' => '',
							),
							'default_value' => '#f2f2f2',
						),
						array (
							'key' => 'field_5728568adc859',
							'label' => esc_html__('Text color', 'muiteer'),
							'name' => 'page-txt-color',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_573d6a96b8ba0',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
							'wrapper' => array (
								'width' => 25,
								'class' => '',
								'id' => '',
							),
							'default_value' => '#333333',
						),
						array (
							'key' => 'field_573d6acab8ba1',
							'label' => esc_html__('Accent color', 'muiteer'),
							'name' => 'page-acc-color',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_573d6a96b8ba0',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
							'wrapper' => array (
								'width' => 25,
								'class' => '',
								'id' => '',
							),
							'default_value' => '#0088cc',
						),
						array (
							'key' => 'field_5728568adc861',
							'label' => esc_html__('Content wrapper color', 'muiteer'),
							'name' => 'muiteer_blog_content_wrapper_background_color',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_573d6a96b8ba0',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
							'wrapper' => array (
								'width' => 25,
								'class' => '',
								'id' => '',
							),
							'default_value' => '#ffffff',
						),
					),
					'location' => array (
						array (
							array (
								'param' => 'post_type',
								'operator' => '==',
								'value' => 'post',
							),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => '',
					'active' => 1,
					'description' => '',
				));
			// ********Post style end********
		} else {
			// ********Page style start********
				acf_add_local_field_group(array (
					'key' => 'group_5728563d5fa70',
					'title' => esc_html__('Page Style', 'muiteer'),
					'fields' => array (
						array (
							'key' => 'field_5728de3dc85b',
							'label' => esc_html__('Background opacity (start)', 'muiteer'),
							'name' => 'page-bg-opacity-s',
							'type' => 'range',
							'instructions' => esc_html__('The page background is opacity before scrolling.', 'muiteer'),
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 50,
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'min' => '',
							'max' => '',
							'step' => '',
							'prepend' => '',
							'append' => '',
						),
						array (
							'key' => 'field_572856c3dc85b',
							'label' => esc_html__('Background opacity (end)', 'muiteer'),
							'name' => 'page-bg-opacity',
							'type' => 'range',
							'instructions' => esc_html__('The page background is opacity after scrolling.', 'muiteer'),
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 50,
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'min' => '',
							'max' => '',
							'step' => '',
							'prepend' => '',
							'append' => '',
						),
					),
					'location' => array (
						array (
							array (
								'param' => 'post_type',
								'operator' => '==',
								'value' => 'page',
							),
						),
						array (
							array (
								'param' => 'post_type',
								'operator' => '==',
								'value' => 'portfolio',
							),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => '',
					'active' => 1,
					'description' => '',
				));
			// ********Page style end********
		};

		// ********Slide start********
			acf_add_local_field_group(array (
				'key' => 'group_5bffc06672016',
				'title' => esc_html__('Slide', 'muiteer'),
				'fields' => array (
					
					// Visibility
					array (
						'key' => 'field_5bffc548859de',
						'label' => esc_html__('Visibility', 'muiteer'),
						'name' => 'slide_visibility',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => esc_html__('Use the slide for this page', 'muiteer'),
						'default_value' => 0,
					),

					// Previous/next buttons
					array (
						'key' => 'field_5bffd144512ae',
						'label' => esc_html__('Previous/Next buttons', 'muiteer'),
						'name' => 'slide_previous_and_next_buttons',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5bffc548859de',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'message' => esc_html__('Enable', 'muiteer'),
						'default_value' => 0,
					),

					// Navigation dots
					array (
						'key' => 'field_5bffd2292fd70',
						'label' => esc_html__('Navigation dots', 'muiteer'),
						'name' => 'slide_navigation_dots',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5bffc548859de',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'message' => esc_html__('Enable', 'muiteer'),
						'default_value' => 1,
					),

					// Scroll with the content
					array (
						'key' => 'field_5bffcb1ae5716',
						'label' => esc_html__('Scroll with the content', 'muiteer'),
						'name' => 'slide_scroll_with_the_content',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5bffc548859de',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'message' => esc_html__('Enable', 'muiteer'),
						'default_value' => 0,
					),

					// Autoplay
					array (
						'key' => 'field_5bffc70e69366',
						'label' => esc_html__('Autoplay (Second)', 'muiteer'),
						'name' => 'slide_autoplay',
						'type' => 'range',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5bffc548859de',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'default_value' => 0,
						'min' => '0',
						'max' => '10',
						'step' => '1',
						'prepend' => '',
						'append' => '',
					),

					// Height
					array (
						'key' => 'field_5bffca56f1ad5',
						'label' => esc_html__('Slide height (%)', 'muiteer'),
						'name' => 'slide_height',
						'type' => 'range',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5bffc548859de',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'default_value' => 100,
						'min' => '30',
						'max' => '100',
						'step' => '',
						'prepend' => '',
						'append' => '',
					),

					// Content visibility
					array (
						'key' => 'field_5bffc082efc89',
						'label' => esc_html__('Content visibility (%)', 'muiteer'),
						'name' => 'slide_content_visibility',
						'type' => 'range',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5bffc548859de',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'default_value' => 100,
						'min' => '0',
						'max' => '100',
						'step' => '',
						'prepend' => '',
						'append' => '',
					),

					// Content
					array (
						'key' => 'field_5bffc082efc88',
						'label' => esc_html__('Content', 'muiteer'),
						'name' => 'slide_content',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5bffc548859de',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => 'field_5bffc0aeefc89',
						'min' => 0,
						'max' => 0,
						'layout' => 'block',
						'button_label' => esc_html__('Add Slide', 'muiteer'),
						'sub_fields' => array (
							
							// Desktop tab
							array (
								'key' => 'field_5bffc32a08848',
								'label' => esc_html__('Desktop', 'muiteer'),
								'type' => 'tab',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'placement' => 'top',
								'endpoint' => '',
							),

							// Image/Video desktop
							array (
								'key' => 'field_5bffc0aeefc89',
								'label' => esc_html__('Image/Video', 'muiteer'),
								'name' => 'slide_image_or_video_desktop',
								'type' => 'file',
								'instructions' => esc_html__('You can select/upload image or video file.', 'muiteer'),
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'library' => 'all',
								'min_size' => '',
								'max_size' => '',
								'mime_types' => 'jpg, jpeg, png, gif, mp4',
							),

							// Video cover desktop
							array (
								'key' => 'field_5bffc0aeefc91',
								'label' => esc_html__('Video cover', 'muiteer'),
								'name' => 'slide_video_cover_desktop',
								'type' => 'image',
								'instructions' => esc_html__('If you selected a video file, please set a video cover.', 'muiteer'),
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc0aeefc89',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 50,
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'preview_size' => 'thumbnail',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => 'jpg, jpeg, png, gif',
							),

							// Animation desktop
							array (
								'key' => 'field_5bffc0aeefc90',
								'label' => esc_html__('Animation', 'muiteer'),
								'name' => 'slide_animation_desktop',
								'type' => 'true_false',
								'instructions' => esc_html__('Slowly transform scale.', 'muiteer'),
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc0aeefc89',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 50,
									'class' => '',
									'id' => '',
								),
								'message' => esc_html__('Enable', 'muiteer'),
								'default_value' => 1,
							),

							// Title desktop
							array (
								'key' => 'field_5bffc1c6efc8a',
								'label' => esc_html__('Title', 'muiteer'),
								'name' => 'slide_title_desktop',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc0aeefc89',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

							// Subtitle desktop
							array (
								'key' => 'field_5bffc1fbefc8b',
								'label' => esc_html__('Subtitle', 'muiteer'),
								'name' => 'slide_subtitle_desktop',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc0aeefc89',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

							// Link desktop
							array (
								'key' => 'field_5bffce3f716d8',
								'label' => esc_html__('Link', 'muiteer'),
								'name' => 'slide_link_desktop',
								'type' => 'url',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc0aeefc89',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
							),

							// Overlay opacity desktop
							array (
								'key' => 'field_5bffcf200e0c1',
								'label' => esc_html__('Overlay opacity', 'muiteer'),
								'name' => 'slide_overlay_opacity_desktop',
								'type' => 'range',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc0aeefc89',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => 50,
								'min' => '',
								'max' => '',
								'step' => '',
								'prepend' => '',
								'append' => '',
							),

							// Overlay color desktop
							array (
								'key' => 'field_5bffd020ec13a',
								'label' => esc_html__('Overlay color', 'muiteer'),
								'name' => 'slide_overlay_color_desktop',
								'type' => 'color_picker',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc0aeefc89',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '#000000',
							),

							// Caption color desktop
							array (
								'key' => 'field_5bffd064ec13b',
								'label' => esc_html__('Caption color', 'muiteer'),
								'name' => 'slide_caption_color_desktop',
								'type' => 'color_picker',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc0aeefc89',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '#ffffff',
							),

							// Pad tab
							array (
								'key' => 'field_5bffc34508849',
								'label' => esc_html__('Pad (Option)', 'muiteer'),
								'type' => 'tab',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'placement' => 'top',
								'endpoint' => '',
							),

							// Image/Video pad
							array (
								'key' => 'field_5bffc3996cb4d',
								'label' => esc_html__('Image/Video', 'muiteer'),
								'name' => 'slide_image_or_video_pad',
								'type' => 'file',
								'instructions' => esc_html__('You can select/upload image or video file.', 'muiteer'),
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'library' => 'all',
								'min_size' => '',
								'max_size' => '',
								'mime_types' => 'jpg, jpeg, png, gif, mp4',
							),

							// Video cover desktop
							array (
								'key' => 'field_5bffc3996cb4h',
								'label' => esc_html__('Video cover', 'muiteer'),
								'name' => 'slide_video_cover_pad',
								'type' => 'image',
								'instructions' => esc_html__('If you selected a video file, please set a video cover.', 'muiteer'),
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc3996cb4d',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 50,
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'preview_size' => 'thumbnail',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => 'jpg, jpeg, png, gif',
							),

							// Slowly transform scale pad
							array (
								'key' => 'field_5bffc3996cb4g',
								'label' => esc_html__('Animation', 'muiteer'),
								'name' => 'slide_animation_pad',
								'type' => 'true_false',
								'instructions' => esc_html__('Slowly transform scale.', 'muiteer'),
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc3996cb4d',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 50,
									'class' => '',
									'id' => '',
								),
								'message' => esc_html__('Enable', 'muiteer'),
								'default_value' => 1,
							),

							// Title pad
							array (
								'key' => 'field_5bffc3b66cb4e',
								'label' => esc_html__('Title', 'muiteer'),
								'name' => 'slide_title_pad',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc3996cb4d',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

							// Subtitle pad
							array (
								'key' => 'field_5bffc3c36cb4f',
								'label' => esc_html__('Subtitle', 'muiteer'),
								'name' => 'slide_subtitle_pad',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc3996cb4d',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

							// Link pad
							array (
								'key' => 'field_5bffce32716d7',
								'label' => esc_html__('Link', 'muiteer'),
								'name' => 'slide_link_pad',
								'type' => 'url',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc3996cb4d',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
							),

							// Overlay opacity pad
							array (
								'key' => 'field_5bffd737c0e1c',
								'label' => esc_html__('Overlay opacity', 'muiteer'),
								'name' => 'slide_overlay_opacity_pad',
								'type' => 'range',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc3996cb4d',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => 50,
								'min' => '',
								'max' => '',
								'step' => '',
								'prepend' => '',
								'append' => '',
							),

							// Overlay color pad
							array (
								'key' => 'field_5bffd742c0e1d',
								'label' => esc_html__('Overlay color', 'muiteer'),
								'name' => 'slide_overlay_color_pad',
								'type' => 'color_picker',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc3996cb4d',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '#000000',
							),

							// Caption color pad
							array (
								'key' => 'field_5bffd74bc0e1e',
								'label' => esc_html__('Caption color', 'muiteer'),
								'name' => 'slide_caption_color_pad',
								'type' => 'color_picker',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc3996cb4d',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '#ffffff',
							),

							// Mobile tab
							array (
								'key' => 'field_5bffc3650884a',
								'label' => esc_html__('Mobile (Option)', 'muiteer'),
								'type' => 'tab',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'placement' => 'top',
								'endpoint' => '',
							),

							// Image/Video mobile
							array (
								'key' => 'field_5bffc406ac788',
								'label' => esc_html__('Image/Video', 'muiteer'),
								'name' => 'slide_image_or_video_mobile',
								'type' => 'file',
								'instructions' => esc_html__('You can select/upload image or video file.', 'muiteer'),
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'library' => 'all',
								'min_size' => '',
								'max_size' => '',
								'mime_types' => 'jpg, jpeg, png, gif, mp4',
							),

							// Video cover desktop
							array (
								'key' => 'field_5bffc406ac791',
								'label' => esc_html__('Video cover', 'muiteer'),
								'name' => 'slide_video_cover_mobile',
								'type' => 'image',
								'instructions' => esc_html__('If you selected a video file, please set a video cover.', 'muiteer'),
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc406ac788',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 50,
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'preview_size' => 'thumbnail',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => 'jpg, jpeg, png, gif',
							),

							// Slowly transform scale mobile
							array (
								'key' => 'field_5bffc406ac790',
								'label' => esc_html__('Animation', 'muiteer'),
								'name' => 'slide_animation_mobile',
								'type' => 'true_false',
								'instructions' => esc_html__('Slowly transform scale.', 'muiteer'),
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc406ac788',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 50,
									'class' => '',
									'id' => '',
								),
								'message' => esc_html__('Enable', 'muiteer'),
								'default_value' => 1,
							),

							// Title mobile
							array (
								'key' => 'field_5bffc410ac789',
								'label' => esc_html__('Title', 'muiteer'),
								'name' => 'slide_title_mobile',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc406ac788',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

							// Subtitle mobile
							array (
								'key' => 'field_5bffc41bac78a',
								'label' => esc_html__('Subtitle', 'muiteer'),
								'name' => 'slide_subtitle_mobile',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc406ac788',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

							// Link mobile
							array (
								'key' => 'field_5bffcdf5716d6',
								'label' => esc_html__('Link', 'muiteer'),
								'name' => 'slide_link_mobile',
								'type' => 'url',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc406ac788',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
							),

							// Overlay opacity mobile
							array (
								'key' => 'field_5bffd79bd81d1',
								'label' => esc_html__('Overlay opacity', 'muiteer'),
								'name' => 'slide_overlay_opacity_mobile',
								'type' => 'range',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc406ac788',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => 50,
								'min' => '',
								'max' => '',
								'step' => '',
								'prepend' => '',
								'append' => '',
							),

							// Overlay color mobile
							array (
								'key' => 'field_5bffd792d81d0',
								'label' => esc_html__('Overlay color', 'muiteer'),
								'name' => 'slide_overlay_color_mobile',
								'type' => 'color_picker',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc406ac788',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '#000000',
							),

							// Caption color mobile
							array (
								'key' => 'field_5bffd77dd81ce',
								'label' => esc_html__('Caption color', 'muiteer'),
								'name' => 'slide_caption_color_mobile',
								'type' => 'color_picker',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array (
									array (
										array (
											'field' => 'field_5bffc406ac788',
											'operator' => '!=empty',
										),
									),
								),
								'wrapper' => array (
									'width' => 33,
									'class' => '',
									'id' => '',
								),
								'default_value' => '#ffffff',
							),
						),
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'page',
						),
					),
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'portfolio',
						),
					),
				),
				'menu_order' => 1,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));
		// ********Slide end********

		// ********Portfolio information start********
			acf_add_local_field_group(array (
				'key' => 'group_5cbea0a7bf1cc',
				'title' => esc_html__('Portfolio Information', 'muiteer'),
				'fields' => array (
					// Visibility
					array (
						'key' => 'field_5cbea48f11d0f',
						'label' => esc_html__('Visibility', 'muiteer'),
						'name' => 'portfolio_info_visibility',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => esc_html__('Use the portfolio information for this page', 'muiteer'),
						'default_value' => 0,
					),

					// Client
					array (
						'key' => 'field_5cbea68df486b',
						'label' => esc_html__('Client', 'muiteer'),
						'name' => 'portfolio_info_client',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5cbea48f11d0f',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),

					// Team
					array (
						'key' => 'field_5cbea8d55d6d4',
						'label' => esc_html__('Team', 'muiteer'),
						'name' => 'portfolio_info_team',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5cbea48f11d0f',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),

					// Type
					array (
						'key' => 'field_5cbea6eeef9c8',
						'label' => esc_html__('Type', 'muiteer'),
						'name' => 'portfolio_info_type',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5cbea48f11d0f',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),

					// Address
					array (
						'key' => 'field_5cbeaac406b3a',
						'label' => esc_html__('Address', 'muiteer'),
						'name' => 'portfolio_info_address',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5cbea48f11d0f',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),

					// Date
					array (
						'key' => 'field_5cbea78e3a9c1',
						'label' => esc_html__('Date', 'muiteer'),
						'name' => 'portfolio_info_date',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5cbea48f11d0f',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),

					// Link
					array (
						'key' => 'field_5cbea3ef297d4',
						'label' => esc_html__('Link', 'muiteer'),
						'name' => 'portfolio_info_link',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5cbea48f11d0f',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),

					// Other information
					array (
						'key' => 'field_5cbea1b7326f5',
						'label' => esc_html__('Other Information', 'muiteer'),
						'name' => 'portfolio_info_repeater',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5cbea48f11d0f',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => '',
						'min' => 0,
						'max' => 0,
						'layout' => 'block',
						'button_label' => esc_html__('Add Other Information', 'muiteer'),
						'sub_fields' => array (

							// Title
							array (
								'key' => 'field_5cbea28a326f6',
								'label' => esc_html__('Title', 'muiteer'),
								'name' => 'portfolio_title',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => '',
								'wrapper' => array (
									'width' => 50,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

							// Content
							array (
								'key' => 'field_5cbea2bc326f7',
								'label' => esc_html__('Content', 'muiteer'),
								'name' => 'portfolio_content',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => '',
								'wrapper' => array (
									'width' => 50,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

						),
					),
				),

				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'portfolio',
						),
					),
				),
				'menu_order' => 2,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));
		// ********Portfolio information end********

		// ********SEO start********
			acf_add_local_field_group(array (
				'key' => 'group_5b839b9fc8387',
				'title' => esc_html__('SEO', 'muiteer'),
				'fields' => array (
					array (
						'key' => 'field_5b839ba55c9ff',
						'label' => esc_html__('Meta Keywords (Comma Separated)', 'muiteer'),
						'name' => 'muiteer_seo_keywords',
						'type' => 'text',
						'instructions' => esc_html__('Most search engines use a maximum of 64 chars for the keywords.', 'muiteer'),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_5b839eeff29c8',
						'label' => esc_html__('Meta Description', 'muiteer'),
						'name' => 'muiteer_seo_description',
						'type' => 'textarea',
						'instructions' => esc_html__('Most search engines use a maximum of 230-320 chars for the description.', 'muiteer'),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '320',
						'readonly' => 0,
						'disabled' => 0,
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'post',
						),
					),
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'page',
						),
					),
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'portfolio',
						),
					),
				),
				'menu_order' => 3,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));
		// ********SEO end********

		// ********Recent post start********
			acf_add_local_field_group(array (
				'key' => 'group_5b839b9fc8388',
				'title' => esc_html__('Recent Post', 'muiteer'),
				'fields' => array (

					// Recent blog post
					array (
						'key' => 'field_5c1683e49842f',
						'label' => esc_html__('Recent blog post', 'muiteer'),
						'name' => 'recent_post_post',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'message' => esc_html__('Enable', 'muiteer'),
						'default_value' => 0,
					),

					// Recent blog quantity
					array (
						'key' => 'field_5c16844cff37d',
						'label' => esc_html__('Recent blog quantity', 'muiteer'),
						'name' => 'recent_post_quantity',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'choices' => array (
							'3' => '3',
							'4' => '4',
							'5' => '5',
							'6' => '6',
							'7' => '7',
							'8' => '8',
							'9' => '9',
							'10' => '10',
						),
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'default_value' => 6,
					),

					// Recent blog cover ratio
					array (
						'key' => 'field_5c16844cff37e',
						'label' => esc_html__('Recent blog cover ratio', 'muiteer'),
						'name' => 'recent_post_cover_ratio',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'choices' => array (
							'1_1' => '1:1',
							'4_3' => '4:3',
							'16_9' => '16:9',
						),
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'default_value' => '4_3',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0
					),

					// Recent portfolio post
					array (
						'key' => 'field_5c1684ee019f5',
						'label' => esc_html__('Recent portfolio post', 'muiteer'),
						'name' => 'recent_portfolio_post',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'message' => esc_html__('Enable', 'muiteer'),
						'default_value' => 0,
					),

					// Recent portfolio quantity
					array (
						'key' => 'field_5c168505019f6',
						'label' => esc_html__('Recent portfolio quantity', 'muiteer'),
						'name' => 'recent_portfolio_quantity',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'choices' => array (
							'3' => '3',
							'4' => '4',
							'5' => '5',
							'6' => '6',
							'7' => '7',
							'8' => '8',
							'9' => '9',
							'10' => '10',
						),
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'default_value' => 6,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0
					),

					// Recent portfolio cover ratio
					array (
						'key' => 'field_5c168505019f7',
						'label' => esc_html__('Recent portfolio cover ratio', 'muiteer'),
						'name' => 'recent_portfolio_cover_ratio',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'choices' => array (
							'1_1' => '1:1',
							'4_3' => '4:3',
							'16_9' => '16:9',
						),
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'default_value' => '4_3',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'page_type',
							'operator' => '==',
							'value' => 'front_page',
						),
					),
				),
				'menu_order' => 4,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));
		// ********Recent post end********

		// ********Friendly link homepage settings start********
			acf_add_local_field_group(array (
				'key' => 'group_5c93b3e5d3716',
				'title' => esc_html__('Friendly Link', 'muiteer'),
				'fields' => array (

					// Recent blog post
					array (
						'key' => 'field_5c93b3f5c087b',
						'label' => esc_html__('Friendly Link', 'muiteer'),
						'name' => 'friendly_link_status',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'message' => esc_html__('Enable', 'muiteer'),
						'default_value' => 0,
					),

					// Quantity
					array (
						'key' => 'field_5c93b5317f90c',
						'label' => esc_html__('Quantity', 'muiteer'),
						'name' => 'friendly_link_quantity',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'choices' => array (
							'10' => '10',
							'11' => '11',
							'12' => '12',
							'13' => '13',
							'14' => '14',
							'15' => '15',
							'16' => '16',
							'17' => '17',
							'18' => '18',
							'19' => '19',
							'20' => '20',
						),
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => 12,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'page_type',
							'operator' => '==',
							'value' => 'front_page',
						),
					),
				),
				'menu_order' => 5,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));
		// ********Friendly link homepage settings end********

		// ********Friendly link start********
			// Get page id of the friend link template
			$page_details = get_pages(
				array(
					'post_type' => 'page',
					'fields' => 'ids',
					'nopaging' => true,
					'hierarchical' => 0,
					'meta_key' => '_wp_page_template',
					'meta_value' => 'templates/template-link.php',
				)
			);

			foreach($page_details as $page){
				$page_id = $page->ID;
			}

			acf_add_local_field_group(array (
				'key' => 'group_5c8fb55d56f2f',
				'title' => esc_html__('Friendly Link', 'muiteer'),
				'fields' => array (
					array (
						'key' => 'field_5c8fb571191bf',
						'label' => esc_html__('Member', 'muiteer'),
						'name' => 'friendly_member',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => 'field_5c8fb76d9ddcf',
						'min' => 0,
						'max' => 0,
						'layout' => 'block',
						'button_label' => esc_html__('Add Member', 'muiteer'),
						'sub_fields' => array (

							// Avatar
							array (
								'key' => 'field_5c8fb622191c0',
								'label' => esc_html__('Avatar', 'muiteer'),
								'name' => 'friendly_avatar',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => 30,
									'class' => '',
									'id' => '',
								),
								'return_format' => 'id',
								'preview_size' => 'thumbnail',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => 'jpg, jpeg, png, gif',
							),

							// Name
							array (
								'key' => 'field_5c8fb76d9ddcf',
								'label' => esc_html__('Name', 'muiteer'),
								'name' => 'friendly_name',
								'type' => 'text',
								'instructions' => '',
								'required' => 1,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => 35,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

							// Description
							array (
								'key' => 'field_5c8fb7e0f9bab',
								'label' => esc_html__('Description', 'muiteer'),
								'name' => 'friendly_description',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => 35,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

							// Link
							array (
								'key' => 'field_5c8fb809f9bac',
								'label' => esc_html__('Link', 'muiteer'),
								'name' => 'friendly_link',
								'type' => 'url',
								'instructions' => '',
								'required' => 1,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
							),
						),
					),
				),

				'location' => array (
					array (
						array (
							'param' => 'page',
							'operator' => '==',
							'value' => $page_id,
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));
		// ********Friendly link end********

		// ********About start********
			// Get page id of the about template
			$page_details = get_pages(
				array(
					'post_type' => 'page',
					'fields' => 'ids',
					'nopaging' => true,
					'hierarchical' => 0,
					'meta_key' => '_wp_page_template',
					'meta_value' => 'templates/template-about.php',
				)
			);

			foreach($page_details as $page){
				$page_id = $page->ID;
			}

			acf_add_local_field_group(array (
				'key' => 'group_5d0f901bf24a2',
				'title' => esc_html__('Brand Wall', 'muiteer'),
				'fields' => array (
					// Visibility
					array (
						'key' => 'field_5d0f92b0788e3',
						'label' => esc_html__('Visibility', 'muiteer'),
						'name' => 'about_brand_wall_visibility',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'message' => esc_html__('Use the brand wall for this page', 'muiteer'),
						'default_value' => 0,
					),
					// View mode
					array (
						'key' => 'field_5d0f92b0788e8',
						'label' => esc_html__('View Mode', 'muiteer'),
						'name' => 'about_brand_wall_view_mode',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'choices' => array (
							'grid' => esc_html__('Grid Mode', 'muiteer'),
							'river' => esc_html__('River Mode', 'muiteer'),
						),
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5d0f92b0788e3',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => "river",
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0
					),
					array (
						'key' => 'field_5d0f905435d58',
						'label' => esc_html__('Brands', 'muiteer'),
						'name' => 'about_brand_wall_repeater',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_5d0f92b0788e3',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => 'field_5d0f91dd35d5a',
						'min' => 0,
						'max' => 0,
						'layout' => 'block',
						'button_label' => esc_html__('Add Brand', 'muiteer'),
						'sub_fields' => array (
							// Brand logo
							array (
								'key' => 'field_5d0f911d35d59',
								'label' => esc_html__('Brand Logo', 'muiteer'),
								'name' => 'about_brand_logo',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => 50,
									'class' => '',
									'id' => '',
								),
								'return_format' => 'id',
								'preview_size' => 'thumbnail',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => 'jpg, jpeg, png, gif',
							),

							// Name
							array (
								'key' => 'field_5d0f91dd35d5a',
								'label' => esc_html__('Brand Name', 'muiteer'),
								'name' => 'about_brand_name',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => 50,
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
						),
					),
				),

				'location' => array (
					array (
						array (
							'param' => 'page',
							'operator' => '==',
							'value' => $page_id,
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));
		// ********About end********
	endif;