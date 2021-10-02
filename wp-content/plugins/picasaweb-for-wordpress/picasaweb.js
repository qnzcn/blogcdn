jQuery(document).ready(function($){
//By ImMmMm.com
$(".picasaweb").each(function(){
	var id=$(this).attr('id'),name=$(this).attr('name'),wid=$(this).attr('wid'),ids="#"+id+" .items";
	$.getJSON("https://picasaweb.google.com/data/feed/api/user/"+name+"/album/"+id+"?fields=gphoto:numphotos,entry(media:group(media:content,media:description))&imgmax="+wid+"&alt=json&callback=?",function(json){
		var nums=json.feed.gphoto$numphotos.$t;
		$(json.feed.entry).each(function(i,data){
			var d=data.media$group,url=d.media$content[0].url,width=d.media$content[0].width,des=d.media$description.$t,num=i+1;
			$(ids).append("<div class='itemp' style='width:"+width+"px'><img src='"+url+"'/><p class='itempp'><span class='ptitle'>"+des+"</span><span class='pnum'><span class='num'>"+num+"</span> / <span class='nums'>"+nums+"</span></span></p></div>");
		});
		$(ids).find(".itemp:first").fadeIn(300);
	});
});

$(".navi-r").click(function(){
	var item=$(this).prev('.items'),num=parseInt(item.find(':visible .num').text()),nums=parseInt(item.find('.nums:first').text());
	if(num < nums){
		item.children('.itemp').hide().eq(num).fadeIn(400);
	}
	return false
});

$(".navi-l").click(function(){
	var item=$(this).next('.items'),num=parseInt(item.find(':visible .num').text())
	if(num > 1 ){
		item.children('.itemp').hide().eq(num-2).fadeIn(400);
	}
	return false
});

});

