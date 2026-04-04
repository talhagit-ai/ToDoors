<?php
/**
 * Snippet #38: Purge Cache All
 * Status: inactive
 * Scope: single-use
 */

add_action("init", function() {
    $ids = [2804, 2820, 2828, 2832, 2823, 2520];
    foreach ($ids as $id) {
        do_action("litespeed_purge_post", $id);
        clean_post_cache($id);
    }
    // Also purge all
    do_action("litespeed_purge_all");
}, 1);
