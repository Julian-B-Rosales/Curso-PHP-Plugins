<?php
/*
    Plugin Name: Quizbook - Examen
    Plugin URI: 
    Description: Add options to create 'examenes' in the quizbook plugin
    Version: 1.0
    Author: Julian Rosales
    Author URI:
    License: GPL2
    License URI: https://www.gnu.org/licenses/gpl-2.0.html
    Text Domain: quizbook
 */

 
if(!defined('ABSPATH')) exit;

 function quizbook_examen_revisar(){
    if (!function_exists('quizbook_post_type')) {
        add_action( 'admin_notices', 'quizbook_examen_error_activar');

        deactivate_plugins( plugin_basename( __FILE__ ));
    }
}

add_action( 'admin_init', 'quizbook_examen_revisar');

function quizbook_examen_error_activar(){
    $clase = 'notice notice-error';
    $mensaje = 'El plugin quizbook debe estar activo para poder activar el plugin quizbook-examen';
    printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($clase), esc_html($mensaje));
}

require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';
require_once plugin_dir_path(__FILE__) . 'includes/roles.php';
require_once plugin_dir_path(__FILE__) . 'includes/metaboxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/scripts.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';
require_once plugin_dir_path(__FILE__) . 'includes/columnas.php';

register_activation_hook( __FILE__, 'quizbook_examen_rewrite_flush' );
register_activation_hook( __FILE__, 'quizbook_examen_agregar_capabilities' );
register_deactivation_hook( __FILE__, 'quizbook_examen_remover_capabilities' );