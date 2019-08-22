<?php 

function wcd_slider_shortcode_enqueue() {
    wp_register_style( 'slick', plugin_dir_url( __FILE__ ) . 'assets/slick/slick.css' );
    wp_register_style( 'slick-theme', plugin_dir_url( __FILE__ ) . 'css/slick-theme.css' );
    wp_register_style( 'hero-slider', plugin_dir_url( __FILE__ ) . 'css/style.css' );
    wp_register_script( 'slick', plugin_dir_url( __FILE__ ) . 'assets/slick/slick.min.js' , '', '', true );
    wp_register_script( 'slider', plugin_dir_url( __FILE__ ) . 'assets/script.js' , '', '', true );
}
add_action( 'wp_enqueue_scripts', 'wcd_slider_shortcode_enqueue' );