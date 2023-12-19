<?php
/**Template Name: Contact Us Page
 */
get_header();
while ( have_posts() ) : the_post(); 
?>
<main class="site-content">
<section class="pagetitle-block position-relative bg--primary bg--center bg--cover bg--no-repeat" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/pagetitle-bg.jpg)">
  <div class="container position-relative text-center">
    <h1 class="pagetitle">Contact Us</h1>
  </div>
</section>
<?php if( get_field('google_map_address_link') ): ?>
<section class="map-section py-0">
  <div class="map-container">
    <iframe src="<?php echo the_field('google_map_address_link'); ?>" width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>
<?php endif; ?>

<section class="contact-section pt-lg-0">
  <div class="container position-relative">
    <div class="wrapper bg--body">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-4 mb-4 mb-lg-0">
          <div class="opacity-25 text-center">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="" width="" height="" class="d-inline-block" />
          </div>
          <ul class="contact-items">
            <?php if( get_field('email_address') ): ?>
            <li>
              <h6 class="text--dark fw-bold">Email</h6>
              <div class="d-flex align-items-center">
                <span class="icon flex-shrink-0 rounded-circle d-inline-flex align-items-center justify-content-center me-2"><i class="fa-solid fa-envelope"></i></span>
                <a href="mailto:<?php echo the_field('email_address'); ?>" class="link--dark cta--link"><?php echo the_field('email_address'); ?></a>
              </div>
            </li>
            <?php endif; ?>
            <?php if( get_field('contact_us_address') ): ?>
            <li>
              <h6 class="text--dark fw-bold">Address</h6>
              <div class="d-flex">
                <span class="icon flex-shrink-0 rounded-circle d-inline-flex align-items-center justify-content-center me-2"><i class="fa-solid fa-location-dot"></i></span>
                <span class="link--dark cta--link"><?php echo the_field('contact_us_address'); ?></span>
              </div>
            </li>
            <?php endif; ?>
            <?php if( get_field('phone_number') ): ?>
            <li>
              <h6 class="text--dark fw-bold">Call</h6>
              <div class="d-flex align-items-center">
                <span class="icon flex-shrink-0 rounded-circle d-inline-flex align-items-center justify-content-center me-2"><i class="fa-solid fa-phone"></i></span>
                <a href="tel:<?php echo str_replace(array(" ","-"),'',get_field('phone_number')); ?>" class="link--dark cta--link"><?php echo the_field('phone_number'); ?></a>
              </div>
            </li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="col-12 col-lg-8 pt-3 pt-lg-0">
          <div class="form-wrapper">
            <div class="content-box has-h2--primary has-h4--primary has-h2--capitalize position-relative has-mb">
              <h2>Any Question</h2>
              <h4>Write down and send us</h4>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="2e1473c" title="Contact form 1" html_class="form get-in-touch-form"]');?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="img-container d-none d-lg-block">
    <img src="<?php echo get_template_directory_uri();?>/assets/images/contact-section-bg.jpg" alt="" class="w-100 h-100 object-fit-cover" />
  </div>
</section>
</main>
<?php endwhile; // End of the loop.
get_footer();

?>

