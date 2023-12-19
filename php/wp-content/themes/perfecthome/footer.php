<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package perfecthome
 */
?>
<footer class="site-footer">
  <div class="site-footer__top bg--dark">
    <div class="container">
      <div class="grid-row gap-y-10 gap-x-md-6 gap-x-lg-8">
        <div class="col-span-12 col-span-sm-6 col-span-lg-12 col-span-xxl-4 text-lg-center">
          <div class="mb-4">
            <a href="<?php echo home_url(); ?>" class="site-footer__logo d-inline-block">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/footer-logo.png" alt="footer logo" width="175" height="184" class="d-inline-block" />
            </a>
          </div>
          <ul class="social-icons social-icons--light d-inline-flex w-auto pt-1 mb-4">
            <?php
             while( have_rows('social_media_link', 'options') ) : the_row(); 
            ?>
            <li>
              <a href="<?php echo get_sub_field('media_link', 'options'); ?>" target="_blank"><i class="fa-brands fa-<?php echo get_sub_field('media_name', 'options'); ?>"></i></a>
            </li>
            <?php endwhile; ?>
          </ul>
          <p class="text-white mb-2">Switch Theme:</p>
          <div class="switcher-button mb-0 d-inline-flex justify-content-xl-center">
            <input type="checkbox" name="switcher" id="switcher-input" class="switcher-input" />
            <label class="switcher-label" for="switcher-input">
              <i class="fas fa-solid fa-moon"></i>
              <span class="switcher-toggler"></span>
              <i class="fas fa-solid fa-sun"></i>
            </label>
          </div>
        </div>
        <div class="col-span-12 col-span-sm-6 col-span-lg-4 col-span-xxl-2">
          <ul class="site-footer__contact-items">
            <?php if( get_field('footer_email_address', 'options') ): ?>
            <li class="d-inline-flex align-items-center">
              <span class="item__icon"><i class="fa-solid fa-phone"></i></span>
              <div class="item__body">
                <a href="mailto:<?php the_field('footer_email_address', 'options'); ?>" class="link--light fw-medium"><?php the_field('footer_email_address', 'options'); ?></a>
              </div>
            </li>
            <?php endif; ?>
            <?php if( get_field('footer_contact_address', 'options') ): ?>
            <li class="d-inline-flex align-items-center">
              <span class="item__icon"><i class="fa-solid fa-location-dot"></i></span>
              <div class="item__body">
                <p class="mb-0 text-white fw-medium"><?php the_field('footer_contact_address', 'options'); ?></p>
              </div>
            </li>
            <?php endif; ?>
            <?php if( get_field('footer_phone_no', 'options') ): ?>
            <li class="d-inline-flex align-items-center">
              <span class="item__icon"><i class="fa-solid fa-envelope"></i></span>
              <div class="item__body">
                <a href="mailto:+<?php echo str_replace(array(" ","-"),'',the_field('footer_phone_no', 'options')); ?>" class="link--light fw-medium">+<?php the_field('footer_phone_no', 'options'); ?></a>
              </div>
            </li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="col-span-6 col-span-lg-2 cols-span-xxl-2">
          <nav>
            <!-- <ul>
              <li>
                <a href="index.html">Home</a>
              </li>
              <li>
                <a href="#">Why Perfect Home</a>
              </li>
              <li>
                <a href="service-single.html">Design</a>
              </li>
              <li>
                <a href="services.html">Services</a>
              </li>
              <li>
                <a href="contact-us.html">Contact Us</a>
              </li>
            </ul> -->
            <?php
            wp_nav_menu(
            array(
            "menu"         => "Footer Menu Left",
            "menu_class"   => "",
            "container"    => "ul",
            )
            );
            ?>
          </nav>
        </div>
        <div class="col-span-6 col-span-lg-3 col-span-xxl-2 ps-4 ps-xl-5 ps-xxl-0">
          <nav>
            <?php
            wp_nav_menu(
            array(
            "menu"         => "Footer Menu Right",
            "menu_class"   => "",
            "container"    => "ul",
            )
            );
            ?>
          </nav>
        </div>
        <div class="col-span-6 col-span-lg-3 col-span-xxl-2">
          <nav>
            <?php
            wp_nav_menu(
            array(
            "menu"         => "Footer Menu Center",
            "menu_class"   => "",
            "container"    => "ul",
            )
            );
            ?>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="site-footer__bottom bg--primaryShade py-3">
    <div class="container">
      <div class="grid-row gap-y-3 gap-x-lg-6">
        <div class="col-span-12 col-span-lg-6 text-center text-lg-start">
          <nav>
            <?php
            wp_nav_menu(
            array(
            "menu"         => "Footer menu below",
            "menu_class"   => "",
            "container"    => "ul",
            )
            );
            ?>
          </nav>
        </div>
        <div class="col-span-12 col-span-lg-6 text-center text-lg-end">
          <p class="mb-0 text-white">©moniqejavierdesign&build | All Rights Reserved</p>
        </div>
      </div>
    </div>
  </div>
  <button class="button--scroll-to-top">
    <i class="fa-solid fa-arrow-up"></i>
  </button>
</footer>
<script src="<?php echo get_template_directory_uri();?>/assets/vendors/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/vendors/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/2d537fef4a.js" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/vendors/owl-carousel-2.3.4/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/vendors/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/script.js"></script>
<?php wp_footer(); ?>
</body>
</html>
