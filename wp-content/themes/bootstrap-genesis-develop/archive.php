<?php get_header(); ?>
</div>

<div class="headerbluebg">
<div class="xbglg">
<div class="container mobilesquish">
	<div class="row">
        <h1><?php single_cat_title(); ?></h1>
        <?php
		if(is_category()) {
			$category = get_query_var('cat');
			$current_cat = get_category($cat);
			$mcat = $current_cat->cat_ID;
			$gcat = category_has_parent($mcat);
		}
		?>
    </div>
</div></div></div>
<div class="submenuholder">
    <div class="container-fluid graybg scrollhider">
        <div class="container mobilescroll event-cat-menu">
        	<?php if(($gcat == 46) || ($gcat == 39)) { ?>
            <a href="?sort=recent" <?php if(($_GET['sort'] == 'recent') || (!isset($_GET['sort']))){ echo 'class="alphachosen"'; } ?>>Most Recent</a> 
            <a href="?sort=popular" <?php if($_GET['sort'] == 'popular'){ echo 'class="alphachosen"'; } ?>>Popular</a> 
            <?php } else { echo '<a>&nbsp;</a>'; } ?>
            <?php $categories=get_categories(
				array( 'parent' => $gcat )
			);
			$afnd = 0;
			if($_GET['sort'] == 'popular') { $curst = 'popular'; }
			else { $curst = 'recent'; }
			if($gcat == 46) {
				if(count($categories) > 4){
					foreach (array_slice($categories, 0, 3) as $c) {
						if($c->cat_ID == $mcat) { $oncp = 'alphachosen'; $afnd = 1; } else { $oncp = ''; }
						echo '<a href="/category/blog/'.$c->slug.'?sort='.$curst.'" class="'. $oncp.'">'.$c->name.'</a>';
					} 
				} else {
					foreach ($categories as $c) {
						if($c->cat_ID == $mcat) { $oncp = 'alphachosen'; $afnd = 1; } else { $oncp = ''; }
						echo '<a href="/category/blog/'.$c->slug.'?sort='.$curst.'" class="'. $oncp.'">'.$c->name.'</a>';
					}	
				}
			} else if($gcat == 39) {
				if(count($categories) > 4){
					foreach (array_slice($categories, 0, 3) as $c) {
						if($c->cat_ID == $mcat) { $oncp = 'alphachosen'; $afnd = 1; } else { $oncp = ''; }
						echo '<a href="/category/news/'.$c->slug.'?sort='.$curst.'" class="'. $oncp.'">'.$c->name.'</a>';
					} 
				} else {
					foreach ($categories as $c) {
						if($c->cat_ID == $mcat) { $oncp = 'alphachosen'; $afnd = 1; } else { $oncp = ''; }
						echo '<a href="/category/news/'.$c->slug.'?sort='.$curst.'" class="'. $oncp.'">'.$c->name.'</a>';
					}	
				} 
			} 
			?>
            <?php if(($gcat == 46) || ($gcat == 39)) { ?>
                <!--- fill in select dropdown --->
                <?php if(count($categories) > 4){
                    $lp = 1;
                    if($afnd == 0){
                        echo '<select class="morecats alphachosen" id="morecats">';
                    } else {
                        echo '<select class="morecats" id="morecats">';
                    }
                    echo '<option class="nopick" value="">More...</option>';
                    foreach ($categories as $c) {
                        if($lp > 3){
                            if($c->cat_ID == $mcat) { $oncp = 'selected'; } else { $oncp = ''; }
                            if($gcat == 46) {
                                echo '<option class="nopick" value="/category/blog/'.$c->slug.'?sort='.$curst.'" '.$oncp.'>'.$c->name.'</option>';
                            } else if($gcat == 39) {
                                echo '<option class="nopick" value="/category/news/'.$c->slug.'?sort='.$curst.'" '.$oncp.'>'.$c->name.'</option>';
                            }
                        }
                        $lp++;
                    } 	
                    echo '</select>';
                }
			}?>
             <?php
			$term = null;
			$btn = __('Search');
			if ( is_category() ) { $term = get_queried_object(); }
			?>
            <form id="event-search" method="get" action="<?php echo home_url(); ?>"><input class="subsearchbox" type="text" placeholder="Search..." name="s" id="s" /><button class="subsearch2" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			<?php
			if ($term) {
			  $btn = sprintf( __('Search in %s'), $term->name);
			?>
			<input type="hidden" value="<?php echo $term->term_id; ?>" name="cat" />
			<input type="hidden" value="<?php echo $term->name; ?>" name="catname" />
			<?php } ?></form>
            </div>
    </div>
</div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">


<div class="site-inner container">
    <div class="row event-wrapper">
	    <!--- get category slug --->
        <?php
		if(is_category()) {
			$category = get_query_var('cat');
			$current_cat = get_category($cat);
			$ccat = $current_cat->cat_ID;
		}
		?>
        <!-----   blog loop ---->
        <?php 
		if($_GET['sort'] == 'popular') {
			$sorter = 'meta_value';
			$loop = new WP_Query( array( 
			'post_type' => array('post','news','partners','integrations','resources'), 
			'orderby' => $sorter,  
			'meta_key'    => 'post_views_count',
			'cat' => $ccat, 
			'paged' => $paged ) );
		} else if($_GET['sort'] == 'recent') {
			$sorter = 'date';
			$loop = new WP_Query( array( 
			'post_type' => array('post','news','partners','integrations','resources'), 
			'orderby' => $sorter,  
			'cat' => $ccat, 
			'paged' => $paged ) );
		} else { 
			$sorter = 'date'; 
			$loop = new WP_Query( array( 
			'post_type' => array('post','news','partners','integrations','resources'), 
			'orderby' => $sorter,  
			'cat' => $ccat, 
			'paged' => $paged ) );
		}
         ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); //if (get_post_meta(get_the_ID(), '_is_ns_featured_post', true) != 'yes') { ?>
        <?php if($gcat == 39 || $mcat == 39) { //news ?>
        	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 event">
                <div>
                <a class="loopnews" href="<?php the_permalink(); ?>">
                    <?php /*?><div>
                        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('large');} ?>	
                    </div><?php */?>
                    <h3><?php echo the_title(); ?></h3>
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
        	<div class="col-md-3 col-sm-4">
            	<a class="loopnews" href="<?php the_permalink(); ?>">
                    <div>
                        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('three-column');} ?>	
                    </div>
                </a>
                <div class="twentyspacer"></div>
            </div>
        	<div class="col-md-8 col-sm-8">
                <div>
                <a class="loopnews" href="<?php the_permalink(); ?>">
                    <h3><?php echo the_title(); ?></h3>
                </a>
                <div class="webbio3">
                    <div class="linkdin" style="font-size:14px;"><?php the_date(); ?></div>
                </div>
                <div><?php the_excerpt(); ?><a href="<?php the_permalink(); ?>" class="morelink">Read More...</a></div>
                </div>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
        <?php } ?>
        <?php //} ?> <?php endwhile; genesis_posts_nav(); wp_reset_postdata(); wp_reset_query(); ?>
        <div class="clearfix"></div>
        <div class="twentyspacer"></div>
    </div>
</div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php /*?><script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/resources_script.js';?>"></script><?php */?>

<?php get_footer(); ?>