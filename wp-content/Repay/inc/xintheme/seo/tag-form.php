<?php 
$title='tag_page_title';
$key='tag_keywords';
$des='tag_description';
$metas='tag_metas';
$val=get_option('tag_meta_key_'.$_GET['tag_ID']);

?>
<h2>标签目录SEO设置</h2>
<table class="form-table">
	<tbody>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo $title ?>">自定义标题</label></th>
			<td><input name="<?php echo $title ?>" id="<?php echo $title ?>" type="text" value="<?php echo esc_attr(stripslashes($val['page_title'])); ?>" size="40"></td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo $key; ?>">设置关键词</label></th>
			<td><input name="<?php echo $key; ?>" id="<?php echo $key; ?>" type="text" value="<?php echo $val['metakey']; ?>" size="40"></td>
		</tr>		
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo $des; ?>">自定义描述</label></th>
			<td><textarea name="<?php echo $des; ?>" id="<?php echo $des; ?>" rows="5" cols="50"><?php echo stripslashes($val['description']); ?></textarea></td>
		</tr>	
	</tbody>
</table>