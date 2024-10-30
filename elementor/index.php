<?php

// added all base widget here
if( ! function_exists( 'base_add_new_elements' ) ){

	function base_add_new_elements(){

	   foreach ( glob( ELEMENTORHUB_PLUGIN_DIR . '/elementor/features/*.php' ) as $_base_file ) {
	   
	   		require_once $_base_file;
	   }
	}
	
	add_action('elementor/widgets/widgets_registered','base_add_new_elements');
}

// link setting
if( ! function_exists( 'elementor_link_arguments' ) ){

		function elementor_link_arguments( $link ){

			if( empty( $link ) )
				return;

			$_args = array();

			if( isset( $link[ 'url' ] ) && ! empty( $link[ 'url' ] ) ){

				$_args[] = 'href="'. $link[ 'url' ] .'"';
			}

			if( isset( $link[ 'is_external' ] ) && ! empty( $link[ 'is_external' ] ) && $link[ 'is_external' ] == 'on' ){

				$_args[] = 'target="_blank"';
			}

			if( isset( $link[ 'nofollow' ] ) && ! empty( $link[ 'nofollow' ] ) && $link[ 'nofollow' ] == 'on' ){

				$_args[] = 'rel="nofollow"';
			}

			return implode( ' ', $_args );
		}
}

