// scripts.js/

(function($) {
 	"use strict";

 	if( $('body').is('.home') ) {

	 	// Header slider init
	 	$('.hero__carousel').slick({
	 		lazyLoad: 'ondemand',
	 		autoplay: true,
	 		arrows: false,
	 		centerMode: true,
	 		centerPadding: 0,
	 		mobileFirst: true,
	 		slidesToShow: 1,
	 		slidesToScroll: 1,
	 		infinite: true,
	 		fade: true,
	 		speed: 700,
	 	});

 		// Scrolling header
	 	var hero = document.getElementById('hero'),
	 		main = document.querySelector('#main');

	 	hero.addEventListener('click', function(){
	 		scrollToItem(main);
	 	});
	 	
 	}




 	// STICKY NAVBAR

 	var navbar = document.querySelector('.navbar');
 	var navbarTop = navbar.offsetTop;


 	function stickyNav() {

 		if( window.scrollY >= navbarTop) {
 			navbar.classList.add('sticky');
 			document.body.style.paddingTop = navbar.offsetHeight + 'px';
 		} else {
 			document.body.style.paddingTop = 0;
 			navbar.classList.remove('sticky');
 		}

 	}

 	window.addEventListener('scroll', stickyNav);



 	// Open Hamburger 

 	var haburger = document.getElementById('hamburger');

 	hamburger.addEventListener('click', openMenu);

 	function openMenu() {
 		var menuList = navbar.querySelector('nav');
 		// console.log('nav ' + menuList);
 		menuList.classList.toggle('open');
 		this.classList.toggle('active');
 		document.body.classList.toggle('noScroll');
 	}



 	// Single post slider 

 	$('.photo-box__list').slick({
 		arrows: true,
 		prevArrow: '<button type="button" class="slick-prev">&#8249;</button>',
 		nextArrow: '<button type="button" class="slick-next">&#8250;</button>',
 		// mobileFirst: true,
 		// adaptiveHeight: true,
 		fade: true,
 		speed: 900,
	    dots: true,
    	dotsClass: 'custom_paging',
    	customPaging: function (slider, i) {
	        return (i + 1) + '/' + slider.slideCount;
	    }
 	});

 	function initSlickModal() {
 		// console.log('beng');
	 	$('.photo-box__list').slick({
	 		arrows: true,
	 		prevArrow: '<button type="button" class="slick-prev">&#8249;</button>',
	 		nextArrow: '<button type="button" class="slick-next">&#8250;</button>',
	 		fade: true,
	 		speed: 900,
		    dots: true,
	    	dotsClass: 'custom_paging',
	    	customPaging: function (slider, i) {
		        return (i + 1) + '/' + slider.slideCount;
		    }
	 	});
 	}

 	// // Animation scroll 
	function scrollToItem(item) {
	    var diff=(item.offsetTop-window.scrollY)/8
	    if (Math.abs(diff)>1) {
	        window.scrollTo(0, (window.scrollY+diff))
	        clearTimeout(window._TO)
	        window._TO=setTimeout(scrollToItem, 30, item)
	    } else {
	        window.scrollTo(0, item.offsetTop)
	    }
	    // return false;
	}



 	// AJAX Post Loading 

 	$.ajaxSetup({cache: false});
 	$('.gallery__link').on('click', function(e){
 		e.preventDefault();

 		var link = $(this).attr('href');
 		// console.log('link ' + link);
 		$('#modal__content').html('');
 		$('#modal__content').load(link + ' #gallery', function(){
 			initSlickModal();
 		});

 		toggleModal('modal');

 		return false;
 	});

 	$('#close-modal').on('click', function(){
 		toggleModal('modal');
 	})

 	$(window).keypress(function(e){
 			console.log('esc '  + e.keyCode)
 		if(e.keyCode === 27) {
 			$('.modal').fadeOut();
 		}
 	})

 	function toggleModal (modal) {
 		console.log('fire' +'.'+ modal)
 		$('.' + modal).fadeToggle(400);
 		$('body').toggleClass('noScroll');
 		// $(modal).find('div').fadeToggle(500);
 	}


 })(jQuery);