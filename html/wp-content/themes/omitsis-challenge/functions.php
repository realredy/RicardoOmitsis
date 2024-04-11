<?php
/**
 * Omitsis Challenge theme functions
 *
 * @package Omitsis_Challenge
 */

namespace Omitsis_Challenge;
 
 

add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_theme_style' );
add_action( 'wp_head', __NAMESPACE__ . '\display_ascii_signature', 0 );

   
/**
 * Sets up the theme functionalities
 */
function setup() {
	load_theme_textdomain( 'omitsis-challenge', get_template_directory() . '/languages' );

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'archive-thumb', 200, 399);  
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary', 'omitsis-challenge' ),
			'footer'  => __( 'Footer', 'omitsis-challenge' ),
		)
	);
}

/**
 * Registers and enqueues the theme assets.
 */
function enqueue_theme_style() {
	wp_register_style( 'omitsis-challenge', get_stylesheet_uri(), array(), wp_get_theme()->Version );
	wp_enqueue_style( 'omitsis-challenge' );
	if (is_home()) :  
	  wp_register_style( 'omitsis-challenge_archiveStyles', get_theme_file_uri() .'/assets/css/archive.css', array(), wp_get_theme()->Version );
		wp_enqueue_style( 'omitsis-challenge_archiveStyles' );
	endif; 
}

  
/**
 * Displays Omitsis ASCII signature
 */
function display_ascii_signature() {
	get_template_part( 'template-parts/ascii-signature' );
}
