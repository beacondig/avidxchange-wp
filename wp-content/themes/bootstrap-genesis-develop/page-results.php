<?php
/**
 * Template Name: Page - Results
 * Description: Used as a page template to show ROI calculator results
 */
 ?>

<?php get_header(); ?>
</div>
<div class="print-logo-img-container"><img src="/wp-content/uploads/avidxchange-logo.svg" width="192" height="31" style="height:31px; overflow:hidden;"></div>
<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php genesis_do_post_title(); ?></h1>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->
<div class="submenuholder"></div>
<div class="site-inner container">

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">
<style scoped>
    .results {
        display: none;
    }
    
    .print-logo-img-container {
        display: none;
    }
    
    .share #crestashareiconincontent {
        display: table;
        margin: 0 auto;
        margin-bottom: 20px;
    }
    
    @media print {
        .print-logo-img-container {
            display: block;
        }

        .navbar {
            display: none !important;
        }

        footer {
            display: none !important;
        }
        
        .logo img:not(.waltlogo) {
            display: block !important;
        }

        .submenuholder {
            display: none !important;
        }

        .headerbluebg .container {
            padding: 0 !important;
        }
        
        .share {
            display: none !important;
        }
    }
</style>
<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
    <?php 
    
        $calculator = new RoiCalculator();
        $script = $calculator->getScript();
        echo $calculator->getResultsTemplate();
    ?>
    <script type="text/javascript">
        <?php echo $script; ?>
        function getParam(param) {
            return parseInt(location.search.split(param + '=')[1]) || 0;
        }

        roi_display(roi_calculate(getParam('invoices'), getParam('checks'), getParam('staff')), true);
    </script>
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>
<!--more-->
<?php get_footer(); ?>
