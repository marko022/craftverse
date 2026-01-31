<?php
get_header();
if ( have_posts() ) :
  while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-project'); ?>>
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="project-featured-image">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>
      </header>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      
    </article>
  <?php endwhile;
else :
  echo '<p>No project found.</p>';
endif;
get_footer();
?>
