<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add Shortcode
function wcd_slider_shortcode( $atts ) {
    $options = GeneratePress_Hero::get_options();

    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);

    $slider = '';


    $wcd_gp_settings = wp_parse_args(
        get_option( 'generate_settings', array() ),
        generate_get_defaults()
    );
    $grid = $wcd_gp_settings['container_width'] . 'px';

    $wcd_gp_nav_settings = wp_parse_args(
        get_option( 'generate_menu_plus_settings', array() ),
        generate_menu_plus_get_defaults()
    );
    $breakpoint = $wcd_gp_nav_settings['mobile_menu_breakpoint'] . 'px';

    /// Desktop Padding
    $padding_top = $options['padding_top'];
    $padding_top_unit = $options['padding_top_unit'] ? $options['padding_top_unit'] : 'px';
    $padding_right = $options['padding_right'];
    $padding_right_unit = $options['padding_right_unit'] ? $options['padding_right_unit'] : 'px';
    $padding_bottom = $options['padding_bottom'];
    $padding_bottom_unit = $options['padding_bottom_unit'] ? $options['padding_bottom_unit'] : 'px';
    $padding_left = $options['padding_left'];
    $padding_left_unit = $options['padding_left_unit'] ? $options['padding_left_unit'] : 'px';

    /// Mobile Padding
    $padding_top_mobile = $options['padding_top_mobile'];
    $padding_top_unit_mobile = $options['padding_top_unit_mobile'] ? $options['padding_top_unit_mobile'] : 'px';
    $padding_right_mobile = $options['padding_right_mobile'];
    $padding_right_unit_mobile = $options['padding_right_unit_mobile'] ? $options['padding_right_unit_mobile'] : 'px';
    $padding_bottom_mobile = $options['padding_bottom_mobile'];
    $padding_bottom_unit_mobile = $options['padding_bottom_unit_mobile'] ? $options['padding_bottom_unit_mobile'] : 'px';
    $padding_left_mobile = $options['padding_left_mobile'];
    $padding_left_unit_mobile = $options['padding_left_unit_mobile'] ? $options['padding_left_unit_mobile'] : 'px';

    // Background Position
    $background_position = $options['background_position'];

    // Overlay
    $background_overlay = $options['background_overlay'];
    $background_color = $options['background_color'];

    // Fullscreen
    $full_screen = $options['full_screen'];
    if ( $full_screen == 'true' ) {
        $height = 'min-height: 100vh';
        $heightClass = 'full';
    } else {
        $height = '';
        $heightClass = 'not-full';
    }

    // Alignment
    $vertical_alignment = $options['vertical_alignment'];
    $horizontal_alignment = $options['horizontal_alignment'];

    // Container
    $container_width = $options['inner_container'];
    if( $container_width == 'full-width' ) {
        $inner_class = 'grid-parent';
    } else {
        $inner_class = 'grid-container';
    }

    $slider .= '<style>';
        $slider .= '#wcd-' . $token . ' .slide {
            padding-top: ' . $padding_top . $padding_top_unit . ';
            padding-right: ' . $padding_right . $padding_right_unit . ';
            padding-bottom: ' . $padding_bottom . $padding_bottom_unit . ';
            padding-left: ' . $padding_left . $padding_left_unit . ';
            background-size: cover;
            background-position: ' . $background_position . ';
            background-repeat: no-repeat;
            ' . $height . ';
        }';
        $slider .= '@media (max-width: ' . $breakpoint . ') {
            #wcd-' . $token . ' .slide-wrapper {
                padding-top: ' . $padding_top_mobile . $padding_top_unit_mobile . ';
                padding-right: ' . $padding_right_mobile . $padding_right_unit_mobile . ';
                padding-bottom: ' . $padding_bottom_mobile . $padding_bottom_unit_mobile . ';
                padding-left: ' . $padding_left_mobile . $padding_left_unit_mobile . ';
            }
        }';
        if( $background_overlay == 'true' ) {
            $slider .= '#wcd-' . $token . ' .slide:after {
                content: "";
                height: 100%;
                width: 100%;
                position: absolute;
                left: 0;
                top: 0;
                background: ' . $background_color . ';
            }';
            $slider .= '#wcd-' . $token . ' .grid-container {
                z-index: 1000;
            }';
            $slider .= '#wcd-' . $token . ' .grid-parent {
                z-index: 1000;
                position: relative;
            }';
        }
        if( $full_screen == 'true' && $vertical_alignment == 'center' ) {
            $slider .= '#wcd-' . $token . ' .slide {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center
            }';
        } elseif ($full_screen == 'true' && $vertical_alignment == 'bottom' ) { 
            $slider .= '#wcd-' . $token . ' .slide {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-pack: end;
                -ms-flex-pack: end;
                justify-content: flex-end;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center
            }';
        }
    $slider .= '</style>';

    // Attributes
	$atts = shortcode_atts(
		array(
			'nav' => 'dots',
			'fade' => 'true',
			'infinite' => 'true',
            'speed' => '300',
		),
		$atts
    );

    $nav = $atts['nav'] ? $atts['nav']: 'dots';
    $fade = $atts['fade'] ? $atts['fade']: 'fade';
    $speed = $atts['speed'] ? $atts['speed'] : '300';
    $infinite = $atts['infinite'] ? $atts['infinite'] : 'true';

    $args = array(
        'post_type'              => array( 'slider' ),
        'posts_per_page'         => '-1',
    );
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        $slider .= '<div id="wcd-' . $token . '" class="wcd-hero-slider ' . $nav . ' ' . $vertical . '" data-nav="' . $nav . '" data-fade="' . $fade . '" data-infinite="' . $infinite . '" data-speed="' . $speed . '">';
        while ( $query->have_posts() ) {
            $query->the_post();
            
            $background = get_the_post_thumbnail_url( get_the_ID(), 'full');
            $slider .= '<div class="slide ' . $heightClass . '" style="background-image: url(' . $background . ');">';
                $slider .= '<div class="slide-wrapper ' . $inner_class . '">';
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