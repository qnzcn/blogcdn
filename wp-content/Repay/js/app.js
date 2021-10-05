
App = {
  mouseEvent:function() { 

	//ajax实时头像
	 $("input#email").blur(function() { // 输入框焦点
        var _email = $(this).val();
            $.ajax({
                type: "GET",
                data: {
                    action: 'ajax_avatar_get',  
                    form: Theme.ajaxurl,  // 主题的AJAX路径
                    email: _email
                },
                success: function(data) {
                    $('.v-avatar').attr('src', data); // 替换头像链接到img标签
                }
            }); // end ajax

        });
		
	//灯箱
	baguetteBox.run('.entry-content', {
        captions: function(element) {
            // `this` == Array of current gallery items
            return element.getElementsByTagName('img')[0].alt;
        }
    });	
	
  //结束
  },
  
  //back to top
gotop:function() { 
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 100,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});
	
		//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
  },

// 评论分页
commentsPaging:function() {
 $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
    $(document).on('click', '#comments-navi a',
    function(e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: $(this).attr('href'),
            beforeSend: function() {
                $('#comments-navi').remove();
                $('ul.commentwrap').remove();
                $('#loading-comments').slideDown()
            },
            dataType: "html",
            success: function(out) {
                result = $(out).find('ul.commentwrap');
                nextlink = $(out).find('#comments-navi');
                $('#loading-comments').slideUp(550);
                $('#loading-comments').after(result.fadeIn(800));
                $('ul.commentwrap').after(nextlink)
            }
        })
    });
},

skipper:function() { 
$(".slider-container").ikSlider({
		  speed: 500 ,
          controls: true,
		});
},

}

