<?php
/**
 * Snippet #47: snippet_47
 * Status: ACTIVE
 * Scope: global
 */

add_action('rest_api_init', function() {
    register_rest_route('todoors/v1', '/option/(?P<key>[a-zA-Z0-9_]+)', [
        'methods' => ['GET','DELETE'],
        'permission_callback' => function() { return current_user_can('manage_options'); },
        'callback' => function($req) {
            $key = $req['key'];
            if ($req->get_method() === 'DELETE') {
                delete_option($key);
                return ['deleted' => $key];
            }
            $val = get_option($key, '__NOT_SET__');
            return ['key' => $key, 'value' => $val];
        }
    ]);
});
