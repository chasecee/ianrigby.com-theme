<?php
/*
Template Name: Home Page
*/



get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="">
<?php echo get_new_royalslider(1); ?>
  <div class="symbol_wrap text-center">
	  <a href="#featured">
    <img src="/wp-content/themes/base-theme-child/img/symbol.svg" width="120" /></a>
  </div>
  <div id="featured"></div>
</div>

<div class="featured wrapper ">

    <div class=" gold padder padder_lg_bot text-center">
      <span style="font-size:1.2rem" class="white heading"><em>THE<br/></span></em>
      <h2 class="display-3 text-center  " >FEATURED WORK</h2>
    </div>
  <div class="clear clearfix"></div>
  <div id="featured"></div>
  <?php get_template_part('template-parts/featured-wrapper'); ?>

</div>
<div class="recent wrapper">
  <div class="clear clearfix"></div>
  <div class="text-center padder">
    <div class="recent-work heading"><span style="font-size:1.2rem" class="white heading"><em>THE<br/></span>
      <span style="font-size:1.5rem" class="gold">RECENT WORK</em></span>
    </div>
  </div>
  <div class="container-fluid">
  <div class="padder_15">
  <?php get_template_part('template-parts/recent-wrapper'); ?>
  </div>
  <div class="clear clearfix"></div>
  <div class="text-center padder">
    <a href="/work" title="Work of Ian Rigby" class="white heading"><em>VIEW<br/>
		<span style="font-size:1.5rem" class="gold">All WORK</span></em></a>
  </div>
</div>
</div>

<?php $custom_fields = get_post_custom(); ?>

<!-- .wrapper end -->

<?php
get_footer();
