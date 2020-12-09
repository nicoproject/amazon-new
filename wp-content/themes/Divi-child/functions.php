<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')) :
  function chld_thm_cfg_locale_css($uri)
  {
    if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
      $uri = get_template_directory_uri() . '/rtl.css';
    return $uri;
  }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('chld_thm_cfg_parent_css')) :
  function chld_thm_cfg_parent_css()
  {
    wp_enqueue_style('chld_thm_cfg_parent', trailingslashit(get_template_directory_uri()) . 'style.css', array());
  }
endif;
add_action('wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10);

// END ENQUEUE PARENT ACTION

/**
 * 
 * Never worry about cache again!
 */
// function my_load_scripts($hook) {

//   // create my own version codes
//   $my_js_ver  = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'js/custom.js' ));
//   $my_css_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'style.css' ));

//   // 
//   wp_enqueue_script( 'custom_js', plugins_url( 'js/custom.js', __FILE__ ), array(), $my_js_ver );
//   wp_register_style( 'my_css',    plugins_url( 'style.css',    __FILE__ ), false,   $my_css_ver );
//   wp_enqueue_style ( 'my_css' );

// }
// add_action('wp_enqueue_scripts', 'my_load_scripts');

function add_scripts()
{
  wp_enqueue_script(
    'custom',
    get_stylesheet_directory_uri() . '/js/custom.js',
    array('jquery')
  );
}

add_action('wp_enqueue_scripts', 'add_scripts');
