<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/***********************************************************
 * 
 * Generate Random String
 * 
 ***********************************************************/

function jag_wp_hover_image_generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/***********************************************************
 * 
 * Register Counter Shortcode 
 * 
 ***********************************************************/

function jag_wp_vc_hover_image_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'jag_himg_style'			=> '',
		'jag_himg_height'			=> '250',
		'jag_himg_fimage'			=> '',
		'jag_himg_fcolor'			=> 'rgba(0,0,0,0.7)',
		'jag_himg_title'			=> '',
		'jag_himg_subtitle'			=> '',
		'jag_himg_titlecolor'		=> '#ffffff',
		'jag_himg_titlesize'		=> '20',
		'jag_himg_stitlecolor'		=> '#ffffff',
		'jag_himg_stitlesize'		=> '16',
		'jag_himg_extra_class'		=> '',
		'jag_himg_showbutton'		=> '',
		'jag_himg_buttontext'		=> '',
		'jag_himg_buttonurl'		=> '',
		'jag_himg_btnsize'			=> 'jag-btn-large',
		'jag_himg_btntextecolor'	=> '#000000',
		'jag_himg_btntype'			=> 'jag-btn-fill',
		'jag_himg_btnbg'			=> '#ffffff',
		'jag_himg_target'			=> '',
		'jag_himg_defaulthover'		=> '',
		'jag_himg_align'			=> 'jag-align-center',
		'jag_himg_valign'			=> 'jag-align-middle',
		'jag_himg_mheight'			=> '',
		'jag_himg_mdefaulthover'	=> '',
		'jag_himg_mtitlesize'		=> '',
		'jag_himg_mstitlesize'		=> '',
		'jag_himg_bordercolor'  	=> '#ffffff',
    ), $atts ) );
	
	$f_imagesrc = wp_get_attachment_image_src($jag_himg_fimage, 'full');
	$output = '';
	ob_start();
		
		// Random number for theme colors
        $random_id = jag_wp_hover_image_generateRandomString();
		
		
        // Prepare general options
        $general_options = array(
            'jag_himg_style'			=> $jag_himg_style,
			'jag_himg_height'			=> $jag_himg_height,
			'jag_himg_fimage'			=> $f_imagesrc[0],
			'jag_himg_fcolor'			=> $jag_himg_fcolor,
			'jag_himg_title'       		=> $jag_himg_title,
            'jag_himg_subtitle'      	=> $jag_himg_subtitle,
			'jag_himg_titlecolor'       => $jag_himg_titlecolor,
			'jag_himg_stitlecolor'      => $jag_himg_stitlecolor,
			'jag_himg_titlesize'       	=> $jag_himg_titlesize,
			'jag_himg_stitlesize'       => $jag_himg_stitlesize,
            'jag_himg_showbutton'		=> $jag_himg_showbutton,
			'jag_himg_buttontext'		=> $jag_himg_buttontext,
			'jag_himg_buttonurl'		=> vc_build_link( $jag_himg_buttonurl ),
			'jag_himg_btnsize'			=> $jag_himg_btnsize,
			'jag_himg_btntextecolor'	=> $jag_himg_btntextecolor,
			'jag_himg_btntype'			=> $jag_himg_btntype,
			'jag_himg_btnbg'			=> $jag_himg_btnbg,
			'jag_himg_target'			=> $jag_himg_target,
			'jag_himg_extra_class'		=> $jag_himg_extra_class,
			'jag_himg_defaulthover'		=> $jag_himg_defaulthover,
			'jag_himg_align'			=> $jag_himg_align,
			'jag_himg_valign'			=> $jag_himg_valign,
			'jag_himg_mheight'			=> $jag_himg_mheight,
			'jag_himg_mdefaulthover'	=> $jag_himg_mdefaulthover,
			'jag_himg_mtitlesize'       => $jag_himg_mtitlesize,
			'jag_himg_mstitlesize'      => $jag_himg_mstitlesize,
			'jag_himg_bordercolor'		=> $jag_himg_bordercolor,
        );
		
		echo '<div class="jag-himg-wrapper ' .$random_id. ' '. $jag_himg_extra_class.'">';
            do_action('jag_wp_get_theme_himg_style', $general_options, $random_id);
        echo '</div>';

    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

add_shortcode( 'jag_wp_vc_hover_image', 'jag_wp_vc_hover_image_shortcode' );

/***********************************************************
 * 
 * Enqueue scripts & styles
 * 
 ***********************************************************/

add_action('wp_enqueue_scripts', 'jag_wp_himg_frontend_styles');

function jag_wp_himg_frontend_styles() {
	wp_enqueue_style('jag-himg-style', plugins_url('../../assets/hover-image/css/style.css', __FILE__));
}?>
