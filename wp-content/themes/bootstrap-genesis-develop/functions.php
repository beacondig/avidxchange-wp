<?php
/**
 * functions.php
 *
 */

/**
 * Include all php files in the /includes directory
 *
 * https://gist.github.com/theandystratton/5924570
 */
add_action( 'genesis_setup', 'bsg_load_lib_files', 15 );

function bsg_load_lib_files() {
    foreach ( glob( dirname( __FILE__ ) . '/lib/*.php' ) as $file ) { include $file; }
}

//recompile sass automatically on change
define('WP_SCSS_ALWAYS_RECOMPILE', true);


/* Loads favicon from specified URL
*********************************************************/
add_filter( 'genesis_pre_load_favicon', 'my_favicon' );
function my_favicon( $favicon) {
    //replace this with the path of your favicon file
    $favicon = '/favicon.ico';
    return $favicon;
}


/* Setup Menus
*********************************************************/
require_once( get_template_directory() . '/lib/init.php' );
remove_theme_support ( 'genesis-menus' );
add_theme_support ( 'genesis-menus' , array ( 
'secondary' => 'Top Navigation Menu' ,
'primary' => 'Primary Navigation Menu' , 
'careers-menu' => 'Careers Navigation Menu' , 
'suppliers-menu' => 'Suppliers Navigation Menu' , 
'sub-menu' => 'Sub Navigation Menu',
'products-menu' => 'Products Menu',
're-menu' => 'Real Estate Menu',
'customer-menu' => 'Customer Referral Menu',
'mailer-menu' => 'Direct Mailer Menu',
'footer1' => 'Footer 1',
'footer2' => 'Footer 2',
'footer3' => 'Footer 3',
'footer4' => 'Footer 4'
) );


