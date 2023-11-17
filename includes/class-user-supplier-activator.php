<?php

/**
 * Fired during plugin activation
 *
 * @link       https://mdhesari.com
 * @since      1.0.0
 *
 * @package    User_Supplier
 * @subpackage User_Supplier/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    User_Supplier
 * @subpackage User_Supplier/includes
 * @author     Mohamad Hesari <mdhesari99@gmail.com>
 */
class User_Supplier_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        self::create_tables();
    }

    private static function create_tables()
    {
        global $wpdb;

        $table_name = $wpdb->prefix.'suppliers';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    product_name VARCHAR(255),
    email VARCHAR(255),
    price DECIMAL(10, 2),
    country VARCHAR(100),
    city VARCHAR(100),
    state VARCHAR(100),
    delivery_location VARCHAR(255),
    company_telephone VARCHAR(20),
    agent_name VARCHAR(100),
    agent_mobile VARCHAR(20),
    type VARCHAR(20),
    description TEXT,
    introduction_letter_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY id (id)
    ) $charset_collate;";

        require_once ABSPATH.'wp-admin/includes/upgrade.php';
        dbDelta($sql);

    }

}
