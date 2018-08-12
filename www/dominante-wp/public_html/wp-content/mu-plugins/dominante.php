
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
	);
}


function set_custom_fields($post_type, $fields) {
	add_action('wp_insert_post', function($post_id) use ($post_type, $fields) {
		if ( $_GET['post_type'] == $post_type ) {
			foreach ($fields as $field_name => $field_default_value) {
				add_post_meta($post_id, $field_name, $field_default_value, true);
			}
		}
		return true;
	});

	add_action('admin_menu', function() use ($post_type) {
		remove_meta_box( 'slugdiv', $post_type, 'normal' );
	});
}

function add_dominante_post_types() {
	$album_config = array_merge(
		get_shared_content_type_config("Album"),
		array(
			'menu_icon' => 'dashicons-format-audio'
		)
	);
	register_post_type( 'album', $album_config);
	set_custom_fields('album', array(
		'album_purchase_link' => 'Replace this text with a url to the album purchase page (like Holvi Store). Remove this text if you don\'t need a button to album purchase page.'
	));

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
	set_custom_fields('concert', array(
		'concert_ticket_link' => 'Replace this text with a url to the concert ticket purchase page (like Holvi Store). Remove this text if you don\'t need a button to ticket purchase page.'
	));


}
add_action( 'init', 'add_dominante_post_types' );




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