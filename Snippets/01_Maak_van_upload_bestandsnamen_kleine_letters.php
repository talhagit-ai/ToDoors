<?php
/**
 * Snippet #1: Maak van upload bestandsnamen kleine letters
 * Status: inactive
 * Scope: global
 */

add_filter( 'sanitize_file_name', 'mb_strtolower' );