<?php
/*
Plugin Name: Inspirelite Addons For Elementor
Plugin URI: https://wordpress.org/plugins/inspirelite-addons-for-elementor/
Description: Buttons variation for elementor page builder widgets.
Version: 0.0.1
Author:Ease Template
Author URI: https://easetemplate.com/
Text Domain: inspirelite-addons-for-elementor
Domain Path: /languages
*/

/* Do not access this file directly */
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'ELEMENTORHUB' ,  'Inspirelite' );

define( 'ELEMENTORHUB_PLUGIN_URL', plugin_dir_url( __FILE__ )  );

define( 'ELEMENTORHUB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

register_activation_hook( __FILE__, array( 'Elementorhub_Loader', 'plugin_activation' ) );

register_deactivation_hook( __FILE__, array( 'Elementorhub_Loader', 'plugin_deactivation' ) );

/**
 * Elementorhub - Plugin
 *
 * @package base-elementor-addon
 * @since 1.0.0
 */

if ( ! class_exists( 'Elementorhub_Loader' ) ) {

   /**
    * Customizer Initialization
    *
    * @since 1.0.0
    */
   
    final class Elementorhub_Loader {

        /**
         * Member Variable
         *
         * @var instance
         */
        private static $instance;

        /**
         *  Initiator
         */
        public static function get_instance() {
            
          if ( ! isset( self::$instance ) ) {
            self::$instance = new self;
          }
          return self::$instance;
        }

        /**
         *  Constructor
         */
        public function __construct() {

            add_action( 'wp_enqueue_scripts', array( $this, 'base_addong_elementor_scripts' ), absint( '999' ) );

            add_action( 'plugins_loaded', array( $this, 'load_required_files' ) );
        }

        public static function base_addong_elementor_scripts(){

        	wp_enqueue_style( 'base-stylesheet', esc_url( ELEMENTORHUB_PLUGIN_URL . '/assets/css/elementorhub.css' ) );
        }

        /**
         *  Required Files
         */
        public static function load_required_files(){

            /**
             *  Elementor Plugin is activated
             */
            if( defined( 'ELEMENTOR_PATH' ) ){

			    require_once plugin_dir_path( __FILE__ ) . '/elementor/config.php';

			    require_once plugin_dir_path( __FILE__ ) . '/elementor/index.php';
            }
        }

        public static function plugin_activation(){

        }

        public static function plugin_deactivation(){
        	
        }
    }
}

/**
*  Kicking this off by calling 'get_instance()' method
*/
Elementorhub_Loader::get_instance();
