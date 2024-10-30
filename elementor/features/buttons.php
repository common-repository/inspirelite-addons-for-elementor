<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

Plugin::instance()->widgets_manager->register_widget_type( new ElementorHub_Button() );

class ElementorHub_Button extends Widget_Base {

	public function get_name() {
		return esc_html( ELEMENTORHUB.'Button' );
	}

	public function get_title() {
		return __( 'Buttons', 'inspirelite-addons-for-elementor' );
	}

	public function get_icon() {
		return esc_html( 'eicon-button' );
	}

	public function get_categories() {
		return [ ELEMENTORHUB ];
	}

	public function get_keywords() {
		return [ ELEMENTORHUB, 'buttons' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_editor',
			[
				'label' => __( 'Buttons', 'inspirelite-addons-for-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Button Alignment', 'inspirelite-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'inspirelite-addons-for-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'inspirelite-addons-for-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'inspirelite-addons-for-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'elementor-align-',
				'default' => 'center',
			]
		);		

		$this->add_control(
			'button_layout',
			[
				'label' => __( 'Select Buttons :', 'inspirelite-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => self:: get_button_layout( $option_array = '0', $args = 'select_option' ),
				'default' => absint( '0' ),
			]
		);

		$this->add_control(
			'button_style',
			[
				'label' => __( 'Select Style :', 'inspirelite-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => self:: get_button_layout( $option_array = '1', $args = 'select_option' ),
				'default' => absint( '0' ),
			]
		);

		$this->add_control(
			'button_size',
			[
				'label' => __( 'Select Size :', 'inspirelite-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => self:: get_button_layout( $option_array = '2', $args = 'select_option' ),
				'default' => absint( '0' ),
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text :', 'inspirelite-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'inspirelite-addons-for-elementor' ),
				'placeholder' => __( 'Button Text..', 'inspirelite-addons-for-elementor' ),
			]
		);
		$this->add_control(
            'btn_link',
            [
                'label' => __( 'Button Link :', 'inspirelite-addons-for-elementor' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( '#', 'inspirelite-addons-for-elementor' ),
                'separator' => 'before',
                'default' => [
					'url' =>  home_url( '/' ),
				],
            ]
        );


		$this->end_controls_section();
	}

	public static function get_btn_option( $args ){

		if( $args == '0' || $args == 'layout' ){

			return array(

				'0' => array( 'lable' => esc_html__('Brand', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('brand', 'inspirelite-addons-for-elementor' ) ),
				'1' => array( 'lable' => esc_html__('Primary', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('primary', 'inspirelite-addons-for-elementor' ) ),
				'2' => array( 'lable' => esc_html__('Secondary', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('secondary', 'inspirelite-addons-for-elementor' ) ),
				'3' => array( 'lable' => esc_html__('Success', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('success', 'inspirelite-addons-for-elementor' ) ),
				'4' => array( 'lable' => esc_html__('Danger', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('danger', 'inspirelite-addons-for-elementor' ) ),
				'5' => array( 'lable' => esc_html__('Warning', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('warning', 'inspirelite-addons-for-elementor' ) ),
				'6' => array( 'lable' => esc_html__('Info', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('info', 'inspirelite-addons-for-elementor' ) ),
				'7' => array( 'lable' => esc_html__('Light', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('light', 'inspirelite-addons-for-elementor' ) ),
				'8' => array( 'lable' => esc_html__('Dark', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('dark', 'inspirelite-addons-for-elementor' ) ),
				'9' => array( 'lable' => esc_html__('Link', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('link', 'inspirelite-addons-for-elementor' ) ),
			);
		}

		if( $args == '1' || $args == 'style' ){

			return array(

				'0' => array( 'lable' => esc_html__( 'Square', 'inspirelite-addons-for-elementor' ), 'class' => esc_html( 'btn-' ) ),
				'1' => array( 'lable' => esc_html__( 'Square Outline', 'inspirelite-addons-for-elementor' ), 'class' => esc_html( 'btn-outline-' ) ),
				'2' => array( 'lable' => esc_html__( 'Rounded', 'inspirelite-addons-for-elementor' ), 'class' => esc_html( 'btn-rounded btn-' ) ),
				'3' => array( 'lable' => esc_html__( 'Rounded Outline', 'inspirelite-addons-for-elementor' ), 'class' => esc_html( 'btn-rounded btn-outline-' ) ),
			);
		}

		if( $args == '2' || $args == 'size' ){

			return array(

				'0' => array( 'lable' => esc_html__('Default', 'inspirelite-addons-for-elementor' ), 'class' => '' ),
				'1' => array( 'lable' => esc_html__('Button Large', 'inspirelite-addons-for-elementor' ), 'class' => esc_html( 'btn-lg' ) ),
				'2' => array( 'lable' => esc_html__('Button Medium', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('btn-sm' ) ),
				'3' => array( 'lable' => esc_html__('Button Small', 'inspirelite-addons-for-elementor' ), 'class' => esc_html('btn-xs' ) ),
			);
		}
	}

	public function get_button_layout( $_options, $args, $selected_option = '' ){

			$_return  = array();

			foreach( self:: get_btn_option( $_options ) as $key => $value ){

				if( $args == 'select_option' ){

					$_return[ $key ] = $value[ 'lable' ];
				}

				if( $args == 'render' ){

					if( $selected_option == $key ){

						return $value[ 'class' ];
					}
				}
			}

			return $_return;
	}

	protected function render() {

		$settings = $this->get_settings();

		printf('<a %3$s class="btn %1$s %4$s">%2$s</a>',

			// 1
			self:: get_button_layout( $option_array = '1', 'render', $settings[ 'button_style' ] ).
			self:: get_button_layout( $option_array = '0', 'render', $settings[ 'button_layout' ] ),

			// 2
			$settings['btn_text'],

			// 3
			elementor_link_arguments( $settings['btn_link'] ),

			// 4
			self:: get_button_layout( $option_array = '2', 'render', $settings[ 'button_size' ] )
		);
	}
}