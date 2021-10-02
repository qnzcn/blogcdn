<?php

/**
 * @Author: 阿叶
 * @Email:  1098816988@qq.com
 * @Link:   www.nuandao.cn
 * @Date:   2020-07-20 10:10:10
 */
 
if ( ! function_exists( '_aye' ) ) {
  function _aye( $option = '', $default = null ) {
    $options = get_option( 'aye' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}

include(TEMPLATEPATH . '/inc/functions.php');
