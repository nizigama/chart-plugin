<?php

/*
 *  Plugin Name: My graph plugin
 *  Plugin URI: https://google.com
 *  Description: A coding challenge
 *  Version: 1.0
 *  Author: Me
 *  Author URI: https://github.com/nizigama
 *  Text Domain: my_graph_plugin
 *
 */

if (!function_exists("add_action")){
    echo "You can't load this plugin directly";
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

// includes
include_once 'includes/activation.php';
include_once 'includes/dashboard_widget.php';
include_once 'includes/api.php';

// hooks
register_activation_hook(__FILE__, 'mgp_activate');
add_action("admin_enqueue_scripts", "mgp_load_styles_and_scripts");
add_action("wp_dashboard_setup", "mgp_load_dashboard_widget");
add_action("rest_api_init", "mgp_initialise_api");