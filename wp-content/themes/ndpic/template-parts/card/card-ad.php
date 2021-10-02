<?php 
$side_ad = _aye('side_ad');
if ($side_ad) { 
	foreach ( $side_ad as $key => $value) { 
?>
<div class="shadow uk-margin-bottom">
	<div class="b-r-4 uk-height-1-1 uk-flex-middle uk-background-default uk-overflow-hidden">
        <a href="<?php echo $value['side_ad_link']; ?>" target="_blank" class="uk-display-block uk-text-center"><img src="<?php echo $value['side_ad_img']; ?>" /></a>
    </div>
</div>
<?php } }?>