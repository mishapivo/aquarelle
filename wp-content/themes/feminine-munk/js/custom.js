jQuery(document).ready(function($){
    //Header Search
    $('html').click(function() {
      $('.example').hide(); 
    });

    $('.form-section').click(function(event){
        event.stopPropagation();
    });
    
    $("#search-btn").click(function(){
        $(".example").slideToggle();
        return false 
    });
    
    //responsive menu    
    $("#nav-anchor").click(function(){
		$("#site-navigation").slideToggle("slow");
	});
    
});