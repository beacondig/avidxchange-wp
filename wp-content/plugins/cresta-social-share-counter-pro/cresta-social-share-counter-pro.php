<?php
/**
 * Plugin Name: Cresta Social Share Counter PRO
 * Plugin URI: https://crestaproject.com/downloads/cresta-social-share-counter/
 * Description: Share your posts and pages quickly and easily with Cresta Social Share Counter PRO and show share counts.
 * Version: 2.7.5
 * Author: CrestaProject - Rizzo Andrea
 * Text Domain: cresta-social-share-counter-pro
 * Author URI: https://crestaproject.com
 * License: GPL2
 */
 
/* Start License key */
define( 'CRESTA_SOCIAL_STORE_URL', 'https://crestaproject.com' );
define( 'CRESTA_SOCIAL_ITEM_NAME', 'Cresta Social Share Counter' );
define( 'CRESTA_SOCIAL_PLUGIN_PAGE', 'cresta-social-share-counter-pro.php' );
define( 'CRESTA_SOCIAL_PLUGIN_VERSION', '2.7.5' );
if( !class_exists( 'EDD_SL_Plugin_Updater' ) ) {
	include( dirname( __FILE__ ) . '/inc/EDD_SL_Plugin_Updater.php' );
}

function cresta_sl_social_plugin_updater() {
	$license_key_cresta = trim( get_option( 'cresta_social_license_key' ) );
	$edd_updater = new EDD_SL_Plugin_Updater( CRESTA_SOCIAL_STORE_URL, __FILE__, array( 
			'version' 	=> CRESTA_SOCIAL_PLUGIN_VERSION,
			'license' 	=> $license_key_cresta,
			'item_name' => CRESTA_SOCIAL_ITEM_NAME,
			'author' 	=> 'CrestaProject - Rizzo Andrea',
			'beta'		=> false
		)
	);
}
add_action( 'admin_init', 'cresta_sl_social_plugin_updater', 0 );
/* End License Key */
if (get_option('cresta_social_shares_http_https_both') == 1) {
	require_once( dirname( __FILE__ ) . '/class/cresta-share-gp-both.php' );
} else {
	require_once( dirname( __FILE__ ) . '/class/cresta-share-gp.php' );
}
require_once( dirname( __FILE__ ) . '/cresta-metabox.php' );

