/*! Lazy Load 1.9.7 - MIT license - Copyright 2010-2015 Mika Tuupola */
!function(a,b,c,d){var e=a(b);a.fn.lazyload=function(f){function g(){var b=0;i.each(function(){var c=a(this);if(!j.skip_invisible||c.is(":visible"))if(a.abovethetop(this,j)||a.leftofbegin(this,j));else if(a.belowthefold(this,j)||a.rightoffold(this,j)){if(++b>j.failure_limit)return!1}else c.trigger("appear"),b=0})}var h,i=this,j={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!1,appear:null,load:null,placeholder:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"};return f&&(d!==f.failurelimit&&(f.failure_limit=f.failurelimit,delete f.failurelimit),d!==f.effectspeed&&(f.effect_speed=f.effectspeed,delete f.effectspeed),a.extend(j,f)),h=j.container===d||j.container===b?e:a(j.container),0===j.event.indexOf("scroll")&&h.bind(j.event,function(){return g()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,(c.attr("src")===d||c.attr("src")===!1)&&c.is("img")&&c.attr("src",j.placeholder),c.one("appear",function(){if(!this.loaded){if(j.appear){var d=i.length;j.appear.call(b,d,j)}a("<img />").bind("load",function(){var d=c.attr("data-"+j.data_attribute);c.hide(),c.is("img")?c.attr("src",d):c.css("background-image","url('"+d+"')"),c[j.effect](j.effect_speed),b.loaded=!0;var e=a.grep(i,function(a){return!a.loaded});if(i=a(e),j.load){var f=i.length;j.load.call(b,f,j)}}).attr("src",c.attr("data-"+j.data_attribute))}}),0!==j.event.indexOf("scroll")&&c.bind(j.event,function(){b.loaded||c.trigger("appear")})}),e.bind("resize",function(){g()}),/(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion)&&e.bind("pageshow",function(b){b.originalEvent&&b.originalEvent.persisted&&i.each(function(){a(this).trigger("appear")})}),a(c).ready(function(){g()}),this},a.belowthefold=function(c,f){var g;return g=f.container===d||f.container===b?(b.innerHeight?b.innerHeight:e.height())+e.scrollTop():a(f.container).offset().top+a(f.container).height(),g<=a(c).offset().top-f.threshold},a.rightoffold=function(c,f){var g;return g=f.container===d||f.container===b?e.width()+e.scrollLeft():a(f.container).offset().left+a(f.container).width(),g<=a(c).offset().left-f.threshold},a.abovethetop=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollTop():a(f.container).offset().top,g>=a(c).offset().top+f.threshold+a(c).height()},a.leftofbegin=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollLeft():a(f.container).offset().left,g>=a(c).offset().left+f.threshold+a(c).width()},a.inviewport=function(b,c){return!(a.rightoffold(b,c)||a.leftofbegin(b,c)||a.belowthefold(b,c)||a.abovethetop(b,c))},a.extend(a.expr[":"],{"below-the-fold":function(b){return a.belowthefold(b,{threshold:0})},"above-the-top":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-screen":function(b){return a.rightoffold(b,{threshold:0})},"left-of-screen":function(b){return!a.rightoffold(b,{threshold:0})},"in-viewport":function(b){return a.inviewport(b,{threshold:0})},"above-the-fold":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-fold":function(b){return a.rightoffold(b,{threshold:0})},"left-of-fold":function(b){return!a.rightoffold(b,{threshold:0})}})}(jQuery,window,document);


/* create cookie functions */
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}



jQuery(document).ready(function($) {
	
	//load the top-bar using ajax to add a special button
	$('#menu-item-1614 a').attr('data-toggle','modal');
	$('#menu-item-1614 a').attr('data-target','#demoModal1');
	$('#menu-item-1614 a').removeAttr('href');
	
	$('#menu-item-4571 a').attr('data-toggle','modal');
	$('#menu-item-4571 a').attr('data-target','#demoModal1');
	$('#menu-item-4571 a').removeAttr('href');
	
	//adjust title
	$('#menu-item-63 a').attr('title', 'AP Automation');
	
	/***************** Timer functions to ensure old browsers show final animation states ***********/
	var myTime1;
	var myTime2;
	function finalStates() {
		$('.drop-in').css("height","700");
		$('.fade-in').css("opacity","1");
	}
	function finalarrow1() {
		$('.slide-in').css("left","0");
	}
	function finalarrow2() {
		$('.slide-in').css("left","100");
	}
	function finalarrow3() {
		$('.slide-in').css("left","250");
	}
	/************************************************************************************************/
	
	/***************** SCROLL ACTION EVENTS FOR MENUS ******************/
	/* sticky submenu bar */
	var scrollHandler1 = function(){
	  //var spos = $("body .nav-primary").position().top;
	  var spos = 41;
	  if ($(window).scrollTop() > spos) {
		$(".nav-secondary").css("visibility","hidden");
		$(".nav-primary").addClass("submenufixed");
		$(".nav-secondary").addClass("HHpadding");
	  } else {
		$(".nav-primary").removeClass("submenufixed");
		$(".nav-secondary").removeClass("HHpadding");
		$(".nav-secondary").css("visibility","visible");
	  }
	  
	}
	
	var scrollHandler2 = function(){
	    if($("body.page-template-page-home .nav-primary").length) {
		  var a = $("body.page-template-page-home .nav-primary").offset().top;
		  if($(this).scrollTop() == a)
			{   
			   $('body.page-template-page-home .nav-secondary, body.page-template-page-home .nav-primary').css({"background":"white"});
			   $('body.page-template-page-home .waltlogo').css({"opacity":"0"});
			   $('body.page-template-page-home .nav-secondary a, body.page-template-page-home .nav-primary a').addClass("hnavcolors");
			   $('body.page-template-page-home .nav-primary ul li ul.dropdown-menu li a').addClass("hdropnavcolors");
			   $('body.page-template-page-home #searchshow').addClass("hsearchcolors");
			} else {
			   $('body.page-template-page-home .nav-secondary, body.page-template-page-home .nav-primary').css({"background":"transparent"});
			   $('body.page-template-page-home .waltlogo').css({"opacity":"100"});
			   $('body.page-template-page-home .nav-secondary a, body.page-template-page-home .nav-primary a').removeClass("hnavcolors");
			   $('body.page-template-page-home .nav-primary ul li ul.dropdown-menu li a').addClass("hdropnavcolors");
			   $('body.page-template-page-home #searchshow').removeClass("hsearchcolors");
			}
		}
	}
	/***************** END SCROLL ACTION EVENTS FOR MENUS ******************/
	
	/* combine the primary and secondary menus into one menu on mobile */
	setupMenus();
	
	$( window ).resize( function() {
	  setupMenus();
	});
	
	function setupMenus () {
	  if ( window.innerWidth <= 767 ) {
	    $( 'ul#menu-top-menu > li' ).addClass('moved-item'); //tag moved items so we can move them back
	    $( 'ul#menu-top-menu > li' ).appendTo( 'ul#menu-main-menu' );
	    $( '.nav-secondary' ).hide();
	  }
	  
	  if ( window.innerWidth > 767 ) {
	    $( '.nav-secondary' ).show();
	    $( 'ul#menu-main-menu > li.moved-item' ).appendTo( 'ul#menu-top-menu' );
		$( 'ul#menu-main-menu' ).remove( 'ul#menu-main-menu > li.moved-item' );
	  }
	
	  /***   BEGIN sticky scroll CALLS ***/
	  if ( window.innerWidth <= 991 ) {
		$(window).off("scroll", scrollHandler1);
		$(window).off("scroll", scrollHandler2);
		$(".nav-primary").removeClass("submenufixed");
		$(".nav-secondary").removeClass("HHpadding");
		$(".nav-secondary").css("visibility","visible");
	  }
	  if ( window.innerWidth > 991 ) {
		$(window).scroll(scrollHandler1);
		$(window).scroll(scrollHandler2);
	  }
	  //***** HOME ANIMTAION FIXES ****/
	  if(( window.innerWidth > 767 ) && ( window.innerWidth <= 991 )){
		/** home animations IE fix */
		if($("body.page-template-page-home .nav-primary").length) {
			clearTimeout(myTime1);
			clearTimeout(myTime2);
			myTime1 = setTimeout(finalStates, 3000);
			myTime2 = setTimeout(finalarrow1, 3000);
		}
	  } else if(( window.innerWidth > 992 ) && ( window.innerWidth <= 1349 )) {
		/** home animations IE fix */
		if($("body.page-template-page-home .nav-primary").length) {
			clearTimeout(myTime1);
			clearTimeout(myTime2);
			myTime1 = setTimeout(finalStates, 3000);
			myTime2 = setTimeout(finalarrow2, 3000);
		}
	  } else if(( window.innerWidth > 1350 ) && ( window.innerWidth <= 1349 )) {
		/** home animations IE fix */
		if($("body.page-template-page-home .nav-primary").length) {
			clearTimeout(myTime1);
			clearTimeout(myTime2);
			myTime1 = setTimeout(finalStates, 3000);
			myTime2 = setTimeout(finalarrow3, 3000);
		}
	  }
	  //***** END HOME ANIMTAION FIXES ****/
	  
	  /***   end sticky scroll CALLS  ***/
	  
	  
	}
	/* end combine the primary and secondary menus into one menu on mobile */
	
	/* rotate submenu item icons on mobile when clicked */
	$( ".subclicker" ).click(function() {
		if (  $( this ).css( "transform" ) == 'none' ){
			$(this).css("transform","rotate(180deg)");
		} else {
			$(this).css("transform","" );
		}
	});
	/* end rotate submenu item icons on mobile when clicked */
	$( "button.navbar-toggle" ).click(function() {
		$(".subclicker").css("transform","" );
	});
	
	/* eased scrolling effect for hopping down the page from anchor links */
	var hashTagActive = "";
	$(".scroll").on("click touchstart" , function (event) {
		if(hashTagActive != this.hash) { //this will prevent if the user click several times the same link to freeze the scroll.
			event.preventDefault();
			//calculate destination place
			var dest = 0;
			if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
				dest = $(document).height() - $(window).height();
			} else {
				dest = $(this.hash).offset().top;
			}
			//go to destination
			$('html,body').animate({
				scrollTop: dest
			}, 700, 'swing');
			hashTagActive = this.hash;
		}
	});
	
	
	/* news loop hover effects */
	function remOn() {
		$("#nimage1").removeClass('nimageO');
		$("#nimage2").removeClass('nimageO');
		$("#nimage3").removeClass('nimageO');
		$("#nitem1").removeClass('newsLlistO');
		$("#nitem2").removeClass('newsLlistO');
		$("#nitem3").removeClass('newsLlistO');
	}
	$( "#nitem1" ).mouseover(function() {
		remOn();
		$("#nimage1").addClass('nimageO');
		$("#nitem1").addClass('newsLlistO');
	});
	$( "#nitem2" ).mouseover(function() {
		remOn();
		$("#nimage2").addClass('nimageO');
		$("#nitem2").addClass('newsLlistO');
	});
	$( "#nitem3" ).mouseover(function() {
		remOn();
		$("#nimage3").addClass('nimageO');
		$("#nitem3").addClass('newsLlistO');
	});
	
	/* match vertical heights */
	$(function() {
		$('.contactbg').matchHeight(false);
		$('.intgbg2').matchHeight(false);
		$('.eventhemup').matchHeight(false);
		$('.footerheights').matchHeight(false);
		$('.otherheights').matchHeight(false);
	});
	
	/* lazy loading */
	$(function() {
		$("img.lazy").lazyload({
			threshold : 600
		});
	});
	
	/* go to category if selected on dropdown */
	$("#morecats").change(function(){
	  if ($(this).val()!='') {
		window.location.href=$(this).val();
	  }
	});
	
	/* show search bar when clicked */
	$( "#searchshow" ).click(function() {
		$( ".sformdiv" ).addClass('sformShow');
	});
	
	/* hide search bar when clicked */
	$( "#clsearch" ).click(function() {
		$( ".sformdiv" ).removeClass('sformShow');
	});
	
	/* get hubspot completed submission notice to add cookie */
		// Grab a reference to our form
	var form = $('#gform_2');
	// Setup a handler to run when the form is submitted
	form.on('submit', function(e) {
	  	  var regex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/;
	  var ctrl =  document.getElementById('input_2_2');
	  /*if (regex.test(ctrl.value)) {
        var x = readCookie('newsubcookie');
		if (x) { 
		} else {	
			createCookie('newsubcookie','registered',10000);
		}
      }*/
	});
	// Grab a reference to our form
	var form = $('#gform_1');
	// Setup a handler to run when the form is submitted
	form.on('submit', function(e) {
	  	  var regex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/;
	  var ctrl =  document.getElementById('input_1_2');
	  /*if (regex.test(ctrl.value)) {
        var x = readCookie('newsubcookie')
		if (x) { 
		} else {	
			createCookie('newsubcookie','registered',10000);
		}
      }*/
	});
	// Grab a reference to our form
	var form = $('#gform_3');
	// Setup a handler to run when the form is submitted
	form.on('submit', function(e) {
	  	  var regex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/;
	  var ctrl =  document.getElementById('input_3_2');
	  /*if (regex.test(ctrl.value)) {
        var x = readCookie('newsubcookie')
		if (x) { 
		} else {	
			createCookie('newsubcookie','registered',10000);
		}
      }*/
	});
	// Grab a reference to our form
	var form = $('#gform_4');
	// Setup a handler to run when the form is submitted
	form.on('submit', function(e) {
	  	  var regex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/;
	  var ctrl =  document.getElementById('input_4_2');
	  /*if (regex.test(ctrl.value)) {
        var x = readCookie('newsubcookie')
		if (x) { 
		} else {	
			createCookie('newsubcookie','registered',10000);
		}
      }*/
	});
	// Grab a reference to our form
	var form = $('#gform_5');
	// Setup a handler to run when the form is submitted
	form.on('submit', function(e) {
	  	  var regex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/;
	  var ctrl =  document.getElementById('input_5_2');
	  /*if (regex.test(ctrl.value)) {
        var x = readCookie('newsubcookie')
		if (x) { 
		} else {	
			createCookie('newsubcookie','registered',10000);
		}
      }*/
	});
	
	// Grab a reference to our form
	//This one also changes visibility of the elements on resources page
	var form = $('#gform_6');
	// Setup a handler to run when the form is submitted
	form.on('submit', function(e) {
	  	  var regex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/;
	  var ctrl =  document.getElementById('input_6_2');
	  if (regex.test(ctrl.value)) {
        //var x = readCookie('newsubcookie')
		//if (x) { /* exists */
			//$('#noNewsSignup').css('display','none');
			//$('#yesNewsSignup').css('display','block');
		//} else {	
			//createCookie('newsubcookie','registered',10000);
			$('#noNewsSignup').css('display','none');
			$('#yesNewsSignup').css('display','block');
		//}
      }
	});
	 
});


jQuery(document).ready(function() {
 	$('.back-to-top').css('display','none');
	var offset = 250;
	var duration = 300;
 		jQuery(window).scroll(function() {
 			if (jQuery(this).scrollTop() > offset) {
 				jQuery('.back-to-top').fadeIn(duration);
 			} else {
 				jQuery('.back-to-top').fadeOut(duration);
 			}
		});
 
 		jQuery('.back-to-top').click(function(event) {
 			event.preventDefault();
 			jQuery('html, body').animate({scrollTop: 0}, duration);
 			return false;
 		})
 
});