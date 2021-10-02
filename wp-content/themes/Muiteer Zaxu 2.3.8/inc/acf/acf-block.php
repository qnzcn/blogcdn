<?php
    function muiteer_theme_block_categories($categories, $post) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'muiteer-category',
                    'title' => esc_html__('Muiteer Blocks', 'muiteer'),
                    'icon' => '',
                ),
            )
        );
    }
    add_filter('block_categories', 'muiteer_theme_block_categories', 10, 2);

    function register_acf_block_types() {
        // ********Highlight code start********
            acf_add_local_field_group(array (
                'key' => 'group_5e2dc17bbbb9s',
                'title' => esc_html__('Highlight Code', 'muiteer'),
                'fields' => array (
                    // Language
                    array (
                        'key' => 'field_5e2dc17bbbb9c',
                        'label' => esc_html__('Language', 'muiteer'),
                        'name' => 'muiteer_highlight_code_language',
                        'type' => 'select',
                        'instructions' => '',
						'required' => 0,
						'choices' => array (
                            'paintext' => 'plaintext',
							'apache' => 'Apache',
							'bash' => 'Bash',
                            'cs' => 'C#',
                            'cpp' => 'C++',
                            'css' => 'CSS',
                            'coffeescript' => 'CoffeeScript',
                            'diff' => 'Diff',
                            'go' => 'Go',
                            'diff' => 'Diff',
                            'xml' => 'HTML, XML',
                            'http' => 'HTTP',
                            'json' => 'JSON',
                            'java' => 'Java',
                            'javascript' => 'JavaScript',
                            'kotlin' => 'Kotlin',
                            'less' => 'Less',
                            'lua' => 'Lua',
                            'makefile' => 'Makefile',
                            'markdown' => 'Markdown',
                            'nginx' => 'Nginx',
                            'objectivec' => 'Objective-C',
                            'php' => 'PHP',
                            'perl' => 'Perl',
                            'properties' => 'Properties',
                            'python' => 'Python',
                            'ruby' => 'Ruby',
                            'rust' => 'Rust',
                            'scss' => 'SCSS',
                            'sql' => 'SQL',
                            'shell' => 'Shell Session',
                            'swift' => 'Swift',
                            'ini' => 'TOML, INI',
                            'typescript' => 'TypeScript',
                            'yaml' => 'YAML',
						),
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 'plaintext',
                        'ui' => 1,
                    ),

                    // Code
                    array (
                        'key' => 'field_5e2dbbd5f2c08',
                        'label' => esc_html__('Code', 'muiteer'),
                        'name' => 'muiteer_highlight_code_content',
                        'type' => 'textarea',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => esc_html__('Please enter code...', 'muiteer'),
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/muiteer-highlight-code',
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
            
            acf_register_block_type(array(
                'name' => 'muiteer-highlight-code',
                'title' => esc_html__('Highlight Code', 'muiteer'),
                'description' => esc_html__('Display syntax-highlighting code.', 'muiteer'),
                'render_template' => 'template-parts/blocks/highlight-code/highlight-code.php',
                'category' => 'muiteer-category',
                'icon' => 'editor-code',
                'keywords' => array('code', 'highlight'),
                // 'post_types' => array('post', 'page'),
                'mode' => 'auto',
                'supports' => array(
                    'align' => false,
                    "mode" => false,
                ),
            ));
        // ********Highlight code end********

        // ********Accordion start********
            acf_add_local_field_group(array (
                'key' => 'group_5e304a5c24982',
                'title' => esc_html__('Accordion', 'muiteer'),
                'fields' => array (
                    // Expand All Items
					array (
						'key' => 'field_5e304a5c24982',
						'label' => esc_html__('Expand All Items', 'muiteer'),
						'name' => 'muiteer_accordion_expand_all_items',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'message' => '',
                        'default_value' => 0,
                        'ui' => 1,
                    ),

                    // Collapse Other Items
					array (
						'key' => 'field_5e304a5c24983',
						'label' => esc_html__('Collapse Other Items', 'muiteer'),
						'name' => 'muiteer_accordion_collapse_other_items',
						'type' => 'true_false',
						'instructions' => esc_html__('Collapse other items when one is expanded.', 'muiteer'),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'message' => '',
                        'default_value' => 0,
                        'ui' => 1,
                    ),

                    // Content
					array (
						'key' => 'field_5e3046100ba9c',
						'label' => esc_html__('Content', 'muiteer'),
						'name' => 'muiteer_accordion_repeater',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => '',
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => 'field_5e3046910ba9d',
						'min' => 0,
						'max' => 0,
						'layout' => 'block',
						'button_label' => esc_html__('Add Item', 'muiteer'),
						'sub_fields' => array (
                            // Expand This Item
                            array (
                                'key' => 'field_5e304b955867f',
                                'label' => esc_html__('Expand This Item', 'muiteer'),
                                'name' => 'muiteer_accordion_expand_this_item',
                                'type' => 'true_false',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => '',
                                'wrapper' => array (
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'message' => '',
                                'default_value' => 0,
                                'ui' => 1,
                            ),

                            // Title
							array (
								'key' => 'field_5e3046910ba9d',
								'label' => esc_html__('Title', 'muiteer'),
								'name' => 'muiteer_accordion_title',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => '',
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => esc_html__('Please enter title...', 'muiteer'),
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),

							// Content
							array (
								'key' => 'field_5e3046fa0ba9e',
								'label' => esc_html__('Content', 'muiteer'),
								'name' => 'muiteer_accordion_content',
								'type' => 'wysiwyg',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => '',
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
							),
						),
					),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/muiteer-accordion',
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

            acf_register_block_type(array(
                'name' => 'muiteer-accordion',
                'title' => esc_html__('Accordion', 'muiteer'),
                'description' => esc_html__('Display accordion list.', 'muiteer'),
                'render_template' => 'template-parts/blocks/accordion/accordion.php',
                'category' => 'muiteer-category',
                'icon' => 'editor-insertmore',
                'keywords' => array('accordion'),
                // 'post_types' => array('post', 'page'),
                'mode' => 'auto',
                'supports' => array(
                    'align' => false,
                    "mode" => false,
                ),
            ));
        // ********Accordion end********

        // ********Waterfall gallery start********
            acf_add_local_field_group(array (
                'key' => 'group_5e32ad8b6e2e4',
                'title' => esc_html__('Waterfall Gallery', 'muiteer'),
                'fields' => array (
                    // Ratio
                    array (
						'key' => 'field_5e32ad8b6e2e4',
						'label' => esc_html__('Ratio', 'muiteer'),
						'name' => 'muiteer_waterfall_gallery_ratio',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'choices' => array (
							'responsive' => 'Responsive',
							'1_1' => '1:1',
							'4_3' => '4:3',
							'16_9' => '16:9',
						),
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => "responsive",
                        'ui' => 1,
                    ),
                    
                    // Lightbox
                    array (
						'key' => 'field_5e32b191222b0',
						'label' => esc_html__('Lightbox', 'muiteer'),
						'name' => 'muiteer_waterfall_gallery_lightbox',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'message' => '',
                        'default_value' => 1,
                        'ui' => 1,
                    ),

                    // Gallery
                    array (
						'key' => 'field_5e32b0c30cc5d',
						'label' => esc_html__('Gallery', 'muiteer'),
						'name' => 'muiteer_waterfall_gallery_gallery',
						'type' => 'gallery',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'mime_types' => 'jpg, jpeg, png, gif',
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/muiteer-waterfall-gallery',
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
            
            acf_register_block_type(array(
                'name' => 'muiteer-waterfall-gallery',
                'title' => esc_html__('Waterfall Gallery', 'muiteer'),
                'description' => esc_html__('Display waterfall gallery.', 'muiteer'),
                'render_template' => 'template-parts/blocks/waterfall-gallery/waterfall-gallery.php',
                'category' => 'muiteer-category',
                'icon' => 'format-gallery',
                'keywords' => array('waterfall', 'gallery'),
                // 'post_types' => array('post', 'page'),
                'mode' => 'auto',
                'supports' => array(
                    'align' => false,
                    "mode" => false,
                ),
            ));
        // ********Waterfall gallery end********

        // ********Slider gallery start********
            acf_add_local_field_group(array (
                'key' => 'group_5e36c0cd1d56f',
                'title' => esc_html__('Slider Gallery', 'muiteer'),
                'fields' => array (
                    // Previous/Next buttons
                    array (
                        'key' => 'field_5e36c0cd1d56e',
                        'label' => esc_html__('Previous/Next buttons', 'muiteer'),
                        'name' => 'muiteer_slider_gallery_previous_next_buttons',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 1,
                        'ui' => 1,
                    ),

                    // Navigation dots
                    array (
                        'key' => 'field_5e36c12c53c7a',
                        'label' => esc_html__('Navigation dots', 'muiteer'),
                        'name' => 'muiteer_slider_gallery_navigation_dots',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 1,
                        'ui' => 1,
                    ),

                    // Autoplay
					array (
						'key' => 'field_5e36bffc60de0',
						'label' => esc_html__('Autoplay (Second)', 'muiteer'),
						'name' => 'muiteer_slider_gallery_autoplay',
						'type' => 'range',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '50',
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
                    
                    // Slider height
                    array (
						'key' => 'field_5e36c194c6f2e',
						'label' => esc_html__('Slider height', 'muiteer'),
						'name' => 'muiteer_slider_gallery_slider_height',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'choices' => array (
							'responsive' => 'Responsive',
							'1_1' => '1:1',
							'4_3' => '4:3',
							'16_9' => '16:9',
						),
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => "responsive",
                        'ui' => 1,
                    ),

                    // Content
					array (
						'key' => 'field_5e36c3160fe92',
						'label' => esc_html__('Content', 'muiteer'),
						'name' => 'muiteer_slider_gallery_repeater',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => '',
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => 'field_5e36c34a0fe93',
						'min' => 0,
						'max' => 0,
						'layout' => 'block',
						'button_label' => esc_html__('Add Slide', 'muiteer'),
						'sub_fields' => array (
                            // Image
                            array (
                                'key' => 'field_5e36c34a0fe93',
                                'label' => esc_html__('Image', 'muiteer'),
                                'name' => 'muiteer_slider_gallery_item_image',
                                'type' => 'image',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array (
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'return_format' => 'array',
                                'preview_size' => 'thumbnail',
                                'library' => 'all',
                                'mime_types' => 'jpg, jpeg, png, gif',
                            ),

                            // Caption
							array (
								'key' => 'field_5e36c40fadbf1',
								'label' => esc_html__('Caption', 'muiteer'),
								'name' => 'muiteer_slider_gallery_item_caption',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => '',
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => esc_html__('Please enter slide caption...', 'muiteer'),
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
                            ),
                            
                            // Link
							array (
								'key' => 'field_5e36c3dfadbf0',
								'label' => esc_html__('Link', 'muiteer'),
								'name' => 'muiteer_slider_gallery_item_link',
								'type' => 'url',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => '',
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => esc_html__('Please enter slide url...', 'muiteer'),
							),
						),
					),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/muiteer-slider-gallery',
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

            acf_register_block_type(array(
                'name' => 'muiteer-slider-gallery',
                'title' => esc_html__('Slider Gallery', 'muiteer'),
                'description' => esc_html__('Display slider gallery.', 'muiteer'),
                'render_template' => 'template-parts/blocks/slider-gallery/slider-gallery.php',
                'category' => 'muiteer-category',
                'icon' => 'format-gallery',
                'keywords' => array('slider', 'gallery'),
                // 'post_types' => array('post', 'page'),
                'mode' => 'auto',
                'supports' => array(
                    'align' => false,
                    "mode" => false,
                ),
            ));
        // ********Slider gallery end********

        // ********Alert tips start********
            acf_add_local_field_group(array (
                'key' => 'group_5e9fd3c9dba22',
                'title' => esc_html__('Alert Tips', 'muiteer'),
                'fields' => array (
                    // Type
                    array (
                        'key' => 'field_5e9fd3c9dba22',
                        'label' => esc_html__('Type', 'muiteer'),
                        'name' => 'muiteer_alert_tips_type',
                        'type' => 'select',
                        'instructions' => '',
						'required' => 0,
						'choices' => array (
                            'information' => 'Information',
							'success' => 'Success',
							'warning' => 'Warning',
                            'error' => 'Error',
						),
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 'information',
                        'ui' => '',
                    ),

                    // Icon
                    array (
                        'key' => 'field_5e9fd845d487f',
                        'label' => esc_html__('Icon', 'muiteer'),
                        'name' => 'muiteer_alert_tips_icon',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => '1',
                        'ui' => 1,
                    ),

                    // Close Button
                    array (
                        'key' => 'field_5e9fd84588b4f',
                        'label' => esc_html__('Close Button', 'muiteer'),
                        'name' => 'muiteer_alert_tips_close_button',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => '',
                        'ui' => 1,
                    ),

                    // Dynamic Color
                    array (
                        'key' => 'field_5e9fd593ed2ca',
                        'label' => esc_html__('Dynamic Color', 'muiteer'),
                        'name' => 'muiteer_alert_tips_dynamic_color',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => '',
                        'ui' => 1,
                    ),

                    // Title
                    array (
                        'key' => 'field_5e9fd6cee601b',
                        'label' => esc_html__('Title', 'muiteer'),
                        'name' => 'muiteer_alert_tips_title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => '',
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => esc_html__('Please enter title...', 'muiteer'),
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),

                    // Content
                    array (
                        'key' => 'field_5e9fd70f8c6bb',
                        'label' => esc_html__('Content', 'muiteer'),
                        'name' => 'muiteer_alert_tips_content',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => '',
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
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/muiteer-alert-tips',
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

            acf_register_block_type(array(
                'name' => 'muiteer-alert-tips',
                'title' => esc_html__('Alert Tips', 'muiteer'),
                'description' => esc_html__('Display alert tips.', 'muiteer'),
                'render_template' => 'template-parts/blocks/alert-tips/alert-tips.php',
                'category' => 'muiteer-category',
                'icon' => 'info',
                'keywords' => array('alert', 'tips'),
                // 'post_types' => array('post', 'page'),
                'mode' => 'auto',
                'supports' => array(
                    'align' => false,
                    "mode" => false,
                ),
            ));
        // ********Alert tips end********
    }
    
    // Check if function exists and hook into setup.
    if( function_exists('acf_register_block_type') ) {
        add_action('acf/init', 'register_acf_block_types');
    }
?>