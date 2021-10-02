<?php


/*
* ------------------------------------------------------------------------------
* 加载后台框架
* ------------------------------------------------------------------------------
*/
include(TEMPLATEPATH . '/inc/codestar-framework/codestar-framework.php');
include(TEMPLATEPATH . '/inc/options/options.theme.php');
include(TEMPLATEPATH . '/inc/options/taxonomy.theme.php');


/*
* ------------------------------------------------------------------------------
* 加载主题功能
* ------------------------------------------------------------------------------
*/
include TEMPLATEPATH.'/inc/functions/enqueue.php';
include TEMPLATEPATH.'/inc/functions/optimization.php';
include TEMPLATEPATH.'/inc/functions/article.php';
include TEMPLATEPATH.'/inc/functions/category.php';
include TEMPLATEPATH.'/inc/functions/user.php';
include TEMPLATEPATH.'/inc/functions/other.php';
include TEMPLATEPATH.'/inc/avatar/simple-local-avatars.php';