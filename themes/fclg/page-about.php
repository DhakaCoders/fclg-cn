<?php
/*
  Template Name: About Us
*/
get_header(); 
$thisID = get_the_ID();
$intro = get_field('introsec', $thisID);
?>
<section class="about-us-section">
  <?php if(!empty($intro['image'])): ?>
  <div class="sec-rgt-bg" style="background: url(<?php echo cbv_get_image_src($intro['image']); ?>);"></div>
  <?php endif; ?>
  <div class="sec-overlay-cntlr">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="how-it-works-sec-hdr">
            <?php if( !empty(get_the_title($thisID)) ) printf('<h1 class="hiwshder-title">%s</h1>', get_the_title($thisID) ); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="about-us-sec-des">
            <?php if( !empty($intro['title']) ) printf('<h2 class="hiwsd-title">%s</h2>', $intro['title'] ); ?>
            <div class="ausd-txt">
            <?php if(!empty($intro['description'])) echo wpautop( $intro['description'], true ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


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