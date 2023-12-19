<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package National_Achiever
 */

get_header();
?>
<main class="site-content">
<section class="pagetitle-block position-relative bg--primary bg--center bg--cover bg--no-repeat" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/pagetitle-bg.jpg)">
  <div class="container position-relative text-center">
    <h1 class="pagetitle"><?php the_title(); ?></h1>
  </div>
</section>

<section class="blog-archive-section">
  <div class="container">
    <div class="grid grid-cols-1 grid-cols-sm-2 grid-cols-lg-3 grid-cols-xl-3 gap-y-10 gap-x-sm-6 gap-y-lg-12 gap-y-xl-16 gap-x-xxl-7 gap-x-3xl-8 gap-y-3xl-20 pt-3 has-mb"> 
      <?php
       $args = array (
       'post_type'          => 'post',
       'post_status'        => 'publish',
       'order'              => 'ASC',
       'posts_per_page'     =>  -1
       );
       $banner = new WP_Query( $args );
       if ( $banner->have_posts() ) {
       while ( $banner->have_posts() ) {
       $banner->the_post();
       $image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
       $post_id = get_the_ID(); // or use the post id if you already have it
       $category_object = get_the_category($post_id);
       $category_name = $category_object[0]->name;
      ?>

      <article class="blog-card">
        <div class="blog-card__header position-relative">
          <figure class="mb-0 has-effect--tilt-once">
            <a href="<?php the_permalink(); ?>">
            <?php if($image1 != ''){ ?>
            <img src="<?php echo $image1['0']; ?>" alt="" class="w-100 h-100 object-fit-cover" width="430" height="350">
            <?php } else { ?>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/no_image.jpg" alt="" class="w-100 h-100 object-fit-cover" width="430" height="350" >
            <?php } ?>
            </a>
          </figure>
          <div class="blog-card__date text-uppercase text-center bg--body text--dark text--primary d-inline-block"><span><?php echo get_the_date('jS M, Y'); ?></span></div>
        </div>
        <div class="blog-card__body">
          <h4 class="blog-card__title fw-semibold"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="line-clamp line-clamp--2"><?php the_title(); ?></a></h4>
          <p class="blog-card__exercpt line-clamp line-clamp--2"><?php echo wp_trim_words( get_the_content(), 18, '...' ); ?></p>
          <div class="blog-card__cta">
            <a href="<?php the_permalink(); ?>" class="d-inline-flex align-items-center justify-content-center rounded-circle"><i class="fa-solid fa-plus"></i></a>
          </div>
        </div>
      </article>

      <?php 
       }
       } else {
       ?>
       <?php  echo __( 'No Blog Available' );
       } wp_reset_postdata(); 
      ?>
    </div>
    <div class="cta-box text-center">
      <button class="button button--primary">Load More</button>
    </div>
  </div>
</section>
</main>
<?php
get_footer();
