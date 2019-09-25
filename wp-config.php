<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', FALSE ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

# Database Configuration
define( 'DB_NAME', 'wp_avidxdev' );
define( 'DB_USER', 'dennis' );
define( 'DB_PASSWORD', 'Hy&iig6p)ha3' );
define( 'DB_HOST', 'localhost' );
define( 'DB_HOST_SLAVE', 'localhost' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'RNE 0)-E$Z#[c4v?-vu|q>s<=k41#mB[h|5!|OrrM)Y$-^QCQ>&SOjQ+G|Gk~5 >');
define('SECURE_AUTH_KEY',  'Is,n8B&,qY[#TofuD2$y`p(OHE/}dXOO!5*KgUZ2>u:n>jtpl[E{C[#:((~$m*G>');
define('LOGGED_IN_KEY',    'f>`.6S383V3rw6d/-t4eNA>EsLZWf;-8|)ul5$+-`?hC:yuN1p)x1ZCr+yK2R]@w');
define('NONCE_KEY',        'X~`M/=`q27|Km<&vw7MY7l-T?n%!lw$I!Vgis:gz,55+VLsa+j{mS-p%tmEi)X15');
define('AUTH_SALT',        'M!00=5q>=*3-v%i9$pIK,y>+v,/drm1J$YjFo?l{jc%ZVp5S&jfWwxhY lpE3.Px');
define('SECURE_AUTH_SALT', '+a0!>!*&ta`M=-s%Z)A;njuSvU5~BiO?+dY(|*@~9bd-|21$?# BUcE,8!Nh~p+&');
define('LOGGED_IN_SALT',   'R9vfi6:Hl9F9Jtu{al7~|!Y3^4]oI>p|@a|ioM8KjIle+stN @:vrf<q)zY+$s_M');
define('NONCE_SALT',       ' R4pI7P]> ){YB o&UVF!<+2@S[2bhfBxYR6qn;c)uJhAIDjWtWO--KO[e^B(NZW');


# Localized Language Stuff

define( 'WP_CACHE', TRUE ); // Added by WP Rocket

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'avidxdev' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'fd977a4895c9bdd3191d2614b483ddb0333bb681' );

define( 'WPE_CLUSTER_ID', '95038' );

define( 'WPE_CLUSTER_TYPE', 'utility' );

define( 'WPE_ISP', false );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 22 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'avidxdev.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'varnish-95038.wpestorage.net', );

$wpe_special_ips=array ( 0 => '100.26.21.46', 1 => '54.162.227.195', 2 => 'varnish-95038.wpestorage.net', 3 => '172.16.0.64', 4 => '54.82.96.183', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'localhost:11211', ), );

define( 'WP_SITEURL', 'http://avidx:8888' );

define( 'WP_HOME', 'http://avidx:8888' );
define('WPLANG', '');

# WP Engine ID


# WP Engine Settings







# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');






