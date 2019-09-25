<?php
/**
 * Plugin Name: TinyMCE AvidXchange Button
 * Plugin URI: https://www.avidxchnage.com/
 * Version: 1.0
 * Author: Justin Mejak
 * Author URI: https://www.avidxchange.com
 * Description: A simple TinyMCE Plugin to add a custom button with multiple options for posting stylized content
 * License: GPL2
 */


class TinyMCE_Custom_Button_Class {
     
    /**
    * Constructor. Called when the plugin is initialised.
    */
    function __construct() {
         if ( is_admin() ) {
    			add_action( 'init', array(  $this, 'setup_tinymce_plugin' ) );
		 	}
	
    }
 
	
function setup_tinymce_plugin() {
 
				if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
            		return;
				}

				if ( get_user_option( 'rich_editing' ) !== 'true' ) {
					return;
				}
 
				add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_plugin' ) );
				add_filter( 'mce_buttons', array( &$this, 'add_tinymce_toolbar_button' ) );
         
			}
			
			function add_tinymce_plugin( $plugin_array ) {
				$plugin_array['custom_link_class'] = plugin_dir_url( __FILE__ ) . 'tinymce-avid-button.js';
				return $plugin_array;
			}
		
			function add_tinymce_toolbar_button( $buttons ) {
				array_push( $buttons, '&nbsp;|', 'custom_link_class' );
				return $buttons;
			}	
	
	
}
 
$tinymce_custom_button_class = new TinyMCE_Custom_Button_Class;

include( plugin_dir_path( __FILE__ ) . 'tinymce-avid-shortcodes.php' );


?>