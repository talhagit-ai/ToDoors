<?php
/**
 * Snippet #6: TEMP_get_elementor_data
 * Status: inactive
 * Scope: single-use
 */

$page_id = 1852;
$data = get_post_meta($page_id, '_elementor_data', true);
$edit_mode = get_post_meta($page_id, '_elementor_edit_mode', true);
echo json_encode(['edit_mode' => $edit_mode, 'data_length' => strlen($data), 'data_preview' => substr($data, 0, 500)]);
