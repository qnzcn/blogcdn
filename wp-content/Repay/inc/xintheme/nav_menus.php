<?php
// 注册菜单
register_nav_menus( array(
	'main' => __( '主菜单' ),
) );
// 强化菜单 调用代码
// 强化菜单 结构
class description_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args)
	{
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "", $depth ) : '';
 
		$class_names = $value = '';
 
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
 
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
 
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
		//$prepend = '<span>';
		//$append = '</span>';
		$description  = ! empty( $item->description ) ? esc_attr( $item->description ) : '';
 
		if($depth != 0)
		{
			$description = $append = $prepend = "";
		}
 
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= '</a>';
		$item_output .= $args->after;
		// seabye++
		if ( $item->description<=0 ) { 
		$item_output .= $description; 
		}else { 
		//$item_output .= $item->ID; 
		//print_r($item->object_id);
		//分类id
		//$item_output .= $item->object_id;
		$pcat = $item->object_id;
		//根据分类id获取最新文章
		//$description 为文章数量  也可以直接写死

		$item_output .= navpost($pcat,$description);
		}

		$item_output .= $args->link_after;
		// seabye++ end
		// $item_output .= $description.$args->link_after;
 
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
function navpost($cat,$numb){
	$subprepend = '<ul class="submenu-mega row align-items-start wz">';
	$subappend = '</ul>';
	$item_4 = '';
		$args = array( 
		  'cat'=>$cat,
		  'showposts'=>$numb,
		);
		$csposts = new WP_Query( $args );
		if ( $csposts->have_posts() ) : while ( $csposts->have_posts() ) :$csposts->the_post();		
		
		$item_4 .= '<li><a href="'.get_permalink().'"><div class="neori-mega-menu-img"><img src="'.get_template_directory_uri().'/timthumb.php?src='.xintheme_thumb2().'&w=300&h=200&zc=1" alt="'.get_the_title().'" width="300" height="200"></div><p>'.get_the_title().'</p></a></li>';
		
		endwhile;endif;wp_reset_postdata();
	return $subprepend .$item_4 .$subappend;
}
