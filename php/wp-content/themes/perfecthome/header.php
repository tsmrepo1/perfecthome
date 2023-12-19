<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package perfecthome
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11"> 
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/vendors/bootstrap-5.3.0-dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/vendors/owl-carousel-2.3.4/owl.carousel.min.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/vendors/owl-carousel-2.3.4/owl.theme.default.min.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/vendors/Magnific-Popup-master/dist/magnific-popup.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/vendors/custom-css-grid.min.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/style.css" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header bg--body">
  <div class="site-header__top bg--primary">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 col-lg-3 d-none d-md-block">
          <p class="mb-0 text-white">
            <i class="fa-solid fa-envelope me-2 me-xl-3"></i>
            <a href="mailto:perfecthomedesign@gmail.com" class="link--light ps-1">perfecthomedesign@gmail.com</a>
          </p>
        </div>
        <?php if( get_field('contact_address', 'options') ): ?>
        <div class="col-lg-4 d-none d-lg-block">
          <p class="mb-0 text-white">
            <i class="fa-solid fa-envelope me-2 me-xl-3"></i>
            <span class="ps-1"><?php the_field('contact_address', 'options'); ?></span>
          </p>
        </div>
        <?php endif; ?>
        <?php if( get_field('phone_no', 'options') ): ?>
        <div class="col-12 col-md-6 col-lg-3 col-xxl-2 text-end text-lg-start">
          <p class="mb-0 text-white">
            <i class="fa-solid fa-envelope me-2 me-xl-3"></i>
            <a href="tel:+<?php echo str_replace(array(" ","-"),'',the_field('phone_no', 'options')); ?>" class="link--light ps-1">+<?php the_field('phone_no', 'options'); ?></a>
          </p>
        </div>
        <?php endif; ?>
        <div class="col-lg-2 col-xxl-3 d-none d-lg-block text-end">
          <ul class="social-icons social-icons--light d-inline-flex w-auto">
            <?php
             while( have_rows('social_media_link', 'options') ) : the_row(); 
            ?>
            <li>
              <a href="<?php echo get_sub_field('media_link', 'options'); ?>" target="_blank"><i class="fa-brands fa-<?php echo get_sub_field('media_name', 'options'); ?>"></i></a>
            </li>
            <?php endwhile; ?>
          </ul>
          <div class="switcher-button mb-0 ps-4">
            <input type="checkbox" name="switcher" id="switcher-input" class="switcher-input" />
            <label class="switcher-label" for="switcher-input">
              <i class="fas fa-solid fa-moon"></i>
              <span class="switcher-toggler"></span>
              <i class="fas fa-solid fa-sun"></i> 
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="site-header__bottom">
    <div class="container">
      <div class="row g-0 flex-nowrap align-items-center justify-content-between">
        <div class="d-inline-block w-auto">
          <a href="<?php echo home_url(); ?>" class="site-header__logo d-inline-block">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="" width="112" height="117" />
          </a>
        </div>
        <div class="text-end w-auto">
          <button class="site-header__button--nav-toggler d-inline-block d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#navOffcanvas" aria-controls="navOffcanvas">
            <i class="fa-solid fa-bars"></i>
          </button>
          <nav class="site-header__nav d-none d-xl-inline-flex w-auto">
            <!-- <ul>
              <li>
                <a href="about-us.html">About Us</a>
              </li>
              <li>
                <a href="build-envelope.html">Build Envelope</a>
              </li>
              <li>
                <a href="distributor-materials.html">Distributor Materials</a>
              </li>
              <li>
                <a href="audio.html">Audio</a>
              </li>
              <li>
                <a href="appliances.html">Appliances</a>
              </li>
              <li>
                <a href="design-consulting-services.html">Design & Consulting Services</a>
              </li>
              <li>
                <a href="faq.html">Faq</a>
              </li>
              <li>
                <a href="material-education.html">Material Education</a>
              </li>
            </ul> -->
			<?php
			  wp_nav_menu( array(
			  'theme_location'  => 'menu-1',
			  'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
			  'container'       => '',
			  'container_class' => '',
			  'container_id'    => '',
			  'menu_class'      => '',
			  'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
			  'walker'          => new WP_Bootstrap_Navwalker(),
			  ) );
			?>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!--- Mobile Nav --->
  <div class="offcanvas offcanvas-start bg--dark" tabindex="-1" id="navOffcanvas" aria-labelledby="navOffcanvasLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="staticBackdropLabel">&nbsp;</h5>
      <button type="button" class="btn-close filter--invert" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
      <nav class="site-header__nav mb-4">
        <ul>
          <li>
            <a href="about-us.html">About Us</a>
          </li>
          <li>
            <a href="build-envelope.html">Build Envelope</a>
          </li>
          <li>
            <a href="distributor-materials.html">Distributor Materials</a>
          </li>
          <li>
            <a href="audio.html">Audio</a>
          </li>
          <li>
            <a href="appliances.html">Appliances</a>
          </li>
          <li>
            <a href="design-consulting-services.html">Design & Consulting Services</a>
          </li>
          <li>
            <a href="faq.html">Faq</a>
          </li>
          <li>
            <a href="material-education.html">Material Education</a>
          </li>
        </ul>
      </nav>
      <div class="ms--20 me--20">
        <p class="text-white mb-3">
          <i class="fa-solid fa-envelope me-2 me-xl-3"></i>
          <a href="mailto:perfecthomedesign@gmail.com" class="link--light ps-1">perfecthomedesign@gmail.com</a>
        </p>
        <p class="mb-3 text-white">
          <i class="fa-solid fa-envelope me-2 me-xl-3"></i>
          <span class="ps-1">70/1 Lorem ipsum dolor sitamet, consectetur</span>
        </p>
        <p class="mb-3 text-white">
          <i class="fa-solid fa-envelope me-2 me-xl-3"></i>
          <a href="tel:+(00) 3652 658 698" class="link--light ps-1">+(00) 3652 658 698</a>
        </p>
        <ul class="social-icons social-icons--light d-inline-flex w-auto">
          <li>
            <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
          </li>
          <li>
            <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
          </li>
          <li>
            <a href="#" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a>
          </li>
          <li>
            <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
