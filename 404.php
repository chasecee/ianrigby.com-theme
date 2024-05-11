<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();


?>

<div class="wrapper" id="404-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found text-center">

						<header class="page-header">
							<h4 class="display-5">That page can&rsquo;t be found.</h4>


						</header><!-- .page-header -->

						<div class="page-content">
                            <div class="row">
                                <div class="col-12">

        							<p>
                                        <?php esc_html_e( 'It looks like nothing was found at this location.',
        							'understrap' ); ?>
											<div class="w-100"></div>
                                        <a href="https://ianrigby.com/" class="btn btn-primary btn-lg" role="button">Home Page</a>
                                    </p>

                                </div>
                            </div>



						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
