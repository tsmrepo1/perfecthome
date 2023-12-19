<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package perfecthome
 */

get_header();
?>
<main class="site-content">
      <section class="not-found-section bg--center bg--contain bg--no-repeat" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/not-found-section-bg.png)">
        <div class="container text-center">
          <div class="content-wrapper d-flex align-items-center justify-content-center h-100">
            <div>
              <h4 class="text--dark fw-bold text-uppercase">Oops! Page Not Found</h4>
              <h1 class="heading--lg fw-bold text--dark font--base">4<span class="text--primary">0</span>4</h1>
              <h5 class="text--dark fw-bold">We are sorry. but the page you requested was not found.</h5>
              <div class="mt-5">
                <a href="<?php echo home_url(); ?>" class="button button--primary"><span class="button__inner-wrapper">Back To Home</span></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php
get_footer();
