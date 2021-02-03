<?php get_header(); ?>
<!--aktuelle saker -->
<section class="feature-v8 padding-bottom-xxl" data-theme="white">
    <div class="feature-v8__main-content bg-white padding-top-xxl">
        <div class="container max-width-adaptive-lg">
            <div class="grid gap-md justify-between@md">
                <div class="text-component col text-center">
                    <h1 class="text-xxxl font-normal text-center color-primary">Aktuelt</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container max-width-adaptive-lg feature-v8__sub-content">
        <div class="grid gap-sm">
          <?php
          $args = array(
            'posts_per_page' => 1,
            'category' => 1
          );

          $myposts = get_posts( $args );
          foreach ( $myposts as $post ): setup_postdata( $post );
          ?>

          <a href="<?php the_permalink(); ?>" class="card-v9 radius-md col-8@md card-v9--overlay-bg-lighter" aria-labelledby="<?php the_title(); ?>" data-theme="blue" <?php
          $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'preview' );
          if( !empty( $featured_image ) ): ?>style="background-image: url('<?php echo $featured_image[0]; ?>');"<?php endif; ?>>
            <div class="card-v9__content padding-md">
              <div class="padding-bottom-xxxl max-width-xxs">
                <h2 id="card-title-1" class="text-lg has-text-shadow"><?php the_title(); ?></h2>
              </div>

              <div class="margin-top-auto">
                <span class="card-v9__btn"><i>Les mer</i></span>
              </div>
            </div>
          </a>
        <?php endforeach;
        wp_reset_postdata();?>
        <?php
        $args = array(
          'posts_per_page' => 5,
          'offset' => 1,
          'category' => 1
        );

        $myposts = get_posts( $args );
        foreach ( $myposts as $post ): setup_postdata( $post );
        ?>
          <a href="<?php the_permalink(); ?>" class="card-v9 radius-md col-4@md card-v9--overlay-bg-lighter" aria-labelledby="card-title-2" data-theme="blue" <?php
          $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'preview' );
          if( !empty( $featured_image ) ): ?>style="background-image: url('<?php echo $featured_image[0]; ?>');"<?php endif; ?>>
            <div class="card-v9__content padding-md">
              <div class="padding-bottom-xxxl max-width-xxs">
                <h2 id="card-title-2" class="text-lg has-text-shadow"><?php the_title(); ?></h2>
              </div>

              <div class="margin-top-auto">
                <span class="card-v9__btn"><i>Les mer</i></span>
              </div>
            </div>
          </a>
        <?php endforeach;
        wp_reset_postdata();?>
        <?php
        $args = array(
          'posts_per_page' => 1,
          'offset' => 6,
          'category' => 1
        );

        $myposts = get_posts( $args );
        foreach ( $myposts as $post ): setup_postdata( $post );
        ?>

        <a href="<?php the_permalink(); ?>" class="card-v9 radius-md col-8@md card-v9--overlay-bg-lighter" aria-labelledby="<?php the_title(); ?>" data-theme="blue" <?php
        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'preview' );
        if( !empty( $featured_image ) ): ?>style="background-image: url('<?php echo $featured_image[0]; ?>');"<?php endif; ?>>
          <div class="card-v9__content padding-md">
            <div class="padding-bottom-xxxl max-width-xxs">
              <h2 id="card-title-1" class="text-lg has-text-shadow"><?php the_title(); ?></h2>
            </div>

            <div class="margin-top-auto">
              <span class="card-v9__btn"><i>Les mer</i></span>
            </div>
          </div>
        </a>
      <?php endforeach;
      wp_reset_postdata();?>
      <?php
      $args = array(
        'posts_per_page' => 30,
        'offset' => 7,
        'category' => 1
      );

      $myposts = get_posts( $args );
      foreach ( $myposts as $post ): setup_postdata( $post );
      ?>
        <a href="<?php the_permalink(); ?>" class="card-v9 radius-md col-4@md card-v9--overlay-bg-lighter" aria-labelledby="card-title-2" data-theme="blue" <?php
        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'preview' );
        if( !empty( $featured_image ) ): ?>style="background-image: url('<?php echo $featured_image[0]; ?>');"<?php endif; ?>>
          <div class="card-v9__content padding-md">
            <div class="padding-bottom-xxxl max-width-xxs">
              <h2 id="card-title-2" class="text-lg has-text-shadow"><?php the_title(); ?></h2>
            </div>

            <div class="margin-top-auto">
              <span class="card-v9__btn"><i>Les mer</i></span>
            </div>
          </div>
        </a>
      <?php endforeach;
      wp_reset_postdata();?>
        </div>
      </div>
</section>
<?php get_footer(); ?>
