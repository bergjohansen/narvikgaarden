<?php get_header(); ?>
<section class="feature-v5 padding-bottom-md" data-theme="white">
  <div class="feature-v5__content padding-top-xs">
    <div class="container max-width-adaptive-lg margin-bottom-xl">
      <?php
        if (function_exists('bcn_display')) {
          echo '<nav class="breadcrumbs text-xs" aria-label="Breadcrumbs"><div class="breadcrumbs__content text-base color-contrast-higher color-opacity-50% margin-bottom-xxs">';
          echo bcn_display();
          echo '</div></nav>';
        }
      ?>
    </div>
    <div class="container max-width-adaptive-sm margin-bottom-sm">
        <div class="grid max-width-adaptive gap-xl">
          <div class="col">
              <h1 class="text-xxxl font-normal color-primary"><?php the_title(); ?></h1>
          </div>
        </div>
    </div>
  </div>

  <?php
  $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), '16x9' );
  if( !empty( $featured_image ) ): ?>
    <figure class="feature-v5__media container max-width-adaptive-lg">
      <img src='<?php echo $featured_image[0]; ?>' alt='<?php echo esc_attr($image['alt']); ?>' class='full-bleed radius-lg'>
    </figure>
  <?php endif; ?>
</section>

<section class="position-relative z-index-1 padding-y-sm" data-theme="white">
  <div class="container max-width-adaptive-sm margin-bottom-lg">
    <div class="grid max-width-adaptive gap-xl">
      <div class="col">
        <div class="text-component padding-bottom-md">
          <?php the_content(); ?>
          <?php if (get_field( 'tekst' )): ?>
            <div class="text-component v-space-md line-height-lg font-normal">
              <?php the_field( 'tekst' ); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  </section>
  <section class="position-relative z-index-1 padding-y-sm" data-theme="white">
  <?php $images = get_field('bilder');
  if( $images ): ?>
  <div class="container max-width-adaptive-md margin-bottom-lg">
      <?php foreach( $images as $image ):
          $content = '<div class="full-bleed padding-bottom-md">';
          //$content .= '<a href="'. $image['url'] .'">';
          $content .= '<img class="radius-lg" src="'. $image['sizes']['1280x720'] .'" alt="'. $image['alt'] .'" />';
          //$content .= '</a>';
          $content .= '</div>';
            if ( function_exists('slb_activate') ){
          $content = slb_activate($content);
                }
          echo $content;?>
      <?php endforeach; ?>
  </div>
  <?php endif; ?>
</section>
<?php
if ( shortcode_exists( 'download-attachments' ) ) {
    // The short code exists.
    echo "<section class='padding-bottom-lg' data-theme='white'>";
    echo "<div class='container max-width-adaptive-sm margin-bottom-sm'>";
    echo "<div class='grid max-width-adaptive gap-xl'>";
    //echo "<div class='col-3@sm'></div>";
    echo "<div class='col'><div class='text-component'>";
    echo do_shortcode("[download-attachments container='div' title='Vedlegg' display_empty='0']");
    echo "</div></div></div></div></section>";
}
?>
<section class="position-relative z-index-1 padding-y-sm" data-theme="white">
<div class="container max-width-adaptive-sm margin-auto margin-bottom-md">
  <?php if (is_blog()) {
  echo "<p class='text-sm color-contrast-medium border-top border-bottom border-opacity-70% padding-y-sm'>Publisert: ";
  echo the_time( 'j. M Y' );
  echo "</p>";
   //echo 'You are on a blog page';
    } ?>
</div>
</section>
<?php get_footer(); ?>
