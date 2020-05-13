<?php
get_header(); 
?>
<section class="fc-enty-list-box-sec-wrp">
  <div class="fl-sec-hdr-title">
    <h1 class="full-width-bdr-title">
      <span><i></i><em></em> CUSTOMER REVIEWS</span>
    </h1>
  </div>
<?php 
  $sort = 'desc';
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $query = new WP_Query(array( 
    'post_type'=> 'customer_reviews',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'paged' => $paged,
    'orderby' => 'date',
    'order'=> $sort
    ) 
  );
?>
<?php 
if($query->have_posts()): 
?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-customer-reviews-sec-cntlr">
          <ul class="reset-list clearfix">
            <?php 
              while($query->have_posts()): $query->the_post();
              $firstname = get_field('first_name', get_the_ID());
              $lastname = get_field('last_name', get_the_ID());
              $description = get_field('description', get_the_ID());
            ?>
            <li>
              <div class="hm-customer-reviews-item">
                <div class="hmcri-hdr">
                  <h4 class="hmcri-hdr-title">
                    <a>
                      <?php 
                        if( !empty($firstname) ) printf('<span>%s</span>', $firstname);
                        if( !empty($lastname) ) printf('%s', $lastname);
                      ?>
                    </a>
                  </h4>
                  <div class="reviews-stars">
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                  </div>
                </div>
                <div class="hmcri-des">
                  <?php 
                    if( !empty($description) ) echo wpautop( $description );
                  ?>
                  <span><?php echo get_the_date('d-m-Y'); ?></span>
                </div>
              </div>
            </li>
            <?php endwhile; ?>
          </ul>
        </div>
        <div class="fc-pagination-wrp">
         <?php
            if( $query->max_num_pages > 1 ):
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $query->max_num_pages,
              'type'  => 'list',
              'show_all' => true,
              'prev_next' => false
            ) );
            endif; 
          ?>
        </div>
      </div>
    </div>
  </div>
<?php 
  else:
    echo '<div class="hasgap">No Results!</div>';
  endif;  
  wp_reset_postdata();
?>
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