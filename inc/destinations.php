<?php
// Register Custom Post Type Destination
function create_destination_cpt() {

	$labels = array(
		'name' => _x( 'Destinations', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Destination', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Destinations', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Destination', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Destination Archives', 'textdomain' ),
		'attributes' => __( 'Destination Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Destination:', 'textdomain' ),
		'all_items' => __( 'All Destinations', 'textdomain' ),
		'add_new_item' => __( 'Add New Destination', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Destination', 'textdomain' ),
		'edit_item' => __( 'Edit Destination', 'textdomain' ),
		'update_item' => __( 'Update Destination', 'textdomain' ),
		'view_item' => __( 'View Destination', 'textdomain' ),
		'view_items' => __( 'View Destinations', 'textdomain' ),
		'search_items' => __( 'Search Destination', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Destination', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Destination', 'textdomain' ),
		'items_list' => __( 'Destinations list', 'textdomain' ),
		'items_list_navigation' => __( 'Destinations list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Destinations list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Destination', 'textdomain' ),
		'description' => __( 'Enter destinations travelled.', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-site',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'page-attributes', 'custom-fields'),
        'taxonomies' => array('post_tag'),
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
	register_post_type( 'destination', $args );

}
add_action( 'init', 'create_destination_cpt', 0 );

?>