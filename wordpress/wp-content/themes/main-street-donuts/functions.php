<?php
define('CRB_THEME_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);

# Enqueue JS and CSS assets on the front-end
add_action('wp_enqueue_scripts', 'crb_wp_enqueue_scripts');
function crb_wp_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue jQuery
	wp_enqueue_script('jquery');

	# Enqueue Custom JS files
	# @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false
	crb_enqueue_script('colorbox', $template_dir . '/js/jquery.colorbox.js');
	crb_enqueue_script('share-icons', '//w.sharethis.com/button/buttons.js');
	crb_enqueue_script('google-aips', '//maps.googleapis.com/maps/api/js');
	crb_enqueue_script('theme-functions', $template_dir . '/js/functions.js', array('jquery'));

	# Enqueue Custom CSS files
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
	crb_enqueue_style('colorbox-styles', $template_dir . '/css/colorbox.css');
	crb_enqueue_style('theme-fonts', $template_dir . '/css/fonts.css');
	crb_enqueue_style('theme-styles', $template_dir . '/style.css');

	# Enqueue Comments JS file
	if (is_singular()) {
		wp_enqueue_script('comment-reply');
	}
}

# Enqueue JS and CSS assets on admin pages
add_action('admin_enqueue_scripts', 'crb_admin_enqueue_scripts');
function crb_admin_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue Scripts
	# @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false
	# crb_enqueue_script('theme-admin-functions', $template_dir . '/js/admin-functions.js', array('jquery'));
	
	# Enqueue Styles
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
	# crb_enqueue_style('theme-admin-styles', $template_dir . '/css/admin-style.css');
}

# Attach Custom Post Types and Custom Taxonomies
add_action('init', 'crb_attach_post_types_and_taxonomies');
function crb_attach_post_types_and_taxonomies() {
	# Attach Custom Post Types
	include_once(CRB_THEME_DIR . 'options/post-types.php');

	# Attach Custom Taxonomies
	include_once(CRB_THEME_DIR . 'options/taxonomies.php');
}

add_action('after_setup_theme', 'crb_setup_theme');

# To override theme setup process in a child theme, add your own crb_setup_theme() to your child theme's
# functions.php file.
if (!function_exists('crb_setup_theme')) {
	function crb_setup_theme() {
		# Make this theme available for translation.
		load_theme_textdomain( 'crb', get_template_directory() . '/languages' );

		# Common libraries
		include_once(CRB_THEME_DIR . 'lib/common.php');
		include_once(CRB_THEME_DIR . 'lib/carbon-fields/carbon-fields.php');
		include_once(CRB_THEME_DIR . 'lib/admin-column-manager/carbon-admin-columns-manager.php');

		# Additional libraries and includes
		include_once(CRB_THEME_DIR . 'includes/comments.php');
		include_once(CRB_THEME_DIR . 'includes/gravity-forms.php');
		
		# Theme supports
		add_image_size('home-featured', 428, 360, true);
		add_image_size('home-middle', 389, 122, true);
		add_image_size('gallery-item', 225, 181, true);

		# Theme supports
		add_theme_support('automatic-feed-links');
		add_theme_support('menus');
		add_theme_support('post-thumbnails');

		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		# Register Theme Menu Locations
		
		register_nav_menus(array(
			'main-menu'=>__('Main Menu', 'crb'),
		));
		
		
		# Attach custom widgets
		include_once(CRB_THEME_DIR . 'options/widgets.php');

		# Attach custom shortcodes
		include_once(CRB_THEME_DIR . 'options/shortcodes.php');

		# Attach custom columns
		include_once(CRB_THEME_DIR . 'options/admin-columns.php');
		
		# Add Actions
		add_action('widgets_init', 'crb_widgets_init');

		add_action('carbon_register_fields', 'crb_attach_theme_options');
		add_action('carbon_after_register_fields', 'crb_attach_theme_help');

		# Add Filters
	}
}

# Register Sidebars
# Note: In a child theme with custom crb_setup_theme() this function is not hooked to widgets_init
function crb_widgets_init() {
	$sidebar_options = array_merge(crb_get_default_sidebar_options(), array(
		'name' => 'Default Sidebar',
		'id'   => 'default-sidebar',
	));
	
	register_sidebar($sidebar_options);
}

# Sidebar Options
function crb_get_default_sidebar_options() {
	return array(
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	);
}

function crb_attach_theme_options() {
	# Attach fields
	include_once(CRB_THEME_DIR . 'options/theme-options.php');
	include_once(CRB_THEME_DIR . 'options/custom-fields.php');
}

function crb_attach_theme_help() {
	# Theme Help needs to be after options/theme-options.php
	include_once(CRB_THEME_DIR . 'lib/theme-help/theme-readme.php');
}

/**
 * Get the main title, based on the current view.
 *
 * @return string The current title.
 */
function crb_get_title() {
	$title = '';

	if ( is_home() || ( is_single() && get_post_type() == 'post' ) ) {
		$blog_page_id = get_option('page_for_posts');
		if ( $blog_page_id && $blog_page = get_post($blog_page_id) ) {
			$title = $blog_page->post_title;
		}
	} elseif (is_search()) {
		$title = sprintf( __( 'Search Results for: %s', 'crb' ), get_search_query() );
	} elseif (is_category()) {
		$title = sprintf( __( 'Category Archives: %s', 'crb' ), single_cat_title('', false) );
	} elseif (is_tag()) {
		$title = sprintf( __( 'Tag Archives: %s', 'crb' ), single_tag_title('', false) );
	} elseif (is_day()) {
		$title = sprintf( __( 'Daily Archives: %s', 'crb' ), get_the_time('F jS, Y') );
	} elseif (is_month()) {
		$title = sprintf( __( 'Monthly Archives: %s', 'crb' ), get_the_time('F, Y') );
	} elseif (is_year()) {
		$title = sprintf( __( 'Yearly Archives: %s', 'crb' ), get_the_time('Y') );
	} elseif (is_author()) {
		$title = sprintf( __( 'Posts by %s', 'crb' ), get_the_author() );
	} elseif (is_archive()) {
		$title = __('Archives', 'crb');
	} elseif (is_404()) {
		$title = __('Error 404 - Not Found', 'crb');
	} elseif (is_page()) {
		$title = get_the_title();
	}

	/**
	 * Filter the current main title
	 *
	 * @param string $title The current main title
	 */
	$title = apply_filters('crb_get_title', $title);

	return $title;
}

/**
 * Display the current main title, based on the current view.
 *
 * @uses crb_get_title()
 * @param string $before Optional HTML before the title
 * @param string $after  Optional HTML after the title
 * @return void
 */
function crb_the_title( $before = '', $after = '' ) {

	/**
	 * Filter the HTML that is displayed before the title
	 *
	 * @param string $before The HTML that is displayed before the title
	 */
	$before = apply_filters('crb_get_title_before', $before);

	/**
	 * Filter the HTML that is displayed after the title
	 *
	 * @param string $after The HTML that is displayed after the title
	 */
	$after = apply_filters('crb_get_title_after', $after);

	/**
	 * Get the current main title
	 */
	$title = crb_get_title();

	/**
	 * Filter the current main title before it is displayed
	 *
	 * @param string $title The current main title
	 */
	$title = apply_filters('crb_the_title', $title);

	/**
	 * If we have a title, display it along with its wrappers
	 */
	if ($title) {
		echo $before . $title . $after;
	}
}