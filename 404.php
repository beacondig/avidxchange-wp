<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'genesis_404' );
/**
 * This function outputs a 404 "Not Found" error message.
 *
 * @since 1.6
 */
function genesis_404() {

	genesis_markup( array(
		'open' => '<article class="entry">',
		'context' => 'entry-404',
	) );
?>
	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
    <div class="fiftyspacer"></div>
<?php
		printf( '<h1 class="entry-title" style="text-align:center; font-size:150px;">%s</h1>', apply_filters( 'genesis_404_entry_title', __( '404', 'genesis' ) ) );
		echo '<h2 style="text-align:center;margin-top: -10px;">Not Found</h2>';
		echo '<div class="thirtyspacer"></div>';
		echo '<div class="entry-content">';

		echo apply_filters( 'genesis_404_entry_content', '<p style="padding-bottom:10px;">' . sprintf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for or use the search field below.', 'genesis' ), trailingslashit( home_url() ) ) . '</p>' );
		?>		
		<form method="get" id="menu-search-form" class="menu-search-form" style="margin:auto;" action="<?php get_bloginfo('home') ?>/"><p style="margin:0px; white-space:nowrap;"><input class="text_input" type="text" placeholder="Search..." name="s" id="s" /><button type="submit" class="btn btn-searchon"><i class="fa fa-search" ></i></button></p></form>
		<br />
        <div class="col-md-6 center"><a class="secondarybutton mediumbutton" href="/ap-automation/">AP Automation Solutions</a></div>
        <div class="col-md-6 center"><a class="secondarybutton mediumbutton" href="/integrations/">Accounting System Integrations</a></div>
        <div class="clearfix"></div>
        <div class="col-md-4 center"><a class="secondarybutton mediumbutton" href="/ap-automation/payables-lockbox/">Payables Lockbox</a></div>
        <div class="col-md-4 center"><a class="secondarybutton mediumbutton" href="/ap-automation/create-a-check/">Create-a-Check</a></div>
        <div class="col-md-4 center"><a class="secondarybutton mediumbutton" href="/ap-automation/utility/">Utility &amp; Energy</a></div>
        <div class="clearfix"></div>
        <div class="col-md-4 center"><a class="secondarybutton mediumbutton" href="/piracle/">Piracle</a></div>
        <div class="col-md-4 center"><a class="secondarybutton mediumbutton" href="/energy-solve/">EnergySolve</a></div>
        <div class="col-md-4 center"><a class="secondarybutton mediumbutton" href="/strongroom-solutions/">Strongroom Solutions</a></div>
        <div class="clearfix"></div>
		<?php
		 $pages = wp_list_pages('title_li=&depth=-1&exclude=2037,2134,1862,2035&echo=0');
preg_match_all('/(<li.*?>)(.*?)<\/li>/i', $pages, $matches);
if (!empty($matches[0])) {
	shuffle($matches[0]);
  echo '<h4>You can also check out these other pages:</h4>';
  print '<ul>' . implode("\n",array_slice($matches[0],0,25)) . '</ul>';}
			

		echo '</div></div>';
		

	genesis_markup( array(
		'close' => '</article>',
		'context' => 'entry-404',
	) );

}

genesis();
