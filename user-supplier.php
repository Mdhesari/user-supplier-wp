<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mdhesari.com
 * @since             1.0.0
 * @package           User_Supplier
 *
 * @wordpress-plugin
 * Plugin Name:       User Supplier
 * Plugin URI:        https://nimckat.com
 * Description:       Enable suppliers in your site.
 * Version:           1.0.0
 * Author:            Mohamad Hesari
 * Author URI:        https://mdhesari.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       user-supplier
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

global $wpdb;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('USER_SUPPLIER_VERSION', '1.0.0');

/**
 * Database name for user supplier registration
 * Starts with a prefix of $wpdb
 */
define('SUPPLIER_TABLE_NAME', $wpdb->prefix.'suppliers');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-user-supplier-activator.php
 */
function activate_user_supplier()
{
    require_once plugin_dir_path(__FILE__).'includes/class-user-supplier-activator.php';
    User_Supplier_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-user-supplier-deactivator.php
 */
function deactivate_user_supplier()
{
    require_once plugin_dir_path(__FILE__).'includes/class-user-supplier-deactivator.php';
    User_Supplier_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_user_supplier');
register_deactivation_hook(__FILE__, 'deactivate_user_supplier');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__).'includes/class-user-supplier.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_user_supplier()
{

    $plugin = new User_Supplier();
    $plugin->run();

}

run_user_supplier();

function display_supplier_list()
{
    echo '<div class="wrap">';
    echo '<h2>تامین کنندگان</h2>';

    global $wpdb;
    $table_name = SUPPLIER_TABLE_NAME;
    $suppliers = $wpdb->get_results("SELECT * FROM $table_name");

    if (! empty($suppliers)) {
        echo '<table class="widefat">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>نام شرکت</th>';
        echo '<th>ایمیل</th>';
        echo '<th>محصول</th>';
        echo '<th>قیمت</th>';
        echo '<th>کشور</th>';
        echo '<th>شهر</th>';
        echo '<th>استان</th>';
        echo '<th>مکان تحویل</th>';
        echo '<th>تلفن شرکت</th>';
        echo '<th>نام نماینده</th>';
        echo '<th>تلفن نماینده</th>';
        echo '<th>توضیحات</th>';
        echo '<th>نامه معرفی</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($suppliers as $supplier) {
            echo '<tr>';
            echo '<td>'.$supplier->id.'</td>';
            echo '<td>'.$supplier->email.'</td>';
            echo '<td>'.$supplier->company_name.'</td>';
            echo '<td>'.$supplier->product_name.'</td>';
            echo '<td>'.$supplier->price.'</td>';
            echo '<td>'.$supplier->country.'</td>';
            echo '<td>'.$supplier->city.'</td>';
            echo '<td>'.$supplier->state.'</td>';
            echo '<td>'.$supplier->delivery_location.'</td>';
            echo '<td>'.$supplier->company_telephone.'</td>';
            echo '<td>'.$supplier->agent_name.'</td>';
            echo '<td>'.$supplier->agent_mobile.'</td>';
            echo '<td>'.$supplier->description.'</td>';
            echo '<td style="text-align: center;"><a target="_blank" class="dashicons-before dashicons-admin-links" href="'.$supplier->introduction_letter_url.'"></a></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'No suppliers found.';
    }

    echo '</div>';
}