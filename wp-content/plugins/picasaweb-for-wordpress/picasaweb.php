<?php
/*
Plugin Name: PicasaWeb for WordPress
Plugin URI: http://immmmm.com/picasaweb-for-wordpress.html
Description: Easy to insert in the pages / posts PicasaWeb Albums.Based on jQuery.  方便在文章或页面中插入Picasa网络相册。基于jQuery。
Version: 1.0.3
Author: 林木木
Author URI: http://immmmm.com
*/
add_action('admin_menu', 'picasaweb_page');
function picasaweb_page (){
	if ( count($_POST) > 0 && isset($_POST['picasaweb_settings']) ){
		$options = array ('1','2','3');
		foreach ( $options as $opt ){
			delete_option ( 'picasaweb_'.$opt, $_POST[$opt] );
			add_option ( 'picasaweb_'.$opt, $_POST[$opt] );	
		}
	}
	add_options_page('PicasaWeb', 'PicasaWeb', 8, basename(__FILE__), 'picasaweb_settings');
}

function picasaweb_settings() {?>
<style>
	.wrap,.wrap h2,em{font-family:'Century Gothic','Microsoft YaHei',Verdana;}
	.wrap{margin:0 auto;width:550px;}
	fieldset{border:1px solid #aaa;padding-bottom:20px;margin-top:10px;-webkit-box-shadow:rgba(0,0,0,.2) 0px 0px 5px;-moz-box-shadow:rgba(0,0,0,.2) 0px 0px 5px;box-shadow:rgba(0,0,0,.2) 0px 0px 5px;}
	legend{margin-left:5px;padding:0 5px;color:#2481C6;background:#F9F9F9;font-size:21px;}
	.form-table th{width:248px;}
	.form-table input{width:181px;}
	input[type="text"]{font-size:11px;border:1px solid #aaa;background:none;-moz-box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;-webkit-transition:all .4s ease-out;-moz-transition:all .4s ease-out;}
	input:focus{-moz-box-shadow:rgba(0,0,0,.2) 0px 0px 8px;box-shadow:rgba(0,0,0,.2) 0px 0px 8px;outline:none;}
</style>
<div class="wrap">
<h2>PicasaWeb for WordPress</h2>
<form method="post" action="">
<fieldset>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="1">Google用户名 / Google Username：</label></th>
				<td>
					<input name="1" type="text" id="1" value="<?php echo get_option('picasaweb_1');?>" /><em>@gmail.com</em>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="2">相册最大宽度 / Album Maximum Width：</label></th>
				<td>
					<input name="2" type="text" id="2" value="<?php echo get_option('picasaweb_2');?>" /><em>px</em>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="3">加载jQuery库 / Add JQuery Library：</label></th>
				<td>
					<input name="3" type="checkbox" id="3" value="1" <?php if (get_option('picasaweb_3')!='') echo 'checked="checked"'; ?>/>Google CDN
				</td>
			</tr>
		</table>
	</fieldset>

	<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="保存设置 / Save Settings" />
		<input type="hidden" name="picasaweb_settings" value="save" style="display:none;" />
	</p>

</form>
</div>
<?php
}

function picasaweb_foot(){
	if(get_option('picasaweb_3')!=''){$picasaweb_3= '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>';}
	echo '<link rel="stylesheet" href="' .WP_PLUGIN_URL.'/picasaweb-for-wordpress/picasaweb.css" type="text/css" />'.$picasaweb_3.'<script type="text/javascript" src="'.WP_PLUGIN_URL.'/picasaweb-for-wordpress/picasaweb.js"></script>';
}
add_action('wp_footer', 'picasaweb_foot');


function picasaweb($atts, $content=null){
	return '<div id='.$content.' class="picasaweb" name="'.get_option('picasaweb_1').'" wid="'.get_option('picasaweb_2').'"><div class="navi-l"></div><div class="items" style="width:'.get_option('picasaweb_2').'px"></div><div class="navi-r"></div></div>';
}
add_shortcode('picasaweb','picasaweb');

?>