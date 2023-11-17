<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://mdhesari.com
 * @since      1.0.0
 *
 * @package    User_Supplier
 * @subpackage User_Supplier/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    User_Supplier
 * @subpackage User_Supplier/includes
 * @author     Mohamad Hesari <mdhesari99@gmail.com>
 */
class User_Supplier_Deactivator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate()
    {
        self::delete_tables();
    }

    private static function delete_tables()
    {
        global $wpdb;

        $table_name = SUPPLIER_TABLE_NAME;

        $wpdb->query("DROP TABLE IF EXISTS $table_name");
    }

}
