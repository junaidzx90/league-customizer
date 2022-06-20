<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.fiverr.com/junaidzx90
 * @since             1.0.0
 * @package           League_Customizer
 *
 * @wordpress-plugin
 * Plugin Name:       League customizer
 * Plugin URI:        https://www.fiverr.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Developer Junayed
 * Author URI:        https://www.fiverr.com/junaidzx90
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       league-customizer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LEAGUE_CUSTOMIZER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-league-customizer-activator.php
 */
function activate_league_customizer() {
	
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-league-customizer-deactivator.php
 */
function deactivate_league_customizer() {
	
}

register_activation_hook( __FILE__, 'activate_league_customizer' );
register_deactivation_hook( __FILE__, 'deactivate_league_customizer' );

add_action("init", "add_player_region_taxonomy", 0);
function add_player_region_taxonomy(){
	$region_lab = array(
		'name' => _x( 'Region', 'Region general name' ),
		'singular_name' => _x( 'Region', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Region' ),
		'all_items' => __( 'All Region' ),
		'parent_item' => __( 'Parent region' ),
		'parent_item_colon' => __( 'Parent region:' ),
		'edit_item' => __( 'Edit region' ), 
		'update_item' => __( 'Update region' ),
		'add_new_item' => __( 'Add New region' ),
		'new_item_name' => __( 'New region Name' ),
		'menu_name' => __( 'Regions' ),
	);
	
	// Now register the taxonomy
	register_taxonomy('sp_region', array('sp_player'), array(
		'hierarchical' => true,
		'labels' => $region_lab,
		'public' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'sp_region' )
	));
	
	register_taxonomy_for_object_type( 'sp_region', 'sp_player' );
}