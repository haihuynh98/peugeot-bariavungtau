<?php
/**
 * Peugeot Vung Tau functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Peugeot_Vung_Tau
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function peugeot_vungtau_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Peugeot Vung Tau, use a find and replace
		* to change 'peugeot_vungtau' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('peugeot_vungtau', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'peugeot_vungtau'),
			'menu-product-footer' => esc_html__('Product footer', 'peugeot_vungtau'),
			'menu-policy-footer' => esc_html__('Policy footer', 'peugeot_vungtau'),
			'menu-inside-news' => esc_html__('Inside news page', 'peugeot_vungtau'),
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
			'peugeot_vungtau_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}

add_action('after_setup_theme', 'peugeot_vungtau_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function peugeot_vungtau_content_width()
{
	$GLOBALS['content_width'] = apply_filters('peugeot_vungtau_content_width', 640);
}

add_action('after_setup_theme', 'peugeot_vungtau_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function peugeot_vungtau_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'peugeot_vungtau'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'peugeot_vungtau'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}

add_action('widgets_init', 'peugeot_vungtau_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function peugeot_vungtau_scripts()
{
	wp_enqueue_style('peugeot_vungtau-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('peugeot_vungtau-style', 'rtl', 'replace');
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), _S_VERSION);

	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css');
	wp_enqueue_style('font-awesome-all', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css');
	wp_enqueue_style('swiper-bundle', get_stylesheet_directory_uri() . '/css/swiper/swiper-bundle.min.css', array(), _S_VERSION);

	if (!wp_script_is('jquery', 'enqueued')) {
		//Enqueue
		wp_enqueue_script('jquery');

	}
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.js', array(), _S_VERSION);
	wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/js/swiper/swiper-bundle.min.js', array(), _S_VERSION);
	wp_enqueue_script('common-jquery', get_template_directory_uri() . '/js/common-jquery.js', array(), _S_VERSION, true);

	if (is_page_template(['page_contact-template.php'])) {
		wp_enqueue_style('contact-page', get_template_directory_uri() . '/css/contact-page.css', array(), _S_VERSION);
	}

	if (is_page_template(['page_pricing.php'])) {
		wp_enqueue_style('pricing-page', get_template_directory_uri() . '/css/pricing-page.css', array(), _S_VERSION);
	}

	if (is_singular(array('product'))) {
		wp_enqueue_style('product-page', get_template_directory_uri() . '/css/product.css', array(), _S_VERSION);
	}


	if (is_home()) {
		wp_enqueue_style('home-page', get_stylesheet_directory_uri() . '/css/home-page.css', array(), _S_VERSION);
	}

	if (is_archive()) {
		wp_enqueue_style('archive-page', get_stylesheet_directory_uri() . '/css/archive.css', array(), _S_VERSION);
	}

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'peugeot_vungtau_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


// load script at head
require get_template_directory() . '/functions/head.php';

// load setup contact page
require get_template_directory() . '/functions/contact.php';
require get_template_directory() . '/functions/module-carousel.php';
require get_template_directory() . '/functions/module-extra-product-cat.php';

add_action('post_submitbox_misc_actions', 'publish_main_product');
function publish_main_product($post)
{
	if (get_post_type() == 'product') {
		$value = get_post_meta($post->ID, '_publish_main_product', true);
		echo '<div class="misc-pub-section misc-pub-section-last">
         <span id="timestamp">'
			. '<label><input type="checkbox"' . (!empty($value) ? ' checked="checked" ' : null) . 'value="1" name="publish_main_product" />Main Product</label>'
			. '</span></div>';
	}
}

add_action( 'save_post', 'save_product_data' );
function save_product_data($postid)
{

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false;
	if (!current_user_can('edit_page', $postid)) return false;
	if (empty($postid) || $_POST['post_type'] != 'product') return false;

	if ($_POST['action'] == 'editpost') {
		delete_post_meta($postid, '_publish_main_product');
	}

	if (isset($_POST['publish_main_product'])) {
		add_post_meta($postid, '_publish_main_product', $_POST['publish_main_product']);
	}
}
