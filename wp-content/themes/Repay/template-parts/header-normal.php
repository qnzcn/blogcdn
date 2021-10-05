<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php if( xintheme_img('favicon','') ) { ?>
<link rel="shortcut icon" href="<?php echo xintheme_img('favicon','');?>"/>
<?php }else{ ?>
<link rel="shortcut icon" href="<?php bloginfo('template_url');?>/images/favicon.ico"/>
<?php }?>
<?php wp_head(); ?>
<?php echo xintheme('head_code');?>
</head>
<body>
<div>
	<!-- 悬浮导航 -->
	<div class="sticky-header align-items-center">
		<div class="container">
			<div class="sticky-logo">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php echo xintheme_img('logo','');?>" alt="<?php bloginfo('name'); ?>"></a>
			</div>
			<nav class="main-navigation sticky">
			<div class="menu-menu1-container">
				<ul id="menu-menu1" class="menu">
					<?php if(function_exists('wp_nav_menu')) wp_nav_menu( array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'main', 'walker' => new description_walker ) ); ?>
				</ul>
			</div>
			</nav>
			<?php if( xintheme('footer_search') ) : ?>
			<form id="navbarsearchform" class="navbarsearchform" role="search" action="<?php bloginfo('url'); ?>" method="get">
				<input type="search" name="s" value="">
			</form>
			<?php endif; ?>
		</div>
	</div>
	<!-- 悬浮导航 结束 -->
	<div class="container">
		<header>
		<div class="header-upper" style="height: <?php echo xintheme('logo_height');?>px">
			<div class="logo" style="background-image: url('<?php echo xintheme_img('logo','');?>'); width: <?php echo xintheme('logo_width');?>px; height: <?php echo xintheme('logo_height');?>px;">
				<a href="<?php bloginfo('url'); ?>">
				<h1><?php bloginfo('name'); ?></h1>
				</a>
			</div>
			<div class="logo-right" style="height: <?php echo xintheme('logo_height');?>px">
				<div class="social-icons">
					<?php 
					$footer_qq_url = xintheme('footer_qq_url');
					if( xintheme('footer_qq') ) : ?>
					<a rel="nofollow" target="_blank" href="<?php echo $footer_qq_url; ?>"><i class="fa fa-qq"></i></a>
					<?php endif; ?>
					<?php if( xintheme('footer_weixin') ) : ?>
					<a href="#" class="wechat"><i class="fa fa-wechat"></i><div class="wechatimg"><img src="<?php echo xintheme_img('footer_weixin_img','');?>"></div></a>
					<?php endif; ?>
					<?php 
					$footer_mail_url = xintheme('footer_mail_url');
					if( xintheme('footer_mail') ) : ?>
					<a rel="nofollow" target="_blank" href="mailto:<?php echo $footer_mail_url; ?>"><i class="fa fa-envelope"></i></a>
					<?php endif; ?>
					<?php 
					$footer_weibo_url = xintheme('footer_weibo_url');
					if( xintheme('footer_weibo') ) : ?>
					<a rel="nofollow" target="_blank" href="<?php echo $footer_weibo_url; ?>"><i class="fa fa-weibo"></i></a>
					<?php endif; ?>
					<?php if( xintheme('footer_search') ) : ?>
					<form id="navbarsearchform" class="navbarsearchform" role="search" action="<?php bloginfo('url'); ?>" method="get">
						<input type="search" name="s" value="">
					</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="header-lower">
			<nav class="main-navigation">
			<div class="menu-menu1-container">
				<ul class="menu">
					<?php if(function_exists('wp_nav_menu')) wp_nav_menu( array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'main', 'walker' => new description_walker ) ); ?>
				</ul>
			</div>
			</nav>
			<div class="offcanvas-navigation">
				<i class="fa fa-close offcanvas-close"></i>
				<div class="social-icons">
					<?php 
					$footer_qq_url = xintheme('footer_qq_url');
					if( xintheme('footer_qq') ) : ?>
					<a rel="nofollow" target="_blank" href="<?php echo $footer_qq_url; ?>"><i class="fa fa-qq"></i></a>
					<?php endif; ?>
					<?php if( xintheme('footer_weixin') ) : ?>
					<a href="#" class="wechat"><i class="fa fa-wechat"></i><div class="wechatimg"><img src="<?php echo xintheme_img('footer_weixin_img','');?>"></div></a>
					<?php endif; ?>
					<?php 
					$footer_mail_url = xintheme('footer_mail_url');
					if( xintheme('footer_mail') ) : ?>
					<a rel="nofollow" target="_blank" href="mailto:<?php echo $footer_mail_url; ?>"><i class="fa fa-envelope"></i></a>
					<?php endif; ?>
					<?php 
					$footer_weibo_url = xintheme('footer_weibo_url');
					if( xintheme('footer_weibo') ) : ?>
					<a rel="nofollow" target="_blank" href="<?php echo $footer_weibo_url; ?>"><i class="fa fa-weibo"></i></a>
					<?php endif; ?>
					<?php if( xintheme('footer_search') ) : ?>
					<form id="navbarsearchform" class="navbarsearchform" role="search" action="<?php bloginfo('url'); ?>" method="get">
						<input type="search" name="s" value="">
					</form>
					<?php endif; ?>
				</div>
				<div class="menu-menu1-container">
					<ul class="menu">
						<?php if(function_exists('wp_nav_menu')) wp_nav_menu(array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'main')); ?>
					</ul>
				</div>
			</div>
		</div>
		</header>
	</div>
	<div class="offcanvas-menu-button"><i class="fa fa-bars"></i></div>