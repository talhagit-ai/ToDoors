<?php
/**
 * Snippet #25: ToDoors Remove Uurtarief (Post-process)
 * Status: inactive
 * Scope: global
 */

add_action("init", function() {
    // Run na Snippet 17 (priority 100)
    $service_id = 157;
    $service_data = get_post_meta($service_id, "gdlr-core-page-builder", true);
    
    if (!is_array($service_data) || empty($service_data)) {
        return;
    }

    // Loop door alle items en verwijder uurtarief uit content
    foreach ($service_data as &$section) {
        if ($section["template"] === "wrapper" && isset($section["items"])) {
            foreach ($section["items"] as &$column) {
                if ($column["template"] === "wrapper" && isset($column["items"])) {
                    foreach ($column["items"] as &$item) {
                        if (isset($item["value"]["content"])) {
                            // Verwijder uurtarief lines
                            $item["value"]["content"] = str_replace(
                                "<p><strong>Uurtarief:</strong> €73/uur (kantoor)</p>",
                                "",
                                $item["value"]["content"]
                            );
                            $item["value"]["content"] = str_replace(
                                "<p><strong>Uurtarief:</strong> €69/uur (kantoor)</p>",
                                "",
                                $item["value"]["content"]
                            );
                            $item["value"]["content"] = str_replace(
                                "<p><strong>Uurtarief:</strong> €65/uur (kantoor)</p>",
                                "",
                                $item["value"]["content"]
                            );
                            $item["value"]["content"] = str_replace(
                                "<p><strong>Geen uurtarief - alles inbegrepen!</strong></p>",
                                "",
                                $item["value"]["content"]
                            );
                        }
                    }
                }
            }
        }
    }

    update_post_meta($service_id, "gdlr-core-page-builder", $service_data);
    do_action("litespeed_purge_post", $service_id);
}, 100);
