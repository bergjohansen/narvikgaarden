<?php
/**
 * Template name: FAQ
 *
 */
?>

<?php get_header(); ?>

<section class="position-relative z-index-1 padding-top-xl padding-bottom-xxxl" data-theme="default">
  <div class="container max-width-adaptive-lg">
    <div class="margin-bottom-xl">
      <h1 class="text-xxxl font-normal text-center color-primary"><?php the_title(); ?></h1>
    </div>

    <div class="grid max-width-adaptive gap-xl">
      <?php if (have_rows('faq')) : ?>
      <div class="col-3@md">
        <nav class="toc toc--sticky text-sm@md js-toc">
          <ul class="toc__list js-toc__list">
            <li class="toc__label" tabindex="0">Kategorier</li>
            <?php while (have_rows('faq')) : the_row(); ?>
            <li><a href="#<?php the_sub_field('faq_section_name'); ?>" class="toc__link js-smooth-scroll"><?php the_sub_field('faq_section_name'); ?> (<?php echo count(get_sub_field('faq_section')); ?>)</a></li>
            <?php endwhile; ?>
          </ul>
        </nav>
      </div>
    <?php endif; ?>


      <div class="toc-content js-toc-content col-9@md">
        <?php if (have_rows('faq')) : ?>
        <?php while (have_rows('faq')) : the_row(); ?>
        <div class="grid gap-lg">
          <div>
            <h2 id="<?php the_sub_field('faq_section_name'); ?>" class="text-md margin-bottom-xs margin-top-md"><?php the_sub_field('faq_section_name'); ?> </h2>
            <?php if (have_rows('faq_section')): ?>
            <ul class="accordion-v2 flex flex-column gap-xxxs js-accordion" data-animation="on" data-multi-items="on" data-version="v2">
              <?php while (have_rows('faq_section')): the_row(); ?>
              <li class="accordion-v2__item bg shadow-sm radius-md  js-accordion__item">
                <button class="reset accordion-v2__header padding-y-sm padding-x-md js-tab-focus" type="button">
                  <span class="text-md font-medium"><?php the_sub_field('faq_question'); ?></span>

                  <svg class="icon accordion-v2__icon-arrow no-js:is-hidden" viewBox="0 0 16 16" aria-hidden="true">
                    <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10">
                      <path d="M2 2l12 12" />
                      <path d="M14 2L2 14" />
                    </g>
                  </svg>
                </button>

                <div class="accordion-v2__panel js-accordion__panel">
                  <div class="text-component padding-top-xxxs padding-x-md padding-bottom-md">
                    <p><?php the_sub_field('faq_answer'); ?></p>
                  </div>
                </div>
              </li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
      <?php
        global $schema;

        $schema = array(
        '@context'   => "https://schema.org",
        '@type'      => "FAQPage",
        'mainEntity' => array()
        );
        if ( have_rows('faq') ) {
        while ( have_rows('faq') ) : the_row();
          if ( have_rows('faq_section') ) {
            while ( have_rows('faq_section') ) : the_row();
              $questions = array(
                '@type'          => 'Question',
                'name'           => get_sub_field('faq_question'),
                'acceptedAnswer' => array(
                '@type' => "Answer",
                'text' => get_sub_field('faq_answer')
                  )
                  );
                  array_push($schema['mainEntity'], $questions);
            endwhile;
          }
        endwhile;

        function bakemywp_generate_faq_schema ($schema) {
          global $schema;
          echo '<!-- Auto generated FAQ Structured data by Bakemywp.com --><script type="application/ld+json">'. json_encode($schema) .'</script>';
        }
        add_action( 'wp_footer', 'bakemywp_generate_faq_schema', 100 );
      }
      ?>
      <?php endif; ?>
      </div>

    </div>
  </div>
</section>
<?php get_footer(); ?>
