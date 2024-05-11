<?php
/*
Template Name: News Page
*/

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper">

  <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

    <?php the_content(); ?>
      <div class="row">
        <div class="col-sm-2">
          <!-- Do the right sidebar check -->
      		<?php get_sidebar( 'right' ); ?>
        </div>
        <div class="col-sm-10">
          <?php get_template_part('template-parts/news-wrapper'); ?>
        </div>
      </div>
    </div><!-- .container end -->

</div><!-- .wrapper end -->


<?php
get_footer();
