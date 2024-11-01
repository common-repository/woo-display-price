<?php
/*
 Plugin Name: Woo Display Price
 Plugin URI: http://en.fasy.ir/woo-display-price-plugin/
 Description: A sample plugin for display wooCommerce product price by product ID & shortCode.
 Version: 1.0
 Author: MojtabaShahi
 Author URI: http://fasy.ir
 License: GPLv2 or later
 */


function msh_woo_price_shortcode_callback( $atts ) {
    $atts = shortcode_atts( array(
        'id' => null,
    ), $atts, 'bartag' );

    $html = '';

    if( intval( $atts['id'] ) > 0 && function_exists( 'wc_get_product' ) ){
         $product = wc_get_product( $atts['id'] );
         $html = $product->get_price_html();
    }
    return $html;
}
add_shortcode( 'woo_price', 'msh_woo_price_shortcode_callback' );
