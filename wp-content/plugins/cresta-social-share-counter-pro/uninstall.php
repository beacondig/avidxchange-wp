<?php 
// if delete/uninstall is not called from WP, then exit
if ( ! defined( 'ABSPATH' ) && ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit('Failed to uninstall.');
}

// delete plugin options
delete_option( 'selected_button' );
delete_option( 'cresta_social_shares_selected_page' );
delete_option( 'cresta_social_shares_float' );
delete_option( 'cresta_social_shares_float_buttons' );
delete_option( 'cresta_social_shares_style' );
delete_option( 'cresta_social_shares_position_top' );
delete_option( 'cresta_social_shares_position_left' );
delete_option( 'cresta_social_shares_twitter_username' );
delete_option( 'cresta_social_shares_show_counter' );
delete_option( 'cresta_social_shares_show_ifmorezero' );
delete_option( 'cresta_social_shares_show_total' );
delete_option( 'cresta_social_shares_total_text' );
delete_option( 'cresta_social_shares_disable_mobile' );
delete_option( 'cresta_social_shares_enable_animation' );
delete_option( 'cresta_social_shares_choose_animation' );
delete_option( 'cresta_social_shares_enable_samecolors' );
delete_option( 'cresta_social_shares_choose_hover' );
delete_option( 'cresta_social_shares_before_content' );
delete_option( 'cresta_social_shares_after_content' );
delete_option( 'cresta_social_shares_text_color_single' );
delete_option( 'cresta_social_shares_background_color_single' );
delete_option( 'cresta_social_shares_text_color_total' );
delete_option( 'cresta_social_shares_show_floatbutton' );
delete_option( 'cresta_social_shares_stick_floatbutton' );
delete_option( 'cresta_social_shares_stick_position_top' );
delete_option( 'cresta_social_shares_stick_position_left' );
delete_option( 'cresta_social_shares_show_tooltip' );
delete_option( 'cresta_social_shares_tooltip_facebook' );
delete_option( 'cresta_social_shares_tooltip_twitter' );
delete_option( 'cresta_social_shares_tooltip_googleplus' );
delete_option( 'cresta_social_shares_tooltip_linkedin' );
delete_option( 'cresta_social_shares_tooltip_pinterest' );
delete_option( 'cresta_social_shares_tooltip_stumbleupon' );
delete_option( 'cresta_social_shares_tooltip_vk' );
delete_option( 'cresta_social_shares_tooltip_buffer' );
delete_option( 'cresta_social_shares_tooltip_reddit' );
delete_option( 'cresta_social_shares_tooltip_ok' );
delete_option( 'cresta_social_shares_tooltip_xing' );
delete_option( 'cresta_social_shares_tooltip_whatsapp' );
delete_option( 'cresta_social_shares_tooltip_telegram' );
delete_option( 'cresta_social_shares_tooltip_email' );
delete_option( 'cresta_social_shares_tooltip_print' );
delete_option( 'cresta_social_shares_enable_shadow' );
delete_option( 'cresta_social_shares_enable_shadow_buttons' );
delete_option( 'cresta_social_shares_z_index' );
delete_option( 'cresta_social_shares_button_size' );
delete_option( 'cresta_social_shares_button_hide_show' );
delete_option( 'cresta_social_shares_colors_option' );
delete_option( 'cresta_social_shares_facebook_color' );
delete_option( 'cresta_social_shares_twitter_color' );
delete_option( 'cresta_social_shares_gplus_color' );
delete_option( 'cresta_social_shares_linkedin_color' );
delete_option( 'cresta_social_shares_pinterest_color' );
delete_option( 'cresta_social_shares_stumbleupon_color' );
delete_option( 'cresta_social_shares_vk_color' );
delete_option( 'cresta_social_shares_buffer_color' );
delete_option( 'cresta_social_shares_reddit_color' );
delete_option( 'cresta_social_shares_ok_color' );
delete_option( 'cresta_social_shares_xing_color' );
delete_option( 'cresta_social_shares_whatsapp_color' );
delete_option( 'cresta_social_shares_telegram_color' );
delete_option( 'cresta_social_shares_mail_color' );
delete_option( 'cresta_social_shares_print_color' );
delete_option( 'cresta_social_shares_custom_css' );
delete_option( 'cresta_social_shares_twitter_shares' );
delete_option( 'cresta_social_shares_facebook_appid' );
delete_option( 'cresta_social_shares_facebook_appsecret' );
delete_option( 'cresta_social_shares_pintmode' );
delete_option( 'cresta_social_shares_total_text_only_zero' );
delete_option( 'cresta_social_shares_linkedin_alternative_count' );
delete_option( 'cresta_social_shares_show_ifmorenumber' );
delete_option( 'cresta_social_shares_http_https_both' );
?>