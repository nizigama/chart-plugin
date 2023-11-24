<?php

function mgp_activate(){

    global $wpdb;

    $tableQuery = "CREATE TABLE " . $wpdb->prefix . "my_graph_data(
        Id bigint not null auto_increment,
        Name varchar(255) not null,
        Uv bigint not null,
        Pv bigint not null,
        primary key(Id)
        )";

    require ABSPATH . "wp-admin/includes/upgrade.php";

    dbDelta($tableQuery);
}