<?php
/**
 * The single page for the real estate microsite resource content
 */
 ?>

<?php get_header(); ?>
</div>

<style>
	
	.greenbottomsliver, .bluebottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	
	.re-hs-form p {
		margin:0;
		padding:0;
		line-height:0;
	}
</style>

<div class="modal fade" id="vidModal1" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <div>
        <script src="//fast.wistia.com/embed/medias/<?php the_field('video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset autoPlay=true" style="height:100%;width:100%">&nbsp;</div></div></div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- video modal end -->


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	<div class="full-width-featured">
		<?php if ( has_post_thumbnail() ) : ?>
    		<?php the_post_thumbnail(); ?>
		<?php endif; ?>
	</div>
	
<div class="container-fluid re-cd-bg">
	
	<div class="container cd-block">
	
		<div class="row">
			
			<?php if (get_field('resource_type') == 'Testimonial') { ?>
			
			<style>
				.full-width-featured img {
					margin-top:0px;
				}
				
				@media (max-width: 480px) {
					.cd-block {
						margin:-70px auto 125px;
					}	
				}
			</style>
				
			<div class="col-sm-10 col-sm-offset-1 center">
				<div class="cat-block"><span><?php $categories = get_the_category();
                $separator = ', ';
                $output = '';
                if ( ! empty( $categories ) ) {
                    foreach( $categories as $category ) {
                        $output .= esc_html( $category->name ) . $separator;
                    }
                    echo trim( $output, $separator );
                }?></span></div>
				<h1 class="thin-title re-cd-title"><?php the_title(); ?></h1>
				
				<div class="fiftyspacer"></div>
				
				<div>
        			<script src="//fast.wistia.com/embed/medias/<?php the_field('video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset autoPlay=false" style="height:100%;width:100%">&nbsp;</div></div></div>
        		</div>
			
			</div>
			
			<?php } else { ?>
			
		
			<div class="col-sm-6">
				<div class="cat-block"><span><?php $categories = get_the_category();
                $separator = ', ';
                $output = '';
                if ( ! empty( $categories ) ) {
                    foreach( $categories as $category ) {
                        $output .= esc_html( $category->name ) . $separator;
                    }
                    echo trim( $output, $separator );
                }?></span></div>
				<h1 class="thin-title re-cd-title"><?php the_title(); ?></h1>
				
				
				<?php the_field('content'); ?>
			</div>
			
			<div class="col-sm-5 col-sm-offset-1">
			
				<div class="re-form-block">
					<p>Fill out the form to receive <?php the_title(); ?></p>
					<div class="re-hs-form"><?php the_field('hubspot_form'); ?></div>
				</div>
			
			</div>
			
			<?php } ?>
		
		</div>
		
	</div>	
	
</div>
	
	
	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>


<?php get_footer(); ?>