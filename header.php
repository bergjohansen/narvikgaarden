<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<?php wp_head(); ?>

	<?php if(get_field('code', 'option')): ?>
		<?php the_field('code', 'option'); ?>
	<?php endif; ?>

	<?php if(get_field('code_accept', 'option')): ?>
		<script>
			var site_functions = (function() {
				var executed = false;
				return function() {
					if (!executed) {
						executed = true;
						<?php the_field('code_accept', 'option'); ?>
					}
				}
			})();
		</script>
	<?php endif; ?>

	<link href="<?php the_field('favicon', 'option'); ?>" rel="shortcut icon">
</head>

<body <?php body_class(); ?> data-theme="default">
<?php wp_body_open(); ?>
<?php if (get_field( 'campaign', 'option' )): ?>
	<!--Alert notice-->
	<div class="pre-header padding-y-xs js-pre-header" data-theme="<?php the_field('color_theme' , 'option'); ?>">
		<div class="container max-width-lg position-relative">
			<div class="text-component text-center text-sm padding-x-lg">
				<?php the_field( 'campaign', 'option' ); ?></p>
			</div>

			<button class="reset pre-header__close-btn js-pre-header__close-btn">
				<svg class="icon" viewBox="0 0 16 16"><title>Lukk banner</title><g stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"><line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line><line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line></g></svg>
			</button>
		</div>
	</div>
<?php endif; ?>

	
	<header class="header position-relative js-header" data-theme="blue">
	  <div class="header__container container max-width-lg">
	    <div class="header__logo">
					<a class="navbar-item nav__logo__link" href="<?php echo get_home_url(); ?>">
							<!--do nothing-->
							<?php if (get_field( 'logo_main', 'option' )): ?>
								<img class="nav__logo__img" src="<?php the_field( 'logo_main', 'option' ); ?>" alt="<?php echo get_bloginfo(); ?> " height="<?php the_field( 'logo_height' , 'option'); ?>">
							<?php else: ?>
								<span><?php echo get_bloginfo(); ?></span>
							<?php endif; ?>
					</a>
	    </div>

	    <button class="btn btn--subtle header__trigger js-header__trigger" aria-label="Toggle menu" aria-expanded="false" aria-controls="header-nav">
	      <i class="header__trigger-icon" aria-hidden="true"></i>
	      <span>&nbsp;</span>
	    </button>

	    <nav class="header__nav js-header__nav" id="header-nav" role="navigation" aria-label="Main">
	      <div class="header__nav-inner">
					<?php wp_nav_menu(); ?>
	      </div>
	    </nav>
	  </div>
	</header>