/* Setup Widgets
*********************************************************/
if ( function_exists('register_sidebar') ) {
  register_sidebar(array(
    'name' => 'OnDemand Webinar Sidebar',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'name' => 'Beginners Guide Chapter Sidebar',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));


register_sidebar(array(
    'name' => 'Cornerstone Sidebar',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
}


//customizing the careers menu a classes
function add_menuclass($ulclass) {
    return preg_replace('/<a rel="fancyscroll"/', '<a class="scroll" itemprop="url"', $ulclass, -1);
}
add_filter('wp_nav_menu','add_menuclass');


//careers nav
add_action( 'genesis_before', 'genesis_do_thirdnav' ); 
function genesis_do_thirdnav() {
	?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FSVCZ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <!--- Popup Modal for the Schedule Demo button (Embedded field values - DJ style) --->
	<div class="modal fade" id="demoModal1" role="dialog">
	  <div class="modal-dialog modal-sm">

		<div class="modal-content">
			<button type="button" class="closeblue" data-dismiss="modal">&times;</button>
			<div class="modal-header"><h6>Speak to an AP Automation expert</h6>Fill out your information and we’ll connect you with one of our AP Automation experts.</div>
		  <div class="modal-body">
			<div><div class="demoformblue demoformpopblue"><?php echo do_shortcode('[gravityform id=15 title=false description=false ajax=true tabindex=49]'); ?></div></div>
		  </div>
		</div>

	  </div>
	</div>
	<!--- form modal end --->
	<!--- Popup Modal for the Schedule Demo button (Optimizely Style) --->
	<div class="modal fade" id="demoModal2" role="dialog">
	  <div class="modal-dialog modal-md">

		<div class="modal-content">
			<div class="modal-header"><h4>Speak to an AP Automation expert</h4>Fill out your information and we’ll connect you with one of our AP Automation experts.</div>
		  <div class="modal-body">
			<div><div class="demoformwide demoformpop" style="max-width:100%;"><?php echo do_shortcode('[gravityform id=16 title=false description=false ajax=true tabindex=49]'); ?></div></div>
			  <div style="text-align:center; padding-bottom:20px; margin-top:-20px;">
			<button type="button" class="closewide" data-dismiss="modal">Cancel</button></div>
		  </div>
		</div>

	  </div>
	</div>
	<!--- form modal end --->
    <?php
	echo '<nav class="nav-primary navbar navbar-default navbar-static-top nav-careers" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
		<div class="container-fluid thirtysidepad twentyfourtoppad">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse-careers">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><a class="navbar-brand" id="logo2" title="" href="/"><img src="/wp-content/uploads/avidxchange-logo.svg" width="192" height="31" style="height:31px; overflow:hidden;" /></a></div><div class="collapse navbar-collapse" id="nav-collapse-careers">';
	wp_nav_menu( array( 'theme_location' => 'careers-menu', 'menu_class' => 'nav navbar-nav', 'depth' => '1', 'container_class' => 'genesis-nav-menu' ) );
	echo '</div></div></nav>';
	
	
	echo '<nav class="nav-primary navbar navbar-default navbar-static-top nav-suppliers" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
		<div class="container-fluid thirtysidepad twentyfourtoppad">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse-suppliers">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><a class="navbar-brand" id="logo3" title="" href="/"><img src="/wp-content/uploads/avidxchange-logo.svg" width="192" height="31" style="height:31px; overflow:hidden;" /></a></div><div class="collapse navbar-collapse" id="nav-collapse-suppliers">';
	wp_nav_menu( array( 'theme_location' => 'suppliers-menu', 'menu_class' => 'nav navbar-nav', 'depth' => '1', 'container_class' => 'genesis-nav-menu' ) );
	echo '</div></div></nav>';
	
	echo '<nav class="nav-primary navbar navbar-default navbar-static-top nav-real-estate" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
		<div class="container-fluid thirtysidepad twentyfourtoppad">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse-real-estate">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><a class="navbar-brand" id="logo4" title="" href="/"><img src="/wp-content/uploads/avidxchange-logo.svg" width="192" height="31" style="height:31px; overflow:hidden;" /></a></div><div class="collapse navbar-collapse" id="nav-collapse-real-estate">';
	wp_nav_menu( array( 'theme_location' => 're-menu', 'menu_class' => 'nav navbar-nav', 'depth' => '1', 'container_class' => 'genesis-nav-menu' ) );
	echo '</div></div></nav>';
	
	echo '<nav class="nav-primary navbar navbar-default navbar-static-top nav-customer" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
		<div class="container-fluid thirtysidepad twentyfourtoppad">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse-real-estate">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><a class="navbar-brand" id="logo4" title="" href="/"><img src="/wp-content/uploads/avidxchange-logo.svg" width="192" height="31" style="height:31px; overflow:hidden;" /></a></div><div class="collapse navbar-collapse" id="nav-collapse-real-estate">';
	wp_nav_menu( array( 'theme_location' => 'customer-menu', 'menu_class' => 'nav navbar-nav', 'depth' => '1', 'container_class' => 'genesis-nav-menu' ) );
	echo '</div></div></nav>';
	
	echo '<nav class="nav-primary navbar navbar-default navbar-static-top nav-mailer" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
		<div class="container-fluid thirtysidepad twentyfourtoppad">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse-mailer">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><a class="navbar-brand" id="logo4" title="" href="/"><img src="/wp-content/uploads/avidxchange-logo.svg" width="192" height="31" style="height:31px; overflow:hidden;" /></a></div><div class="collapse navbar-collapse" id="nav-collapse-mailer">';
	wp_nav_menu( array( 'theme_location' => 'mailer-menu', 'menu_class' => 'nav navbar-nav', 'depth' => '1', 'container_class' => 'genesis-nav-menu' ) );
	echo '</div></div></nav>';
}


// add search bar to the top menu 
function add_search_to_wp_menu ( $items, $args ) {
	if( 'secondary' === $args -> theme_location ) {
		$items .= '<li class="menu-item menu-item-search">';
		//$items .= do_shortcode('[404-search]');
		$items .= '<div class="baseglass"><button id="searchshow" type="submit" class="btn btn-search">
    <i class="fa fa-search" ></i></button><div class="sformdiv"><form method="get" id="menu-search-form" class="menu-search-form" action="' . get_bloginfo('home') . '/"><p style="margin:0px; white-space:nowrap;"><input class="text_input" type="text" placeholder="Search..." name="s" id="s" /><div id="clsearch"><i id="clx" class="fa fa-times-circle" aria-hidden="true"></i></div>
    <i class="fa fa-search" style="margin-top:40px;" ></i></button></p></form></div></div>';
		$items .= '</li>';
	}
	return $items;
}
add_filter('wp_nav_menu_items','add_search_to_wp_menu',10,2);



/* Remove the entry header markup and page title
*********************************************************/ 
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );



/* Setup the color slivers
*********************************************************/
add_action( 'genesis_before_footer', 'add_footer_slivers' );
function add_footer_slivers() {
	if(!(is_page(51))) {
		echo '<div class="greenbottomsliver" id="stopwidget"></div>';
		echo '<div class="bluebottomsliver"></div>';
	} else if(is_page(51)) {
		echo '<div class="bluebottombar"></div>';
	}
}
/* Setup the Footer
*********************************************************/
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'sp_custom_footer' );
function sp_custom_footer() {
	?>
	<div class="container footpad">
    	<div class="rowspacer">
        	<div class="col-sm-6 col-md-3 smcenter footerheights"><h5><?php echo get_field('column_1_header', 'options'); ?></h5>
            <?php wp_nav_menu( array( 'theme_location' => 'footer1', 'menu_class' => 'nav2', 'depth' => '1', 'container_class' => 'genesis-foot-menu' ) );
			?></div>
        	<div class="col-sm-6 col-md-3 smcenter footerheights"><h5><?php echo get_field('column_2_header', 'options'); ?></h5>
            <?php wp_nav_menu( array( 'theme_location' => 'footer2', 'menu_class' => 'nav2', 'depth' => '1', 'container_class' => 'genesis-foot-menu' ) );
			?></div>
        	<div class="col-sm-6 col-md-3 smcenter footerheights"><h5><?php echo get_field('column_3_header', 'options'); ?></h5>
            <?php wp_nav_menu( array( 'theme_location' => 'footer3', 'menu_class' => 'nav2', 'depth' => '1', 'container_class' => 'genesis-foot-menu' ) );
			?></div>
        	<div class="col-sm-6 col-md-3 smcenter footerheights"><h5><?php echo get_field('column_4_header', 'options'); ?></h5>
            <?php wp_nav_menu( array( 'theme_location' => 'footer4', 'menu_class' => 'nav2', 'depth' => '1', 'container_class' => 'genesis-foot-menu' ) );
			?></div>
        </div>
        <div class="clearfix"></div>
        <div class="twentyspacer"></div>
    	<div>
        	<div class="col-xs-12 col-sm-12 col-md-4"><h5><?php echo get_field('newsletter_header', 'options'); ?></h5><?php echo get_field('newsletter_description', 'options'); ?></div>
        	<div class="col-xs-12 col-sm-12 col-md-4 sub-form">
			
			<!--[if lte IE 8]>
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
			<![endif]-->
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
				<script>
  					hbspt.forms.create({
						portalId: "430000",
						formId: "dbd5e9e1-d475-43b9-a6c8-267f9921e010",
						sfdcCampaignId: "70114000002CaiHAAS",
						target: '.sub-form'
					});
				</script>
			
			</div>
        	<div class="col-sm-12 col-md-4 ilink"><h5><?php echo get_field('social_header', 'options'); ?></h5>
            <a href="https://www.facebook.com/pages/AvidXchange-Inc/60903098932" target="_blank"><i class="fa fa-facebook-square"></i></a>
            <a href="https://twitter.com/AvidXchange" target="_blank"><i class="fa fa-twitter-square"></i></a>
            <a href="https://www.linkedin.com/company/54461?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A54461%2Cidx%3A2-1-4%2CtarId%3A1458050635964%2Ctas%3Aavidxchange" target="_blank"><i class="fa fa-linkedin-square last"></i></a></div>
        </div>
        <div class="clearfix"></div>
        <div class="twentyspacer"></div>
		<div>
  			
   			<div class="col-xs-12 col-sm-4" style="font-size:14px;">&copy; <?php echo date("Y"); ?> AvidXchange, Inc. All rights reserved.</div>
			<div class="col-xs-12 col-sm-8" style="font-size:14px;"><a href="/privacy-policy/">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/notice-to-customers/">Customer Notice</a>&nbsp;&nbsp;|&nbsp;&nbsp;NMLS ID #: 1494826</div>
		</div>
    </div>
	<?php
}



