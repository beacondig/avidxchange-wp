( function( $ ) {
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */

	var widget_cq_image_hotspot_handler = function( $scope, $ ) {
		function hexToRgb(t){var i=/^#?([a-f\d])([a-f\d])([a-f\d])$/i;t=t.replace(i,function(t,i,a,e){return i+i+a+a+e+e});var a=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(t);return a?{r:parseInt(a[1],16),g:parseInt(a[2],16),b:parseInt(a[3],16)}:null}jQuery(document).ready(function(t){t(".cqtooltip-wrapper").each(function(){var i,a=t(this),e=t(this).data("tooltipstyle")||"shadow",o=t(this).data("tooltipanimation")||"fade",n=t(this).data("maxwidth")||null,s=t(this).data("opacity")||.5,r=(t(this).data("isdisplayall"),parseInt(t(this).data("displayednum")),t(this).data("marginoffset")||"0");"0"!=r&&(t(window).on("resize",function(i){var e=t(this).width();e<=540?t(".hotspot-item",a).each(function(i){t(this).css("margin",r)}):t(".hotspot-item",a).each(function(i){t(this).css("margin","0")})}),t(window).trigger("resize")),t(".cq-tooltip",t(this)).each(function(a){var r=t(this),h=t(this).css("background-color"),c=t(this).data("trigger")||"hover",d="yes"==t(this).data("isopen"),p=t(this).data("arrowposition")||"top";i=h.indexOf("a")==-1?h.replace(")",", "+s+")").replace("rgb","rgba"):h,t(this).on("click",function(i){""!=t(this).attr("href")&&"#"!=t(this).attr("href")||i.preventDefault()});var f=t(".cq-tooltip-content",t(this)).html(),l=t(window).width()<=480?0:2,u=0;r=t(this).tooltipster({content:f,position:p,offsetX:l,offsetY:u,maxWidth:n,delay:100,speed:300,interactive:!0,animation:o,trigger:c,contentAsHTML:!0,theme:"tooltipster-"+e}),d&&setTimeout(function(){r&&r.tooltipster("show")},600)})})});
	}

	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/cq-image-hotspot.default', widget_cq_image_hotspot_handler );
	} );
} )( jQuery );
