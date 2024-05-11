<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="wrapper p-0" id="wrapper-index">

	<div class="container-fluid gold-left-pad" id="content" tabindex="-1">

		<div class="row gold-left">

			<div class="col-12 d-sm-none text-uppercase mobile-sidebar text-center padder_sm_bot">
				<h3 class="widget-title text-uppercase gold display-4 mobile-title">
					WORK</h3>
					<div class="mobile-menu-item current-cat-item" data-toggle="collapse" data-target="#collapseMobile" aria-expanded="false" aria-controls="collapseMobile">MOST RECENT <i style=" padding-left: 5px; " class="fa fa-angle-down"></i></div>
					<!---->
					<div class="collapse" id="collapseMobile">
						<?php get_sidebar( 'mobile' ); ?>
					</div>
			</div>

			<div class="col-12 col-sm-3 col-lg-4 col-xl-3 max-col d-none d-sm-block">
				<div class="sticky">
					<div class="sticky_inner">
						<h3 class="widget-title text-uppercase gold display-4">WORK</h3>
						<aside id="lc_taxonomy-2" class="text-uppercase widget widget_lc_taxonomy"><div id="lct-widget-post_tag-container" class="list-custom-taxonomy-widget"><ul id="lct-widget-post_tag" class="m-0">	<li class="cat-item cat-item-5 current-cat">All Work
						</li></ul></div></aside>

						<?php get_sidebar( 'right' ); ?>
				</div>
				</div>
			</div>
			<main class="col site-main padder_lg_bot" id="main">
				<div class="row grid-row">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-md-6  my-2 m-sm-0 grid_outer" >

							<?php
							$size = 'homegrid';
							include(locate_template('template-parts/grid-post-index.php')); ?>
						</div>
					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>
			</div>
			</main><!-- #main -->

			<div class="col-sm-10 offset-sm-2">
				<!-- The pagination component -->
				<?php understrap_pagination(); ?>
			</div>

		</div><!-- #primary -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
