<?php
/**
 * Plugin Name: Bimly Step Form
 * Plugin URI: 
 * Description: Bimly Step Form
 * Version: 1.0.0
 * Author: Pilar Hub
 * Author URI: 
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: bimly_step_form
 */


// Prevent direct access to the plugin file
defined( 'ABSPATH' ) || exit;

/**
 * 
 * Require All Css Files Here
 * 
 */
function bimly_form_css() {
    wp_enqueue_style( 'bimly-signature-style', 'https://cdn.jsdelivr.net/npm/signature_pad/dist/signature-pad.css', array(), '1.0.0' );
    wp_enqueue_style( 'bimly-style', plugin_dir_url( __FILE__ ) . '/assets/css/bimly.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'bimly_form_css' );



/**
 * 
 * Require All Js Files Here
 * 
 */
function bimly_form_js() {
    wp_enqueue_script( 'bimly-signature-script', 'https://cdn.jsdelivr.net/npm/signature_pad', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'bimly-form-script', plugin_dir_url( __FILE__ ) . '/assets/js/bimly.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'bimly_form_js' );



/**
 * 
 * Require All Includes Files Here
 * 
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/step-form/step.php';