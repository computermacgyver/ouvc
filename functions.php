<?php 

require_once('bootstrap_walker.php'); 

function wpbootstrap_scripts_with_jquery() {
//wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );

	// Register the script like this for a theme:
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ),"",true );

}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

function ouvc_scripts_gcal() {
	wp_register_script( 'globalize', get_template_directory_uri() . '/js/globalize.js', array( 'bootstrap' ), "",true );
	wp_register_script( 'globalize-enGB', get_template_directory_uri() . '/js/globalize.culture.en-GB.js', array( 'bootstrap' ), "",true );
	wp_register_script( 'jquery-gcal', get_template_directory_uri() . '/js/jquery.gcal_flow.js', array( 'jquery' ), "",true );
}
add_action( 'wp_enqueue_scripts', 'ouvc_scripts_gcal' );

function ouvc_scripts_leaguetables() {
	wp_register_script( 'jquery-xdomain', get_template_directory_uri() . '/js/jquery.xdomainajax.js', array( 'jquery' ), "",true );
	wp_register_script( 'removecontent', get_template_directory_uri() . '/js/remotecontent.js', array( 'jquery','jquery-gcal','jquery-xdomain' ), "",true );
}

add_action( 'wp_enqueue_scripts', 'ouvc_scripts_leaguetables' );

function ouvc_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    //wp_list_pages(
    	array( 
    		'menu' => 'main_nav', /* menu name */
    		'menu_class' => 'nav',
    		'theme_location' => 'main_nav', /* where in the theme it's assigned */
    		'container' => 'false', /* container class */
    		'fallback_cb' => '', /* menu fallback */
    		'depth' => '3', /* suppress lower levels for now */
    		'walker' => new Bootstrap_Walker()
    	)
    );
}


// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
    $classes[] = "active";
	}
  
  return $classes;
}

function ouvc_theme_support() {
	add_theme_support('post-thumbnails');      // wp thumbnails (sizes handled in functions.php)
	set_post_thumbnail_size(125, 125, true);   // default thumb size
	add_theme_support( 'custom-background' );  // wp custom background
	add_theme_support('automatic-feed-links'); // rss thingy
	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/
	// adding post format support
	add_theme_support( 'post-formats',      // post formats
		array( 
			'aside',   // title less blurb
			'gallery', // gallery of images
			'link',    // quick link to other site
			'image',   // an image
			'quote',   // a quick quote
			'status',  // a Facebook like status update
			'video',   // video 
			'audio',   // audio
			'chat'     // chat transcript 
		)
	);	
	add_theme_support( 'menus' );            // wp menus
	register_nav_menus(                      // wp3+ menus
		array( 
			'main_nav' => 'The Main Menu',   // main nav in header
			'footer_links' => 'Footer Links' // secondary nav in footer
		)
	);	
}

	// launching this stuff after theme setup
	add_action('after_setup_theme','ouvc_theme_support');	
	// adding sidebars to Wordpress (these are created in functions.php)
	//add_action( 'widgets_init', 'bones_register_sidebars' );
	// adding the bones search form (created in functions.php)
	//add_filter( 'get_search_form', 'bones_wpsearch' );


?>
