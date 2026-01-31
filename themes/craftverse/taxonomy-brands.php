<?php
get_header();
?>

<main id="main" class="site-main">
  <div class="container">
    <?php
      $term = get_queried_object();
      if ($term):
    ?>
      <h1><?php echo esc_html($term->name); ?></h1>
      
      <?php
        if ($term->description):
          echo '<p>' . wp_kses_post($term->description) . '</p>';
        endif;
      ?>

      <?php
        $args = array(
          'post_type' => 'projects',
          'posts_per_page' => -1,
          'tax_query' => array(
            array(
              'taxonomy' => 'brands',
              'field' => 'term_id',
              'terms' => $term->term_id,
            ),
          ),
        );
        $query = new WP_Query($args);

        if ($query->have_posts()):
          echo '<div class="projects-list">';
          while ($query->have_posts()):
            $query->the_post();
            echo '<div class="project-item">';
            echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            echo '</div>';
          endwhile;
          echo '</div>';
          wp_reset_postdata();
        else:
          echo '<p>No projects found for this brand.</p>';
        endif;
      ?>
    <?php endif; ?>
  </div>
</main>

<?php
get_footer();
?>
