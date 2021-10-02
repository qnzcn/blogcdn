<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="applicable-device"content="pc">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include_once("inc/functions/seo.php"); ?>
		<?php wp_head();?>
		<link rel="stylesheet" href="//at.alicdn.com/t/font_2058388_36vl5p02zuu.css"/>
        <link rel="shortcut icon" href="<?php echo _aye('favicon'); ?>"/>
<?php echo _aye('head_js'); ?>

<?php echo _aye('head_css'); ?>
        
	</head>
	<body class="<?php echo($_COOKIE['night'] == '1' ? 'night' : ''); ?>">
		<div id="wmtu">
			<header id="header" class="navBar uk-flex uk-flex-middle uk-padding-small">
				<div class="uk-float-left">
					<a class="logo uk-display-block" href="<?php bloginfo('url'); ?>" target="_blank"><img class="uk-height-1-1" src="<?php echo _aye('head_logo'); ?>" alt=""/></a>
				</div>
			</header>
			<main class="uk-container uk-animation-slide-bottom-small">