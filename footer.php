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
          <?php if (get_field( 'social_facebook99', 'option' )): ?>
            <a aria-label="Gå til Facebook-siden vår" href="<?php the_field( 'social_facebook', 'option' ); ?>" target="_blank">
              <!--<svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg>-->
              <svg class="icon margin-right-xs" viewBox="0 0 32 32"><title>Følg oss på Facebook</title><path d="M32,16A16,16,0,1,0,13.5,31.806V20.625H9.438V16H13.5V12.475c0-4.01,2.389-6.225,6.043-6.225a24.644,24.644,0,0,1,3.582.312V10.5H21.107A2.312,2.312,0,0,0,18.5,13v3h4.438l-.71,4.625H18.5V31.806A16,16,0,0,0,32,16Z"></path></svg>
            </a>
          <?php endif; ?>
          <?php if (get_field( 'social_instagram99', 'option' )): ?>
            <a aria-label="Gå til Instagram-siden vår" href="<?php the_field( 'social_instagram', 'option' ); ?>" target="_blank">
              <!--<svg class="icon icon-instagram"><use xlink:href="#icon-instagram"></use></svg>-->
              <svg class="icon margin-right-xs" aria-hidden="true" width="16" height="16" viewBox="0 0 16 16"><g><circle cx="12.145" cy="3.892" r="0.96"></circle><path data-color="color-2" d="M8,12c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4S10.206,12,8,12z M8,6C6.897,6,6,6.897,6,8 s0.897,2,2,2s2-0.897,2-2S9.103,6,8,6z"></path><path d="M12,16H4c-2.056,0-4-1.944-4-4V4c0-2.056,1.944-4,4-4h8c2.056,0,4,1.944,4,4v8C16,14.056,14.056,16,12,16z M4,2C3.065,2,2,3.065,2,4v8c0,0.953,1.047,2,2,2h8c0.935,0,2-1.065,2-2V4c0-0.935-1.065-2-2-2H4z"></path></g></svg>
            </a>
          <?php endif; ?>

              <p>

                
            <?php if (get_field( 'social_facebook', 'option' )): ?>      
              <a href="<?php the_field( 'social_facebook', 'option' ); ?>" class="margin-bottom-sm padding-right-md font-light"><svg class="icon margin-right-xs" viewBox="0 0 32 32"><title>Følg oss på Facebook</title><path d="M32,16A16,16,0,1,0,13.5,31.806V20.625H9.438V16H13.5V12.475c0-4.01,2.389-6.225,6.043-6.225a24.644,24.644,0,0,1,3.582.312V10.5H21.107A2.312,2.312,0,0,0,18.5,13v3h4.438l-.71,4.625H18.5V31.806A16,16,0,0,0,32,16Z"></path></svg> <?php the_field( 'social_facebook_text', 'option' ); ?></a>
            <?php endif; ?>
                  
            <?php if (get_field( 'social_facebook2', 'option' )): ?>      
              <a href="<?php the_field( 'social_facebook2', 'option' ); ?>" class="margin-bottom-sm padding-right-md font-light"><svg class="icon margin-right-xs" viewBox="0 0 32 32"><title>Følg oss på Facebook</title><path d="M32,16A16,16,0,1,0,13.5,31.806V20.625H9.438V16H13.5V12.475c0-4.01,2.389-6.225,6.043-6.225a24.644,24.644,0,0,1,3.582.312V10.5H21.107A2.312,2.312,0,0,0,18.5,13v3h4.438l-.71,4.625H18.5V31.806A16,16,0,0,0,32,16Z"></path></svg> <?php the_field( 'social_facebook_text2', 'option' ); ?></a>
            <?php endif; ?>
            
            <?php if (get_field( 'social_facebook3', 'option' )): ?>      
              <a href="<?php the_field( 'social_facebook3', 'option' ); ?>" class="margin-bottom-sm padding-right-md font-light"><svg class="icon margin-right-xs" viewBox="0 0 32 32"><title>Følg oss på Facebook</title><path d="M32,16A16,16,0,1,0,13.5,31.806V20.625H9.438V16H13.5V12.475c0-4.01,2.389-6.225,6.043-6.225a24.644,24.644,0,0,1,3.582.312V10.5H21.107A2.312,2.312,0,0,0,18.5,13v3h4.438l-.71,4.625H18.5V31.806A16,16,0,0,0,32,16Z"></path></svg> <?php the_field( 'social_facebook_text3', 'option' ); ?></a>
            <?php endif; ?>
                  
              <?php if (get_field( 'social_instagram', 'option' )): ?>
              <a href="<?php the_field( 'social_instagram', 'option' ); ?>" class="margin-bottom-sm padding-right-md font-light color-success"><svg class="icon margin-right-xs" aria-hidden="true" width="16" height="16" viewBox="0 0 16 16"><g><circle cx="12.145" cy="3.892" r="0.96"></circle><path data-color="color-2" d="M8,12c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4S10.206,12,8,12z M8,6C6.897,6,6,6.897,6,8 s0.897,2,2,2s2-0.897,2-2S9.103,6,8,6z"></path><path d="M12,16H4c-2.056,0-4-1.944-4-4V4c0-2.056,1.944-4,4-4h8c2.056,0,4,1.944,4,4v8C16,14.056,14.056,16,12,16z M4,2C3.065,2,2,3.065,2,4v8c0,0.953,1.047,2,2,2h8c0.935,0,2-1.065,2-2V4c0-0.935-1.065-2-2-2H4z"></path></g></svg>
                  <?php the_field( 'social_instagram_text', 'option' ); ?></a><br><br>
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
