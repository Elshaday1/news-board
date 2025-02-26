<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://elshaday.com
 * @since             1.0.0
 * @package           News_Board
 *
 * @wordpress-plugin
 * Plugin Name:       News-Board
 * Plugin URI:        https://news-board.com
 * Description:       this site fetches and displays news
 * Version:           1.0.0
 * Author:            Elshaday
 * Author URI:        https://elshaday.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       news-board
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
define( 'NEWS_BOARD_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-news-board-activator.php
 */
function activate_news_board() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-news-board-activator.php';
	News_Board_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-news-board-deactivator.php
 */
function deactivate_news_board() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-news-board-deactivator.php';
	News_Board_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_news_board' );
register_deactivation_hook( __FILE__, 'deactivate_news_board' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-news-board.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_news_board() {

	$plugin = new News_Board();
	$plugin->run();

}
run_news_board();
