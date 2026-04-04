<?php
/**
 * Snippet #12: ToDoors Register Settings
 * Status: inactive
 * Scope: global
 */

add_action("rest_api_init", function() { register_setting("general", "tdoors_page_dump", ["show_in_rest" => true, "type" => "string"]); });