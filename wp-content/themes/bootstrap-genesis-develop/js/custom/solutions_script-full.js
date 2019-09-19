jQuery(document).ready(function($) {
	/* blue footer button hover text change effects */
	/*function remOn() {
		$("#APMbut").removeClass('solon');
		$("#CONbut").removeClass('solon');
		$("#CFObut").removeClass('solon');
		$("#SUPbut").removeClass('solon');
		$("#APM").removeClass('sfshow');
		$("#CON").removeClass('sfshow');
		$("#CFO").removeClass('sfshow');
		$("#SUP").removeClass('sfshow');
	}
	$( "#APMbut" ).mouseover(function() {
		remOn();
		$("#APMbut").addClass('solon');
		$("#APM").addClass('sfshow');
	});
	$( "#CONbut" ).mouseover(function() {
		remOn();
		$("#CONbut").addClass('solon');
		$("#CON").addClass('sfshow');
	});
	$( "#CFObut" ).mouseover(function() {
		remOn();
		$("#CFObut").addClass('solon');
		$("#CFO").addClass('sfshow');
	});
	$( "#SUPbut" ).mouseover(function() {
		remOn();
		$("#SUPbut").addClass('solon');
		$("#SUP").addClass('sfshow');
	});*/
	
	
	/* changing the fontawesome icon on rollover for video play button */
	$( "i#pbtn" ).hover(
	  function() {
		$( "i#pbtn" ).addClass('fa-play-circle');
		$( "i#pbtn" ).removeClass('fa-play-circle-o');
	  }, function() {
		$( "i#pbtn" ).addClass('fa-play-circle-o');
		$( "i#pbtn" ).removeClass('fa-play-circle');
	  }
	);
	
	
	/* ecosystem bubble hover text change effects */
	function remEcoOn() {
		$("#ecobut1").removeClass('ecobubblehover');
		$("#ecobut2").removeClass('ecobubblehover');
		$("#ecobut3").removeClass('ecobubblehover');
		$("#ecobut4").removeClass('ecobubblehover');
		$("#ecobut5").removeClass('ecobubblehover');
		$("#ecobut6").removeClass('ecobubblehover');
		$("#ecobut7").removeClass('ecobubblehover');
		$("#ecocon1").removeClass('ecoshow');
		$("#ecocon2").removeClass('ecoshow');
		$("#ecocon3").removeClass('ecoshow');
		$("#ecocon4").removeClass('ecoshow');
		$("#ecocon5").removeClass('ecoshow');
		$("#ecocon6").removeClass('ecoshow');
		$("#ecocon7").removeClass('ecoshow');
	}
	$( "#ecobutfull1" ).mouseover(function() {
		remEcoOn();
		$("#ecobut1").addClass('ecobubblehover');
		$("#ecocon1").addClass('ecoshow');
	});
	$( "#ecobutfull2" ).mouseover(function() {
		remEcoOn();
		$("#ecobut2").addClass('ecobubblehover');
		$("#ecocon2").addClass('ecoshow');
	});
	$( "#ecobutfull3" ).mouseover(function() {
		remEcoOn();
		$("#ecobut3").addClass('ecobubblehover');
		$("#ecocon3").addClass('ecoshow');
	});
	$( "#ecobutfull4" ).mouseover(function() {
		remEcoOn();
		$("#ecobut4").addClass('ecobubblehover');
		$("#ecocon4").addClass('ecoshow');
	});
	$( "#ecobutfull5" ).mouseover(function() {
		remEcoOn();
		$("#ecobut5").addClass('ecobubblehover');
		$("#ecocon5").addClass('ecoshow');
	});
	$( "#ecobutfull6" ).mouseover(function() {
		remEcoOn();
		$("#ecobut6").addClass('ecobubblehover');
		$("#ecocon6").addClass('ecoshow');
	});
	$( "#ecobutfull7" ).mouseover(function() {
		remEcoOn();
		$("#ecobut7").addClass('ecobubblehover');
		$("#ecocon7").addClass('ecoshow');
	});
		
	
	/* ecosystem bubble hover text change effects MOBILE */
	$( "#ecot1" ).click(function() {
		$( "#ecoc2, #ecoc3, #ecoc4, #ecoc5, #ecoc6, #ecoc7" ).hide(400);
		$( "#ecoc1" ).toggle(400);
	});
	$( "#ecot2" ).click(function() {
		$( "#ecoc1, #ecoc3, #ecoc4, #ecoc5, #ecoc6, #ecoc7" ).hide(400);
		$( "#ecoc2" ).toggle(400);
	});
	$( "#ecot3" ).click(function() {
		$( "#ecoc2, #ecoc1, #ecoc4, #ecoc5, #ecoc6, #ecoc7" ).hide(400);
		$( "#ecoc3" ).toggle(400);
	});
	$( "#ecot4" ).click(function() {
		$( "#ecoc2, #ecoc3, #ecoc1, #ecoc5, #ecoc6, #ecoc7" ).hide(400);
		$( "#ecoc4" ).toggle(400);
	});
	$( "#ecot5" ).click(function() {
		$( "#ecoc2, #ecoc3, #ecoc4, #ecoc1, #ecoc6, #ecoc7" ).hide(400);
		$( "#ecoc5" ).toggle(400);
	});
	$( "#ecot6" ).click(function() {
		$( "#ecoc2, #ecoc3, #ecoc4, #ecoc5, #ecoc1, #ecoc7" ).hide(400);
		$( "#ecoc6" ).toggle(400);
	});
	$( "#ecot7" ).click(function() {
		$( "#ecoc2, #ecoc3, #ecoc4, #ecoc5, #ecoc6, #ecoc1" ).hide(400);
		$( "#ecoc7" ).toggle(400);
	});
	
	
});