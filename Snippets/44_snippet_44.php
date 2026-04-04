<?php
/**
 * Snippet #44: snippet_44
 * Status: ACTIVE
 * Scope: global
 */

add_action('rest_api_init', function() {
    register_rest_route('todoors/v1', '/page-structure/(?P<id>[0-9]+)', [
        'methods' => 'GET',
        'permission_callback' => function() { return current_user_can('manage_options'); },
        'callback' => function($req) {
            $id = $req['id'];
            $data = get_post_meta($id, 'gdlr-core-page-builder', true);
            if (!is_array($data)) return ['error' => 'not array', 'type' => gettype($data)];
            
            $summary = [];
            foreach ($data as $si => $section) {
                $type = $section['type'] ?? 'unknown';
                $template = $section['template'] ?? 'unknown';
                $val = $section['value'] ?? [];
                
                // For wrapper sections, get items
                $items_summary = [];
                if (isset($val['items'])) {
                    foreach ($val['items'] as $ii => $item) {
                        $items_summary[] = [
                            'idx' => $ii,
                            'type' => $item['type'] ?? '?',
                            'template' => $item['template'] ?? '?',
                            'title_preview' => substr($item['value']['title'] ?? $item['value']['caption'] ?? '', 0, 80),
                        ];
                    }
                }
                
                $summary[] = [
                    'idx' => $si,
                    'type' => $type,
                    'template' => $template,
                    'bg_color' => $val['background-color'] ?? '',
                    'items_count' => count($items_summary),
                    'items' => $items_summary,
                ];
            }
            return $summary;
        }
    ]);
});
