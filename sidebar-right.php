<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>


<div class="widget-area text-uppercase" id="sidebar" role="complementary">

<?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #secondary -->
