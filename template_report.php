<?php
/**
 * Template name: Årsrapport
 *
 */
?>

<?php get_header(); ?>

<section class="feature-v8 padding-bottom-xl" data-theme="white">
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
              <h1 class="text-xxxl font-normal text-center color-primary margin-bottom-sm"><?php the_title(); ?></h1>
              <?php if (get_field( 'ingress' )): ?>
                <div class="text-component text-center line-height-lg margin-bottom-md font-normal"><?php the_field( 'ingress' ); ?></div>
              <?php endif; ?>
          </div>
        </div>
    </div>
  </div>

 <div class="container max-width-adaptive-lg feature-v8__sub-content">
    <ul class="feature-v8__sub-content grid gap-lg">
        <?php
        $args = array(
          'posts_per_page' => -1,
          'post_type' => 'page',
          'post_parent' => $post->ID,
          'orderby' => 'menu_order',
          'paged' => $paged
        );
        $myposts = get_posts( $args );

        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

        <li class="col-6@sm col-4@md js-filter__item radius-md card-v9B">
            <div class="prod-card">

                <?php
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'card' );
                $report_lenke = get_field( 'report_lenke' );
                if( !empty( $featured_image ) ): ?>
                <a class="radius-lg card-v9B" href="<?php echo esc_url( $report_lenke['url'] ); ?>" aria-label="<?php the_title(); ?>">
                  <figure>
                    <img src='<?php echo $featured_image[0]; ?>' alt='<?php echo esc_attr($image['alt']); ?>' class='block width-100% img-rounded'>
                  </figure>
                </a>
                <?php endif; ?>

                <div class="padding-sm text-center">
                  <h3><a class="color-inherit" href="<?php echo esc_url( $report_lenke['url'] ); ?>"><?php the_title(); ?></a></h3>

                  <div class="margin-top-xs">
                    <span class="prod-card__price">
                      <?php if (get_field( 'report_ingress' )): ?>
                          <div class="text-component text-left line-height-xl margin-bottom-md font-normal"><?php the_field( 'report_ingress' ); ?></div>
                      <?php endif; ?>
                      </span>

                      <?php if ( $report_lenke ) : ?>
                      	<a href="<?php echo esc_url( $report_lenke['url'] ); ?>" class="btn btn--primary"><?php echo esc_html( $report_lenke['title'] ); ?></a>
                      <?php endif; ?>
                  </div>
                </div>
              </div>
            </li>
      <?php endforeach;
      wp_reset_postdata();?>
    </ul>
  </div>
</section>

<?php get_footer(); ?>
