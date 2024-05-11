<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>



	<div class="container-fluid">
    <div class="img-100">
			<?php the_post_thumbnail(); ?>
    </div>
      <div class="row padder">
        <main class="site-main col-sm-4 offset-sm-4" id="main">
          <h1 class="display-4 gold text-uppercase padder_sm_bot text-center"><em><?php the_title(); ?></em></h1>
          <?php the_content(); ?>
        </main>
	</div>

<!-- .wrapper end -->





<?php endwhile; // end of the loop. ?>


<?php
get_footer();
