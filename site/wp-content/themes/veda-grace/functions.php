<?php
/**
 * veda-grace functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package veda-grace
 */

if ( ! function_exists( 'veda_grace_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function veda_grace_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on veda-grace, use a find and replace
		 * to change 'veda-grace' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'veda-grace', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'veda-grace' ),
			'secondary-menu' => esc_html__( 'Secondary Menu', 'veda-grace' ),
			'footer-menu-one' => esc_html__( 'Footer Menu One', 'veda-grace' ),
			'footer-menu-two' => esc_html__( 'Footer Menu Two', 'veda-grace' ),
			'footer-menu-three' => esc_html__( 'Footer Menu Three', 'veda-grace' ),
			'footer-menu-four' => esc_html__( 'Footer Menu Four', 'veda-grace' )
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'veda_grace_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'veda_grace_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function veda_grace_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'veda_grace_content_width', 640 );
}
add_action( 'after_setup_theme', 'veda_grace_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function veda_grace_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'veda-grace' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'veda-grace' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'veda_grace_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function veda_grace_scripts() {
	wp_enqueue_style( 'veda-grace-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'veda-grace-style', get_stylesheet_uri() );
	wp_enqueue_style( 'veda-grace-fonts', 'https://fonts.googleapis.com/css?family=Libre+Baskerville|Nunito' );

	wp_enqueue_script( 'veda-grace-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'veda-grace-jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array(), '20151215', true );
	wp_enqueue_script( 'veda-grace-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '20151215', true );
	wp_enqueue_script( 'veda-grace-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'veda-grace-script', get_template_directory_uri() . '/assets/js/script.js', array(), '20151215', true );

	wp_enqueue_script( 'veda-grace-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'veda_grace_scripts' );

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

