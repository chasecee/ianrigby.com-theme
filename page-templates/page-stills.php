<?php
/*
Template Name: Stills Page

*/



get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>

<?php

	$bottom_images = get_field('gallery');
	$bottom_size = 'large';

	if( $bottom_images ): ?>

	<div class="container-fluid">
			<?php if(get_field('bottom_gallery_title')): ?>
			<h4 class="gold text-uppercase padder_bot text-center"><em><?php the_field("bottom_gallery_title"); ?></em></h4>
			<?php endif; ?>
				<div class="row grid">
					<div class="grid-sizer col-sm-6 col-lg-4"></div>

						<?php foreach( $bottom_images as $bottom_image ): ?>

								<div class="col-sm-6 col-lg-4 grid-item">

										<a href="<?php echo $bottom_image['url']; ?>" data-fancybox="gallery" data-captions="<?php if ($bottom_image['alt']): echo $bottom_image['alt']; else: echo $bottom_image['title']; endif; ?>">
										<?php echo wp_get_attachment_image( $bottom_image['ID'], $bottom_size, false,  array('llloading'=>'lllazy') ); ?>
										<div class="grid_overlay fastanim"></div>
										</a>

								</div>

						<?php endforeach; ?>

				</div>
	</div>
<?php endif; ?>

<!-- .wrapper end -->





<?php endwhile; // end of the loop. ?>
<?php
get_footer();
