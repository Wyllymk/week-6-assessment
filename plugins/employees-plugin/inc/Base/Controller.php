<?php
/**
 * @package EmployeesPlugin
 */

 namespace Inc\Base;

 class Controller{
    public $plugin_path;
    public $plugin_url;
    public $plugin_name;

    public function __construct(){
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin_name = plugin_basename(dirname(__FILE__, 3)). '/employees-plugin.php';
    }
 }