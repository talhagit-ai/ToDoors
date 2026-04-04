<?php
/**
 * Snippet #16: ToDoors LS Check Register
 * Status: inactive
 * Scope: global
 */

add_action("rest_api_init", function() { register_setting("general", "tdoors_ls_check", ["show_in_rest" => true, "type" => "string"]); });