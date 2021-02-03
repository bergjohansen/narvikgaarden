<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file.
* Wordpress will use those functions instead of the original functions then.
*/

/*------------------------------------*\
	Generelt
\*------------------------------------*/

/*------------------------------------*\
	Theme Support
    \*------------------------------------*/

    if( function_exists('acf_add_options_page') ) {

        $fn_name = get_bloginfo();

        acf_add_options_page(array(
            'page_title'    => $fn_name,
            'menu_title'    => $fn_name,
            'menu_slug'     => 'theme-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position'      => 64,
            'icon_url'      => 'dashicons-image-filter'
        ));
    }




if (function_exists('add_theme_support')) {
// Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
        add_theme_support('post-thumbnails');
        add_image_size('small', 200, 200, true);
        add_image_size('large', 960, 'auto', true);

        add_image_size('1920x1080', 1920, 1080, true);
        add_image_size('1920x', 1920, 'auto', true);

        add_image_size('preview', 900, 600, true);
        add_image_size('square', 600, 600, true);
        add_image_size('hd', 1920, 1080, true);
        add_image_size('4x5', 400, 500, true);
        add_image_size('16x9', 1600, 900, true);
        add_image_size('1280x720', 1280, 720, true);
        add_image_size('960x540', 960, 540, true);
        add_image_size('540x960', 540, 960, true);
        add_image_size('330x440', 330, 440, true);
        add_image_size('header', 1280, 'auto', true);
        add_image_size('shortcut', 420, 'auto', true);

        add_image_size('card', 525, 325, true);
        add_image_size('partnere', 200, 150);
        add_image_size('partnere_small', 100, 75);

        add_image_size('backend', 960, 360, true);
}

// Add Filters
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
//add_filter('style_loader_tag', 'html_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('acf/settings/remove_wp_meta_box', '__return_true'); // Speed up site with ACF

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// CUSTOM TINY_MCE
    add_filter( 'tiny_mce_before_init', function( $settings ){
        $settings['paste_as_text'] = true;
        $custom_colours = ' "fc3c3c", "Rød", "112b42", "Blå" ';
        $settings['textcolor_map'] = '['.$custom_colours.']';
        $settings['block_formats'] = 'Avsnitt=p; Sideoverskrift=h1; Overskrift=h2; Mellomoverskrift=h3';
        return $settings;
    } );
// CUSTOM TINY_MCE END

    function simple_toolbar($toolbars){
    // Uncomment to view format of $toolbars

    $toolbars['01. Very Simple' ] = array();
    $toolbars['01. Very Simple' ][1] = array('formatselect', 'bold' , 'italic' , 'underline', 'strikethrough', 'forecolor', 'bullist', 'numlist',
        'alignleft', 'aligncenter', 'alignright',
        'link', 'unlink');
    return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'simple_toolbar'  );

function mini_toolbar($toolbars){
    $toolbars['02. Mini (text & link)' ] = array();
    $toolbars['02. Mini (text & link)' ][1] = array('bold', 'link', 'unlink', 'removeformat');
    return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'mini_toolbar'  );

// Remove emoji support
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
// END Remove emoji support

// REMOVE COMMENTS
// Admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);
function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
// REMOVE COMMENTS END

// get the the role object
$role_object = get_role( 'editor' );

// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );

// Replaces the awkward greeting
function replace_greeting( $wp_admin_bar ) {
   $my_account=$wp_admin_bar->get_node('my-account');
   $newtitle = str_replace( 'Howdy,', '', $my_account->title );
   $wp_admin_bar->add_node( array(
       'id' => 'my-account',
       'title' => $newtitle,
   ) );
}
add_filter( 'admin_bar_menu', 'replace_greeting', 25);

