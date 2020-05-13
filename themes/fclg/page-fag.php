<?php
/*
  Template Name: FAQ
*/
get_header(); 
$thisID = get_the_ID();
$intro = get_field('introsec', $thisID);
?>
<section class="faq-accordion-tab-sec-wrp">
  <div class="fl-sec-hdr-title">
  <?php 
    if( !empty($intro['title']) ){ 
      printf('<h1 class="full-width-bdr-title"><span><i></i><em></em>%s</span></h1>', $intro['title'] );
    } else {
      if( !empty(get_the_title($thisID)) ) printf('<h1 class="full-width-bdr-title"><span><i></i><em></em>%s</span></h1>', get_the_title($thisID) );
    }
  ?>
  </div>  
  <?php 
    $srooms_query = new WP_Query(array( 
      'post_type'=> 'faq',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'orderby' => 'date',
      'order'=> 'desc'
      ) 
    );
  ?>
  <?php if($srooms_query->have_posts()): ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="faq-accordion-tab-wrp">
          <div class="item-dsce">
            <?php while($srooms_query->have_posts()): $srooms_query->the_post(); ?>
            <div class="faq-accordion-tab-row">
              <h6 class="faq-accordion-title"><?php the_title(); ?></h6>
              <div class="faq-accordion-des">
                <div>
                 <?php the_content(); ?>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
    endif;  
    wp_reset_postdata();
  ?>
</section>
<?php 
  $showhidecont = get_field('showhidecont', $thisID);
  $contact = get_field('contactinfo', $thisID);
  if( $showhidecont ):
?>
<section class="fc-looking-head-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="fc-looking-head-wrp">
          <?php 
            if( !empty($contact['title']) ) printf('<h3 class="fc-looking-head-title">%s</h3>', $contact['title']);

            $link1 = $contact['link'];
            if( is_array( $link1 ) &&  !empty( $link1['url'] ) ){
              printf('<a href="%s" target="%s">%s</a>', $link1['url'], $link1['target'], $link1['title']); 
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
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