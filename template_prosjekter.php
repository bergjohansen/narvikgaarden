<?php
/**
 * Template name: Prosjekter
 *
 */
?>

<?php get_header(); ?>

<section class="feature-v8 padding-bottom-md" data-theme="white">
  <div class="feature-v8__main-content bg-white padding-top-xxl">
    <div class="container max-width-adaptive-sm margin-bottom-sm">
        <div class="grid max-width-adaptive gap-xl">
          <div class="col">
            <h1 class="text-xxxl font-normal text-center color-primary margin-bottom-sm"><?php the_title(); ?></h1>
            <?php if (get_field( 'ingress' )): ?>
              <div class="text-component text-center line-height-lg margin-bottom-md font-normal"><?php the_field( 'ingress' ); ?></div>
            <?php endif; ?>
            <div class="filter-nav filter-nav--expanded js-filter-nav">
              <button class="reset btn btn--subtle is-hidden js-filter-nav__control" aria-label="Select a filter option" aria-controls="filter-nav">
                <span class="js-filter-nav__placeholder" aria-hidden="true">Alle prosjekter</span>

                <svg class="icon icon--xxs margin-left-xxs" aria-hidden="true" viewBox="0 0 12 12"><polyline points="0.5 3.5 6 9.5 11.5 3.5" fill="none" stroke-width="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></polyline></svg>
              </button>

              <div class="filter-nav__wrapper js-filter-nav__wrapper" id="filter-nav">
                <nav class="filter-nav__nav justify-center js-filter-nav__nav">
                  <ul class="filter-nav__list js-filter-nav__list" aria-controls="product-gallery">
                    <li class="filter-nav__item">
                      <button class="reset filter-nav__btn js-filter-nav__btn js-tab-focus" aria-current="true" data-filter="*">Alle prosjekter</button>
                    </li>

                    <li class="filter-nav__item">
                      <button class="reset filter-nav__btn js-filter-nav__btn js-tab-focus" data-filter="ongoing">Pågående</button>
                    </li>

                    <li class="filter-nav__item">
                      <button class="reset filter-nav__btn js-filter-nav__btn js-tab-focus" data-filter="completed">Fullførte</button>
                    </li>
                  <li class="filter-nav__marker js-filter-nav__marker" aria-hidden="true"></li>
                  </ul>

                  <button class="reset filter-nav__close-btn is-hidden js-filter-nav__close-btn js-tab-focus" aria-label="Close navigation">
                    <svg class="icon" viewBox="0 0 16 16" aria-hidden="true"><g stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"><line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line><line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line></g></svg>
                  </button>
                </nav>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

  <div class="container max-width-adaptive-lg feature-v8__sub-content padding-bottom-xl">
    <div class="grid gap-sm">
        <div class="margin-y-md">
          <ul class="grid gap-sm js-filter feature-v8__sub-content" id="product-gallery">
            <?php
            $args = array(
              'posts_per_page' => 99,
              //'offset' => 3,
              'orderby' => 'date',
              'order'   => 'DESC',
              'post_type' => 'prosjekter'
              //'post_parent' => 0,
              //'orderby' => 'asc',
              //'paged' => $paged
            );
            $myposts = get_posts( $args );

            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <li class="col-6@sm col-4@md js-filter__item radius-md card-v9B margin-bottom-lg" data-filter="<?php the_field( 'project_status' ); ?>">
              <div class="prod-card">
                <?php
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'card' );
                if( !empty( $featured_image ) ): ?>
                <a class="radius-lg card-v9B" href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                  <figure>
                    <img src='<?php echo $featured_image[0]; ?>' alt='<?php echo esc_attr($image['alt']); ?>' class='block width-100% img-rounded'>
                  </figure>
                </a>
                <?php endif; ?>

                <div class="padding-sm text-left">
                  <h3><a class="color-inherit" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                  <div class="margin-top-xs">
                    <span class="prod-card__price">
                      <?php if (get_field( 'project_ingress' )): ?>
                          <div class="text-left line-height-md margin-bottom-md font-normal"><?php the_field( 'project_ingress' ); ?></div>
                      <?php endif; ?>
                      </span>
                  </div>
                </div>
              </div>
            </li>
          <?php endforeach;
          wp_reset_postdata();?>
          </ul>
        </div>
      </div>
  </div>
</section>

<?php get_footer(); ?>
