<?php
/**
 * Template name: Landingsside
 *
 */
?>

<?php get_header(); ?>

<section class="padding-bottom-md" data-theme="blue">
  <div class="padding-top-xs padding-bottom-lg">
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
              <h1 class="text-xxxl font-normal color-primary text-center"><?php the_title(); ?></h1>
              <div class="text-component padding-y-md">
                <?php the_content(); ?>
                <?php if (get_field( 'section_1' )): ?>
                  <div class="text-component v-space-md line-height-lg font-normal">
                    <?php the_field( 'section_1' ); ?>
                  </div>
                <?php endif; ?>
              </div>
          </div>
        </div>
    </div>
  </div>



  </section>

<?php if (get_field( 'section_2' )): ?>
  <section class="padding-bottom-md" data-theme="attention">
  <div class="container max-width-adaptive-sm padding-y-md" >
      <div class="grid max-width-adaptive gap-xl">
        <div class="col">
            <div class="text-component padding-y-md">

                <div class="text-component v-space-md line-height-lg font-normal">
                  <?php the_field( 'section_2' ); ?>
                </div>

            </div>
        </div>
      </div>
  </div>
  </section>
  <?php endif; ?>

  <?php $utvalgte_ansatte = get_field( 'utvalgte_ansatte' ); ?>
  <?php if ( $utvalgte_ansatte ) : ?>
  <div class="padding-y-lg" data-theme="default">
    <div class="container feature-v5__media max-width-adaptive-md margin-bottom-md">
      <ul class="feature-v8__sub-content grid gap-lg justify-center">
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
      </ul>
    </div>
  </div>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>



<?php get_footer(); ?>
