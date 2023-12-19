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

<section class="blog-single-section">
<div class="container">
  <div class="row">
    <div class="col-12 col-lg-8 mb-4 mb-lg-0">
      <div class="post-wrapper">
        <div class="post__thumbnail ratio ratio-16x9">
          <img src="assets/images/blog-1.jpg" alt="blog title" class="w-100 h-100 object-fit-cover" width="1920" height="1080" />
          	<?php if (has_post_thumbnail( $post->ID ) ){ ?>
				<img src="<?php echo $image1[0]; ?>" alt="" class="w-100 h-100 object-fit-cover" width="1920" height="1080" />
			<?php } else{ ?> 
				<img src="<?php echo get_template_directory_uri();?>/assets/images/no-image.jpg" alt="blog title" class="w-100 h-100 object-fit-cover" width="1920" height="1080" />   
			<?php } ?>
        </div>

        <div class="post__main">
          <h2 class="post__title fw-bold text--dark"><?php the_title(); ?></h2>

          <div class="grid-row gap-y-5 gap-x-md-5 align-items-center">
            <div class="col-span-12 col-span-md-6">
              <div class="d-flex align-items-center">
                <a href="#" class="post__author d-inline-flex align-items-center justify-content-center flex-shrink-0">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/avatar.jpg" alt="author" width="80" height="80" class="w-100 h-100 object-fit-cover rounded-circle" />
                </a>
                <p class="ps-3 text--dark mb-0">By <a href="#">Post Author</a> | <span><?php echo get_the_date('jS M, Y'); ?></span></p>
              </div>
            </div>
            <div class="col-span-12 col-span-md-6 text-md-end">
              <span class="me-3 fw-semibold">Share:</span>
              <ul class="social-icons d-inline-flex w-auto">
                <li>
                  <a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                </li>
              </ul>
            </div>
          </div>

          <div class="post__content content-box content-box--prose mt-4">
            <?php the_content(); ?>
          </div>
        </div>

        <!-- <div class="post__tag-block d-sm-flex">
          <span class="me-2 mb-3 mb-sm-0 d-inline-block flex-shrink-0">Tags:</span>
          <ul class="ms-1 d-flex flex-wrap gap-3">
            <li>
              <a href="#">Tag 1</a>
            </li>
            <li>
              <a href="#">Tag 2</a>
            </li>
            <li>
              <a href="#">Tag 3</a>
            </li>
          </ul>
        </div>

        <div class="form-wrapper">
          <h4 class="text-white fw-bold mb-2">Leave a Reply</h4>
          <p>Your email address will not be published. Required fields are marked *</p>

          <form action="#" class="form post-comment-form">
            <div class="grid-row gap-y-5 gap-y-lg-6 gap-x-sm-6">
              <div class="form__field col-span-12">
                <label for="cf_email">Comment</label>
                <textarea name="pcf_message" class="form__input" placeholder="Write Your Comment..." required></textarea>
              </div>

              <div class="form__field col-span-12 col-span-sm-6">
                <label for="pcf_name">Name</label>
                <input type="text" class="form__input" name="pcf_name" placeholder="Your Name" required />
              </div>

              <div class="form__field col-span-12 col-span-sm-6">
                <label for="pcf_email">Email</label>
                <input type="email" class="form__input" name="pcf_email" placeholder="Your Email" required />
              </div>

              <div class="form__field col-span-12">
                <label class="d-flex align-items-start align-items-md-center">
                  <input type="checkbox" name="pcf_consent" class="flex-shrink-0 mt-1 mt-sm-0" />
                  <span class="ps-2">Save my name, email, and website in this browser for the next time I comment.</span>
                </label>
              </div>

              <div class="form__field col-span-12 text-end">
                <button type="submit" class="button button--primary">Post Comment</button>
              </div>
            </div>
          </form>
        </div> -->
      </div>
    </div>
    <div class="col-12 col-lg-4 pt-3 pt-lg-0">
      <aside>
        <div class="block bg--light block--search">
          <h5 class="text--dark text-capitalize fw-semibold">Search</h5>

          <form action="#" class="blog-search-form form">
            <div class="form__field">
              <input type="text" name="bsf_inp" class="form__input" placeholder="Search post here..." required />
              <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
          </form>
        </div>

        <!-- <div class="block bg--light block--categories">
          <h5 class="text--dark text-capitalize fw-semibold">Categories</h5>
          <ul>
            <li>
              <a href="#" class="link--dark fw-bold text-uppercase d-flex justify-content-between"
                ><span class="pe-3">Category Title 1</span><span class="text--primary d-inline-flex align-items-center justify-content-center flex-shrink-0"><i class="fa-solid fa-arrow-right"></i></span
              ></a>
            </li>
            <li>
              <a href="#" class="link--dark fw-bold text-uppercase d-flex justify-content-between"
                ><span class="pe-3">Category Title 2</span><span class="text--primary d-inline-flex align-items-center justify-content-center flex-shrink-0"><i class="fa-solid fa-arrow-right"></i></span
              ></a>
            </li>
            <li>
              <a href="#" class="link--dark fw-bold text-uppercase d-flex justify-content-between"
                ><span class="pe-3">Category Title 3</span><span class="text--primary d-inline-flex align-items-center justify-content-center flex-shrink-0"><i class="fa-solid fa-arrow-right"></i></span
              ></a>
            </li>
            <li>
              <a href="#" class="link--dark fw-bold text-uppercase d-flex justify-content-between"
                ><span class="pe-3">Category Title 4</span><span class="text--primary d-inline-flex align-items-center justify-content-center flex-shrink-0"><i class="fa-solid fa-arrow-right"></i></span
              ></a>
            </li>
          </ul>
        </div> -->

        <div class="block bg--light block--related-posts post-related-wrapper">
          <h5 class="text--dark text-capitalize fw-bold">Related Posts</h5>
          <ul>
			<?php 
			$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
			if( $related ) foreach( $related as $post ) {
			setup_postdata($post); 
			$image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			?>
            <li>
              <div class="blog-sm-item d-flex">
                <figure class="blog-sm-item__thumbnail flex-shrink-0 mb-0">
				<a href="<?php the_permalink(); ?>">
				<?php if($image1 != ''){ ?>
					<img src="<?php echo $image1['0']; ?>" alt="" class="w-100 h-100 object-fit-cover">
				<?php } else { ?>
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/no_image.jpg" alt="<?php the_title(); ?>" width="96" height="96" class="w-100 h-100 object-fit-cover" >
				<?php } ?>
                </figure>
                <div class="ps-3">
                  <span class="blog-sm-item__date mb-1 fw-bold"><?php echo get_the_date('jS M, Y'); ?></span>
                  <h6 class="blog-sm-item__title mb-1 fw-semibold"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="line-clamp line-clamp--2"><?php the_title(); ?></a></h6>
                  <p class="blog-sm-item__exercpt line-clamp line-clamp--2 mb-0"><?php echo wp_trim_words( get_the_content(), 18, '...' ); ?></p>
                </div>
              </div>
            </li>
			<?php 
			}
			wp_reset_postdata(); 
			?>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</div>
</section>
</main>

<?php
get_footer();
