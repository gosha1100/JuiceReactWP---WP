<?php
if (!function_exists('reactJuice_setup')):

    function reactJuice_setup() {
        // Make theme available for translation.
        load_theme_textdomain('reactJuice', get_template_directory() . '/languages');

        // Enable support for post thumbnails and featured images.
        add_theme_support('post-thumbnails');

        // Register menus.
        register_nav_menus(array(
            'nav-menu'   => __('Navigation Menu', 'reactJuice'),
            'footer-menu' => __('Footer Menu', 'reactJuice'),
        ));
    }
    
endif; // reactJuice_setup

add_action('after_setup_theme', 'reactJuice_setup');

function reactJuice_enable_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'reactJuice_enable_svg_upload');

// Enqueue scripts and styles
function reactJuice_enqueue_scripts() {
    wp_enqueue_script('reactJuice-scripts', get_template_directory_uri() . '/index.js', array(), '1.0.0', true);
}