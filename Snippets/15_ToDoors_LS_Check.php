<?php
/**
 * Snippet #15: ToDoors LS Check
 * Status: inactive
 * Scope: global
 */

add_action("init", function() { $cfg = get_option("litespeed_cfg", []); $done = get_option("tdoors_litespeed_done", ""); update_option("tdoors_ls_check", json_encode(["done" => $done, "css_min" => $cfg["optm-css"] ?? false, "js_min" => $cfg["optm-js"] ?? false, "js_defer" => $cfg["optm-js_defer"] ?? false, "cache" => $cfg["cache"] ?? false])); }, 99);