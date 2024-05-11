<?php
/*
Template Name: Reel Page
*/

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php   $image = get_field('background_image'); ?>

<div class="wrapper p-0">
    <div class="featured_video_wrap reel" style="background-image:url(<?php echo $image; ?>);">
      <?php

      // get iframe HTML
      $iframe = get_field('reel_vimeo_link');


      // use preg_match to find iframe src
      preg_match('/src="(.+?)"/', $iframe, $matches);
      preg_match('/width="(.+?)"/', $iframe, $width);
      preg_match('/height="(.+?)"/', $iframe, $height);
      $src = $matches[1];

      $ar = $width[1] / $height[1];
      $pb = round((1/$ar)*100,2);

      // add extra params to iframe src
      $params = array(
          'controls'    => 0,
          'hd'        => 1,
          'autohide'    => 1,
          'background'    => 0
      );

      $nonbg_params = array(
          'controls'    => 0,
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
      <a href="<?php echo $new_src; ?>" data-lity class="play_icon valign heading">
        <?php the_field("play_text"); ?></a>

    </div>
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

    </div><!-- .container end -->

</div><!-- .wrapper end -->


<?php
get_footer();
