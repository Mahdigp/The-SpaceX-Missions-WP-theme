<?php
/**
 * The SpaceX Missions functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_SpaceX_Missions
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


// ##### Lunches Post tyoe of  SpaceX theme #####
function lunches_post_type() {

	$labels = array(
		'name'                  => _x( 'Lunches', 'Post Type General Name', 'lunch_domain' ),
		'singular_name'         => _x( 'Lunche', 'Post Type Singular Name', 'lunch_domain' ),
		'menu_name'             => __( 'Lunches', 'lunch_domain' ),
		'name_admin_bar'        => __( 'Lunches', 'lunch_domain' ),
		'archives'              => __( 'Lunches Archive', 'lunch_domain' ),
		'attributes'            => __( 'Attributes', 'lunch_domain' ),
		'parent_item_colon'     => __( 'Parent', 'lunch_domain' ),
		'all_items'             => __( 'All Lunches', 'lunch_domain' ),
		'add_new_item'          => __( 'Add new', 'lunch_domain' ),
		'add_new'               => __( 'Add new', 'lunch_domain' ),
		'new_item'              => __( 'New', 'lunch_domain' ),
		'edit_item'             => __( 'Edit', 'lunch_domain' ),
		'update_item'           => __( 'Update', 'lunch_domain' ),
		'view_item'             => __( 'View', 'lunch_domain' ),
		'view_items'            => __( 'View', 'lunch_domain' ),
		'search_items'          => __( 'Seach', 'lunch_domain' ),
		'not_found'             => __( 'Not Found', 'lunch_domain' ),
		'not_found_in_trash'    => __( 'Not Found in Trash', 'lunch_domain' ),
		'featured_image'        => __( 'Feature Image', 'lunch_domain' ),
		'set_featured_image'    => __( 'Set Feature Image', 'lunch_domain' ),
		'remove_featured_image' => __( 'Remove Feature Image', 'lunch_domain' ),
		'use_featured_image'    => __( 'Use as Feature Image', 'lunch_domain' ),
		'insert_into_item'      => __( 'Insert into', 'lunch_domain' ),
		'uploaded_to_this_item' => __( 'Uploade into', 'lunch_domain' ),
		'items_list'            => __( 'Items list', 'lunch_domain' ),
		'items_list_navigation' => __( 'Item smenu', 'lunch_domain' ),
		'filter_items_list'     => __( 'Filter Items ', 'lunch_domain' ),
	);
	$args = array(
		'label'                 => __( 'Lunch', 'lunch_domain' ),
		'description'           => __( 'Lunches of SpaceX ', 'lunch_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats' ),
		'taxonomies'            => array( 'lunch_category', 'lunch_post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'lunches_spacex', $args );

}
add_action( 'init', 'lunches_post_type', 0 );


/* End of lunchers post type   */



