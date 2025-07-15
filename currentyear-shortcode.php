<?php
/**
 * Plugin Name: Current Year Shortcode with Editor Button
 * Description: Добавляет шорткод [currentyear] и кнопку в классический редактор для его вставки.
 * Version: 1.0
 * Author: Али Профи
 * URL: https://aliprofi.ru
 */

defined('ABSPATH') or die('No script kiddies please!');

// Шорткод [currentyear]
function cy_shortcode_current_year() {
    return date('Y');
}
add_shortcode('currentyear', 'cy_shortcode_current_year');

// Добавление кнопки в TinyMCE
function cy_add_tinymce_button() {
    if (current_user_can('edit_posts') && current_user_can('edit_pages') && get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'cy_add_tinymce_plugin');
        add_filter('mce_buttons', 'cy_register_tinymce_button');
    }
}
add_action('admin_head', 'cy_add_tinymce_button');

function cy_add_tinymce_plugin($plugin_array) {
    $plugin_array['currentyear'] = plugins_url('/currentyear.js', __FILE__);
    return $plugin_array;
}

function cy_register_tinymce_button($buttons) {
    array_push($buttons, 'currentyear');
    return $buttons;
}
?>
