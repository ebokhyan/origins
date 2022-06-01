var $mobileSize = 768;
var passwordConfirm = null;

function isTouchDevice() {
	return 'ontouchstart' in document.documentElement;
};

function detectDevice() {
	if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
		$('body').addClass('ios_device');
	};
	if(isTouchDevice()) {
		$('html').addClass('touch');
	} else {
		$('html').addClass('web');
	}
}

function closeAllMenues(evt) {
	detectDevice();

	$('.drop_btn').parent().removeClass('opened');
	$('.drop_block').slideUp(300);

	if($('.search_block').data('type') && $('.search_block').data('type') == 'close') {
		$('.header').removeClass('search_opened');
	}

	if(isTouchDevice() && window.innerWidth > $mobileSize) {
		$('.header .main_menu li').removeClass('opened');
		$('.header .submenu_list').fadeOut(300);
	}
}

function ignorBodyClick(evt){
	evt.stopPropagation();
}

function ignorMobileBodyClick(evt){
	if (window.innerWidth < 992) {
		evt.stopPropagation();
	}
}

function dropList(dropButton, dropList,dropItem,dropElement) {
    if(dropButton.parents(dropItem).hasClass('opened')) {
        dropButton.parents(dropItem).removeClass('opened').find(dropElement).slideUp(300);
    } else {
        dropButton.parents(dropList).find('.opened').removeClass('opened');
        dropButton.parents(dropList).find(dropElement).slideUp(300);
        dropButton.parents(dropItem).addClass('opened').find(dropElement).stop(true,true).slideDown(300);
        setTimeout(function(){
            if($(dropList).find('.opened').length > 0) {
                if(dropButton.parents(dropItem).offset().top < $(document).scrollTop()) {
                    $('body,html').animate({scrollTop:dropButton.parents(dropItem).offset().top},300);
                }
            }
        },300)
    }

};

function mobMenuTrigger(e){
	e.preventDefault();
	if ($('body').hasClass('menu_opened')) {
		$('body').removeClass('menu_opened');
	} else {
		$('.main_menu li').removeClass('opened');
		$('.submenu_list').hide();
		$('.menu_inner, body, html').animate({scrollTop: 0},0);
		$('body').addClass('menu_opened');
	}
}


function toggleSearch(evt) {
	if(!$('.header').hasClass('search_opened')) {
		evt.preventDefault();
		closeAllMenues(evt);
		evt.stopPropagation();
		$('.header').addClass('search_opened');
		$('.search_block input').focus();
	} else if(!$('.search_block input').val()) {
		$('.search_block input').focus();
		evt.preventDefault();
	} else {
		evt.stopPropagation();
	}
}

function focusEmptySearch(evt) {
	if(!$('.search_block input').val()) {
		evt.preventDefault();
		$('.search_block input').focus();
	}
}

function checkFields() {
    $('form input').change(function() {
        if ($(this).val().length > 0) {
            $(this).parent().next('.error_hint').find('.individual_hint').show();
            $(this).parent().next('.error_hint').find('.standard_hint').hide();
        } else {
            $(this).parent().next('.error_hint').find('.individual_hint').hide();
            $(this).parent().next('.error_hint').find('.standard_hint').show();
        }

        if($('.confirm_field').length > 0) {
            $('.confirm_field').on('keyup change',function(){
                if($(this).val() == $(this).parents('form').find('.password_field').val()) {
                    $(this).parent().removeClass('has-error');
                    passwordConfirm = true;
                }
            })
        }
    });
}

function checkPassConfirm() {
    var passValue = $('.confirm_field').parents('form').find('.password_field').val();
    var passConfirm = $('.confirm_field').val();
    if(passValue && passValue != passConfirm && $('.pass_fields').css('display') != "none") {
        $('.confirm_field').parent().addClass('has-error');
        passwordConfirm = null;
    } else {
        passwordConfirm = true;
    }
}

