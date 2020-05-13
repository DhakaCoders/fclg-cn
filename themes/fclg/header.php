<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head> 
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?> 


  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->	


  <!-- Milon -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
  $logoObj = get_field('logo_header', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
  $smedias = get_field('header_media', 'options');
?>
<div class="bdoverlay"></div>
<header class="header">
  <div class="header-inr clearfix">
    <div class="hdr-rgt">
      <div class="hdr-topbar">
        <div class="hdr-topbar-inr">
          <div class="hdr-rating">
            <span>Rated</span>
            <ul class="reset-list">
              <li><a href="#"><i class="fas fa-star"></i></a></li>
              <li><a href="#"><i class="fas fa-star"></i></a></li>
              <li><a href="#"><i class="fas fa-star"></i></a></li>
              <li><a href="#"><i class="fas fa-star"></i></a></li>
              <li><a href="#"><i class="fas fa-star"></i></a></li>
            </ul>
            <span>by our <u>Customers</u></span>
          </div>
          <div class="hdr-topba-rgt">
            <div class="hdr-login-register-btns">
              <?php 
              if( is_user_logged_in() ){
                foreach ( wc_get_account_menu_items() as $endpoint => $label ) : 
                  if($endpoint == 'customer-logout'):
              ?>
              <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">Log out</a>
              <?php endif; endforeach; 
              } else {
              ?>
              <a class="hdr-login-btn" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">Login</a>
              <?php } ?>
              <a class="hdr-register-btn" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">Register</a>
            </div>
            <div class="hdr-cart-btn">
              <div class="hdr-cart-btn-inr">
                <i>
                  <img src="<?php echo THEME_URI; ?>/assets/images/cart-icon.png">
                  <?php if(WC()->cart->get_cart_contents_count() > 0) {
                      echo sprintf ( '<span>%d</span>', WC()->cart->get_cart_contents_count() );
                    } else {
                      echo sprintf ( '<span>%d</span>', 0 );
                    }
                  ?>
                </i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hdr-navbar-bdr-cntlr">
        <div class="hdr-rating">
          <span>Rated</span>
          <ul class="reset-list">
            <li><a href="#"><i class="fas fa-star"></i></a></li>
            <li><a href="#"><i class="fas fa-star"></i></a></li>
            <li><a href="#"><i class="fas fa-star"></i></a></li>
            <li><a href="#"><i class="fas fa-star"></i></a></li>
            <li><a href="#"><i class="fas fa-star"></i></a></li>
          </ul>
          <span>by our <u>Customers</u></span>
        </div>
        <div class="logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <?php echo $logo_tag; ?>
          </a>
        </div>
        <div class="hdr-navbar">
          <div class="hdr-humberger">
            <div class="line-icon show-md active-collapse">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <strong class="menu-txt show-md">Menu</strong>
          </div>
          <div class="main-nav-cntlr">
            <div class="main-nav-cntlr-inr">
              <nav class="main-nav">
                <div class="closebtn show-md">
                  <span></span>
                  <span></span>
                </div>
                <?php 
                  $menuOptionsb = array( 
                      'theme_location' => 'cbv_main_menu', 
                      'menu_class' => 'clearfix reset-list',
                      'container' => '',
                      'container_class' => ''
                    );
                  wp_nav_menu( $menuOptionsb ); 
                ?>  
              </nav>
              <div class="hdr-social">
                <?php if(!empty($smedias)): ?>
                <ul class="reset-list">
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
</header>