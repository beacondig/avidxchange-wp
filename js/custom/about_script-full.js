jQuery(document).ready(function($) {
	
	/* sticky submenu bar */
	var scrollHandler3 = function(){
	  //var spos = $("#sticksubtop").position().top;
	  var spos = 227;
	  if ($(window).scrollTop() > spos) {
		$("#sticksub").addClass("submenufixedcareers");
		$("#BHmark").addClass("BHpadding");
	  } else {
		$("#sticksub").removeClass("submenufixedcareers");
		$("#BHmark").removeClass("BHpadding");
	  }
	  
	};
	var scrollHandler4 = function(){
	  var spos = $("#sticksubtop").position().top;
	  if ($(window).scrollTop() > spos) {
		$("#sticksub").addClass("submenufixedcareers");
		$("#BHmark").addClass("BHpadding");
	  } else {
		$("#sticksub").removeClass("submenufixedcareers");
		$("#BHmark").removeClass("BHpadding");
	  }
	  
	};
	
	setupMenusA();
	
	$( window ).resize( function() {
	  setupMenusA();
	});
	
	function setupMenusA () {
	  if ( window.innerWidth <= 991 ) {
		$(window).off("scroll", scrollHandler3);
		$(window).scroll(scrollHandler4);
	  }
	  if ( window.innerWidth > 991 ) {
		$(window).off("scroll", scrollHandler4);
		$(window).scroll(scrollHandler3);
	  }
	}
	
	
	
	/* scroll to top button */
	$('#topScroll').click(function(){ 
			$('html,body').animate({ scrollTop: 0 }, 'slow');
			return false; 
	});
	
});