<?php get_header(); ?>
</div>

<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
	<div class="row">
        <form method="get" id="menu-search-form-banner" class="menu-search-form-banner" style="margin:auto;" action="<?php get_bloginfo('home') ?>/"><p style="margin:0px; white-space:nowrap;"><input class="text_input" type="text" placeholder="Search..." name="s" id="s" /><button type="submit" class="btn btn-searchonbanner" style=""><i class="fa fa-search" ></i></button></p>
       		
            
            <?php if(isset($_GET['cat']) && ! empty($_GET['cat'])) { ?>
            	<input type="hidden" value="<?php echo $_GET['cat'] ?>" name="cat" />
            <?php } ?>
            <?php if(isset($_GET['blog']) && ! empty($_GET['blog'])) { ?>
            	<input type="hidden" value="true" name="blog" />
            <?php } ?>
            <?php if(isset($_GET['catname']) && ! empty($_GET['catname'])) { ?>
				<input type="hidden" value="<?php echo $_GET['catname'] ?>" name="catname" />
			<?php } ?>
            <?php if(isset($_GET['post_type']) && ! empty($_GET['post_type'])) { ?>
				<input type="hidden" value="<?php echo $_GET['post_type'] ?>" name="post_type" />
			<?php } ?>
        </form>
		
        <?php
		if(isset($_GET['cat'])) {
			$mcat = $_GET['cat'];
			$gcat = category_has_parent($mcat);
		} else {
			$mcat = 0;
			$gcat = 0;	
		}
		?>
    </div>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->
<div class="submenuholder">
	<div class="container center">
        <h1 style="color: #1e95d3;">
            <?php
            if(isset($_GET['catname']) && ! empty($_GET['catname'])) {
                $searchtitle = sprintf( __('Search Results for: &quot;%s&quot; in %s'), $_GET['s'], $_GET['catname']);
            } else if(isset($_GET['post_type']) && ! empty($_GET['post_type'])) {
                $searchtitle = sprintf( __('News Search Results for: &quot;%s&quot;'), $_GET['s']);
            } else if(isset($_GET['blog']) && ! empty($_GET['blog'])) {
                $searchtitle = sprintf( __('Blog Search Results for: &quot;%s&quot;'), $_GET['s']);
            } else {
                $searchtitle = sprintf( __('Search Results for: &quot;%s&quot;'), $_GET['s']);
            }
            
            echo '<div class="archive-description"><h1 class="archive-title">'.$searchtitle.'</h1></div>';
            ?>
        </h1>
    </div>
</div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">


<div class="site-inner container">
    <div class="row event-wrapper">
        <!-----   search loop ---->
        <?php
		$qry = array( 
			'paged' => $paged, 
			'post_type' => $_GET['post_type'],
			's' => $_GET['s'],
			'cat' => $_GET['cat'],
			'category_name' => $_GET['catname']
		);
		
        $loop = new WP_Query( $qry ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php if($gcat == 39 || $mcat == 39) { //news ?>
        	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 event">
                <div>
                <a class="loopnews" href="<?php the_permalink(); ?>">
                    <?php /*?><div>
                        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('large');} ?>	
                    </div><?php */?>
                    <p class="srtitle"><?php echo the_title(); ?></p>
                </a>
                <div class="webbiopic3">
                    <div class="authimg"><?php echo get_avatar( get_the_author_meta( 'ID' ) , 96 ); ?></div>
                </div>
                <div class="webbio3">
                    <h6 style="font-size:16px; margin-top:4px; margin-bottom:4px;"><?php echo get_the_author(); ?></h6>
                    <div class="linkdin" style="font-size:14px;"><?php the_date(); ?></div>
                </div>
                <div class="twentyspacer"></div>
                <div><?php the_excerpt(); ?><a href="<?php the_permalink(); ?>" class="morelink">Read More...</a></div>
                </div>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
        <?php } else if($gcat == 46 || $mcat == 46) { //blog ?>
        	<?php $categories = get_the_category(); ?>
            <div class="col-md-4 col-sm-6 integration-item eventhemup">
              <div class="effectItem">
              <a class="loopnews" href="<?php the_permalink(); ?>">
                  <div class="newsloopitem">
                      <div class="grid">
                          <figure class="effect-jazz">
                          	<div style="height:240px; overflow:hidden;" class="newser">
                              <?php if ( has_post_thumbnail() ) {
								  the_post_thumbnail('three-column');
								  } else { ?><img src="/wp-content/uploads/2016/11/blogX.png" />  <?php } ?>
                              <figcaption>
                                  <p><span class="whitehover">Read More</span></p>
                              </figcaption>			
                            </div>
                          </figure>
                      </div>
                      <div class="grayblogbot">
                          <div class="fancyline"><span>&mdash;&mdash;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $categories[0]->name; ?>&nbsp;&nbsp;&nbsp;&nbsp;&mdash;&mdash;</span></div>
                          <?php echo get_the_title(); ?>
                      </div>
                  </div>
               </a>
               </div>
               <div class="thirtyspacer"></div>
            </div>
        <?php } else { //generic ?>
        	<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-1">
                <div>
                <a class="loopnews" href="<?php the_permalink(); ?>">
                    <p class="srtitle"><?php echo the_title(); ?></p>
                </a>
                <div class="webbio3">
                    <div class="linkdin" style="font-size:14px; margin-top: -4px;"><?php the_date(); ?></div>
                </div>
                <div style="margin-top: -8px;"><?php the_excerpt(); ?><a href="<?php the_permalink(); ?>" class="morelink">Read More...</a></div>
                </div>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
        <?php } ?>
        <?php endwhile; wp_reset_query();  ?>
        <?php genesis_posts_nav(); wp_reset_query();?>
        <div class="clearfix"></div>
        <div class="twentyspacer"></div>
    </div>
    <div class="event-pagination-bar"></div>
</div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php /*?><script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/resources_script.js';?>"></script><?php */?>

<?php get_footer(); ?>