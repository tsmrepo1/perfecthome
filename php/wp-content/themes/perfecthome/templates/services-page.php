<?php
/**Template Name: Services Page
 */
get_header();
while ( have_posts() ) : the_post(); 
?>
<main class="site-content">
      <section class="pagetitle-block position-relative bg--primary bg--center bg--cover bg--no-repeat" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/pagetitle-bg.jpg)">
        <div class="container position-relative text-center">
          <h1 class="pagetitle">List of Services</h1>
        </div>
      </section>

      <section class="services-archive-section">
        <div class="container">
          <div class="grid grid-cols-sm-2 grid-cols-lg-3 gap-y-6 gap-sm-5 gap-lg-6 gap-xxl-7 gap-3xl-8">          

            <?php
               $args = array (
               'post_type' => 'services_management',
               'post_status' => 'publish',
               'order' => 'ASC',
               'posts_per_page'=>-1
               );
               $services = new WP_Query( $args );
               if ( $services->have_posts() ) {
               $count = 1;
               while ( $services->have_posts() ) {
               $services->the_post();
               $services_image = wp_get_attachment_image_src( get_post_thumbnail_id( $services->ID ), 'full' );
            ?>

            <div class="service-card">
              <div class="service-card__header">
                <figure class="mb-0 has-effect--tilt-once">
                  <a href="<?php the_permalink(); ?>">
                  <?php if($services_image != ''){ ?>
                  <img src="<?php echo $services_image['0']; ?>" alt="<?php the_title(); ?>" width="638" height="591">
                  <?php } else { ?>
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/no_image.jpg" alt="<?php the_title(); ?>" width="638" height="591" >
                  <?php } ?>
                  </a>
                </figure>
              </div>
              <div class="service-card__body bg-dark bg-opacity-75">
                <div class="service-card__content-box text-white">
                  <h3 class="text-uppercase"><?php the_title(); ?></h3>
                  <p class="line-clamp line-clamp--2"><?php echo wp_trim_words( get_the_content(), 18, '...' ); ?></p>
                </div>
                <div class="service-card__cta-box">
                  <a href="<?php the_permalink(); ?>" title="Read More" class="d-inline-flex align-items-center justify-content-center border border-white rounded-circle">
                    <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
            <?php $count++; } } wp_reset_postdata(); ?>
          </div>
        </div>
      </section>
    </main>
<?php endwhile; // End of the loop.
get_footer();

?>

