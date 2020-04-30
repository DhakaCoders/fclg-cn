<?php get_header(); ?>
<?php while( have_posts() ): the_post();?>
<section class="page-section">
  <div class="sec-overlay-cntlr">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="how-it-works-sec-hdr">
            <h1 class="hiwshder-title"><?php the_title(); ?></h1>
          </div>
        </div>
      </div>
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