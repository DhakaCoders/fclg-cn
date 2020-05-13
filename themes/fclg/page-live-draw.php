<?php
/*
  Template Name: Live Draw
*/
get_header(); 
$thisID = get_the_ID();
?>
<div class="live-draws-page-con">
  <section class="live-draws-page-hdr">
    <span class="live-draws-page-hdr-icon"><img src="<?php echo THEME_URI; ?>/assets/images/live-draws-page-hdr-icon.png"></span>
    <div class="live-draws-page-hdr-inr">
      <div class="fl-sec-hdr-title">
        <?php if( !empty(get_the_title($thisID)) ) printf('<h1 class="full-width-bdr-title"><span><i></i><em></em>%s</span></h1>', get_the_title($thisID) );?>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="live-draws-page-hdr-con">
              <?php 
                $live_embed = get_field('live_embed', $thisID);
                if( !empty($live_embed) ):
              ?>
                <div class="fbvideo-live">
                  <div class="fb-video-embaded">
                    <?php echo $live_embed; ?>
                  </div>
                </div>
              <?php else: ?>
              <strong>NOT CURRENTLY LIVE</strong>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php 
  $sort = 'desc';
  $query = new WP_Query(array( 
    'post_type'=> 'live_draws',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order'=> $sort
    ) 
  );
?>
<?php 
if($query->have_posts()): 
?>
  <section class="previous-draws-section">
    <div class="fl-sec-hdr-title fl-sec-hdr-title-drk-cntlr">
      <h1 class="full-width-bdr-title">
        <span><i></i><em></em> PREVIOUS DRAWS</span>
      </h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="previous-draws-sec-grd-cntlr">
            <ul class="reset-list clearfix">
            <?php 
              while($query->have_posts()): $query->the_post();
                $embaded_v = get_field('video_embaded', get_the_ID());
                if( !empty($embaded_v) ):
            ?>
              <li>
                <div class="fb-video-embaded">
                  <?php echo $embaded_v; ?>
                </div>
              </li>
              <?php endif; ?>
            <?php endwhile; ?>

            </ul>
          </div>
        </div>
      </div>
    </div>
    
  </section>
  <?php 
    else:
      echo '<div class="hasgap"></div>';
    endif;  
    wp_reset_postdata();
  ?>
</div>
<section class="footer-tp-gallery-sec-wrp">
  <div class="fl-sec-hdr-title fl-sec-hdr-title-drk-cntlr">
    <h1 class="full-width-bdr-title">
      <span><i></i><em></em> @RACE-LINE-COMPS</span>
    </h1>
  </div>
  <div class="container-md">
    <div class="row">
      <div class="col-sm-12">
        <div class="footer-tp-gallery-wrp">
          <div class="ftr-top-gallery-img">
            <img src="<?php echo THEME_URI; ?>/assets/images/ftr-top-gallery-img.png">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>