<?php
/**
 * Template name: Foreldresider
 *
 */
?>

<?php get_header(); ?>

<section class="feature-v8 padding-bottom-xl" data-theme="white">
  <div class="feature-v8__main-content bg-white padding-top-xxl">
    <div class="container max-width-adaptive-sm margin-bottom-sm">
        <div class="grid max-width-adaptive gap-xl">
          <div class="col">
              <h1 class="text-xxxl font-normal text-center color-primary"><?php the_title(); ?></h1>
              <?php if (get_field( 'ingress' )): ?>
                <div class="text-component text-left line-height-lg margin-bottom-md font-bold"><?php the_field( 'ingress' ); ?></div>
              <?php endif; ?>
          </div>
        </div>
    </div>
  </div>

  <div class="container max-width-adaptive-lg feature-v8__sub-content">
    <ul class="feature-v8__sub-content grid gap-lg">
        <?php
        $args = array(
          'post_type' => 'page',
          'post_parent' => $post->ID,
          'orderby' => 'menu_order',
          'paged' => $paged
        );
        $myposts = get_posts( $args );

        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
        <li class="col-4@md">
          <a href="<?php the_permalink(); ?>" class="radius-lg card-v9B">
            <?php
            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'card' );
            if( !empty( $featured_image ) ): ?>
            <figure>
              <img src='<?php echo $featured_image[0]; ?>' alt='<?php echo esc_attr($image['alt']); ?>' class='block width-100% img-rounded'>
            </figure>
            <?php else: ?>
              <figure>
                <img class='block width-100% img-rounded' src="<?php echo get_template_directory_uri(); ?>/assets/images/narvik-kommune-pattern.svg" alt="<?php echo $image['alt'] ?>" />
              </figure>
            <?php endif; ?>
            <footer class="padding-sm">

              <div class="text-component">
                <h4><span class="card-v8__title"><?php the_title(); ?></span></h4>
              </div>
            </footer>
          </a>
        </li>
      <?php endforeach;
      wp_reset_postdata();?>
    </ul>
  </div>
</section>

<?php get_footer(); ?>
