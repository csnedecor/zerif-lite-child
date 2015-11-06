<?php

add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_scripts', 10 );
function child_theme_enqueue_scripts() {
  wp_register_script( 'my_child_theme_script',
    get_stylesheet_directory_uri() . '/js/zerif.js', array("jquery", "zerif_knob_nav"), '20120206', true);
  wp_enqueue_script( 'my_child_theme_script' );
}

// enqueue the parent theme stylesheet with a low priority so it loads after bootstrap CSS
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 11 );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles', 12 );
function child_theme_enqueue_styles() {

  // remove child theme style sheet from being called before parent stylesheet
  wp_deregister_style( 'zerif_style' );

  // enqueue child theme style sheet again
  wp_register_style( 'my_child_theme_style',
    get_stylesheet_directory_uri() . '/style.css',
    array(),
    null,
    'all' );
  wp_enqueue_style( 'my_child_theme_style' );
}
