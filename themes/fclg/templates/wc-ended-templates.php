<section class="recently-ended-sec">
  <div class="fl-sec-hdr-title fl-sec-hdr-title-drk-cntlr">
    <h1 class="full-width-bdr-title">
      <span><i></i><em></em> RECENTLY ENDED</span>
    </h1>
  </div>
  <?php 
    global $woocommerce;
    $meta_query = $woocommerce->query->get_meta_query();
     $meta_query []= array(
      'key'     => '_lottery_closed',
      'compare' => 'EXISTS',
    );

    $meta_query []=  array( 
      'key' => '_lottery_started',
      'compare' => 'NOT EXISTS',
    );
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'ignore_sticky_posts' => 1,
      'posts_per_page' => 5,
      'orderby' => 'meta_value',
      'order' => $order,
      'meta_query' => $meta_query,
      'tax_query' => array(array('taxonomy' => 'product_type' , 'field' => 'slug', 'terms' => 'lottery')),
      'meta_key' => '_lottery_dates_to',
      'is_lottery_archive' => TRUE,
      'show_past_lottery' => TRUE
    );
  $pQuery = new WP_Query( $args );
  if( $pQuery->have_posts() ):
  ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ncsecgrd-cntlr">
          <ul class="reset-list clearfix gray-scale-grd-cntlr">
            <?php 
              while($pQuery->have_posts()): $pQuery->the_post();
              global $product, $woocommerce, $post; 
            ?>
            <li>
              <div class="fl-pro-grd-item">
                <div class="fl-pro-grd-item-fea-img">
                  <div class="fl-pro-sale-text">ended</div>
                  <a href="<?php echo get_permalink( $product->get_id() ); ?>">
                    <?php echo wp_get_attachment_image( get_post_thumbnail_id($product->get_id()), 'pgrid' ); ?>
                  </a>
                </div>
                <div class="fl-pro-grd-item-prices">
                  <p><strong><?php echo $product->get_price_html(); ?></strong></p>
                </div>
                <div class="fl-pro-grd-item-title mHc">
                  <span class="title-angle"></span>
                  <strong><a href="<?php echo get_permalink( $product->get_id() ); ?>"><?php echo get_the_title(); ?></a></strong>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
          </ul>
          <div class="view-all-btn">
            <a href="#">VIEW ALL ENDED</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; wp_reset_postdata(); ?> 
</section>