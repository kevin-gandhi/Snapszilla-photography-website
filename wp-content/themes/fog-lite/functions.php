<?php
/**
 * wedding_photo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fog-lite-pro
 */
 /*
 */
$lastss_unique=array(
	'wedding_aboutus_heading'=>'Wedding Photography',
	'wedding_faq_one_text'=>'Great Photos With Experienced Photographer',
	
	'wedding_faq_one_detail'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a urna in nunc auctor faucibus vitae et dui. Suspendisse iaculis, tellus non volutpat volutpat, felis dolor faucibus felis, at iaculis est sem eu dui. Vivamus erat quam, ultrices eu accumsan non, imperdiet vitae nunc. Ut ultrices volutpat mollis.',
	
	'wedding_faq_two_text'=>'We Provide Retouching And Editing Service',
	'wedding_faq_two_detail'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a urna in nunc auctor faucibus vitae et dui. Suspendisse iaculis, tellus non volutpat volutpat, felis dolor faucibus felis, at iaculis est sem eu dui. Vivamus erat quam, ultrices eu accumsan non, imperdiet vitae nunc. Ut ultrices volutpat mollis.',
	
	'wedding_faq_three_text'=>'Use Most Advanced Equipments',
	'wedding_faq_three_detail'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a urna in nunc auctor faucibus vitae et dui. Suspendisse iaculis, tellus non volutpat volutpat, felis dolor faucibus felis, at iaculis est sem eu dui. Vivamus erat quam, ultrices eu accumsan non, imperdiet vitae nunc. Ut ultrices volutpat mollis.',
	
	'wedding_faq_four_text'=>'Why We Are Different From Others',
	'wedding_faq_four_detail'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a urna in nunc auctor faucibus vitae et dui. Suspendisse iaculis, tellus non volutpat volutpat, felis dolor faucibus felis, at iaculis est sem eu dui. Vivamus erat quam, ultrices eu accumsan non, imperdiet vitae nunc. Ut ultrices volutpat mollis.',
	
	'wedding_counters_one_number'=>'204',
	'wedding_counters_one_label'=>'Total Events',
	
	'wedding_counters_two_number'=>'9',
	'wedding_counters_two_label'=>'Photography Awards',
	
	'wedding_counters_three_number'=>'15',
	'wedding_counters_three_label'=>'Photography Shots',
	
	'wedding_counters_four_number'=>'87',
	'wedding_counters_four_label'=>'Happy Clients',
);

