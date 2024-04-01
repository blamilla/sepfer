<?php
/*
 *  Author: ARIDE
 *  URL: aride.com.ar
 *  
 */

 

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here
require_once( __DIR__ . '/includes/functions-custom-post-types.php');

/*------------------------------------*\
	Theme Support
\*------------------------------------*/
add_filter( 'use_block_editor_for_post', '__return_false' );

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
	add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}



/*------------------------------------*\
	Functions
\*------------------------------------*/
/*** Login Customization ***/
function custon_login_logo() { ?>
<style type="text/css">
#login h1 a,
.login h1 a {
    background-image: url(<?php echo get_stylesheet_directory_uri();
    ?>/img/logo-completo.png);
    background-size: contain;
    background-repeat: no-repeat;
    padding-bottom: 0px;
    margin-bottom: 0px;
    width: 250px;    
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'custon_login_logo' );

function custom_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

function custom_login_logo_url_title() {
    return 'studioFREAK';
}
add_filter( 'login_headertitle', 'custom_login_logo_url_title' );

/*** End Login Customization ***/

/******* Theme options ******/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site General Settings',
		'menu_title' 	=> 'Site Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


/*** End Theme options ******/

function header_menu()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="nav-menu">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
	
}

function that_footer_menu()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="that-nav-footer">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}
function that_footer_links()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-links',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="that-nav-links-footer">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function header_mobile_menu()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'mobile-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="nav-mobile">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function institucional_menu()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'institucional-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="institucionalServiciosItems">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

			//wp_deregister_script('jquery');
    		//wp_register_script('jquery-local', get_template_directory_uri() . '/_include/_js/_lib/jquery-3.3.1.min.js', array(), '1', true); 
			//wp_enqueue_script('jquery-local'); // Enqueue it!
			
			//Ajax preloader
			wp_register_script('pace', get_template_directory_uri() . '/_include/_js/_lib/pace.min.js', array('jquery'), '1', true); // Conditional script(s)
			wp_enqueue_script('pace'); // Enqueue it!	

			//WOW for Animate CSS
			wp_register_script('wow', get_template_directory_uri() . '/_include/_js/_lib/wow.min.js', array('jquery'), '1', true); // Conditional script(s)
			wp_enqueue_script('wow'); // Enqueue it!	

			//wp_register_script('masonry', get_template_directory_uri() . '/_include/_js/_lib/masonry.min.js', array('jquery-local'), '1', true); // Conditional script(s)
			//wp_enqueue_script('masonry'); // Enqueue it!	
			
			//wp_register_script('imagesloaded', get_template_directory_uri() . '/_include/_js/_lib/imagesloaded.min.js', array('jquery-local'), '1', true); // Conditional script(s)
			//wp_enqueue_script('imagesloaded'); // Enqueue it!		
			
			//wp_register_script('flickity', get_template_directory_uri() . '/_include/_js/_lib/flickity.min.js', array('jquery-local'), '1', true); // Conditional script(s)
			//wp_enqueue_script('flickity'); // Enqueue it!		
			
			wp_register_script('defer-css', get_template_directory_uri() . '/_include/_js/defer-css.js', array('jquery'), '1', true); // Conditional script(s)
			wp_enqueue_script('defer-css'); // Enqueue it!
			
			//wp_register_script('gsap', get_template_directory_uri() . '/_include/_js/_lib/gsap/TweenLite.min.js', array('jquery-local'), '1', true); // Conditional script(s)
			//wp_enqueue_script('gsap'); // Enqueue it!
			
			//wp_register_script('gsap-css', get_template_directory_uri() . '/_include/_js/_lib/gsap/plugins/CSSPlugin.min.js', array('jquery-local'), '1', true); // Conditional script(s)
			//wp_enqueue_script('gsap-css'); // Enqueue it!
			
			//wp_register_script('gsap-ease', get_template_directory_uri() . '/_include/_js/_lib/gsap/easing/EasePack.min.js', array('jquery-local'), '1', true); // Conditional script(s)
			//wp_enqueue_script('gsap-ease'); // Enqueue it!
		
			wp_register_script('site_scripts', get_template_directory_uri() . '/_include/_js/site-scripts.js', array('jquery'), '1.0.0', true); // Custom scripts
			wp_enqueue_script('site_scripts'); // Enqueue it!			

			
			// Localize scripts
			wp_localize_script( 'site_scripts', 'site_path', array( 'template_url' => get_bloginfo('template_url') ) ); 

			// register our main script but do not enqueue it yet
			//wp_register_script( 'ajax-loadmore', get_template_directory_uri() . '/_include/_js/ajax-load-more.js', array('jquery-local') );
 
			// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
			// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
			/*wp_localize_script( 'ajax-loadmore', 'ajax_loadmore_params', array(
				'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
				'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
				'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
				'max_page' => $wp_query->max_num_pages
			) );
 
 			wp_enqueue_script( 'ajax-loadmore' );*/

    }
}

