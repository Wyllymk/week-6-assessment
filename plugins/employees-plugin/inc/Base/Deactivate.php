<?php
/**
 * @package EmployeesPlugin
 */

namespace Inc\Base;

 class Deactivate{
    public static function deactivate(){
        flush_rewrite_rules();
    }
 }