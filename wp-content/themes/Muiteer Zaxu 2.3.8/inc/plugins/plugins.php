<?php
	require_once get_template_directory() . '/inc/plugins/class-tgm-plugin-activation.php';

	add_action('tgmpa_register', 'muiteer_register_required_plugins');
	function muiteer_register_required_plugins() {
		$plugins = array(
			// Advanced Custom Fields Pro
			array(
				'name'               => esc_html__('Advanced Custom Fields Pro', 'muiteer'),
				'slug'               => 'advanced-custom-fields-pro',
				'source'             => get_template_directory() . '/inc/plugins/advanced-custom-fields-pro.zip', 
				'required'           => true, 
				'version'            => '', 
				'force_activation'   => true, 
				'force_deactivation' => false, 
				'external_url'       => '',
				'is_callable'        => '',
			),
			// WooCommerce
			// array(
			// 	'name'               => esc_html__('WooCommerce', 'muiteer'),
			// 	'slug'               => 'woocommerce',
			// ),
		);
		$config = array(
			'id'           => 'muiteer',                 
			'default_path' => '',                      
			'menu'         => 'tgmpa-install-plugins', 
			'has_notices'  => true,                  
			'dismissable'  => true,                    
			'dismiss_msg'  => '',                     
			'is_automatic' => false,                   
			'message'      => '',
		);
		tgmpa($plugins, $config);
	};
