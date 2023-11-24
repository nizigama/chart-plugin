<?php

function mgp_initialise_api()
{
    register_rest_route('my_graph_plugin/v1', '/data', [
        'methods' => 'GET',
        'callback' => 'mgp_get_graph_data',
        'permission_callback' => '__return_true'
    ]);
}

function mgp_get_graph_data()
{
    global $wpdb;

    $data = $wpdb->get_results($wpdb->prepare(
        "select Name as name, Uv as uv, Pv as pv from " . $wpdb->prefix . "my_graph_data"
    ));

    return array_map(function ($v) {

        return [
            "name" => $v->name,
            "uv" => intval($v->uv),
            "pv" => intval($v->pv),
            "timestamp" => \Carbon\Carbon::now()->format("Y-m-d, H:i:s")
        ];
    }, $data);
}