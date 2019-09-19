<?php
/**
 * Template Name: Page - Leadership V2
 * Description: Used as a page template to show page Leadership
 */
 ?>

<?php get_header(); ?>
</div>

<!--- Exec biography modal start --->
<div class="modal fade" id="execModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <div class="modal-content center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
			<?php $int = 0;
            if( have_rows('execs') ): 
                while ( have_rows('execs') ) : the_row();?>
                <div class="bioentry" id="bioentry<?php echo $int; ?>">
					<div class="modal-header">
                        <h3 class="modal-title biopopname"><?php the_sub_field('exec_name'); ?></h3>
						<h6 class="modal-subtitle"><?php the_sub_field('exec_title'); ?></h6>
                    </div>
					<div class="twentyspacer"></div>
                    <div class="modal-body">
                        	<?php the_sub_field('exec_bio'); ?>
                    </div>
				</div>
                <?php $int++; ?>
                <?php endwhile; wp_reset_query();  ?>
            <?php else :
                // no rows found
            endif;
            ?>
    </div>
    
  </div>
</div>
<!--- biography modal end --->

<!--- Board biography modal start --->
<div class="modal fade" id="bioModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <div class="modal-content center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
			<?php $int = 0;
            if( have_rows('board') ): 
                while ( have_rows('board') ) : the_row();?>
                <div class="boardentry" id="boardentry<?php echo $int; ?>">
					<div class="modal-header">
                        <h3 class="modal-title biopopname"><?php the_sub_field('board_name'); ?></h3>
						<h6 class="modal-subtitle"><?php the_sub_field('board_title'); ?></h6>
                    </div>
					<div class="twentyspacer"></div>
                    <div class="modal-body">
                        	<?php the_sub_field('board_bio'); ?>
                    </div>
				</div>
                <?php $int++; ?>
                <?php endwhile; wp_reset_query();  ?>
            <?php else :
                // no rows found
            endif;
            ?>
    </div>
    
  </div>
</div>
<!--- biography modal end --->

<style>
	.nav-tabs > li {
		float:none;
		margin-bottom:15px;
	}
	
	.nav-tabs > li > a {
		background-color:#fff;
		padding:15px 25px;
		border:none;
		color:#000;
		text-transform:uppercase;
		font-size:14px;
		font-weight:500;
		width:250px;
		border-bottom:3px solid rgba(84, 110, 122, 0.25);
		-webkit-clip-path: polygon(15% 0, 100% 0%, 85% 100%, 0% 100%);
		clip-path: polygon(15% 0, 100% 0%, 85% 100%, 0% 100%);
	}
	
	.nav-tabs > li.active > a,
	.nav-tabs > li.active > a:hover,
	.nav-tabs > li.active > a:focus,
	.nav-tabs > li > a:hover {
		border:none;
		background-color:#1e95d3;
		color:#FFF;
		border-bottom:3px solid rgba(0,78,116,0.25);
	}
	
	.nav > li {
		display:inline-block;
	}
	
	.nav-tabs {
		border-bottom:none;
		margin:50px auto 25px;
	}
	
	.nav-tabs:before {
		content:'';
		display:block;
		width:100vw;
		height:1px;
		background-color:rgba(0,0,0,0.1);
		position:absolute;
		margin-top:25px;
		left: calc( (1170px - 100vw)/2 );
 		float: left;
	}
	
	.greenbottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	

</style>

<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<?php if( get_field('banner_description') ): ?>
	<p><?php the_field('banner_description'); ?></p>
<?php endif; ?>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap" class="graybg">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
    <div class="container">
		<div class="row">
			<div class="col-sm-12 center">
				<ul class="nav nav-tabs">
    				<li class="active"><a data-toggle="tab" href="#execs">Executives</a></li>
    				<li><a data-toggle="tab" href="#board">Board Members</a></li>
  				</ul>
				<div class="tab-content">
    				<div class="tab-pane fade in active" id="execs">
						<div class="member-board">
							<div class="row">
							<?php $int = 0; if( have_rows('execs') ): while ( have_rows('execs') ) : the_row();?>								
									<div class="col-sm-3 member-border">
										<div class="exec-profile" data-toggle="modal" data-target="#execModal" onclick="loadBio(bioentry<?php echo $int; ?>)">
											<?php $eximg = get_sub_field('exec_image');
    						  				$size = 'full';
    						  				$ex1img = wp_get_attachment_image_src($eximg, $size); ?>
										<img class="exec-pic" src="<?php echo $ex1img[0]; ?>" />
										<p class="exec-name"><?php the_sub_field('exec_name'); ?></p>
										<p class="exec-title"><?php the_sub_field('exec_title'); ?></p>
										</div>
									</div>
							<?php $int++;
								if($int % 4 == 0) {
                        		echo '<div class="clearfix"></div>';	
                    			} ?>
             				<?php endwhile; wp_reset_query();  ?>
        	 				<?php else :
             					// no rows found
            					endif;
         	 				?>
						</div>
					</div>
				</div>
    				<div class="tab-pane fade" id="board">
						<div class="member-board">
							<div class="row">
							<?php $int = 0; if( have_rows('board') ): while ( have_rows('board') ) : the_row();?>
									<div class="col-sm-3 member-border"> 
										<div class="member-profile" data-toggle="modal" data-target="#bioModal" onclick="loadBoard(boardentry<?php echo $int; ?>)">
											<p class="exec-name"><?php the_sub_field('board_name'); ?></p>
											<p class="exec-title"><?php the_sub_field('board_title'); ?></p>
										</div>
									</div>
								<?php $int++;
									if($int % 4 == 0) {
                        			echo '<div class="clearfix"></div>';	
                    			} ?>
             				<?php endwhile; wp_reset_query();  ?>
        	 				<?php else :
             					// no rows found
            					endif;
         	 				?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<script>
jQuery(document).ready(function ($) {
    $('.nav-tabs').tab();
});
</script>

<script>
function loadBio(n) {
	var cols = document.getElementsByClassName('bioentry');
	for(i=0; i<cols.length; i++) {
		cols[i].style.display = 'none';
	}
	n.style.display = 'block';
}
	

function loadBoard(n) {
	var cols = document.getElementsByClassName('boardentry');
	for(i=0; i<cols.length; i++) {
		cols[i].style.display = 'none';
	}
	n.style.display = 'block';
}
</script>


<?php get_footer(); ?>