<?php

function theme_support(){
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_support');

function enqueue_theme_styles() {
  wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', [], '1.0.1', 'all');
  wp_enqueue_style('fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', [], '1.0.1', 'all');
  wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css', [], '1.0.1', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');

function enqueue_theme_scripts() {
  wp_enqueue_script('jquery-js', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', [], '1.0.1', true);
  wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [], '1.0.1', true);
  wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', [], '1.0.1', true);
  wp_enqueue_script('main-js', get_archive_template() .'js/main.js',[], '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');


function collection_theme_menus(){
  $loctions = [
    'primary' => "Main Primary",
    'footer' => "Footer Menu"
  ];

  register_nav_menus($loctions);
}

add_action('init' , 'collection_theme_menus');