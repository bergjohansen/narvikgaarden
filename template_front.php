<?php
/**
 * Template name: Front
 *
 */
?>

<?php get_header(); ?>

<?php $intro_image = get_field( 'intro_image' ); ?>
<!-- 00 Intro -->
<section class="hero padding-y-xxxl" <?php if (get_field( 'intro_bg_color')): ?>data-theme="<?php the_field('intro_bg_color'); ?>"<?php else: ?>data-theme="blue"<?php endif; ?>
    <?php if ( $intro_image ) : ?>style="box-shadow: inset 0 0 0 1000px rgba(0,0,0,.4); background-image: url('<?php echo esc_url( $intro_image['url'] ); ?>')"<?php endif; ?>>
    <div class="container max-width-adaptive-sm">
        <div class="text-left">
            <div class="margin-bottom-sm">
                <h1 class="has-text-shadow font-medium letter-spacing-lg padding-y-xs">
                    <?php if (get_field( 'intro_headline')): ?>
                      <?php the_field( 'intro_headline' ); ?>
                    <?php else: ?>
                      <?php echo get_bloginfo(); ?>
                    <?php endif; ?>
                </h1>
                <?php if (get_field( 'intro_content')): ?>
                  <?php the_field( 'intro_content' ); ?>
                <?php endif; ?>
            </div>

            <div class="flex flex-wrap flex-left gap-sm">
                <?php $intro_link = get_field( 'intro_link' ); ?>
                <?php if ( $intro_link ) : ?>
                <a class="btn btn--accent btn--primary" href="<?php echo esc_url( $intro_link['url'] ); ?>" target="<?php echo esc_attr( $intro_link['target'] ); ?>">
                    <?php echo esc_html( $intro_link['title'] ); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <figure class="bg-decoration-v2 z-index-1" aria-hidden="true">
        <svg class="bg-decoration-v2__svg color-contrast-higher opacity-10%" viewBox="0 0 1920 450" fill="none">
            <g stroke="currentColor" stroke-width="2">
                <rect x="1510" y="120" width="160" height="70"/>
                <path d="M1510 190L1670 120"/>
                <rect x="1510" y="260" width="160" height="70"/>
                <path d="M1510 330L1670 260"/>
                <rect x="1350" y="50" width="160" height="70"/>
                <path d="M1350 120L1510 50"/>
                <path d="M1350 190L1510 120"/>
                <path d="M1350 330L1510 260"/>
                <rect x="1350" y="190" width="160" height="70"/>
                <rect x="1350" y="330" width="160" height="70"/>
                <path d="M1350 400L1510 330"/>
                <rect x="1190" y="120" width="160" height="70" transform="rotate(-180 1190 120)"/>
                <rect x="1190" y="190" width="160" height="70"/>
                <path d="M1190 260L1350 190"/>
            </g>
        </svg>
    </figure>
</section>

<?php if (get_field( 'parking_text')): ?>
<!-- 01 Parkeringsnotis-->
<section class="padding-y-0@lg bg-contrast-low border-bottom border-contrast-medium" data-theme="white">
  <div class="padding-y-xs js-pre-header">
    <div class="container max-width-lg position-relative">
      <div class="text-component text-center text-sm padding-x-lg">
        <?php the_field( 'parking_text' ); ?>
      </div>

      <button class="reset pre-header__close-btn js-pre-header__close-btn">
        <svg class="icon" viewBox="0 0 16 16"><title>Lukk</title><g stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"><line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line><line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line></g></svg>
      </button>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if( have_rows('shortcuts') ): ?>
<!-- 02 snarveier-->
<section class="padding-y-md bg-contrast-lower" data-theme="default">
    <div class="container padding-y-md max-width-lg">
        <div class="grid gap-lg">

            <?php while( have_rows('shortcuts') ): the_row();
              // vars
              $image = get_sub_field('shortcut_icon');
              $image_url = $image['sizes']['shortcut'];
              $content = get_sub_field('shortcut_text');
              $label = get_sub_field('shortcut_label');
              $link = get_sub_field('shortcut_link2');
              $color = get_sub_field('shortcut_color');
            ?>
            <a href="<?php echo $link; ?>" data-theme="<?php if( $color ): ?><?php echo $color; ?><?php else: ?>attention<?php endif; ?>" class="card-v9 card-v9--overlay-bg radius-lg col-6@md" aria-labelledby="<?php echo $label; ?>" aria-label="Link description" style="background-image: url('<?php if( $image_url ): ?><?php echo $image_url; ?><?php endif; ?>');" >
                <div class="card-v9__content padding-md">
                    <div class="padding-bottom-xl max-width-xxs">
                        <p class="text-sm color-contrast-higher color-opacity-50% margin-bottom-xxs"><?php echo $label; ?></p>
                        <h2 id="card-title-1" class="text-xl"><?php echo $content; ?></h2>
                    </div>
                    <div class="margin-top-auto">
                        <span class="card-v9__btn"><i>Les mer</i></span>
                    </div>
                </div>
            </a>
          <?php endwhile; ?>

        </div>
    </div>
</section>
<?php endif; ?>


<!-- 03 aktuelt -->
<section class="feature-v8 padding-bottom-md" data-theme="white">
    <div class="feature-v8__main-content padding-top-md">
        <div class="container padding-y-md max-width-adaptive-lg">
            <div class="grid gap-md justify-between@md">
                <div class="col text-center padding-y-md">
                    <h2 class="font-normal text-left">Aktuelt</h2>
                </div>
            </div>
            <div class="grid gap-lg">
                <?php
                $args = array( 'posts_per_page' => 3, 'category' => 1 );

                $myposts = get_posts( $args );
                foreach ( $myposts as $post ): setup_postdata( $post );
                ?>
                <div class="col-4@md">
                    <div class="feature-v6__item">
                      <?php
                      $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'preview' );
                      if( !empty( $featured_image ) ): ?>
                        <a href="<?php the_permalink(); ?>"><img class="radius-lg" src="<?php echo $featured_image[0]; ?>" alt="<?php echo esc_attr($image['alt']); ?>"/></a>
                      <?php else: ?>
                        <figure>
                          <img class='radius-lg' src="/wp-content/uploads/2021/01/temp_logo.jpg" alt="Narvikgården" />
                        </figure>
                      <?php endif; ?>
                        <div class="text-component">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p class="text-sm color-contrast-medium margin-bottom-sm"><?php the_time( 'j. M Y' ); ?></p>

                            <p><?php
                             $trim_length = 30;  //desired length of text to display
                             $value_more = '...'; // what to add at the end of the trimmed text
                             $custom_field = 'tekst';
                             $value = get_post_meta($post->ID, $custom_field, true);
                              if ($value) {
                                 echo wp_trim_words( $value, $trim_length, $value_more);
                              }
                              ?>
                              </p>



                            <p><a class="btn btn--subtle" href="<?php the_permalink(); ?>">Les saken</a>
                            </p>
                        </div>
                    </div>
                </div>
              <?php endforeach;
              wp_reset_postdata();?>
            </div>


            <div class="flex flex-wrap flex-center gap-sm padding-top-xxl">
              <a class="btn btn--accent btn--primary" href="/aktuelt" target="">
                  Se alle aktuelle saker
              </a>
            </div>
        </div>
    </div>
  </section>
<?php get_footer(); ?>
