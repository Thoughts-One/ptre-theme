<?php
/**
 * PTRE Theme functions and definitions
 *
 * @package PTRE_Theme
 */

// Define theme version
if (!defined('PTRE_THEME_VERSION')) {
    define('PTRE_THEME_VERSION', '1.0.0');
}

// Setup theme
add_action('after_setup_theme', 'ptre_theme_setup');
function ptre_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'ptre-theme'),
        'footer'  => __('Footer Menu', 'ptre-theme')
    ));
    
    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
}

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'ptre_theme_scripts');
function ptre_theme_scripts() {
    // Parent theme stylesheet
    wp_enqueue_style(
        'twentytwentyfive-style',
        get_template_directory_uri() . '/style.css',
        array(),
        PTRE_THEME_VERSION
    );
    
    // Child theme stylesheet
    wp_enqueue_style(
        'ptre-theme-style',
        get_stylesheet_uri(),
        array('twentytwentyfive-style'),
        PTRE_THEME_VERSION
    );
}