/**
 * File smoothscroll.js.
 *
 * @package IWeb_Pathology
 */

// A- When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {iweb_patho_scrollFunction()};

function iweb_patho_scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 300) {
		document.getElementById( "topBtn" ).style.display = "block";

	} else {
		document.getElementById( "topBtn" ).style.display = "none";

	}
}

// B - When the user clicks on the button, scroll to the top of the document
function iweb_patho_topFunction() {
	document.body.scrollTop = 0; // For Safari
	document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
