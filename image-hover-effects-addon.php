<?php
/**
 * Plugin Name:       Image Hover Effects for WPBakery Page Builder
 * Plugin URI:        
 * Description:       Creative hover image effects addon for WPBakery Page Builder (Visual Composer)
 * Version:           1.0
 * Author:            jkreative
 * Author URI:        https://profiles.wordpress.org/jkreative/
 * Text Domain:       jag_hoverimg
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/***********************************************************
 * 
 * Check Wpbakery page builder is installed with correct version
 * on plugin activation
 * 
 ***********************************************************/

add_action('admin_init','jag_wp_vc_himg_addon');

function jag_wp_vc_himg_addon(){
    $required_vc = '4.4';
    if (defined('WPB_VC_VERSION')) {
        if (version_compare($required_vc, WPB_VC_VERSION, '>')) {
            add_action('admin_notices', 'jag_wp_hoverimg_alert_version_vc');
        }
    } else {
        add_action('admin_notices', 'admin_wp_notice_flipbox_activation');
    }
}

function jag_wp_hoverimg_alert_version_vc(){
    echo '<div class="error"><p>' . __('The <strong>Image hover effects </strong> plugin requires <strong>WPBakery Page Builder for WordPress (formerly Visual Composer)</strong> version 4.4 or greater.' , 'jag_hoverimg' ) . '</p></div>';   
}
function admin_wp_notice_flipbox_activation(){
    echo '<div class="error"><p>' . __('The <strong>Image hover effects</strong> plugin requires <strong>WPBakery Page Builder for WordPress (formerly Visual Composer)</strong> installed and activated.' , 'jag_hoverimg' ) . '</p></div>';
}

/***********************************************************
 * 
 * Enque script for backend
 * 
 ***********************************************************/

function jag_wp_hoverimg_addon_admin_script() {
    wp_enqueue_script('jag-wp-himg-vc-admin-js', plugins_url('/admin/js/jag_function.js', __FILE__), false, '1', false);

    //variable to use in the js file
    $jsvariables = array(
        'himg_template_path' => plugins_url('admin/images/hoverimage/', __FILE__)
    );
    wp_localize_script('jag-wp-himg-vc-admin-js', 'js_wp_himg_custom_object', $jsvariables);
}

add_action('admin_enqueue_scripts', 'jag_wp_hoverimg_addon_admin_script');


/***********************************************************
 * 
 * Include Files
 * 
 ***********************************************************/
 
require_once('includes/hoverimage/jag-hoverimage-shortcode.php');
require_once('includes/hoverimage/jag-hoverimage-template.php');
require_once('includes/hoverimage/jag-hoverimage-vc-block.php');
