<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */
 $thumb_id = get_post_thumbnail_id();
 $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
 $thumb_url = $thumb_url_array[0];

?>

	<div class="archive_item" id="<?php echo get_the_ID(); ?>">

			<div class="overlay">
				<div class="overlay_offset">
				<?php the_title( sprintf( '<h2 class="text-uppercase bodyfont entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>' ); ?>

				<?php // echo get_the_tag_list( sprintf( '', __( 'Tags', 'textdomain' ) ), ', ', '' ); ?>
			</div>
			</div><!-- end overlay -->
			<a href="<?php echo get_permalink(); ?>" rel="bookmark" class="coverall"></a>
			<?php // echo get_the_post_thumbnail( $post->ID, 'index' ); ?>

	<?php

	// get iframe HTML
	if(get_field('vimeo_link')){
	$iframe = get_field('vimeo_link');
	} else{
	$iframe = get_field('vimeo_preview_video');
	}

	// get iframe HTML
	if(get_field('start_preview_on')){
	$startPreviewOn = get_field('start_preview_on');
	} else{
	$startPreviewOn = 1;
	}

	// use preg_match to find iframe src
	preg_match('/src="(.+?)"/', $iframe, $matches);
	preg_match('/width="(.+?)"/', $iframe, $width);
	preg_match('/height="(.+?)"/', $iframe, $height);
	$src = $matches[1];

	$ar = $width[1] / $height[1];
	$pb = round((1/$ar)*100,2);
	$scaler = round(56.25 / $pb,2);

	// add extra params to iframe src
	$params = array(
			'controls'    => 0,
			'hd'        => 1,
			'autohide'    => 1,
			'background'    => 1,
			'portrait'    => false,
	);

	$nonbg_params = array(
			'controls'    => 0,
			'hd'        => 1,
			'autohide'    => 1,
			'background'    => 1,
			'portrait'    => false,
	);

	$new_src = add_query_arg($params, $src);

	$nonbg_src = add_query_arg($nonbg_params, $src);

	$empty = "";

	$iframe = str_replace($src, $empty, $iframe);


	// add extra attributes to iframe html
	$attributes = 'frameborder="0" data-vimeo-portrait="false" class="embed-responsive-item" data-start="' . $startPreviewOn . '" data-src="' . $new_src . '" ';

	$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


	?>

	<div class="archive_video_overflow" style="background-image:url(<?php echo $thumb_url; ?>);">
	<div class="archive_video iframeloading d-none d-sm-block" id="<?php echo get_the_ID(); ?>">
		<?php
			// echo "<div class='embed-responsive embed-responsive-16by9' style='height:0; padding-bottom:" . $pb ."%; transform:scale(". $scaler .")'>";
			//	echo $iframe;
			// echo "</div>";
		 ?>
	 </div>
 </div>
</div>
