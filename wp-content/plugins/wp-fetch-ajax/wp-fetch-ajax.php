<?php
/**
 * Plugin Name: WP Fetch Ajax
 * Description: Fetch data from external URL using AJAX
 * Version: 1.0
 * Author: Rhysin
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}


function ajax_fetch_script()
{
  wp_enqueue_script('ajax-fetch', plugin_dir_url(__FILE__) . 'ajax-script.js', ['jquery'], '1.0.0', true);
  wp_localize_script('ajax-fetch', 'ajax_fetch_object', [
    'ajax_url' => admin_url('admin-ajax.php')
  ]);
}

add_action('wp_enqueue_scripts', 'ajax_fetch_script');

function ajax_get_request()
{
  $url = 'https://google.com.vn';
  $response = wp_remote_get($url);

  if (is_wp_error($response)) {
    wp_send_json_error(array('message' => 'Error fetching data'));
  }

  $body = wp_remote_retrieve_body($response);
  wp_send_json_success(array('data' => $body));
}

add_action('wp_ajax_ajax_get_request', 'ajax_get_request');
add_action('wp_ajax_nopriv_ajax_get_request', 'ajax_get_request');