<?php
get_header(); 
$thisID = 134;
?>
<section class="fc-cw-post-grid-sec-wrp">
  <div class="fl-sec-hdr-title">
    <?php if( !empty(get_the_title($thisID)) ) printf('<h1 class="full-width-bdr-title"><span><i></i><em></em>%s</span></h1>', get_the_title($thisID) );?>
  </div>
<?php 
  $sort = 'desc';
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $query = new WP_Query(array( 
    'post_type'=> 'competition_winners',
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
      <div class="col-sm-12">
        <div class="fc-cw-post-grid-wrp clearfix">
          <ul class="reset-list">
            <?php 
              $i = 1;
              while($query->have_posts()): $query->the_post();
                $attach_id = get_post_thumbnail_id(get_the_ID());
            ?>
            <li>
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
              <!-- Loop Modal -->
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
            </li>
            <?php $i++; endwhile; ?>
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