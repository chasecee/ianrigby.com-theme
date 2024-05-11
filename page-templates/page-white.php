<?php
/*
Template Name: White Page
*/



get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="wrapper bg_white p-0" id="mainbgwhite">
<div class="container-fluid gold-left-pad-whitepage">
  <div class="row gold-left">
    <div class="col-sm-12 pt-5 pl-5">
      <h1 class="display-3 gold text-uppercase page-title"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
  </div>
</div>
</div>
<?php endwhile; ?>
<?php
get_footer();
