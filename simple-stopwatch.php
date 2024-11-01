<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.topinfosoft.com/about
 * @since             1.0.1
 * @package           Simple_Stopwatch
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Stopwatch
 * Plugin URI:        http://www.topinfosoft.com
 * Description:       Simple Stopwatch with start, pause and reset button. Use shortcode [simplestopwatch]
 * Version:           1.0.1
 * Author:            Top Infosoft
 * Author URI:        http://www.topinfosoft.com/about
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-stopwatch
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SIMPLE_STOPWATCH_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-stopwatch-activator.php
 */
function activate_simple_stopwatch() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-stopwatch-activator.php';
	Simple_Stopwatch_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-stopwatch-deactivator.php
 */
function deactivate_simple_stopwatch() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-stopwatch-deactivator.php';
	Simple_Stopwatch_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_stopwatch' );
register_deactivation_hook( __FILE__, 'deactivate_simple_stopwatch' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-simple-stopwatch.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.1
 */
function run_simple_stopwatch() {

	$plugin = new Simple_Stopwatch();
	$plugin->run();

}
run_simple_stopwatch();

function ssw_shortcode(){
    return '<p id="output"></p>
<div id="controls">
  <button id="strtpause" onclick="strtpause()" class="stopwatchbutton">Start</button>
   <button id="reset" onclick="reset()" class="stopwatchbutton">Reset</button>
</div>';
}
add_shortcode('simplestopwatch','ssw_shortcode'); 