// Dashboard stuff
function remove_dashboard_widgets () {

  remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
  remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
  remove_meta_box('dashboard_primary','dashboard','side'); // WordPress.com Blog
  remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
  remove_meta_box('dashboard_incoming_links','dashboard','normal'); // Incoming Links
  remove_meta_box('dashboard_right_now','dashboard', 'normal'); //Right Now
  remove_meta_box('dashboard_activity','dashboard', 'normal'); //Activity
  remove_action('welcome_panel','wp_welcome_panel');

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

/*
* Remove JSON API links in header html
*/
function remove_json_api () {

    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

   // Remove all embeds rewrite rules.
   //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}
add_action( 'after_setup_theme', 'remove_json_api' );

/*
	Snippet completely disable the REST API and shows {"code":"rest_disabled","message":"The REST API is disabled on this site."}
	when visiting http://yoursite.com/wp-json/
*/
function disable_json_api () {

  // Filters for WP-API version 1.x
  add_filter('json_enabled', '__return_false');
  add_filter('json_jsonp_enabled', '__return_false');

  // Filters for WP-API version 2.x
  add_filter('rest_enabled', '__return_false');
  add_filter('rest_jsonp_enabled', '__return_false');

}
add_action( 'after_setup_theme', 'disable_json_api' );

//Remove Gutenberg Block Library CSS from loading on the frontend
add_filter('use_block_editor_for_post', '__return_false', 10);


function smartwp_remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
 wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

add_filter('acf/settings/remove_wp_meta_box', '__return_true');


// ******************** Crunchify Tips - Clean up WordPress Header START ********************** //
remove_action ('wp_head', 'rsd_link');                                  // Disable XML-RPC
remove_action(' wp_head', 'wp_generator');                              // remove wordpress version
remove_action( 'wp_head', 'wlwmanifest_link');                          // Remove wlwmanifest link
remove_action( 'wp_head', 'wp_shortlink_wp_head');                      // Remove shortlink
remove_action( 'wp_head', 'rest_output_link_wp_head', 10);              // Remove api.w.org relation link
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);         // Remove api.w.org relation link
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0);  // Remove api.w.org relation link

// Remove wordpress generator
function wp_remove_version() {
	return '';
}
add_filter('the_generator', 'wp_remove_version');


// ******************** Clean up WordPress Header END ********************** //


/*------------------------------------*\
CodyFrame elements
\*------------------------------------*/


function codyframe_register_styles() {
    $theme_version = wp_get_theme()->get( 'Version' );
  wp_enqueue_style( 'codyframe', get_template_directory_uri() . '/assets/css/style.css', array(), $theme_version );
}

add_action( 'wp_enqueue_scripts', 'codyframe_register_styles' );
  function codyframe_register_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );
  wp_enqueue_script( 'codyframe', get_template_directory_uri() . '/assets/js/scripts.js', array(), $theme_version, true );
}

add_action( 'wp_enqueue_scripts', 'codyframe_register_scripts' );
// no-js support
function codyframe_js_support() {
  ?>
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <?php
}

add_action( 'wp_print_scripts', 'codyframe_js_support');

function codyframe_ie_support() {
  ?>
  <script>if(! ('CSS' in window) || !CSS.supports('color', 'var(--color-var)')) {var cfStyle = document.getElementById('codyframe-css');if(cfStyle) {var href = cfStyle.getAttribute('href');href = href.replace('style.css', 'style-fallback.css');cfStyle.setAttribute('href', href);}}</script>
  <?php
}
add_action( 'wp_print_scripts', 'codyframe_ie_support' );




/*------------------------------------*\
	MENU
\*------------------------------------*/

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
    return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container_class'] = 'header__nav-inner';
    $args['container_id'] = '';
    $args['items_wrap'] = '<ul class="header__list">%3$s</ul>';
    return $args;
}

// li class element
add_filter ( 'nav_menu_css_class', 'so_37823371_menu_item_class', 110, 4 );

function so_37823371_menu_item_class ( $classes, $item, $args, $depth ){
  $classes[] = 'header__item';
  return $classes;
}

