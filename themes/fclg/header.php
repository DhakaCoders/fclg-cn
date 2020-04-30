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
              <a class="hdr-login-btn" href="#">Login</a>
              <a class="hdr-register-btn" href="#">Register</a>
            </div>
            <div class="hdr-cart-btn">
              <div class="hdr-cart-btn-inr">
                <i>
                  <img src="<?php echo THEME_URI; ?>/assets/images/cart-icon.png">
                  <span>1</span>
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
          <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/logo.png"></a>
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
                <ul class="clearfix reset-list">
                  <li><a href="#">CURRENT COMPETITIONS</a></li>
                  <li class="menu-item-has-children">
                    <a href="#">ENTRY LISTS </a>
                    <ul class="sub-menu">
                      <li><a href="#">Sub menu item 1</a></li>
                      <li><a href="#">Sub menu item 2</a></li>
                      <li><a href="#">Sub menu item 3</a></li>
                      <li><a href="#">Sub menu item 4</a></li>
                    </ul>
                  </li>
                  <li><a href="#">WINNERS</a></li>
                  <li><a href="#">FAQS</a></li>
                  <li class="current-menu-item"><a href="#">HOW IT WORKS</a></li>
                  <li><a href="#">ABOUT US</a></li>
                </ul>
              </nav>
              <div class="hdr-social">
                <ul class="reset-list">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</header>