<?php
// Proper loop with pagination https://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops
// requires masonry.js and imagesloaded.js see main.js for implementation masonry_init();
?>
<?php //setup query
$custom_query_args = array(
  'post_type' => 'post',
  'posts_per_page' => -1,
  'meta_query' => array(
    array(
      'key' => 'feature_this_post',
      'value' => '1',
      'compare' => '==' // not really needed, this is the default
    )
  )
);
// Instantiate custom query
$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;
$i = 0;
?>
<div class="featured_loop">
      <?php if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                <?php
                include(locate_template('template-parts/featured-post.php'));
                ?>

      <?php $i++; endwhile; endif; wp_reset_postdata(); ?>
</div>
  <div class="text-center pt-5">
      <?php
        // Reset main query object
        $wp_query = NULL;
        $wp_query = $temp_query;
        
      ?>
    </div>