if ( ! function_exists( 'wedding_photo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wedding_photo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wedding_photo, use a find and replace
		 * to change 'fog-lite-pro' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fog-lite-pro', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'fog-lite-pro' ),
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
		add_theme_support( 'custom-background', apply_filters( 'wedding_photo_custom_background_args', array(
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
add_action( 'after_setup_theme', 'wedding_photo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wedding_photo_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wedding_photo_content_width', 640 );
}
add_action( 'after_setup_theme', 'wedding_photo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wedding_photo_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fog-lite-pro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fog-lite-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
}
add_action( 'widgets_init', 'wedding_photo_widgets_init' );

function register_my_menu() {
  register_nav_menu('new-menu',__( 'Footer Menu','fog-lite-pro' ));
}
add_action( 'init', 'register_my_menu' );

/**
 * Enqueue scripts and styles.
 */
function wedding_photo_scripts() {
	wp_enqueue_style( 'wedding_photo-style', get_stylesheet_uri() );
	wp_enqueue_style( 'style', get_template_directory_uri().'/assets/fonts/stylesheet.css' );
	wp_enqueue_style( 'style_awesome', get_template_directory_uri().'/assets/icons/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'style_bootstrap', get_template_directory_uri().'/assets/plugins/css/bootstrap.min.css' );
	wp_enqueue_style( 'style_animate', get_template_directory_uri().'/assets/plugins/css/animate.css' );
	wp_enqueue_style( 'style_owl', get_template_directory_uri().'/assets/plugins/css/owl.css' );
	wp_enqueue_style( 'style_fancybox', get_template_directory_uri().'/assets/plugins/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'style_blogstyle', get_template_directory_uri().'/assets/css/blogstyle.css' );
	wp_enqueue_style( 'style_css_style', get_template_directory_uri().'/assets/css/styles.css' );
	wp_enqueue_style( 'style_responsive', get_template_directory_uri().'/assets/css/responsive.css' );
	
	
	wp_enqueue_script( 'script_jquerymin', get_template_directory_uri() . '/assets/plugins/js/jquery.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_poppermin', get_template_directory_uri() . '/assets/plugins/js/popper.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_bootstrapmin', get_template_directory_uri() . '/assets/plugins/js/bootstrap.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_waypointsmin', get_template_directory_uri() . '/assets/plugins/js/waypoints.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_owlcarousel', get_template_directory_uri() . '/assets/plugins/js/owl.carousel.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_validatormin', get_template_directory_uri() . '/assets/plugins/js/validator.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_wowmin', get_template_directory_uri() . '/assets/plugins/js/wow.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_jquerynav', get_template_directory_uri() . '/assets/plugins/js/jquery.nav.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_jqueryfancybox', get_template_directory_uri() . '/assets/plugins/js/jquery.fancybox.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_jquerycounterup', get_template_directory_uri() . '/assets/plugins/js/jquery.counterup.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_isotopepkgd', get_template_directory_uri() . '/assets/plugins/js/isotope.pkgd.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_packery-mode', get_template_directory_uri() . '/assets/plugins/js/packery-mode.pkgd.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_custom-scripts', get_template_directory_uri() . '/assets/js/custom-scripts.js', array(), '20151215', true );
	
	wp_enqueue_script( 'script_navigationsds', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wedding_photo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wedding_photo_scripts' );
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
	 * About page class
	 */
	require_once get_template_directory() . '/ti-about-page/class-ti-about-page.php';

	/*
	* About page instance
	*/
	$config = array(
		// Menu name under Appearance.
		'menu_name'           => __( 'About Fog Lite', 'fog-lite-pro' ),
		// Page title.
		'page_name'           => __( 'About Fog Lite', 'fog-lite-pro' ),
		// Main welcome title
		/* translators: Theme Name */
		'welcome_title'       => sprintf( __( 'Welcome to %s! - Version ', 'fog-lite-pro' ), 'Fog Lite' ),
		// Main welcome content
		'welcome_content'     => esc_html__( 'Fog LITE is a free one page WordPress theme for photography niche . It`s also perfect for web agency business,corporate business,personal and parallax business portfolio, photography sites and freelancer.Is built on BootStrap with parallax support, is responsive, clean, modern, flat and minimal.  SEO Friendly and with parallax, full screen image is one of the best business themes.', 'fog-lite-pro' ),
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'tabs'                => array(
			'getting_started'     => __( 'Getting Started', 'fog-lite-pro' ),
			'support'             => __( 'Support', 'fog-lite-pro' ),
			'changelog'           => __( 'Changelog', 'fog-lite-pro' ),
			'free_pro'            => __( 'Free VS PRO', 'fog-lite-pro' ),
		),
		// Support content tab.
		'support_content'     => array(
			'first'  => array(
				'title'        => esc_html__( 'Contact Support', 'fog-lite-pro' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'Our product support team always ready to help you . Please contact us for any support issue . we are ready to provide support 24/7 and our team will response you within 6 hour .', 'fog-lite-pro' ),
				'button_label' => esc_html__( 'Contact Support', 'fog-lite-pro' ),
				'button_link'  => esc_url( 'https://themeflux.com/support/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
			'second' => array(
				'title'        => esc_html__( 'Documentation', 'fog-lite-pro' ),
				'icon'         => 'dashicons dashicons-book-alt',
				'text'         => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use install and customize fog lite.', 'fog-lite-pro' ),
				'button_label' => esc_html__( 'Read full documentation', 'fog-lite-pro' ),
				'button_link'  => 'https://themeflux.com/fog-lite-pro-documentation/',
				'is_button'    => false,
				'is_new_tab'   => true,
			),
			
		),
		// Getting started tab
		'getting_started'     => array(
			'first'  => array(
				'title'               => esc_html__( 'Recommended actions', 'fog-lite-pro' ),
				'text'                => esc_html__( 'We have compiled a list of steps for you, to take make sure the experience you will have using one of our products is very easy to follow.', 'fog-lite-pro' ),
				'button_label'        => esc_html__( 'Recommended actions', 'fog-lite-pro' ),
				'button_link'         => esc_url('https://themeflux.com/fog-light-recommended-action/'),
				'is_button'           => false,
				'recommended_actions' => true,
				'is_new_tab'          => false,
			),
			'second' => array(
				'title'               => esc_html__( 'Read full documentation', 'fog-lite-pro' ),
				'text'                => esc_html__( 'Please check our full documentation for detailed information on how to use install and customize fog lite .', 'fog-lite-pro' ),
				'button_label'        => esc_html__( 'Documentation', 'fog-lite-pro' ),
				'button_link'         => 'https://themeflux.com/fog-lite-pro-documentation/',
				'is_button'           => false,
				'recommended_actions' => false,
				'is_new_tab'          => true,
			),
			'third'  => array(
				'title'               => esc_html__( 'Go to Customizer', 'fog-lite-pro' ),
				'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'fog-lite-pro' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'fog-lite-pro' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
				'is_new_tab'          => true,
			),
		),
		// Free vs pro array.
		'free_pro'            => array(
			'pro_theme_link'      => 'https://themeflux.com/fog-lite-pro-free-vs-pro/',
			/* translators: Zerif Pro name */
			'get_pro_theme_details'=>'Fog lite is a awesome fully customizable wordpress theme especially for photography websites . You can easily create a awesome look website with fog lite free version . But some features are missing in free version . So we encourage to use you pro version .',
			'get_pro_theme_label' => sprintf( __( 'Fog lite free vs pro','fog-lite-pro' )),
		),
		// Plugins array.
		'recommended_plugins' => array(
			'already_activated_message' => esc_html__( 'Already activated', 'fog-lite-pro' ),
			'version_label'             => esc_html__( 'Version: ', 'fog-lite-pro' ),
			'install_label'             => esc_html__( 'Install and Activate', 'fog-lite-pro' ),
			'activate_label'            => esc_html__( 'Activate', 'fog-lite-pro' ),
			'deactivate_label'          => esc_html__( 'Deactivate', 'fog-lite-pro' ),
			'content'                   => array(
				array(
					'slug' => 'translatepress-multilingual',
				),
				array(
					'slug' => 'siteorigin-panels',
				),
				array(
					'slug' => 'wp-product-review',
				),
				array(
					'slug' => 'intergeo-maps',
				),
				array(
					'slug' => 'visualizer',
				),
				array(
					'slug' => 'adblock-notify-by-bweb',
				),
				array(
					'slug' => 'nivo-slider-lite',
				),
			),
		),
		// Required actions array.
		'recommended_actions' => array(
			'install_label'    => esc_html__( 'Install and Activate', 'fog-lite-pro' ),
			'activate_label'   => esc_html__( 'Activate', 'fog-lite-pro' ),
			'deactivate_label' => esc_html__( 'Deactivate', 'fog-lite-pro' ),
			'content'          => array(
				'themeisle-companion' => array(
					'title'       => 'Orbit Fox',
					'description' => __( 'It is highly recommended that you install the companion plugin to have access to the frontpage sections widgets.', 'fog-lite-pro' ),
					'check'       => defined( 'THEMEISLE_COMPANION_VERSION' ),
					'plugin_slug' => 'themeisle-companion',
					'id'          => 'themeisle-companion',
				),
				'pirate-forms'        => array(
					'title'       => 'Pirate Forms',
					'description' => __( 'Makes your contact page more engaging by creating a good-looking contact form on your website. The interaction with your visitors was never easier.', 'fog-lite-pro' ),
					'check'       => defined( 'PIRATE_FORMS_VERSION' ),
					'plugin_slug' => 'pirate-forms',
					'id'          => 'pirate-forms',
				),

			),
		),
	);
	TI_About_Page::init( $config );



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function add_classes_on_li_custom($classes, $item, $args) {
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class','add_classes_on_li_custom',10,4);

function my_update_comment_fields( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'fog-lite-pro' );
	$aria_req  = $req ? "aria-required='true'" : '';

	$fields['author'] =
		'<p class="comment-form-author">
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Name", "fog-lite-pro" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['email'] =
		'<p class="comment-form-email">
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Email", "fog-lite-pro" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['url'] =
		'<p class="comment-form-url">
			<input id="url" name="url" type="url"  placeholder="' . esc_attr__( "Website", "fog-lite-pro" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" />
			</p>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'my_update_comment_fields' );

function my_update_comment_field( $comment_field ) {

  $comment_field =
    '<p class="comment-form-comment">
            <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Comment", "fog-lite-pro" ) . '" cols="45" rows="8" aria-required="true"></textarea>
        </p>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'my_update_comment_field' );
add_filter( 'comment_form_fields', 'move_comment_field' );
function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
	unset( $fields['cookies'] );
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
function custom_excerpt_more_link($more){
  return '...</p><a class="read-post" href="' . get_the_permalink() . '">Read More</a>';
  return '<a href="' . get_the_permalink() . '" rel="nofollow">&nbsp;[more]</a>';
}
add_filter( 'widget_text', 'do_shortcode' );
add_filter('excerpt_more', 'custom_excerpt_more_link');

function set_custom_excerpt_length(){
   return 25;
}
add_filter('excerpt_length', 'set_custom_excerpt_length', 10);


function widgets_inti() {

}