/* Setup the Options page in the admin for the CPT archive pages that need it
*********************************************************/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}



/* Filter the excerpt default "read more" string of [...].
*********************************************************/
function wpdocs_excerpt_more( $more ) {
	if(is_archive()) {
		return ' ';
	} else {
    	return '...';
	}
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );



/* custom excerpt length for the mini loops
*********************************************************/
function wpdocs_custom_excerpt_length( $length ) {
	//only use shorter excerpt on pages with the loops where we want less
	if(is_home() || is_front_page()) { 
    	return 20;
	} else {
		return 55;	
	}
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



/* check for parent category
*********************************************************/
function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return $category->category_parent;
    }
    return false;
}



/* add functionality to track post views for popularity
*********************************************************/
function subh_get_post_view( $postID ) {
 $count_key = 'post_views_count';
 $count     = get_post_meta( $postID, $count_key, true );
 if ( $count == '' ) {
 delete_post_meta( $postID, $count_key );
 add_post_meta( $postID, $count_key, '0' );
 
 return '0 View';
 }
 
 return $count . ' Views';
}
 
/**
 * To count number of views and store in database.
 *
 * @param $postID currently viewed post/page
 */
function subh_set_post_view( $postID ) {
 $count_key = 'post_views_count';
 $count     = (int) get_post_meta( $postID, $count_key, true );
 if ( $count < 1 ) {
 delete_post_meta( $postID, $count_key );
 add_post_meta( $postID, $count_key, '0' );
 } else {
 $count++;
 update_post_meta( $postID, $count_key, (string) $count );
 }
}
 
/**
 * Add a new column in the wp-admin posts list
 *
 * @param $defaults
 *
 * @return mixed
 */
function subh_posts_column_views( $defaults ) {
 $defaults['post_views'] = __( 'Views' );
 
 return $defaults;
}
 
/**
 * Display the number of views for each posts
 *
 * @param $column_name
 * @param $id
 *
 * @return void simply echo out the number of views
 */
function subh_posts_custom_column_views( $column_name, $id ) {
 if ( $column_name === 'post_views' ) {
 echo subh_get_post_view( get_the_ID() );
 }
}
 
add_filter( 'manage_posts_columns', 'subh_posts_column_views' );
add_action( 'manage_posts_custom_column', 'subh_posts_custom_column_views', 5, 2 );




/* remove default comments
*********************************************************/
function pw_remove_genesis_comments() {
	remove_action( 'genesis_after_post', 'genesis_get_comments_template' );
}
add_action( 'wp_enqueue_scripts', 'pw_remove_genesis_comments' );




/* add hidden option to gravity forms
*********************************************************/
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );



/* change gravity form submit button to fontawesome icon
*********************************************************/
add_filter("gform_submit_button_1", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fa fa-arrow-right' aria-hidden='true'></i></span></button>";
}
add_filter("gform_submit_button_2", "form_submit_button2", 10, 2);
function form_submit_button2($button, $form){
return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fa fa-arrow-right' aria-hidden='true'></i></span></button>";
}
add_filter("gform_submit_button_3", "form_submit_button3", 10, 2);
function form_submit_button3($button, $form){
return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fa fa-arrow-right' aria-hidden='true'></i></span></button>";
}
add_filter("gform_submit_button_4", "form_submit_button4", 10, 2);
function form_submit_button4($button, $form){
return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fa fa-arrow-right' aria-hidden='true'></i></span></button>";
}
add_filter("gform_submit_button_5", "form_submit_button5", 10, 2);
function form_submit_button5($button, $form){
return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fa fa-arrow-right' aria-hidden='true'></i></span></button>";
}
/*add_filter("gform_submit_button_6", "form_submit_button6", 10, 2);
function form_submit_button6($button, $form){
return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fa fa-arrow-right' aria-hidden='true'></i></span></button>";
}*/




/* Populate the demo request forms dynamically
********************************************************/
function objectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('objectToArray', (array) $object);
}

function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

