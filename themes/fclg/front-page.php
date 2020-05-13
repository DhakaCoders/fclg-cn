<?php get_header(); ?>
<div class="home-page-sections-cntlr">
<?php  
  $slides = get_field('slidessec', HOMEID);
  $hslides = $slides['slides'];
  if($hslides):
?>
<section class="main-slider-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="main-slider-sec-cntlr">
          <div class="main-slider mainSlider">
            <?php
              foreach( $hslides as $hslide ): 
            ?>
            <div class="mainSlideItem clearfix">
              <div class="mainSlideItemInner clearfix">
                <div class="main-slide-item-lft">
                <?php if( !empty($hslide['image']) ): ?>
                <div class="main-slide-full-img">
                  <?php echo cbv_get_image_tag($hslide['image'], 'slider'); ?>
                </div>
                <?php endif; ?>
                <div class="main-slide-product-title">
                  <div class="fl-pro-grd-item-title">
                    <span class="title-angle"></span>
                    <?php if( !empty($hslide['link']) ): ?>
                    <strong><a href="<?php echo $hslide['link']; ?>"><?php echo $hslide['title']; ?></a></strong>
                    <?php else: ?>
                      <strong><?php echo $hslide['title']; ?></strong>
                    <?php endif; ?>
                  </div>
                </div>
                <?php 
                $galleries = $hslide['gallery']; 
                if( $galleries ):
                ?>
                <div class="main-slide-thumb-imges clearfix">
                  <?php foreach( $galleries as $gitem ): ?>
                  <?php if( !empty($gitem['id']) ){ ?>
                  <div class="main-slider-thumb-img">
                    <?php echo cbv_get_image_tag($gitem['id'], 'sliderthumb'); ?>
                  </div>
                <?php } ?>
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>
              </div>
              <div class="main-slide-item-rgt">
                <?php if( !empty($hslide['description']) ) printf( '%s', $hslide['description'] ); ?>
                <?php if( !empty($hslide['link']) ) printf('<a href="%s"><span>ENTER NOW</span></a>', $hslide['link']); ?>
              </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>
<?php
  $showhidencomp = get_field('showhidencomp', HOMEID);
  if( $showhidencomp ):
    $newcomp = get_field('newcompetitions', HOMEID);
    $competitionIDS = $newcomp['select_competition'];
?>
<section class="hm-new-compitions-sec">
  <div class="fl-sec-hdr-title fl-sec-hdr-title-drk-cntlr">
    <?php if( !empty($newcomp['title']) ) printf('<h1 class="full-width-bdr-title"><span><i></i><em></em>%s</span></h1>', $newcomp['title'] ); ?>
  </div>
<?php 
  global $woocommerce;

  $meta_query = $woocommerce->query->get_meta_query();
  if( !empty($competitionIDS) ){
    $ccount = count($competitionIDS);
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'ignore_sticky_posts' => 1,
      'posts_per_page'=> $ccount,
      'post__in' => $competitionIDS,
      'meta_query' => $meta_query,
      'tax_query' => array(array('taxonomy' => 'product_type' , 'field' => 'slug', 'terms' => 'lottery')),
      'is_lottery_archive' => TRUE
    );
        
  }else{
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'ignore_sticky_posts' => 1,
      'posts_per_page' => 10,
      'orderby' => 'date',
      'order' => 'desc',
      'meta_query' => $meta_query,
      'tax_query' => array(array('taxonomy' => 'product_type' , 'field' => 'slug', 'terms' => 'lottery')),
      'is_lottery_archive' => TRUE
    );
  }
  $products = new WP_Query( $args );
?>
  <?php if( $products->have_posts() ):?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-new-compitions-sec-slider hmNewCompitionsSecSlider">
          <?php 
            while($products->have_posts()): $products->the_post();
            global $product, $woocommerce, $post; 
          ?>
          <div class="hmNewCompitionsSecSlideItem">
            <div class="fl-pro-grd-item">
              <div class="fl-pro-grd-item-fea-img">
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
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div> 
  <div class="see-all-components-btn">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <a href="<?php the_permalink( get_option( 'woocommerce_shop_page_id' ) );?>"><span>SEE ALL COMPETITIONS</span></a>
        </div>
      </div>
    </div>
  </div>   
  <?php endif; wp_reset_postdata(); ?> 
</section>
<?php endif; ?>
<?php
  $showhideintro = get_field('showhideintro', HOMEID);
  if( $showhideintro ):
    $introsec = get_field('introsec', HOMEID);
