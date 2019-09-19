<?php
/**
 * Template Name: Page - Contact
 * Description: Used as a page template to show page Contact
 */
 ?>

<?php 
/* formatting of the phone numbers for display 
************************************************************/
/*$csp = get_field('customer_support_phone'); 
$ssp = get_field('supplier_support_phone'); 
$sap = get_field('sales_phone'); 
$cap = get_field('careers_phone'); */

function phonedisplay($csp) {
	$csp = substr_replace($csp, '.', 6, 0);
	$csp = substr_replace($csp, ') ', 3, 0);
	$csp = substr_replace($csp, '(', 0, 0);
	$csp = str_replace(',', ', ext. ', $csp);
	echo $csp;
}
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
<!--- <div class="greentopsliver"></div> --->
<!--<div class="submenuholder"></div>-->
<div class="site-inner container">

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	<div class="site-inner container">
        <div class="row contactrowpadding">
        	<div class="col-md-6 col-sm-6">
            	<div class="contactbg">
                    <h4>Customer Support</h4>
                    <div>
                        <?php if( have_rows('customer_support_questions') ): 
                                echo '<ul>';
                                while ( have_rows('customer_support_questions') ) : the_row();?>
                                    <li><?php the_sub_field('question'); ?></li>
                                <?php endwhile; wp_reset_query();  ?>
                                </ul>
                        <?php else :
                            // no rows found
                        endif;
                        ?>
                    </div>
                    <?php if(get_field('customer_support_faq_link')): ?>
                    	<div>Have more questions? <a href="<?php the_field('customer_support_faq_link'); ?>">See all Customer FAQ's</a></div>
                    <?php endif; ?>
                    <div class="twentyspacer"></div>
                    <div class="cbarea">
                        <div class="contbuttons">
                            <a class="secondarybutton smallbutton" style="margin-right:20px; " href="tel:<?php the_field('customer_support_phone'); ?>"><?php phonedisplay(get_field('customer_support_phone')); ?></a>
                            <a class="secondarybutton smallbutton" href="mailto:<?php the_field('customer_support_email'); ?>"><?php the_field('customer_support_email'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="col-md-6 col-sm-6">
            	<div class="contactbg">
                    <h4>Supplier Support</h4>
                    <div>
                        <?php if( have_rows('supplier_support_questions') ): 
                                echo '<ul>';
                                while ( have_rows('supplier_support_questions') ) : the_row();?>
                                    <li><?php the_sub_field('question'); ?></li>
                                <?php endwhile; wp_reset_query();  ?>
                                </ul>
                        <?php else :
                            // no rows found
                        endif;
                        ?>
                    </div>
                    <?php if(get_field('supplier_support_faq_link')): ?>
                    	<div>Have more questions? <a href="<?php the_field('supplier_support_faq_link'); ?>">See all Supplier FAQ's</a></div>
                    <?php endif; ?>  
                    <div class="twentyspacer"></div>
                    <div class="cbarea">
                        <div class="contbuttons">
                            <a class="secondarybutton smallbutton" style="margin-right:20px;" href="tel:<?php the_field('supplier_support_phone'); ?>"><?php phonedisplay(get_field('supplier_support_phone')); ?></a>
                            <a class="secondarybutton smallbutton" href="mailto:<?php the_field('supplier_support_email'); ?>"><?php the_field('supplier_support_email'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        	<div class="col-md-6 col-sm-6">
            	<div class="contactbg">
                    <h4>Sales Support</h4>
                    <div>
                        <?php if( have_rows('sales_questions') ): 
                                echo '<ul>';
                                while ( have_rows('sales_questions') ) : the_row();?>
                                    <li><?php the_sub_field('question'); ?></li>
                                <?php endwhile; wp_reset_query();  ?>
                                </ul>
                        <?php else :
                            // no rows found
                        endif;
                        ?>
                    </div>
                    <?php if(get_field('sales_faq_link')): ?>
                    	<div>Have more questions? <a href="<?php the_field('sales_faq_link'); ?>">See all Sales FAQ's</a></div>
                    <?php endif; ?>
                    <div class="twentyspacer"></div>
                    <div class="cbarea">
                        <div class="contbuttons">
                            <a class="secondarybutton smallbutton" style="margin-right:20px;" href="tel:<?php the_field('sales_phone'); ?>"><?php phonedisplay(get_field('sales_phone')); ?></a>
                            <a class="secondarybutton smallbutton" href="mailto:<?php the_field('sales_email'); ?>"><?php the_field('sales_email'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="col-md-6 col-sm-6">
            	<div class="contactbg">
            		<h4>Careers Support</h4>
                    <div>
                        <?php if( have_rows('careers_questions') ): 
                            echo '<ul>';
                            while ( have_rows('careers_questions') ) : the_row();?>
                                <li><?php the_sub_field('question'); ?></li>
                            <?php endwhile; wp_reset_query();  ?>
                            </ul>
                        <?php else :
                            // no rows found
                        endif;
                        ?>
                    </div>
                    <?php if(get_field('careers_faq_link')): ?>
                    	<div>Have more questions? <a href="<?php the_field('careers_faq_link'); ?>">See all Careers FAQ's</a></div>
                    <?php endif; ?>
                    <div class="twentyspacer"></div>
                    <div class="cbarea">
                        <div class="contbuttons">
                            <a class="secondarybutton smallbutton" style="margin-right:20px;" href="tel:<?php the_field('careers_phone'); ?>"><?php phonedisplay(get_field('careers_phone')); ?></a>
                            <a class="secondarybutton smallbutton" href="mailto:<?php the_field('careers_email'); ?>"><?php the_field('careers_email'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="site-inner container">
    	<div class="fiftyspacerNoMobile"></div>
		<?php if( have_rows('locations') ): 
            while ( have_rows('locations') ) : the_row();?>
            	<div class="row contactlocpadding">
                    <div class="col-md-6 col-sm-6 medcrunch">
                    <?php if( get_sub_field('image') ): ?>
                    	<?php $locimg = get_sub_field('image');
								$size = 'medium';
								$loimg = wp_get_attachment_image_src($locimg, $size); ?>
                        <p><img src="<?php echo $loimg[0]; ?>" /></p>
                    <?php endif; ?>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h5><?php the_sub_field('location_name'); ?></h5>
                        <?php the_sub_field('location_details'); ?>
                    </div>
            	</div>
            <?php endwhile; wp_reset_query();  ?>
        <?php else :
            // no rows found
        endif;
        ?>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center">
        	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            	<h2><?php the_field('bottom_title'); ?></h2>
                     <div class="separator"></div>
                <div class="intro"><?php the_field('bottom_intro'); ?></div>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center rowbottompadding">
            <div class="col-md-12 col-sm-12">
				<?php if( have_rows('support_team') ): 
                    while ( have_rows('support_team') ) : the_row();?>
                        <div class="threecrunch" style="display:inline-flex; display: -webkit-inline-flex; padding:30px 50px;">
                            <div>
                                <?php if( get_sub_field('image') ): ?>
                                	<?php $socimg = get_sub_field('image');
									$size = 'three-column';
									$soimg = wp_get_attachment_image_src($socimg, $size); ?>
                                    <p><img src="<?php echo $soimg[0]; ?>" class="supportpeople" /></p>
                                <?php endif; ?>
                                    <h5><?php the_sub_field('name'); ?></h5>
                                    <?php the_sub_field('title'); ?>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_query();  ?>
                <?php else :
                    // no rows found
                endif;
                ?>
            </div>
        </div>
    </div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>