function ajax_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	$args['post_type'] = 'cursos';
	$args['posts_per_page'] = 16;
	
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post(); 
			get_template_part( 'loop', 'curso' );
		endwhile;
 
	endif;
	wp_die( '0' );
	//die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
//add_action('wp_ajax_loadmore', 'ajax_loadmore_ajax_handler'); // wp_ajax_{action}
//add_action('wp_ajax_nopriv_loadmore', 'ajax_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
   // Load homepage scripts
	if ( is_page_template("template-home.php") )   {		
		wp_register_script('home-scripts', get_template_directory_uri() . '/_include/_js/home-scripts.js', array('jquery-local'), '1', true); // Conditional script(s)
		wp_enqueue_script('home-scripts'); // Enqueue it!
	}	
}


function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array(
    //'jquery-local',
	//'masonry',
	//'imagesloaded',
	'defer-css',
	//'gsap',
	//'gsap-css',
	//'gsap-ease',
	'site_scripts',
	'home-scripts',		
   );
   
   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}




// Load HTML5 Blank styles
function html5blank_styles()
{

  /*  wp_register_style('that_site', get_template_directory_uri() . '/_include/_css/that-site.css', array(), '1.0', 'all');
    wp_enqueue_style('that_site'); // Enqueue it!
	*/

  wp_register_style('simple-grid', get_template_directory_uri() . '/_include/_css/simple-grid.css', array(), '1.0', 'all');
  wp_enqueue_style('simple-grid'); // Enqueue it!

  wp_register_style('animate', get_template_directory_uri() . '/_include/_css/animate.css', array(), '1.0', 'all');
  wp_enqueue_style('animate'); // Enqueue it!

}


// Load Admin styles
function that_admin_styles()
{
  
  if( is_admin() ) {
    
  }
    
  
}


// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
		'header-menu' => __('Header Menu', 'html5blank'), // Main navigation
        'footer-menu' => __('Footer Menu', 'html5blank'), // Footer navigation
        'footer-links' => __('Footer Links', 'html5blank'), // Footer small links
		'mobile-menu' => __('Mobile Menu', 'html5blank'), // Mobile navigation
		'institucional-menu' => __('Menu Institucional', 'html5blank') // Mobile navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	$tag = 'div';
	$add_below = 'comment';

	
	
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <div <?php comment_class(empty( $args['has_children'] ) ? 'risponse' : 'parent'); ?> id="comment-<?php comment_ID() ?>">
		<div class="autor-mensaje"><?php comment_author(); ?></div>
		<div class="fecha-mensaje"><?php echo get_comment_date(); ?></div>
		<div class="mensaje"><?php echo get_comment_text() ?></div>		
<?php }

/**
 * Remove website field in public blog's comments
 */
add_filter('comment_form_default_fields', 'website_remove');

function website_remove($fields)
{
	if(isset($fields['url']))
	unset($fields['url']);
	return $fields;
}

function wd_admin_menu_rename() {
	global $menu; // Global to get menu array
	$menu[25][0] = 'Mensajes Avisos'; // Change name of posts to portfolio
	
}
add_action( 'admin_menu', 'wd_admin_menu_rename' );

/* Remove WP-EMBED */
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}




/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('admin_enqueue_scripts', 'that_admin_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
add_action( 'wp_footer', 'my_deregister_scripts' ); /* Remove WP-EMBED */


// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2); // defer scripts


// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/******** Grid Cursos *******/
// Add featured image for models
function custom_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'featured_image' => 'Image',
		'title' => 'Curso',
		'tipo_curso' => 'Tipo de Curso',    
		'duracion' => 'Duración',        
		'dia_de_cursada' => 'Día de Cursada',   
		'valor' => 'Valor'
     );
    return $columns;
}

add_filter('manage_cursos_posts_columns' , 'custom_columns');

