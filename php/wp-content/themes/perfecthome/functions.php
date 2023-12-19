<?php
/**
 * perfecthome functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package perfecthome
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function perfecthome_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on perfecthome, use a find and replace
		* to change 'perfecthome' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'perfecthome', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'perfecthome' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'perfecthome_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'perfecthome_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function perfecthome_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'perfecthome_content_width', 640 );
}
add_action( 'after_setup_theme', 'perfecthome_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function perfecthome_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'perfecthome' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'perfecthome' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'perfecthome_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function perfecthome_scripts() {
	wp_enqueue_style( 'perfecthome-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'perfecthome-style', 'rtl', 'replace' );

	wp_enqueue_script( 'perfecthome-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'perfecthome_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Register Custom Navigation Walker
 */
function aussie_register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'aussie_register_navwalker' );

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
//Acf Option
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page();	
}

remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 3 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 6;
  return $cols;
}

// Number Pagination Function 
function njengah_number_pagination() {
	/** 
	 * Create numeric pagination in WordPress
	 */	 
	// Get total number of pages
	global $wp_query;
	$total = $wp_query->max_num_pages;
	// Only paginate if we have more than one page
	if ( $total > 1 )  {
	     // Get the current page
	     if ( !$current_page = get_query_var('paged') )
	          $current_page = 1;
	     // Structure of “format” depends on whether we’re using pretty permalinks
	     $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
	     echo paginate_links(array(
	          'base' => get_pagenum_link(1) . '%_%',
	          'format' => $format,
	          'current' => $current_page,
	          'total' => $total,
	          'mid_size' => 4,
	          'type' => 'list'
	     ));
	}
}


//Our Services Post Type services
function my_custom_post_services_management() {

//labels array added inside the function and precedes args array
 
$labels = array(
'name' => _x( 'Services Management', 'post type general name' ),
'singular_name' => _x( 'Services Management', 'post type singular name' ),
'add_new' => _x( 'Add New', 'Services Management' ),
'add_new_item' => __( 'Add New Services Management' ),
'edit_item' => __( 'Edit Services Management' ),
'new_item' => __( 'New Services Management' ),
'all_items' => __( 'All Services Management' ),
'view_item' => __( 'View Services Management' ),
'search_items' => __( 'Search Services Management' ),
'not_found' => __( 'No Services Management found' ),
'not_found_in_trash' => __( 'No Services Management found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Services Management'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Displays Services Management and their ratings',
'public' => true,
'menu_position' => 4,
'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
'has_archive' => true,
);

register_post_type( 'services_management', $args );
register_taxonomy('services_category', 'services_management', array('hierarchical' => true, 'label' => 'Category', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
}
add_action( 'init', 'my_custom_post_services_management' );


add_filter('wpcf7_autop_or_not', '__return_false');
