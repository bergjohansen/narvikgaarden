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
      <div class="credit_text text-right opacity-70%"><?php the_post_thumbnail_caption(); ?></div>
    </figure>
  <?php endif; ?>
</section>

<section class="position-relative z-index-1 padding-y-sm" data-theme="white">
  <div class="container max-width-adaptive-sm margin-bottom-lg">
    <div class="grid max-width-adaptive">
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

        <?php if( have_rows('faktaboks') ): ?>
        <div class="col-4 faktaboks">
          <?php while( have_rows('faktaboks') ): the_row(); ?>
            <div class="border radius-lg padding-md margin-bottom-md" data-theme="blue">
                <h3 class="text-sm text-uppercase font-light color-accent-light margin-bottom-sm"><?php the_sub_field('tittel'); ?></h3>
                <?php the_sub_field('innhold'); ?>
              <?php
              $sub_field_3 = get_sub_field('innhold');
              // do something with $sub_field_3
              ?>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

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
            $content .= '<div class="credit_text text-right opacity-70%">' . $image['caption'] .'</div>';
            //$content .= echo ($images['caption']);

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

  <?php if( $intro_image['caption'] ): ?>
<div class="credit">
<div class="credit_text opacity-70%"><?php echo ($intro_image['caption']); ?></div>
</div>
<?php endif; ?>

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
