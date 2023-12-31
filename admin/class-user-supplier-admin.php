<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://mdhesari.com
 * @since      1.0.0
 *
 * @package    User_Supplier
 * @subpackage User_Supplier/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    User_Supplier
 * @subpackage User_Supplier/admin
 * @author     Mohamad Hesari <mdhesari99@gmail.com>
 */
class User_Supplier_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in User_Supplier_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The User_Supplier_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__).'css/user-supplier-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in User_Supplier_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The User_Supplier_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__).'js/user-supplier-admin.js', array('jquery'), $this->version, false);

    }

    public function initialize_admin()
    {
        //
    }

    public function menus()
    {
        add_menu_page(
            __('تامین کنندگان', 'alibuy'), // Translated menu title
            __('تامین کنندگان', 'alibuy'), // Translated menu title
            'manage_options', // Capability required to access
            'supplier-list', // Page Slug
            'display_supplier_list', // Callback function to display the page
            'dashicons-groups', // Menu Icon (change to a suitable icon)
            20 // Menu Position
        );
    }

}
