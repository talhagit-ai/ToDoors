<?php
/**
 * Snippet #10: ToDoors Structure Dump
 * Status: inactive
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_dump_done')) return;

    function tdoors_get_structure($data, $depth = 0) {
        if ($depth > 4) return '...';
        if (is_array($data)) {
            $result = [];
            $count = 0;
            foreach ($data as $key => $val) {
                if ($count >= 5) { $result['...'] = '(' . (count($data) - 5) . ' more)'; break; }
                $result[$key] = tdoors_get_structure($val, $depth + 1);
                $count++;
            }
            return $result;
        } elseif (is_string($data)) {
            return strlen($data) > 50 ? substr($data, 0, 50) . '...' : $data;
        }
        return $data;
    }

    $pages = [157 => 'service', 1964 => 'contact', 1852 => 'over-ons', 2804 => 'schuifdeuren'];
    $result = [];
    foreach ($pages as $id => $name) {
        $raw = get_post_meta($id, 'gdlr-core-page-builder', true);
        $data = maybe_unserialize($raw);
        $result[$name] = [
            'raw_len' => strlen($raw),
            'sections' => is_array($data) ? count($data) : 0,
            'structure' => tdoors_get_structure($data)
        ];
    }

    update_option('tdoors_structure_dump', json_encode($result));
    update_option('tdoors_dump_done', 1);
    error_log('ToDoors: structure dump complete');
}, 99);
