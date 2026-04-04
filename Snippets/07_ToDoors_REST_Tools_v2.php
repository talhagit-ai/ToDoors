<?php
/**
 * Snippet #7: ToDoors REST Tools v2
 * Status: ACTIVE
 * Scope: global
 */

add_action("rest_api_init", function() {
    register_rest_route("todoors-tools/v1", "/page-data", [
        "methods" => "GET",
        "callback" => function($request) {
            $id = intval($request->get_param("id"));
            $raw = get_post_meta($id, "gdlr-core-page-builder", true);
            $data = maybe_unserialize($raw);
            return rest_ensure_response(["id"=>$id,"data"=>$data,"raw_len"=>strlen($raw)]);
        },
        "permission_callback" => function() { return current_user_can("edit_pages"); }
    ]);
    register_rest_route("todoors-tools/v1", "/save-page-data", [
        "methods" => "POST",
        "callback" => function($request) {
            $id = intval($request->get_param("id"));
            $data = $request->get_param("data");
            update_post_meta($id, "gdlr-core-page-builder", $data);
            do_action("litespeed_purge_post", $id);
            return rest_ensure_response(["success"=>true,"id"=>$id]);
        },
        "permission_callback" => function() { return current_user_can("edit_pages"); }
    ]);
});