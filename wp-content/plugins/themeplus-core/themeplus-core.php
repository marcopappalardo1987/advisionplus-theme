<?php

// phpcs:ignore Squiz.Commenting.FileComment.Missing
/**
 * Redux, a simple, truly extensible and fully responsive options framework
 * for WordPress themes and plugins. Developed with WordPress coding
 * standards and PHP best practices in mind.
 *
 * Plugin Name:     ThemePlus Core
 * Plugin URI:      http://marcopappalardo.it
 * Description:     This is the Core for ThemePlus
 * Author:          Marco Pappalardo
 * Author URI:      http://marcopappalardo.it
 * Version:         1.0.0
 * Text Domain:     themeplus-core
 * License:         GPLv3 or later
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!class_exists('ReduxFramework') && file_exists(plugin_dir_path(__FILE__) . 'framework.php')){
    require_once ('framework.php');
}

if (!isset($redux_demo) && file_exists(plugin_dir_path(__FILE__) . 'config.php')){
    require_once ('config.php');
}