	//Dropdown menu open to onhover
	jQuery(document).ready(function() {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	   
	});
	  
	 
	//For menu collapse
	jQuery(document).ready(function(){
		jQuery(".navbar-toggle").click(function(){
			jQuery(".navbar-collapse").toggleClass('in');
		});
	});
	
	
	
	
	  