this.tooltip = function(){	
	/* CONFIG */		
		xOffset = 10;
		yOffset = 20;		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result		
	/* END CONFIG */		
	jQuery("a.tooltip").hover(function(e){											  
		this.t = this.title;
		this.title = "";									  
		jQuery("body").append("<p id='tooltip'>"+ this.t +"</p>");
		jQuery("#tooltip")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("medium");		
    },
	function(){
		this.title = this.t;		
		jQuery("#tooltip").remove();
    });	
	jQuery("a.tooltip").mousemove(function(e){
		jQuery("#tooltip")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});			
};

jQuery(document).ready(function(){
	tooltip();
});