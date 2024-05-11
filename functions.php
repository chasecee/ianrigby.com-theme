<?php

// Overrides load_fonts function in inc/enqueue.php of parent theme, add custom font here
function load_fonts()
{
	// Google Fonts
	// wp_enqueue_style( 'understrap-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Mono:300,500|Work+Sans:300', false );

}

function understrap_scripts()
{
	// Get the theme data.
	$the_theme = wp_get_theme();

	// Enqueue CSS
	// Bootstrap and Understrap base css
	wp_enqueue_style('understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $the_theme->get('Version'));

	// wp_enqueue_style( 'understrap-gravity-styles', get_template_directory_uri() . '/css/gravitystyles.css', array(), $the_theme->get( 'Version' ) );

	wp_enqueue_style('fancybox-styles', get_stylesheet_directory_uri() . '/css/jquery.fancybox.min.css', array(), $the_theme->get('Version'));

	wp_enqueue_style('vandermark-css', get_stylesheet_directory_uri() . '/fonts/vandermark.css', false);

	wp_enqueue_style('understrap-stylescss', get_stylesheet_directory_uri() . '/style.css', array(), $the_theme->get('Version'));

	// wp_enqueue_style( 'animations-css', get_stylesheet_directory_uri() . '/css/animations.css', false );


	// Enqueue Scripts
	wp_enqueue_script('jquery');

	wp_enqueue_script('popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);

	wp_enqueue_script('typekit', '//use.typekit.net/vur2zwz.js', array(), '1.0.0');

	wp_enqueue_script('understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get('Version'), true);

	wp_enqueue_script('masonry');

	wp_enqueue_script('mainjs-child', get_stylesheet_directory_uri() . '/js/main.js', array(), $the_theme->get('Version'), true);
	wp_enqueue_script('fancybox-js', get_stylesheet_directory_uri() . '/js/jquery.fancybox.min.js', array(), $the_theme->get('Version'), true);

	wp_enqueue_script('vimeoplayer-js', 'https://player.vimeo.com/api/player.js', array('jquery'), '2.0', true);
	wp_enqueue_script('viewportchecker-js', get_stylesheet_directory_uri() . '/js/jquery.viewportchecker.min.js', array('jquery'), '1.8.8', true);
}

add_action('wp_head', 'prefix_typekit_inline');
/**
 * Check to make sure the main script has been enqueued and then load the typekit
 * inline script.
 *
 * @todo Replace prefix with your theme or plugin prefix
 */
function prefix_typekit_inline()
{
	if (wp_script_is('typekit', 'enqueued')) {
		echo '<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
	}
}
// Override auto-read more found in understrap/inc/setup
function all_excerpts_get_more_link($post_excerpt)
{
	return $post_excerpt;
}
add_filter('wp_trim_excerpt', 'all_excerpts_get_more_link');


function base_theme_child_scriptstyle_enqueue()
{
	// wp_enqueue_script( 'base-theme-child-main-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ) );
}
add_action('wp_enqueue_scripts', 'base_theme_child_scriptstyle_enqueue');

register_new_royalslider_files(1);

function get_excerpt($limit, $source = null)
{

	if ($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
	$excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $limit);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
	$excerpt = $excerpt . '...[ ]';
	return $excerpt;
}

function understrap_widgets_init()
{
	register_sidebar(array(
		'name'          => __('Right Sidebar', 'understrap'),
		'id'            => 'right-sidebar',
		'description'   => 'Right sidebar widget area',
		'before_widget' => '<aside id="%1$s" class="widget mb-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Mobile Sidebar', 'understrap'),
		'id'            => 'mobile-sidebar',
		'description'   => 'Mobile sidebar widget area',
		'before_widget' => '<aside id="%1$s" class="widget mb-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}
add_image_size('medium_large', '768', '0', false);
add_image_size('medium_large', '768', '0', false);
add_image_size('index', '400', '225', ["center", "center"]);
add_image_size('homefeatured', '1245', '1245', false);

function understrap_pagination()
{
	if (is_singular()) {
		return;
	}

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ($wp_query->max_num_pages <= 1) {
		return;
	}

	$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
	$max   = intval($wp_query->max_num_pages);
	$links = array();
	/**    Add current page to the array */
	if ($paged >= 1) {
		$links[] = $paged;
	}

	/**    Add the pages around the current page to the array */
	if ($paged >= 3) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if (($paged + 2) <= $max) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">' . "\n";

	/**    Link to first page, plus ellipses if necessary */
	if (!in_array(1, $links)) {
		$class = 1 == $paged ? ' class="active page-item"' : ' class="page-item"';

		printf(
			'<li %s><a class="page-link" href="%s"><i class="fa fa-angle-double-left"></i></a></li>' . "\n",
			$class,
			esc_url(get_pagenum_link(1)),
			'1'
		);

		/**    Previous Post Link */
		if (get_previous_posts_link()) {
			printf(
				'<li class="page-item page-item-direction page-item-prev"><span class="page-link">%1$s</span></li> ' . "\n",
				get_previous_posts_link('<span aria-hidden="true"><i class="fa fa-angle-left"></i></span><span class="sr-only">Previous page</span>')
			);
		}

		if (!in_array(2, $links)) {
			echo '<li class="page-item"></li>';
		}
	}

	// Link to current page, plus 2 pages in either direction if necessary.
	sort($links);
	foreach ((array) $links as $link) {
		$class = $paged == $link ? ' class="active page-item"' : ' class="page-item"';
		printf(
			'<li %s><a href="%s" class="page-link">%s</a></li>' . "\n",
			$class,
			esc_url(get_pagenum_link($link)),
			$link
		);
	}

	// Next Post Link.
	if (get_next_posts_link()) {
		printf(
			'<li class="page-item page-item-direction page-item-next"><span class="page-link">%s</span></li>' . "\n",
			get_next_posts_link('<span aria-hidden="true"><i class="fa fa-angle-right"></i></span><span class="sr-only">Next page</span>')
		);
	}

	// Link to last page, plus ellipses if necessary.
	if (!in_array($max, $links)) {
		if (!in_array($max - 1, $links)) {
			echo '<li class="page-item"></li>' . "\n";
		}

		$class = $paged == $max ? ' class="active "' : ' class="page-item"';
		printf(
			'<li %s><a class="page-link" href="%s" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span><span class="sr-only">%s</span></a></li>' . "\n",
			$class . '',
			esc_url(get_pagenum_link(esc_html($max))),
			esc_html($max)
		);
	}

	echo '</ul></nav>' . "\n";
}

function add_last_nav_item($items, $args)
{
	if ($args->menu->slug == 'main-menu') { // change your menu slug name

		// Add your html
		$item = '<li class="searchbox">
                    <input type="search" placeholder="Search......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
                    <input type="submit" class="searchbox-submit" value="">
                    <span class="searchbox-icon"><i class="fa fa-search"></i></span>
                </li>';
		$items = $item . $items;
	}
	return $items;
}
add_filter('wp_nav_menu_items', 'add_last_nav_item', 10, 2);

// //* Add custom message to WordPress login page

// function smallenvelop_login_message( $message ) {
//     if ( empty($message) ){

//         return "<p><strong>Your hosting account is overdue. Please fulfill your <a href='https://app.hellobonsai.com/i/428379c69602eb9' target='_blank'>invoice for ianrigby.com</a> to restore dashboard access. </strong></p><style>#loginform{display:none;}</style>";
//     } else {
//         return $message;
//     }
// }

// add_filter( 'login_message', 'smallenvelop_login_message' );

function remove_jquery_migrate($scripts)
{
	if (!is_admin() && isset($scripts->registered['jquery'])) {
		$script = $scripts->registered['jquery'];

		if ($script->deps) { // Check whether the script has any dependencies
			$script->deps = array_diff($script->deps, array('jquery-migrate'));
		}
	}
}

add_action('wp_default_scripts', 'remove_jquery_migrate');
