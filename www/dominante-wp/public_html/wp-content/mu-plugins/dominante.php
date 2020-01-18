<?php
/**
 * Dominante Must-Use plugin for defining content types etc
 */

// DISABLE WHEN IN PRODUCTION
define( 'WP_DEBUG', true );


/**
 * Custom content types for Dominante
 */


function get_shared_content_type_config($content_type_name) {
	return array(
		"labels" => array(
			"name"          => __( "{$content_type_name}s" ),
			"singular_name" => __( "{$content_type_name}" ),
			"add_new_item"       => __( "Add New {$content_type_name}" ),
			"new_item"           => __( "New {$content_type_name}" ),
			"edit_item"          => __( "Edit {$content_type_name}" ),
			"view_item"          => __( "View {$content_type_name}" ),
			"all_items"          => __( "All {$content_type_name}s" ),
			"search_items"       => __( "Search {$content_type_name}s" ),
			"not_found"          => __( "No {$content_type_name}s found." ),
			"not_found_in_trash" => __( "No {$content_type_name}s found in Trash." )
		),
		# We don't have archives
		'has_archive'         => false,
		# We don't have search
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'supports' => array('title', 'editor', 'revisions', 'custom-fields', 'thumbnail', 'excerpt'),
		'show_in_rest' => true
	);
}


function add_dominante_post_types() {
	$album_config = array_merge(
		get_shared_content_type_config("Album"),
		array(
			'menu_icon' => 'dashicons-format-audio'
		)
	);
	register_post_type( 'album', $album_config);


	// Trips only need title, excerpt, content and image, so we're fine with default fields Wordpress provides
	$trip_config = array_merge(
		get_shared_content_type_config("Trip"),
		array(
			'menu_icon' => 'dashicons-palmtree'
		)
	);
	register_post_type( 'trip', $trip_config);


	$concert_config = array_merge(
		get_shared_content_type_config("Concert"),
		array(
			'menu_icon' => 'dashicons-tickets-alt'
		)
	);
	register_post_type( 'concert', $concert_config);


	$concert_config = array_merge(
		get_shared_content_type_config("News Piece"),
		array(
			'menu_icon' => 'dashicons-format-aside'
		)
	);
	register_post_type( 'news_piece', $concert_config);
}
add_action( 'init', 'add_dominante_post_types' );


add_filter( 'pll_get_post_types', 'add_cpt_to_pll', 10, 2 );

function add_cpt_to_pll( $post_types, $is_settings ) {
    if ( $is_settings ) {
        // hides 'my_cpt' from the list of custom post types in Polylang settings
        unset( $post_types['album'] );
        unset( $post_types['trip'] );
        unset( $post_types['concert'] );
        unset( $post_types['news_piece'] );
    } else {
        // enables language and translation management for 'my_cpt'
        $post_types['album'] = 'album';
        $post_types['trip'] = 'trip';
        $post_types['concert'] = 'concert';
        $post_types['news_piece'] = 'news_piece';
    }
    return $post_types;
}

/**
 * Remove default post type from admin menus
 * (We don't use the default posts for anything)
 */

add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
	remove_menu_page( 'edit.php' );
}
// The +New Post in Admin Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'new-post' );
}
// The Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}


add_image_size('dominante-block-image',200,200, true);
add_image_size('dominante-block-image-trip',266,177, true);
