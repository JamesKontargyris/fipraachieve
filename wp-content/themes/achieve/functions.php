<?php
/**
 * achieve functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package achieve
 */

if ( ! function_exists( 'achieve_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function achieve_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on achieve, use a find and replace
		 * to change 'achieve' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'achieve', get_template_directory() . '/languages' );

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
			'menu-primary' => esc_html__( 'Primary', 'achieve' ),
			'menu-footer'  => esc_html__( 'Footer', 'achieve' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Thumbnail image sizes
		add_image_size( 'banner', 900, 400, true );
		add_image_size( 'member_logo', 300, 300, false );

	}
endif;
add_action( 'after_setup_theme', 'achieve_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function achieve_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'achieve_content_width', 640 );
}

add_action( 'after_setup_theme', 'achieve_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function achieve_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Content Area Footer', 'achieve' ),
		'id'            => 'content-area-footer',
		'description'   => esc_html__( 'Add widgets here that should appear in the content area footer.', 'achieve' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Site Footer', 'achieve' ),
		'id'            => 'site-footer',
		'description'   => esc_html__( 'Add widgets here that should appear in the site footer.', 'achieve' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}

add_action( 'widgets_init', 'achieve_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function achieve_scripts() {
	wp_enqueue_style( 'achieve-style', get_stylesheet_uri() );

	wp_enqueue_script( 'achieve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'achieve-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'achieve-fontawesome', 'https://use.fontawesome.com/e905a8170f.js', array(), '20160417', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'achieve_scripts' );

/**
 * Implement the Custom Header feature.
 */
/*require get_template_directory() . '/inc/custom-header.php';*/

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
/*require get_template_directory() . '/inc/customizer.php';*/

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Sets up support for editor styles and imports them.
 */
function editor_styles_setup() {
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'admin-style.css' );
}

add_action( 'after_setup_theme', 'editor_styles_setup' );

// Editor-specific body background style
add_filter( 'tiny_mce_before_init', 'achieve_theme_editor_dynamic_styles' );
function achieve_theme_editor_dynamic_styles( $mceInit ) {
	$styles = 'body.mce-content-body { background: #ffffff; }';
	if ( isset( $mceInit['content_style'] ) ) {
		$mceInit['content_style'] .= ' ' . $styles . ' ';
	} else {
		$mceInit['content_style'] = $styles . ' ';
	}

	return $mceInit;
}

function achieve_mce_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );

	return $buttons;
}

add_filter( 'mce_buttons_2', 'achieve_mce_buttons' );

// Add anchor button to WYSIWYG editor
function set_tinymce_buttons( $initArray ) {
	$initArray['theme_advanced_buttons1']     = 'formatselect,|,bold,italic,underline,|,bullist,numlist,charmap,|,pastetext,pasteword,|,removeformat,|,anchor,link,unlink,|,undo,redo';
	$initArray['theme_advanced_buttons2']     = '';
	$initArray['theme_advanced_blockformats'] = 'h2,h3,h4,p';

	return $initArray;
}

add_filter( 'tiny_mce_before_init', 'set_tinymce_buttons' );
/*
* Callback function to filter the MCE settings
*/
function achieve_mce_before_init_insert_formats( $init_array ) {

// Define the style_formats array

	$style_formats = array(
		/*
		* Each array child is a format with it's own settings
		* Notice that each array has title, block, classes, and wrapper arguments
		* Title is the label which will be visible in Formats menu
		* Block defines whether it is a span, div, selector, or inline style
		* Classes allows you to define CSS classes
		* Wrapper whether or not to add a new block-level element around any selected elements
		*/
		array(
			'title'   => 'Dark Blue Button',
			'block'   => 'span',
			'classes' => 'button--dark-blue',
			'wrapper' => true,
		),
		array(
			'title'   => 'Light Blue Button',
			'block'   => 'span',
			'classes' => 'button--light-blue',
			'wrapper' => true,
		),
		array(
			'title'   => 'Footnote Reference',
			'inline'  => 'span',
			'classes' => 'footnote__reference',
			'wrapper' => false,
		),
		array(
			'title'   => 'Footnote Text',
			'block'   => 'div',
			'classes' => 'footnote__text',
			'wrapper' => false,
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}

// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'achieve_mce_before_init_insert_formats' );

function get_members( $count = 9999, $offset = 0, $ignore_ids = [], $random = false ): WP_Query {
	$args = [
		'post_status'    => 'publish',
		'post_type'      => 'member',
		'posts_per_page' => $count,
		'post__not_in'   => $ignore_ids,
		'offset'         => $offset,
	];

	if ( $random ) {
		$args['orderby'] = 'rand';
	}

	return new WP_Query( $args );
}