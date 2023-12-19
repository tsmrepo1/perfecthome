<?php
/**Template Name: FAQ Page
 */
get_header();
while ( have_posts() ) : the_post(); 
?>

<!-- ++++ Site Content ++++ -->
<main class="site-content">
  <section class="pagetitle-block position-relative">
    <div class="container position-relative">
      <div class="pagetitle-block__inner-container text-center">
        <h1 class="pagetitle text--dark text-capitalize fw-bold"><?php the_title(); ?></h1>
        <nav class="breadcrumb d-inline-flex align-items-center">
          <a class="breadcrumb-item" href="<?php echo home_url(); ?>">Home</a>
          <span class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></span>
        </nav>
      </div>
    </div>
  </section>

  <section class="faqs-section section--py">
    <div class="container">
      <div class="content-box has-h2--dark has-h2--uppercase mb-4 text-center">
        <h2>Frequently Asked Questions</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, et.</p>
      </div>
      <div class="row justify-content-center has-mb">
        <div class="col-12 col-md-8 col-lg-6">
          <form action="#" class="form faqs-form" autocomplete="off" novalidate>
            <div class="form__field">
              <input type="text" name="fqf_inp" class="form__input" placeholder="Search question here..." required />
              <button type="button" class="form__button--reset"><i class="fa-solid fa-xmark"></i></button>
            </div>
          </form>
        </div>
      </div>
      <h5 class="text-danger fw-bold text-center faqs-search-status d-none mb-0">Sorry, no question found.</h5>
      <div class="grid-row gap-y-6 gap-x-lg-6 gap-xxl-8 qa-grid">
      <?php
        while ( have_rows('faq_managment') ) : the_row();
      ?>
        <div class="col-span-12 col-span-lg-6 qa-col">
          <div class="qa-block border--solid border--1 border--borderColor bg--body">
            <?php if(!empty(get_sub_field('question'))){ ?>
            <div class="qa-block__header text--dark bg--light">
              <span class="qa-block__prefix">Q</span>
              <h6 class="qa-block__question"><?php echo get_sub_field('question'); ?> ?</h6>
            </div>
            <?php } ?>
            <?php if(!empty(get_sub_field('answear'))){ ?>
            <div class="qa-block__body">
              <span class="qa-block__prefix">A</span>
              <div class="content-box">
                <p><?php echo get_sub_field('answear'); ?></p>
              </div>
            </div>
             <?php } ?>
          </div>
        </div>
      <?php
        endwhile; 
      ?>       
      </div>
    </div>
  </section>
</main>
<?php endwhile; // End of the loop.
get_footer();

?>

