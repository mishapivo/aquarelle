jQuery(document).ready(function() {

  var owl = jQuery("#fvideos");
 
  owl.owlCarousel({
     
      itemsCustom : [
       [0, 1],
       [480, 2],
       [980, 3]
      ]
 
  });

jQuery("#sitemenu").tinyNav();
	
});