add_filter( 'gform_pre_render_8', 'populate_posts_in' );
add_filter( 'gform_pre_validation_8', 'populate_posts_in' );
add_filter( 'gform_pre_submission_filter_8', 'populate_posts_in' );
add_filter( 'gform_admin_pre_render_8', 'populate_posts_in' );
function populate_posts_in( $form ) {
	global $post;
	$current_post = $post->post_name;
	
    foreach ( $form['fields'] as &$field ) {
        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-posts' ) === false ) {
            continue;
        }
        $postint = get_posts( 'post_type=integrations&numberposts=-1&post_status=publish&order_by=title&order=ASC' );
        $choices = array();
		$postint = objectToArray($postint);
		array_sort_by_column($postint, 'post_title');
		
        foreach ( $postint as $i => $post ) {
			if ($current_post === $post['post_name']) {
            	$choices[] = array( 'text' => $post['post_title'], 'value' => $post['post_title'], 'isSelected' => true  );
			} else {
            	$choices[] = array( 'text' => $post['post_title'], 'value' => $post['post_title'] );
			}
        }
		$choices[] = array( 'text' => 'Other', 'value' => 'Other' );
        $field->choices = $choices;
    }
	wp_reset_postdata(); wp_reset_query();
    return $form;
}
add_filter( 'gform_pre_render_7', 'populate_posts', 10, 3 );
add_filter( 'gform_pre_validation_7', 'populate_posts', 10, 3  );
add_filter( 'gform_pre_submission_filter_7', 'populate_posts', 10, 3  );
add_filter( 'gform_admin_pre_render_7', 'populate_posts', 10, 3  );
function populate_posts( $form, $ajax, $field_values ) {
	global $post;
    foreach ( $form['fields'] as &$field ) {
        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-posts' ) === false ) {
            continue;
        }
        $postint = get_posts( 'post_type=integrations&numberposts=-1&post_status=publish&order_by=title&order=ASC' );
        $choices = array();
		$postint = objectToArray($postint);
		array_sort_by_column($postint, 'post_title');
		
        foreach ( $postint as $i => $post ) {
			if ($field_values['intslct'] === $post['post_title']) {
            	$choices[] = array( 'text' => $post['post_title'], 'value' => $post['post_title'], 'isSelected' => true  );
			} else {
            	$choices[] = array( 'text' => $post['post_title'], 'value' => $post['post_title'] );
			}
        }
		$choices[] = array( 'text' => 'Other', 'value' => 'Other' );
        $field->placeholder = 'Select an Integration';
        $field->choices = $choices;
    }
	wp_reset_postdata(); wp_reset_query();
    return $form;
}
add_filter( 'gform_pre_render_14', 'populate_posts14', 10, 3 );
add_filter( 'gform_pre_validation_14', 'populate_posts14', 10, 3  );
add_filter( 'gform_pre_submission_filter_14', 'populate_posts14', 10, 3  );
add_filter( 'gform_admin_pre_render_14', 'populate_posts14', 10, 3  );
function populate_posts14( $form, $ajax, $field_values ) {
	global $post;
    foreach ( $form['fields'] as &$field ) {
        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-posts' ) === false ) {
            continue;
        }
        $postint = get_posts( 'post_type=integrations&numberposts=-1&post_status=publish&order_by=title&order=ASC' );
		$choices = array();
		$postint = objectToArray($postint);
		array_sort_by_column($postint, 'post_title');
		
        foreach ( $postint as $i => $post ) {
			if ($field_values['intslct'] === $post['post_title']) {
            	$choices[] = array( 'text' => $post['post_title'], 'value' => $post['post_title'], 'isSelected' => true  );
			} else {
            	$choices[] = array( 'text' => $post['post_title'], 'value' => $post['post_title'] );
			}
        }
		$choices[] = array( 'text' => 'Other', 'value' => 'Other' );
        $field->placeholder = 'Select an Integration';
        $field->choices = $choices;
    }
	wp_reset_postdata(); wp_reset_query();
    return $form;
}
add_filter( 'gform_pre_render_11', 'populate_posts_intg' );
add_filter( 'gform_pre_validation_11', 'populate_posts_intg' );
add_filter( 'gform_pre_submission_filter_11', 'populate_posts_intg' );
add_filter( 'gform_admin_pre_render_11', 'populate_posts_intg' );
function populate_posts_intg( $form ) {
	global $post;
	$current_post = $post->post_name;
    foreach ( $form['fields'] as &$field ) {
        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-partners' ) === false ) {
            continue;
        }
        $postint = get_posts( 'post_type=partners&numberposts=-1&post_status=publish&order_by=title&order=ASC' );
        $choices = array();
		$postint = objectToArray($postint);
		array_sort_by_column($postint, 'post_title');
		
        foreach ( $postint as $i => $post ) {
            if ($current_post === $post['post_name']) {
            	$choices[] = array( 'text' => $post['post_title'], 'value' => $post['post_title'], 'isSelected' => true  );
			} else {
            	$choices[] = array( 'text' => $post['post_title'], 'value' => $post['post_title'] );
			}
        }
        $field->placeholder = 'Select a Partnership Type';
        $field->choices = $choices;
    }
	wp_reset_postdata(); wp_reset_query();
    return $form;
}
add_filter( 'gform_pre_render_12', 'populate_posts_int' );
add_filter( 'gform_pre_validation_12', 'populate_posts_int' );
add_filter( 'gform_pre_submission_filter_12', 'populate_posts_int' );
add_filter( 'gform_admin_pre_render_12', 'populate_posts_int' );
function populate_posts_int( $form ) {
    foreach ( $form['fields'] as &$field ) {
        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-partners' ) === false ) {
            continue;
        }
        $postint = get_posts( 'post_type=partners&numberposts=-1&post_status=publish&order_by=title&order=ASC' );
        $choices = array();
		$postint = objectToArray($postint);
		array_sort_by_column($postint, 'post_title');
		
        foreach ( $postint as $i => $post ) {
            $choices[] = array( 'text' => $post['post_title'], 'value' => $post['post_title'] );
        }
        $field->placeholder = 'Select a Partnership Type';
        $field->choices = $choices;
    }
	wp_reset_postdata(); wp_reset_query();
    return $form;
}



/* custom user avatar
*********************************************************/
add_filter( 'avatar_defaults', 'newgravatar' );
function newgravatar ($avatar_defaults) {
$myavatar = get_stylesheet_directory_uri() . '/lib/images/historyX.gif';
$avatar_defaults[$myavatar] = "AvidXchange";
return $avatar_defaults;
}



/* custom image sizes
*********************************************************/
add_image_size( 'three-column', 340, 425 );
add_image_size( 'large-banner', 1920, 536 );



/* Remove Query String from Static Resources
/********************************************************/
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );



/* Remove Emoji included files since they will not be used
/********************************************************/
function disable_wp_emojis() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojis' );

//disable tinyMCE emojicons function
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

//remove DNS prefetch
add_filter( 'emoji_svg_url', '__return_false' );



/* Remove the default commenting js code, using disqus instead
*********************************************************/
function speed_clean_header_hook(){
wp_deregister_script( 'comment-reply' );
}
add_action('init','speed_clean_header_hook');



/* Remove wp_embed loading
*********************************************************/
function speed_stop_loading_wp_embed() {
if (!is_admin()) {
wp_deregister_script('wp-embed');
}
}
add_action('init', 'speed_stop_loading_wp_embed');



/* Regulate the Wordpress Heartbeat function
*********************************************************/
//stopping heartbeat everywhere except post edit pages
add_action( 'init', 'stop_heartbeat', 1 );
function stop_heartbeat() { 
	global $pagenow;

	if ( $pagenow != 'post.php' && $pagenow != 'post-new.php' )
		wp_deregister_script('heartbeat');
}
// limit the heartbeat call rate on pages where active
function heartbeat_frequency( $settings ) {
		$heartbeat_frequency = 60; //60 seconds max
		$settings['interval'] = $heartbeat_frequency;
		return $settings;
	}
add_filter( 'heartbeat_settings', 'heartbeat_frequency' );



/* Add new equiv header for the supplier form
*********************************************************/
add_action( 'genesis_meta', 'supplier_meta_tag' );
function supplier_meta_tag() {
	echo '<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">';
}



