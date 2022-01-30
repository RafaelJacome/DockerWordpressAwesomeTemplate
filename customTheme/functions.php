<?php

function custom_theme_scripts() {
    wp_enqueue_style( 'main-style', get_stylesheet_uri());
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri(). "/dist/css/customTheme-style.css", false, 1.0, 'all');
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/dist/js/main.js', array ( 'jquery' ), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'custom_theme_scripts' );


if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {
 
    function mytheme_register_nav_menu(){
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'text_domain' ),
        ) );
    }
    add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'redirect'    => false,
        ));

        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Footer Settings'),
            'menu_title'  => __('Footer'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}

add_theme_support( 'custom-logo' );
function themename_custom_logo_setup() {
    $defaults = array(
        'height'               => 40,
        'width'                => 100,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );