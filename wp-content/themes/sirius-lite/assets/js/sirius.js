var _LastSC = _CurrentSC = 0;
var ToggleInterval = false;
jQuery(document).ready(function($){
    
	$('.header-row-1-toggle').click(function(){
		if($('.header-row-1').hasClass('open')){
			$('.header-row-1').removeClass('open');
			$(this).removeClass('open');
			if(hasTransitionSupport()){
				ToggleInterval = setInterval(function(){sirius_scrollEvent()},50);
				$('.header-row-1').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
					clearInterval(ToggleInterval);
					sirius_scrollEvent();
				});
			}else sirius_scrollEvent();
		}else{
			$('.header-row-1').addClass('open');
			$(this).addClass('open');
			setTimeout(function(){sirius_scrollEvent()},100);
		}
		return false;
	});
	sirius_scrollEvent();
	$(window).resize(function(){sirius_scrollEvent();});
	$(window).scroll(function(){sirius_scrollEvent();});
	$('.btn,.section-circle-arrow,.entry-more a,.entry-thumb,.project-image a').on("mousedown touchstart",function(e){
		sirius_rippleEffect($(this),e);
	});
	$('select').selectpicker();
	$('.label-floating .form-label').click(function(){
		$(this).parent().find('.form-control-line').focus();
	});
	$('.label-floating .form-control-line').focus(function(){
		$(this).parents('.label-floating').addClass('focus');
	}).blur(function(){
		if($(this).val()!='') $(this).parents('.label-floating').addClass('no-empty');
		else $(this).parents('.label-floating').removeClass('no-empty');
		$(this).parents('.label-floating').removeClass('focus');	
	});
	$('.label-floating .form-control-line').each(function(){
		if($(this).val()!='') $(this).parents('.label-floating').addClass('no-empty');
		else $(this).parents('.label-floating').removeClass('no-empty');
	});
	$('.label-floating').removeClass('focus');
	$('header .navbar a').click(function(){
		target = $(this).attr('href');
		target = target.split('#');
		if(target[1] && target[1]!=''){
			if($('#'+target[1]).length>0){
				var offs = $('#'+target[1]).offset().top;
				var hHeader = $('header .header-row-2').innerHeight();
				if(offs > _LastSC) hHeader=0;
				offs = offs - hHeader;
				$('html,body').animate({scrollTop:offs},800);
				return false;
			}
		}
	});
	$('.wpcf7-checkbox label,.wpcf7-radio label').click(function(){
		sirius_setupLabel();
	});
	sirius_setupLabel();
});

function sirius_scrollEvent(){
	_CurrentSC = jQuery(window).scrollTop();
	var _HeightHeader = jQuery('header').innerHeight();
	var _HeightHeader2 = jQuery('.header-row-1').innerHeight();
	if(jQuery('.header-row-1').hasClass('open')) _HeightHeader2 = jQuery('.header-row-1 .container').innerHeight();
	var _HeightHeader2_toggle = jQuery('.header-row-1-toggle').innerHeight();
	if(jQuery('.header-row-1-toggle').css('display')=='none') _HeightHeader2_toggle=0;
	var topHR2 = _HeightHeader2+_HeightHeader2_toggle-_CurrentSC;
	if(jQuery('body').hasClass('admin-bar')){
		topHR2 = (jQuery('html').css('margin-top').replace('px','')*1)+topHR2;
	}
	if(topHR2<0) topHR2=0
	jQuery('.header-row-2').css('top',topHR2+'px');
	
	if(_CurrentSC > _HeightHeader && _CurrentSC > _LastSC){
		jQuery('.header-row-2').removeClass('header-down').addClass('header-up');
	}
	else if(_CurrentSC > _HeightHeader){
		jQuery('.header-row-2').removeClass('header-up').addClass('header-down');
	}else{
		jQuery('.header-row-2').removeClass('header-up').removeClass('header-down');
	}
	_LastSC = _CurrentSC;
	
}
function sirius_getNewSize(t,o){
	return Math.max(t.outerWidth(),t.outerHeight())/o.outerWidth()*2.5;
}
function sirius_isTouch(){
	return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}
