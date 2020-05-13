<?php
get_header(); 
$thisID = 134;
?>
<section class="fc-enty-list-box-sec-wrp">
  <div class="fl-sec-hdr-title">
    <?php if( !empty(get_the_title($thisID)) ) printf('<h1 class="full-width-bdr-title"><span><i></i><em></em>%s</span></h1>', get_the_title($thisID) );?>
  </div>
<?php 
  $sort = 'desc';
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $query = new WP_Query(array( 
    'post_type'=> 'entry_lists',
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
        <div class="fc-enty-list-box-wrp">
          <ul class="reset-list clearfix">
            <?php 
              while($query->have_posts()): $query->the_post();
                $intro = get_field('intro', get_the_ID());
            ?>
            <li>
              <div class="fc-enty-list-box-inr mHc">
                <div class="fc-enty-list-box-dsc">
                  <h6 class="fc-enty-list-box-dsc-title mHc1"><?php the_title(); ?></h6>
                  <?php if( !empty($intro['published_date']) ) printf('<span>Published on: %s</span>', $intro['published_date']); ?>
                  <?php if( !empty($intro['draw_date']) ) printf('<u>Draw date: %s</u>', $intro['draw_date']); ?>
                  <?php if( !empty($intro['download_file']) ) printf('<a href="%s" download>DOWNLOAD</a>', $intro['download_file']); ?>
                  
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
    echo '<div class="hasgap"></div>';
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