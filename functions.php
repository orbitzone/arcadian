<?php
/**
 * Arcadian functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Arcadian
 */

if ( ! function_exists( 'arcadian_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function arcadian_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Arcadian, use a find and replace
		 * to change 'arcadian' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'arcadian', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'arcadian' ),
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
		add_theme_support( 'custom-background', apply_filters( 'arcadian_custom_background_args', array(
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
add_action( 'after_setup_theme', 'arcadian_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function arcadian_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'arcadian_content_width', 640 );
}
add_action( 'after_setup_theme', 'arcadian_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function arcadian_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'arcadian' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'arcadian' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'arcadian_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function arcadian_scripts() {


	wp_enqueue_style( 'arcadian-style', get_template_directory_uri() . '/assets/dist/css/bundle.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'tweet', 'http://klbtheme.com/movify/wp-content/plugins/recent-tweets-widget/tp_twitter_plugin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'quicksand', 'https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&#038;subset=latin,latin-ext', array(), '1.0.0', 'all' );
	wp_enqueue_script("jquery");
	wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/assets/dist/js/vendor/js.cookie-min.js', array(), '20151215', false );
	wp_enqueue_script( 'vendor1', get_template_directory_uri() . '/assets/dist/js/vendor/jquery.themepunch.tools-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor2', get_template_directory_uri() . '/assets/dist/js/vendor/jquery.themepunch.revolution-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor3', get_template_directory_uri() . '/assets/dist/js/vendor/scripts-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor4', get_template_directory_uri() . '/assets/dist/js/vendor/bootstrap-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor5', get_template_directory_uri() . '/assets/dist/js/vendor/jquery.ajaxchimp-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor6', get_template_directory_uri() . '/assets/dist/js/vendor/magnific-popup-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor7', get_template_directory_uri() . '/assets/dist/js/vendor/jquery.mmenu-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor8', get_template_directory_uri() . '/assets/dist/js/vendor/jquery.inview-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor9', get_template_directory_uri() . '/assets/dist/js/vendor/jquery.countTo-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor10', get_template_directory_uri() . '/assets/dist/js/vendor/jquery.countdown-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor11', get_template_directory_uri() . '/assets/dist/js/vendor/owl.carousel-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor12', get_template_directory_uri() . '/assets/dist/js/vendor/imagesloaded.pkgd-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor13', get_template_directory_uri() . '/assets/dist/js/vendor/isotope.pkgd-min.js', array(), '20151215', true );
	wp_enqueue_script( 'vendor14', get_template_directory_uri() . '/assets/dist/js/vendor/headroom-min.js', array(), '20151215', true );
	wp_enqueue_script( 'match-height', get_template_directory_uri() . '/assets/dist/js/vendor/jquery.matchHeight-min.js', array(), '20151215', true );
	wp_enqueue_script( 'arcadian-script', get_template_directory_uri() . '/assets/dist/js/script-min.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'arcadian_scripts' );