/* Domain blocker on gravity forms
*********************************************************/
class GW_Email_Domain_Validator {

    private $_args;

    function __construct($args) {

        $this->_args = wp_parse_args( $args, array(
            'form_id' => false,
            'field_id' => false,
            'domains' => false,
            'validation_message' => __( 'Sorry, <strong>%s</strong> email accounts are not eligible for this form.' ),
            'mode' => 'ban' // also accepts "limit"
        ) );

        // convert field ID to an array for consistency, it can be passed as an array or a single ID
        if($this->_args['field_id'] && !is_array($this->_args['field_id']))
            $this->_args['field_id'] = array($this->_args['field_id']);

        $form_filter = $this->_args['form_id'] ? "_{$this->_args['form_id']}" : '';

        add_filter("gform_validation{$form_filter}", array($this, 'validate'));

    }

    function validate($validation_result) {

        $form = $validation_result['form'];

        foreach($form['fields'] as &$field) {

            // if this is not an email field, skip
            if(RGFormsModel::get_input_type($field) != 'email')
                continue;

            // if field ID was passed and current field is not in that array, skip
            if($this->_args['field_id'] && !in_array($field['id'], $this->_args['field_id']))
                continue;

            $page_number = GFFormDisplay::get_source_page( $form['id'] );
            if( $page_number > 0 && $field->pageNumber != $page_number ) {
                continue;
            }

            if( GFFormsModel::is_field_hidden( $form, $field, array() ) ) {
            	continue;
            }

            $domain = $this->get_email_domain($field);

            // if domain is valid OR if the email field is empty, skip
            if($this->is_domain_valid($domain) || empty($domain))
                continue;

            $validation_result['is_valid'] = false;
            $field['failed_validation'] = true;
            $field['validation_message'] = sprintf($this->_args['validation_message'], $domain);

        }

        $validation_result['form'] = $form;
        return $validation_result;
    }

    function get_email_domain( $field ) {
        $email = explode( '@', rgpost( "input_{$field['id']}" ) );
        return trim( rgar( $email, 1 ) );
    }

    function is_domain_valid( $domain ) {

        $mode   = $this->_args['mode'];
	    $domain = strtolower( $domain );

        foreach( $this->_args['domains'] as $_domain ) {

	        $_domain = strtolower( $_domain );

            $full_match   = $domain == $_domain;
            $suffix_match = strpos( $_domain, '.' ) === 0 && $this->str_ends_with( $domain, $_domain );
            $has_match    = $full_match || $suffix_match;

            if( $mode == 'ban' && $has_match ) {
                return false;
            } else if( $mode == 'limit' && $has_match ) {
                return true;
            }

        }

        return $mode == 'limit' ? false : true;
    }

    function str_ends_with( $string, $text ) {

        $length      = strlen( $string );
        $text_length = strlen( $text );

        if( $text_length > $length ) {
            return false;
        }

        return substr_compare( $string, $text, $length - $text_length, $text_length ) === 0;
    }

}

class GWEmailDomainControl extends GW_Email_Domain_Validator { }

# Configuration
new GW_Email_Domain_Validator( array(
    'domains' => array( 'test.com', 'mail.ru' ),
    'validation_message' => __( '<strong>%s</strong> email accounts are not allowed.' )
) );





/* Blog CTA shortcodes
*************************************************/
function create_cta( $atts ) {
    $a = shortcode_atts( array(
		'id' => 'cta1',
		'popupid' => '1',
        'color' => '#93c740',
        'title' => 'PDF Download',
        'description' => 'Download our free guide to AP Automation and see how AvidXchange can save you time and money!',
        'button' => 'Download Now',
		'calculator' => 'no',
		'poptitle' => 'Download Our PDF',
		'popimage' => '/wp-content/uploads/2017/08/iStock-518283970.jpg',
		'popdescription' => 'Sign up now to download out free guide to AP Automation and see how AvidXchange can save you time and money!',
		'popbutton' => 'Download',
		'popthankyou' => '/demo/',
		'image' => '/wp-content/uploads/2017/08/PDF-Mac.png',
		'campaigntag' => 'MA_Inbound_Guide_End of Year Survival_Q3_2017'
    ), $atts );
	ob_start();
	?> 
		<style>
			.blogCTApopup .close { 
				background-color: #ffffff !important; 
				color:#cecece;
		    	margin-top: -13px;
    			margin-right: -10px;
				font-size: 40px;
 			}
			.blogCTApopup img.cstm, .blogCTApopup p.bct {
				display:inline-block; padding:10px; width:50%; vertical-align:top;
			}
			.blogCTApopup .gform_wrapper .gform_footer {
    			padding: 0px 0 10px;
			}
			#gform_submit_button_19 {
				display:none;
			}
			#gform_dummy_button {
				background-color: <?php echo $a['color']; ?>;
				text-align: center;
				width: calc(100% - 28px);
				max-width: none;
				height: 40px;
				color: #fff;
				border: none;
				padding: 0px;
				font-size: 18px !important;
				font-weight: 500;
				border-radius: 2px;
				margin-left: 12px;
				margin-top: -20px;
				margin-bottom: 0px;
				opacity: 0.9;
    			filter: alpha(opacity=90);
			}
			#gform_dummy_button:hover {
				opacity: 1;
    			filter: alpha(opacity=100);
			}
			#gform_ajax_spinner_19 img {
				width:16px;
				height: auto;
			}
			#gform_confirmation_wrapper_19 { padding-bottom:20px; }
			#field_19_1 label { display:none; }
			@media (max-width:640px){
				#gform_dummy_button {
					width: calc(100% - 10px);
					margin-left: 10px;
				}
				.blogCTApopup #content li {
					padding-left: 5px;
				}
			}
			@media (max-width:540px){
				.blogCTApopup img, .blogCTApopup p.bct {
					display:block; padding:10px; width:100%;
				}
			}
}
		</style>
  		<!-- Modal -->
		<div id="blogCTApopup<?php echo $a['popupid'] ?>" class="modal fade blogCTApopup" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="text-align:center; color:<?php echo $a['color']; ?>;"><?php echo $a['poptitle']; ?></h4>
				<img class="cstm" src="<?php echo $a['popimage']; ?>" /><p class="bct"><?php echo $a['popdescription']; ?></p>
			  </div>
			  <div class="modal-footer" style="background-color:#e5e5e5;text-align:left;">
			  <?php echo do_shortcode('[gravityform id=19 field_values="campaigntag='. $a['campaigntag'] .'" title=false description=false ajax=true tabindex=49]'); ?>
			  <div style="margin-top:-20px;"><input type="submit" id="gform_dummy_button" class="gform_button button" value="<?php echo $a['popbutton']; ?>" tabindex="50" /></div>
			  </div>
			</div>

		  </div>
		</div>
  		
   		<div id="<?php echo $a['id']; ?>" class="fullwidthcta">
			<div class="ctacenter">
				<div class="blogctacontent">
					<div style="color:<?php echo $a['color']; ?>;" class="blogctah3"><?php echo $a['title']; ?></div>
					<p style="margin-bottom:40px;"><?php echo $a['description']; ?></p>
					<?php if($a['calculator'] == 'yes'){
						echo do_shortcode('[roi_calculator]');
					} else {
						?><a style="background-color:<?php echo $a['color']; ?>; cursor:pointer;" class="blogctalink" data-toggle="modal" data-target="#blogCTApopup<?php echo $a['popupid'] ?>"><?php echo $a['button']; ?></a><?php
					} ?>
				</div>
				<div class="blogctaimg">
					<img src="<?php echo $a['image']; ?>" />
				</div>
			</div>
   		</div>
   		<script>
			jQuery(document).ready( function($) {
				$("#gform_dummy_button").click(function(){
					$("#gform_submit_button_19").click(); 
					return false;
				});
				
				$(document).bind('gform_confirmation_loaded', function(event, formId){
					if(formId == 19) {
						$('#gform_dummy_button').hide();
						window.location.href ="<?php echo $a['popthankyou']; ?>";
					}
				});
			});
		</script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'blogcta', 'create_cta' );


