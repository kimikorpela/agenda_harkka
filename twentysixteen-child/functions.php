<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'genericons' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION



// Shortcode artikkelinostoille

function nosto_shortcode($atts) {

	// Avataan output buffer
	ob_start();

	// Asetetaan annetut attribuutit muuttujaan, jotta niitä voidaan käyttää WP_Queryssä
	set_query_var('attributes', $atts);
	
	// Haetaan postaukset template
	get_template_part('template-parts/postaukset');

	// Palautetaan puskuriin kerätty data
	return ob_get_clean();


}
add_shortcode( 'nosto', 'nosto_shortcode' );
