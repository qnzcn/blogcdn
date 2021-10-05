<?php get_header();
$category_data = get_term_meta( $cat, '_custom_category_options', true );
$cat_name_show=$category_data['cat_name_show'];
include( 'template-parts/category/list-1.php' );
get_footer(); 