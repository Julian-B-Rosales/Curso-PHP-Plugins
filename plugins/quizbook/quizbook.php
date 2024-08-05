<?php
/*
    Plugin Name: Quizbook
    Plugin URI: 
    Description: A plugin to create quizzes
    Version: 1.0
    Author: Julian Rosales
    Author URI:
    License: GPL2
    License URI: https://www.gnu.org/licenses/gpl-2.0.html
    Text Domain: quizbook
 */

// Load scripts

require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';
require_once plugin_dir_path(__FILE__) . 'includes/metaboxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/roles.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';
require_once plugin_dir_path(__FILE__) . 'includes/functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/scripts.php';
require_once plugin_dir_path(__FILE__) . 'includes/results.php';


// Rewrite rules

register_activation_hook( __FILE__, 'quizbook_rewrite_flush' );
register_activation_hook( __FILE__, 'quizbook_create_role' );
register_activation_hook( __FILE__, 'quizbook_add_capabilities' );


register_deactivation_hook( __FILE__, 'quizbook_remove_role' );
register_deactivation_hook( __FILE__, 'quizbook_remove_capabilities' );