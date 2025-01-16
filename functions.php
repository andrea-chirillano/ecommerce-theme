<?php
function ecommerce_theme_setup() {
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');

    add_theme_support('editor-color-palette', [
        [
            'name'  => __('Blue', 'ecommerce-theme'),
            'slug'  => 'blue',
            'color' => '#0073aa',
        ],
        [
            'name'  => __('Black', 'ecommerce-theme'),
            'slug'  => 'black',
            'color' => '#000000',
        ],
    ]);

    add_theme_support('editor-font-sizes', [
        [
            'name' => __('Small', 'ecommerce-theme'),
            'size' => 12,
            'slug' => 'small',
        ],
        [
            'name' => __('Big', 'ecommerce-theme'),
            'size' => 36,
            'slug' => 'big',
        ],
    ]);

    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'ecommerce_theme_setup');

function ecommerce_theme_enqueue_styles() {
    wp_enqueue_style('ecommerce-theme-styles', get_stylesheet_uri(), [], '1.0', 'all');

    if (is_front_page()) {
        wp_enqueue_style('ecommerce-front-page-styles', get_template_directory_uri() . '/front-page.css', [], '1.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'ecommerce_theme_enqueue_styles');

function slide_up_transition() {

    wp_enqueue_script('jquery'); 

    wp_enqueue_script(
        'custom-js',
        get_template_directory_uri() . '/js/custom.js',
        array('jquery'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'slide_up_transition');

function add_fonts() {
    wp_enqueue_style('calistoga-font', 'https://fonts.googleapis.com/css2?family=Calistoga&display=swap', false);
    wp_enqueue_style('geologica-font', 'https://fonts.googleapis.com/css2?family=Geologica&display=swap', false);
}
add_action('wp_enqueue_scripts', 'add_fonts');
