<?php get_header(); ?>
<?php while( have_posts() ): the_post();?>
<section class="page-section">
  <div class="fl-sec-hdr-title">
    <h1 class="full-width-bdr-title">
      <span><i></i><em></em> <?php the_title(); ?></span>
    </h1>
  </div>
  <div class="sec-overlay-cntlr">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="page-sec-des">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>

<section class="footer-tp-gallery-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="footer-tp-gallery-wrp">
          <div class="ftr-top-gallery-img">
            <img src="assets/images/ftr-top-gallery-img.png">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>