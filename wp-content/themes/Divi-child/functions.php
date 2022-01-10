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
  $page_name = get_the_title();
  $page_url = get_permalink();
?>
  <script>
    jQuery(document).ready(function($) {
      $('input[data-original_id="page_name"]').val('<?php echo esc_html($page_name) ?>');
      $('input[data-original_id="page_name"]').prop('readonly', true);
      $('input[data-original_id="page_url"]').val('<?php echo esc_html($page_url) ?>');
      $('input[data-original_id="page_url"]').prop('readonly', true);
    });
  </script>
<?php
}
add_action('wp_footer', 'divi_add_page_name_id');


add_filter('woocommerce_checkout_fields', 'wc_remove_checkout_fields');
function wc_remove_checkout_fields($fields)
{
  // unset($fields['billing']['billing_first_name']);
  // unset($fields['billing']['billing_last_name']);
  unset($fields['billing']['billing_company']);
  // unset($fields['billing']['billing_address_1']);
  unset($fields['billing']['billing_address_2']);
  unset($fields['billing']['billing_city']);
  unset($fields['billing']['billing_postcode']);
  unset($fields['billing']['billing_country']);
  unset($fields['billing']['billing_state']);
  // unset($fields['billing']['billing_phone']);
  // unset($fields['order']['order_comments']);
  unset($fields['billing']['billing_email']);
  unset($fields['account']['account_username']);
  unset($fields['account']['account_password']);
  unset($fields['account']['account_password-2']);
  return $fields;
}
