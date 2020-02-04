<?php

// Register Custom Post Type Featured Hero Carousel
function create_featuredherocarousel_cpt() {

	$labels = array(
		'name' => _x( 'Featured Hero Carousel', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Featured Hero Carousel', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Featured Hero Carousel', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Featured Hero Carousel', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Featured Hero Carousel Archives', 'textdomain' ),
		'attributes' => __( 'Featured Hero Carousel Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Featured Hero Carousel:', 'textdomain' ),
		'all_items' => __( 'All Featured Hero Carousel', 'textdomain' ),
		'add_new_item' => __( 'Add New Featured Hero Carousel', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Featured Hero Carousel', 'textdomain' ),
		'edit_item' => __( 'Edit Featured Hero Carousel', 'textdomain' ),
		'update_item' => __( 'Update Featured Hero Carousel', 'textdomain' ),
		'view_item' => __( 'View Featured Hero Carousel', 'textdomain' ),
		'view_items' => __( 'View Featured Hero Carousel', 'textdomain' ),
		'search_items' => __( 'Search Featured Hero Carousel', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Featured Hero Carousel', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Featured Hero Carousel', 'textdomain' ),
		'items_list' => __( 'Featured Hero Carousel list', 'textdomain' ),
		'items_list_navigation' => __( 'Featured Hero Carousel list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Featured Hero Carousel list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Featured Hero Carousel', 'textdomain' ),
		'description' => __( 'Front page featured visits. ', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-image',
		'supports' => array('title', 'excerpt', 'thumbnail', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'featuredherocarousel', $args );

}
add_action( 'init', 'create_featuredherocarousel_cpt', 0 );

?>