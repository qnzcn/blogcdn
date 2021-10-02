$(document).ready(function(){
	
	//添加灯箱
	$('.wp-block-gallery').attr( 'uk-lightbox' ,'animation: fade' );
	$('.wp-block-image').attr( 'uk-lightbox' ,'animation: fade' );
	
	$('.singleWarp img').parents('p').attr( 'uk-lightbox' ,'animation: fade' );
    
    //顶部导航添加样式
	$('.nav>ul>li .sub-menu').addClass('uk-animation-slide-left-small');
	
	//返回顶部
    $(window).scroll(function() {
        var scroll_top = $(window).scrollTop();
        if (scroll_top >= 200) {
            $(".gotop").fadeIn();
        } else {
            $(".gotop").fadeOut();
        }
    })
    
	//天气卡片
	var weather = 'http://tianqiapi.com/api';
	$.ajax({
		type: "GET",
		url: weather,
		data: {
			appid: '58848727',
			appsecret: 'W8tVhX1B',
			version: 'v6',
		},
		dataType: "json",
		success: function(data) {
			var wea_bg = '<img src="http://www.nuandao.cn/images/ndnav/'+ data.wea_img + '.jpg" />'
			$('.wea_img').append(wea_bg)
			$('.wea_city span').html(data.city)
			$('.wea_tem').html(data.tem)
			$('.wea_other .date').append(data.date)
			$('.wea_other .week').append(data.week)
			$('.wea_other .wea').append(data.wea)
			$('.wea_other .win').append(data.win)
			$('.wea_other .win_speed').append(data.win_speed)
			//console.log(data)
		}
	});

    //夜间模式
    if(document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") === ''){
    	if(new Date().getHours() > 22 || new Date().getHours() < 6){
    		document.body.classList.add('night');
    		document.cookie = "night=1;path=/";
    		//console.log('夜间模式开启');
    	}else{
    		document.body.classList.remove('night');
    		document.cookie = "night=0;path=/";
    		//console.log('夜间模式关闭');
    	}
    }else{
    	var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
    	if(night == '0'){
    		document.body.classList.remove('night');
    	}else if(night == '1'){
    		document.body.classList.add('night');
    	}
    }
    
    $('.gotop .night').click(function(){
    	if ($(this).is(".night")) {
    		$(this).removeClass('night');
    		$(this).html('<i class="iconfont icon-Daytimemode-fill"></i>');
    	} else{
    		$(this).addClass('night');
    		$(this).html('<i class="iconfont icon-nightmode-fill"></i>');
    	}
    
    })
    
    //点击加载更多
	$('#pagination a').click(function() {
		$this = $(this);
		$this.addClass('loading').text("正在努力加载..."); //给a标签加载一个loading的class属性，可以用来添加一些加载效果
		var href = $this.attr("href"); //获取下一页的链接地址
		if (href != undefined) { //如果地址存在
			$.ajax({ //发起ajax请求
				url: href, //请求的地址就是下一页的链接
				type: "get", //请求类型是get
				error: function(request) {
					//如果发生错误怎么处理
				},
				success: function(data) { //请求成功
					setTimeout(function(){
						$this.removeClass('loading').text("点击查看更多"); //移除loading属性
						var $res = $(data).find(".ajaxItem"); //从数据中挑出文章数据，请根据实际情况更改
						$('.ajaxMain').append($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。
						var newhref = $(data).find("#pagination a").attr("href"); //找出新的下一页链接
						if (newhref != undefined) {
							$("#pagination a").attr("href", newhref);
						} else {
							$("#pagination").html('我是有底线的！'); //如果没有下一页了，隐藏
						}
					},500);
				}
			});
		}
		return false;
	});
	
	
	console.log('\n' + ' %c Theme Designed by 阿叶 %c www.nuandao.cn ' + '\n', 'color: #fff; background: #00d495; padding:5px 0; font-size:12px;', 'padding:5px 0; font-size:12px;');

});

//夜间模式切换
function switchNightMode(){
	var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
	if(night == '0'){
		document.body.classList.add('night');
		document.cookie = "night=1;path=/"
		//console.log('夜间模式开启');
	}else{
		document.body.classList.remove('night');
		document.cookie = "night=0;path=/"
		//console.log('夜间模式关闭');
	}
}