/* Blog CTA shortcodes
*************************************************/
function create_cta2( $atts ) {
    $a = shortcode_atts( array(
		'id' => 'cta1',
		'popupid' => '2',
        'color' => '#93c740',
        'title' => 'PDF Download',
        'description' => 'Download our free guide to AP Automation and see how AvidXchange can save you time and money!',
        'button' => 'Download Now',
		'calculator' => 'no',
		'poptitle' => 'Download Our PDF',
		'popimage' => '/wp-content/uploads/2017/08/iStock-518283970.jpg',
		'popdescription' => 'Sign up now to download out free guide to AP Automation and see how AvidXchange can save you time and money!',
		'popbutton' => 'Download',
		'popthankyou' => '/demo/',
		'image' => '/wp-content/uploads/2017/08/PDF-Mac.png',
		'campaigntag' => 'MA_Inbound_Guide_End of Year Survival_Q3_2017'
    ), $atts );
	ob_start();
	?> 
		<style>
			.blogCTApopup .close { 
				background-color: #ffffff !important; 
				color:#cecece;
		    	margin-top: -13px;
    			margin-right: -10px;
				font-size: 40px;
 			}
			.blogCTApopup img.cstm, .blogCTApopup p.bct {
				display:inline-block; padding:10px; width:50%; vertical-align:top;
			}
			.blogCTApopup .gform_wrapper .gform_footer {
    			padding: 0px 0 10px;
			}
			#gform_submit_button_20 {
				display:none;
			}
			#gform_dummy_button2 {
				background-color: <?php echo $a['color']; ?>;
				text-align: center;
				width: calc(100% - 28px);
				max-width: none;
				height: 40px;
				color: #fff;
				border: none;
				padding: 0px;
				font-size: 18px !important;
				font-weight: 500;
				border-radius: 2px;
				margin-left: 12px;
				margin-top: -20px;
				margin-bottom: 0px;
				opacity: 0.9;
    			filter: alpha(opacity=90);
			}
			#gform_dummy_button2:hover {
				opacity: 1;
    			filter: alpha(opacity=100);
			}
			#gform_ajax_spinner_20 img {
				width:16px;
				height: auto;
			}
			#gform_confirmation_wrapper_20 { padding-bottom:20px; }
			#field_20_1 label { display:none; }
			@media (max-width:640px){
				#gform_dummy_button2 {
					width: calc(100% - 10px);
					margin-left: 10px;
				}
				.blogCTApopup #content li {
					padding-left: 5px;
				}
			}
			@media (max-width:540px){
				.blogCTApopup img, .blogCTApopup p.bct {
					display:block; padding:10px; width:100%;
				}
			}
}
		</style>
  		<!-- Modal -->
		<div id="blogCTApopup<?php echo $a['popupid'] ?>" class="modal fade blogCTApopup" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="text-align:center; color:<?php echo $a['color']; ?>;"><?php echo $a['poptitle']; ?></h4>
				<img class="cstm" src="<?php echo $a['popimage']; ?>" /><p class="bct"><?php echo $a['popdescription']; ?></p>
			  </div>
			  <div class="modal-footer" style="background-color:#e5e5e5;text-align:left;">
			  <?php echo do_shortcode('[gravityform id=20 field_values="campaigntag='. $a['campaigntag'] .'" title=false description=false ajax=true tabindex=49]'); ?>
			  <div style="margin-top:-20px;"><input type="submit" id="gform_dummy_button2" class="gform_button button" value="<?php echo $a['popbutton']; ?>" tabindex="50" /></div>
			  </div>
			</div>

		  </div>
		</div>
  		
   		<div id="<?php echo $a['id']; ?>" class="fullwidthcta">
			<div class="ctacenter">
				<div class="blogctacontent">
					<div style="color:<?php echo $a['color']; ?>;" class="blogctah3"><?php echo $a['title']; ?></div>
					<p style="margin-bottom:40px;"><?php echo $a['description']; ?></p>
					<?php if($a['calculator'] == 'yes'){
						echo do_shortcode('[roi_calculator]');
					} else {
						?><a style="background-color:<?php echo $a['color']; ?>; cursor:pointer;" class="blogctalink" data-toggle="modal" data-target="#blogCTApopup<?php echo $a['popupid'] ?>"><?php echo $a['button']; ?></a><?php
					} ?>
				</div>
				<div class="blogctaimg">
					<img src="<?php echo $a['image']; ?>" />
				</div>
			</div>
   		</div>
   		<script>
			jQuery(document).ready( function($) {
				$("#gform_dummy_button2").click(function(){
					$("#gform_submit_button_20").click(); 
					return false;
				});
				
				$(document).bind('gform_confirmation_loaded', function(event, formId){
					if(formId == 20) {
						$('#gform_dummy_button2').hide();
						window.location.href ="<?php echo $a['popthankyou']; ?>";
					}
				});
			});
		</script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'blogcta2', 'create_cta2' );



