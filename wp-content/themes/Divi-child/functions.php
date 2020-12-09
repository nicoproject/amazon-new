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

function add_scripts()
{
  wp_enqueue_script(
    'custom',
    get_stylesheet_directory_uri() . '/js/custom.js',
    array('jquery')
  );
}

add_action('wp_enqueue_scripts', 'add_scripts');


function divi_add_page_name_id()
{
  $page_name = get_the_title(); // gets the page name/title
  $page_url = get_permalink(); // gets the page URL
?>
  <script>
    jQuery(document).ready(function($) {
      $('input[data-original_id="page_name"]').val('<?php echo esc_html($page_name) ?>'); // inserts the page name into the page name field | change the "page_name" to be the id you add in the Divi Contact Module for the Page Name
      $('input[data-original_id="page_name"]').prop('readonly', true); // stops auto fill from changing the value
      $('input[data-original_id="page_url"]').val('<?php echo esc_html($page_url) ?>'); // inserts the page url into the page url field | change the "page_url" to be the id you add in the Divi Contact Module for the URL
      $('input[data-original_id="page_url"]').prop('readonly', true); // stops auto fill from changing the value
    });
  </script>
<?php
}
add_action('wp_footer', 'divi_add_page_name_id'); // wordpress action to insert code into the footer of your website
