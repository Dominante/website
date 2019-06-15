<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function dominante_blocks_cgb_block_assets() { // phpcs:ignore
	// Styles.
	wp_enqueue_style(
		'dominante_blocks-cgb-style-css', // Handle.
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
		array( 'wp-editor' ) // Dependency to include the CSS after it.
		// filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
	);
}

// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'dominante_blocks_cgb_block_assets' );

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function dominante_blocks_cgb_editor_assets() { // phpcs:ignore
	// Scripts.
	wp_enqueue_script(
		'dominante_blocks-cgb-block-js', // Handle.
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		// filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: File modification time.
		true // Enqueue the script in the footer.
	);

	// Styles.
	wp_enqueue_style(
		'dominante_blocks-cgb-block-editor-css', // Handle.
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
		// filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
	);
}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'dominante_blocks_cgb_editor_assets' );

function dominante_blocks_categories( $categories, $post ) {
	# if ( $post->post_type !== 'post' ) {
	# 	return $categories;
	# }

	return array_merge(
		array(
			array(
				'slug' => 'dominante',
				'title' => __( 'Dominante', 'dominante-blocks' ),
				'icon'  => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z" /><path d="M19 13H5v-2h14v2z" /></svg>',
			),
		),
		$categories
	);
}
add_filter( 'block_categories', 'dominante_blocks_categories', 10, 2 );

wp_enqueue_script( 'wp-api' );



function dominante_block_render_callback($content_type, $attributes) {
	$id = $attributes['selectedItemId'];
	$query = new WP_Query("post_type=$content_type&p=$id");
	$results = $query->posts;

	if (count($results) == 1) {
		$item = $results[0];
		$thumbnail = get_the_post_thumbnail($id, 'dominante-block-image');
	    $thumbnail = $thumbnail != '' ? $thumbnail : "Please add featured image to this $content_type!";
	    $excerpt = has_excerpt($id) ? $item->post_excerpt : '';

	    if (has_excerpt($id)) {
		    return <<<EOD
<div class="dominante-block">
	<div class="dominante-block-photo">$thumbnail</div>

	<div class="dominante-block-text">
		<h3 class="dominante-block-title">$item->post_title</h3>
		<div class="dominante-block-content readmore-section">
			<div class="readmore-not-clicked">
			  $excerpt
			</div>
			<div class="readmore-clicked">
			  $item->post_content
			</div>
			<a class="readmore-not-clicked readmore-toggle" href="">Lue lisää</a>
			<a class="readmore-clicked readmore-toggle" href="">Näytä vähemmän</a>
		</div>
	</div>	
</div>
EOD;
	    } else {
		    return <<<EOD
<div class="dominante-block">
	<div class="dominante-block-photo">$thumbnail</div>

	<div class="dominante-block-text">
		<h3 class="dominante-block-title">$item->post_title</h3>
		<div class="dominante-block-content readmore-section">
		    $item->post_content
		</div>
	</div>	
</div>
EOD;

	    }
	} else {
		return "<div>CONTENT ITEM OF TYPE $content_type HAS BEEN DELETED. PLEASE REMOVE THIS BLOCK FROM THIS PAGE!</div>";
	}
}

function dominante_block_album_render_callback($attributes) {
	return dominante_block_render_callback('album', $attributes);
}
register_block_type( 'cgb/block-dominante-blocks-album', array(
	'render_callback' => 'dominante_block_album_render_callback',
	'attributes' => array(
		'selectedItemId' => array(
			'type' => 'number'
		)
	),
));


function dominante_block_trip_render_callback( $attributes, $content ) {
	return dominante_block_render_callback('trip', $attributes);
}
register_block_type( 'cgb/block-dominante-blocks-trip', array(
	'render_callback' => 'dominante_block_trip_render_callback',
	'attributes' => array(
		'selectedItemId' => array(
			'type' => 'number'
		)
	)
));


function dominante_block_concert_render_callback( $attributes, $content ) {
	return dominante_block_render_callback('concert', $attributes);
}
register_block_type( 'cgb/block-dominante-blocks-concert', array(
	'render_callback' => 'dominante_block_concert_render_callback',
	'attributes' => array(
		'selectedItemId' => array(
			'type' => 'number'
		)
	)
));


function dominante_block_news_piece_render_callback( $attributes, $content ) {
	return dominante_block_render_callback('news_piece', $attributes);
}
register_block_type( 'cgb/block-dominante-blocks-news-piece', array(
	'render_callback' => 'dominante_block_news_piece_render_callback',
	'attributes' => array(
		'selectedItemId' => array(
			'type' => 'number'
		)
	)
));