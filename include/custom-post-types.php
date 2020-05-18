<?php



$labels = [

    'name' => _x('Listings', 'post type general name', 'listingpro-plugin'),

    'singular_name' => _x('Listing', 'post type singular name', 'listingpro-plugin'),

    'add_new' => _x('Add New', 'book', 'listingpro-plugin'),

    'add_new_item' => __('Add New List', 'listingpro-plugin'),

    'edit_item' => __('Edit List', 'listingpro-plugin'),

    'new_item' => __('New Listing', 'listingpro-plugin'),

    'view_item' => __('View List', 'listingpro-plugin'),

    'search_items' => __('Search Listing', 'listingpro-plugin'),

    'not_found' => __('No List found', 'listingpro-plugin'),

    'not_found_in_trash' => __('No List found in Trash', 'listingpro-plugin'),

    'parent_item_colon' => ''

];

$args = [

    'labels' => $labels,

    'public' => true,

    'publicly_queryable' => true,

    'show_ui' => true,

    'query_var' => 'listing',

    'rewrite' => array('slug' => 'listing'),

    'capability_type' => 'post',

    'has_archive' => false,

    'hierarchical' => false,

    'menu_position' => null,

    'show_in_rest' => true,

    'supports' => array('title', 'editor', 'author', 'thumbnail', 'comments'),

    'menu_icon' => get_template_directory_uri() . '/images/reviews.png'

];



register_post_type('listing', $args);



register_taxonomy(

        'listing-category', 'listing', [

    'labels' => [

        'name' => 'Categories',

        'add_new_item' => 'Add New Category',

        'new_item_name' => "New Category"

    ],

    'show_ui' => true,

    'show_tagcloud' => false,

    'hierarchical' => true,

    'rewrite' => array('slug' => 'listing-category'),

    'query_var' => true,

    'public' => true,

    'show_in_rest' => true,

    // 'capabilities' => [

    //     'assign_terms' => 'assign_listing-category',

    // ]

        ]

);

/***************************************/

$location_labels = [

    'name' => __('Location', 'listingpro-plugin'),

    'singular_name' => __('Location', 'listingpro-plugin'),

    'search_items' => __('Search Locations', 'listingpro-plugin'),

    'popular_items' => __('Popular Locations', 'listingpro-plugin'),

    'all_items' => __('All Locations', 'listingpro-plugin'),

    'parent_item' => __('Parent Location', 'listingpro-plugin'),

    'parent_item_colon' => __('Parent Location:', 'listingpro-plugin'),

    'edit_item' => __('Edit Location', 'listingpro-plugin'),

    'update_item' => __('Update Location', 'listingpro-plugin'),

    'add_new_item' => __('Add New Location', 'listingpro-plugin'),

    'new_item_name' => __('New Location Name', 'listingpro-plugin'),

    'separate_items_with_commas' => __('Separate Locations with commas', 'listingpro-plugin'),

    'add_or_remove_items' => __('Add or remove Location', 'listingpro-plugin'),

    'choose_from_most_used' => __('Choose from the most used Locations', 'listingpro-plugin'),

    'menu_name' => __('Locations', 'listingpro-plugin')

];

register_taxonomy("location", ["listing"], ["hierarchical" => true,

    'labels' => $location_labels,

    'show_ui' => true,

    'query_var' => true,

    'rewrite' => array('slug' => 'location'),

    'show_in_rest' => true,

//    'capabilities' => [
//
//        'assign_terms' => 'assign_location',
//
//    ]

        ]

);

/******************************************/

$labels = array(

        'name' => _x('Pricing Plans', 'post type general name', 'listingpro-plugin'),

        'singular_name' => _x('Price Plans', 'post type singular name', 'listingpro-plugin'),

        'add_new' => _x('Add New Price Plan', 'book', 'listingpro-plugin'),

        'add_new_item' => __('Add New Price Plan', 'listingpro-plugin'),

        'edit_item' => __('Edit Price Plan', 'listingpro-plugin'),

        'new_item' => __('New Price Plan', 'listingpro-plugin'),

        'view_item' => __('View Price Plan', 'listingpro-plugin'),

        'search_items' => __('Search Price Plans', 'listingpro-plugin'),

        'not_found' => __('No Price Plan found', 'listingpro-plugin'),

        'not_found_in_trash' => __('No Price Plans found in Trash', 'listingpro-plugin'),

        'parent_item_colon' => ''

    );

    $args = array(

        'labels' => $labels,

        'public' => false,

        'publicly_queryable' => false,

        'show_ui' => true,

        'query_var' => true,

        'rewrite' => true,

        'capability_type' => 'post',

        'hierarchical' => false,

        'menu_position' => null,

        'supports' => array('title', 'thumbnail',),

        'menu_icon' => get_template_directory_uri() . '/images/plans.png'

    );



    register_post_type('price_plan', $args);