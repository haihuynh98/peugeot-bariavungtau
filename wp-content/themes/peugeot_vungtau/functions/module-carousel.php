<?php

// Our custom post type function
function create_carousels_posttype()
{

    register_post_type('carousels',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Carousels'),
                'singular_name' => __('Carousels'),
                'add_new'               => __( 'Add New Carousel', 'textdomain' ),
                'add_new_item'          => __( 'Add New Carousel', 'textdomain' ),
                'new_item'              => __( 'New Carousel', 'textdomain' ),
                'add_new_item'          => __( 'Add New Carousel', 'textdomain' ),
                'new_item'              => __( 'New Carousel', 'textdomain' ),
                'edit_item'             => __( 'Edit Carousel', 'textdomain' ),
                'view_item'             => __( 'View Carousel', 'textdomain' ),
                'all_items'             => __( 'All Carousels', 'textdomain' ),
                'search_items'          => __( 'Search Carousels', 'textdomain' ),
            ),
            'description' => __('Carousels listing', 'twentytwentyone'),
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'thumbnail', 'revisions'),
            'taxonomies' => array('genres'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Carousels'),
            'show_in_rest' => true,
            'menu_icon'=> 'dashicons-images-alt'
        )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_carousels_posttype');

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}


function getCarouselsListing($containerClass = 'container-carousels', $itemClass = 'item-carousel')
{
    $args = array('post_type' => 'carousels', 'posts_per_page' => 10);
    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        echo '<div class="' . $containerClass . '">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            echo '<div class="' . $itemClass . '">';
            echo the_post_thumbnail('full');
            echo '</div>';
        }
        wp_reset_postdata();
        echo '</div>';
    }
}

add_action('getCarouselsListing', 'getCarouselsListing');

function getCarouselsListingArray()
{
    $args = array('post_type' => 'carousels', 'posts_per_page' => -1);
    $the_query = new WP_Query($args);

    $result = [];

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $result[]= [
                'image' => get_the_post_thumbnail_url(get_the_ID(),'full'),
                'image_large' => get_the_post_thumbnail_url(get_the_ID(),'large'),
                'name' => get_the_title(),
            ];
        }
        wp_reset_postdata();
    }

    return $result;
}