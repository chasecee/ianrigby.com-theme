<?php

// get iframe HTML
$iframe = get_field('vimeo_preview_video');


// use preg_match to find iframe src
preg_match('/src="(.+?)"/', $iframe, $matches);
preg_match('/width="(.+?)"/', $iframe, $width);
preg_match('/height="(.+?)"/', $iframe, $height);
$src = $matches[1];

// Check if width and height are set and not zero to avoid division by zero error
if (!empty($width[1]) && !empty($height[1]) && $width[1] != 0 && $height[1] != 0) {
  $ar = $width[1] / $height[1];
  $pb = round((1 / $ar) * 100, 2);
  $pb_spacer = round($pb / 2, 2);
} else {
  // Set default aspect ratio if width or height is zero or not set
  $ar = 16 / 9; // Default to 16:9 aspect ratio
  $pb = round((1 / $ar) * 100, 2);
  $pb_spacer = round($pb / 2, 2);
}

// add extra params to iframe src
$params = array(
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
  'controls'    => 0,
  'hd'        => 1,
  'autohide'    => 1,
  'background'    => 0
);
$nonbg_src = add_query_arg($nonbg_params, $src);



// preview atts
$attributes = 'frameborder="0" class="embed-responsive-item iframeLazy" src="about:blank" data-src="' . $new_src . '" ';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

// mobile iframe atts
$mobile_attributes = 'frameborder="0" class="embed-responsive-item iframeLazy" src="" data-src="' . $nonbg_src . '" ';
$mobile_iframe = str_replace('></iframe>', ' ' . $mobile_attributes . '></iframe>', $iframe);


if (function_exists('get_field') && get_field('read_more_links_to_url')) {
  if (get_field('url_or_file') == 'URL') {
    $post_link = get_field('read_more_url') ? get_field('read_more_url') : get_permalink();
  } else if (get_field('url_or_file') == 'File') {
    $post_link = get_field('read_more_file')['url'] ? get_field('read_more_file')['url'] : get_permalink();
  }

  $open_new_window = get_field('open_link_in_new_tab') ? 'target="_blank"' : '';
} else {
  $post_link = get_permalink();
  $open_new_window = '';
}

?>
<div class="post_item_outer">
  <div class="post_item_inner">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-lg-12 col-sm-5 col-12 d-sm-block d-none">
          <div class="preview_title">
            <h3><em><strong><a class="gold" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></strong></em></h3>
          </div>
        </div>
        <!--<div class="col-12 d-none d-sm-none">
          <?php
          echo "<div class='embed-responsive embed-responsive-16by9' style='height:0; padding-bottom:" . $pb . "%;'>";
          echo "<iframe class='embed-responsive-item mobileLazy' data-src='" . $nonbg_src . "&title=0&byline=0&portrait=0' src='about:blank'></iframe>";
          echo "</div>";
          ?>
        </div> -->
        <div class="col-12"></div>
        <div class="col-xl-9 col-lg-8 col-sm-6 ">
          <a class="img_link link_cover d-none d-sm-block " href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
          <a href="<?php echo $nonbg_src; ?>" data-fancybox data-ratio="<?php echo $ar; ?>" class="play_icon valign d-block d-sm-none"><i class="fa fa-play"></i></a>
          <?php the_post_thumbnail('homefeatured');  ?>
        </div>
        <div class="col-lg-12 col-sm-5 col-12 d-sm-none d-block">
          <div class="preview_title">
            <h3 class="bodyfont"> <a class="" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6 video_col">
          <div class="preview_wrap d-none d-sm-block">
            <div class="preview_overlay">
              <div class="preview_center text-center">
                <a href="<?php echo $post_link  ?>" title="<?php the_title(); ?>" class="text-bold" <?php echo $open_new_window; ?>>VIEW PROJECT</a>

                <a href="<?php echo $nonbg_src; ?>" class=" pl-3" data-fancybox>PLAY VIDEO </a>
              </div>
            </div>
            <div class="d-none d-sm-block" id="<?php echo get_the_ID(); ?>">
              <?php
              echo "<div class='embed-responsive embed-responsive-16by9' style='height:0; padding-bottom:" . $pb . "%;margin-bottom:-" . $pb_spacer . "%;'>";
              echo $iframe;
              echo "</div>";
              ?>
            </div>

          </div>

          <div class="post-text">
            <p class="post-description">
              <?php if (get_field('custom_featured_description')) {
                the_field('custom_featured_description');
              } else {
                echo get_excerpt(120);
              }  ?>
            </p>
            <a href="<?php echo $post_link  ?>" title="<?php the_title(); ?>" class=" text-bold" <?php echo $open_new_window; ?>><em>VIEW PROJECT</em></a>


            <?php if (get_field('custom_credits')) { ?>
              <div class="text-bold text-uppercase padder_sm_top">
                <strong>
                  <?php the_field('custom_credits'); ?>
                </strong>
              </div>
            <?php } ?>

          </div>



        </div>

      </div>






    </div>
  </div><!-- end .post_item_inner -->
</div><!-- end .post_item_outer -->