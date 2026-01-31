<?php
/**
 * Main Banner Component
 */

  $background_type = get_sub_field( 'background_type' ) ?: 'image';
  $background_image = get_sub_field( 'background_image' );
  $background_video = get_sub_field( 'background_video' );
  $title = get_sub_field( 'title' );
  $subtitle = get_sub_field( 'subtitle' );
  $button_link = get_sub_field( 'button_link' );

  $bg_style = '';
  if ( $background_type === 'image' && $background_image ) {
    $bg_style = 'background-image: url(' . esc_url( $background_image['url'] ) . ');';
  }
?>

<section class="main-banner position-relative d-flex align-items-center"
	style="<?php echo esc_attr( $bg_style ); ?> min-height: 100vh; background-size: cover; background-position: center;">

	<?php if ( $background_type === 'video' && $background_video ) : ?>
		<video class="position-absolute w-100 h-100" style="object-fit: cover; top: 0; left: 0;" autoplay muted loop>
			<source src="<?php echo esc_url( $background_video['url'] ); ?>" type="video/mp4">
		</video>
	<?php endif; ?>

	<!-- Overlay -->
	<div class="position-absolute w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4); top: 0; left: 0;"></div>

	<!-- Content -->
	<div class="container-fluid position-relative z-2">
		<div class="row justify-content-center">
			<div class="col-12 text-center text-white">
				<div class="fade-in">
					<?php if ( $title ) : ?>
						<h1><?php echo esc_html( $title ); ?></h1>
					<?php endif; ?>

					<?php if ( $subtitle ) : ?>
						<h3><?php echo esc_html( $subtitle ); ?></h3>
					<?php endif; ?>

					<?php if ( $button_link ) : ?>
						<a href="<?php echo esc_url( $button_link['url'] ); ?>" class="btn btn-primary btn-lg">
							<?php echo esc_html( $button_link['title'] ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

