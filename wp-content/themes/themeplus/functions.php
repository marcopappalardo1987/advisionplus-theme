<?php
/**
 * Theme Plus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme_Plus
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'themeplus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function themeplus_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Theme Plus, use a find and replace
		 * to change 'themeplus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'themeplus', get_template_directory() . '/languages' );

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
				'primary' 		=> esc_html__( 'Primary Menu', 'themeplus' ),
				'top-header'	=> esc_html__( 'Top Menu', 'themeplus' ),
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
				'themeplus_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'themeplus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themeplus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'themeplus_content_width', 640 );
}
add_action( 'after_setup_theme', 'themeplus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function themeplus_widgets_left_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Left', 'themeplus' ),
			'id'            => 'sidebar-left',
			'description'   => esc_html__( 'Add widgets here.', 'themeplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'themeplus_widgets_left_init' );

function themeplus_widgets_right_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Right', 'themeplus' ),
			'id'            => 'sidebar-right',
			'description'   => esc_html__( 'Add widgets here.', 'themeplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'themeplus_widgets_right_init' );

/**
 * Enqueue public scripts and styles.
 */
if(!class_exists('themeplus_scripts')){
	function themeplus_scripts() {
		wp_enqueue_style( 'themeplus-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_style_add_data( 'themeplus-style', 'rtl', 'replace' );
		wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/inc/framework/bootstrap/js/bootstrap.min.js' );
		wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/inc/framework/bootstrap/css/bootstrap.min.css' );
		wp_enqueue_style( 'themeplus_options_css', get_template_directory_uri() . '/assets/public/css/options.css' );
		wp_enqueue_style( 'themeplus_options_header_css', get_template_directory_uri() . '/assets/public/css/options-header.css' );
		wp_enqueue_style( 'themeplus_fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' );
		
		wp_enqueue_script( 'themeplus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'themeplus_scripts' );
}

/**
 * Enqueue admin scripts and styles.
 */
if(!class_exists('themeplus_admin_scripts')){
	function themeplus_admin_scripts() {
		wp_enqueue_style( 'themeplus-admin-style', get_template_directory_uri().'/assets/admin/css/style.css', array(), _S_VERSION );
		wp_enqueue_style( 'themeplus_options_css', get_template_directory_uri() . '/assets/admin/css/options.css' );
		wp_enqueue_script( 'admin_js', get_template_directory_uri() . '/assets/admin/js/admin.js', '', true );
	}
	add_action( 'admin_enqueue_scripts', 'themeplus_admin_scripts' );
}

/**
 * Implement the Custom Header feature.
 */
if(file_exists(get_template_directory() . '/inc/custom-header.php')){
	require get_template_directory() . '/inc/custom-header.php';
}
/**
 * Custom template tags for this theme.
 */
if(file_exists(get_template_directory() . '/inc/template-tags.php')){
	require get_template_directory() . '/inc/template-tags.php';
}

/**
 * Load Custom Visual Composer Blocks for ThemePlus theme
 */
if ( file_exists(get_template_directory() . '/inc/vc_elements/vc_elements.php') ) {
	require get_template_directory() . '/inc/vc_elements/vc_elements.php';
}

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
if(file_exists(get_template_directory() . '/inc/template-functions.php')){
	require get_template_directory() . '/inc/template-functions.php';
}

/**
 * Customizer additions.
 */
if(file_exists(get_template_directory() . '/inc/customizer.php')){
	require get_template_directory() . '/inc/customizer.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
 
