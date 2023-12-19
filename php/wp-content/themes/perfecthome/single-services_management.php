<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package perfecthome
 */

get_header();
$image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
<main class="site-content">
<section class="pagetitle-block position-relative bg--primary bg--center bg--cover bg--no-repeat" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/pagetitle-bg.jpg)">
<div class="container position-relative text-center">
  <h1 class="pagetitle"><?php the_title(); ?></h1>
</div>
</section>

<section class="service-single-section">
<div class="container">
  <div class="row">
    <div class="col-12 col-lg-8 mb-4 mb-lg-0">
      <div class="post-wrapper">
        <div class="post__thumbnail position-relative">
		<?php if (has_post_thumbnail( $post->ID ) ){ ?>
			<img src="<?php echo $image1[0]; ?>" alt="" class="w-100 position-relative" width="1920" height="1080" />
		<?php } else{ ?> 
			<img src="<?php echo get_template_directory_uri();?>/assets/images/no-image.jpg" alt="blog title" class="w-100 position-relative" width="1920" height="1080" />   
		<?php } ?>
        </div>
        <div class="post__main">
          <h2 class="post__title fw-bold text--dark"><?php the_title(); ?></h2>
          <div class="post__content content-box content-box--prose">
            <?php the_content(); ?>
          </div>
          <div class="post__cta">
            <a href="#" class="button button--primary">Book Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4 pt-3 pt-lg-0">
      <aside>
        <div class="block block--more-items">
          <h4 class="text--dark text-capitalize fw-bold">More Services</h4>
          <ul>
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
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?> <i class="fa-solid fa-arrow-right-long"></i></a>
            </li>
            <?php $count++; } } wp_reset_postdata(); ?>
          </ul>
        </div>
        <div class="block block--has-form bg--primary">
          <h3 class="text-white fw-bold text-center">Contact Us</h3>          
          <?php echo do_shortcode('[contact-form-7 id="0b7dab5" title="Contact Us Services" html_class="form form--has-icon-field get-in-touch-form"]');?>
        </div>
      </aside>
    </div>
  </div>
</div>
</section>
</main>

<?php
get_footer();
