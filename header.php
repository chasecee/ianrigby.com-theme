<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<meta name="google-site-verification" content="azpLiq5aIEASyyKfXI8GBAob8VAuI80-cgw4wIzjGZk" />
</head>

<body <?php body_class(); ?>>
	<?php do_action('body_begin'); // pulls custom body code theme option via inc/helper-functions.php ?>
<div id="top"></div>
<div class="hfeed site" id="page">
	<!-- <div class="padder_bot header_pad header_spacer"></div> -->
	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-dark ">

			<div class="container-fluid">

				<!-- Your site title as branding in the menu -->
				<?php if ( function_exists( 'get_field' ) ) { $logo = get_field('logo','option'); } ?>
				<?php	if ( $logo ) { ?>
						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>" />
						</a>

				<?php } else { ?>
					<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<?php } ?><!-- end custom logo -->



						<div class="mr-auto d-none d-md-block">
							<span class="dp">CINEMATOGRAPHER</span>
						</div>

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar topbar"></span>
							<span class="icon-bar midbar"></span>
							<span class="icon-bar botbar"></span>
		    		</button>
						<!-- The WordPress Menu goes here -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav ml-auto justify-content-between',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'walker'          => new WP_Bootstrap_Navwalker(),
							)
						); ?>
						<a class="instalink d-none d-md-block" href="https://www.instagram.com/ian_rigby/" title="Ian Rigby on Instagram">
							<img width="18" height="18" alt="Ian Rigby on Instagram" src="/wp-content/themes/base-theme-child/img/Instagram_simple_icon.svg" />
						</a>
			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->
<!-- <div class="padder_bot header_pad d-none d-sm-block"></div> -->
<div class="fixed_padder"></div>
