<?php
/**
 * Snippet #45: snippet_45
 * Status: ACTIVE
 * Scope: global
 */

add_action('rest_api_init', function() {
    register_rest_route('todoors/v1', '/section-json/(?P<id>[0-9]+)/(?P<idx>[0-9]+)', [
        'methods' => 'GET',
        'permission_callback' => function() { return current_user_can('manage_options'); },
        'callback' => function($req) {
            $id = $req['id'];
            $idx = intval($req['idx']);
            $data = get_post_meta($id, 'gdlr-core-page-builder', true);
            if (!is_array($data) || !isset($data[$idx])) {
                return ['error' => 'not found', 'count' => is_array($data) ? count($data) : 0];
            }
            return $data[$idx];
        }
    ]);
});
