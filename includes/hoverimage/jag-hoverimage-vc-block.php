<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/***********************************************************
 * 
 * Map shortcode [jag_wp_vc_hover_image] to VC 
 * 
 ***********************************************************/

add_action('init', 'jag_wp_hoverimg_vc_addon_function');

function jag_wp_hoverimg_vc_addon_function() {
    
    if (function_exists('vc_map')):
        
        // Map shortcode
        vc_map(array(
            'name'          => __('Image hover box', 'jag_hoverimg'),
            'base'          => 'jag_wp_vc_hover_image',
			'icon' 			=> plugins_url('../../admin/images/hoverimage/icon.png', __FILE__),
            'description'   => __("Creative image hover effects", 'jag_hoverimg'),
            'params' => array(
				array(
                    'type'          => 'attach_image',
                    'heading'       => __('Image', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_fimage',
                    'value'         => '',
                    'group'         => __('Settings', 'jag_hoverimg')
                ),
				array(
                    'type'          => 'dropdown',
                    'heading'       => __('Hover Style', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_style',
                    'value' => array(
                        __('Stlye 1 (Default)', 'jag_hoverimg')     	=> 'jag-himg-s1',
                        __('Style 2 (Border)', 'jag_hoverimg')     		=> 'jag-himg-s2',
                    ),
                    'group'         => __('Settings', 'jag_hoverimg'),
					'description' => '<img class=theme_demo_image style=max-width:200px>'
                ),
				array(
                    'type'          => 'textfield',
                    'heading'       => __('Box height', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_height',
                    'value'         => '250',
                    'group'         => __('Settings', 'jag_hoverimg'),
					'description'   => __("<strong>Note:</strong> Add Height in pixels. Default height: 250px. Add Only Integer value. (for e.g 200, 100).", 'jag_hoverimg')
                ),
				array( 
                    'type'          => 'dropdown',
                    'heading'       => __('Content Alignment', 'jag_addons'),
                    'param_name'    => 'jag_himg_align',
                    'value' => array(
                        __('Center', 'jag_addons')     	=> 'jag-align-center',
                        __('Left', 'jag_addons')     	=> 'jag-align-left',
						__('Right', 'jag_addons')   	=> 'jag-align-right'
                    ),
                    'group'         => __('Settings', 'jag_addons'),
                ),
				array(
                    'type'          => 'dropdown',
                    'heading'       => __('Vertical Content Alignment', 'jag_addons'),
                    'param_name'    => 'jag_himg_valign',
                    'value' => array(
                        __('Middle', 'jag_addons')     	=> 'jag-align-middle',
                        __('Top', 'jag_addons')     	=> 'jag-align-top',
						__('Bottom', 'jag_addons')   	=> 'jag-align-bottom'
                    ),
                    'group'         => __('Settings', 'jag_addons'),
                ),
				array(
                    'type'          => 'textfield',
                    'heading'       => __('Title', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_title',
                    'value'         => '',
                    'group'         => __('Settings', 'jag_hoverimg')
                ),
				array(
                    'type'          => 'textfield',
                    'heading'       => __('Title Font Size', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_titlesize',
                    'value'         => '20',
                    'group'         => __('Settings', 'jag_hoverimg'),
					'description'   => __("<strong>Note:</strong> Add Font size in pixels. Default Font Size: 20px. Add only Integer value. (for e.g 18, 24).", 'jag_hoverimg')
                ),
				array(
                    'type'          => 'colorpicker',
                    'heading'       => __('Title Text color', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_titlecolor',
                    'value'         => '#ffffff',
                    'group'         => __('Settings', 'jag_hoverimg')
                ),
				array(
                    'type'          => 'textarea',
                    'heading'       => __('Sub Title', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_subtitle',
                    'value'         => '',
                    'group'         => __('Settings', 'jag_hoverimg')
                ),
				array(
                    'type'          => 'textfield',
                    'heading'       => __('Subtitle Font Size', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_stitlesize',
                    'value'         => '16',
                    'group'         => __('Settings', 'jag_hoverimg'),
					'description'   => __("<strong>Note:</strong> Add Font size in pixels. Default Font Size: 16px. Add only Integer value. (for e.g 18, 24).", 'jag_hoverimg')
                ),
				array(
                    'type'          => 'colorpicker',
                    'heading'       => __('Text color', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_stitlecolor',
                    'value'         => '#ffffff',
                    'group'         => __('Settings', 'jag_hoverimg')
                ),
				array(
                    'type'          => 'checkbox',
                    'param_name'    => 'jag_himg_showbutton',
                    'value' => array(
                        __('Show Button', 'jag_hoverimg') => '1'
                    ),
                    'group'         => __('Settings', 'jag_hoverimg'),
					'description'   => __("<strong>Note: </strong>Check this option to show Button", 'jag_hoverimg')
                ),
				array(
                    'type'          => 'textfield',
                    'heading'       => __('Button Text', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_buttontext',
                    'value'         => '',
                    'group'         => __('Settings', 'jag_hoverimg')
                ),
				array(
                    'type'          => 'vc_link',
                    'heading'       => __('URL to redirect', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_buttonurl',
                    'value'         => '',
                    'group'         => __('Settings', 'jag_hoverimg'),
					'description'   => __("<strong>Note: </strong>Add full URL (for e.g http://www.website.com)", 'jag_hoverimg')
                ),
				array(
                    'type'          => 'dropdown',
                    'heading'       => __('Button Size', 'jag_addons'),
                    'param_name'    => 'jag_himg_btnsize',
                    'value' => array(
                        __('Large', 'jag_addons')     => 'jag-btn-large',
                        __('Medium', 'jag_addons')    => 'jag-btn-medium',
						__('small', 'jag_addons')     => 'jag-btn-small'
                    ),
                    'group'         => __('Settings', 'jag_addons')
                ),
				array(
                    'type'          => 'dropdown',
                    'heading'       => __('Button Type', 'jag_addons'),
                    'param_name'    => 'jag_himg_btntype',
                    'value' => array(
                        __('Fill', 'jag_addons')     => 'jag-btn-fill',
                        __('Outline', 'jag_addons')  => 'jag-btn-outline',
						__('None', 'jag_addons')     => 'jag-btn-none'
                    ),
                    'group'         => __('Settings', 'jag_addons')
                ),
				array(
                    'type'          => 'colorpicker',
                    'heading'       => __('Button Text color', 'jag_addons'),
                    'param_name'    => 'jag_himg_btntextecolor',
                    'value'         => '#000000',
                    'group'         => __('Settings', 'jag_addons')
                ),
				array(
                    'type'          => 'colorpicker',
                    'heading'       => __('Button Background Color', 'jag_addons'),
                    'param_name'    => 'jag_himg_btnbg',
                    'value'         => '#ffffff',
                    'group'         => __('Settings', 'jag_addons'),
					'description'   => __("<strong>Note: </strong> Not applicable if you select BUTTON TYPE: NONE", 'jag_addons')
                ),
				array(
                    'type'          => 'textfield',
                    'heading'       => __('Add Custom Class', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_extra_class',
                    'value'         => '',
                    'group'         => __('Settings', 'jag_hoverimg'),
                    'description'   => __("Add your custom <strong>Class</strong> if you want.", 'jag_hoverimg')
                ),
				array(
                    'type'          => 'checkbox',
                    'param_name'    => 'jag_himg_mdefaulthover',
                    'value' => array(
                        __('Show Hover Content By default', 'jag_hoverimg') => '1'
                    ),
                    'group'         => __('Mobile Settings (<768px)', 'jag_hoverimg'),
					'description'   => __("<strong>Note:</strong> Check this option to show hover content by default instead of hover", 'jag_hoverimg')
                ),
				array(
                    'type'          => 'textfield',
                    'heading'       => __('Box height', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_mheight',
                    'value'         => '',
                    'group'         => __('Mobile Settings (<768px)', 'jag_hoverimg'),
					'description'   => __("<strong>Note:</strong> Add Height in pixels. Default height: 250px. Add Only Integer value. (for e.g 200, 100).", 'jag_hoverimg')
                ),
				array(
                    'type'          => 'textfield',
                    'heading'       => __('Title Font Size', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_mtitlesize',
                    'value'         => '',
                    'group'         => __('Mobile Settings (<768px)', 'jag_hoverimg'),
					'description'   => __("<strong>Note:</strong> Add Font size in pixels. Default Font Size: 20px. Add only Integer value. (for e.g 18, 24).", 'jag_hoverimg')
                ),
				array(
                    'type'          => 'textfield',
                    'heading'       => __('Subtitle Font Size', 'jag_hoverimg'),
                    'param_name'    => 'jag_himg_mstitlesize',
                    'value'         => '',
                    'group'         => __('Mobile Settings (<768px)', 'jag_hoverimg'),
					'description'   => __("<strong>Note:</strong> Add Font size in pixels. Default Font Size: 16px. Add only Integer value. (for e.g 18, 24).", 'jag_hoverimg')
                )
            ),
            'category' => __('Content', 'jag_hoverimg'),
        ));
    endif;
}
?>