/* register custom feild */

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'Luncher_Properties',
		'title' => 'Luncher Properties',
		'fields' => array (
			array (
				'key' => 'nationality',
				'label' => 'Nationality',
				'name' => 'nationality',
				'type' => 'text',
			),
			array (
				'key' => 'details',
				'label' => 'Details',
				'name' => 'details',
				'type' => 'text',
			),
			array (
				'key' => 'manufacturer',
				'label' => 'Manufacturer',
				'name' => 'manufacturer',
				'type' => 'text',
			)
			,
			array (
				'key' => 'picture',
				'label' => 'Picture Url',
				'name' => 'picture',
				'type' => 'text',
			)
			,
			array (
				'key' => 'payloadtype',
				'label' => 'Payload type',
				'name' => 'payloadtype',
				'type' => 'text',
			)
			,
			array (
				'key' => 'launch_success',
				'label' => 'Launch Success',
				'name' => 'launch_success',
				'type' => 'true_false',
	
			),
			array (
				'key' => 'article_link',
				'label' => 'Article Link',
				'name' => 'article_link',
				'type' => 'text',
	
			),
			array (
				'key' => 'video_link',
				'label' => 'Video link',
				'name' => 'video_link',
				'type' => 'text',
	
			),
			array (
				'key' => 'tdate',
				'label' => 'Time and Date',
				'name' => 'tdate',
				'type' => 'text',
	
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'lunches_spacex',
				),
			),
		),
	));
	
	endif;


	add_action('after_switch_theme', 'setup_theme_options');

	function setup_theme_options () {
	  if(get_option('first_theme_activation') === false){
		// Set a flag if the theme activation happened
		add_option('first_theme_activation', true, '', false);



		if(get_option('page_on_front')=='0' && get_option('show_on_front')=='posts'){
			   // Create History Page
			   $homepage = array(
				   'post_type'    => 'page',
				   'post_title'    => 'History',
				   'post_content'  => '',
				   'post_status'   => 'publish',
				   'meta_key' => '_wp_page_template',
				   'meta_value' => 'page-history.php'
			   ); 
			   // Insert the post into the database
			   $homepage_id =  wp_insert_post( $homepage );
			   //set the page template 
			   //assuming you have defined template on your-template-filename.php
			   update_post_meta($homepage_id, '_wp_page_template', 'page-history.php');
		   }
	   
		if(get_option('page_on_front')=='0' && get_option('show_on_front')=='posts'){
			// Create Lunches Page
			$homepage = array(
				'post_type'    => 'page',
				'post_title'    => 'Lunches',
				'post_content'  => '',
				'post_status'   => 'publish',
				'meta_key' => '_wp_page_template',
				'meta_value' => 'page-lunches.php'
			); 
			// Insert the post into the database
			$homepage_id =  wp_insert_post( $homepage );
			//set the page template 
			//assuming you have defined template on your-template-filename.php
			update_post_meta($homepage_id, '_wp_page_template', 'page-lunches.php');
		}


		$result= wp_remote_retrieve_body(wp_remote_get('https://api.spacexdata.com/v3/launches'));
		$result=json_decode($result);
		
		foreach ($result as $values) {
			$date=$values->launch_date_unix;
			$tdate=date('m/d/Y h:i:s a',$date);
			$missionName=$values->mission_name;
			$nationality=$values->rocket->second_stage->payloads[0]->nationality;
			$payload_type=$values->rocket->second_stage->payloads[0]->payload_type;
			$manufacturer=$values->rocket->second_stage->payloads[0]->manufacturer;
			$launch_success=$values->launch_success;
			$details=$values->details;
			$picture=$values->links->mission_patch_small;
			$article_link=$values->links->article_link;
			$video_link=$values->links->video_link;
		
		
				
			$new_post = array(
				'ID' => '',
				'post_type' => 'lunches_spacex', // Custom Post Type Slug
				'post_status' => 'publish',
				'post_title' => $missionName,
				);
		
		
			
		
			$post_id = wp_insert_post($new_post);
			update_field('nationality', $nationality ,$post_id);
			update_field('payloadtype', $payload_type ,$post_id);
			update_field('details', $details ,$post_id);
			update_field('manufacturer', $manufacturer ,$post_id);
			update_field('picture', $picture ,$post_id);
			update_field('launch_success', $launch_success ,$post_id);
			update_field('article_link', $article_link ,$post_id);
			update_field('video_link', $video_link ,$post_id);
			update_field('tdate', $tdate ,$post_id);
		
		
		
		}
		
		
	


	
	}



}



if ( ! function_exists( 'the_spacex_missions_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function the_spacex_missions_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on The SpaceX Missions, use a find and replace
		 * to change 'the-spacex-missions' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'the-spacex-missions', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'the-spacex-missions' ),
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
				'the_spacex_missions_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'the_spacex_missions_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_spacex_missions_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'the_spacex_missions_content_width', 640 );
}
add_action( 'after_setup_theme', 'the_spacex_missions_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function the_spacex_missions_scripts() {
	wp_enqueue_style( 'the-spacex-missions-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'the-spacex-missions-style', 'rtl', 'replace' );

	wp_enqueue_script( 'the-spacex-missions-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'the_spacex_missions_scripts' );

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