function sirius_getRelX(elem,event){
	var elemOffset=elem.offset();
	return sirius_isTouch()?(event=event.originalEvent,1===event.touches.length?event.touches[0].pageX-elemOffset.left:!1):event.pageX-elemOffset.left;
}
function sirius_getRelY(elem,event){
	var elemOffset=elem.offset();
	return sirius_isTouch()?(event=event.originalEvent,1===event.touches.length?event.touches[0].pageY-elemOffset.top:!1):event.pageY-elemOffset.top;
}
function sirius_hasTransitionSupport(){
	var thisBody = document.body || document.documentElement,
		thisStyle = thisBody.style,
		support = thisStyle.transition !== undefined || thisStyle.WebkitTransition !== undefined || thisStyle.MozTransition !== undefined || thisStyle.MsTransition !== undefined || thisStyle.OTransition !== undefined;
	return support;
}
function sirius_rippleEffect(_this,e){
	_this.addClass('ripple').css('z-index',10);
	var bdr_radius_TL = _this.css('borderTopLeftRadius');
	var bdr_radius_TR = _this.css('borderTopRightRadius');
	var bdr_radius_BL = _this.css('borderBottomLeftRadius');
	var bdr_radius_BR = _this.css('borderBottomRightRadius');
	var bdr_radius = bdr_radius_TL+' '+bdr_radius_TR+' '+bdr_radius_BR+' '+bdr_radius_BL;
	if(_this.find('.ripple-effect').length<=0)
		_this.append('<div class="ripple-effect" style="-webkit-border-radius:'+bdr_radius+';-moz-border-radius:'+bdr_radius+';border-radius:'+bdr_radius+';"></div>');
	var ripple = _this.find('.ripple-effect');
	jQuery('.ripple-effect .effect').stop().fadeOut().remove();
	var X = sirius_getRelX(ripple,e);
	var Y = sirius_getRelY(ripple,e);
	ripple.append('<div class="effect" style="opacity:0.05;background-color:#000000;top:'+Y+'px;left:'+X+'px"></div>');
	var effect = jQuery('.effect',ripple);
	if(effect.length>2) jQuery('.effect:first',ripple).remove();
	if(sirius_hasTransitionSupport()){
		var i = sirius_getNewSize(ripple,effect);
		effect.css({"-ms-transform":"scale("+i+")","-moz-transform":"scale("+i+")","-webkit-transform":"scale("+i+")","transform":"scale("+i+")"}).on("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",function(){jQuery(this).fadeOut().remove()});
	}else{
		jQuery('.effect',ripple).animate({width:2*Math.max(_this.outerWidth(),_this.outerHeight()),height:2*Math.max(_this.outerWidth(),_this.outerHeight()),"margin-left":-1*Math.max(_this.outerWidth(),_this.outerHeight()),"margin-top":-1*Math.max(_this.outerWidth(),_this.outerHeight())},500,function(){jQuery(this).fadeOut().remove()});
	}
}

function sirius_setupLabel() {
	if (jQuery('.wpcf7-checkbox').length>0) {
		jQuery('.wpcf7-checkbox label').each(function(){ 
			jQuery(this).removeClass('on');
		});
		jQuery('.wpcf7-checkbox input:checked').each(function(){ 
			jQuery(this).parents('label').addClass('on');
		});
	};
	if (jQuery('.wpcf7-radio').length>0) {
		jQuery('.wpcf7-radio label').each(function(){
			jQuery(this).removeClass('on');
		});
		jQuery('.wpcf7-radio input:checked').each(function(){ 
			jQuery(this).parents('label').addClass('on');
		});
	};
	jQuery('.wpcf7-checkbox input:disabled,.wpcf7-radio input:disabled').each(function(){ 
		jQuery(this).parents('label').addClass('disabled');
	});
};