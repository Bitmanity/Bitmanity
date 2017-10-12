<?php
/**
 * Filter functions for Typography Section of Theme Options
 */

if( ! function_exists( 'redux_has_google_fonts' ) ) {
	function redux_has_google_fonts( $load_default ) {
		global $techmarket_options;

		if( isset( $techmarket_options['use_predefined_font'] ) ) {
			$load_default = $techmarket_options['use_predefined_font'];
		}

		return $load_default;
	}
}

if( ! function_exists( 'redux_switch_to_roboto' ) ) {
	function redux_switch_to_roboto( $enable ) {
		global $techmarket_options;

		if( isset( $techmarket_options['switch_to_roboto'] ) ) {
			$enable = $techmarket_options['switch_to_roboto'];
		}

		return $enable;
	}
}

if( ! function_exists( 'redux_apply_custom_fonts' ) ) {
	function redux_apply_custom_fonts() {
		global $techmarket_options;

		if( isset( $techmarket_options['use_predefined_font'] ) && !$techmarket_options['use_predefined_font'] ) {
			$content_font			= $techmarket_options['techmarket_content_font'];
			$content_font_family	= $content_font['font-family'];
			$custom_font_css		= '
				body,
				button,
				input,
				textarea,
				select {
					font-family: ' . $content_font_family . ';
				}
			';
			$custom_font_css_handle = techmarket_is_woocommerce_activated() ? 'techmarket-woocommerce-style' : 'techmarket-style';
			wp_add_inline_style( $custom_font_css_handle, $custom_font_css );
		}
	}
}