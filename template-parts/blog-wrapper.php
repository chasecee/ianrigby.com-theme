<?php
// Proper loop with pagination https://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops
// requires masonry.js and imagesloaded.js see main.js for implementation masonry_init();
?>
<?php //setup query
if ( is_front_page() ) { $paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1; }
                  else { $paged = get_query_var('paged' ) ? get_query_var( 'paged' ) : 1;}
$custom_query_args = array( 'posts_per_page'=>3, 'paged' => $paged );
// Instantiate custom query
$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;
?>

  <div class="row grid">
      <?php if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

              <div class="grid-item col-sm-6 col-md-4 anim hider">
                <?php get_template_part('template-parts/loop-post'); ?>
              </div><!--end .grid-item -->

      <?php endwhile; endif; wp_reset_postdata(); ?>

      <div class="grid-sizer col-sm-6 col-md-4" style="min-height:0;z-index: -1;"></div>
  </div><!-- end .row .grid -->
  <div class="text-center pt-5">
      <?php
        // Pagination component
        understrap_pagination($custom_query);
        // Reset main query object
        $wp_query = NULL;
        $wp_query = $temp_query;
      ?>
    </div>
