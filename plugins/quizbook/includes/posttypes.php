<?php

if (!defined('ABSPATH')) exit;

function quizbook_post_type(){
    $labels = array(
        'name' => _x( 'Quiz', 'Post type general name', 'quizbook' ),
        'singular_name' => _x( 'Quiz', 'Post type general name', 'quizbook' ),
        'menu_name' => _x( 'Quizes', 'Admin Menu text', 'quizbook' ),
        'name_admin_bar' => _x( 'Quiz', 'Add New on Toolbar', 'quizbook' ),
        'add_new' => __( 'Add New', 'quizbook'),
        'add_new_item' => __( 'Add New Quiz', 'quizbook'),
        'new_item' => __( 'New Quiz', 'quizbook' ),
        'edit_item' => __( 'Edit Quiz', 'quizbook' ),
        'view_item' => __( 'View Quiz', 'quizbook' ),
        'all_items' => __( 'All Quizes', 'quizbook' ),
        'search_items' => __( 'Search Quizes', 'quizbook' ),
        'parent_item_colon' => __( 'Parent Quizes:', 'quizbook' ),
        'not_found' => __( 'No Quizes found.', 'quizbook' ),
        'not_found_in_trash' => __( 'No Quizes found in Trash.', 'quizbook' ),
        'featured_image' => _x( 'Quiz Cover Image', '', 'quizbook' ),
        'set_featured_image' => _x( 'Set cover image', '', 'quizbook' ),
        'remove_featured_image' => _x( 'Remove cover image', '', 'quizbook' ),
        'use_featured_image' => _x( 'Use as cover image', '', 'quizbook' ),
        'archives' => _x( 'Quiz Archives', '', 'quizbook' ),
        'insert_into_item' => _x( 'Insert into quiz', '', 'quizbook' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this quiz', '', 'quizbook' ),
        'filter_items_list' => _x( 'Filter quizes list', '', 'quizbook' ),
        'items_list_navigation' => _x( 'Quizes list navigation', '', 'quizbook' ),
        'items_list' => _x( 'Quizes list', '', 'quizbook' ),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'quizes'),
        'capability_type' => array('quiz', 'quizes'),
        'menu_position' => 6,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'has_archive' => true,
        'hierarchical' => false,
        'supports' => array('title', 'editor'),
        'map_meta_cap' => true,
    );

    register_post_type( 'quizes', $args);

}

add_action( 'init', 'quizbook_post_type');

// Flush rewrite rules to add "quizes" as a permalink

function quizbook_rewrite_flush() {
    quizbook_post_type();
    flush_rewrite_rules();
}