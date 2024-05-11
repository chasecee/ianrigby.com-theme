<?php
/*
Template Name: Home Page V2
*/



get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="container-fluid">
	<div class="slider_outer">
		<?php echo get_new_royalslider(1); ?>
		  <div class="symbol_wrap text-center">
<!-- 			  <a href="#featured">
			<img src="/wp-content/themes/base-theme-child/img/symbol.svg" width="120" /></a> -->
		  </div>
		  <div id="featured"></div>
		</div>
</div>

<div class="featured">
  <div class="clear clearfix"></div>
  <div id="featured"></div>
  <div class="text-center padder">
    <div class="recent-work heading"><span style="font-size:1.2rem" class="white heading"><em>THE<br/></em></span>
      <span style="font-size:1.5rem" class="gold"><em>FEATURED WORK</em></span>
    </div>
  </div>
  <div class="container-fluid">
    <?php get_template_part('template-parts/grid-wrapper'); ?>
  </div>
</div>
<div class="recent">
  <div class="clear clearfix"></div>
  <div class="text-center padder">
    <div class="recent-work heading"><span style="font-size:1.2rem" class="white heading"><em>THE<br/></span>
      <span style="font-size:1.5rem" class="gold">RECENT WORK</em></span>
    </div>
  </div>
  <div class="container-fluid">
    <?php get_template_part('template-parts/recent-wrapper'); ?>
    <div class="clear clearfix"></div>
    <div class="text-center padder">
      <a href="/work" title="Work of Ian Rigby" class="white heading"><em>VIEW<br/>
  		<span style="font-size:1.5rem" class="gold">ALL WORK</span></em></a>
    </div>
  </div>
</div>

<?php $custom_fields = get_post_custom(); ?>

<!-- .wrapper end -->

<?php
get_footer();
