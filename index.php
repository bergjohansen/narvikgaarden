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
    <div class="container max-width-adaptive-md margin-bottom-sm">
      <h1 class="text-xxxl text-center font-normal color-primary padding-x-sm"><?php the_title(); ?></h1>
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
      <div class="<?php if( have_rows('faktaboks') ): ?>col-8@sm<?php endif; ?> col-content">
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
        <div class="col-4@sm faktaboks padding-left-sm@sm">
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

<?php $utvalgte_ansatte = get_field( 'utvalgte_ansatte' ); ?>
<?php if ( $utvalgte_ansatte ) : ?>
<section class="padding-y-sm" data-theme="white">
  <div class="container max-width-adaptive-sm margin-bottom-sm">
      <div class="grid max-width-adaptive gap-xl">
        <div class="col">
            <h2 class="text-xl font-normal text-center color-primary margin-bottom-sm">Ta kontakt</h2>
        </div>
      </div>
  </div>
  <div class="container max-width-adaptive-md">
    <div class="grid gap-lg justify-center">
      <?php foreach ( $utvalgte_ansatte as $post ) : ?>
        <?php setup_postdata ( $post ); ?>
        <div class="prod-card col-6@xs col-4@sm  col-3@md col-3@lg padding-x-0@xs padding-x-lg">
          <a class="prod-card__img-link" href="<?php if (get_field( 'beskrivelse' )): ?><?php the_permalink(); ?><?php endif; ?>" aria-label="<?php the_title(); ?>">
            <?php
                $hdr_image = get_field('bilde');
              ?>
              <?php if( !empty( $hdr_image ) ): ?>
               <figure class="prod-card__img ">
                  <img src="<?php echo esc_url($hdr_image['sizes']['540x960']); ?>" alt="<?php echo esc_attr($hdr_image['alt']); ?>" class="radius-lg">
                </figure>
              <?php endif ?>
          </a>

        <div class="padding-sm text-left">
            <h4><?php if (get_field( 'beskrivelse' )): ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php else: ?><?php the_title(); ?><?php endif; ?></h4>
            <div class="margin-y-xs text-component">
              <p>
              <?php if (get_field( 'stilling' )): ?>
                  <?php the_field( 'stilling' ); ?><br><br>
              <?php endif; ?>
              <?php if (get_field( 'telefon' )): ?>
                  <?php the_field( 'telefon' ); ?><br>
              <?php endif; ?>
              <?php if (get_field( 'e-post' )): ?>
                <a href="mailto:<?php the_field( 'e-post' ); ?>"><?php the_field( 'e-post' ); ?></a><br>
              <?php endif; ?>
              </p>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </div>
</section>
  <?php wp_reset_postdata(); ?>
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
