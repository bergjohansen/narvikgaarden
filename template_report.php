<?php
/**
 * Template name: Årsrapport
 *
 */
?>

<?php get_header(); ?>

<section class="feature-v8 padding-bottom-xl" data-theme="white">
  <div class="feature-v8__main-content bg-white padding-top-xxl">
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
                if( !empty( $featured_image ) ): ?>
                <a class="radius-lg card-v9B" href="<?php the_field( 'report_link' ); ?>" aria-label="<?php the_title(); ?>">
                  <figure>
                    <img src='<?php echo $featured_image[0]; ?>' alt='<?php echo esc_attr($image['alt']); ?>' class='block width-100% img-rounded'>
                  </figure>
                </a>
                <?php endif; ?>

                <div class="padding-sm text-center">
                  <h3><a class="color-inherit" href="<?php the_field( 'report_link' ); ?>"><?php the_title(); ?></a></h3>

                  <div class="margin-top-xs">
                    <span class="prod-card__price">
                      <?php if (get_field( 'report_ingress' )): ?>
                          <div class="text-component text-left line-height-xl margin-bottom-md font-normal"><?php the_field( 'report_ingress' ); ?></div>
                      <?php endif; ?>
                      </span>
                       <?php if (get_field( 'report_link' )): ?>
                      <a href="<?php the_field( 'report_link' ); ?>" class="btn btn--primary">Vis årsmelding <?php the_title(); ?> (pdf)</a>
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
