<?php
// Proper loop with pagination https://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops
// requires masonry.js and imagesloaded.js see main.js for implementation masonry_init();
?>
<?php //setup query
$custom_query_args = array(
  'post_type' => 'post',
  'posts_per_page' => 6,
  'meta_query' => array(
    array(
		'key'     => 'include_post_in_recent_on_homepage',
		'value'   => '1',
		'compare' => '=='
	  ),
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
<div class="row grid-row">
      <?php if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                <div class="col-xl-4 col-sm-6 grid-pad">
                <?php
                get_template_part( 'template-parts/grid-post' );
                ?>
                </div>
      <?php $i++; endwhile; endif; wp_reset_postdata(); ?>
</div>
      <?php
        // Reset main query object
        $wp_query = NULL;
        $wp_query = $temp_query;
      ?>
