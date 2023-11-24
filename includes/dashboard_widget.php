<?php

function mgp_load_dashboard_widget(){
    wp_add_dashboard_widget(
        'mgp_dashboard_widget',
        'Graph data',
        'mgp_load_widget'
    );
}

function mgp_load_styles_and_scripts(){
    wp_enqueue_style('mgp_react_style', plugins_url('my_graph_plugin/frontend/dist/assets/index.css'));
    wp_enqueue_script('mgp_react_script', plugins_url('my_graph_plugin/frontend/dist/assets/index.js'));
}

function mgp_load_widget(){
    echo "<div id='mgp_dashboard_widget'></div>";
}