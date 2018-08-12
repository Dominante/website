
<?php
/**
 * Dominante Must-Use plugin for defining content types etc
 */

/**
 * Custom content types for Dominante
 */
function add_dominante_post_types() {
	register_post_type( 'acme_product',
		array(
			'labels' => array(
				'name' => __( 'Trips' ),
				'singular_name' => __( 'Trip' )
			),
			'public' => true,
			'has_archive' => false,
		)
	);
}
add_action( 'init', 'add_dominante_post_types' );