?>
<section class="how-it-works-section hm-how-it-works-sec">
  <?php if(!empty($introsec['image'])): ?>
  <div class="sec-rgt-bg" style="background: url(<?php echo cbv_get_image_src($introsec['image']); ?>);"></div>
  <?php endif; ?>
  <div class="sec-overlay-cntlr">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="how-it-works-sec-des">
            <?php if( !empty($introsec['title']) ) printf('<h2 class="hiwsd-title">%s</h2>', $introsec['title'] ); ?>
            <?php if( !empty($introsec['subtitle']) ) printf('<strong class="hiwsd-subtitle">%s</strong>', $introsec['subtitle'] ); ?>
            <div class="hiwsd-txt">
              <?php if(!empty($introsec['description'])) echo wpautop( $introsec['description'], true ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php
  $showhidewinners = get_field('showhidewinners', HOMEID);
  if( $showhidewinners ):
    $winners = get_field('latestwinners', HOMEID);
    $winnersIDS = $winners['select_winners'];
?>
<section class="hm-latest-winners-sec">
  <div class="fl-sec-hdr-title fl-sec-hdr-title-drk-cntlr">
    <?php if( !empty($winners['title']) ) printf('<h1 class="full-width-bdr-title"><span><i></i><em></em>%s</span></h1>', $winners['title'] ); ?>
  </div>
<?php 
  if( !empty($winnersIDS) ){
    $wcount = count($winnersIDS);
    $qwinners = new WP_Query(array( 
    'post_type'=> 'competition_winners',
    'post_status' => 'publish',
    'posts_per_page'=> $wcount,
    'post__in' => $winnersIDS,
    'paged' => $paged,
    'orderby' => 'date',
    'order'=> $sort
    ) 
  );
        
  }else{
    $qwinners = new WP_Query(array( 
    'post_type'=> 'competition_winners',
    'post_status' => 'publish',
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order'=> 'desc'
    ) 
  );
  }
?>
  <?php if( $qwinners->have_posts() ):?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-latest-winners-slider hmLatestWinnersSlider">
          <?php 
            $i = 1;
            while($qwinners->have_posts()): $qwinners->the_post();
              $attach_id = get_post_thumbnail_id(get_the_ID());
          ?>
          <div class="hmLatestWinnersSlideItem">
            <div class="fc-cw-post-grid-inr" data-toggle="modal" data-target="#quickViewModal<?php echo $i; ?>">
              <div class="fc-cw-post-grid-img-cntrl">
                <?php if( !empty($attach_id) ){ ?>
                  <div class="fc-cw-post-grid-img" style="background: url(<?php echo cbv_get_image_src($attach_id, 'bloggrid'); ?>);">
                    <a href="#" class="overlay-link"></a>
                  </div>
                  <?php } else { ?>
                  <div class="fc-cw-post-grid-img" style="background: url(<?php echo THEME_URI.'/assets/images/fc-cw-post-grid-img-1.png'; ?>);">
                    <a href="#" class="overlay-link"></a>
                  </div>
                <?php } ?>

              </div>
              <div class="fc-cw-post-grid-dsc mHc">
                <h5 class="fc-cw-post-grid-dsc-title mHc1"><a href="#"><?php the_title(); ?></a></h5>
                <span><?php echo get_the_date('m/d/Y'); ?></span>
              </div>
            </div>
            <!-- Modal -->
              <div class="modal fade vn-modal-con-wrap" id="quickViewModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-content">
                        <div class="fc-modal-dsc-wrp">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle<?php echo $i; ?>"><?php the_title(); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="fc-modal-dsc-img">
                            <?php if( !empty($attach_id) ){ ?>
                              <?php echo cbv_get_image_tag($attach_id); ?>
                            <?php }?>
                          </div>
                           <div class="modal-body">
                             <?php the_content(); ?>
                           </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <?php $i++; endwhile; ?>

        </div>
        <?php 
            $wlink = $winners['link'];
            if( is_array( $wlink ) &&  !empty( $wlink['url'] ) ){
              printf('<div class="see-all-winnners-btn"><a href="%s" target="%s">%s</a></div>', $wlink['url'], $wlink['target'], $wlink['title']); 
            }
          ?>
      </div>
    </div>
  </div>  
  <?php endif; wp_reset_postdata(); ?>   
</section>
<?php endif; ?>

<section class="hm-customer-reviews-sec">
  <div class="fl-sec-hdr-title fl-sec-hdr-title-drk-cntlr">
    <h1 class="full-width-bdr-title">
      <span><i></i><em></em> CUSTOMER REVIEWS</span>
    </h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-customer-reviews-sec-cntlr">
          <ul class="reset-list clearfix">
            <li>
              <div class="hm-customer-reviews-item">
                <div class="hmcri-hdr">
                  <h4 class="hmcri-hdr-title">
                    <a href="#">
                      <span>Jeremy</span>
                      Clarkson
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
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultricies magna vitae neque porttitor eleifend. Aliquam laoreet quis urna nec molestie. Sed non odio vitae tellus interdum scelerisque id nec aptent taciti sociosqu leo. </p>
                  <span>25-01-2020</span>
                </div>
              </div>
            </li>
            <li>
              <div class="hm-customer-reviews-item">
                <div class="hmcri-hdr">
                  <h4 class="hmcri-hdr-title">
                    <a href="#">
                      <span>James</span>
                      May
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
                  <p>Proin massa mauris, ullamcorper ut dui sit amet, laoreet placerat lorem. Maecenas rutrum orci enim, non dapibus nunc scelerisque at. Fusce in mauris hendrerit, commodo turpis ac, faucibus nisl. Nulla dignissim suscipit iaculis. Maecenas et convallis nulla. Cras rhoncus euismod nisi, ut malesuada lacus facilisis quis. Fusce elementum sodales odio, sed efficitur augue convallis sed.</p>
                  <span>03-02-2020</span>
                </div>
              </div>
            </li>
            <li>
              <div class="hm-customer-reviews-item">
                <div class="hmcri-hdr">
                  <h4 class="hmcri-hdr-title">
                    <a href="#">
                      <span>Richard</span>
                      Hammond
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
                  <p>Nam pretium, velit eget tincidunt vehicula, lectus sem volutpat sapien, eget semper purus arcu ac metus. Etiam vitae gravida purus. Curabitur ultrices augue et ligula condimentum, nec sollicitudin nisi.</p>
                  <span>17-03-2020</span>
                </div>
              </div>
            </li>
          </ul>
          <div class="see-all-reviews-btn">
            <a href="#">SEE ALL REVIEWS</a>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
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
