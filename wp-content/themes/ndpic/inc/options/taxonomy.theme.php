<?php if (! defined('ABSPATH')) {
	die;
}
if( class_exists( 'CSF' ) ) {
  $prefix = 'my_taxonomy_options';
  CSF::createTaxonomyOptions( $prefix, array(
    'taxonomy'  => 'category',
    'data_type' => 'unserialize', // The type of the database save options. `serialize` or `unserialize`
  ) );
  CSF::createSection( $prefix, array(
    'fields' => array(
      array(
      'id'         => 'cat_style',
      'type'       => 'button_set',
      'title'      => '分类模板',
      'options'    => array(
        '1'  => '文字样式',
        '2' => '图集样式',
        '3' => '瀑布流样式',
      ),
      'default'    => '2'
    ),

    )
  ) );

}