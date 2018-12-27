(function () {
'use strict';

const toTheTopThreshold = 600;
const hideNavbarThreshold = 200;
const hideNavbarOffset = 100; // navbar visibility changed if at least hideNavbarOffset px scrolled

const $ = document.querySelector.bind(document);
const toTheTopBtn = $('#to-the-top');
const mainNavbar = $('#main-navbar.fixed-top.autohide'); // only animate the navbar if fixed

let lastY = 0; // stores previous Y coordinate to determine scroll direction
let toTopIsOn = false; // is the toTheTop button displayed
let navbarIsOn = true; // if the main navbar displayed
let mainNavbarDisplay; // stores previous state of the navbar display
let scrollOffset = 0; // offset scrolled in the current direction
let autoHideToTopTimer;

/** Handle show/hide of "to the top" button based on scrolling **/
function showToTop() {
	toTheTopBtn.style.display = 'block';
	toTopIsOn = true;
	toTheTopAutohide();
}

function hideToTop() {
	toTheTopBtn.style.display = 'none';
	toTopIsOn = false;
}

function toTheTop(event) {
	event.preventDefault();
	jQuery('html, body').animate({scrollTop: 0}, 300);
	return false;
}

function toTheTopAutohide() {
	clearTimeout(autoHideToTopTimer);
	autoHideToTopTimer = setTimeout(() => {
		hideToTop();
	}, 4000);
}

toTheTopBtn.addEventListener('click', toTheTop);
toTheTopBtn.addEventListener('mouseenter', () => {
	clearTimeout(autoHideToTopTimer);
});

toTheTopBtn.addEventListener('mouseout', () => {
	toTheTopAutohide();
});

/** Hide the main navbar when scrolling down, show when scrolling up **/
function hideNavbar() {
	navbarIsOn = false;
	mainNavbarDisplay = mainNavbar.style.display;
	jQuery('#main-navbar').animate({opacity: 0}, { duration: 300,
		complete: () => {
			// make sure, that concurrent show/hide has consistent result
			mainNavbar.style.display = 'none';
			mainNavbar.style.opacity = 0;
			navbarIsOn = false;
		},
		fail: () => {
			mainNavbar.style.display = mainNavbarDisplay;
			mainNavbar.style.opacity = 1;
			navbarIsOn = true;
		}
	});
	
}

function showNavbar() {
	navbarIsOn = true;
	mainNavbar.style.display = mainNavbarDisplay; 
	jQuery('#main-navbar').animate({opacity: 1}, { duration: 300,
		complete: () => {
			// make sure, that concurrent show/hide has consistent result
			mainNavbar.style.display = mainNavbarDisplay;
			mainNavbar.style.opacity = 1;
			navbarIsOn = true;
		},
		fail: () => {
			mainNavbar.style.display = 'none';
			mainNavbar.style.opacity = 0;
			navbarIsOn = false;
		}
	});
}

/** keep track of the offset scrolled in the current direction **/
function setScrollOffset() {
	if ((lastY < window.scrollY && scrollOffset < 0) ||
		(lastY > window.scrollY && scrollOffset >= 0)) {
		//changing direction, reset offset
		scrollOffset = window.scrollY - lastY;
	} else {
		scrollOffset += (window.scrollY - lastY);
	}
	lastY = window.scrollY;
}

window.addEventListener('scroll', () => {
	if (typeof toTheTopBtn !== 'undefined' && toTheTopBtn !== null) {
		if (!toTopIsOn && window.scrollY >= toTheTopThreshold) {
			requestAnimationFrame(showToTop);
		}
		if (toTopIsOn && window.scrollY < toTheTopThreshold) {
			requestAnimationFrame(hideToTop);
		}
	}
	if (typeof mainNavbar !== 'undefined' && mainNavbar !== null) {
		if (navbarIsOn && scrollOffset > hideNavbarOffset && window.scrollY >= hideNavbarThreshold) {
			requestAnimationFrame(hideNavbar);
		} else if (!navbarIsOn && scrollOffset < -hideNavbarOffset){
			requestAnimationFrame(showNavbar);
		}
		setScrollOffset();
	}
}, false);

	
})();
