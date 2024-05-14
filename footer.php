<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod('understrap_container_type');


?>
<div class="wrapper-fluid wrapper-navbar" id="wrapper-footer">
	<div class="symbol_wrap text-center">
		<a href="#top">
			<img alt="Navigate to top of page" src="/wp-content/themes/base-theme-child/img/symbol-up.svg" width="120" /></a>
	</div>
	<a class="skip-link screen-reader-text sr-only" href="#content">
		<?php esc_html_e(
			'Skip to content',
			'understrap'
		); ?>
	</a>

	<nav class="navbar navbar-expand-md navbar-dark bg-dark ">

		<div class="container-fluid">

			<!-- Your site title as branding in the menu -->
			<?php if (function_exists('get_field')) {
				$logo = get_field('logo', 'option');
			} ?>
			<?php if ($logo) { ?>
				<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
					<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>" />
				</a>

			<?php } else { ?>
				<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"><?php bloginfo('name'); ?></a>
			<?php } ?><!-- end custom logo -->

			<!--<button class="d-none d-sm-block navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    					<span class="navbar-toggler-icon"></span>
    				</button>-->

			<div class="mr-auto d-none d-sm-inline">
				<span class="dp">CINEMATOGRAPHER</span>
			</div>

			<!-- The WordPress Menu goes here -->
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarNavDropdown',
					'menu_class'      => 'navbar-nav ml-auto justify-content-between d-none d-sm-flex',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'walker'          => new WP_Bootstrap_Navwalker(),
				)
			); ?>


		</div><!-- .container -->

	</nav><!-- .site-navigation -->

</div><!-- .wrapper-navbar end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>