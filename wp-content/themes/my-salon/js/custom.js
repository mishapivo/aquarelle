jQuery(document).ready(function($){

	  /** Variables from Customizer for Slider settings */
    if( my_salon_data.auto == '1' ){
        var slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( my_salon_data.loop == '1' ){
        var slider_loop = true;
    }else{
        var slider_loop = false;
    }
    
    if( my_salon_data.pager == '1' ){
        var slider_control = true;
    }else{
        slider_control = false;
    }


    if( my_salon_data.animation == 'fade' ){
        var slider_animation = 'fade';
    }else{
        slider_animation = '';
    }
   
    /** Home Page  Banner Slider */
	$('.fadeout').owlCarousel({
		items: 1,
		animateOut: slider_animation,// animation
		loop: slider_loop, // loop
		margin: 10,
		nav: true,
		navText:["<i class='fa fa-long-arrow-left'></i>","<i class='fa fa-long-arrow-right'></i>"],
		autoplay: slider_auto, //auto play
		dots:  slider_control, //slider control
		slideSpeed       : my_salon_data.speed,
		autoplayTimeout: my_salon_data.pause,
	});

    $('.testimonial-slider').owlCarousel({
        thumbs: true,
        loop: true, // loop
        margin: 10,
        nav: true,
        navText:["<i class='fa fa-long-arrow-left'></i>","<i class='fa fa-long-arrow-right'></i>"],
        autoplay: true, //auto play
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            480:{
                items:1,
                nav:false
            },
            768:{
                items:2,
                nav:true,
                loop:false
            }
        }
    });

	// responsive menu
	 jQuery('.header-bottom  .main-navigation').meanmenu({
	    	meanScreenWidth: 991,
	    	meanRevealPosition: "right"
	    });
});