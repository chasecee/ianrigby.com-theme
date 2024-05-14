<?php

/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod('understrap_container_type');
$sidebar_pos = get_theme_mod('understrap_sidebar_position');
?>

<div class="wrapper p-0" id="wrapper-index">

	<div class="container-fluid gold-left-pad" id="content" tabindex="-1">

		<div class="row gold-left">

			<div class="col-12 d-sm-none text-uppercase mobile-sidebar text-center padder_sm_bot">
				<h3 class="widget-title text-uppercase gold display-4 mobile-title">
					<a href="/work/" title="Work of Ian Rigby">WORK</a>
				</h3>
				<div class="mobile-menu-item current-cat-item" data-toggle="collapse" data-target="#collapseMobile" aria-expanded="false" aria-controls="collapseMobile"><?php single_tag_title(); ?> <i style=" padding-left: 5px; " class="fa fa-angle-down"></i></div>
				<!---->
				<div class="collapse" id="collapseMobile">
					<div class="mobile-menu-item"><a href="/work/" title="Most Recent Work of Ian Rigby">Most Recent</a></div>
					<?php get_sidebar('mobile'); ?>
				</div>
			</div>

			<div class="col-12 col-sm-3 col-lg-4 col-xl-3 max-col d-none d-sm-block">
				<div class="sticky">
					<div class="sticky_inner">
						<h3 class="widget-title text-uppercase gold display-4"><a href="/work/" title="Work of Ian Rigby">WORK</a></h3>
						<aside id="lc_taxonomy-2" class="widget widget_lc_taxonomy text-uppercase">
							<div id="lct-widget-post_tag-container" class="list-custom-taxonomy-widget">
								<ul id="lct-widget-post_tag" class="m-0">
									<li class="cat-item cat-item-5"><a href="/work/" title="Most Recent Work of Ian Rigby">Most Recent</a>
									</li>
								</ul>
							</div>
						</aside>

						<?php get_sidebar('right'); ?>
					</div>
				</div>
			</div>

			<main class="col site-main padder_lg_bot" id="main">
				<div class="row grid-row">
					<?php if (have_posts()) : ?>



						<?php /* Start the Loop */ ?>

						<?php while (have_posts()) : the_post(); ?>
							<div class="col-md-6  my-2 m-sm-0 grid_outer">
								<?php
								$size = 'homegrid';
								include(locate_template('template-parts/grid-post-index.php')); ?>
							</div>
						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part('loop-templates/content', 'none'); ?>

					<?php endif; ?>
				</div>
			</main><!-- #main -->
			<div class="col-sm-10 offset-sm-2">
				<!-- The pagination component -->
				<?php understrap_pagination(); ?>
			</div>
		</div><!-- #primary -->


	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>