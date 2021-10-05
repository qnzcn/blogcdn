<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// TAXONOMY OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options     = array();

// -----------------------------------------
// Taxonomy Options                        -
// -----------------------------------------
$options[]   = array(
  'id'       => '_custom_category_options',
  'taxonomy' => 'category', // category, post_tag or your custom taxonomy name
  'fields'   => array(
		
		array(
    		'id'      => 'cat_name_show',
    		'type'    => 'switcher',
    		'title'   => '分类名称显示',
    		'help'    => '开启后将显示当前分类名称。',
    		'default' => true,
    	),

  ),
);

$options[]   = array(
  'id'       => '_custom_taxonomy_options',
  'taxonomy' => 'post_tag', // category, post_tag or your custom taxonomy name
  'fields'   => array(

    array(
      'id'    => 'section_1_text',
      'type'  => 'text',
      'title' => 'Text Field',
    ),

  ),
);

CSFramework_Taxonomy::instance( $options );
