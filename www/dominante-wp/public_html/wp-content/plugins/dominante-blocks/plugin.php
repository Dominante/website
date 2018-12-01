<?php
/**
 * Plugin Name: Gutenberg blocks for Dominante
 * Plugin URI: https://github.com/ahmadawais/create-guten-block/
 * Description: A plugin for empbedding album, trip, concert and news content types in pages.
 * Author: Atte Keinänen
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
