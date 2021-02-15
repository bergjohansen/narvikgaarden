<?php
/**
 * Template name: Side med undersider
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

<?php
    $parents = get_post_ancestors( $post->ID );
    $parent_id = ($parents) ? $parents[count($parents)-1]: $post->ID;

    $children = wp_list_pages( array(
      'title_li' => '',
      'child_of' => $parent_id,
      'echo'     => 0
    ));
  ?>
  <?php if ($children): ?>
    <aside class="page__content__sidebar">
      <h2>
        <a href="<?php echo get_permalink( $parent_id ); ?>">
          <?php $parent_title = get_the_title($parent_id); echo $parent_title; ?>
        </a>
      </h2>
      <ul class="page__content__sidebar__list">
        <?php echo $children; ?>
      </ul>
    </aside>
  <?php endif; ?>


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





<?php get_footer(); ?>
