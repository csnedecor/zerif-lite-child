<?php
// =========================================
// Enqueue child theme scripts and styles
// =========================================

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
    wp_enqueue_script('zerif_child', get_stylesheet_directory_uri() . '/js/zerif.js');
}

add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles', 12 );
function child_theme_enqueue_styles() {

  // remove child theme style sheet from being called before parent stylesheet
  wp_deregister_style( 'zerif_style' );
    wp_dequeue_script('zerif_script');
    wp_deregister_script('zerif_script');

  // enqueue child theme style sheet again
  wp_register_style( 'my_child_theme_style',
    get_stylesheet_directory_uri() . '/style.css',
    array(),
    null,
    'all' );
  wp_enqueue_style( 'my_child_theme_style' );
}

// ===================================================
// REGISTER CUSTOM SIDEBARS
// ===================================================

add_action('widgets_init', 'zerif_child_register_widgets');

// Register front page Contact Form widget
function zerif_child_register_widgets() {

    register_sidebar(
        array(
            'name'          => 'Contact us section widgets',
            'id'            => 'sidebar-jetpackcontactus',
            'before_widget' => '',
            'after_widget'  => ''
            )
        );
}

// ====================================================
// Change Front page contact form success message
// ====================================================
add_filter('grunion_contact_form_success_message', function( $message ) {

 ob_start();

 ?>
<div class="notification success">
    <p>Thank you for reaching out! Your email was sent successfully.</p>
</div>
<p><a href="/#contact">Go back</a></p>

 <?php

 return ob_get_clean();// or $message for default notice

});

/* Register primary menu */
register_nav_menus(array(
    'footer' => __('Footer Menu', 'zerif-lite'),
));
?>