/* Blog CTA shortcodes
*************************************************/
function create_cta3( $atts ) {
    $a = shortcode_atts( array(
		'id' => 'cta1',
		'popupid' => '3',
        'color' => '#93c740',
        'title' => 'PDF Download',
        'description' => 'Download our free guide to AP Automation and see how AvidXchange can save you time and money!',
        'button' => 'Download Now',
		'calculator' => 'no',
		'poptitle' => 'Download Our PDF',
		'popimage' => '/wp-content/uploads/2017/08/iStock-518283970.jpg',
		'popdescription' => 'Sign up now to download out free guide to AP Automation and see how AvidXchange can save you time and money!',
		'popbutton' => 'Download',
		'popthankyou' => '/demo/',
		'image' => '/wp-content/uploads/2017/08/PDF-Mac.png',
		'campaigntag' => 'MA_Inbound_Guide_End of Year Survival_Q3_2017'
    ), $atts );
	ob_start();
	?> 
		<style>
			.blogCTApopup .close { 
				background-color: #ffffff !important; 
				color:#cecece;
		    	margin-top: -13px;
    			margin-right: -10px;
				font-size: 40px;
 			}
			.blogCTApopup img.cstm, .blogCTApopup p.bct {
				display:inline-block; padding:10px; width:50%; vertical-align:top;
			}
			.blogCTApopup .gform_wrapper .gform_footer {
    			padding: 0px 0 10px;
			}
			#gform_submit_button_21 {
				display:none;
			}
			#gform_dummy_button3 {
				background-color: <?php echo $a['color']; ?>;
				text-align: center;
				width: calc(100% - 28px);
				max-width: none;
				height: 40px;
				color: #fff;
				border: none;
				padding: 0px;
				font-size: 18px !important;
				font-weight: 500;
				border-radius: 2px;
				margin-left: 12px;
				margin-top: -20px;
				margin-bottom: 0px;
				opacity: 0.9;
    			filter: alpha(opacity=90);
			}
			#gform_dummy_button3:hover {
				opacity: 1;
    			filter: alpha(opacity=100);
			}
			#gform_ajax_spinner_21 img {
				width:16px;
				height: auto;
			}
			#gform_confirmation_wrapper_21 { padding-bottom:20px; }
			#field_21_1 label { display:none; }
			@media (max-width:640px){
				#gform_dummy_button3 {
					width: calc(100% - 10px);
					margin-left: 10px;
				}
				.blogCTApopup #content li {
					padding-left: 5px;
				}
			}
			@media (max-width:540px){
				.blogCTApopup img, .blogCTApopup p.bct {
					display:block; padding:10px; width:100%;
				}
			}
}
		</style>
  		<!-- Modal -->
		<div id="blogCTApopup<?php echo $a['popupid'] ?>" class="modal fade blogCTApopup" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="text-align:center; color:<?php echo $a['color']; ?>;"><?php echo $a['poptitle']; ?></h4>
				<img class="cstm" src="<?php echo $a['popimage']; ?>" /><p class="bct"><?php echo $a['popdescription']; ?></p>
			  </div>
			  <div class="modal-footer" style="background-color:#e5e5e5;text-align:left;">
			  <?php echo do_shortcode('[gravityform id=21 field_values="campaigntag='. $a['campaigntag'] .'" title=false description=false ajax=true tabindex=49]'); ?>
			  <div style="margin-top:-20px;"><input type="submit" id="gform_dummy_button3" class="gform_button button" value="<?php echo $a['popbutton']; ?>" tabindex="50" /></div>
			  </div>
			</div>

		  </div>
		</div>
  		
   		<div id="<?php echo $a['id']; ?>" class="fullwidthcta">
			<div class="ctacenter">
				<div class="blogctacontent">
					<div style="color:<?php echo $a['color']; ?>;" class="blogctah3"><?php echo $a['title']; ?></div>
					<p style="margin-bottom:40px;"><?php echo $a['description']; ?></p>
					<?php if($a['calculator'] == 'yes'){
						echo do_shortcode('[roi_calculator]');
					} else {
						?><a style="background-color:<?php echo $a['color']; ?>; cursor:pointer;" class="blogctalink" data-toggle="modal" data-target="#blogCTApopup<?php echo $a['popupid'] ?>"><?php echo $a['button']; ?></a><?php
					} ?>
				</div>
				<div class="blogctaimg">
					<img src="<?php echo $a['image']; ?>" />
				</div>
			</div>
   		</div>
   		<script>
			jQuery(document).ready( function($) {
				$("#gform_dummy_button3").click(function(){
					$("#gform_submit_button_21").click(); 
					return false;
				});
				
				$(document).bind('gform_confirmation_loaded', function(event, formId){
					if(formId == 21) {
						$('#gform_dummy_button3').hide();
						window.location.href ="<?php echo $a['popthankyou']; ?>";
					}
				});
			});
		</script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'blogcta3', 'create_cta3' );

add_post_type_support( 'press', 'media' , 'excerpt' );

