<footer class="main-footer padding-y-lg" data-theme="blue">
    <div class="container max-width-lg padding-y-lg">
        <div class="grid gap-lg">
            <nav class="col">
                <ul class="grid gap-lg">
                    <li class="col-6@xs col-4@md padding-y-md@sm">
                        <h4 class="margin-bottom-sm text-base@md font-normal"><?php the_field( 'footer_contact', 'option' ); ?></h4>
                        <?php the_field( 'footer_contact_content', 'option' ); ?>
                    </li>

                    <li class="col-6@xs col-4@md padding-y-md@sm">
                        <h4 class="margin-bottom-sm text-base@md font-normal"><?php the_field( 'footer_shortcuts', 'option' ); ?></h4>
                        <?php the_field( 'footer_shortcuts_content', 'option' ); ?>
                    </li>

                    <li class="col-4@xs col-4@md padding-y-md@sm">
                      <div class="padding-bottom-sm"><?php the_field( 'footer_logo_content', 'option' ); ?></div>
                        <a href="#0" class="margin-y-lg">
                            <?php if (get_field( 'footer_logo', 'option' )): ?>
                                <img class="nav__logo__img" src="<?php the_field( 'footer_logo', 'option' ); ?>" alt="<?php echo get_bloginfo(); ?> " height="<?php the_field( 'logo_height' , 'option'); ?>">
                            <?php else: ?>
                                <span><?php echo get_bloginfo(); ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="main-footer__colophon  padding-top-xs margin-top-lg">
            <div class="text-sm text-xs@md color-contrast-medium flex flex-wrap gap-xs">
                <p class="text-xs text-xs@md"><span><?php echo get_bloginfo(); ?> © <?php echo date('Y'); ?></span>&nbsp; · &nbsp;<span><a href="/personvernvilkar/">Personvernerklæring</a></span>&nbsp; · &nbsp;<span>Design &amp; utvikling: <a href="https://riktigspor.no/" target="_blank">Riktig Spor</a></span></p>
                 <?php the_field( 'sub_footer_content', 'option' ); ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
