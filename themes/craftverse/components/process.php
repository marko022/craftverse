<?php
/**
 * Process Component
 */

$title = get_sub_field('title');
$process_items = get_sub_field('process_items');
?>

<section class="process">
  <div class="container-fluid full-width">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="process__wrap">
          <?php if ($title): ?>
            <h2 class="process__title fade-in"><?php echo esc_html($title); ?></h2>
          <?php endif; ?>

          <?php if ($process_items): ?>
            <div class="process__list">
              <?php foreach ($process_items as $index => $item): 
                $text = $item['text'];
                $image = $item['image'];
                $is_even = ($index % 2 === 0);
              ?>
                <div class="process__item fade-in <?php echo $is_even ? 'process__item--even' : 'process__item--odd'; ?>">
                  <?php if ($text): ?>
                      <div class="process__content">                        
                        <div class="process__text"><?php echo wp_kses_post($text); ?></div>
                      </div>
                    <?php endif; ?>

                    <?php if ($image): ?>
                      <div class="process__image-wrap">
                        <img src="<?php echo esc_url($image['url']); ?>" 
                              alt="<?php echo esc_attr($image['alt'] ?: 'Process step ' . ($index + 1)); ?>" 
                              class="process__image">
                      </div>
                    <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
