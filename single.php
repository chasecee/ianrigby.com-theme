<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );


?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="wrapper featured_single_wrap p-0">
	<div class="">
	<?php if(get_field('vimeo_link')){ ?>
		<div class="featured_video_wrap">



			<?php

			// get iframe HTML
			$iframe = get_field('vimeo_link');


			// use preg_match to find iframe src
			preg_match('/src="(.+?)"/', $iframe, $matches);
			preg_match('/width="(.+?)"/', $iframe, $width);
			preg_match('/height="(.+?)"/', $iframe, $height);
			$src = $matches[1];

			$ar = $width[1] / $height[1];
			$pb = round((1/$ar)*100,2);

			// add extra params to iframe src
			$params = array(
			    'controls'    => 1,
			    'hd'        => 1,
			    'autohide'    => 1,
			    'background'    => 0
			);

			$nonbg_params = array(
			    'controls'    => 1,
			    'hd'        => 1,
			    'autohide'    => 1,
			    'background'    => 0
			);

			$new_src = add_query_arg($params, $src);

			$nonbg_src = add_query_arg($nonbg_params, $src);

			$empty = "";

			$iframe = str_replace($src, $new_src, $iframe);


			// add extra attributes to iframe html
			$attributes = 'frameborder="0" class="embed-responsive-item" src="" data-src="' . $new_src . '" ';

			$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

			?>
			<a href="<?php echo $new_src; ?>" data-fancybox data-ratio="<?php echo $ar; ?>" class="play_icon valign"><i class="fa fa-play"></i></a>
			<?php the_post_thumbnail(); ?>
		</div>

	<?php } else {
		the_post_thumbnail();
	}?>
</div>
</div><!-- end featured_video_wrap -->

<?php

	$images = get_field('top_images');
	$size = 'large';

	if( $images ): ?>
	<div class="top_images wrapper text-center ">
		<div class="container-fluid overflow-scroll">
		    <div class="row">

		        <?php foreach( $images as $image ): ?>

		            <div class="col">
									<a href="<?php echo $image['url']; ?>" data-fancybox="top-images" data-caption="<?php if ($image['alt']): echo $image['alt']; else: echo $image['title']; endif; ?>">
		            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
									</a>
		            </div>

		        <?php endforeach; ?>

		    </div>
		</div>
	</div>
<?php else: ?>
	<div style="height:30px;"></div>
<?php endif; ?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row padder_bot">

			<main class="site-main col-sm-4 offset-sm-4" id="main">

					<h1 class="display-4 gold text-uppercase padder_sm_bot text-center"><em><?php the_title(); ?></em></h1>
					<?php the_content(); ?>




			</main><!-- #main -->
		</div>


			<?php

				$bottom_images = get_field('bottom_masonry_gallery');
				$bottom_size = 'large';

				if( $bottom_images ): ?>
				<div class="padder">
				<div class="container" style="border-top: 2px solid #99885b;">
					<div class="symbol_wrap text-center">
						<img src="/wp-content/themes/base-theme-child/img/symbol-mid.svg" width="120">
					</div>
				</div>
			</div>
				<div class="container">
						<?php if(get_field('bottom_gallery_title')): ?>
						<h4 class="gold text-uppercase padder_bot text-center"><em><?php the_field("bottom_gallery_title"); ?></em></h4>
						<?php endif; ?>
							<div class="row grid">
								<div class="grid-sizer col-sm-4"></div>

									<?php foreach( $bottom_images as $bottom_image ): ?>

											<div class="col-sm-4 grid-item">
													<a href="<?php echo $bottom_image['url']; ?>" data-fancybox="gallery" data-caption="<?php if ($bottom_image['alt']): echo $bottom_image['alt']; else: echo $bottom_image['title']; endif; ?>">
													<?php echo wp_get_attachment_image( $bottom_image['ID'], $bottom_size, false,  array('ddata-ffancybox'=>'gallery') ); ?>
													</a>
											</div>

									<?php endforeach; ?>

							</div>
				</div>
			<?php endif; ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
