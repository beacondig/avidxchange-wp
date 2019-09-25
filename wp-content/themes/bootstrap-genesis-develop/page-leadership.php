<?php
/**
 * Template Name: Page - Leadership
 * Description: Used as a page template to show page Leadership
 */
 ?>

<?php get_header(); ?>
</div>

<!--- biography modal start --->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
			<?php $rowchk = 0;
            if( have_rows('member') ): 
                while ( have_rows('member') ) : the_row();?>
                <div class="bioentry" id="bioentry<?php echo $rowchk; ?>">
                    <div class="modal-header" style="text-align:center;">
                        <h3 class="modal-title biopopname"><?php the_sub_field('name'); ?></h3>
                    </div>
                    <div class="modal-body biopopbio">
                        <?php the_sub_field('biography'); ?>
                    </div>
                </div>
                <?php $rowchk++; ?>
                <?php endwhile; wp_reset_query();  ?>
            <?php else :
                // no rows found
            endif;
            ?>
    </div>
    
  </div>
</div>
<!--- biography modal end --->

<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<?php if( get_field('banner_description') ): ?>
	<p><?php the_field('banner_description'); ?></p>
<?php endif; ?>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->
<div class="submenuholder"></div>
<div class="site-inner container">

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
    <div class="site-inner container">
        <div class="row center">
            <?php $rowchk = 0;
            if( have_rows('member') ): 
                while ( have_rows('member') ) : the_row();?>
                	<?php 
						$regimg = get_sub_field('image');
						$goofimg = get_sub_field('goofy_image');
						$size = 'three-column';
						$gimg = wp_get_attachment_image_src($goofimg, $size);
						$rimg = wp_get_attachment_image_src($regimg, $size);
					?>
                    <div class="col-md-4 col-sm-4">
                        <div class="bioholder eventhemup">
                            <div><a data-toggle="modal" data-target="#myModal" onclick="loadBio(bioentry<?php echo $rowchk; ?>)"><div class="propic" style="background-image:url(<?php echo $gimg[0]; ?>); background-size: contain;"><img class="propicoverlay" src="<?php echo $rimg[0]; ?>" /></div></a></div>
                            <div class="tenspacer"></div>
                            <p class="bioname"><?php the_sub_field('name'); ?></p>
                            <p class="biotitle"><?php the_sub_field('title'); ?></p>
                            <p class="biolink"><a data-toggle="modal" data-target="#myModal" onclick="loadBio(bioentry<?php echo $rowchk; ?>)">Read Biography</a></p>
                            <div class="tenspacer"></div>
                        </div>
                        <div class="thirtyspacer"></div>
                    </div>
                    <?php 
                    $rowchk++;
                    if($rowchk % 3 == 0) {
                        echo '<div class="clearfix"></div>';	
                    } ?>
                <?php endwhile; wp_reset_query();  ?>
            <?php else :
                // no rows found
            endif;
            ?>
        </div>
    </div>
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<script>
function loadBio(n) {
	var cols = document.getElementsByClassName('bioentry');
	for(i=0; i<cols.length; i++) {
		cols[i].style.display = 'none';
	}
	n.style.display = 'block';
}
</script>

<?php get_footer(); ?>