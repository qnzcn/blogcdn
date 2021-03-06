( function($) {



"use strict";



/*---------------------------------------------------------------
BACK ON TOP BUTTON
-----------------------------------------------------------------*/
$(function() {

	var offset = 300,
			offset_opacity = 200,
			scroll_top_duration = 700,
			$back_to_top = $('.buttontop-top');

	$(window).scroll(function(){

		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('buttontop-is-visible') : $back_to_top.removeClass('buttontop-is-visible buttontop-fade-out');

		if( $(this).scrollTop() > offset_opacity ) {
			$back_to_top.addClass('buttontop-fade-out');
		}

	});

	$back_to_top.on('click', function(event){

		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
			 }, scroll_top_duration
		);

	});

});



/*---------------------------------------------------------------
OFFCANVAS NAVIGATION
-----------------------------------------------------------------*/
$(function() {

	$('.offcanvas-menu-button').click(function() {

		$('.offcanvas-navigation').fadeToggle();

	});
	
	$('.offcanvas-close').click(function() {

		$('.offcanvas-navigation').fadeToggle();

	});

});
	

$(function() {

	$(".offcanvas-navigation .menu-item-has-children a").click(function(event){
	  event.stopPropagation();
	  location.href = this.href;
	 });

	$(".offcanvas-navigation .menu-item-has-children").click(function(){

		$(this).addClass("open");

		if($(".offcanvas-navigation .menu-item-has-children").hasClass("open")){
			$(this).children("ul").toggle();
		}

		return false;

	});

});



/*---------------------------------------------------------------
STICKY HEADER
-----------------------------------------------------------------*/
$(function() {

	$(window).scroll(function() {

		if($(this).scrollTop() > 100) {
			$('.sticky-header').addClass('available');
			$('.sidebar').addClass('scrolled');
		} else {
			$('.sticky-header').removeClass('available');
			$('.sidebar').removeClass('scrolled');
		}

	});
	
	$(window).scroll(function() {

		if($(this).scrollTop() > 70) {
			$('.offcanvas-menu-button').addClass('centered');
		} else {
			$('.offcanvas-menu-button').removeClass('centered');
		}

	});

	var scrollTimeOut = true,
			lastYPos = 0,
			yPos = 0,
			yPosDelta = 5,
			sidebar = $('.sidebar'),
			nav = $('.sticky-header'),
			navHeight = nav.outerHeight(),
			setNavClass = function() {

				scrollTimeOut = false;
				yPos = $(window).scrollTop();

				if(Math.abs(lastYPos - yPos) >= yPosDelta) {

					if (yPos > lastYPos && yPos > navHeight){
						nav.removeClass('shown');
						sidebar.removeClass('shifted');
					} else {
						nav.addClass('shown');
						sidebar.addClass('shifted');
			}

			lastYPos = yPos;

		  }

	};

		$(window).scroll(function(e){

			scrollTimeOut = true;

		});

		setInterval(function() {

		  if (scrollTimeOut) {
			  setNavClass();
		  }

		}, 250);

});

// Ajax??????
$(document).on('click', '.ajax_load', function(event) {
    event.preventDefault();
    var t      = $(this),
        action = t.data('action'),
        page   = t.data('page'),
        data   = t.data(),
        text   = t.text();

    t.text('?????????...');
    t.attr('disabled', true);

    $.ajax({
        url: site_url.ajax_url,
        type: 'POST',
        dataType: 'html',
        data: {action: action, data: data},
    })
    .done(function( data ) {
        if( data != 0 ){
            $('.'+action).append(data);
            t.data('page',page*1+1);
            t.text(text);
            t.attr('disabled', false);
        }else{
            t.text('????????????????????????');
        }

    })
    .fail(function() {
        alert('???????????????');
        t.attr('disabled', false);
    });
     
});
//


//ajax comments
function ajaxComt(){
    var commentform = '#commentform', // ?????? form??????id
    comment = 'comment', // ?????? textarea ???id ??????#
    commentlist = 'commentwrap',  // ?????? ????????????ul???ol???class????????????
    respond = '#respond',  // ?????? ????????????????????????????????????id??????
    //homeUrl = document.location.href.match(/http:\/\/([^\/]+)\//i)[0], // ??????????????????????????????????????????
    txt1 = '<div id="loading" class="text-info"><span class="comload"></span></div>',
    txt2 = '<div id="error">#</div>',
    txt3 = '"><div class="text-success"> <span class="sub-yes"></span>',
    edt1 = ' ???????????????????????????<a rel="nofollow" class="comment-reply-link" href="#edit" onclick=\'return addComment.moveForm("',
    edt2 = ')\'>??????????????????</a></div>',
    cancel_edit = '????????????',
    edit,
    num = 1,
    $comments = $('#response'), // ?????????
    $cancel = $('#cancel-comment-reply-link'),
    cancel_text = $cancel.text(),
    $submit = $('#commentform #submit');
    $submit.attr('disabled', false),
    $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body'),
    comm_array = [];
    comm_array.push('');
    $('#'+comment).after(txt1 + txt2); // ?????? textarea???id???class
    $('#loading').hide();
    $('#error').hide();
    // ????????????
$('#commentform').submit(  //??????????????????????????? $(document).on("submit", commentform,
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
                // ???????????????
                if (!edit && $comments.length) { 
                    n = parseInt($comments.text().match(/\d+/)); // ????????????
                    $comments.text($comments.text().replace(n, n + 1));
                }
                // ????????????
                new_htm = '" id="new_comm_' + num + '"></';
                new_htm = (parent == '0') ? ('\n<ol class="'+commentlist+'" ' +  new_htm + 'ol>') : ('\n<ul class="children' + new_htm + 'ul>');
                ok_htm = '\n<div class="ajax-notice" id="success_' + num + txt3;
                div_ = (document.body.innerHTML.indexOf('div-comment-') == -1) ? '': ((document.body.innerHTML.indexOf('li-comment-') == -1) ? 'div-': '');
                ok_htm = ok_htm.concat(edt1, div_, 'comment-', parent, '", "', parent, '", "respond", "', post, '", ', num, edt2);
                ok_htm += '</span><span></span>\n';
                ok_htm += '</div>\n';
                if($('.commentwrap')[0]){ // ?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
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






})(jQuery);
