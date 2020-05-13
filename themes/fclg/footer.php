<?php 
  $aboutus = get_field('aboutus', 'options');
  $copyright_text = get_field('copyright_text', 'options');
  $smedias = get_field('sociale_media', 'options');
?>
<footer class="footer-wrp">
  <div class="ftr-top">
    <div class="container-md">
      <div class="row">
        <div class="col-12">
          <div class="ftr-col-main clearfix">
            <div class="ftr-col ftr-col-1">
              <h6><span><?php _e( 'HELPFUL', THEME_NAME ); ?></span></h6>
              <?php 
                $fmenuOptionsa = array( 
                    'theme_location' => 'cbv_fta_menu', 
                    'menu_class' => 'clearfix reset-list',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $fmenuOptionsa ); 
              ?>
            </div>
            <div class="ftr-col ftr-col-2"> 
              <h6><span><?php _e( 'PROFILE', THEME_NAME ); ?></span></h6>
              <?php 
                $fmenuOptionsb = array( 
                    'theme_location' => 'cbv_ftb_menu', 
                    'menu_class' => 'clearfix reset-list',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $fmenuOptionsb ); 
              ?>
            </div>
            <div class="ftr-col ftr-col-3 clearfix">
              <?php 
              if( !empty($aboutus['title']) ) printf('<h6><span>%s</span></h6>', $aboutus['title']);
              if( !empty($aboutus['description']) ) echo wpautop($aboutus['description']);
              ?>
              <div class="ftr-socail-icon clearfix">
                <?php if(!empty($smedias)): ?>
                <ul class="clearfix reset-list">
                  <?php foreach($smedias as $smedia):  ?>
                    <li>
                      <a target="_blank" href="<?php echo $smedia['url']; ?>">
                        <?php echo $smedia['icon']; ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ftr-btm">
    <div class="container-md">
      <div class="row">
        <div class="col-12">
          <div class="ftr-btm-innr clearfix">
            <div class="ftr-btm-col-1">
              <?php if( !empty( $copyright_text ) ) printf( '<span>%s</span>', $copyright_text); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>