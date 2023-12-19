<?php
/**Template Name: About Us Page
 */
get_header();
while ( have_posts() ) : the_post(); 
?>
<main class="site-content">
    <section class="pagetitle-block position-relative bg--primary bg--center bg--cover bg--no-repeat" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/pagetitle-bg.jpg)">
      <div class="container position-relative text-center">
        <h1 class="pagetitle">About Us</h1>
      </div>
    </section> 

    <section class="who-we-are-section">
      <div class="container position-relative">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 mb-4 mb-lg-0">
            <div class="img-container position-relative">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/about-us_03-min.jpg" alt="" width="698" height="484" />
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="content-box has-h2--primary has-h2--uppercase position-relative">
              <h2>Who We Are</h2>
              <p>Welcome to Perfect Home, your premier destination for the distribution of innovative building materials and the creation of climate-responsive homes in an era of rapid climate change. As a leading curator in the industry, we are dedicated to sourcing and providing cutting-edge materials that redefine sustainable construction practices.</p>
              <p>At Perfect Home, we understand that building for the future means considering the impact of climate change. Our team of experts specializes in designing homes tailored to climate zones, ensuring that your living spaces are optimized for maximum comfort, energy efficiency, and resilience in the face of evolving environmental challenges.</p>
              <p>As a curator of innovative building materials, we take pride in offering a comprehensive selection of products that embody the latest advancements in sustainable and resilient construction. From high-performance insulation systems to eco-friendly roofing materials and energy-efficient windows, our carefully curated portfolio ensures that your project benefits from the most advanced solutions available.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php if( get_field('some_words_from') == 'Yes' ): ?>

    <section class="founder-section bg--primary">
      <div class="container position-relative">
        <div class="row">
          <div class="col-12 col-md-9 content-col">
            <?php if( get_field('some_words_from_title') ): ?>
            <div class="content-box has-h4--white has-h2--white has-h2--uppercase has-mb">
              <?php echo the_field('some_words_from_title'); ?>
            </div>
            <?php endif; ?>

            <div class="content-wrapper">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/quote-icon-2.png" alt="" width="70" height="48" class="mb-4" />
              <?php if( get_field('some_words_from_content') ): ?>
              <div class="content-box text-white pt-2">
                <?php echo the_field('some_words_from_content'); ?>
              </div>
              <?php endif; ?>
              <div class="text-end mt-4 mb-2">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/quote-icon-2.png" alt="" width="70" height="48" class="quote-icon-end" />
              </div>

              <div class="founder-profile">
                <?php if( get_field('signature_image') ): ?>
                <img src="<?php echo the_field('signature_image'); ?>" alt="" />
                <?php endif; ?>
                <?php if( get_field('member_role') ): ?>
                <h6 class="mb-0 text-uppercase fw-bold text-white"><?php echo the_field('member_role'); ?></h6>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php if( get_field('founder_image') ): ?>
          <div class="col-12 col-md-3 text-center">
            <img src="<?php echo the_field('founder_image'); ?>" alt="" width="" height="" class="col-img" />
          </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
<?php endif; ?>


    <?php if( get_field('meet_our_team') == 'Yes' ): ?>
    <section class="team-section">
      <div class="container">
        <div class="content-box has-h2--uppercase has-h2--primary text-center has-mb">
          <h2>Meet Our Team</h2>
        </div>

        <div class="grid grid-cols-sm-2 grid-cols-lg-4 gap-y-5 gap-sm-4 gap-lg-5 gap-xl-6 gap-xxl-7 gap-3xl-8">

          <?php
            while( have_rows('meet_our_team_managment') ) : the_row(); 
          ?>

          <div class="team-card">
            <div class="team-card__header position-relative">
              <?php if(!empty(get_sub_field('member_image'))){ ?>
              <figure>
                <a href="#" class="w-100 h-100 d-block">
                  <img src="<?php echo get_sub_field('member_image'); ?>" alt="" width="330" height="364" class="w-100 h-100 object-fit-cover">
                </a>
              </figure>
              <?php } ?>
              <ul class="social-icons social-icons--light d-flex justify-content-center">
                <?php
                    while( have_rows('meet_our_team_social_media_link') ) : the_row(); 
                  ?>
                <li>
                  <a href="<?php echo get_sub_field('social_media_link'); ?>" target="_blank"><i class="fa-brands fa-<?php echo get_sub_field('social_media_name'); ?>"></i></a>
                </li>
                 <?php endwhile; ?>
              </ul>
            </div>
            <div class="team-card__body d-flex justify-content-between">
              <div class="pe-2 pe-md-3">
                <h6 class="mb-0 fw-bold text-uppercase"><?php echo get_sub_field('meet_our_team_name'); ?></h6>
                <p class="mb-0"><?php echo get_sub_field('meet_our_team_department'); ?></p>
              </div>

              <a href="#" title="Read More" class="d-inline-flex align-items-center justify-content-center flex-shrink-0">
                <i class="fa-solid fa-chevron-right"></i>
              </a>
            </div>
          </div>
          <?php endwhile; ?>
          
        </div>
      </div>
    </section>

    <?php endif; ?>


  <?php if( get_field('why_choose_us') == 'Yes' ): ?>
    <?php if( get_field('why_choose_us_image') ): ?>
    <section class="why-choose-section bg--light bg--center bg--cover bg--no-repeat" style="background-image: url(<?php echo the_field('why_choose_us_image'); ?>)">
    <?php endif; ?>
      <div class="container">
        <div class="row">
          <?php if( get_field('why_choose_us_content') ): ?>
          <div class="col-12 col-lg-7 col-xl-6">
            <div class="content-box has-h2--primary has-h2--uppercase position-relative">
              <?php echo the_field('why_choose_us_content'); ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

    <section class="testimonial-section bg--light">
      <div class="container">
        <div class="content-box has-h2--capitalize has-mb text-center">
          <h2>What Our Clients Says</h2>
        </div>

        <div class="owl-carousel owl-theme testimonial-carousel has-stage-outer-pb">


        <?php
          while( have_rows('what_our_clients_says', 8) ) : the_row(); 
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
             <?php if(!empty(get_sub_field('testimonial_content', 8))){ ?>
             <div class="testimonial-item__body content-box">
               <?php echo get_sub_field('testimonial_content', 8); ?>
             </div>
            <?php } ?>
             <div class="testimonial-item__footer d-flex align-items-center">
               <div class="testimonial-item__thumbnail rounded-circle d-inline-flex align-items-center justify-content-center">
                <?php if(!empty(get_sub_field('testimonial_image', 8))){ ?>
                 <img src="<?php echo get_sub_field('testimonial_image', 8); ?>" alt="" width="112" height="112" class="object-fit-cover" />
                 <?php } ?>
               </div>
               <?php if(!empty(get_sub_field('client_name', 8))){ ?>
               <h4 class="text--primary mb-0 fw-medium"><?php echo get_sub_field('client_name', 8); ?></h4>
               <?php } ?>
             </div>
           </div>
         </div>
        <?php endwhile; ?>
        </div>
      </div>
    </section>
  </main>
<?php endwhile; // End of the loop.
get_footer();
?>

