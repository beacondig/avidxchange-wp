<?php get_header(); ?>
</div>

<div class="headerbluebg">
<div class="xbglg">
<div class="container mobilesquish">
	<div class="row">
    	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            <div>
                <div class="pageTitleTop">
                <?php $categories = get_the_category();
                $separator = ', ';
                $output = '';
                if ( ! empty( $categories ) ) {
                    foreach( $categories as $category ) {
                        $output .= esc_html( $category->name ) . $separator;
                    }
                    echo trim( $output, $separator );
                }?></div>
                <h1 class="bbh1"><?php the_title(); ?></h1>
                <!--<div class="thirtyspacer"></div>-->
            </div>
        </div>
        <?php /*?><div class="col-md-4 col-sm-6">
        	<?php if ( has_post_thumbnail() ) {the_post_thumbnail('medium');} ?>
        </div><?php */?>
        <div class="clearfix"></div>
    </div>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->
<!--<div class="submenuholder"></div>-->


<?php genesis_before_content_sidebar_wrap(); ?>

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	<!---  add to view count -->
	<?php subh_set_post_view( get_the_ID() ); ?>
    <div class="container">
        <div class="row rowpadding">
        	<div class="col-md-2 col-sm-3">
            	<div class="blogmeta">
                    <div class="authimg"><?php echo get_avatar( get_the_author_meta( 'ID' ) , 96 ); ?></div>
                    <h5 class="blogauth"><?php echo get_the_author_link(); ?></h5>
                    <div class="blogdate"><?php the_date(); ?></div>
                    <div class="socialiholder"><?php echo do_shortcode('[cresta-social-share]'); ?></div>
                </div>
            </div>
            <div class="col-md-8 col-sm-9">
                <div style="min-height:300px; position:relative;"><?php the_content(); ?></div>
                <div class="fourtyspacer"></div>
                <div class="separator"></div>
                <div>
                <div>ABOUT THE AUTHOR</div>
                <div class="twentyspacer"></div>
                <div class="webbiopic2">
                    <div class="authimg"><?php echo get_avatar( get_the_author_meta( 'ID' ) , 96 ); ?></div>
                </div>
                <div class="webbio2">
                    <h3 style="margin-bottom:4px; margin-top:8px;"><?php echo get_the_author_link(); ?></h3>
                    <?php $twitterHandle = get_the_author_meta('twitter');
                        if( $twitterHandle != '' ): ?>
                            <div class="linkdin"><a href="https://twitter.com/<?php echo $twitterHandle ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Follow</a></div>
                        <?php endif; ?>
                </div>
                <div class="twentyspacer"></div>
                <div><?php echo get_the_author_meta('description'); ?></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="twentyspacer"></div>
        </div>
    </div>
    
    <div class="container-fluid bannerbluebg event-newsletter" style="margin:0px 0px 40px;">
        <div class="container" style="width:100%;">
            <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="row" style="padding-top:40px; padding-bottom:40px;">
                        <div>
                            <h2>Get <em style="text-decoration:underline;">The AP Automation Standard</em><br />Delivered to Your Email</h2>
                            <div><?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true tabindex=49]'); ?></div>
                        </div>
                    </div>
                </div>
    		<div class="clearfix"></div>
        </div>
    </div>
    
    
    
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>