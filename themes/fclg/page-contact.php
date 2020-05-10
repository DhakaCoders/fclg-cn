<?php
/*
  Template Name: Contact Us
*/
get_header(); 
$thisID = get_the_ID();
$spacialArry = array( ".", "/", "+", " ", ")", "(" );$replaceArray = '';
$emailspacialArry = array( "/" );
$forms = get_field('formshortcode', $thisID);
?>
<section class="contact-form-sec-wrp">
  <div class="fl-sec-hdr-title">
    <?php if( !empty(get_the_title($thisID)) ) printf('<h1 class="full-width-bdr-title"><span><i></i><em></em>%s</span></h1>', get_the_title($thisID) ); ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="contact-form-wrp clearfix">
          <div class="contact-form-lft">
            <?php if(!empty($forms['title'])) printf('<h2 class="contact-form-title">%s</h2>', $forms['title']); ?>
            <div class="fc-contact-form">
              <?php if(!empty($forms['form_shortcode'])) echo do_shortcode( $forms['form_shortcode'] ); ?>
            </div>
          </div>
          <?php 
            $continfo = get_field('contactsec', $thisID);
            $gmaplink = !empty($continfo['googlemap_url'])?$continfo['googlemap_url']: 'javascript:void()';
          ?>
          <div class="contact-form-rgt">
            <?php if(!empty($continfo['title'])) printf('<h2 class="contact-form-title-1">%s</h2>', $continfo['title']); ?>
            <div class="fc-contact-info-wrp clearfix">
              <?php if(!empty($continfo['address'])): ?>
              <div class="fc-contact-info-inr clearfix">
                <div class="fc-contact-info-icon">
                  <a href="<?php echo $gmaplink; ?>"><i class="fas fa-map-marker-alt"></i></a>
                </div>
                <div class="fc-contact-info-dsc">
                  <h6 class="fc-contact-info-title"><?php _e('ADDRESS', THEME_NAME); ?></h6>
                  <a href="<?php echo $gmaplink; ?>"><?php echo $continfo['address']; ?></a>
                </div>
              </div>
              <?php endif; ?>
              <?php 
                if(!empty($continfo['telephone'])):
                $telefoon = trim(str_replace($spacialArry, $replaceArray, $continfo['telephone']));
              ?>
              <div class="fc-contact-info-inr clearfix">
                <div class="fc-contact-info-icon">
                  <a href="tel:<?php echo $telefoon; ?>"><i class="fas fa-phone"></i></a>
                </div>
                <div class="fc-contact-info-dsc">
                  <h6 class="fc-contact-info-title"><?php _e('PHONE', THEME_NAME); ?></h6>
                  <a href="tel:<?php echo $telefoon; ?>"><?php echo $continfo['telephone']; ?></a>
                </div>
              </div>
              <?php endif; ?>
              <?php if(!empty($continfo['email_address'])): ?>
              <div class="fc-contact-info-inr clearfix">
                <div class="fc-contact-info-icon">
                  <a href="mailto:<?php echo $continfo['email_address']; ?>"><i class="fas fa-envelope"></i></a>
                </div>
                <div class="fc-contact-info-dsc">
                  <h6 class="fc-contact-info-title"><?php _e('EMAIL', THEME_NAME); ?></h6>
                  <a href="mailto:<?php echo $continfo['email_address']; ?>"><?php echo $continfo['email_address']; ?></a>
                </div>
              </div>
              <?php endif; ?>
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