// li a href class element
function add_link_atts($atts) {
  $atts['class'] = "header__link";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');

//add class to submenu
add_filter ('wp_list_pages','wpse241119_replace_class',10,3);
function wpse241119_replace_class ($output, $r, $pages) {
  $output = str_replace ('page-item number subnav__item', 'hvr-underline', $output);
  return $output;
  }
  /**
   * Removes media buttons from post types.
   */
  add_filter( 'wp_editor_settings', function( $settings ) {
      $current_screen = get_current_screen();

      // Post types for which the media buttons should be removed.
      $post_types = array( 'post' );

      // Bail out if media buttons should not be removed for the current post type.
      if ( ! $current_screen || ! in_array( $current_screen->post_type, $post_types, true ) ) {
          return $settings;
      }

      $settings['media_buttons'] = false;

      return $settings;
  } );

//excerpt

add_filter( 'get_the_excerpt', 'wp256_use_content_as_excerpt', 10, 2 );
function wp256_use_content_as_excerpt( $excerpt, $post ) {
    return wp_strip_all_tags( $post->post_content );
}

//remove p tag in acf
//function my_acf_add_local_field_groups() { remove_filter('acf_the_content', 'wpautop' ); } add_action('acf/init', 'my_acf_add_local_field_groups');

//scoll lazy loading

//shortcode

//blog posts page
function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

/*
 * Let Editors manage users, and run this only once.
 */
function isa_editor_manage_users() {

    if ( get_option( 'isa_add_cap_editor_once' ) != 'done' ) {

        // let editor manage users

        $edit_editor = get_role('editor'); // Get the user role
        $edit_editor->add_cap('edit_users');
        $edit_editor->add_cap('list_users');
        $edit_editor->add_cap('promote_users');
        $edit_editor->add_cap('create_users');
        $edit_editor->add_cap('add_users');
        $edit_editor->add_cap('delete_users');

        update_option( 'isa_add_cap_editor_once', 'done' );
    }

}
add_action( 'init', 'isa_editor_manage_users' );


//prevent editor from deleting, editing, or creating an administrator
// only needed if the editor was given right to edit users

class ISA_User_Caps {

  // Add our filters
  function __construct() {
    add_filter( 'editable_roles', array(&$this, 'editable_roles'));
    add_filter( 'map_meta_cap', array(&$this, 'map_meta_cap'),10,4);
  }
  // Remove 'Administrator' from the list of roles if the current user is not an admin
  function editable_roles( $roles ){
    if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
      unset( $roles['administrator']);
    }
    return $roles;
  }
  // If someone is trying to edit or delete an
  // admin and that user isn't an admin, don't allow it
  function map_meta_cap( $caps, $cap, $user_id, $args ){
    switch( $cap ){
        case 'edit_user':
        case 'remove_user':
        case 'promote_user':
            if( isset($args[0]) && $args[0] == $user_id )
                break;
            elseif( !isset($args[0]) )
                $caps[] = 'do_not_allow';
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        case 'delete_user':
        case 'delete_users':
            if( !isset($args[0]) )
                break;
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        default:
            break;
    }
    return $caps;
  }

}

$isa_user_caps = new ISA_User_Caps();

// Hide all administrators from user list.

add_action('pre_user_query','isa_pre_user_query');
function isa_pre_user_query($user_search) {

    $user = wp_get_current_user();

    if ( ! current_user_can( 'manage_options' ) ) {

        global $wpdb;

        $user_search->query_where =
            str_replace('WHERE 1=1',
            "WHERE 1=1 AND {$wpdb->users}.ID IN (
                 SELECT {$wpdb->usermeta}.user_id FROM $wpdb->usermeta
                    WHERE {$wpdb->usermeta}.meta_key = '{$wpdb->prefix}capabilities'
                    AND {$wpdb->usermeta}.meta_value NOT LIKE '%administrator%')",
            $user_search->query_where
        );

    }
}
