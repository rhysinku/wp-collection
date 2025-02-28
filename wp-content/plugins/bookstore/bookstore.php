<?php

/**
 * Plugin Name: Book Store
 * * Description: A simple book store plugin
 * * Version: 1.0
 *
 */

if (!defined('ABSPATH')) {
  exit;
}


function bookstore_post_type()
{

  $labels = array(
    'name' => _x('Books', 'Post type general name', 'textdomain'),
    'singular_name' => _x('Book', 'Post type singular name', 'textdomain'),
    'menu_name' => _x('Books', 'Admin Menu text', 'textdomain'),
    'name_admin_bar' => _x('Book', 'Add New on Toolbar', 'textdomain'),
    'add_new' => __('Add New', 'textdomain'),
    'add_new_item' => __('Add New Book', 'textdomain'),
    'new_item' => __('New Book', 'textdomain'),
    'edit_item' => __('Edit Book', 'textdomain'),
    'view_item' => __('View Book', 'textdomain'),
    'all_items' => __('All Books', 'textdomain'),
    'parent_item_colon' => __('Parent Books:', 'textdomain'),
    'not_found' => __('No books found.', 'textdomain'),
    'not_found_in_trash' => __('No books found in Trash.', 'textdomain'),
    'featured_image' => _x('Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
    'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
    'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
    'archives' => _x('Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'book'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    'menu_icon' => 'dashicons-book'
  );

  register_post_type('book', $args);

}

function bookstore_taxonomy(){

  $genre_label = array(
    'name'=> _x('Book Store Genres', 'taxonomy general name', 'textdomain'),
    'singular_name' => _x('Book Store Genre', 'taxonomy singular name', 'textdomain'),
    'edit_item' => __('Edit Book Store Genre', 'textdomain'),
    'update_item' => __('Update Book Store Genre', 'textdomain'),
    'add_new_item' => __('Add New Book Store Genre', 'textdomain'),
    'new_item_name' => __('New Book Store Genre Name', 'textdomain'),
    'menu_name' => __('Book Store Genre', 'textdomain'),
  );
  $genre_args = array(
    'labels' => $genre_label,
    'hierarchical' => true,
    'show_in_rest' => true
  );
  register_taxonomy('book-genre' , 'book', $genre_args);

  $reading_level_label = array(
    'name'=> _x('Book Store Reading Levels', 'taxonomy general name', 'textdomain'),
    'singular_name' => _x('Book Store Reading Level', 'taxonomy singular name', 'textdomain'),
    'edit_item' => __('Edit Book Store Reading Level', 'textdomain'),
    'update_item' => __('Update Book Store Reading Level', 'textdomain'),
    'add_new_item' => __('Add New Book Store Reading Level', 'textdomain'),
    'new_item_name' => __('New Book Store Reading Level Name', 'textdomain'),
    'menu_name' => __('Book Store Reading Level', 'textdomain'),
  );

  $reading_level_args = array(
    'labels' => $reading_level_label,
    'hierarchical' => true,
    'show_in_rest' => true
  );

  register_taxonomy('book-reading-level' , 'book', $reading_level_args);

}

add_action('init', 'bookstore_post_type');
add_action('init', 'bookstore_taxonomy');