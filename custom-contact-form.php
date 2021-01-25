<?php
/*
Plugin Name: Custom Contact Form
Description: This plugin add's contact form with shortcode.
Author URI: https://github.com/NikKolia/contact_form.git
*/

add_action('wp_enqueue_scripts', 'plugin_js');

function plugin_js() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', plugins_url('/assets/scripts/jquery.js', __FILE__), array(), null, true);
    wp_localize_script('my_ajax_filter_search', 'ajax_url', admin_url('admin-ajax.php'));
    wp_enqueue_script('contact_js', plugins_url('/assets/scripts/contact-form.js', __FILE__), array('jquery'), '1.0');
}

// register js and style on initialization
add_action('init', 'register_script');
function register_script() {
    wp_register_style( 'contact_css', plugins_url('/assets/contact.css', __FILE__), false, '1.0.0', 'all');
}

// use the registered js and style above
add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_style(){
    wp_enqueue_style( 'contact_css' );
}

include('shortcodes.php');