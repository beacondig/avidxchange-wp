<?php
/**
 * Template Name: Page - Events
 * Description: Used as a page template to show page Events
 */
 ?>

<?php get_header(); ?>
</div>
<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<?php if( get_field('banner_description') ): ?>
	<p><?php the_field('banner_description'); ?></p>
<?php endif; ?>
</div></div></div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
<div class="container">

<div class="row">
	<div class="col-sm-12 center">
		<h2>Upcoming Events</h2>
	</div>
</div>
<div class="row event-wrapper" style="font-size:16px; font-weight:300;">
	  <?php 
      $lct = 0;
      $showsign = 0;
      $eventCount = 0;
	
      // check if the repeater field has rows of data
	  $hasEV = get_field('event');
      if( $hasEV ) :
          // loop through the rows of data
		  $repeater = get_field('event');
		  $column_id = array();
		  foreach( $repeater as $key => $row ) {
			  $thedate = $row['start_date']; 
			  $column_id[ $key ] = strtotime($thedate);
		  }
		  //array_multisort( $column_id, SORT_ASC, $repeater );
		  // ^ uncommenting the above line sorts the results by Start Date
		  foreach( $repeater as $row ) {
        $eventCount++;
        $eventCategory = get_field_object($row["category"]);

                  echo '<div class="col-md-4 col-sm-6 event medcrunch eventhemup" style="padding-bottom:40px;" data-event-cat="'.$eventCategory["name"].'" data-event-date="'. strtotime($row["start_date"]).'" data-event-id="'.$eventCount.'">';

					  $evimg = $row['image'];
					  $size = 'medium';
					  $eimg = wp_get_attachment_image_src($evimg, $size);
                      // display a sub field value
                      ?><img src="<?php echo $eimg[0]; ?>" />
                      <div class="fancyline"><span>&mdash;&mdash;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['category']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&mdash;&mdash;</span></div>
                      <h6 style="font-size:18px;"><?php echo $row['title']; ?></h6>
                      <div style="padding:0px 0px 8px; font-size:18px;">
                          <div><?php echo $row['location']; ?></div>
                          <div>
                          	<?php if( $row['end_date'] ): ?>
                            
                            	<?php $std = $row['start_date'];
									  $end = $row['end_date'];
									  
									  $mchk1 = substr($std, 0, 3);
									  $mchk2 = substr($end, 0, 3);
									  if($mchk1 == $mchk2) {
										  //if same month > format this way
										  $arr = $arr = explode(",", $std, 2);
										  $std = $arr[0]; 
										  $end = substr($end, -8);?>
									  <?php }
									  //otherwise format this way
									  echo $std; ?> - <?php echo $end; ?>
                                
                            <?php else: ?> 
                            	<?php echo $row['start_date']; ?>
                            <?php endif; ?>
						  		
                          
                          </div>
                      </div>
                      <div style="font-size:18px;"><?php echo $row['description']; ?></div>
                      <div class="tenspacer"></div>
                      <div><a class="secondarybutton mediumbutton" href="<?php echo $row['event_link']; ?>" target="_blank">Learn More</a></div>
                  </div> 
              <?php 
      	  }
      else :
          // no rows found
      ?>
		  <div class="container">
			<div class="row center">
				<div>
					<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
						<h4 style="margin:20px;">We don't have any upcoming events scheduled! Sign up for our email list to be notified about upcoming events and other news</h4>
						<div style="margin-top:-10px;"><?php echo do_shortcode('[gravityform id=6 title=false description=false ajax=true tabindex=40]'); ?></div>
					</div>
				</div>
			</div>
		</div>
      <?php
      endif;
      ?>
</div>

<div class="container-fluid noresultsdiv hnores" style="margin:0px 0px 40px;">
    <div class="container" style="width:100%;">
        <div class="clearfix"></div>
            <div class="col-md-12 center">
                <div class="row">
                    <p>No matching events found</p>
                </div>
            </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="event-pagination-bar"></div>

</div>

</div>



</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<div class="container-fluid bannergreenbg event-newsletter" style="margin:0px 0px 40px;">
    <div class="container" style="width:100%;">
        <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="xbgg">
                    <div class="row">
                        <div class="nladjust">
                            <h3>Signup to receive updates about AvidXchange events</h3>
                            <div><?php echo do_shortcode('[gravityform id=4 title=false description=false ajax=true tabindex=49]'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
    	<div class="clearfix"></div>
    </div>
</div>


<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/event_script.js';?>"></script>

<style>
body {
    overflow-x: hidden;
}
</style>


<?php get_footer(); ?>