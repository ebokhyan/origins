var $mobileSize = 768;

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
            $(this).parent().find('.individual_hint').show();
            $(this).parent().find('.standard_hint').hide();
        } else {
            $(this).parent().find('.individual_hint').hide();
            $(this).parent().find('.standard_hint').show();
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
    $('body').addClass('popup_opened');
    var popupName = '.' + $(this).data('popup');
    $(popupName).addClass('showed');
}

function closePopup() {
    $('body').removeClass('popup_opened');
    $('.popup_block').removeClass('showed');
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
	$('.popup_close').click(closePopup);
});

