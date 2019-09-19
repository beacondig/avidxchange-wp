<?php
/**
 * Template Name: Page - Blog
 * Description: Used as a page template to show page Blog
 */
 ?>

<?php get_header(); ?>
</div>

<div class="headerbluebg">
<div class="xbglg">
<div class="container mobilesquish">
  <div class="row">
    <?php $query = new WP_Query( array( 'cat' => '46,1', 'meta_key' => '_is_ns_featured_post', 'meta_value' => 'yes', 'posts_per_page' => 1 ) ); ?>
    <?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
      <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 center">
          <div>
                <h2 class="pageTitleTop">FEATURED ARTICLE</h2>
                <h1 class="bbh1"><a href="<?php the_permalink(); ?>" style="color:#ffffff!important;"><?php the_title(); ?></a></h1>
                <div class="tenspacer"></div>
          </div>
      </div>
    <?php endwhile; wp_reset_query();   else : ?>
        <h1>The Xchange</h1>
        <?php endif; wp_reset_query(); wp_reset_postdata();?>
    </div>
</div></div></div>
<div class="submenuholder">
    <div class="container-fluid graybg scrollhider">
        <div class="container mobilescroll event-cat-menu">
            <a href="?sort=recent" <?php if(($_GET['sort'] == 'recent') || (!isset($_GET['sort']))){ echo 'class="alphachosen"'; } ?>>Most Recent</a> 
            <a href="?sort=popular" <?php if($_GET['sort'] == 'popular'){ echo 'class="alphachosen"'; } ?>>Popular</a>  
            <?php $categories=get_categories(
				array( 'parent' => 46 )
			);
			if($_GET['sort'] == 'popular') { $curst = 'popular'; }
			else { $curst = 'recent'; }
			if(count($categories) > 4){
				foreach (array_slice($categories, 0, 3) as $c) {
					echo '<a href="/category/blog/'.$c->slug.'?sort='.$curst.'">'.$c->name.'</a>';
				} 
			} else {
				foreach ($categories as $c) {
					echo '<a href="/category/blog/'.$c->slug.'?sort='.$curst.'">'.$c->name.'</a>';
				}
			}
			?>
            <!--- fill in select dropdown --->
            <?php if(count($categories) > 4){
				$lp = 1;
				echo '<select class="morecats" id="morecats">';
				echo '<option value="">More...</option>';
				foreach ($categories as $c) {
					if($lp > 3){
						echo '<option value="/category/blog/'.$c->slug.'?sort='.$curst.'">'.$c->name.'</option>';
					}
					$lp++;
				} 	
				echo '</select>';
			}?>
            <?php
			$term = null;
			$btn = __('Search');
			if ( is_category() ) { $term = get_queried_object(); }
			?>
            <form id="event-search" method="get" action="<?php echo home_url(); ?>">
            <input class="subsearchbox" type="text" placeholder="Search..." name="s" id="s" /><button class="subsearch2" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            <input type="hidden" value="46" name="cat" />
            <input type="hidden" value="true" name="blog" /></form>
            </div>
    </div>
</div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">


<div class="site-inner container">
    <div class="row event-wrapper">
        <!-----   blog loop ---->
        <?php 
		if($_GET['sort'] == 'popular') {
			$sorter = 'meta_value';
			$sorter2 =  '&meta_key=post_views_count';
		} else if($_GET['sort'] == 'recent') {
			$sorter = 'date';
			$sorter2 = '';
		} else { $sorter = 'date'; $sorter2 = '';}
        $temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query(); $wp_query->query('showposts=12&order=DESC&cat=46'.$sorter2 . '&orderby='.$sorter. '&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); //if (get_post_meta(get_the_ID(), '_is_ns_featured_post', true) != 'yes') { ?>
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
        <?php //} ?> <?php endwhile; genesis_posts_nav(); ?>
		<?php wp_reset_postdata(); wp_reset_query(); ?>
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