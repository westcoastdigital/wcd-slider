<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists('wcd_slider_cpt') ) {

    // Register Custom Post Type
    function wcd_slider_cpt() {
    
        $labels = array(
            'name'                  => _x( 'Hero Sliders', 'Post Type General Name', 'wcd' ),
            'singular_name'         => _x( 'Hero Slider', 'Post Type Singular Name', 'wcd' ),
            'menu_name'             => __( 'Hero Slider', 'wcd' ),
            'name_admin_bar'        => __( 'Hero Slider', 'wcd' ),
            'archives'              => __( 'Slider Archives', 'wcd' ),
            'attributes'            => __( 'Slider Attributes', 'wcd' ),
            'parent_item_colon'     => __( 'Parent Slider:', 'wcd' ),
            'all_items'             => __( 'All Slides', 'wcd' ),
            'add_new_item'          => __( 'Add New Slide', 'wcd' ),
            'add_new'               => __( 'Add Slide', 'wcd' ),
            'new_item'              => __( 'New Slide', 'wcd' ),
            'edit_item'             => __( 'Edit Slide', 'wcd' ),
            'update_item'           => __( 'Update Slide', 'wcd' ),
            'view_item'             => __( 'View Slide', 'wcd' ),
            'view_items'            => __( 'View Slides', 'wcd' ),
            'search_items'          => __( 'Search Slides', 'wcd' ),
            'not_found'             => __( 'Not found', 'wcd' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'wcd' ),
            'featured_image'        => __( 'Slide Background', 'wcd' ),
            'set_featured_image'    => __( 'Set slide background', 'wcd' ),
            'remove_featured_image' => __( 'Remove slide background', 'wcd' ),
            'use_featured_image'    => __( 'Use as slide background', 'wcd' ),
            'insert_into_item'      => __( 'Insert into slide', 'wcd' ),
            'uploaded_to_this_item' => __( 'Uploaded to this slide', 'wcd' ),
            'items_list'            => __( 'Slides list', 'wcd' ),
            'items_list_navigation' => __( 'Slides list navigation', 'wcd' ),
            'filter_items_list'     => __( 'Filter slides list', 'wcd' ),
        );
        $args = array(
            'label'                 => __( 'Hero Slider', 'wcd' ),
            'description'           => __( 'Hero Slider', 'wcd' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 10,
            'menu_icon'             => 'dashicons-images-alt2',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'slider', $args );
    
    }
    add_action( 'init', 'wcd_slider_cpt', 0 );
    
    }