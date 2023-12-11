<?php
/**
 * CS Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CS_Starter
 */

if ( ! defined( 'csVERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'csVERSION', '0.1.1' );
}

if ( ! defined( 'csTYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `cscontent_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'csTYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'cssetup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cssetup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CS Starter, use a find and replace
		 * to change 'CS-framework' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'CS-framework', get_template_directory() . '/languages' );

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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'cssetup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/scripts.php';
require get_template_directory() . '/inc/styles.php';

/**
 * Enqueue the block editor script.
 */
function csenqueue_block_editor_script() {
	wp_enqueue_script(
		'CS-framework-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		csVERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'csenqueue_block_editor_script' );

/**
 * Create a JavaScript array containing the Tailwind Typography classes from
 * csTYPOGRAPHY_CLASSES for use when adding Tailwind Typography support
 * to the block editor.
 */
function csadmin_scripts() {
	?>
	<script>
		tailwindTypographyClasses = '<?php echo esc_attr( csTYPOGRAPHY_CLASSES ); ?>'.split(' ');
	</script>
	<?php
}
add_action( 'admin_print_scripts', 'csadmin_scripts' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function cstinymce_add_class( $settings ) {
	$settings['body_class'] = csTYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'cstinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/comments-off.php';
require get_template_directory() . '/inc/navs.php';
require get_template_directory() . '/inc/thumbnails.php';
require get_template_directory() . '/inc/clean.php';
require get_template_directory() . '/inc/utilities.php';

/**
 * Register ACF builder lib
 * @link https://github.com/StoutLogic/acf-builder/
 */
require get_template_directory() . '/acf-builder/autoload.php';

/**
 * ACF configuration
 * @link https://github.com/Log1x/acf-builder-cheatsheet
 */

if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

require get_template_directory() . '/acf/options.php';

add_filter('wpcf7_autop_or_not', '__return_false');