function custom_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_image':
        the_post_thumbnail( 'thumbnail' );
		break;
	case 'tipo_curso':
		echo get_field('tipo_curso');
		break;
	case 'dia_de_cursada':
		echo get_field('dia_de_cursada');
		break;
	case 'duracion':
		echo get_field('duracion');	
		break;
	case 'valor':
		echo '$ '. get_field('valor');
		break;
    }
}
add_action( 'manage_cursos_posts_custom_column' , 'custom_columns_data', 10, 2 ); 



function works_column_register_sortable( $post_columns ) {
    $post_columns = array(
		'title' => 'title',
		'tipo_curso' => 'tipo_curso',    
		'duracion' => 'duracion',        
		'dia_de_cursada' => 'dia_de_cursada',   
		'valor' => 'valor'
        );

    return $post_columns;
}

add_filter( 'manage_edit-cursos_sortable_columns', 'works_column_register_sortable' );


/******** Grid Calendario *******/
function custom_columns_calendario( $columns ) {
    $columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => 'Título',
		'curso' => 'Curso',
		'fecha' => 'Fecha Cursada',    
		'date' => 'Fecha Publicación',        		
     );
    return $columns;
}

add_filter('manage_calendario_posts_columns' , 'custom_columns_calendario');

function custom_columns_data_calendario( $column, $post_id ) {
    switch ( $column ) {
    case 'curso':
	 	$curso = get_field('curso');
		if( $curso ) {
			//$post = $curso; 
			//setup_postdata( $post);
			echo get_the_title($curso->ID);
			//wp_reset_postdata();
		} 
		break;
	case 'fecha':
		echo get_field('fecha');
		break;
    }
}
add_action( 'manage_calendario_posts_custom_column' , 'custom_columns_data_calendario', 10, 2 ); 

function calendario_column_register_sortable( $post_columns ) {
    $post_columns = array(
		'title' => 'title',
		'curso' => 'Curso',    
		'fecha' => 'Fecha', 
		'date' => 'Fecha Publicación',    		
        );

    return $post_columns;
}

add_filter( 'manage_edit-calendario_sortable_columns', 'calendario_column_register_sortable' );

/******** Grid Registros *******/
function custom_columns_registros( $columns ) {
    $columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => 'Título',
		'nombre_apellido' => 'Nombre y Apellido',
		'email' => 'Email',
		'curso' => 'Curso',
		'fecha' => 'Fecha Inscripto',    
		'estado_registro' => 'Estado',  
		'date' => 'Fecha Publicación',        		
     );
    return $columns;
}

add_filter('manage_registros_posts_columns' , 'custom_columns_registros');

function custom_columns_data_registros( $column, $post_id ) {
    switch ( $column ) {
	case 'nombre_apellido':
		echo get_field('nombre_apellido');
		break;
	case 'email':
		echo get_field('email');
		break;
	case 'curso':
		$fecha_curso = get_field('fecha_curso');
		if( $fecha_curso ) {	
			$curso = get_field('curso',$fecha_curso->ID);
			if($curso) {
				echo get_the_title($curso->ID);
			}
		} 
		break;
	case 'fecha':
		$fecha = get_field('fecha_curso');
		if( $fecha ) {		
			echo get_field('fecha',$fecha->ID);
		} 
		break;
	case 'estado_registro':
		$estado = get_field_object('estado_registro');
		if($estado) {
			echo $estado['choices'][$estado['value']];
		} else {
			echo 'Pendiente de Pago';
		}
		break;
    }
}
add_action( 'manage_registros_posts_custom_column' , 'custom_columns_data_registros', 10, 2 ); 

function registros_column_register_sortable( $post_columns ) {
    $post_columns = array(
		'title' => 'title',
		'nombre_apellido' => 'Nombre y Apellido',
		'email' => 'Email',
		'curso' => 'Curso',
		'fecha' => 'Fecha Inscripto', 
		'estado_registro' => 'Estado',    		
        );

    return $post_columns;
}

add_filter( 'manage_edit-registros_sortable_columns', 'registros_column_register_sortable' );

/*******************************/

add_action( 'init', 'brandpage_form_head' );
function brandpage_form_head(){
	if (!is_admin()) {
		acf_form_head();
	}
}