function checkForm(e) {
    var $button = $(this);
    if($button.parents('form').find('.confirm_field').length > 0) {
        checkPassConfirm();
    } else {
        passwordConfirm = true;
    }
    $.validate({
        scrollToTopOnError: false,
        onError: function() {
            if ($button.parents('form').hasClass('login_form') || $button.parents('form').hasClass('register_form')) {

                $('.has-error').each(function(){
                    var errorInputType = $(this).find('input').attr('type');
                    $('input[type="'+errorInputType+'"]').parents('.general_field').addClass('has-error');
                });
            };
        },
        onSuccess: function() {
            if(!passwordConfirm) {
                return false;
            }
        }

    });
    setTimeout(function(){
        if($button.hasClass('checkout_submit') && $('.has-error').length > 0) {
            $('body, html').animate({scrollTop: $('.has-error').eq(0).offset().top - $('.header').height()},1000);
        }
    },100)


};

function dropToggle(evt) {
	evt.preventDefault();
	if(!$(this).parent().hasClass('opened')) {
		closeAllMenues(evt);
		evt.stopPropagation();
		$(this).parent().addClass('opened').find('.drop_block').stop(true,true).slideDown(300);
	}
};

function comboHover($link,$block) {
	$link.hover(function(){
		$(this).parents($block).addClass('hovered');
	}, function(){
		$(this).parents($block).removeClass('hovered');
	})
}

function detectCallPosibillity() {
	if (/Android|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
	  	$('.phone_link').addClass('clickable');
	}
	$('.phone_link').click(function(e){
		if(!$(this).hasClass('clickable')) {
			e.preventDefault();
		}
	})
}

function openPopup(evt) {
    evt.preventDefault();
    const id = $(this).data('popup');
    const type = $(this).data('type');
    const token = $("input[name='_token']").val();
    $.ajax({
        method: "POST",
        url: "get-info",
        data: { _token: token, id: id, type: type }
    })
    .done(function( response) {
        if(response.error == undefined){
            $('body').addClass('popup_opened');
            $('#popup-content').html(response);
        }
    });
}

function closePopup() {
    $('body').removeClass('popup_opened');
	if($('.popup_block.showed').hasClass('subscribe_popup')) {
		document.cookie = "visited=true;path=/";
	};
    $('.popup_block').removeClass('showed');
    $('#popup-content').html('');
}



