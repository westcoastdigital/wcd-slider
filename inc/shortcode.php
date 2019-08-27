<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add Shortcode
function wcd_slider_shortcode( $atts ) {

    // Attributes
	$atts = shortcode_atts(
		array(
			'nav' => 'dots',
			'fade' => 'true',
			'infinite' => 'true',
            'speed' => '300',
            'vertical' => 'center'
		),
		$atts
    );

    $nav = $atts['nav'] ? $atts['nav']: 'dots';
    $fade = $atts['fade'] ? $atts['fade']: 'fade';
    $speed = $atts['speed'] ? $atts['speed'] : '300';
    $infinite = $atts['infinite'] ? $atts['infinite'] : 'true';
    $vertical = $atts['vertical'] ? $atts['vertical'] : 'center';
    $wcd_gp_settings = wp_parse_args(
        get_option( 'generate_settings', array() ),
        generate_get_defaults()
    );
    $grid = $wcd_gp_settings['container_width'] . 'px';
    $slider = '';

    $args = array(
        'post_type'              => array( 'slider' ),
        'posts_per_page'         => '-1',
    );
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        $slider .= '<div class="wcd-hero-slider ' . $nav . ' ' . $vertical . '" data-nav="' . $nav . '" data-fade="' . $fade . '" data-infinite="' . $infinite . '" data-speed="' . $speed . '">';
        while ( $query->have_posts() ) {
            $query->the_post();
            
            $background = get_the_post_thumbnail_url( get_the_ID(), 'full');
            $slider .= '<div class="slide" style="background-image: url(' . $background . '); background-size: cover; background-position: center; background-repeat: no-repeat;">';
                $slider .= '<div class="grid-container" style="max-width: ' . $grid . ';">';
                $slider .= '<h2 class="slide-title">';
                $slider .= get_the_title();
                $slider .= '</h2>';
                $slider .= get_the_content();
                $slider .= '</div>';
            $slider .= '</div>';


        }
        $slider .= '</div>';
    } else {
        // no posts found
    }

    wp_reset_postdata();

    wp_enqueue_style( 'slick' );
    if($nav != 'numbers' ) {
        wp_enqueue_style( 'slick-theme' );
    }
    wp_enqueue_style( 'hero-slider' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'slick' );
    wp_enqueue_script( 'slider' );

    return $slider;
}
add_shortcode( 'slider', 'wcd_slider_shortcode' );