function modify_post_title( $data, $postarr )
{
  if($data['post_type'] == 'calendario') { 
	$fecha = get_field('fecha', $postarr['ID'], false);
	$title = date('Y-m-d',strtotime($fecha));

	$curso = get_field('curso');
	if( $curso ) {
		$title.= ' - ' .get_the_title($curso->ID);		
	} 
	
	$data['post_title'] =  $title; 
	
  }

  return $data; // Returns the modified data.
}


add_action('acf/save_post', 'my_save_post');

function my_save_post( $post_id ) {
	
	// bail early if not a contact_form post
	if( get_post_type($post_id) !== 'registros' ) {
		
		return;
		
	}
	
	
	// bail early if editing in admin
	if( is_admin() ) {
		
		return;
		
	}
	
	
	// vars
	//$post = get_post( $post_id );

	// get custom fields (field group exists for content_form)
	$name = get_field('nombre_apellido', $post_id);
	$email = get_field('email', $post_id);

	$fecha = '';
	$fecha_curso = get_field('fecha_curso', $post_id);
	if($fecha_curso) {
		$fecha = get_field('fecha', $fecha_curso->ID);
	}

	$my_post = array(
		'ID'           => $post_id,
		'post_title'   => $name . ' - ' . $fecha,	
	);

  
  	// Update the post into the database
	wp_update_post( $my_post );
	
	// email data
	$to = 'contact@website.com';
	$headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
	$subject = 'Registro Pendiente de Pago'; //$post->post_title;
	//$body = $post->post_content;
	
	
	// send email
	//wp_mail($to, $subject, $body, $headers );
	
}

//Filtramos las fechas para que solo aparezcan las publicadas.
function relationship_options_filter($args, $field, $post_id) {
	$args['post_status'] = array('publish');
	
	if(isset($_REQUEST['curso']) && !empty($_REQUEST['curso'])) {
		$args['meta_query'] = array(
			array(
				'key' => 'curso', 
				'value' => $_REQUEST['curso'],  //viene por el JS en nuevo-registro.php
				'compare' => '='
			),
			array(
				'key' => 'fecha',
				'value' => date("Y-m-d"),
				'compare' => '>=',
				'type' => 'ASC'
			),
			array(
				'key' => 'completo',
				'value' => 1,
				'compare' => '!='
			)
		);
	}

	return $args;
}

add_filter('acf/fields/post_object/query/name=fecha_curso', 'relationship_options_filter', 10, 3);

//Agregamos los placeholders para los input
function acf_load_field_text( $field ) {
	
    $field['placeholder'] = $field['label'];

    return $field;    
}

add_filter('acf/load_field/type=text', 'acf_load_field_text');

//Agregamos los placeholders para los input
function acf_load_field_email( $field ) {
	
    $field['placeholder'] = $field['label'];

    return $field;    
}

add_filter('acf/load_field/type=email', 'acf_load_field_email');


function filters_pre_get_posts( $query ) {
	// bail early if is in admin
	if( is_admin() ) return;

	if ($query->is_main_query() && !is_admin()) {
		$query->set( 'posts_per_page', 15 );
	}
	
	
	return;
	
	
}

add_action( 'pre_get_posts', 'filters_pre_get_posts' );

/*
function my_acf_prepare_field4( $field ) {
	
	wp_die('aca');
    if( isset($_GET['curso']) ){
        $post_id = $_GET['curso'];
        $field['fecha_curso'] = $post_id;
    }
    
    return $field;
    
}

// name
add_filter('acf/prepare_field/name=fecha_curso', 'my_acf_prepare_field4');
*/

/*------------------------------------*\
	ACF Tweaks Functions
\*------------------------------------*/
  // add default image setting to ACF image fields
  // let's you select a defualt image
  // this is simply taking advantage of a field setting that already exists
  /*
  add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
  function add_default_value_to_image_field($field) {
	  acf_render_field_setting( $field, array(
		  'label'			=> 'Default Image',
		  'instructions'		=> 'Appears when creating a new post',
		  'type'			=> 'image',
		  'name'			=> 'default_value',
	  ));
  }
  */

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}



/*------------------------------------*\
	Search filters Functions
\*------------------------------------*/
//used to searching in cursos

function template_chooser( $template ){
    global $wp_query;   
    
    if( $wp_query->is_search){
        return locate_template('archive-cursos.php');  
    }   
    return $template;   
}

add_filter( 'template_include', 'template_chooser' ); 

function cursos_email_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','cursos_email_set_content_type' );