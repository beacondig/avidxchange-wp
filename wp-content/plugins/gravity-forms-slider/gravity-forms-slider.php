<?php
/*
Plugin Name: Gravity Forms Range Slider
Plugin URI: https://wpgurus.org
Description: A range slider field for gravity forms.
Version: 1.1
Author: Wordpress Gurus
Author URI: https://wpgurus.org
Text Domain: sliderfieldaddon
Domain Path: /languages

*/

define( 'GF_SLIDER_FIELD_ADDON_VERSION', '1.0' );

add_action( 'gform_loaded', array( 'GF_Slider_Field_AddOn', 'load' ), 5 );
add_action( 'gform_pre_submission'			, 'pre_submission_handler' ,10,2);
class GF_Slider_Field_AddOn {

    public static function load() {

        if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
            return;
        }

        require_once( 'class-gravity-forms-slider.php' );

        GFAddOn::register( 'GFSliderFieldAddOn' );
    }

}
//Modify values before submission
function pre_submission_handler( $form ) {
	
	foreach($form['fields'] as $f){
		if(!$f->type=='slider'){
			continue;	
		}
		else{
	
			if(!empty($f->strValue) && (!empty($f->stri_value_setting) && $f->stri_value_setting==1)){
				$strings	=	explode(',',$f->strValue);
				
				$_POST['input_'.$f->id]	=	$strings[$_POST['input_'.$f->id]-1];
			}
		}
	}
}
function wpg_gf_slider(){ ?>

<script>
    jQuery(document).bind('gform_post_render', function (event, form_id) {

        var doc = jQuery(document);
        var inputRange = jQuery('input[type="range"]');
	
        // Example functionality to demonstrate a value feedback
        function valueOutput(element) {
            var strings	=	(jQuery(element).attr('data-str')).split(',');
            var value = element.value,
            output = element.parentNode.getElementsByTagName('output')[0];
            if(strings.length>1){
                output.innerHTML = strings[value-1];//+'-'+value;
            }
            else{
            	output.innerHTML = value;
            }
        }

		if(inputRange.length>0){
			
	        for (var i = inputRange.length - 1; i >= 0; i--) {
	            valueOutput(inputRange[i]);
	        };
	        doc.on('input', 'input[type="range"]', function (e) {
	            valueOutput(e.target);
	        });
	        // end
	
	        inputRange.rangeslider({
	        	polyfill: false,
	            rangeClass: 'rangeslider',
	            disabledClass: 'rangeslider--disabled',
	            horizontalClass: 'rangeslider--horizontal',
	            verticalClass: 'rangeslider--vertical',
	            fillClass: 'rangeslider__fill',
	            handleClass: 'rangeslider__handle',
	        });
		}	
    });
</script>


<?php } 

add_action('wp_footer', 'wpg_gf_slider');


