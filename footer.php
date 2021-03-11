<footer class="main-footer padding-y-lg" data-theme="blue">
    <div class="container max-width-lg padding-y-lg">
        <div class="grid gap-lg">
            <nav class="col">
                <ul class="grid gap-lg">
                    <li class="col-6@xs col-4@md padding-y-md@sm">
                        <h4 class="margin-bottom-sm text-base@md font-normal"><?php the_field( 'footer_contact', 'option' ); ?></h4>
                        <?php the_field( 'footer_contact_content', 'option' ); ?><br>

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
        <div class="main-footer__colophon  padding-top-xs">
              <p>
            <?php if (get_field( 'social_facebook', 'option' )): ?>
              <a href="<?php the_field( 'social_facebook', 'option' ); ?>" class="margin-bottom-sm margin-right-md font-light"><svg class="icon margin-right-xs" viewBox="0 0 32 32"><title>Følg oss på Facebook</title><path d="M32,16A16,16,0,1,0,13.5,31.806V20.625H9.438V16H13.5V12.475c0-4.01,2.389-6.225,6.043-6.225a24.644,24.644,0,0,1,3.582.312V10.5H21.107A2.312,2.312,0,0,0,18.5,13v3h4.438l-.71,4.625H18.5V31.806A16,16,0,0,0,32,16Z"></path></svg> <?php the_field( 'social_facebook_text', 'option' ); ?></a>
            <?php endif; ?>

            <?php if (get_field( 'social_facebook2', 'option' )): ?>
              <a href="<?php the_field( 'social_facebook2', 'option' ); ?>" class="margin-bottom-sm margin-right-md font-light"><svg class="icon margin-right-xs" viewBox="0 0 32 32"><title>Følg oss på Facebook</title><path d="M32,16A16,16,0,1,0,13.5,31.806V20.625H9.438V16H13.5V12.475c0-4.01,2.389-6.225,6.043-6.225a24.644,24.644,0,0,1,3.582.312V10.5H21.107A2.312,2.312,0,0,0,18.5,13v3h4.438l-.71,4.625H18.5V31.806A16,16,0,0,0,32,16Z"></path></svg> <?php the_field( 'social_facebook_text2', 'option' ); ?></a>
            <?php endif; ?>

            <?php if (get_field( 'social_facebook3', 'option' )): ?>
              <a href="<?php the_field( 'social_facebook3', 'option' ); ?>" class="margin-bottom-sm margin-right-md font-light"><svg class="icon margin-right-xs" viewBox="0 0 32 32"><title>Følg oss på Facebook</title><path d="M32,16A16,16,0,1,0,13.5,31.806V20.625H9.438V16H13.5V12.475c0-4.01,2.389-6.225,6.043-6.225a24.644,24.644,0,0,1,3.582.312V10.5H21.107A2.312,2.312,0,0,0,18.5,13v3h4.438l-.71,4.625H18.5V31.806A16,16,0,0,0,32,16Z"></path></svg> <?php the_field( 'social_facebook_text3', 'option' ); ?></a>
            <?php endif; ?>

              <?php if (get_field( 'social_instagram', 'option' )): ?>
              <a href="<?php the_field( 'social_instagram', 'option' ); ?>" class="margin-bottom-sm margin-right-md font-light color-success"><svg class="icon margin-right-xs" aria-hidden="true" width="16" height="16" viewBox="0 0 16 16"><g><circle cx="12.145" cy="3.892" r="0.96"></circle><path data-color="color-2" d="M8,12c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4S10.206,12,8,12z M8,6C6.897,6,6,6.897,6,8 s0.897,2,2,2s2-0.897,2-2S9.103,6,8,6z"></path><path d="M12,16H4c-2.056,0-4-1.944-4-4V4c0-2.056,1.944-4,4-4h8c2.056,0,4,1.944,4,4v8C16,14.056,14.056,16,12,16z M4,2C3.065,2,2,3.065,2,4v8c0,0.953,1.047,2,2,2h8c0.935,0,2-1.065,2-2V4c0-0.935-1.065-2-2-2H4z"></path></g></svg>
                  <?php the_field( 'social_instagram_text', 'option' ); ?></a>
              <?php endif; ?>

              <?php if (get_field( 'social_linkedin', 'option' )): ?>
              <a href="<?php the_field( 'social_linkedin', 'option' ); ?>" class="margin-bottom-sm margin-right-md font-light color-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="icon margin-right-xs bi bi-linkedin" viewBox="0 0 12 12">
                  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                </svg>
                  <?php the_field( 'social_linkedin_text', 'option' ); ?></a><br><br>
              <?php endif; ?>
              </p>

        </div>

        <div class="main-footer__colophon  padding-top-xs margin-top-sm">


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
