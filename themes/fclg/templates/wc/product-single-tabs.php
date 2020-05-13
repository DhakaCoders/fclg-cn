<?php global $woocommerce, $post, $product; ?>
<section class="fl-product-details-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="fl-pro-details-tabs fl-tabs clearfix">
          <button class="tab-link current" data-tab="tab-1"><span class="title-angle"></span>DESCRIPTION</button>
          <button class="tab-link" data-tab="tab-2"><span class="title-angle"></span>COMPETITION DETAILS</button>
        </div>
      </div>
      <div class="col-sm-12">
        <div>
          <div id="tab-1" class="fl-tab-content current">
            <div class="fl-pro-details-tabs-con"> 
            <?php
				$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

				if ( ! $short_description ) {
					return;
				}
				echo $short_description; // WPCS: XSS ok.
			?>
            </div>
          </div>
          <div id="tab-2" class="fl-tab-content">
            <div class="fl-pro-details-tabs-con">
				<?php the_content(); ?>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</section>