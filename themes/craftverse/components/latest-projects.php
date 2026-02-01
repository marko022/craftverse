<?php
$latest_projects = new WP_Query([
  'post_type'      => 'projects',
  'posts_per_page' => 4,
  'post_status'    => 'publish',
  'orderby'        => 'modified',
  'order'          => 'DESC',
]);
?>

<section class="latest-projects">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="latest-projects__wrap">
          <div class="latest-projects__title-wrap">
            <h2 class="latest-projects__title">Latest Projects</h2>
            <a href="<?php echo esc_url(get_post_type_archive_link('projects')); ?>" class="btn">View All Projects</a>
          </div>
          <div class="latest-projects__list">
            <?php if ($latest_projects->have_posts()): ?>
              <?php while ($latest_projects->have_posts()): $latest_projects->the_post(); ?>
                <article class="latest-projects__item">
                  <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>" class="latest-projects__image-link">
                      <div class="latest-projects__item-background">
                        <?php the_post_thumbnail('medium', ['class' => 'latest-projects__image']); ?>
                      </div>

                      <div class="latest-projects__item-content">
                        <h4 class="latest-projects__item-title"><?php the_title(); ?></h4>

                        <?php 
                          $brands = get_the_terms(get_the_ID(), 'brands');
                          if ($brands && !is_wp_error($brands)): 
                        ?>
                          <div class="latest-projects__brand">
                            <?php foreach ($brands as $brand): 
                              $brand_link = get_term_link($brand);
                              if (!is_wp_error($brand_link)): ?>
                                <a href="<?= esc_url($brand_link); ?>" class="latest-projects__brand-item"><?= esc_html($brand->name); ?></a>
                              <?php else: ?>
                                <span class="latest-projects__brand-item"><?= esc_html($brand->name); ?></span>
                              <?php endif;
                            endforeach; ?>
                          </div>
                        <?php endif; ?>

                        <?php if (has_excerpt()): ?>
                          <div class="latest-projects__excerpt">
                            <?php the_excerpt(); ?>
                          </div>
                        <?php endif; ?>
                      </div>
                    </a>
                  <?php endif; ?>
                </article>
              <?php endwhile; wp_reset_postdata(); ?>
            <?php else: ?>
              <p>No projects found.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
