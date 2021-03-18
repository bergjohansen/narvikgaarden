<?php
/**
 * Template name: Til salgs/leie
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
                <span class="js-filter-nav__placeholder" aria-hidden="true">Til salgs/leie</span>
                <svg class="icon icon--xxs margin-left-xxs" aria-hidden="true" viewBox="0 0 12 12"><polyline points="0.5 3.5 6 9.5 11.5 3.5" fill="none" stroke-width="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></polyline></svg>
              </button>

              <div class="filter-nav__wrapper js-filter-nav__wrapper" id="filter-nav">
                <nav class="filter-nav__nav justify-center js-filter-nav__nav">
                  <ul class="filter-nav__list js-filter-nav__list" aria-controls="product-gallery">
                    <li class="filter-nav__item">
                      <button class="reset filter-nav__btn js-filter-nav__btn js-tab-focus" aria-current="true" data-filter="*">Alle </button>
                    </li>

                    <li class="filter-nav__item">
                      <button class="reset filter-nav__btn js-filter-nav__btn js-tab-focus" data-filter="sale">Til salgs</button>
                    </li>

                    <li class="filter-nav__item">
                      <button class="reset filter-nav__btn js-filter-nav__btn js-tab-focus" data-filter="rent">Til leie</button>
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
              'posts_per_page' => -1,
              //'offset' => 3,
              'post_type' => 'prospekt',
              'post_parent' => 0,
              'paged' => $paged
            );
            $myposts = get_posts( $args );

            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <li class="col-6@sm col-4@md js-filter__item radius-md card-v9B margin-bottom-lg" data-filter="<?php the_field( 'prospect_status' ); ?>">
              <div class="prod-card">
                  <?php $prospect_finn = get_field( 'prospect_finn' ); ?>
                  <?php $prospect_intern = get_field( 'prospect_intern' ); ?>
                <?php
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'card' );
                if( !empty( $featured_image ) ): ?>
                <a class="radius-lg card-v9B" href="<?php if ( $prospect_finn ) : ?><?php echo esc_url( $prospect_finn['url'] ); ?><?php endif; ?><?php if ( $prospect_intern ) : ?><?php echo esc_url( $prospect_intern['url'] ); ?><?php endif; ?>" aria-label="<?php the_title(); ?>">
                  <figure>
                    <img src='<?php echo $featured_image[0]; ?>' alt='<?php echo esc_attr($image['alt']); ?>' class='block width-100% img-rounded'>
                  </figure>
                </a>
                  <?php if (get_field( 'prospect_solgtutleid' )): ?>
                      <span class="badge badge--error text-sm margin--negative"><?php the_field( 'prospect_solgtutleid' ); ?></span>
                  <?php endif; ?>
                <?php endif; ?>

                <div class="padding-sm text-center">

                  <h3><a class="color-inherit" href="<?php if ( $prospect_finn ) : ?><?php echo esc_url( $prospect_finn['url'] ); ?><?php endif; ?><?php if ( $prospect_intern ) : ?><?php echo esc_url( $prospect_intern['url'] ); ?><?php endif; ?>"><?php the_title(); ?></a></h3>
                  <div class="margin-top-xs">
                    <span class="prod-card__price">
                      <?php if (get_field( 'prospect_ingress' )): ?>
                          <div class="text-left line-height-md margin-bottom-md font-normal"><?php the_field( 'prospect_ingress' ); ?></div>
                      <?php endif; ?>
                    </span>

                    <?php if ( $prospect_finn ) : ?>
                      <a href="<?php echo esc_url( $prospect_finn['url'] ); ?>" class="btn btn--suble" target="<?php echo esc_attr( $prospect_finn['target'] ); ?>"><?php echo $prospect_finn['title']; ?></a>
                    <?php endif; ?>




                    <?php if ( $prospect_intern ) : ?>
                    	<a href="<?php echo esc_url( $prospect_intern['url'] ); ?>" class="btn btn--suble" target="<?php echo esc_attr( $prospect_intern['target'] ); ?>"><?php echo esc_html( $prospect_intern['title'] ); ?></a>
                    <?php endif; ?>

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
