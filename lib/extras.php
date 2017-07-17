<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


function featured_image() {
  if ( post_password_required() || is_attachment() || !has_post_thumbnail() ) {
    return;
  } ?>
  <?php if ( is_singular() ) : ?>
    <div class="fea-image-cntr">
      <div class="post-thumbnail">
        <?php the_post_thumbnail('large'); ?>
      </div><!-- .post-thumbnail -->
    </div>
  <?php endif; // End is_singular() ?>
  <?php
}

function field_image( $fieldName, $size = 'large', $isIncLink = false ) {
  $image = get_field( $fieldName );
  if( !empty($image) ):
    // vars
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    $caption = $image['caption'];

    $thumb = $image['sizes'][ $size ];
    $width = $image['sizes'][ $size . '-width' ];
    $height = $image['sizes'][ $size . '-height' ];
    ?>
    <div class="field-image">
      <?php if( $caption ): ?>
      <div class="wp-caption">
        <?php endif; ?>

        <?php if( $isIncLink ) : ?>
        <a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
          <?php endif; ?>

          <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

          <?php if( $isIncLink ) : ?>
        </a>
      <?php endif; ?>

        <?php if( $caption ): ?>
        <p class="wp-caption-text"><?php echo $caption; ?></p>
      </div>
    <?php endif; ?>
    </div>
  <?php endif;
}