$(document).ready(function(){
	//detect device type
	detectDevice();
	detectCallPosibillity();

	//close dropdowns with outside click
	$('body').click(closeAllMenues);

	//opening/closing mobile menu
	$('.menu_btn').click(mobMenuTrigger);

	// form front validation
	if($('.validate_btn').length > 0) {
		checkFields();
		$('.validate_btn').click(checkForm);
	};

	//drop element open close
	$('.drop_btn').click(dropToggle);

	//hidden search open/close
	$('.search_block button[type="submit"]').click(function(evt){
		if($('.search_block').data('type') && $('.search_block').data('type') == 'close') {
			toggleSearch(evt);
		} else {
			focusEmptySearch(evt);
		}
	});

	$('.search_block input').click(function(evt){
		if($('.search_block').data('type') && $('.search_block').data('type') == 'close') {
			ignorBodyClick(evt);
		}
	})

	if($('.article_block').length > 0) {
		comboHover($('.article_block a'), '.article_block');
	}

	if($('.news_block').length > 0) {
		comboHover($('.news_block a'), '.news_block');
	}

	if($('.feature_block').length > 0) {
		comboHover($('.feature_block a'), '.feature_block');
	}

	if($('.member_article').length > 0) {
		comboHover($('.member_article a'), '.member_article');
	}

	if($('.guide_block').length > 0) {
		comboHover($('.guide_block a'), '.guide_block');
	}

	$('.inner_search button').click(function(e){
		if(!$(this).parent().find('input').val()) {
			e.preventDefault();
			$(this).parent().find('input').focus();
		}
	})

	$('.popup_btn').click(openPopup);
    $(document).on('click', '.popup_close',closePopup);

	if(!document.cookie.toString().includes('visited=true') && $('.subscribe_popup').length > 0) {
		setTimeout(function(){
			$('body').addClass('popup_opened');
			$('.popup_block').removeClass('showed');
			$('.subscribe_popup').addClass('showed');
		},$('.subscribe_popup').data('delay'));
	} else {
		$('.subscribe_popup').remove();
	}

    $('form[name="footerSubscriptionForm"]').submit(function (event) {
        event.preventDefault();
        setTimeout(()=>{
            if($("input[name='email']").hasClass('valid')) {
                const _token = $("input[name='_token']").val();
                const email = $("input[name='email']").val();
                $.ajax({
                    url: "/subscribe",
                    type: "POST",
                    data: {_token: _token, email: email},
                    success: function (response) {
                        $('#email_label').removeClass('has-error');
                        $("input[name='email']").remove('error').addClass('valid');
                        $(".error_hint").children('.individual_hint').text('');
                        if (response.success) {
                            $('form[name="footerSubscriptionForm"]').trigger("reset");
                            $('#success_msg').html(response.success);
                            setTimeout(() => {
                                $('#success_msg').html('');
                            },5000);
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest.responseJSON.errors);
                        var err = XMLHttpRequest.responseJSON.errors;
                        $(".error_hint").children('.individual_hint').text(err.email);
                        $('#email_label').addClass('has-error');
                        $("input[name='email']").removeClass('valid').addClass('error');
                    }
                })
            }
        },200);
    })
    $('form[name="innerSubscriptionForm"]').submit(function (event) {
        event.preventDefault();
        setTimeout(()=>{
            if($("input[name='inner_subscribe_email']").hasClass('valid')) {
                const _token = $("input[name='_token']").val();
                const email = $("input[name='inner_subscribe_email']").val();
                $.ajax({
                    url: "/subscribe",
                    type: "POST",
                    data: {_token: _token, email: email},
                    success: function (response) {
                        $('#inner_email_label').removeClass('has-error');
                        $("input[name='inner_subscribe_email']").remove('error').addClass('valid');
                        if (response.success) {
                            $('form[name="innerSubscriptionForm"]').trigger("reset");
                            $('#inner_success_msg').html(response.success);
                            setTimeout(() => {
                                $('#inner_success_msg').html('');
                            },8000);
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        // console.log(XMLHttpRequest.responseJSON.errors);
                        $('#inner_email_label').addClass('has-error');
                        $("input[name='inner_subscribe_email']").removeClass('valid').addClass('error');
                    }
                })
            }
        },200);
    })

    $('form[name="sendContact"]').submit(function (event) {
        event.preventDefault();
        setTimeout(()=>{
            const _token = $("input[name='_token']");
            const name = $("input[name='name']");
            const email = $("input[name='user_email']");
            const subject = $("input[name='subject']");
            const message = $("textarea[name='message']");
            if(name.hasClass('valid')
                && email.hasClass('valid')
                && subject.hasClass('valid')
                && message.hasClass('valid'))
            {
                $.ajax({
                    url: "/send-contact",
                    type: "POST",
                    data: {_token: _token.val(), email: email.val(), name: name.val(), subject: subject.val(), message: message.val()},
                    beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                        $('#sendContactBtn').addClass('loading')
                    },
                    success: function (response) {
                        $('#name_lb').removeClass('has-error');
                        $('#user_email_lb').removeClass('has-error');
                        $('#subject_lb').removeClass('has-error');
                        $('#message_lb').removeClass('has-error');
                        $("input[name='name']").remove('error').addClass('valid');
                        $("input[name='user_email']").remove('error').addClass('valid');
                        $("input[name='subject']").remove('error').addClass('valid');
                        $("textarea[name='message']").remove('error').addClass('valid');
                        if (response.success) {
                            $('form[name="sendContact"]').trigger("reset");
                            $('#success_msg').html(response.success);
                            setTimeout(() => {
                                $('#success_msg').html('');
                            },5000);
                        }else{
                            if (response.error) {
                                $('#success_msg').addClass("error-msg").html(response.error);
                                setTimeout(() => {
                                    $('#success_msg').html('').removeClass("error-msg");
                                },5000);
                            }
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        // console.log(XMLHttpRequest.responseJSON.errors);
                    },
                    complete: function () { // Set our complete callback, adding the .hidden class and hiding the spinner.
                        $('#sendContactBtn').removeClass('loading')
                    },
                })
            }
        },200);
    })

    // --------------------------------------------------------------------------------
    // pagination
    //--------------------------------------------------------------------------------
    var $search_results = $(".search_listing");
    var $ul = $("ul.pagination");

    $ul.hide(); // Prevent the default Laravel paginator from showing, but we need the links...
    $(document).on('click','#loadBtn',function(){
        var search =  $("#search").val();
        console.log(search);
        var url = $(this).attr('data-load-url');
        if(search){
            url = url + '&search='+search;
            console.log(url);
        }
        $.get(url, function(response) {
            $('#loadBtn').remove();
            $search_results.append(response);
        });
    })
});

