<?php get_header(); ?>

<main class="main">



    <?php
  // Check value exists.
  if (have_rows('components')) : ?>
    <!-- Loop through rows. -->
    <?php while (have_rows('components')) : the_row(); ?>

    <!-- Case: Hero -->
    <?php if (get_row_layout() == 'hero') : ?>
    <?php include get_theme_file_path('/components/hero.php'); ?>
    <?php endif; ?>


    <!-- End loop. -->
    <?php endwhile; ?>
    <?php endif; ?>

    

</main>


<?php get_footer(); ?>