function crestaplugin_init() {
	load_plugin_textdomain( 'cresta-social-share-counter-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_filter( 'init', 'crestaplugin_init' );

add_action('admin_menu', 'cresta_social_share_menu');
add_action('wp_enqueue_scripts', 'cresta_social_share_wp_enqueue_scripts');	
add_filter('the_content', 'cresta_filter_in_content' ); 
add_shortcode('cresta-social-share', 'add_social_button_in_content' );
add_action('admin_enqueue_scripts', 'cresta_social_share_admin_enqueue_scripts');
add_action('wp_head', 'cresta_social_css_top'); 

function cresta_social_share_menu() {
	global $cresta_options_page;
	$cresta_options_page = add_menu_page( esc_html__( 'Cresta Social Share Counter PRO Settings'), 'CSSC PRO', 'manage_options', 'cresta-social-share-counter-pro.php', 'cresta_social_share_option', esc_url(plugins_url( '/cresta-social-share-counter-pro/images/cssc-icon.png' )), 81 );
}

function cresta_social_setting_link($links) { 
	$settings_link = array(
		'<a href="' . admin_url('admin.php?page=cresta-social-share-counter-pro.php') . '">' . esc_html__( 'Settings','cresta-social-share-counter-pro') . '</a>',
	);
	return array_merge( $links, $settings_link );
}

function cresta_social_share_admin_enqueue_scripts( $hook ) {
	global $cresta_options_page;
	if ( $hook == $cresta_options_page ) {
		wp_enqueue_style( 'cresta-social-admin-style', plugins_url('css/cresta-admin-css.css',__FILE__), array(), CRESTA_SOCIAL_PLUGIN_VERSION);
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'cresta-social-color-picker-js', plugins_url('js/jquery.cresta-social-color-picker.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
	}
}

function cresta_social_share_wp_enqueue_scripts() {
	$cresta_current_post_type = get_post_type();
	$show_on = explode (',',get_option( 'cresta_social_shares_selected_page' ));
	
	if ( is_singular() && in_array( $cresta_current_post_type, $show_on ) ) {
		
		$checkCrestaMetaBox = get_post_meta(get_the_ID(), '_get_cresta_plugin', true);
		if( $checkCrestaMetaBox != '1') {
		
			$hover_animation = get_option('cresta_social_shares_choose_hover');
			$enable_animation = get_option('cresta_social_shares_enable_animation');
			$show_floatbutton = get_option('cresta_social_shares_show_floatbutton');
			$stick_floatbutton = get_option('cresta_social_shares_stick_floatbutton');

			wp_enqueue_style( 'cresta-social-crestafont', plugins_url('css/csscfont.css',__FILE__), array(), CRESTA_SOCIAL_PLUGIN_VERSION);
			wp_enqueue_style( 'cresta-social-wp-style', plugins_url('css/cresta-wp-css.css',__FILE__), array(), CRESTA_SOCIAL_PLUGIN_VERSION);
			$query_args = array(
				'family' => 'Noto+Sans:400,700'
			);
			wp_enqueue_style( 'cresta-social-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
			
			if ($hover_animation != 'cresta-no-animation') {
				wp_enqueue_style( 'cresta-social-hover', plugins_url('css/cresta-hover.css',__FILE__), array(), CRESTA_SOCIAL_PLUGIN_VERSION);
			}
			
			if($show_floatbutton == 1 && $enable_animation == 1) {
				wp_enqueue_style( 'cresta-social-animate', plugins_url('css/animate.min.css',__FILE__), array(), CRESTA_SOCIAL_PLUGIN_VERSION);
			}
			wp_enqueue_script( 'cresta-social-effect-js', plugins_url('js/jquery.cresta-social-effect.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
			
			$show_count = get_option('cresta_social_shares_show_counter');
			$buttons = explode (',',get_option( 'selected_button' ));
			
			if(in_array('whatsapp',$buttons) || in_array('telegram',$buttons) ) {
				wp_enqueue_script( 'cresta-social-whatsapp-js', plugins_url('js/jquery.cresta-social-whatsapp.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
			}
			
			if($stick_floatbutton == 1 && $show_floatbutton == 1) {
				wp_enqueue_script( 'cresta-social-stick-buttons-js', plugins_url('js/jquery.cresta-stick-buttons.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
				$distanceStickTop = get_option('cresta_social_shares_stick_position_top');
				$distanceStickLeft = get_option('cresta_social_shares_stick_position_left');
				wp_localize_script( 'cresta-social-stick-buttons-js', 'crestaSetting', array( 'distanceTop' => $distanceStickTop, 'distanceLeft' => $distanceStickLeft ) );
			}
			
			if($show_count == 1) {
				if (get_option('cresta_social_shares_http_https_both') == 1) {
					wp_enqueue_script( 'cresta-social-counter-js', plugins_url('js/jquery.cresta-social-share-counter-both.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
				} else {
					wp_enqueue_script( 'cresta-social-counter-js', plugins_url('js/jquery.cresta-social-share-counter.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
				}
				$ifmorezero = get_option('cresta_social_shares_show_ifmorezero');
				$theifmore = 'nomore';
				$theifmorenumber = '0';
				if($ifmorezero == 1 ) {
					$theifmore = 'yesmore';
					$theifmorenumber = get_option('cresta_social_shares_show_ifmorenumber');
				}
				$totalmorezero = get_option('cresta_social_shares_total_text_only_zero');
				$thetotalifmore = 'totalnomore';
				if($totalmorezero == 1 ) {
					$thetotalifmore = 'totalyesmore';
				}
				if(in_array('facebook',$buttons)) {
					$fbappid = get_option('cresta_social_shares_facebook_appid');
					$fbappsecret = get_option('cresta_social_shares_facebook_appsecret');
					$theToken = $fbappid.'|'.$fbappsecret;
					if ($fbappid && $fbappsecret) {
						$obj=new crestaShareSocialCountPRO (get_permalink());
						wp_localize_script( 'cresta-social-counter-js', 'crestaShareSSS', array( 'FacebookCount' => $obj->get_facebook($theToken) ) );
					} else {
						wp_localize_script( 'cresta-social-counter-js', 'crestaShareSSS', array( 'FacebookCount' => 'nope' ) );
					}
				}
				if(in_array('stumbleupon',$buttons)) {
					$obj=new crestaShareSocialCountPRO (get_permalink());
					wp_localize_script( 'cresta-social-counter-js', 'crestaShareS', array( 'StumbleCount' => $obj->get_stumble() ) );
				}
				if(in_array('linkedin',$buttons)) {
					$linkedin_count_method = get_option('cresta_social_shares_linkedin_alternative_count');
					if ($linkedin_count_method == 0) {
						$obj=new crestaShareSocialCountPRO (get_permalink());
						wp_localize_script( 'cresta-social-counter-js', 'crestaShareSS', array( 'LinkedinCount' => $obj->get_linkedin() ) );
					} else {
						wp_localize_script( 'cresta-social-counter-js', 'crestaShareSS', array( 'LinkedinCount' => 'nope' ) );
					}
				}
				wp_localize_script( 'cresta-social-counter-js', 'crestaPermalink', array('thePermalink' => get_permalink(), 'themorezero' => $theifmore, 'totalmorezero' => $thetotalifmore, 'themorenumber' => $theifmorenumber ) );
			}
		}
	}
	global $post;
	if ( is_singular() && !in_array( $cresta_current_post_type, $show_on ) && has_shortcode( $post->post_content, 'cresta-social-share' ) ) {
		$checkCrestaMetaBox = get_post_meta(get_the_ID(), '_get_cresta_plugin', true);
		if( $checkCrestaMetaBox != '1') {
			
			$hover_animation = get_option('cresta_social_shares_choose_hover');
			$enable_animation = get_option('cresta_social_shares_enable_animation');
			$show_floatbutton = get_option('cresta_social_shares_show_floatbutton');
			$stick_floatbutton = get_option('cresta_social_shares_stick_floatbutton');

			wp_enqueue_style( 'cresta-social-crestafont', plugins_url('css/csscfont.css',__FILE__), array(), CRESTA_SOCIAL_PLUGIN_VERSION);
			wp_enqueue_style( 'cresta-social-wp-style', plugins_url('css/cresta-wp-css.css',__FILE__), array(), CRESTA_SOCIAL_PLUGIN_VERSION);
			
			if ($hover_animation != 'cresta-no-animation') {
				wp_enqueue_style( 'cresta-social-hover', plugins_url('css/cresta-hover.css',__FILE__), array(), CRESTA_SOCIAL_PLUGIN_VERSION);
			}
			
			if($show_floatbutton == 1 && $enable_animation == 1) {
				wp_enqueue_style( 'cresta-social-animate', plugins_url('css/animate.min.css',__FILE__), array(), CRESTA_SOCIAL_PLUGIN_VERSION);
			}
			wp_enqueue_script( 'cresta-social-effect-js', plugins_url('js/jquery.cresta-social-effect.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
			
			$show_count = get_option('cresta_social_shares_show_counter');
			$buttons = explode (',',get_option( 'selected_button' ));
			
			if(in_array('whatsapp',$buttons) || in_array('telegram',$buttons) ) {
				wp_enqueue_script( 'cresta-social-whatsapp-js', plugins_url('js/jquery.cresta-social-whatsapp.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
			}
			
			if($stick_floatbutton == 1 && $show_floatbutton == 1) {
				wp_enqueue_script( 'cresta-social-stick-buttons-js', plugins_url('js/jquery.cresta-stick-buttons.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
				$distanceStickTop = get_option('cresta_social_shares_stick_position_top');
				$distanceStickLeft = get_option('cresta_social_shares_stick_position_left');
				wp_localize_script( 'cresta-social-stick-buttons-js', 'crestaSetting', array( 'distanceTop' => $distanceStickTop, 'distanceLeft' => $distanceStickLeft ) );
			}
			
			if($show_count == 1) { 
				if (get_option('cresta_social_shares_http_https_both') == 1) {
					wp_enqueue_script( 'cresta-social-counter-js', plugins_url('js/jquery.cresta-social-share-counter-both.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
				} else {
					wp_enqueue_script( 'cresta-social-counter-js', plugins_url('js/jquery.cresta-social-share-counter.js',__FILE__), array('jquery'), CRESTA_SOCIAL_PLUGIN_VERSION, true );
				}
				$ifmorezero = get_option('cresta_social_shares_show_ifmorezero');
				$theifmore = 'nomore';
				$theifmorenumber = '0';
				if($ifmorezero == 1 ) {
					$theifmore = 'yesmore';
					$theifmorenumber = get_option('cresta_social_shares_show_ifmorenumber');
				}
				$totalmorezero = get_option('cresta_social_shares_total_text_only_zero');
				$thetotalifmore = 'totalnomore';
				if($totalmorezero == 1 ) {
					$thetotalifmore = 'totalyesmore';
				}
				if(in_array('facebook',$buttons)) {
					$fbappid = get_option('cresta_social_shares_facebook_appid');
					$fbappsecret = get_option('cresta_social_shares_facebook_appsecret');
					$theToken = $fbappid.'|'.$fbappsecret;
					if ($fbappid && $fbappsecret) {
						$obj=new crestaShareSocialCountPRO (get_permalink());
						wp_localize_script( 'cresta-social-counter-js', 'crestaShareSSS', array( 'FacebookCount' => $obj->get_facebook($theToken) ) );
					} else {
						wp_localize_script( 'cresta-social-counter-js', 'crestaShareSSS', array( 'FacebookCount' => 'nope' ) );
					}
				}
				if(in_array('stumbleupon',$buttons)) {
					$obj=new crestaShareSocialCountPRO (get_permalink());
					wp_localize_script( 'cresta-social-counter-js', 'crestaShareS', array( 'StumbleCount' => $obj->get_stumble() ) );
				}
				if(in_array('linkedin',$buttons)) {
					$linkedin_count_method = get_option('cresta_social_shares_linkedin_alternative_count');
					if ($linkedin_count_method == 0) {
						$obj=new crestaShareSocialCountPRO (get_permalink());
						wp_localize_script( 'cresta-social-counter-js', 'crestaShareSS', array( 'LinkedinCount' => $obj->get_linkedin() ) );
					} else {
						wp_localize_script( 'cresta-social-counter-js', 'crestaShareSS', array( 'LinkedinCount' => 'nope' ) );
					}
				}
				wp_localize_script( 'cresta-social-counter-js', 'crestaPermalink', array('thePermalink' => get_permalink(), 'themorezero' => $theifmore, 'totalmorezero' => $thetotalifmore, 'themorenumber' => $theifmorenumber ) );
			}
			
			$query_args = array(
				'family' => 'Noto+Sans:400,700'
			);
			wp_enqueue_style( 'cresta-social-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
		}
	}
	
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'cresta_social_setting_link' );

add_action('wp_footer', 'add_social_button');

function cresta_social_register_option() {
		register_setting( 'cresta_social_license', 'selected_button','crestasocialshare_options_validate_1' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_selected_page','crestasocialshare_options_validate_2' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_float','crestasocialshare_options_validate_3' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_float_buttons','crestasocialshare_options_validate_4' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_style','crestasocialshare_options_validate_5' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_position_top','crestasocialshare_options_validate_6' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_position_left','crestasocialshare_options_validate_7' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_twitter_username','crestasocialshare_options_validate_8' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_show_counter','crestasocialshare_options_validate_9' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_show_ifmorezero','crestasocialshare_options_validate_10' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_show_ifmorenumber','crestasocialshare_options_validate_71' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_show_total','crestasocialshare_options_validate_11' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_total_text','crestasocialshare_options_validate_12' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_disable_mobile','crestasocialshare_options_validate_13' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_enable_animation','crestasocialshare_options_validate_14' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_choose_animation','crestasocialshare_options_validate_15' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_enable_samecolors','crestasocialshare_options_validate_16' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_choose_hover','crestasocialshare_options_validate_17' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_before_content','crestasocialshare_options_validate_18' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_after_content','crestasocialshare_options_validate_19' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_text_color_single','crestasocialshare_options_validate_20' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_background_color_single','crestasocialshare_options_validate_21' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_text_color_total','crestasocialshare_options_validate_22' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_show_floatbutton','crestasocialshare_options_validate_23' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_stick_floatbutton','crestasocialshare_options_validate_24' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_stick_position_top','crestasocialshare_options_validate_25' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_stick_position_left','crestasocialshare_options_validate_26' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_show_tooltip','crestasocialshare_options_validate_27' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_facebook','crestasocialshare_options_validate_28' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_twitter','crestasocialshare_options_validate_29' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_googleplus','crestasocialshare_options_validate_30' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_linkedin','crestasocialshare_options_validate_31' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_pinterest','crestasocialshare_options_validate_32' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_stumbleupon','crestasocialshare_options_validate_33' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_vk','crestasocialshare_options_validate_34' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_buffer','crestasocialshare_options_validate_35' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_reddit','crestasocialshare_options_validate_36' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_ok','crestasocialshare_options_validate_37' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_xing','crestasocialshare_options_validate_60' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_whatsapp','crestasocialshare_options_validate_38' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_telegram','crestasocialshare_options_validate_67' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_email','crestasocialshare_options_validate_39' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_tooltip_print','crestasocialshare_options_validate_40' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_enable_shadow','crestasocialshare_options_validate_41' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_enable_shadow_buttons','crestasocialshare_options_validate_42' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_z_index','crestasocialshare_options_validate_43' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_button_size','crestasocialshare_options_validate_44' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_button_hide_show','crestasocialshare_options_validate_45' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_colors_option','crestasocialshare_options_validate_46' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_facebook_color','crestasocialshare_options_validate_47' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_twitter_color','crestasocialshare_options_validate_48' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_gplus_color','crestasocialshare_options_validate_49' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_linkedin_color','crestasocialshare_options_validate_50' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_pinterest_color','crestasocialshare_options_validate_51' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_stumbleupon_color','crestasocialshare_options_validate_52' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_vk_color','crestasocialshare_options_validate_53' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_buffer_color','crestasocialshare_options_validate_54' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_reddit_color','crestasocialshare_options_validate_55' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_ok_color','crestasocialshare_options_validate_56' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_xing_color','crestasocialshare_options_validate_61' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_whatsapp_color','crestasocialshare_options_validate_57' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_telegram_color','crestasocialshare_options_validate_68' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_mail_color','crestasocialshare_options_validate_58' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_print_color','crestasocialshare_options_validate_59' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_custom_css','crestasocialshare_options_validate_62' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_twitter_shares','crestasocialshare_options_validate_63' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_facebook_appid','crestasocialshare_options_validate_64' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_facebook_appsecret','crestasocialshare_options_validate_65' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_pintmode','crestasocialshare_options_validate_66' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_total_text_only_zero','crestasocialshare_options_validate_69' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_linkedin_alternative_count','crestasocialshare_options_validate_70' );
		register_setting( 'cresta_social_license', 'cresta_social_shares_http_https_both','crestasocialshare_options_validate_72' );
		register_setting( 'cresta_social_license', 'cresta_social_license_key', 'cresta_sanitize_license' );
	
		add_option( 'selected_button', 'facebook,tweet,gplus,pinterest,linkedin' );
		add_option( 'cresta_social_shares_selected_page', 'page,post' );
		add_option( 'cresta_social_shares_float', 'left' );
		add_option( 'cresta_social_shares_float_buttons', 'right' );
		add_option( 'cresta_social_shares_style', 'first_style' );
		add_option( 'cresta_social_shares_position_top', '10' );
		add_option( 'cresta_social_shares_position_left', '20' );
		add_option( 'cresta_social_shares_twitter_username', '' );
		add_option( 'cresta_social_shares_show_counter', '1' );
		add_option( 'cresta_social_shares_show_ifmorezero', '0' );
		add_option( 'cresta_social_shares_show_ifmorenumber', '0' );
		add_option( 'cresta_social_shares_show_total', '1' );
		add_option( 'cresta_social_shares_total_text_only_zero', '0' );
		add_option( 'cresta_social_shares_total_text', 'Shares' );
		add_option( 'cresta_social_shares_disable_mobile', '1' );
		add_option( 'cresta_social_shares_enable_animation', '1' );
		add_option( 'cresta_social_shares_choose_animation', 'flipInX' );
		add_option( 'cresta_social_shares_enable_samecolors', '0' );
		add_option( 'cresta_social_shares_choose_hover', 'cresta-float-shadow' );
		add_option( 'cresta_social_shares_before_content', '0' );
		add_option( 'cresta_social_shares_after_content', '1' );
		add_option( 'cresta_social_shares_text_color_single', '#ffffff' );
		add_option( 'cresta_social_shares_background_color_single', '#D60000' );
		add_option( 'cresta_social_shares_text_color_total', '#000000' );
		add_option( 'cresta_social_shares_show_floatbutton', '1' );
		add_option( 'cresta_social_shares_stick_floatbutton', '0' );
		add_option( 'cresta_social_shares_stick_position_top', '40' );
		add_option( 'cresta_social_shares_stick_position_left', '60' );
		add_option( 'cresta_social_shares_show_tooltip', '1' );
		add_option( 'cresta_social_shares_tooltip_facebook', 'Share to Facebook' );
		add_option( 'cresta_social_shares_tooltip_twitter', 'Share to Twitter' );
		add_option( 'cresta_social_shares_tooltip_googleplus', 'Share to Google Plus' );
		add_option( 'cresta_social_shares_tooltip_linkedin', 'Share to Linkedin' );
		add_option( 'cresta_social_shares_tooltip_pinterest', 'Share to Pinterest' );
		add_option( 'cresta_social_shares_tooltip_stumbleupon', 'Share to StumbleUpon' );
		add_option( 'cresta_social_shares_tooltip_vk', 'Share to VK' );
		add_option( 'cresta_social_shares_tooltip_buffer', 'Share to Buffer' );
		add_option( 'cresta_social_shares_tooltip_reddit', 'Share to Reddit' );
		add_option( 'cresta_social_shares_tooltip_ok', 'Share to OK.ru' );
		add_option( 'cresta_social_shares_tooltip_xing', 'Share to Xing' );
		add_option( 'cresta_social_shares_tooltip_whatsapp', 'Share to WhatsApp' );
		add_option( 'cresta_social_shares_tooltip_telegram', 'Share to Telegram' );
		add_option( 'cresta_social_shares_tooltip_email', 'Share via Email' );
		add_option( 'cresta_social_shares_tooltip_print', 'Print this' );
		add_option( 'cresta_social_shares_enable_shadow', '1' );
		add_option( 'cresta_social_shares_enable_shadow_buttons', '0' );
		add_option( 'cresta_social_shares_z_index', '99' );
		add_option( 'cresta_social_shares_button_size', '0' );
		add_option( 'cresta_social_shares_button_hide_show', '0' );
		add_option( 'cresta_social_shares_colors_option', 'default_colors' );
		add_option( 'cresta_social_shares_facebook_color', '#3b5998' );
		add_option( 'cresta_social_shares_twitter_color', '#4099FF' );
		add_option( 'cresta_social_shares_gplus_color', '#D34836' );
		add_option( 'cresta_social_shares_linkedin_color', '#007bb6' );
		add_option( 'cresta_social_shares_pinterest_color', '#cb2027' );
		add_option( 'cresta_social_shares_stumbleupon_color', '#eb4924' );
		add_option( 'cresta_social_shares_vk_color', '#45668e' );
		add_option( 'cresta_social_shares_buffer_color', '#323b43' );
		add_option( 'cresta_social_shares_reddit_color', '#ff4500' );
		add_option( 'cresta_social_shares_ok_color', '#ed812b' );
		add_option( 'cresta_social_shares_xing_color', '#026466' );
		add_option( 'cresta_social_shares_whatsapp_color', '#34af23' );
		add_option( 'cresta_social_shares_telegram_color', '#0088cc' );
		add_option( 'cresta_social_shares_mail_color', '#ffb62a' );
		add_option( 'cresta_social_shares_print_color', '#36c1c8' );
		add_option( 'cresta_social_shares_custom_css', '' );
		add_option( 'cresta_social_shares_twitter_shares', '0' );
		add_option( 'cresta_social_shares_facebook_appid', '' );
		add_option( 'cresta_social_shares_facebook_appsecret', '' );
		add_option( 'cresta_social_shares_pintmode', 'featimage');
		add_option( 'cresta_social_shares_linkedin_alternative_count', '0');
		add_option( 'cresta_social_shares_http_https_both', '0');
}
add_action( 'admin_init', 'cresta_social_register_option' );

/* Cresta Social Share CounterWP Head Filter */
function cresta_social_css_top() {

	if ( is_singular() ) {

	$show_floatbutton = get_option('cresta_social_shares_show_floatbutton');
	$stick_floatbutton = get_option('cresta_social_shares_stick_floatbutton');
	$text_color_single = get_option('cresta_social_shares_text_color_single');
	$background_color_single = get_option('cresta_social_shares_background_color_single');
	$text_color_total = get_option('cresta_social_shares_text_color_total');
	$button_style = get_option('cresta_social_shares_style');
	$buttons_position = get_option('cresta_social_shares_float_buttons');
	$before_content = get_option('cresta_social_shares_before_content');
	$after_content = get_option('cresta_social_shares_after_content');
	$shadow_on_buttons = get_option('cresta_social_shares_enable_shadow_buttons');
	$enable_sameColors = get_option('cresta_social_shares_enable_samecolors');
	$custom_css = get_option('cresta_social_shares_custom_css');
	
	echo "<style type='text/css'>";
	
	if ($shadow_on_buttons == 1) {
		echo ".cresta-share-icon .sbutton, .cresta-share-icon .sbutton-total {text-shadow: 1px 1px 0px rgba(0, 0, 0, .4);}";
	}
	
	if ( $show_floatbutton ==1 ) {
		$disable = get_option('cresta_social_shares_disable_mobile');
		$float = get_option('cresta_social_shares_float');
		$position_top =  get_option('cresta_social_shares_position_top');
		$position_left =  get_option('cresta_social_shares_position_left');
		$enable_animation = get_option('cresta_social_shares_enable_animation');
		$z_index = get_option('cresta_social_shares_z_index');

		if($disable == 1) {
			echo "
			@media (max-width : 640px) {
				#crestashareicon {
					display:none !important;
				}
			}";
		}
		if($stick_floatbutton == 1) {
			$distanceStickTop = get_option('cresta_social_shares_stick_position_top');
			echo "
				#crestashareicon {z-index:". intval($z_index) ."; position: absolute; visibility: hidden; opacity: 0; -webkit-transition: opacity .3s ease-in-out, visibility .3s ease-in-out; -moz-transition: opacity .3s ease-in-out, visibility .3s ease-in-out; -ms-transition: opacity .3s ease-in-out, visibility .3s ease-in-out; -o-transition: opacity .3s ease-in-out, visibility .3s ease-in-out; transition: opacity .3s ease-in-out, visibility .3s ease-in-out;}
				.crestaFixed {top: ". intval($distanceStickTop) ."px !important;}
			";
		} else {
			echo "
				#crestashareicon {position:fixed; top:". intval($position_top) ."%; ". esc_attr($float) .":". intval($position_left) ."px; float:left;z-index:". intval($z_index) .";}
			";
		}
		echo "
		.cresta-share-icon .cresta-the-count, #crestashareicon .sbutton a[data-name]:hover:before {color:". esc_attr($text_color_single) ."!important;}
		";
		if($enable_sameColors == 0) {
			echo "
			.cresta-share-icon .cresta-the-count, #crestashareicon .sbutton a[data-name]:hover:before {background: " . esc_attr($background_color_single) . "!important;}
			#crestashareicon .sbutton a[data-name]:hover:after {border-color: " . esc_attr($background_color_single) . " transparent !important;}
			";
		}
		
		if ($button_style == "sixth_style") {
			echo ".cresta-share-icon.sixth_style .cresta-the-count:before {border-right: 5px solid " . esc_attr($background_color_single) . "!important;} ";
		}
		if ($button_style == "ninth_style") {
			echo ".cresta-share-icon.ninth_style .cresta-the-count:before {border-bottom: 8px solid " . esc_attr($background_color_single) . " !important;} .cresta-share-icon.ninth_style .cresta-the-count:after {border-bottom: 8px solid " . esc_attr($background_color_single) . " !important;}";
		}
		if ($button_style == "tenth_style") {
			echo ".cresta-share-icon.tenth_style .cresta-the-count:before {border-top: 7px solid " . esc_attr($background_color_single) . " !important;} .cresta-share-icon.tenth_style .cresta-the-count:after {border-bottom: 7px solid " . esc_attr($background_color_single) . " !important;}";
		}
		if ($button_style == "thirteenth_style") {
			echo ".cresta-share-icon.thirteenth_style .cresta-the-count:before {border-right: 7px solid " . esc_attr($background_color_single) . "!important;} ";
		}
		echo "
		.cresta-share-icon .cresta-the-total-count, .cresta-share-icon .cresta-the-total-text {color:". esc_attr($text_color_total) ."!important;}
		#crestashareicon .sbutton {clear:both;";if($enable_animation == 1) { echo 'display:none;'; }  echo "}
		";
		
		if($float == "right") {
			echo "#crestashareicon .sbutton {float:right;} #crestashareicon .sbutton a[data-name]:hover:before {left: inherit; right:0;}";
			if ($button_style == "first_style") {
				echo ".cresta-share-icon.first_style .cresta-the-count {left: -11px;}";
			}
			if ($button_style == "second_style") {
				echo ".cresta-share-icon.second_style .cresta-the-count {left: -11px;}";
			}
			if ($button_style == "third_style") {
				echo ".cresta-share-icon.third_style .cresta-the-count {float: left;}";
			}
			if ($button_style == "fourth_style") {
				echo ".cresta-share-icon.fourth_style .cresta-the-count {left: -11px;}";
			}
			if ($button_style == "sixth_style") {
				echo ".cresta-share-icon.sixth_style .cresta-the-count {float: left; margin-right: 7px;}
				.cresta-share-icon.sixth_style .cresta-the-count:before {border-left: 5px solid " . esc_attr($background_color_single) . "!important; right: -5px; border-right: 0px !important; left: inherit;}";
			}
			if ($button_style == "seventh_style") {
				echo ".cresta-share-icon.seventh_style .cresta-the-count {left: -11px; bottom: -10px; top: inherit;}";
			}
			if ($button_style == "eighth_style") {
				echo ".cresta-share-icon.eighth_style i {text-align: right !important;}
				.cresta-share-icon.eighth_style .cresta-the-count {left: -7px;}";
			}
			if ($button_style == "tenth_style") {
				echo ".cresta-share-icon.tenth_style i {padding: 5px 5px 0px 5px;text-align: right !important;}
				.cresta-share-icon.tenth_style .cresta-the-count {bottom: 0px; top: inherit; left: -7px;}";
			}
			if ($button_style == "thirteenth_style") {
				echo ".cresta-share-icon.thirteenth_style .cresta-the-count {float: left; margin-right: 0;}
				.cresta-share-icon.thirteenth_style .cresta-the-count:before {border-left: 7px solid " . esc_attr($background_color_single) . "!important; right: -7px; border-right: 0px !important; left: inherit;}";
			}
			if ($button_style == "sixteenth_style") {
				echo ".cresta-share-icon.sixteenth_style .cresta-the-count {left: -11px;}";
			}
		} else {
			echo "#crestashareicon .sbutton { float:left;}";
		}
	}
	
	global $post;
	if ($before_content == 1 || $after_content == 1 || has_shortcode( $post->post_content, 'cresta-social-share' )) {
		/* Style In Content */		
		$theButtonStyleC = '';
		if($enable_sameColors == 0) {
			if ($button_style == "sixth_style") {
				$theButtonStyleC = ".cresta-share-icon.sixth_style .cresta-the-count-content:before {border-right: 5px solid " . esc_attr($background_color_single) . "!important;} ";
			}
			if ($button_style == "ninth_style") {
				$theButtonStyleC = ".cresta-share-icon.ninth_style .cresta-the-count-content:before {border-bottom: 8px solid " . esc_attr($background_color_single) . " !important;} .cresta-share-icon.ninth_style .cresta-the-count-content:after {border-bottom: 8px solid " . esc_attr($background_color_single) . " !important;}";
			}
			if ($button_style == "tenth_style") {
				$theButtonStyleC = ".cresta-share-icon.tenth_style .cresta-the-count-content:before {border-top: 7px solid " . esc_attr($background_color_single) . " !important;} .cresta-share-icon.tenth_style .cresta-the-count-content:after {border-bottom: 7px solid " . esc_attr($background_color_single) . " !important;}";
			}
			if ($button_style == "thirteenth_style") {
				$theButtonStyleC = ".cresta-share-icon.thirteenth_style .cresta-the-count-content:before {border-right: 7px solid " . esc_attr($background_color_single) . "!important;} ";
			}
		}
		if ($buttons_position == 'center') {
			echo '#crestashareiconincontent {float: none; margin: 0 auto; display: table;}';
		} else {
			echo '#crestashareiconincontent {float: '. esc_attr($buttons_position) .';}';
		}
		echo '
		.cresta-share-icon .cresta-the-count-content, #crestashareiconincontent .sbutton a[data-name]:hover:before {color:'. esc_attr($text_color_single) .'!important;} 
		.cresta-share-icon .cresta-the-total-count, .cresta-share-icon .cresta-the-total-text {color:'. esc_attr($text_color_total) .'!important;} 
		#crestashareiconincontent .sbutton-total {border-right: 2px solid '. esc_attr($text_color_total) .'!important;} ' . esc_attr($theButtonStyleC) . '
		';
		if($enable_sameColors == 0) {
			echo '
			.cresta-share-icon .cresta-the-count-content, #crestashareiconincontent .sbutton a[data-name]:hover:before {background: ' . esc_attr($background_color_single) . '!important;}
			#crestashareiconincontent .sbutton a[data-name]:hover:after, #crestashareicon .sbutton a[data-name]:hover:after {border-color: ' . esc_attr($background_color_single) . ' transparent !important;} 
			';
		}
	}
	if (get_option( 'cresta_social_shares_colors_option' ) == 'custom_colors') {
		$buttons = explode (',',get_option( 'selected_button' ));
		if(in_array('facebook',$buttons)) {
			$facebook_color = get_option('cresta_social_shares_facebook_color');
			if ($facebook_color != '#3b5998') {
				echo '
				.cresta-share-icon i.c-icon-cresta-facebook {background: ' . esc_attr($facebook_color) . ';}
				.cresta-share-icon i.c-icon-cresta-facebook:hover {border: 2px solid ' . esc_attr($facebook_color) . '!important; color: ' . esc_attr($facebook_color) . '; }
				';
			}
		}
		if(in_array('tweet',$buttons)) {
			$twitter_color = get_option('cresta_social_shares_twitter_color');
			if ($twitter_color != '#4099FF') {
				echo '
				.cresta-share-icon i.c-icon-cresta-twitter {background: ' . esc_attr($twitter_color) . ';}
				.cresta-share-icon i.c-icon-cresta-twitter:hover {border: 2px solid ' . esc_attr($twitter_color) . '!important; color: ' . esc_attr($twitter_color) . '; }
				';
			}
		}
		if(in_array('gplus',$buttons)) {
			$gplus_color = get_option('cresta_social_shares_gplus_color');
			if ($gplus_color != '#D34836') {
				echo '
				.cresta-share-icon i.c-icon-cresta-gplus {background: ' . esc_attr($gplus_color) . ';}
				.cresta-share-icon i.c-icon-cresta-gplus:hover {border: 2px solid ' . esc_attr($gplus_color) . '!important; color: ' . esc_attr($gplus_color) . '; }
				';
			}
		}
		if(in_array('linkedin',$buttons)) {
			$linkedin_color = get_option('cresta_social_shares_linkedin_color');
			if ($linkedin_color != '#007bb6') {
				echo '
				.cresta-share-icon i.c-icon-cresta-linkedin {background: ' . esc_attr($linkedin_color) . ';}
				.cresta-share-icon i.c-icon-cresta-linkedin:hover {border: 2px solid ' . esc_attr($linkedin_color) . '!important; color: ' . esc_attr($linkedin_color) . '; }
				';
			}
		}
		if(in_array('pinterest',$buttons)) {
			$pinterest_color = get_option('cresta_social_shares_pinterest_color');
			if ($pinterest_color != '#cb2027') {
				echo '
				.cresta-share-icon i.c-icon-cresta-pinterest {background: ' . esc_attr($pinterest_color) . ';}
				.cresta-share-icon i.c-icon-cresta-pinterest:hover {border: 2px solid ' . esc_attr($pinterest_color) . '!important; color: ' . esc_attr($pinterest_color) . '; }
				';
			}
		}
		if(in_array('stumbleupon',$buttons)) {
			$stumbleupon_color = get_option('cresta_social_shares_stumbleupon_color');
			if ($stumbleupon_color != '#eb4924') {
				echo '
				.cresta-share-icon i.c-icon-cresta-stumbleupon {background: ' . esc_attr($stumbleupon_color) . ';}
				.cresta-share-icon i.c-icon-cresta-stumbleupon:hover {border: 2px solid ' . esc_attr($stumbleupon_color) . '!important; color: ' . esc_attr($stumbleupon_color) . '; }
				';
			}
		}
		if(in_array('vk',$buttons)) {
			$vk_color = get_option('cresta_social_shares_vk_color');
			if ($vk_color != '#45668e') {
				echo '
				.cresta-share-icon i.c-icon-cresta-vkontakte {background: ' . esc_attr($vk_color) . ';}
				.cresta-share-icon i.c-icon-cresta-vkontakte:hover {border: 2px solid ' . esc_attr($vk_color) . '!important; color: ' . esc_attr($vk_color) . '; }
				';
			}
		}
		if(in_array('buffer',$buttons)) {
			$buffer_color = get_option('cresta_social_shares_buffer_color');
			if ($buffer_color != '#323b43') {
				echo '
				.cresta-share-icon i.c-icon-cresta-buffer {background: ' . esc_attr($buffer_color) . ';}
				.cresta-share-icon i.c-icon-cresta-buffer:hover {border: 2px solid ' . esc_attr($buffer_color) . '!important; color: ' . esc_attr($buffer_color) . '; }
				';
			}
		}
		if(in_array('reddit',$buttons)) {
			$reddit_color = get_option('cresta_social_shares_reddit_color');
			if ($reddit_color != '#ff4500') {
				echo '
				.cresta-share-icon i.c-icon-cresta-reddit {background: ' . esc_attr($reddit_color) . ';}
				.cresta-share-icon i.c-icon-cresta-reddit:hover {border: 2px solid ' . esc_attr($reddit_color) . '!important; color: ' . esc_attr($reddit_color) . '; }
				';
			}
		}
		if(in_array('ok',$buttons)) {
			$ok_color = get_option('cresta_social_shares_ok_color');
			if ($ok_color != '#ed812b') {
				echo '
				.cresta-share-icon i.c-icon-cresta-ok {background: ' . esc_attr($ok_color) . ';}
				.cresta-share-icon i.c-icon-cresta-ok:hover {border: 2px solid ' . esc_attr($ok_color) . '!important; color: ' . esc_attr($ok_color) . '; }
				';
			}
		}
		if(in_array('xing',$buttons)) {
			$xing_color = get_option('cresta_social_shares_xing_color');
			if ($ok_color != '#026466') {
				echo '
				.cresta-share-icon i.c-icon-cresta-xing {background: ' . esc_attr($xing_color) . ';}
				.cresta-share-icon i.c-icon-cresta-xing:hover {border: 2px solid ' . esc_attr($xing_color) . '!important; color: ' . esc_attr($xing_color) . '; }
				';
			}
		}
		if(in_array('whatsapp',$buttons)) {
			$whatsapp_color = get_option('cresta_social_shares_whatsapp_color');
			if ($whatsapp_color != '#34af23') {
				echo '
				.cresta-share-icon i.c-icon-cresta-whatsapp {background: ' . esc_attr($whatsapp_color) . ';}
				.cresta-share-icon i.c-icon-cresta-whatsapp:hover {border: 2px solid ' . esc_attr($whatsapp_color) . '!important; color: ' . esc_attr($whatsapp_color) . '; }
				';
			}
		}
		if(in_array('telegram',$buttons)) {
			$telegram_color = get_option('cresta_social_shares_telegram_color');
			if ($telegram_color != '#0088cc') {
				echo '
				.cresta-share-icon i.c-icon-cresta-telegram {background: ' . esc_attr($telegram_color) . ';}
				.cresta-share-icon i.c-icon-cresta-telegram:hover {border: 2px solid ' . esc_attr($telegram_color) . '!important; color: ' . esc_attr($telegram_color) . '; }
				';
			}
		}
		if(in_array('email',$buttons)) {
			$mail_color = get_option('cresta_social_shares_mail_color');
			if ($mail_color != '#ffb62a') {
				echo '
				.cresta-share-icon i.c-icon-cresta-mail {background: ' . esc_attr($mail_color) . ';}
				.cresta-share-icon i.c-icon-cresta-mail:hover {border: 2px solid ' . esc_attr($mail_color) . '!important; color: ' . esc_attr($mail_color) . '; }
				';
			}
		}
		if(in_array('print',$buttons)) {
			$print_color = get_option('cresta_social_shares_print_color');
			if ($print_color != '#36c1c8') {
				echo '
				.cresta-share-icon i.c-icon-cresta-print {background: ' . esc_attr($print_color) . ';}
				.cresta-share-icon i.c-icon-cresta-print:hover {border: 2px solid ' . esc_attr($print_color) . '!important; color: ' . esc_attr($print_color) . '; }
				';
			}
		}
	}
	if ($custom_css) {
		echo esc_html($custom_css);
	}
	echo "</style>";
	}
}

/* Cresta Social Share Counter In Content Position */
function cresta_filter_in_content( $content ) { 
	$cresta_current_post_type = get_post_type();
	$before_content = get_option('cresta_social_shares_before_content');
	$after_content = get_option('cresta_social_shares_after_content');
	$stick_floatbutton = get_option('cresta_social_shares_stick_floatbutton');
	$show_on = explode (',',get_option( 'cresta_social_shares_selected_page' ));

	if ( is_singular() && !in_array( $cresta_current_post_type, $show_on )  ) {
		return $content;
	}
	if (is_front_page() ) {
		if ( 'page' == get_option('show_on_front') && !in_array( 'page', $show_on) ) {
			return $content;
		}
	}
	if( is_search() || is_404() || is_archive() || is_home() || is_feed() ) {
		return $content;
	}
	$checkCrestaMetaBox = get_post_meta(get_the_ID(), '_get_cresta_plugin', true);
	if ( $checkCrestaMetaBox == '1' ) {
		return $content;
	}
	if( in_array( 'get_the_excerpt', $GLOBALS['wp_current_filter'] ) ) {
		return $content;
	}
	
	$addd_social_button_in_content = do_shortcode( add_social_button_in_content() );
		
	if($before_content == 1) {
		$content = $addd_social_button_in_content.$content;
	}
	if($after_content == 1) {
		$content .= $addd_social_button_in_content;
	}
	if($stick_floatbutton == 1) {
		$content = '<div class="crestaStickButtons"></div>'.$content;
		$content .= '<div class="crestaStickButtonsEnd"></div>';
	}
    return $content;
}

function add_social_button_in_content() {
	if ( is_singular() ) {
	$buttons = explode (',',get_option( 'selected_button' ));
	$show_count = get_option('cresta_social_shares_show_counter');
	$show_total = get_option ('cresta_social_shares_show_total');
	$total_text = get_option ('cresta_social_shares_total_text');
	$button_style = get_option('cresta_social_shares_style');
	$cresta_twitter_username = get_option('cresta_social_shares_twitter_username');
	$show_tooltip = get_option('cresta_social_shares_show_tooltip');
	$tooltip_facebook = get_option('cresta_social_shares_tooltip_facebook');
	$tooltip_twitter = get_option('cresta_social_shares_tooltip_twitter');
	$tooltip_googleplus = get_option('cresta_social_shares_tooltip_googleplus');
	$tooltip_linkedin = get_option('cresta_social_shares_tooltip_linkedin');
	$tooltip_pinterest = get_option('cresta_social_shares_tooltip_pinterest');
	$tooltip_stumbleupon = get_option('cresta_social_shares_tooltip_stumbleupon');
	$tooltip_vk = get_option('cresta_social_shares_tooltip_vk');
	$tooltip_buffer = get_option('cresta_social_shares_tooltip_buffer');
	$tooltip_reddit = get_option('cresta_social_shares_tooltip_reddit');
	$tooltip_ok = get_option('cresta_social_shares_tooltip_ok');
	$tooltip_xing = get_option('cresta_social_shares_tooltip_xing');
	$tooltip_whatsapp = get_option('cresta_social_shares_tooltip_whatsapp');
	$tooltip_telegram = get_option('cresta_social_shares_tooltip_telegram');
	$tooltip_email = get_option('cresta_social_shares_tooltip_email');
	$tooltip_print = get_option('cresta_social_shares_tooltip_print');
	$enable_shadow = get_option('cresta_social_shares_enable_shadow');
	$button_size = get_option('cresta_social_shares_button_size');
	$enable_sameColors = get_option('cresta_social_shares_enable_samecolors');
	$newTwitter = get_option('cresta_social_shares_twitter_shares');
	$pinterestMode = get_option('cresta_social_shares_pintmode', 'featimage');
	
	global $wp_query; 
	$post = $wp_query->post;
	
	if (wp_is_mobile()) {
		$hover_animation = 'cresta-no-animation';
	} else {
		$hover_animation = get_option('cresta_social_shares_choose_hover');
	}
	
	if($enable_shadow == 1) {
		$crestaShadow = 'crestaShadow';
	} else {
		$crestaShadow = '';
	}
	
	if($enable_sameColors == 1) {
		$crestaSame = 'sameColors' ;
	} else {
		$crestaSame = '';
	}
	
	if($button_size == 1) {
		$theSize = 'mini';
	} else {
		$theSize = '';
	}
	
	if($newTwitter == 1) {
		$theNewTwitter = 'withCount';
	} else {
		$theNewTwitter = 'noCount';
	}
	
	if ( '' != get_the_post_thumbnail( $post->ID ) ) {
		$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$pinImage = $pinterestimage[0];
	} else {
		$pinImage = esc_url(plugins_url( '/images/no-image-found.png' , __FILE__ ));
	}
	
	$allButtonsSelected = '';
	$theTwitterUsername = '';
	
	if ($cresta_twitter_username) {
		$theTwitterUsername = '&amp;via=' .esc_attr($cresta_twitter_username);
	}
	
	if($show_tooltip == 1) {
		$theTooltipFacebook = 'data-name="' .esc_attr($tooltip_facebook). '"';
		$theTooltipTwitter = 'data-name="' .esc_attr($tooltip_twitter). '"';
		$theTooltipGooglePlus = 'data-name="' .esc_attr($tooltip_googleplus). '"';
		$theTooltipLinkedin = 'data-name="' .esc_attr($tooltip_linkedin). '"';
		$theTooltipPinterest = 'data-name="' .esc_attr($tooltip_pinterest). '"';
		$theTooltipStumbleupon = 'data-name="' .esc_attr($tooltip_stumbleupon). '"';
		$theTooltipVk = 'data-name="' .esc_attr($tooltip_vk). '"';
		$theTooltipBuffer = 'data-name="' .esc_attr($tooltip_buffer). '"';
		$theTooltipReddit = 'data-name="' .esc_attr($tooltip_reddit). '"';
		$theTooltipOk = 'data-name="' .esc_attr($tooltip_ok). '"';
		$theTooltipXing = 'data-name="' .esc_attr($tooltip_xing). '"';
		$theTooltipWhatsapp = 'data-name="' .esc_attr($tooltip_whatsapp). '"';
		$theTooltipTelegram = 'data-name="' .esc_attr($tooltip_telegram). '"';
		$theTooltipEmail = 'data-name="' .esc_attr($tooltip_email). '"';
		$theTooltipPrint = 'data-name="' .esc_attr($tooltip_print). '"';
	} else {
		$theTooltipFacebook = '';
		$theTooltipTwitter = '';
		$theTooltipGooglePlus = '';
		$theTooltipLinkedin = '';
		$theTooltipPinterest = '';
		$theTooltipStumbleupon = '';
		$theTooltipVk = '';
		$theTooltipBuffer = '';
		$theTooltipReddit = '';
		$theTooltipOk = '';
		$theTooltipXing = '';
		$theTooltipWhatsapp = '';
		$theTooltipTelegram = '';
		$theTooltipEmail = '';
		$theTooltipPrint = '';
	}
	if($show_total == 1) { 
		$theTotalShares = '<div class="sbutton-total" id="total-shares-content"><span class="cresta-the-total-count" id="total-count-content"><i class="cs c-icon-cresta-spinner animate-spin"></i></span><span class="cresta-the-total-text">' .esc_html($total_text). '</span></div>';
	} else {
		$theTotalShares = '<div class="sbutton-total-no" id="total-shares-content"></div>';
	}
	
	if($show_count == 1) {
		$allButtonsSelected .=  $theTotalShares;
	}
	
	if(in_array('facebook',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' facebook-cresta-share '. esc_attr($hover_animation) .'" id="facebook-cresta-c"><a rel="nofollow" href="https://www.facebook.com/sharer.php?u='. urlencode(get_permalink( $post->ID )) .'&amp;t='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" ' . $theTooltipFacebook . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-facebook"></i></a></div>';
	}

	if(in_array('tweet',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' twitter-cresta-share '. esc_attr($theNewTwitter) .' '. esc_attr($hover_animation) .'" id="twitter-cresta-c"><a rel="nofollow" href="https://twitter.com/share?text='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;url='. urlencode(get_permalink( $post->ID )) .''. $theTwitterUsername .'" ' . $theTooltipTwitter . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-twitter"></i></a></div>';
	}

	if(in_array('gplus',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' googleplus-cresta-share '. esc_attr($hover_animation) .'" id="googleplus-cresta-c"><a rel="nofollow" href="https://plus.google.com/share?url='. urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipGooglePlus . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-gplus"></i></a></div>';
	}

	if(in_array('linkedin',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' linkedin-cresta-share '. esc_attr($hover_animation) .'" id="linkedin-cresta-c"><a rel="nofollow" href="https://www.linkedin.com/shareArticle?mini=true&amp;url='. urlencode(get_permalink( $post->ID )) .'&amp;title='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;source='. esc_url( home_url( '/' )) .'" ' . $theTooltipLinkedin . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-linkedin"></i></a></div>';
	}

	if(in_array('pinterest',$buttons)) {
		if ($pinterestMode == 'featimage') {
			$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' pinterest-cresta-share '. esc_attr($hover_animation) .'" id="pinterest-cresta-c"><a rel="nofollow" href="https://pinterest.com/pin/create/bookmarklet/?url='.urlencode(get_permalink( $post->ID )) .'&amp;media='. esc_url($pinImage) .'&amp;description='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" ' . $theTooltipPinterest . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-pinterest"></i></a></div>';
		} else {
			$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' pinterest-cresta-share '. esc_attr($hover_animation) .'" id="pinterest-cresta-c"><a rel="nofollow" href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;https://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());" ' . $theTooltipPinterest . '><i class="cs c-icon-cresta-pinterest"></i></a></div>';
		}
	}
	
	if(in_array('stumbleupon',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' stumbleupon-cresta-share '. esc_attr($hover_animation) .'" id="stumbleupon-cresta-c"><a rel="nofollow" href="https://www.stumbleupon.com/badge/?url='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipStumbleupon . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-stumbleupon"></i></a></div>';
	}
	
	if(in_array('vk',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' vk-cresta-share '. esc_attr($hover_animation) .'" id="vk-cresta-c"><a rel="nofollow" href="https://vk.com/share.php?url='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipVk . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-vkontakte"></i></a></div>';
	}
	
	if(in_array('buffer',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' buffer-cresta-share '. esc_attr($hover_animation) .'" id="buffer-cresta-c"><a rel="nofollow" href="https://bufferapp.com/add?&amp;text='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;url='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipBuffer . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-buffer"></i></a></div>';
	}
	
	if(in_array('reddit',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' reddit-cresta-share '. esc_attr($hover_animation) .'" id="reddit-cresta-c"><a rel="nofollow" href="https://www.reddit.com/submit?url='.urlencode(get_permalink( $post->ID )) .'&amp;title='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" ' . $theTooltipReddit . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-reddit"></i></a></div>';
	}
	
	if(in_array('ok',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' ok-cresta-share '. esc_attr($hover_animation) .'" id="ok-cresta-c"><a rel="nofollow" href="https://www.odnoklassniki.ru/dk?st.cmd=addShare&st._surl='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipOk . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-ok"></i></a></div>';
	}
	
	if(in_array('xing',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' xing-cresta-share '. esc_attr($hover_animation) .'" id="xing-cresta-c"><a rel="nofollow" href="https://www.xing.com/spi/shares/new?url='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipXing . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-xing"></i></a></div>';
	}
	
	if(in_array('whatsapp',$buttons) ) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' whatsapp-cresta-share '. esc_attr($hover_animation) .'" id="whatsapp-cresta-c"><a rel="nofollow" href="whatsapp://send?text='. htmlspecialchars(rawurlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .' - '.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipWhatsapp . '><i class="cs c-icon-cresta-whatsapp"></i></a></div>';
	}
	
	if(in_array('telegram',$buttons) ) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' telegram-cresta-share '. esc_attr($hover_animation) .'" id="telegram-cresta-c"><a rel="nofollow" href="tg://msg?text='. htmlspecialchars(rawurlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .' - '.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipTelegram . '><i class="cs c-icon-cresta-telegram"></i></a></div>';
	}
	
	if(in_array('email',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' email-cresta-share '. esc_attr($hover_animation) .'" id="email-cresta-c"><a rel="nofollow" href="mailto:?subject='. rawurlencode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) )) .'&amp;body='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipEmail . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-mail"></i></a></div>';
	}
	
	if(in_array('print',$buttons)) {
		$allButtonsSelected .= '<div class="sbutton '. esc_attr($crestaShadow) .' print-cresta-share '. esc_attr($hover_animation) .'" id="print-cresta-c"><a href="#" ' . $theTooltipPrint . ' onclick="window.print();"><i class="cs c-icon-cresta-print"></i></a></div>';
	}
	
	return '<!--www.crestaproject.com Cresta Social Share Counter Content Start--><div id="crestashareiconincontent" class="cresta-share-icon '. esc_attr($crestaSame) .' '. esc_attr($theSize) .' '. esc_attr($button_style) .'">'. $allButtonsSelected .'<div style="clear: both;"></div></div><div style="clear: both;"></div><!--www.crestaproject.com Cresta Social Share Counter Content End-->';
	}
}

/* Cresta Social Share Counter Float Position */
function add_social_button() {
	$show_floatbutton = get_option('cresta_social_shares_show_floatbutton');
if ( $show_floatbutton ==1 ) {
	$buttons = explode (',',get_option( 'selected_button' ));
	$show_on = explode (',',get_option( 'cresta_social_shares_selected_page' ));
	$show_count = get_option('cresta_social_shares_show_counter');
	$show_total = get_option ('cresta_social_shares_show_total');
	$total_text = get_option ('cresta_social_shares_total_text');
	$enable_animation = get_option('cresta_social_shares_enable_animation');
	$choose_animation = get_option('cresta_social_shares_choose_animation');
	$disable = get_option('cresta_social_shares_disable_mobile');
	$button_style = get_option('cresta_social_shares_style');
	$cresta_twitter_username = get_option('cresta_social_shares_twitter_username');
	$show_tooltip = get_option('cresta_social_shares_show_tooltip');
	$tooltip_facebook = get_option('cresta_social_shares_tooltip_facebook');
	$tooltip_twitter = get_option('cresta_social_shares_tooltip_twitter');
	$tooltip_googleplus = get_option('cresta_social_shares_tooltip_googleplus');
	$tooltip_linkedin = get_option('cresta_social_shares_tooltip_linkedin');
	$tooltip_pinterest = get_option('cresta_social_shares_tooltip_pinterest');
	$tooltip_stumbleupon = get_option('cresta_social_shares_tooltip_stumbleupon');
	$tooltip_vk = get_option('cresta_social_shares_tooltip_vk');
	$tooltip_buffer = get_option('cresta_social_shares_tooltip_buffer');
	$tooltip_reddit = get_option('cresta_social_shares_tooltip_reddit');
	$tooltip_ok = get_option('cresta_social_shares_tooltip_ok');
	$tooltip_xing = get_option('cresta_social_shares_tooltip_xing');
	$tooltip_whatsapp = get_option('cresta_social_shares_tooltip_whatsapp');
	$tooltip_telegram = get_option('cresta_social_shares_tooltip_telegram');
	$tooltip_email = get_option('cresta_social_shares_tooltip_email');
	$tooltip_print = get_option('cresta_social_shares_tooltip_print');
	$enable_shadow = get_option('cresta_social_shares_enable_shadow');
	$enable_sameColors = get_option('cresta_social_shares_enable_samecolors');
	$float = get_option('cresta_social_shares_float');
	$button_hide_show = get_option('cresta_social_shares_button_hide_show');
	$newTwitter = get_option('cresta_social_shares_twitter_shares');
	$pinterestMode = get_option('cresta_social_shares_pintmode', 'featimage');
	
	global $wp_query; 
	$post = $wp_query->post;
	
	if($enable_shadow == 1) {
		$crestaShadow = 'crestaShadow';
	} else {
		$crestaShadow = '';
	}
	
	if($enable_sameColors == 1) {
		$crestaSame = 'sameColors' ;
	} else {
		$crestaSame = '';
	}
	
	if($float == 'right') {
		$crestaFloat = 'right';
	} else {
		$crestaFloat = 'left';
	}
	
	if($newTwitter == 1) {
		$theNewTwitter = 'withCount';
	} else {
		$theNewTwitter = 'noCount';
	}
	
	if($disable == 1 && wp_is_mobile()) {
		return;
	} else {

	if( is_page() && !in_array( 'page', $show_on ) ) {
		return;
	}
	if( is_singular('post') && !in_array( 'post', $show_on ) ) {
		return;
	}
	if( is_attachment() && !in_array( 'attachment', $show_on ) ) {
		return;
	}
	if (is_front_page() ) {
		if ( 'page' == get_option('show_on_front') && !in_array( 'page', $show_on) ) {
			return;
		}
	}
	if( is_search() || is_404() || is_archive() || is_home() || is_feed() ) {
		return;
	}
	if( in_array( 'get_the_excerpt', $GLOBALS['wp_current_filter'] ) ) {
		return;
	}
	$argsPost = array(
		'public'   => true,
		'_builtin' => false
	);
	$post_types = get_post_types( $argsPost, 'names', 'and' ); 
	foreach ( $post_types  as $post_type ) { 
		if ( is_singular( $post_type ) && !in_array( $post_type, $show_on )  ) {
			return;
		}
	}
	$checkCrestaMetaBox = get_post_meta($post->ID, '_get_cresta_plugin', true);
	if ( $checkCrestaMetaBox == '1' ) {
		return;
	}

	if ( '' != get_the_post_thumbnail( $post->ID ) ) {
		$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$pinImage = $pinterestimage[0];
	} else {
		$pinImage = esc_url(plugins_url( '/images/no-image-found.png' , __FILE__ ));
	}
	if ($enable_animation == 1) {
		$the_animation = 'data-anim="'. esc_attr($choose_animation) .'"';
	} else {
		$the_animation = '';
	}
	
	if($show_tooltip == 1) {
		$theTooltipFacebook = 'data-name="' .esc_attr($tooltip_facebook). '"';
		$theTooltipTwitter = 'data-name="' .esc_attr($tooltip_twitter). '"';
		$theTooltipGooglePlus = 'data-name="' .esc_attr($tooltip_googleplus). '"';
		$theTooltipLinkedin = 'data-name="' .esc_attr($tooltip_linkedin). '"';
		$theTooltipPinterest = 'data-name="' .esc_attr($tooltip_pinterest). '"';
		$theTooltipStumbleupon = 'data-name="' .esc_attr($tooltip_stumbleupon). '"';
		$theTooltipVk = 'data-name="' .esc_attr($tooltip_vk). '"';
		$theTooltipBuffer = 'data-name="' .esc_attr($tooltip_buffer). '"';
		$theTooltipReddit = 'data-name="' .esc_attr($tooltip_reddit). '"';
		$theTooltipOk = 'data-name="' .esc_attr($tooltip_ok). '"';
		$theTooltipXing = 'data-name="' .esc_attr($tooltip_xing). '"';
		$theTooltipWhatsapp = 'data-name="' .esc_attr($tooltip_whatsapp). '"';
		$theTooltipTelegram = 'data-name="' .esc_attr($tooltip_telegram). '"';
		$theTooltipEmail = 'data-name="' .esc_attr($tooltip_email). '"';
		$theTooltipPrint = 'data-name="' .esc_attr($tooltip_print). '"';
	} else {
		$theTooltipFacebook = '';
		$theTooltipTwitter = '';
		$theTooltipGooglePlus = '';
		$theTooltipLinkedin = '';
		$theTooltipPinterest = '';
		$theTooltipStumbleupon = '';
		$theTooltipVk = '';
		$theTooltipBuffer = '';
		$theTooltipReddit = '';
		$theTooltipOk = '';
		$theTooltipXing = '';
		$theTooltipWhatsapp = '';
		$theTooltipEmail = '';
		$theTooltipPrint = '';
	}

	echo '<!--www.crestaproject.com Cresta Social Share Counter Floating Start--><div id="crestashareicon" class="cresta-share-icon '.esc_attr($crestaFloat).' '.esc_attr($crestaSame).' '. esc_attr($button_style) .' '; if($show_count == 1) { echo 'show-count-active'; } echo'">';
	if($button_hide_show == 1) {
		echo '<div class="cresta-the-button"><i class="c-icon-cresta-minus"></i></div>';
	}
	if(in_array('facebook',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' facebook-cresta-share" '. $the_animation .' id="facebook-cresta"><a rel="nofollow" href="https://www.facebook.com/sharer.php?u='. urlencode(get_permalink( $post->ID )) .'&amp;t='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" ' . $theTooltipFacebook . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-facebook"></i></a></div>';
	}

	if(in_array('tweet',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' twitter-cresta-share '. esc_attr($theNewTwitter) .'" '. $the_animation .' id="twitter-cresta"><a rel="nofollow" href="https://twitter.com/share?text='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;url='. urlencode(get_permalink( $post->ID )) .''; if($cresta_twitter_username) { echo '&amp;via=' . esc_attr($cresta_twitter_username) . ''; } echo '" ' . $theTooltipTwitter . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-twitter"></i></a></div>';
	}

	if(in_array('gplus',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' googleplus-cresta-share" '. $the_animation .' id="googleplus-cresta"><a rel="nofollow" href="https://plus.google.com/share?url='. urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipGooglePlus . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-gplus"></i></a></div>';
	}

	if(in_array('linkedin',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' linkedin-cresta-share" '. $the_animation .' id="linkedin-cresta"><a rel="nofollow" href="https://www.linkedin.com/shareArticle?mini=true&amp;url='. urlencode(get_permalink( $post->ID )) .'&amp;title='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;source='. esc_url( home_url( '/' )) .'" ' . $theTooltipLinkedin . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-linkedin"></i></a></div>';
	}

	if(in_array('pinterest',$buttons)) {
		if ($pinterestMode == 'featimage') {
			echo '<div class="sbutton '. esc_attr($crestaShadow) .' pinterest-cresta-share" '. $the_animation .' id="pinterest-cresta"><a rel="nofollow" href="https://pinterest.com/pin/create/bookmarklet/?url='.urlencode(get_permalink( $post->ID )) .'&amp;media='. esc_url($pinImage) .'&amp;description='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" ' . $theTooltipPinterest . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-pinterest"></i></a></div>';
		} else {
			echo '<div class="sbutton '. esc_attr($crestaShadow) .' pinterest-cresta-share" '. $the_animation .' id="pinterest-cresta"><a rel="nofollow" href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;https://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());" ' . $theTooltipPinterest . '><i class="cs c-icon-cresta-pinterest"></i></a></div>';
		}
	}
	
	if(in_array('stumbleupon',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' stumbleupon-cresta-share" '. $the_animation .' id="stumbleupon-cresta"><a rel="nofollow" href="https://www.stumbleupon.com/badge/?url='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipStumbleupon . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-stumbleupon"></i></a></div>';
	}
	
	if(in_array('vk',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' vk-cresta-share" '. $the_animation .' id="vk-cresta"><a rel="nofollow" href="https://vk.com/share.php?url='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipVk . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-vkontakte"></i></a></div>';
	}
	
	if(in_array('buffer',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' buffer-cresta-share" '. $the_animation .' id="buffer-cresta"><a rel="nofollow" href="https://bufferapp.com/add?&amp;text='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;url='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipBuffer . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-buffer"></i></a></div>';
	}
	
	if(in_array('reddit',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' reddit-cresta-share" '. $the_animation .' id="reddit-cresta"><a rel="nofollow" href="https://www.reddit.com/submit?url='.urlencode(get_permalink( $post->ID )) .'&amp;title='. htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" ' . $theTooltipReddit . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-reddit"></i></a></div>';
	}
	
	if(in_array('ok',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' ok-cresta-share" '. $the_animation .' id="ok-cresta"><a rel="nofollow" href="https://www.odnoklassniki.ru/dk?st.cmd=addShare&st._surl='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipOk . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-ok"></i></a></div>';
	}
	
	if(in_array('xing',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' xing-cresta-share" '. $the_animation .' id="xing-cresta"><a rel="nofollow" href="https://www.xing.com/spi/shares/new?url='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipXing . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-xing"></i></a></div>';
	}
	
	if(in_array('whatsapp',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' whatsapp-cresta-share" '. $the_animation .' id="whatsapp-cresta"><a rel="nofollow" href="whatsapp://send?text='. htmlspecialchars(rawurlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .' - '.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipWhatsapp . '><i class="cs c-icon-cresta-whatsapp"></i></a></div>';
	}
	
	if(in_array('telegram',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' telegram-cresta-share" '. $the_animation .' id="telegram-cresta"><a rel="nofollow" href="tg://msg?text='. htmlspecialchars(rawurlencode(html_entity_decode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .' - '.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipTelegram . '><i class="cs c-icon-cresta-telegram"></i></a></div>';
	}

	if(in_array('email',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' email-cresta-share" '. $the_animation .' id="email-cresta"><a rel="nofollow" href="mailto:?subject='. rawurlencode(the_title_attribute( array( 'echo' => 0, 'post' => $post->ID ) )) .'&amp;body='.urlencode(get_permalink( $post->ID )) .'" ' . $theTooltipEmail . ' onclick="window.open(this.href,\'targetWindow\',\'toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200\');return false;"><i class="cs c-icon-cresta-mail"></i></a></div>';
	}
	
	if(in_array('print',$buttons)) {
		echo '<div class="sbutton '. esc_attr($crestaShadow) .' print-cresta-share" '. $the_animation .' id="print-cresta"><a href="#" ' . $theTooltipPrint . ' onclick="window.print();" ><i class="cs c-icon-cresta-print"></i></a></div>';
	}

	if($show_count == 1) {
		echo '<div class="sbutton total-float" '. $the_animation .' id="total-shares">'; if($show_total == 1) { echo '<span class="cresta-the-total-count" id="total-count"><i class="cs c-icon-cresta-spinner animate-spin"></i></span><span class="cresta-the-total-text">' .esc_html($total_text). '</span>'; } echo '</div>';
	}

	echo '</div><!--www.crestaproject.com Cresta Social Share Counter Floating End-->';
		} //if disable = 1 && wp_is_mobile
	} //if show floating buttons is ON
}

function cresta_social_share_option() {
	ob_start();
	if( isset($_GET['settings-updated']) && $_GET['settings-updated'] ) {
		echo '<div id="message" class="updated"><p>'.esc_html__('Settings Saved...', 'cresta-social-share-counter-pro').'</p></div>';
	}
?>
	
<div class="wrap">
<div id="icon-options-general" class="icon32"></div>
<h2><?php esc_html_e('Cresta Social Share Counter PRO', 'cresta-social-share-counter-pro'); ?></h2>

<script type="text/javascript">
jQuery(document).ready(function(){
		if ( jQuery('input.crestaenableanimation').hasClass('active') ) {
			jQuery('.crestachooseanimation').show();
		} else {
			jQuery('.crestachooseanimation').hide();
		}
		
		if ( jQuery('input.crestashowsocialcounter').hasClass('active') ) {
			jQuery('.crestachoosethecolor').show();
		} else {
			jQuery('.crestachoosethecolor').hide();
		}
		
		if ( jQuery('input.crestatwitterenable').hasClass('active') ) {
			jQuery('.crestashowtwittername').show();
		} else {
			jQuery('.crestashowtwittername').hide();
		}

		if ( jQuery('input.crestaenabletooltip').hasClass('active') ) {
			jQuery('.crestashowtooltipname').show();
		} else {
			jQuery('.crestashowtooltipname').hide();
		}
		
		if ( jQuery('input.crestashowsocialtotal').hasClass('active') ) {
			jQuery('.crestachoosetotalshares').show();
		} else {
			jQuery('.crestachoosetotalshares').hide();
		}
		
		if ( jQuery('input.crestaiscustomcolor').hasClass('active') ) {
			jQuery('.checkifiscustom').show();
		} else {
			jQuery('.checkifiscustom').hide();
		}
		
		if ( jQuery('input.crestastickfloatbutton').hasClass('active') ) {
			jQuery('.checkFixed').hide();
			jQuery('.checkFixedActive').show();
		} else {
			jQuery('.checkFixed').show();
			jQuery('.checkFixedActive').hide();
		}
		
	jQuery('input.crestaenableanimation').on('click', function(){
		if ( jQuery(this).is(':checked') ) {
			jQuery('.crestachooseanimation').fadeIn();
		} else {
			jQuery('.crestachooseanimation').fadeOut();
		}
	});
	
	jQuery('input.crestashowsocialcounter').on('click', function(){
		if ( jQuery(this).is(':checked') ) {
			jQuery('.crestachoosethecolor').fadeIn();
		} else {
			jQuery('.crestachoosethecolor').fadeOut();
		}
	});
	
	jQuery('input.crestatwitterenable').on('click', function(){
		if ( jQuery(this).is(':checked') ) {
			jQuery('.crestashowtwittername').fadeIn();
		} else {
			jQuery('.crestashowtwittername').fadeOut();
		}
	});
	
	jQuery('input.crestaenabletooltip').on('click', function(){
		if ( jQuery(this).is(':checked') ) {
			jQuery('.crestashowtooltipname').fadeIn();
		} else {
			jQuery('.crestashowtooltipname').fadeOut();
		}
	});
	
	jQuery('input.crestashowsocialtotal').on('click', function(){
		if ( jQuery(this).is(':checked') ) {
			jQuery('.crestachoosetotalshares').fadeIn();
		} else {
			jQuery('.crestachoosetotalshares').fadeOut();
		}
	});
	
	jQuery('input[name="cresta_social_shares_colors_option"]').on('click', function(){
		if (jQuery('input:radio[name=cresta_social_shares_colors_option]:checked').val() == "custom_colors"){
			jQuery('.checkifiscustom').fadeIn();
		} else {
			jQuery('.checkifiscustom').fadeOut();
		}
	});
	
	jQuery('input.crestastickfloatbutton').on('click', function(){
		if ( jQuery(this).is(':checked') ) {
			jQuery('.checkFixed').fadeOut();
			jQuery('.checkFixedActive').fadeIn();
		} else {
			jQuery('.checkFixed').fadeIn();
			jQuery('.checkFixedActive').fadeOut();
		}
	});
	
});
</script>

<div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
        <div id="post-body-content">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<div class="inside">
					<form method="post" action="options.php">  
					<?php
					settings_fields( 'cresta_social_license' );
					?>
					
		<h3><div class="dashicons dashicons-visibility space"></div><?php esc_html_e('Select buttons to display on website :', 'cresta-social-share-counter-pro'); ?></h3>
		<table class="form-table">
			<tbody>	
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Choose buttons', 'cresta-social-share-counter-pro' ); ?></th>
					<td>
					<?php $buttons = explode (',',get_option( 'selected_button' )); ?>
						<ul>
							<li>
								<label><input type="checkbox" <?php if(in_array('facebook',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="facebook"/>Facebook</label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('tweet',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="tweet" class="crestatwitterenable <?php if(in_array('tweet',$buttons)) { echo 'active'; }?>"/>Twitter <span class="description">(Official counter no longer available, new counter available through newsharecounts.com API)</span></label>
							</li>
							<li class="crestashowtwittername">
								<label><?php esc_html_e('Twitter username (optional):', 'cresta-social-share-counter-pro'); ?> @<input type="text" name="cresta_social_shares_twitter_username" value="<?php echo esc_html(get_option('cresta_social_shares_twitter_username'));?>"/></label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('gplus',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="gplus"/>Google Plus <span class="description">(Official counter no longer available by Google)</span></label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('linkedin',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="linkedin"/>Linkedin</label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('pinterest',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="pinterest"/>Pinterest</label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('stumbleupon',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="stumbleupon"/>StumbleUpon</label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('vk',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="vk"/>VK</label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('buffer',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="buffer"/>Buffer</label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('reddit',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="reddit"/>Reddit</label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('ok',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="ok"/>OK.ru</label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('xing',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="xing"/>Xing</label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('whatsapp',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="whatsapp"/>WhatsApp <span class="description"><?php esc_html_e('(only visible on smartphones Android and iPhone)', 'cresta-social-share-counter-pro'); ?></span></label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('telegram',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="telegram"/>Telegram <span class="description"><?php esc_html_e('(only visible on smartphones Android and iPhone)', 'cresta-social-share-counter-pro'); ?></span></label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('email',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="email"/>Email Button</label>
							</li>
							<li>
								<label><input type="checkbox" <?php if(in_array('print',$buttons)) { echo 'checked="checked"'; }?> name="selected_button[]" value="print"/>Print Button</label>
							</li>							
						</ul>
					</td>
				</tr>
			</tbody>	
		</table>
		<h3><div class="dashicons dashicons-art space"></div><?php esc_html_e('Choose buttons style :', 'cresta-social-share-counter'); ?></h3>
		<table class="form-table">
			<tbody>	
				<tr valign="top">
					<ul>
						<li>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "first_style") { echo 'checked="checked"'; }?> value="first_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-1.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "second_style") { echo 'checked="checked"'; }?> value="second_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-2.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "third_style") { echo 'checked="checked"'; }?> value="third_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-3.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "fourth_style") { echo 'checked="checked"'; }?> value="fourth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-4.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "fifth_style") { echo 'checked="checked"'; }?> value="fifth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-5.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "sixth_style") { echo 'checked="checked"'; }?> value="sixth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-6.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "seventh_style") { echo 'checked="checked"'; }?> value="seventh_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-7.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "eighth_style") { echo 'checked="checked"'; }?> value="eighth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-8.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "ninth_style") { echo 'checked="checked"'; }?> value="ninth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-9.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "tenth_style") { echo 'checked="checked"'; }?> value="tenth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-10.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "eleventh_style") { echo 'checked="checked"'; }?> value="eleventh_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-11.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "twelfth_style") { echo 'checked="checked"'; }?> value="twelfth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-12.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "thirteenth_style") { echo 'checked="checked"'; }?> value="thirteenth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-13.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "fourteenth_style") { echo 'checked="checked"'; }?> value="fourteenth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-14.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "fifteenth_style") { echo 'checked="checked"'; }?> value="fifteenth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-15.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "sixteenth_style") { echo 'checked="checked"'; }?> value="sixteenth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-16.png' , __FILE__ )); ?>">
							</label>
							<label>
								<input type="radio" name="cresta_social_shares_style" <?php if(get_option('cresta_social_shares_style') == "seventeenth_style") { echo 'checked="checked"'; }?> value="seventeenth_style" >
								<img src="<?php echo esc_url(plugins_url( '/images/cresta-social-share-counter-style-17.png' , __FILE__ )); ?>">
							</label>
						</li>
					</ul>
				</tr>
			</tbody>	
		</table>	
		<h3><div class="dashicons dashicons-admin-customizer space"></div><?php esc_html_e('Social Network Colors :', 'cresta-social-share-counter-pro'); ?></h3>
		<table class="form-table">
			<tbody>	
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Colors option:', 'cresta-social-share-counter-pro' ); ?></th>
					<td>	
						<ul>
							<li>
								<label><input type="radio" name='cresta_social_shares_colors_option' value='default_colors' <?php checked( 'default_colors', get_option('cresta_social_shares_colors_option') ); ?>><?php esc_html_e('Use default colors', 'cresta-social-share-counter-pro'); ?></label>
							</li>
							<li>
								<label><input type="radio" name='cresta_social_shares_colors_option' value='custom_colors' class='crestaiscustomcolor <?php if(get_option('cresta_social_shares_colors_option') == "custom_colors") { echo 'active'; }?>' <?php checked( 'custom_colors', get_option('cresta_social_shares_colors_option') ); ?>><?php esc_html_e('Use custom colors', 'cresta-social-share-counter-pro'); ?></label>
							</li>
						</ul>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Facebook custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-facebook' data-default-color='#3b5998' name='cresta_social_shares_facebook_color' value='<?php echo esc_attr(get_option('cresta_social_shares_facebook_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Twitter custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-twitter' data-default-color='#4099FF' name='cresta_social_shares_twitter_color' value='<?php echo esc_attr(get_option('cresta_social_shares_twitter_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Google Plus custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-gplus' data-default-color='#D34836' name='cresta_social_shares_gplus_color' value='<?php echo esc_attr(get_option('cresta_social_shares_gplus_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Linkedin custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-linkedin' data-default-color='#007bb6' name='cresta_social_shares_linkedin_color' value='<?php echo esc_attr(get_option('cresta_social_shares_linkedin_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Pinterest custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-pinterest' data-default-color='#cb2027' name='cresta_social_shares_pinterest_color' value='<?php echo esc_attr(get_option('cresta_social_shares_pinterest_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'StumbleUpon custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-stumbleupon' data-default-color='#eb4924' name='cresta_social_shares_stumbleupon_color' value='<?php echo esc_attr(get_option('cresta_social_shares_stumbleupon_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'VK custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-vk' data-default-color='#45668e' name='cresta_social_shares_vk_color' value='<?php echo esc_attr(get_option('cresta_social_shares_vk_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Buffer custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-buffer' data-default-color='#323b43' name='cresta_social_shares_buffer_color' value='<?php echo esc_attr(get_option('cresta_social_shares_buffer_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Reddit custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-reddit' data-default-color='#ff4500' name='cresta_social_shares_reddit_color' value='<?php echo esc_attr(get_option('cresta_social_shares_reddit_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'OK.ru custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-ok' data-default-color='#ed812b' name='cresta_social_shares_ok_color' value='<?php echo esc_attr(get_option('cresta_social_shares_ok_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Xing custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-xing' data-default-color='#026466' name='cresta_social_shares_xing_color' value='<?php echo esc_attr(get_option('cresta_social_shares_xing_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'WhatsApp custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-whatsapp' data-default-color='#34af23' name='cresta_social_shares_whatsapp_color' value='<?php echo esc_attr(get_option('cresta_social_shares_whatsapp_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Telegram custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-telegram' data-default-color='#0088cc' name='cresta_social_shares_telegram_color' value='<?php echo esc_attr(get_option('cresta_social_shares_telegram_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Email button custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-mail' data-default-color='#ffb62a' name='cresta_social_shares_mail_color' value='<?php echo esc_attr(get_option('cresta_social_shares_mail_color')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="checkifiscustom">
					<th scope="row"><?php esc_html_e( 'Print button custom color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-print' data-default-color='#36c1c8' name='cresta_social_shares_print_color' value='<?php echo esc_attr(get_option('cresta_social_shares_print_color')); ?>'>
					</td>
				</tr>
			</tbody>	
		</table>
		<h3><div class="dashicons dashicons-admin-settings space"></div><?php esc_html_e('Display Setting :', 'cresta-social-share-counter-pro'); ?></h3>
		<table class="form-table">
			<tbody>	
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Enable reflection on the buttons', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkanim" name="cresta_social_shares_enable_shadow" value="1" <?php checked( get_option('cresta_social_shares_enable_shadow'), '1' ); ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Enable shadow on the buttons', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkanim" name="cresta_social_shares_enable_shadow_buttons" value="1" <?php checked( get_option('cresta_social_shares_enable_shadow_buttons'), '1' ); ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Enable animations', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkanim" name="cresta_social_shares_enable_animation" class="crestaenableanimation <?php if(get_option('cresta_social_shares_enable_animation') == "1") { echo 'active'; }?>" value="1" <?php checked( get_option('cresta_social_shares_enable_animation'), '1' ); ?>>
					</td>
				</tr>
				<tr valign="top" class="crestachooseanimation">
					<th scope="row"><?php esc_html_e( 'Choose animation', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<select  name="cresta_social_shares_choose_animation">
							<option name="cresta_social_shares_choose_animation" value="fadeIn" <?php if( get_option('cresta_social_shares_choose_animation') == "fadeIn" ) { echo 'selected="selected"'; } ?>>Fade In</option>
							<option name="cresta_social_shares_choose_animation" value="fadeInLeft" <?php if( get_option('cresta_social_shares_choose_animation') == "fadeInLeft" ) { echo 'selected="selected"'; } ?>>Fade In Left</option>
							<option name="cresta_social_shares_choose_animation" value="fadeInRight" <?php if( get_option('cresta_social_shares_choose_animation') == "fadeInRight" ) { echo 'selected="selected"'; } ?>>Fade In Right</option>
							<option name="cresta_social_shares_choose_animation" value="fadeInUp" <?php if( get_option('cresta_social_shares_choose_animation') == "fadeInUp" ) { echo 'selected="selected"'; } ?>>Fade In Up</option>
							<option name="cresta_social_shares_choose_animation" value="fadeInDown" <?php if( get_option('cresta_social_shares_choose_animation') == "fadeInDown" ) { echo 'selected="selected"'; } ?>>Fade In Down</option>
							<option name="cresta_social_shares_choose_animation" value="bounceIn" <?php if( get_option('cresta_social_shares_choose_animation') == "bounceIn" ) { echo 'selected="selected"'; } ?>>Bounce In</option>
							<option name="cresta_social_shares_choose_animation" value="bounceInLeft" <?php if( get_option('cresta_social_shares_choose_animation') == "bounceInLeft" ) { echo 'selected="selected"'; } ?>>Bounce In Left</option>
							<option name="cresta_social_shares_choose_animation" value="bounceInRight" <?php if( get_option('cresta_social_shares_choose_animation') == "bounceInRight" ) { echo 'selected="selected"'; } ?>>Bounce In Right</option>
							<option name="cresta_social_shares_choose_animation" value="bounceInUp" <?php if( get_option('cresta_social_shares_choose_animation') == "bounceInUp" ) { echo 'selected="selected"'; } ?>>BounceIn Up</option>
							<option name="cresta_social_shares_choose_animation" value="bounceInDown" <?php if( get_option('cresta_social_shares_choose_animation') == "bounceInDown" ) { echo 'selected="selected"'; } ?>>Bounce In Down</option>
							<option name="cresta_social_shares_choose_animation" value="zoomIn" <?php if( get_option('cresta_social_shares_choose_animation') == "zoomIn" ) { echo 'selected="selected"'; } ?>>Zoom In</option>
							<option name="cresta_social_shares_choose_animation" value="zoomInLeft" <?php if( get_option('cresta_social_shares_choose_animation') == "zoomInLeft" ) { echo 'selected="selected"'; } ?>>Zoom In Left</option>
							<option name="cresta_social_shares_choose_animation" value="zoomInRight" <?php if( get_option('cresta_social_shares_choose_animation') == "zoomInRight" ) { echo 'selected="selected"'; } ?>>Zoom In Right</option>
							<option name="cresta_social_shares_choose_animation" value="zoomInUp" <?php if( get_option('cresta_social_shares_choose_animation') == "zoomInUp" ) { echo 'selected="selected"'; } ?>>Zoom In Up</option>
							<option name="cresta_social_shares_choose_animation" value="zoomInDown" <?php if( get_option('cresta_social_shares_choose_animation') == "zoomInDown" ) { echo 'selected="selected"'; } ?>>Zoom In Down</option>
							<option name="cresta_social_shares_choose_animation" value="rotateIn" <?php if( get_option('cresta_social_shares_choose_animation') == "rotateIn" ) { echo 'selected="selected"'; } ?>>Rotate In</option>
							<option name="cresta_social_shares_choose_animation" value="rotateInDownLeft" <?php if( get_option('cresta_social_shares_choose_animation') == "rotateInDownLeft" ) { echo 'selected="selected"'; } ?>>Rotate In Down Left</option>
							<option name="cresta_social_shares_choose_animation" value="rotateInDownRight" <?php if( get_option('cresta_social_shares_choose_animation') == "rotateInDownRight" ) { echo 'selected="selected"'; } ?>>Rotate In Down Right</option>
							<option name="cresta_social_shares_choose_animation" value="rotateInUpLeft" <?php if( get_option('cresta_social_shares_choose_animation') == "rotateInUpLeft" ) { echo 'selected="selected"'; } ?>>Rotate In Up Left</option>
							<option name="cresta_social_shares_choose_animation" value="rotateInUpRight" <?php if( get_option('cresta_social_shares_choose_animation') == "rotateInUpRight" ) { echo 'selected="selected"'; } ?>>Rotate In Up Right</option>
							<option name="cresta_social_shares_choose_animation" value="flip" <?php if( get_option('cresta_social_shares_choose_animation') == "flip" ) { echo 'selected="selected"'; } ?>>Flip</option>
							<option name="cresta_social_shares_choose_animation" value="flipInX" <?php if( get_option('cresta_social_shares_choose_animation') == "flipInX" ) { echo 'selected="selected"'; } ?>>Flip In X</option>
							<option name="cresta_social_shares_choose_animation" value="flipInY" <?php if( get_option('cresta_social_shares_choose_animation') == "flipInY" ) { echo 'selected="selected"'; } ?>>Flip In Y</option>
							<option name="cresta_social_shares_choose_animation" value="bounce" <?php if( get_option('cresta_social_shares_choose_animation') == "bounce" ) { echo 'selected="selected"'; } ?>>Bounce</option>
							<option name="cresta_social_shares_choose_animation" value="flash" <?php if( get_option('cresta_social_shares_choose_animation') == "flash" ) { echo 'selected="selected"'; } ?>>Flash</option>
							<option name="cresta_social_shares_choose_animation" value="pulse" <?php if( get_option('cresta_social_shares_choose_animation') == "pulse" ) { echo 'selected="selected"'; } ?>>Pulse</option>
							<option name="cresta_social_shares_choose_animation" value="rubberBand" <?php if( get_option('cresta_social_shares_choose_animation') == "rubberBand" ) { echo 'selected="selected"'; } ?>>Rubber Band</option>
							<option name="cresta_social_shares_choose_animation" value="shake" <?php if( get_option('cresta_social_shares_choose_animation') == "shake" ) { echo 'selected="selected"'; } ?>>Shake</option>
							<option name="cresta_social_shares_choose_animation" value="swing" <?php if( get_option('cresta_social_shares_choose_animation') == "swing" ) { echo 'selected="selected"'; } ?>>Swing</option>
							<option name="cresta_social_shares_choose_animation" value="tada" <?php if( get_option('cresta_social_shares_choose_animation') == "tada" ) { echo 'selected="selected"'; } ?>>Tada</option>
							<option name="cresta_social_shares_choose_animation" value="wobble" <?php if( get_option('cresta_social_shares_choose_animation') == "wobble" ) { echo 'selected="selected"'; } ?>>Wobble</option>
							<option name="cresta_social_shares_choose_animation" value="rollIn" <?php if( get_option('cresta_social_shares_choose_animation') == "rollIn" ) { echo 'selected="selected"'; } ?>>Roll In</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Show Social Counter', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkanim" name="cresta_social_shares_show_counter" class="crestashowsocialcounter <?php if(get_option('cresta_social_shares_show_counter') == "1") { echo 'active'; }?>" value="1" <?php checked( get_option('cresta_social_shares_show_counter'), '1' ); ?>>
					</td>
				</tr>
				<tr valign="top" class="crestachoosethecolor">
					<th scope="row"><?php esc_html_e( 'newsharecounts.com for Twitter Counts', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkanim" name="cresta_social_shares_twitter_shares" value="1" <?php checked( get_option('cresta_social_shares_twitter_shares'), '1' ); ?>>
						<span class="description"><?php esc_html_e('To use newsharecounts.com public API, you have to enter your website url', 'cresta-social-share-counter-pro'); ?> <strong><?php echo esc_url( home_url( '/' ) ); ?></strong> <?php esc_html_e('and sign in using your Twitter Account at their website', 'cresta-social-share-counter-pro'); ?> <a target="_blank" href="http://newsharecounts.com">newsharecounts.com</a></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Pinterest share mode', 'cresta-social-share-counter-pro' ); ?></th>
					<td>
						<ul>
							<li>
								<label><input type="radio" name='cresta_social_shares_pintmode' value='featimage' <?php checked( 'featimage', get_option('cresta_social_shares_pintmode') ); ?>><?php esc_html_e('Share Featured Image', 'cresta-social-share-counter-pro'); ?></label>
							</li>
							<li>
								<label><input type="radio" name='cresta_social_shares_pintmode' value='allimage' <?php checked( 'allimage', get_option('cresta_social_shares_pintmode') ); ?>><?php esc_html_e('Shows all the possible images to share', 'cresta-social-share-counter-pro'); ?></label>
							</li>
						</ul>
					</td>
				</tr>
				<tr valign="top" class="crestachoosethecolor">
					<th scope="row"><?php esc_html_e( 'Show single shares count only if the number is more than...', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkanim" name="cresta_social_shares_show_ifmorezero" value="1" <?php checked( get_option('cresta_social_shares_show_ifmorezero'), '1' ); ?>>
						<span>Show single shares if they are more than <input type="number" id="chkanim" name="cresta_social_shares_show_ifmorenumber" value="<?php echo intval(get_option('cresta_social_shares_show_ifmorenumber')); ?>" min="0" max="9999"></span>
					</td>
				</tr>
				<tr valign="top" class="crestachoosethecolor">
					<th scope="row"><?php esc_html_e( 'Single Shares Text Color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-single' data-default-color='#ffffff' name='cresta_social_shares_text_color_single' value='<?php echo esc_attr(get_option('cresta_social_shares_text_color_single')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="crestachoosethecolor">
					<th scope="row"><?php esc_html_e( 'Single Shares Background Color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-background-color-single' data-default-color='#D60000' name='cresta_social_shares_background_color_single' value='<?php echo esc_attr(get_option('cresta_social_shares_background_color_single')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="crestachoosethecolor">
					<th scope="row"><?php esc_html_e( 'Single Share Box: Use the same colors of social networks', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkanim" name="cresta_social_shares_enable_samecolors" value="1" <?php checked( get_option('cresta_social_shares_enable_samecolors'), '1' ); ?>>
						<span class="description"><?php esc_html_e('Will use the default colors of the social network, no custom colors', 'cresta-social-share-counter-pro'); ?></span>
					</td>
				</tr>
				<tr valign="top" class="crestachoosethecolor">
					<th scope="row"><?php esc_html_e( 'Total Shares Text Color', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type='text' id='cresta-text-color-total' data-default-color='#000000' name='cresta_social_shares_text_color_total' value='<?php echo esc_attr(get_option('cresta_social_shares_text_color_total')); ?>'>
					</td>
				</tr>
				<tr valign="top" class="crestachoosethecolor">
					<th scope="row"><?php esc_html_e( 'Show Total Shares', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkanim" name="cresta_social_shares_show_total" class="crestashowsocialtotal <?php if(get_option('cresta_social_shares_show_total') == "1") { echo 'active'; }?>" value="1" <?php checked( get_option('cresta_social_shares_show_total'), '1' ); ?>>
					</td>
				</tr>
				<tr valign="top" class="crestachoosethecolor crestachoosetotalshares">
					<th scope="row"><?php esc_html_e( 'Show Total Shares only if is more than 0', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkanim" name="cresta_social_shares_total_text_only_zero" value="1" <?php checked( get_option('cresta_social_shares_total_text_only_zero'), '1' ); ?>>
					</td>
				</tr
				<tr valign="top" class="crestachoosethecolor crestachoosetotalshares">
					<th scope="row"><?php esc_html_e( 'Total Shares Text', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_total_text" value="<?php echo esc_attr(get_option('cresta_social_shares_total_text'));?>"/>
					</td>
				</tr>
			</tbody>	
		</table>
		<h3><div class="dashicons dashicons-align-center space"></div><?php esc_html_e('Float Position :', 'cresta-social-share-counter-pro'); ?></h3>
		<table class="form-table">
			<tbody>	
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Show Floating Buttons', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkflotbtn" name="cresta_social_shares_show_floatbutton" class="crestashowfloatbutton" value="1" <?php checked( get_option('cresta_social_shares_show_floatbutton'), '1' ); ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Stick Floating Buttons to content', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkflotbtnstick" name="cresta_social_shares_stick_floatbutton" class="crestastickfloatbutton <?php if(get_option('cresta_social_shares_stick_floatbutton') == "1") { echo 'active'; }?>" value="1" <?php checked( get_option('cresta_social_shares_stick_floatbutton'), '1' ); ?>>
						<span class="description" style="color:red;"><?php esc_html_e('Note: This feature works only with certain structures of template', 'cresta-social-share-counter-pro'); ?><span>
					</td>
				</tr>
				<tr valign="top" class="checkFixedActive">
					<th scope="row"><?php esc_html_e( 'Position from top (fixed)', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_stick_position_top" value="<?php echo intval(get_option('cresta_social_shares_stick_position_top'));?>"/>px
					</td>
				</tr>
				<tr valign="top" class="checkFixedActive">
					<th scope="row"><?php esc_html_e( 'Moves to the left (fixed)', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_stick_position_left" value="<?php echo intval(get_option('cresta_social_shares_stick_position_left'));?>"/>px
					</td>
				</tr>
				<tr valign="top" class="checkFixed">
					<th scope="row"><?php esc_html_e( 'Float Buttons Position', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<ul>
							<li>
								<label><input type="radio" name='cresta_social_shares_float' value='left' <?php checked( 'left', get_option('cresta_social_shares_float') ); ?>><?php esc_html_e('Left', 'cresta-social-share-counter-pro'); ?></label>
							</li>
							<li>
								<label><input type="radio" name='cresta_social_shares_float' value='right' <?php checked( 'right', get_option('cresta_social_shares_float') ); ?>><?php esc_html_e('Right', 'cresta-social-share-counter-pro'); ?></label>
							</li>
						</ul>
					</td>
				</tr>
				<tr valign="top" class="checkFixed">
					<th scope="row"><?php esc_html_e( 'Position From Top', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_position_top" value="<?php echo intval(get_option('cresta_social_shares_position_top'));?>"/>%
					</td>
				</tr>
				<tr valign="top" class="checkFixed">
					<th scope="row"><?php esc_html_e( 'Position From Left or Right', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_position_left" value="<?php echo intval(get_option('cresta_social_shares_position_left'));?>"/>px
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Z-Index', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_z_index" value="<?php echo intval(get_option('cresta_social_shares_z_index'));?>"/>
						<span class="description"><?php esc_html_e('Increase this number if the floating buttons are covered by other items on the screen.', 'cresta-social-share-counter-pro'); ?></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Enable button to hide/show the floating buttons', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkhideshow" name="cresta_social_shares_button_hide_show" value="1" <?php checked( get_option('cresta_social_shares_button_hide_show'), '1' ); ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Disable Floating Buttons On Mobile', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkmobile" name="cresta_social_shares_disable_mobile" value="1" <?php checked( get_option('cresta_social_shares_disable_mobile'), '1' ); ?>>
					</td>
				</tr>
			</tbody>	
		</table>
		<h3><div class="dashicons dashicons-editor-aligncenter space"></div><?php esc_html_e('Post and Page Position :', 'cresta-social-share-counter-pro'); ?></h3>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Add Social Buttons before post/page content', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkbeforecontent" name="cresta_social_shares_before_content" value="1" <?php checked( get_option('cresta_social_shares_before_content'), '1' ); ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Add Social Buttons after post/page content', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkaftercontent" name="cresta_social_shares_after_content" value="1" <?php checked( get_option('cresta_social_shares_after_content'), '1' ); ?>>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Use small buttons', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chksizebutton" name="cresta_social_shares_button_size" value="1" <?php checked( get_option('cresta_social_shares_button_size'), '1' ); ?>>
						<span class="description"><?php esc_html_e('If activated, the buttons in the content will be smaller', 'cresta-social-share-counter-pro'); ?></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Buttons Position (in content):', 'cresta-social-share-counter-pro' ); ?></th>
					<td>	
						<ul>
							<li>
								<label><input type="radio" name='cresta_social_shares_float_buttons' value='left' <?php checked( 'left', get_option('cresta_social_shares_float_buttons') ); ?>><?php esc_html_e('Left', 'cresta-social-share-counter-pro'); ?></label>
							</li>
							<li>
								<label><input type="radio" name='cresta_social_shares_float_buttons' value='right' <?php checked( 'right', get_option('cresta_social_shares_float_buttons') ); ?>><?php esc_html_e('Right', 'cresta-social-share-counter-pro'); ?></label>
							</li>
							<li>
								<label><input type="radio" name='cresta_social_shares_float_buttons' value='center' <?php checked( 'center', get_option('cresta_social_shares_float_buttons') ); ?>><?php esc_html_e('Center', 'cresta-social-share-counter-pro'); ?></label>
							</li>
						</ul>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'In Content Buttons Hover Animation', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<select  name="cresta_social_shares_choose_hover">
							<option name="cresta_social_shares_choose_hover" value="cresta-no-animation" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-no-animation" ) { echo 'selected="selected"'; } ?>>No Animation</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-grow" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-grow" ) { echo 'selected="selected"'; } ?>>Grow</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-shrink" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-shrink" ) { echo 'selected="selected"'; } ?>>Shrink</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-push" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-push" ) { echo 'selected="selected"'; } ?>>Push</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-pop" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-pop" ) { echo 'selected="selected"'; } ?>>Pop</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-rotate" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-rotate" ) { echo 'selected="selected"'; } ?>>Rotate</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-grow-rotate" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-grow-rotate" ) { echo 'selected="selected"'; } ?>>Grow Rotate</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-float" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-float" ) { echo 'selected="selected"'; } ?>>Float</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-sink" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-sink" ) { echo 'selected="selected"'; } ?>>Sink</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-skew" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-skew" ) { echo 'selected="selected"'; } ?>>Skew</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-buzz-out" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-buzz-out" ) { echo 'selected="selected"'; } ?>>Buzz Out</option>
							<option name="cresta_social_shares_choose_hover" value="cresta-float-shadow" <?php if( get_option('cresta_social_shares_choose_hover') == "cresta-float-shadow" ) { echo 'selected="selected"'; } ?>>Float Shadow</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Shortcode', 'cresta-social-share-counter-pro' ); ?></th>
					<td>
						<span class="description"><?php esc_html_e('You can place the shortcode', 'cresta-social-share-counter-pro'); ?> <code>[cresta-social-share]</code> <?php esc_html_e('wherever you want to display the social buttons.', 'cresta-social-share-counter-pro'); ?></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'PHP Code', 'cresta-social-share-counter-pro' ); ?></th>
					<td>
						<span class="description"><?php esc_html_e('If you want to add the social buttons in the theme code you can use this PHP code:', 'cresta-social-share-counter-pro'); ?> <pre><code>&lt;?php if(function_exists(&#039;add_social_button_in_content&#039;)) { echo add_social_button_in_content(); } ?&gt;</code></pre></span>
					</td>
				</tr>
			</tbody>	
		</table>
		<h3><div class="dashicons dashicons-search space"></div><?php esc_html_e('Show on :', 'cresta-social-share-counter-pro'); ?></h3>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e( 'Show on', 'cresta-social-share-counter-pro' ); ?></th>
					<td>
						<?php
							$show_on = explode (',',get_option( 'cresta_social_shares_selected_page' ));
							$args = array(
								'public'   => true,
							);
							$post_types = get_post_types( $args, 'names', 'and' ); 
							echo '<ul>';
							foreach ( $post_types  as $post_type ) { 
								$post_type_name = get_post_type_object( $post_type );
								?>
									<li>
										<label><input type="checkbox" <?php if(in_array( $post_type ,$show_on)) { echo 'checked="checked"'; }?> name="cresta_social_shares_selected_page[]" value="<?php echo esc_attr($post_type); ?>"/><?php echo esc_html($post_type_name->labels->singular_name); ?></label>
									</li>
								<?php
							}
							echo '</ul>';
						?>
						<small><?php esc_html_e('* Social buttons are visible only on sigle pages (posts, pages and custom post type) and not on list pages such as main blog page, category pages, tag pages, etc...', 'cresta-social-share-counter-pro'); ?></small>
					</td>
				</tr>
			</tbody>	
		</table>
		<h3><div class="dashicons dashicons-admin-comments space"></div><?php esc_html_e('Tooltip :', 'cresta-social-share-counter-pro'); ?></h3>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Show Tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkthetooltip" name="cresta_social_shares_show_tooltip" class="crestaenabletooltip <?php if(get_option('cresta_social_shares_show_tooltip') == "1") { echo 'active'; }?>" value="1" <?php checked( get_option('cresta_social_shares_show_tooltip'), '1' ); ?>>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Facebook tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_facebook" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_facebook'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Twitter tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_twitter" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_twitter'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Google Plus tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_googleplus" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_googleplus'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Linkedin tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_linkedin" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_linkedin'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Pinterest tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_pinterest" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_pinterest'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'StumbleUpon tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_stumbleupon" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_stumbleupon'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'VK tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_vk" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_vk'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Buffer tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_buffer" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_buffer'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Reddit tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_reddit" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_reddit'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'OK.ru tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_ok" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_ok'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Xing tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_xing" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_xing'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'WhatsApp tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_whatsapp" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_whatsapp'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Telegram tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_telegram" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_telegram'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Email tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_email" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_email'));?>"/>
					</td>
				</tr>
				<tr valign="top" class="crestashowtooltipname">
					<th scope="row"><?php esc_html_e( 'Print tooltip', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="text" name="cresta_social_shares_tooltip_print" value="<?php echo esc_attr(get_option('cresta_social_shares_tooltip_print'));?>"/>
					</td>
				</tr>
			</tbody>	
		</table>
		<h3><div class="dashicons dashicons-admin-generic space"></div><?php esc_html_e('Advanced :', 'cresta-social-share-counter-pro'); ?></h3>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Custom CSS Code', 'cresta-social-share-counter-pro' ); ?></th>
					<td>
						<textarea name="cresta_social_shares_custom_css" class="large-text code" rows="10"><?php echo esc_textarea(get_option('cresta_social_shares_custom_css')); ?></textarea>
						<span class="description"><?php esc_html_e( 'Write here your custom CSS code if you want to customize the style of the buttons', 'cresta-social-share-counter-pro' ); ?></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Facebook APP ID', 'cresta-social-share-counter-pro' ); ?></th>
					<td>
						<span class="description"><?php esc_html_e( 'If your Facebook shares count doesn\'t work, you can try to use the APP ID.', 'cresta-social-share-counter-pro' ); ?> <a target="_blank" href="http://crestaproject.com/add-facebook-app-id-cresta-social-share-counter-plugin/"><?php esc_html_e( 'How to create a Facebook APP ID', 'cresta-social-share-counter-pro'); ?></a></span><br/>
						<input type="text" name="cresta_social_shares_facebook_appid" value="<?php echo esc_attr(get_option('cresta_social_shares_facebook_appid'));?>"/>
						<span class="description"><?php esc_html_e( 'Your Facebook APP ID', 'cresta-social-share-counter-pro' ); ?></span>
						<br/>
						<input type="text" name="cresta_social_shares_facebook_appsecret" value="<?php echo esc_attr(get_option('cresta_social_shares_facebook_appsecret'));?>"/>
						<span class="description"><?php esc_html_e( 'Your Facebook Secret Token', 'cresta-social-share-counter-pro' ); ?></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Linkedin alternative share count method', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkbeforecontent" name="cresta_social_shares_linkedin_alternative_count" value="1" <?php checked( get_option('cresta_social_shares_linkedin_alternative_count'), '1' ); ?>>
						<span class="description"><?php esc_html_e( 'If Linkedin share count does not work, try checking this field and using an alternative method', 'cresta-social-share-counter-pro' ); ?></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Shares HTTP + HTTPS (beta)', 'cresta-social-share-counter-pro' ); ?></th>
					<td>						
						<input type="checkbox" id="chkbeforecontent" name="cresta_social_shares_http_https_both" value="1" <?php checked( get_option('cresta_social_shares_http_https_both'), '1' ); ?>>
						<span class="description"><?php esc_html_e( 'Enable this option only if you have made your site switch from HTTP to HTTPS. This way, the number of shares of your website in http will be aggregated to https', 'cresta-social-share-counter-pro' ); ?></span>
					</td>
				</tr>
			</tbody>	
		</table>
		<h3><div class="dashicons dashicons-admin-network space"></div><?php esc_html_e('Plugin License :', 'cresta-social-share-counter-pro'); ?></h3>
		<table class="form-table">
			<tbody>
				<?php 
					$license_cresta = get_option( 'cresta_social_license_key' );
					$status = get_option('cresta_social_license_status'); 
				?>
					<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Enter your license key', 'cresta-social-share-counter-pro' ); ?></th>
						<td>
							<input id="cresta_social_license_key" name="cresta_social_license_key" type="text" class="regular-text" value="<?php echo esc_attr( $license_cresta ); ?>" />
							<span style="display: block;margin-bottom: 10px;" class="description"><?php esc_html_e( 'License key is valid for one year from the date of purchase. With the license key you can update the plugin directly from the WordPress Dashboard and get support. After one year, license key may be renewed at a 10% discount from the purchase price of a new license (two weeks before the expiration of the license key will receive an email and you can decide whether to renew the license or not). If you decide to not renew the license key: no problem, you can continue to use the plugin forever, but you will not receive updates and support.', 'cresta-social-share-counter-pro' ); ?></span>
							<?php if( false !== $license_cresta ) { ?>
								<?php if( $status !== false && $status == 'valid' ) { ?>
									<span style="color:green; display: inline-block; vertical-align: sub;"><span class="dashicons dashicons-yes"></span> <?php esc_html_e('Active', 'cresta-social-share-counter-pro'); ?></span>
									<?php wp_nonce_field( 'cresta_social_nonce', 'cresta_social_nonce' ); ?>
									<input type="submit" class="button button-secondary" name="cresta_license_deactivate" value="<?php esc_attr_e('Deactivate License', 'cresta-social-share-counter-pro'); ?>"/>
								<?php } else {
									wp_nonce_field( 'cresta_social_nonce', 'cresta_social_nonce' ); ?>
									<input type="submit" class="button button-secondary" name="cresta_license_activate" value="<?php esc_attr_e('Activate License', 'cresta-social-share-counter-pro'); ?>"/>
								<?php } ?>
							<?php } ?>
						</td>
					</tr>
			</tbody>	
		</table>
		
		<?php submit_button(); ?>
</form>
</div> <!-- .inside -->

                        </div> <!-- .postbox -->

                    </div> <!-- .meta-box-sortables .ui-sortable -->

                </div> <!-- post-body-content -->
  <!-- sidebar -->
                <div id="postbox-container-1" class="postbox-container">

                    <div class="meta-box-sortables">
					<?php if( $status !== false && $status == 'valid' ): ?>
                        <div class="postbox">
                            <h3><span><div class="dashicons dashicons-email-alt"></div> Need support?</span></h3>
                            <div class="inside">
								For any kind of problem or clarification you can contact technical support. <i>(Login Required)</i><br/>
								<br/>
								<a class="crestaButton" href="https://crestaproject.com/support/"title="Technical Support" class="btn btn-primary" target="_blank">CrestaProject Support</a>
                            </div> <!-- .inside -->
                        </div> <!-- .postbox -->
					<?php endif; ?>
                        <div class="postbox" style="border: 2px solid #d54e21;"> <!-- quick-contact -->
                            
                            <h3><span><div class="dashicons dashicons-megaphone"></div> Premium WordPress Themes</span></h3>
                            <div class="inside">
                                <a href="https://crestaproject.com/themes/" target="_blank" alt="20% off"><img src="<?php echo plugins_url( '/images/cresta-social-share-counter-pro-discount-code.png' , __FILE__ ); ?>"></a><br/>
								Since you purchased <strong>Cresta Social Share Counter PRO</strong>, we will give you a discount code that allows you to <strong>get 20% off</strong> on all <strong>CrestaProject Premium Themes</strong>.<br /><br />
								To get the discount:
								<ul>
									<li><div class="dashicons dashicons-arrow-right"></div> Go To <a href="https://crestaproject.com/themes/" target="_blank">CrestaProject Themes</a></li>
									<li><div class="dashicons dashicons-arrow-right"></div> Choose one or more themes and include them in the cart</li>
									<li><div class="dashicons dashicons-arrow-right"></div> Go to the checkout and find the entry <i>"Have a discount code?"</i></li>
									<li><div class="dashicons dashicons-arrow-right"></div> Enter the code: <strong>20CRESTA</strong></li>
									<li><div class="dashicons dashicons-arrow-right"></div> Proceed to purchase</li>
								</ul>
								<a class="crestaButton" href="https://crestaproject.com/themes/" target="_blank" title="Cresta Project Themes">CrestaProject WordPress Themes</a>
                            </div> <!-- .inside -->
                         </div> <!-- .postbox -->
						 <div class="postbox" style="border: 2px solid #0074a2;">
                            
                            <h3><span><div class="dashicons dashicons-admin-plugins"></div> Cresta Posts Box Plugin</span></h3>
                            <div class="inside">
                                <a href="https://crestaproject.com/downloads/cresta-posts-box/" target="_blank" alt="Get Cresta Posts Box"><img src="<?php echo plugins_url( '/images/banner-cresta-posts-box.png' , __FILE__ ); ?>"></a><br/>
								Show the next or previous post in a box that appears when <strong>the user scrolls to the bottom of a current post</strong>.<br/><br/>
								With <strong>Cresta Posts Box</strong> you can show, in a single page (posts, pages or custom post types), a <strong>small box that allows the reader to go to the next or previous post</strong>. The box appears only when the reader finishes reading the current post.
								<a class="crestaButton" href="https://crestaproject.com/downloads/cresta-posts-box/" target="_blank" title="Cresta Posts Box">Available in FREE and PRO version</a>
                            </div> <!-- .inside -->
                         </div> <!-- .postbox -->
						 <div class="postbox" style="border: 2px solid #a0f55d;">
                            
                            <h3><span><div class="dashicons dashicons-admin-plugins"></div> Cresta Facebook Messenger Plugin</span></h3>
                            <div class="inside">
                                <a href="https://crestaproject.com/downloads/cresta-facebook-messenger/" target="_blank" alt="Get Cresta Posts Box"><img src="<?php echo plugins_url( '/images/banner-cresta-facebook-messenger.png' , __FILE__ ); ?>"></a><br/>
								With Cresta Facebook Messenger you can allow your users or customers to contact you via <strong>Facebook Messenger</strong> simply by clicking on a button.<br/>
								Users may contact you directly in <strong>private messages</strong> on your Facebook page and continue the conversation on Facebook Messenger
								<a class="crestaButton" href="https://crestaproject.com/downloads/cresta-facebook-messenger/" target="_blank" title="Cresta Facebook Messenger">Available in FREE and PRO version</a>
                            </div> <!-- .inside -->
                         </div> <!-- .postbox -->
                    </div> <!-- .meta-box-sortables -->
                </div> <!-- #postbox-container-1 .postbox-container -->
            </div> <!-- #post-body .metabox-holder .columns-2 -->
            <br class="clear">
        </div> <!-- #poststuff -->
	</div>
	<?php 
	echo ob_get_clean();
}

/* Validate options */
function crestasocialshare_options_validate_1($input) {
	if($input != '' && is_array($input)) {
		$buttons = implode(',',$input);
		$input = wp_filter_nohtml_kses($buttons); 
	} else {
		$input = 'facebook'; 
	}
	return $input;
}
function crestasocialshare_options_validate_2($input) {
	if($input != '' && is_array($input)) {
		$show_on = implode(',',$input);
		$input = wp_filter_nohtml_kses($show_on); 
	} else {
		$input = 'page,post'; 
	}
	return $input;
}
function crestasocialshare_options_validate_3($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_4($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_5($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_6($input) {
	$input = sanitize_text_field(absint($input));
	return $input;
}
function crestasocialshare_options_validate_7($input) {
	$input = sanitize_text_field(absint($input));
	return $input;
}
function crestasocialshare_options_validate_8($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_9($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_10($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_11($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_12($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_13($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_14($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_15($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_16($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_17($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_18($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_19($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_20($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_21($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_22($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_23($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_24($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_25($input) {
	$input = sanitize_text_field(absint($input));
	return $input;
}
function crestasocialshare_options_validate_26($input) {
	$input = sanitize_text_field(absint($input));
	return $input;
}
function crestasocialshare_options_validate_27($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_28($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_29($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_30($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_31($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_32($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_33($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_34($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_35($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_36($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_37($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_38($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_39($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_40($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_41($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_42($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_43($input) {
	$input = sanitize_text_field(absint($input));
	return $input;
}
function crestasocialshare_options_validate_44($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_45($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_46($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_47($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_48($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_49($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_50($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_51($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_52($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_53($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_54($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_55($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_56($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_57($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_58($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_59($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_60($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_61($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_62($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_63($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_64($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_65($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_66($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_67($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_68($input) {
	$input = sanitize_text_field($input);
	return $input;
}
function crestasocialshare_options_validate_69($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_70($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function crestasocialshare_options_validate_71($input) {
	$input = sanitize_text_field(absint($input));
	return $input;
}
function crestasocialshare_options_validate_72($input) {
	$input = wp_filter_nohtml_kses($input);
	return $input;
}
function cresta_sanitize_license($input) {
	$old = get_option('cresta_social_license_key');
	if( $old && $old != $input ) {
		delete_option( 'cresta_social_license_status' );
	}
	return $input;
}

function cresta_social_activate_license() {
	if( isset( $_POST['cresta_license_activate'] ) ) {
	 	if( ! check_admin_referer( 'cresta_social_nonce', 'cresta_social_nonce' ) ) 	
			return;
		$license_cresta = trim( get_option( 'cresta_social_license_key' ) );
		$api_params = array( 
			'edd_action'=> 'activate_license', 
			'license' 	=> $license_cresta, 
			'item_name' => urlencode( CRESTA_SOCIAL_ITEM_NAME ),
			'url'       => home_url()
		);
		$response = wp_remote_post( CRESTA_SOCIAL_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.', 'cresta-social-share-counter-pro' );
			}
		} else {
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );
			if ( false === $license_data->success ) {
				switch( $license_data->error ) {
					case 'expired' :
						$message = sprintf(
							__( 'Your license key expired on %s.', 'cresta-social-share-counter-pro' ),
							date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
						);
						break;
					case 'revoked' :
						$message = __( 'Your license key has been disabled.', 'cresta-social-share-counter-pro' );
						break;
					case 'missing' :
						$message = __( 'Invalid license.', 'cresta-social-share-counter-pro' );
						break;
					case 'invalid' :
					case 'site_inactive' :
						$message = __( 'Your license is not active for this URL.', 'cresta-social-share-counter-pro' );
						break;
					case 'item_name_mismatch' :
						$message = sprintf( __( 'This appears to be an invalid license key for %s.' ,'cresta-social-share-counter-pro' ), CRESTA_SOCIAL_ITEM_NAME );
						break;
					case 'no_activations_left':
						$message = __( 'Your license key has reached its activation limit.', 'cresta-social-share-counter-pro' );
						break;
					default :
						$message = __( 'An error occurred, please try again.', 'cresta-social-share-counter-pro' );
						break;
				}
			}
		}
		if ( ! empty( $message ) ) {
			$base_url = admin_url( 'admin.php?page=' . CRESTA_SOCIAL_PLUGIN_PAGE );
			$redirect = add_query_arg( array( 'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );
			wp_redirect( $redirect );
			exit();
		}
		update_option( 'cresta_social_license_status', $license_data->license );
		wp_redirect( admin_url( 'admin.php?page=' . CRESTA_SOCIAL_PLUGIN_PAGE ) );
		exit();
	}
}
add_action('admin_init', 'cresta_social_activate_license');

function cresta_social_deactivate_license() {
	if( isset( $_POST['cresta_license_deactivate'] ) ) {
	 	if( ! check_admin_referer( 'cresta_social_nonce', 'cresta_social_nonce' ) ) 	
			return;
		$license_cresta = trim( get_option( 'cresta_social_license_key' ) );
		$api_params = array( 
			'edd_action'=> 'deactivate_license', 
			'license' 	=> $license_cresta, 
			'item_name' => urlencode( CRESTA_SOCIAL_ITEM_NAME ),
			'url'       => home_url()
		);
		$response = wp_remote_post( CRESTA_SOCIAL_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.', 'cresta-social-share-counter-pro' );
			}
			$base_url = admin_url( 'admin.php?page=' . CRESTA_SOCIAL_PLUGIN_PAGE );
			$redirect = add_query_arg( array( 'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );
			wp_redirect( $redirect );
			exit();
		}
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		if( $license_data->license == 'deactivated' ) {
			delete_option( 'cresta_social_license_status' );
		}
		wp_redirect( admin_url( 'admin.php?page=' . CRESTA_SOCIAL_PLUGIN_PAGE ) );
		exit();
	}
}
add_action('admin_init', 'cresta_social_deactivate_license');

function cresta_social_notices_license() {
	if ( isset( $_GET['sl_activation'] ) && ! empty( $_GET['message'] ) ) {
		switch( $_GET['sl_activation'] ) {
			case 'false':
				$message = urldecode( $_GET['message'] );
				?>
				<div class="error">
					<p><?php echo $message; ?></p>
				</div>
				<?php
				break;
		}
	}
}
add_action( 'admin_notices', 'cresta_social_notices_license' );
?>