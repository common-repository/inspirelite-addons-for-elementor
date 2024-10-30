<?php

/**
 *  Base Elementor Features
 */

namespace Elementor;

function base_elementor_addon_init(){

    Plugin::instance()->elements_manager->add_category(

        ELEMENTORHUB,
        [
            'title'  	=>  ELEMENTORHUB,
            'icon' 		=> 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\base_elementor_addon_init');

