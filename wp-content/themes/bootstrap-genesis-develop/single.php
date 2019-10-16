<?php get_header('new'); ?>
</div>
<link rel='stylesheet' id='theme-styles-css' href='http://avidxdev.wpengine.com/wp-content/themes/bootstrap-genesis-develop/css/theme-styles.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-css' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-theme-css' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='components-css' href='http://avidxdev.wpengine.com/wp-content/themes/bootstrap-genesis-develop/css/components.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='duplicate-post-css' href='http://avidxdev.wpengine.com/wp-content/plugins/duplicate-post/duplicate-post.css' type='text/css' media='all' />
<link rel='stylesheet' id='new-royalslider-core-css-css' href='http://avidxdev.wpengine.com/wp-content/plugins/new-royalslider/lib/royalslider/royalslider.css' type='text/css' media='all' />


<!--- form modal start (Embedded field values - DJ style) --->
<div class="modal fade" id="intModal" role="dialog">
  <div class="modal-dialog modal-sm">

    <div class="modal-content">
      <button type="button" class="closeblue" data-dismiss="modal">&times;</button>
      <div class="modal-header">
        <h6>Speak to an AP Automation expert</h6>Fill out your information and we’ll connect you with one of our AP Automation experts.
      </div>
      <div class="modal-body">
        <div>
          <div class="demoformblue demoformpopblue"><?php echo do_shortcode('[gravityform id=15 title=false description=false ajax=true tabindex=49]'); ?></div>
        </div>
      </div>
    </div>

  </div>
</div>
<!--- form modal end --->
<!--- form modal start (Optimizely Style) --->
<?php /*?><div class="modal fade" id="intModal2" role="dialog">
  <div class="modal-dialog modal-md">
  
    <div class="modal-content">
		<div class="modal-header"><h4>Speak to an AP Automation expert</h4>Fill out your information and we’ll connect you with one of our AP Automation experts.</div>
      <div class="modal-body">
        <div><div class="demoformwide demoformpop" style="max-width:100%;"><?php echo do_shortcode('[gravityform id=16 title=false description=false ajax=true tabindex=49]'); ?></div></div>
		  <div style="text-align:center; padding-bottom:20px; margin-top:-20px;">
        <button type="button" class="closewide" data-dismiss="modal">Cancel</button></div>
      </div>
    </div>
    
  </div>
</div><?php */ ?>
<!--- form modal end --->


<div class="header-blog-inner">
  <div class="hero-body">
    <div class="container">
      <div class="pageTitleTop">Blog:</div>
      <h1 class="bbh1"><?php the_title(); ?></h1>
      <!--<a href="#demoRequest" class="green-border-btn desktop-hidden-btn">request demo</a>-->
    </div>
  </div>
</div>
<!--- <div class="greentopsliver"></div> --->
<!--<div class="submenuholder"></div>-->

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">











  <?php get_field('resource_type') ?>
  <?php genesis_before_content(); ?>
  <?php $fea_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>


  <div class="post-body-outer">
    <div class="container">
      <div class="post-body-inner">
        <div class="post-top-wrap">
          <div class="post-top-row post-row1-outer post-row-outer">
            <div class="post-top-col1">
              <div class="post-top-feat-img" style="background-image: url(<?php echo $fea_image; ?>)">
              </div>
            </div>
            <div class="post-top-col2">
              <div class="post-top-author-detials">
                <div class="post-top-author-img">
                  <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                </div>
                <div class="post-top-author-info">
                  <h4>By: <?php echo get_the_author_link(); ?></h4>
                  <p><?php echo get_the_date('F d, Y'); ?></p>
                  <div class="social-links">
                    <?php if (!empty(get_the_author_meta('facebook'))) { ?>
                      <a href="<?php the_author_meta('facebook'); ?>" target="_blank">
                        <img src="http://avidxdev.wpengine.com/wp-content/uploads/2019/09/facebook-f-50.png" alt="facebook" />
                      </a>
                    <?php } ?>

                    <?php if (!empty(get_the_author_meta('twitter'))) { ?>
                      <a href="<?php the_author_meta('twitter'); ?>" target="_blank">
                        <img src="http://avidxdev.wpengine.com/wp-content/uploads/2019/09/linkedin-2-50.png" alt="Twitter" />
                      </a>
                    <?php } ?>

                    <?php if (!empty(get_the_author_meta('linkedin'))) { ?>
                      <a href="<?php the_author_meta('linkedin'); ?>" target="_blank">
                        <img src="http://avidxdev.wpengine.com/wp-content/uploads/2019/09/twitter-50.png" alt="Twitter" />
                      </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="post-row2-outer post-row-outer">
            <div class="post-row-inner">
              <?php the_content(); ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


  <?php genesis_after_content(); ?>









  <?php genesis_after_content_sidebar_wrap(); ?>



  <div class="author-content bottom-author-desc">
    <div class="container">
      <div class="col-md-4 col-sm-4">
        <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
      </div>
      <div class="col-md-8 col-sm-8">
        <h3><?php echo get_the_author_link(); ?></h3>
        <p><?php echo get_the_author_meta('description'); ?></p>
        <a href="<?php the_field('author_linkText'); ?>">Read More By <?php echo get_the_author_meta('first_name'); ?></a>
      </div>

    </div>
  </div>

  <div class="mix-post-outer mix-post-outer-margin">
    <div class="container">
      <div class="mix-post-inner">
        <?php $wp_query = new WP_Query(array('post_type' => 'resources', 'post_status' => 'publish', 'posts_per_page' => 3)); ?>

        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <div class="mix-post-inner1">
              <div class="top-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post_id, 'large'); ?>) !important;"></div>
              <div class="mix-post-inner-desc">
                <h2><?php echo get_the_title(); ?></h2>

                <p class="cat"> <?php
                                    $terms = get_the_terms($post->ID, 'category');
                                    $len = count($terms);
                                    foreach ($terms as $index => $term) {

                                      if ($index == $len - 1) {
                                        echo $term->name . " | ";
                                      } else {
                                        echo $term->name . ", ";
                                      }
                                    }

                                    the_time('F Y');

                                    ?></p>

                <p> <?php the_field('mini_description'); ?> </p>
                <br><a href="<?php the_permalink(); ?>" class="learnmore">READ MORE > </a>
              </div>
            </div>

          <?php endwhile; ?>
          <!-- end of the loop -->

          <?php wp_reset_postdata(); ?>

        <?php else : ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
      </div>
      <div class="loadmore-wrap loadmore-wrap-large">
        <a href="/resource" class="loadmore">SEE ALL RESOURCES</a>
      </div>
    </div>
  </div>


  <div class="request-demo-out">
    <div class="bottom-design"></div>
    <section class="section request-demo" id="demoRequest">
      <div class="container">

        <h2 class="section-title is-white has-smaller-gap center">GET UPDATES FROM US TO YOUR INBOX</h2>
        <div class="form-outer-wrap">
          <?php echo do_shortcode('[gravityform id="39" title="true" description="true"]'); ?>
        </div>
      </div>
    </section>
  </div>





  <script>
    jQuery(document).ready(function($) {
      var x = readCookie('newsubcookie')
      if (x) {
        /* exists */
        $('#noNewsSignup').css('display', 'none');
        $('#yesNewsSignup').css('display', 'block');
      }
    });
  </script>

  <?php get_footer('new'); ?>