//ajax comments
function ajaxComt(){
    var commentform = '#commentform', // ××× form表单id
    comment = 'comment', // ××× textarea 的id 不带#
    commentlist = 'commentwrap',  // ××× 评论列表ul或ol的class，不带点
    respond = '#respond',  // ××× 评论插入位置，插入在这个id之前
    //homeUrl = document.location.href.match(/http:\/\/([^\/]+)\//i)[0], // 主页地址，用于下面的提交函数
    txt1 = '<div id="loading" class="text-info"><span class="comload"></span></div>',
    txt2 = '<div id="error">#</div>',
    txt3 = '"><div class="text-success"> <span class="sub-yes"></span>',
    edt1 = ' 刷新页面之前您可以<a rel="nofollow" class="comment-reply-link" href="#edit" onclick=\'return addComment.moveForm("',
    edt2 = ')\'>再次编辑评论</a></div>',
    cancel_edit = '取消编辑',
    edit,
    num = 1,
    $comments = $('#response'), // 评论数
    $cancel = $('#cancel-comment-reply-link'),
    cancel_text = $cancel.text(),
    $submit = $('#commentform #submit');
    $submit.attr('disabled', false),
    $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body'),
    comm_array = [];
    comm_array.push('');
    $('#'+comment).after(txt1 + txt2); // ××× textarea的id或class
    $('#loading').hide();
    $('#error').hide();
    // 评论提交
$('#commentform').submit(  //原版为动态绑定，即 $(document).on("submit", commentform,
    function() {
        if (edit) $('#'+comment).after('<input type="text" name="edit_id" id="edit_id" value="' + edit + '" style="display:none;" />');
        $submit.attr('disabled', true).fadeTo('slow', 0.5);
        $('#loading').slideDown();
        $.ajax({
            url: Theme.ajaxurl,
            data: $(this).serialize() + "&action=ajax_comment_post",
            type: $(this).attr('method'),
            error: function(request) {
                $('#loading').slideUp();
                $("#error").slideDown().html('<span class="sub-no"></span>' +request.responseText);
                setTimeout(function() {
                    $submit.attr('disabled', false).fadeTo('slow', 1);
                    $('#error').slideUp();
                },
                3000);
            },
            success: function(data) {
                $('#loading').hide();
                comm_array.push($('#'+comment).val());
                $('textarea').each(function() {
                    this.value = ''
                });
                var t = addComment,
                cancel = t.I('cancel-comment-reply-link'),
                temp = t.I('wp-temp-form-div'),
                respond = t.I(t.respondId),
                post = t.I('comment_post_ID').value,
                parent = t.I('comment_parent').value;
                // 增加评论数
                if (!edit && $comments.length) { 
                    n = parseInt($comments.text().match(/\d+/)); // 匹配数字
                    $comments.text($comments.text().replace(n, n + 1));
                }
                // 评论显示
                new_htm = '" id="new_comm_' + num + '"></';
                new_htm = (parent == '0') ? ('\n<ol class="'+commentlist+'" ' +  new_htm + 'ol>') : ('\n<ul class="children' + new_htm + 'ul>');
                ok_htm = '\n<div class="ajax-notice" id="success_' + num + txt3;
                div_ = (document.body.innerHTML.indexOf('div-comment-') == -1) ? '': ((document.body.innerHTML.indexOf('li-comment-') == -1) ? 'div-': '');
                ok_htm = ok_htm.concat(edt1, div_, 'comment-', parent, '", "', parent, '", "respond", "', post, '", ', num, edt2);
                ok_htm += '</span><span></span>\n';
                ok_htm += '</div>\n';
                if($('.commentwrap')[0]){ // ××××××××××××××××××××非嵌套评论时，新评论显示插入的位置（按自己的喜好修改显示位置）
                    $('.commentlist').append('<ul class="commentwrap"></ul>');
                    $('.commentwrap').prepend(new_htm);
                } else {
                    $('#respond').after(new_htm);
                }
                $('#new_comm_' + num).append(data);
                $('#new_comm_' + num + ' li').append(ok_htm);
                $body.animate({scrollTop: $('#new_comm_' + num).offset().top - 200},900);
                countdown();
                num++;
                edit = '';
                $('*').remove('#edit_id');
                cancel.style.display = 'none';
                cancel.onclick = null;
                t.I('comment_parent').value = '0';
                if (temp && respond) {
                    temp.parentNode.insertBefore(respond, temp);
                    temp.parentNode.removeChild(temp)
                }
            }
        });
        return false;
    });
    addComment = {
        moveForm: function(commId, parentId, respondId, postId, num) {
            var t = this,
            div,
            comm = t.I(commId),
            respond = t.I(respondId),
            cancel = t.I('cancel-comment-reply-link'),
            parent = t.I('comment_parent'),
            post = t.I('comment_post_ID');
            if (edit) exit_prev_edit();
            num ? (t.I(comment).value = comm_array[num], edit = t.I('new_comm_' + num).innerHTML.match(/(comment-)(\d+)/)[2], $new_sucs = $('#success_' + num), $new_sucs.hide(), $new_comm = $('#new_comm_' + num), $new_comm.hide(), $cancel.text(cancel_edit)) : $cancel.text(cancel_text);
            t.respondId = respondId;
            postId = postId || false;
            if (!t.I('wp-temp-form-div')) {
                div = document.createElement('div');
                div.id = 'wp-temp-form-div';
                div.style.display = 'none';
                respond.parentNode.insertBefore(div, respond)
            } ! comm ? (temp = t.I('wp-temp-form-div'), t.I('comment_parent').value = '0', temp.parentNode.insertBefore(respond, temp), temp.parentNode.removeChild(temp)) : comm.parentNode.insertBefore(respond, comm.nextSibling);
            $body.animate({scrollTop: $('#respond').offset().top - 180},400);
            if (post && postId) post.value = postId;
            parent.value = parentId;
            cancel.style.display = '';
            cancel.onclick = function() {
                if (edit) exit_prev_edit();
                var t = addComment,
                temp = t.I('wp-temp-form-div'),
                respond = t.I(t.respondId);
                t.I('comment_parent').value = '0';
                if (temp && respond) {
                    temp.parentNode.insertBefore(respond, temp);
                    temp.parentNode.removeChild(temp);
                }
                this.style.display = 'none';
                this.onclick = null;
                return false;
            };
            try {
                t.I(comment).focus();
            }
             catch(e) {}
            return false;
        },
        I: function(e) {
            return document.getElementById(e);
        }
    };
    function exit_prev_edit() {
        $new_comm.show();
        $new_sucs.show();
        $('textarea').each(function() {
            this.value = ''
        });
        edit = '';
    }
    var wait = 15,
    submit_val = $submit.val();
    function countdown() {
        if (wait > 0) {
            $submit.val(wait);
            wait--;
            setTimeout(countdown, 1000);
        } else {
            $submit.val(submit_val).attr('disabled', false).fadeTo('slow', 1);
            wait = 15;
        }
    }
} 
App.mouseEvent();
ajaxComt(); 
App.commentsPaging();

