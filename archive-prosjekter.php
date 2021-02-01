<?php get_header(); ?>

<section class="feature-v8 padding-bottom-md" data-theme="white">
  <div class="feature-v8__main-content bg-white padding-top-xxl">
    <div class="container max-width-adaptive-sm margin-bottom-sm">
        <div class="grid max-width-adaptive gap-xl">
          <div class="col">
              <h1 class="text-xxxl font-normal text-center color-primary">Prosjekter</h1>
          </div>
        </div>
    </div>
  </div>


  <div class="container max-width-adaptive-lg feature-v8__sub-content">
    <div class="grid gap-sm">
        <?php
        $args = array(
          'posts_per_page' => 3,
          'post_type' => 'prosjekter',
          'post_parent' => 0,
          'paged' => $paged,
          'meta_query' => array(
              array(
                  'key'   => 'project_featured',
                  'value' => '0',
              )
          )
        );
        $myposts = get_posts( $args );

        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

        <a href="<?php the_permalink(); ?>" class="card-v9 radius-md col-4@md card-v9--overlay-bg-darker" aria-labelledby="<?php the_title(); ?>" data-theme="blue" <?php
        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square' );
        if( !empty( $featured_image ) ): ?>style="background-image: url('<?php echo $featured_image[0]; ?>');"<?php endif; ?>>
          <div class="card-v9__content padding-md ">
            <div class="padding-bottom-xxxl max-width-xxs">
              <h2 id="card-title-1" class="text-lg has-text-shadow margin-bottom-sm"><?php the_title(); ?></h2>
              <p class="text-base font-normal color-contrast-higher margin-bottom-xxs line-height-lg">
                <?php
                 $trim_length = 30;  //desired length of text to display
                 $value_more = '...'; // what to add at the end of the trimmed text
                 $custom_field = 'project_text';
                 $value = get_post_meta($post->ID, $custom_field, true);
                  if ($value) {
                     echo wp_trim_words( $value, $trim_length, $value_more);
                  }
                  ?>
                </p>
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

  <?php
  $args = array(
    'posts_per_page' => 1,
    'post_type' => ' prosjekter',
    'post_parent' => 0,
    'paged' => $paged,
    'meta_query' => array(
        array(
            'key'   => 'project_featured',
            'value' => '1',
        )
    )
  );
$myposts = get_posts( $args );

foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<section class="padding-top-sm" data-theme="blue">
  <div class="articles padding-y-xl">
    <div class="container max-width-adaptive-lg">

      <div class="grid gap-lg">

        <article class="story story--featured">
          <a class="story__img radius-md" href="<?php the_permalink(); ?>">
            <figure class="aspect-ratio-16:9">
              <?php
              $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), '16x9' );
              if( !empty( $featured_image ) ): ?>
                <img src="<?php echo $featured_image[0]; ?>" alt="Image description">
              <?php endif; ?>
            </figure>
          </a>


            <div class="text-component">
              <h2 class="story__title font-medium"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <?php if (get_field( 'ingress')): ?>
              <span class="prosjekt"><?php the_field( 'ingress' ); ?></span>
              <?php endif; ?>
              <p>
              <?php
               $trim_length = 30;  //desired length of text to display
               $value_more = '...'; // what to add at the end of the trimmed text
               $custom_field = 'project_intro';
               $value = get_post_meta($post->ID, $custom_field, true);
                if ($value) {
                   echo wp_trim_words( $value, $trim_length, $value_more);
                }
                ?>
              </p>
              <a class="btn btn--accent btn--primary" href="<?php the_permalink(); ?>" target="">Les mer</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
  </section>
<?php endforeach;
wp_reset_postdata();?>

<section class="padding-bottom-xxl padding-top-sm" data-theme="white">
<div class="container max-width-adaptive-lg">
  <div class="grid gap-sm">
      <?php
      $args = array(
        'posts_per_page' => 99,
        'offset' => 3,
        'post_type' => 'prosjekter',
        'post_parent' => 0,
        'paged' => $paged,
        'meta_query' => array(
            array(
                'key'   => 'project_featured',
                'value' => '0',
            )
        )
      );
      $myposts = get_posts( $args );

      foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

      <a href="<?php the_permalink(); ?>" class="card-v9 radius-md col-4@md card-v9--overlay-bg-darker" aria-labelledby="<?php the_title(); ?>" data-theme="blue" <?php
      $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square' );
      if( !empty( $featured_image ) ): ?>style="background-image: url('<?php echo $featured_image[0]; ?>');"<?php endif; ?>>
        <div class="card-v9__content padding-md ">
          <div class="padding-bottom-xxxl max-width-xxs">
            <h2 id="card-title-1" class="text-lg has-text-shadow margin-bottom-sm"><?php the_title(); ?></h2>
            <p class="text-base font-normal color-contrast-higher margin-bottom-xxs line-height-lg">              <?php
               $trim_length = 30;  //desired length of text to display
               $value_more = '...'; // what to add at the end of the trimmed text
               $custom_field = 'project_text';
               $value = get_post_meta($post->ID, $custom_field, true);
                if ($value) {
                   echo wp_trim_words( $value, $trim_length, $value_more);
                }
                ?>

              </p>
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
