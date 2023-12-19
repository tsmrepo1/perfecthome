<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ss_jaria
 */
get_header();
?>
<main class="site-content">
   <section class="pagetitle-block position-relative bg--primary bg--center bg--cover bg--no-repeat" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/pagetitle-bg.jpg)">
     <div class="container position-relative text-center">
       <h1 class="pagetitle"><?php the_title(); ?></h1>
     </div>
   </section>
   <section>
     <div class="container">
       <div class="content-box content-box--prose">
         <?php the_content(); ?>
       </div>
     </div>
   </section>
</main>
<?php
get_footer();
