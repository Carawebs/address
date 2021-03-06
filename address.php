<?php
/*
Plugin Name:			 Address
Plugin URI:        http://carawebs.com
Description:       Build address & contact fields as a settings page. Displays address according to schema.org markup guidelines.
Version:           1.0.0
Author:            David Egan
Author URI:        http://dev-notes.eu

License:           GPL-2.0+
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain:       address
Domain Path:       /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-address-activator.php
 */
function activate_address() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-address-activator.php';
	Address_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-address-deactivator.php
 */
function deactivate_address() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-address-deactivator.php';
	Address_Deactivator::deactivate();
}

/**
 * `register_activation_hook()` is a WordPress function that registers a plugin
 * function to be run when the plugin is activated.
 */
register_activation_hook( __FILE__, 'activate_address' );
register_deactivation_hook( __FILE__, 'deactivate_address' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-address.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_address() {

	$plugin = new Address();
	$plugin->run();

}
run_address();
