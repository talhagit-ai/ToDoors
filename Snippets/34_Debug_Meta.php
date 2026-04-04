<?php
/**
 * Snippet #34: Debug Meta
 * Status: ACTIVE
 * Scope: global
 */

add_action("rest_api_init", function() {
    register_rest_route("todoors/v1", "/raw-meta/(?P<id>[0-9]+)", [
        "methods" => "GET",
        "callback" => function($req) {
            global $wpdb;
            $id = $req["id"];
            $rows = $wpdb->get_results($wpdb->prepare(
                "SELECT meta_key, LENGTH(meta_value) as len, LEFT(meta_value, 100) as preview 
                 FROM {$wpdb->postmeta} WHERE post_id=%d AND meta_key LIKE %s",
                $id, "gdlr%"
            ));
            return $rows;
        },
        "permission_callback" => "__return_true"
    ]);
});
