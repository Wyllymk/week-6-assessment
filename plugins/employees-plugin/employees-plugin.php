<?php
/**
 * @package EmployeesPlugin
 */

 
 /* 
 * Plugin Name:       Employees
 * Plugin URI:        https://github.com/Wyllymk/
 * Description:       Handle the employees with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Wilson
 * Author URI:        https://wyllymk.github.io/newport/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/Wyllymk/wilson-features-plugin
 * Text Domain:       employees-plugin
 * Domain Path:       /languages
 */


 /* A security measure to prevent direct access to the plugin file. */
 defined('ABSPATH') or die('Hey you, get lost!');

/* Checking if the vendor folder exists and if it does, it will require the autoload.php file. */
 if(file_exists(dirname(__FILE__). '/vendor/autoload.php')){
    require_once dirname(__FILE__). '/vendor/autoload.php';
 }
 
/**
 * It activates the plugin.
 */
function activate_externally(){
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_externally');

/**
 * If the plugin is deactivated, then run the deactivate() function in the Deactivate class in the Base
 * namespace.
 */
function deactivate_externally(){
    Inc\Base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_externally');

/* Checking if the class exists and if it does, it will register the services. */
if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}
