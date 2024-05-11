<?php
if (function_exists('get_field') && get_field('vimeo_preview_video')){
  $iframe = get_field('vimeo_preview_video');
} else {
  $iframe = get_field('vimeo_link');
}
// get iframe HTML
if (function_exists('get_field') && get_field('custom_featured_image')){

  $image = get_field('custom_featured_image');

  } else {
    $image = get_post_thumbnail_id();
  }

// use preg_match to find iframe src
preg_match('/src="(.+?)"/', $iframe, $matches);
preg_match('/width="(.+?)"/', $iframe, $width);
preg_match('/height="(.+?)"/', $iframe, $height);
$src = $matches[1];

$ar = round(($width[1] / $height[1]),2);
$pb = round((1/$ar)*100,2);
$pb_spacer = round($pb/2,2);

// add extra params to iframe src
$params = array(
    'autoplay'    => 1,
    'controls'    => 0,
    'hd'        => 1,
    'autohide'    => 1,
    'background'    => 1,
    'portrait'    => false
);
$new_src = add_query_arg($params, $src);
$empty = "";
$iframe = str_replace($src, $empty, $iframe);


$nonbg_params = array(
    'autoplay'    => 1,
);
$nonbg_src = add_query_arg($nonbg_params, $src);



// preview atts
$attributes = 'frameborder="0" class="embed-responsive-item iframeLazy" src="about:blank" data-src="' . $new_src . '" ';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

// mobile iframe atts
$mobile_attributes = 'frameborder="0" class="embed-responsive-item iframeLazy" src="" data-src="' . $nonbg_src . '" ';
$mobile_iframe = str_replace('></iframe>', ' ' . $mobile_attributes . '></iframe>', $iframe);



?>

  <div class="grid_inner homegrid" >
    <a href="<?php echo $nonbg_src; ?>" data-caption="<a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'>VIEW PROJECT</a>"  class="grid-link" data-fancybox data-ratio="<?php echo $ar; ?>" data-width="" data-height="">
      <?php echo wp_get_attachment_image( $image, $size ); ?>

      <div class="title">
        <h3 class="heading text-uppercase"><?php the_title();?></h3>
      </div>
      <div class="grid_overlay home_overlay fastanim"></div>
    </a>
  </div>
