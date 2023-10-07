<?php define( 'NEWSES_THEME_DIR', get_template_directory() . '/' );
	define( 'NEWSES_THEME_URI', get_template_directory_uri() . '/' );
	define( 'NEWSES_THEME_SETTINGS', 'newses-settings' );
	
	
	$newses_theme_path = get_template_directory() . '/inc/ansar/';

	require( $newses_theme_path . '/newses-custom-navwalker.php' );
	require( $newses_theme_path . '/default_menu_walker.php' );
	require( $newses_theme_path . '/font/font.php');
	require( $newses_theme_path . '/template-tags.php');
	require( $newses_theme_path . '/template-functions.php');
	require ( $newses_theme_path . '/custom-control/custom-control.php');
	require_once( trailingslashit( get_template_directory() ) . 'inc/ansar/customize-pro/class-customize.php' );

	$newses_theme_start = wp_get_theme();
	if (( 'Newses' == $newses_theme_start->name) || ('Newstype' == $newses_theme_start->name) || ('News Zone' == $newses_theme_start->name) || ('Newsze' == $newses_theme_start->name) || ('Blogway' == $newses_theme_start->name)) {
	if ( is_admin() ) {
		require ($newses_theme_path . '/admin/getting-started.php');
	}
	}

	// Theme version.
	$newses_theme = wp_get_theme();
	define( 'NEWSES_THEME_VERSION', $newses_theme->get( 'Version' ) );
	define ( 'NEWSES_THEME_NAME', $newses_theme->get( 'Name' ) );

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $newses_theme_path .'/enqueue.php');
	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */
	require( $newses_theme_path . '/customize/customizer.php');

	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */

	require( $newses_theme_path  . '/widgets/widgets-init.php');

	/* ----------------------------------------------------------------------------------- */
	/* Widget */
	/* ----------------------------------------------------------------------------------- */

	require( $newses_theme_path  . '/hooks/hooks-init.php');
	
	require_once( trailingslashit( get_template_directory() ) . 'inc/ansar/customize-pro/class-customize.php' );

if ( ! function_exists( 'newses_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function newses_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on newses, use a find and replace
	 * to change 'newses' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'newses', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/* Add theme support for gutenberg block */
	add_theme_support( 'align-wide' );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary menu', 'newses' ),
        'footer' => __( 'Footer menu', 'newses' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
     * Enable support for Post Formats on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/post-formats/
     */
    add_theme_support( 'post-formats', array( 'image', 'video', 'gallery' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'newses_custom_background_args', array(
		'default-color' => '#eee',
		'default-image' => '',
	) ) );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');

     // Woocommerce Gallery Support
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

    // Added theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	//Custom logo
	add_theme_support(
    'custom-logo',
    array(
        'unlink-homepage-logo' => true, // Add Here!
    	)
	);
	
	// custom header Support
			$args = array(
			'default-image'	=>  get_template_directory_uri() .'/images/head-back.jpg',
			'width'			=> '1600',
			'height'		=> '600',
			'flex-height'		=> false,
			'flex-width'		=> false,
			'header-text'		=> true,
			'default-text-color'	=> 'fff',
            'wp-head-callback' => 'newses_site_info_style',

		);
		add_theme_support( 'custom-header', $args );

}
endif;
add_action( 'after_setup_theme', 'newses_setup' );


	function newses_the_custom_logo() {
	
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}

	}

	add_filter('get_custom_logo','newses_logo_class');


	function newses_logo_class($html)
	{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newses_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newses_content_width', 640 );
}
add_action( 'after_setup_theme', 'newses_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newses_widgets_init() {
	
	$newses_footer_column_layout = esc_attr(get_theme_mod('newses_footer_column_layout',3));
	
	$newses_footer_column_layout = 12 / $newses_footer_column_layout;
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'newses' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-wid-title"><h6 class="wtitle"><span class="bg">',
		'after_title'   => '</span></h6></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front-page Content Section', 'newses'),
		'id'            => 'front-page-content',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="newses-front-page-content-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front-page Sidebar Section', 'newses'),
		'id'            => 'front-page-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-wid-title"><h6><span class="bg">',
		'after_title'   => '</span></h6></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'newses' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div class="col-md-'.$newses_footer_column_layout.' col-sm-6"><div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );

}
add_action( 'widgets_init', 'newses_widgets_init' );

//Editor Styling 
add_editor_style( array( 'css/editor-style.css') );


add_filter('wp_nav_menu_items', 'newses_add_home_link', 1, 2);
function newses_add_home_link($items, $args){
    if( $args->theme_location == 'primary' ){
        $item = '<li class="active home"><a class="nav-link homebtn" title="Home" href="'. esc_url( home_url() ) .'">' . "<span class='fa fa-home'></span>" . '</a></li>';
        $items = $item . $items;
    }
    return $items;
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}