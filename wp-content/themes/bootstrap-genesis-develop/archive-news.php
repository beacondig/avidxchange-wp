<?php get_header(); ?>
</div>

<div class="headerbluebg">
<div class="xbglg">
<div class="container mobilesquish">
	<div class="row">
    <?php $query = new WP_Query( array( 'post_type' => 'news', 'meta_key' => '_is_ns_featured_post', 'meta_value' => 'yes', 'posts_per_page' => 1 ) ); ?>
    <?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
    	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        	<div>
                <div class="pageTitleTop">FEATURED NEWS</div>
                <h1 class="bbh1"><a class="headerlink" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <!--<div class="thirtyspacer"></div>-->
            </div>
        </div>
        <?php /*?><div class="col-md-4 col-sm-6">
        	<?php if ( has_post_thumbnail() ) {the_post_thumbnail('medium');} ?>
        </div><?php */?>
        <div class="clearfix"></div>
    <?php endwhile; wp_reset_query(); else : ?>
        <h1>Latest News</h1>
    <?php endif; ?>
    </div>
</div></div></div>
<div class="submenuholder">
    <div class="container-fluid graybg scrollhider">
        <div class="container mobilescroll event-cat-menu">
            <a href="?sort=recent" <?php if(($_GET['sort'] == 'recent') || (!isset($_GET['sort']))){ echo 'class="alphachosen"'; } ?>>Most Recent</a> 
            <a href="?sort=popular" <?php if($_GET['sort'] == 'popular'){ echo 'class="alphachosen"'; } ?>>Popular</a>  
            <?php $categories=get_categories(
				array( 'parent' => 39 )
			);
			if($_GET['sort'] == 'popular') { $curst = 'popular'; }
			else { $curst = 'recent'; }
			if(count($categories) > 4){
				foreach (array_slice($categories, 0, 3) as $c) {
					echo '<a href="/category/news/'.$c->slug.'?sort='.$curst.'">'.$c->name.'</a>';
				} 
			} else {
				foreach ($categories as $c) {
					echo '<a href="/category/news/'.$c->slug.'?sort='.$curst.'">'.$c->name.'</a>';
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
						echo '<option value="/category/news/'.$c->slug.'?sort='.$curst.'">'.$c->name.'</option>';
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
            <input type="hidden" value="news" name="post_type" />
            <input type="hidden" value="39" name="cat" />
            </form>
        </div>
    </div>
</div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">


<div class="site-inner container">
    <div class="row event-wrapper">
        <!-----   news loop ---->
        <?php 
		if($_GET['sort'] == 'popular') {
			$sorter = 'meta_value';
			$qry = array( 
				'paged' => $paged, 
				'post_type' => 'news',
				'orderby' => $sorter,
				'meta_key'    => 'post_views_count',
				'order' => 'DESC',
				'sort' => $_GET['catname'],
				'category_name' => $_GET['catname']
			);
		} else if($_GET['sort'] == 'recent') {
			$sorter = 'date';
			$qry = array( 
				'paged' => $paged, 
				'post_type' => 'news',
				'orderby' => $sorter,
				'order' => 'DESC',
				'sort' => $_GET['catname'],
				'category_name' => $_GET['catname']
			);
		} else { 
			$sorter = 'date'; 
			$qry = array( 
				'paged' => $paged, 
				'post_type' => 'news',
				'orderby' => $sorter,
				'order' => 'DESC',
				'sort' => $_GET['catname'],
				'category_name' => $_GET['catname']
			);
		}
		$loop = new WP_Query( $qry ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); //if (get_post_meta(get_the_ID(), '_is_ns_featured_post', true) != 'yes') { ?>
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
                <div class="sixtyspacer"></div>
            </div>
            <div class="clearfix"></div>
        <?php //} ?> <?php endwhile; genesis_posts_nav(); wp_reset_postdata(); wp_reset_query(); ?>
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