/*----------------------------------------------------
	Add Landing Page Styles and Scripts
-----------------------------------------------------*/
function theme_styles() {
		if(is_page_template('template-landing-page.php') || is_page_template('template-demo-thank-you.php')) {
			wp_enqueue_style('theme-styles', get_stylesheet_directory_uri() . '/css/beacon-styles.css', array(), filemtime(get_stylesheet_directory().'/css/beacon-styles.css') );
			wp_enqueue_style('theme-style-overrides', get_stylesheet_directory_uri() . '/css/qa-custom-overrides.css', array(), filemtime(get_stylesheet_directory().'/css/qa-custom-overrides.css') );
		}elseif(is_page_template('template-homepage.php') || is_page_template('template-solutions.php') || is_page_template('template-about.php') || is_page_template('template-integrations.php')) {
			wp_enqueue_style('theme-styles', get_stylesheet_directory_uri() . '/css/theme-styles.css', array(), filemtime(get_stylesheet_directory().'/css/theme-styles.css') );
			wp_enqueue_style('theme-style-overrides', get_stylesheet_directory_uri() . '/css/qa-custom-overrides.css', array(), filemtime(get_stylesheet_directory().'/css/qa-custom-overrides.css') );
		} elseif (
			is_page_template( 'template-industries.php' ) ||
			is_page_template( 'template-industry-detail.php' )
		) {
			wp_enqueue_style('theme-styles', get_stylesheet_directory_uri() . '/css/theme-styles.min.css', array(), filemtime(get_stylesheet_directory().'/css/theme-styles.min.css') );

			wp_enqueue_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', [], null );
			wp_enqueue_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', ['slick'], null );

			wp_enqueue_style('components', get_stylesheet_directory_uri() . '/css/components.min.css', ['slick-theme'], filemtime(get_stylesheet_directory().'/css/components.min.css') );
			wp_enqueue_style('theme-styles2', get_stylesheet_directory_uri() . '/css/theme-styles.css', array(), filemtime(get_stylesheet_directory().'/css/theme-styles.css') );
			wp_enqueue_style('theme-style-overrides', get_stylesheet_directory_uri() . '/css/qa-custom-overrides.css', array(), filemtime(get_stylesheet_directory().'/css/qa-custom-overrides.css') );
		}
}
add_action('wp_enqueue_scripts', 'theme_styles');

function theme_scripts() {
		wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/b5fda3e6ab.js', array());

		if(is_page_template('template-landing-page.php')) {
			wp_enqueue_script('bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), filemtime(get_stylesheet_directory().'/js/jquery.bxslider.min.js'));
			wp_enqueue_script('fitvids', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), filemtime(get_stylesheet_directory().'/js/jquery.fitvids.js'));
			wp_enqueue_script('landing-page-script', get_stylesheet_directory_uri() . '/js/beacon-landing-page.js', array('jquery','bxslider'), filemtime(get_stylesheet_directory().'/js/beacon-landing-page.js'),TRUE);
		}elseif(is_page_template('template-homepage.php')) {
			wp_enqueue_script('bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), filemtime(get_stylesheet_directory().'/js/jquery.bxslider.min.js'));
			wp_enqueue_script('home-functions', get_stylesheet_directory_uri() . '/js/home-functions.js', array('jquery', 'bxslider'), filemtime(get_stylesheet_directory().'/js/home-functions.js'),TRUE);
		}elseif(is_page_template('template-solutions.php')) {
			wp_enqueue_script('bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), filemtime(get_stylesheet_directory().'/js/jquery.bxslider.min.js'));
			wp_enqueue_script('solutions-functions', get_stylesheet_directory_uri() . '/js/solutions-functions.js', array('jquery', 'bxslider'), filemtime(get_stylesheet_directory().'/js/solutions-functions.js'),TRUE);
		}elseif(is_page_template('template-industry-detail.php')) {
			wp_enqueue_script('bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), filemtime(get_stylesheet_directory().'/js/jquery.bxslider.min.js'));
			wp_enqueue_script('fitvids', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), filemtime(get_stylesheet_directory().'/js/jquery.fitvids.js'));
			wp_enqueue_script('industry-detail', get_stylesheet_directory_uri() . '/js/industry-details.js', array('jquery','bxslider'), filemtime(get_stylesheet_directory().'/js/industry-details.js'),TRUE);
			wp_enqueue_script('solutions-functions', get_stylesheet_directory_uri() . '/js/solutions-functions.js', array('jquery', 'bxslider'), filemtime(get_stylesheet_directory().'/js/solutions-functions.js'),TRUE);
		}elseif(is_page_template('template-integrations.php')) {
			wp_enqueue_script('bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), filemtime(get_stylesheet_directory().'/js/jquery.bxslider.min.js'));
			wp_enqueue_script('integrations-functions', get_stylesheet_directory_uri() . '/js/integrations-functions.js', array('jquery', 'bxslider'), filemtime(get_stylesheet_directory().'/js/integrations-functions.js'),TRUE);
		} else {
			wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', ['jquery'], null, TRUE);
			wp_enqueue_script('functions', get_stylesheet_directory_uri() . '/js/functions.js', ['slick'], filemtime(get_stylesheet_directory().'/js/functions.js'), TRUE);

			wp_localize_script( 'functions', 'themeObj', [
				'homeUrl' => home_url(),
				'themeUrl' => get_stylesheet_directory_uri(),
			] );
		}
		wp_enqueue_script('global-functions', get_stylesheet_directory_uri() . '/js/global-functions.js', array('jquery'), filemtime(get_stylesheet_directory().'/js/global-functions.js'),TRUE);
}
add_action('wp_enqueue_scripts', 'theme_scripts');

function avid_custom_head_tags() {
	?>
	<base href="<?=esc_url( home_url() )?>">
	<?php
}
add_action('wp_head', 'avid_custom_head_tags');

function avid_parse_custom_url($url) {
	if ( false === stripos( $url, 'http' ) && false === stripos( $url, 'www' ) ) {
		global $wp;

		$current_url = home_url( $wp->request );

		if ( false !== stripos( $current_url, '#' ) ) {
			$explode     = explode( '#', $current_url );
			$current_url = $current_url[0];
		}

		$url = trailingslashit( $current_url ) . $url;
	}

	return $url;
}

add_filter( 'gform_tabindex', '__return_false' ); 
/* Setup the Scroll to Top Button
*********************************************************
add_action( 'genesis_before_footer', 'add_scroll_button' );
function add_scroll_button() {
	?> <a href="#" class="back-to-top hidden-sm hidden-xs"><i class="fa fa-chevron-up"></i></a> <?php
} */