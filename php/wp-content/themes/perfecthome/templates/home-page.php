<?php
/**Template Name: Home Page
 * The template for displaying all single posts
 *
 *  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
get_header();
while ( have_posts() ) : the_post(); ?>
<main class="site-content">
   <section class="hero-section position-relative py-0">
     <div class="owl-carousel owl-theme hero-carousel has-nav-vertical-middle">

      <?php
        while( have_rows('banner_managment') ) : the_row(); 
      ?>
      <?php if(!empty(get_sub_field('banner_image'))){ ?>
       <div class="item bg--secondary bg--center bg--cover bg--no-repeat" style="background-image: url(<?php echo get_sub_field('banner_image'); ?>)">
      <?php } ?>
         <div class="container h-100 position-relative">
           <div class="row align-items-center justify-content-center justify-content-lg-start h-100">
             <div class="col-12 col-lg-7 col-xl-6 col-xxl-5">
               <div class="content-wrapper text-center position-relative">
                 <div class="content-box has-h1--capitalize has-h1--white has-h3--white has-h3--uppercase text-center text-lg-start">
                  <?php if(!empty(get_sub_field('banner_caption_1'))){ ?>
                    <h3><?php echo get_sub_field('banner_caption_1'); ?></h3>
                  <?php } ?>
                  <?php if(!empty(get_sub_field('banner_caption_2'))){ ?>
                   <h1><?php echo get_sub_field('banner_caption_2'); ?></h1>
                  <?php } ?>
                 </div>
                 <?php if(!empty(get_sub_field('banner_page_link'))){ ?>
                 <div class="content-cta text-center text-lg-start">
                   <a href="<?php echo get_sub_field('banner_page_link'); ?>" class="button button--primary"><span class="button__inner-wrapper">Discover Now</span></a>
                 </div>
                 <?php } ?>
                 <span class="line-1">&nbsp;</span>
                 <span class="line-2">&nbsp;</span>
               </div>
             </div>
           </div>
         </div>
       </div>

       <?php endwhile; ?>


     </div>
   </section>
   <?php if( get_field('about_us_section') == 'Yes' ): ?>
   <section class="home-about-section">
     <div class="container position-relative">
       <div class="grid-row gap-y-10 gap-x-lg-6 gap-x-xxl-7 gap-x-3xl-8">
        <?php if( get_field('about_us_image') ): ?>
         <div class="col-span-12 col-span-lg-6 col-span-3xl-7">
           <img src="<?php echo the_field('about_us_image'); ?>" alt="" width="810" height="483" class="h-100 object-fit-cover" />
         </div>
         <?php endif; ?>
         <?php if( get_field('about_us_content') ): ?>
         <div class="col-span-12 col-span-lg-6 col-span-3xl-5">
           <div class="content-box has-h2--has-mb has-h2--primary has-mb">
             <?php echo the_field('about_us_content'); ?>
           </div>
           <div class="cta-box">
             <a href="<?php echo the_field('about_us_page_link'); ?>" class="button button--primary">Read More</a>
           </div>
         </div>
         <?php endif; ?>
       </div>
     </div>
   </section>
   <?php endif; ?>
   <?php if( get_field('high_performance') == 'Yes' ): ?>
   <section class="site-highlight-section bg--primary">
     <div class="container">
       <div class="grid-row gap-y-10 gap-x-lg-6 gap-x-xxl-7 gap-x-3xl-8">
         <div class="col-span-12 col-span-lg-7 content-col">
          <?php if( get_field('high_performance_content') ): ?>
           <div class="content-box has-h3--white has-h4--white text-center has-mb">
             <?php echo the_field('high_performance_content'); ?>
           </div>
           <?php endif; ?>
           <div class="grid grid-cols-2 grid-cols-sm-3 gap-3 gap-sm-4 gap-lg-5 gap-xl-6 gap-3xl-7">

            <?php
              while( have_rows('high_performance_mangment') ) : the_row(); 
            ?>            
             <div class="block bg--primaryShade text-center">
              <?php if(!empty(get_sub_field('high_performance_image'))){ ?>
               <figure>
                 <img src="<?php echo get_sub_field('high_performance_image'); ?>" alt="" width="64" height="64" class="d-inline-block" />
               </figure>
               <?php } ?>
               <?php if(!empty(get_sub_field('high_performance_title'))){ ?>
               <div class="content-box text-white">
                 <p><?php echo get_sub_field('high_performance_title'); ?></p>
               </div>
               <?php } ?>
             </div>
             <?php endwhile; ?>             
           </div>
         </div>

         <div class="col-span-12 col-span-lg-5">
           <div class="img-container">
             <img src="<?php echo get_template_directory_uri();?>/assets/images/site-highlights-col-img.jpg" alt="" width="" height="" class="w-100 h-100 object-fit-cover" />
           </div>
         </div>
       </div>
     </div>
   </section>
   <?php endif; ?>

   <section class="our-services-section pb-0 bg--light">
     <div class="container">
       <div class="content-box has-h2--primary has-mb text-center">
         <h2>Our Services</h2>
       </div>
     </div>

     <div class="owl-carousel owl-theme services-carousel">
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
       <div class="item">
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
               <p class="line-clamp line-clamp--3"><?php echo wp_trim_words( get_the_content(), 18, '...' ); ?></p>
             </div>
             <div class="service-card__cta-box">
               <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-inline-flex align-items-center justify-content-center border border-white rounded-circle">
                 <i class="fa-solid fa-arrow-right"></i>
               </a>
             </div>
           </div>
         </div>
       </div>

      <?php $count++; } } wp_reset_postdata(); ?>

       
     </div>
   </section>

   <?php if( get_field('partners_&_investors') == 'Yes' ): ?>

   <section class="partners-section bg--light">
     <div class="container">
       <div class="content-box has-h2--capitalize has-h2--primary has-mb text-center">
         <h2>Partners & Investors</h2>
       </div>

       <div class="owl-carousel owl-theme partners-carousel has-stage-outer-pb">
        <?php
          while( have_rows('partners_investors_logo') ) : the_row(); 
        ?>
        <?php if(!empty(get_sub_field('partners_logo'))){ ?>
         <div class="item">
           <img src="<?php echo get_sub_field('partners_logo'); ?>" alt="" width="273" height="125" />
         </div>
         <?php } ?>
        <?php endwhile; ?>
       </div>
     </div>
   </section>
   <?php endif; ?>

   <section class="schedule-booking-section bg--light bg--center bg--cover bg--no-repeat" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/schedule-section-bg.jpg)">
     <div class="container">
       <div class="grid-row align-items-center gap-y-10 gap-x-lg-6">
         <div class="col-span-12 col-span-lg-6 col-span-3xl-5">
           <div class="content-box has-h2--primary has-h2--uppercase">
             <h3>Schedule A Consultaion</h3>
             <h2>From Perfect home</h2>
           </div>
         </div>
         <div class="col-span-12 col-span-lg-6 col-span-3xl-7">
           <img src="<?php echo get_template_directory_uri();?>/assets/images/index1_14.jpg" alt="" />
         </div>
       </div>
     </div>
   </section>

   <section class="testimonial-section bg--light">
     <div class="container">
       <div class="content-box has-h2--capitalize has-mb text-center">
         <h2>What Our Clients Says</h2>
       </div>

       <div class="owl-carousel owl-theme testimonial-carousel has-stage-outer-pb">

        <?php
          while( have_rows('what_our_clients_says') ) : the_row(); 
        ?>
         <div class="item">
           <div class="testimonial-item rounded--base">
             <div class="testimonial-item__header bg--primary d-flex justify-content-between">
               <div class="reviews text-white w-100 pt-2 pt-md-0">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
               </div>

               <img src="<?php echo get_template_directory_uri();?>/assets/images/quote-icon.png" alt="" width="42" height="29" class="quote-icon" />
             </div>
             <?php if(!empty(get_sub_field('testimonial_content'))){ ?>
             <div class="testimonial-item__body content-box">
               <?php echo get_sub_field('testimonial_content'); ?>
             </div>
            <?php } ?>
             <div class="testimonial-item__footer d-flex align-items-center">
               <div class="testimonial-item__thumbnail rounded-circle d-inline-flex align-items-center justify-content-center">
                <?php if(!empty(get_sub_field('testimonial_image'))){ ?>
                 <img src="<?php echo get_sub_field('testimonial_image'); ?>" alt="" width="112" height="112" class="object-fit-cover" />
                 <?php } ?>
               </div>
               <?php if(!empty(get_sub_field('client_name'))){ ?>
               <h4 class="text--primary mb-0 fw-medium"><?php echo get_sub_field('client_name'); ?></h4>
               <?php } ?>
             </div>
           </div>
         </div>
        <?php endwhile; ?>

         
       </div>
     </div>
   </section>
<?php if( get_field('discovery_session') == 'Yes' ): ?>
<section class="cta-section bg--dark bg--center bg--cover bg--no-repeat" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/cta-section-bg.jpg)">
 <div class="container text-center">
    <?php if( get_field('discovery_session_content') ): ?>
    <div class="content-box has-h2--white has-h4--white mb--40">
     <?php echo the_field('discovery_session_content'); ?>
    </div>
    <?php endif; ?>
   <div class="cta-box">
     <a href="#" class="button button--primaryShade">Book Now</a>
   </div>
 </div>
</section>
<?php endif; ?>

   <section class="blog-section">
     <div class="container">
       <div class="content-box has-h2--capitalize has-mb text-center">
         <h2>Our Blog</h2>
       </div>
       <div class="grid grid-cols-1 grid-cols-sm-2 grid-cols-lg-3 grid-cols-xl-3 gap-y-10 gap-x-sm-6 gap-y-lg-12 gap-y-xl-16 gap-x-xxl-7 gap-x-3xl-8 gap-y-3xl-20 pt-3 has-mb">
         <?php
       $args = array (
       'post_type'          => 'post',
       'post_status'        => 'publish',
       'order'              => 'ASC',
       'posts_per_page'     =>  3
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
         <a href="#" class="button button--primaryShade">View All</a>
       </div>
     </div>
   </section>

   <section class="get-in-touch-section bg--light bg--center bg--cover bg--no-repeat d-none" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/get-in-touch-section-bg.jpg)">
     <div class="container position-relative">
       <div class="row">
         <div class="col-12 col-lg-7 col-xl-6 content-col">
           <div class="content-box has-h2--uppercase has-mb text-center text-lg-start">
             <h2>our expert team to discuss your needs</h2>
           </div>

           <div class="form-wrapper">
             <form action="#" class="form get-in-touch-form">
               <div class="grid-row gap-y-5 gap-md-6 gap-xl-7 gap-xxl-8 gap-3xl-10">
                 <div class="form__field col-span-12 col-span-md-6">
                   <input type="text" name="gitf_name" class="form__input" placeholder="Name*" required="" />
                 </div>

                 <div class="form__field col-span-12 col-span-md-6">
                   <input type="tel" name="gitf_phone" class="form__input" placeholder="Phone*" required="" />
                 </div>

                 <div class="form__field col-span-12 col-span-md-6">
                   <input type="email" name="gitf_email" class="form__input" placeholder="Email*" required="" />
                 </div>

                 <div class="form__field col-span-12 col-span-md-6">
                   <input type="text" name="gitf_address" class="form__input" placeholder="Address*" required="" />
                 </div>

                 <div class="form__field col-span-12">
                   <textarea name="gitf_message" class="form__input" placeholder="Message(optional)"></textarea>
                 </div>

                 <div class="form__field col-span-12 text-center text-lg-start">
                   <button type="submit" class="button button--primaryShade">Submit</button>
                 </div>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </section>
 </main>
<?php endwhile; 
get_footer();
?>


