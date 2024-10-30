<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/***********************************************************
 * 
 * Jag vc templates
 * 
 ***********************************************************/

add_action('jag_wp_get_theme_himg_style', 'jag_wp_func_get_theme_himg_style',10,2);

function jag_wp_func_get_theme_himg_style($general_options, $random_id) {
    do_action('jag_wp_himg_template', $general_options, $random_id);   
}

/***********************************************************
 * 
 * Jag vc themes 
 * 
 ***********************************************************/

add_action('jag_wp_himg_template','jag_wp_himg_get_theme',10,2);

function jag_wp_himg_get_theme($general_options, $random_id){
	
	wp_enqueue_style('jag-wp-himg-base-theme', plugins_url('../../assets/css/base-theme.css', __FILE__));
	$custom_css = "";
	$jag_himg_height 			= $general_options['jag_himg_height'];
	$jag_himg_style 			= $general_options['jag_himg_style'];
	$jag_himg_fimage 			= $general_options['jag_himg_fimage'];
	$jag_himg_fcolor			= $general_options['jag_himg_fcolor'];
	$jag_himg_title 			= $general_options['jag_himg_title'];
	$jag_himg_subtitle 			= $general_options['jag_himg_subtitle'];
	$jag_himg_titlecolor 		= $general_options['jag_himg_titlecolor'];
	$jag_himg_stitlecolor 		= $general_options['jag_himg_stitlecolor'];
	$jag_himg_titlesize 		= $general_options['jag_himg_titlesize'];
	$jag_himg_stitlesize 		= $general_options['jag_himg_stitlesize'];
	$jag_himg_showbutton 		= $general_options['jag_himg_showbutton'];
	$jag_himg_buttontext 		= $general_options['jag_himg_buttontext'];
	$jag_himg_buttonurl 		= $general_options['jag_himg_buttonurl'];
	$jag_himg_btnsize			= $general_options['jag_himg_btnsize'];
	$jag_himg_btntextecolor		= $general_options['jag_himg_btntextecolor'];
	$jag_himg_btntype			= $general_options['jag_himg_btntype'];
	$jag_himg_btnbg				= $general_options['jag_himg_btnbg'];
	$jag_himg_target			= $general_options['jag_himg_target'];
	$jag_himg_defaulthover		= $general_options['jag_himg_defaulthover'];
	$jag_himg_align				= $general_options['jag_himg_align'];
	$jag_himg_valign			= $general_options['jag_himg_valign'];
	$jag_himg_mdefaulthover		= $general_options['jag_himg_mdefaulthover'];
	$jag_himg_mtitlesize 		= $general_options['jag_himg_mtitlesize'];
	$jag_himg_mstitlesize 		= $general_options['jag_himg_mstitlesize'];
	$jag_himg_mheight 			= $general_options['jag_himg_mheight'];
	$jag_himg_bordercolor 		= $general_options['jag_himg_bordercolor'];
	
	
	//Mobile CSS
	if ($jag_himg_mtitlesize == '') :
		$jag_himg_mtitlesize = $jag_himg_titlesize;
	endif;	
	if ($jag_himg_mstitlesize == '') :
		$jag_himg_mstitlesize = $jag_himg_stitlesize;
	endif;	
	if ($jag_himg_mheight == '') :
		$jag_himg_mheight = $jag_himg_height;
	endif;	
	
	//Custom CSS
	$titlelh = $jag_himg_titlesize + 10;
	$subtitlelh = $jag_himg_stitlesize + 10;
	$mtitlelh = $jag_himg_mtitlesize + 10;
	$msubtitlelh = $jag_himg_mstitlesize + 10;
	
	$custom_css .= "
				.jag-himg-wrapper.{$random_id} .jag-hoverimage-card{
					height: {$jag_himg_height}px;
				}
				.jag-himg-wrapper.{$random_id} .jag-hoverimage-card{
                    background-image: url('{$jag_himg_fimage}');
                }
				.jag-himg-wrapper.{$random_id} .jag-hoverimage-overlay{
                    background-color: {$jag_himg_fcolor};
                }
				.jag-himg-wrapper.{$random_id} .jag-hoverimage-title{
					color: {$jag_himg_titlecolor};
					font-size: {$jag_himg_titlesize}px;
					line-height: {$titlelh}px;
				}
				.jag-himg-wrapper.{$random_id} .jag-hoverimage-short-desc{
					color: {$jag_himg_stitlecolor};
					font-size: {$jag_himg_stitlesize}px;
					line-height: {$subtitlelh}px;
				}
				.jag-himg-wrapper.{$random_id} .jag-himg-readmore{
					color: {$jag_himg_btntextecolor};
				}
				.jag-himg-wrapper.{$random_id} .jag-himg-readmore.jag-btn-fill{
					background-color: {$jag_himg_btnbg};
				}
				.jag-himg-wrapper.{$random_id} .jag-himg-readmore.jag-btn-fill:hover{
					background-color: {$jag_himg_btntextecolor};
					color: {$jag_himg_btnbg};
				}
				.jag-himg-wrapper.{$random_id} .jag-himg-readmore.jag-btn-outline{
					border-color: {$jag_himg_btnbg};
				}
				.jag-himg-wrapper.{$random_id} .jag-himg-readmore.jag-btn-outline:hover{
					border-color: {$jag_himg_btntextecolor};
					color: {$jag_himg_btnbg};
				}
				.jag-himg-wrapper.{$random_id} .jag-hoverimage-left,
				.jag-himg-wrapper.{$random_id} .jag-hoverimage-top,
				.jag-himg-wrapper.{$random_id} .jag-hoverimage-right,
				.jag-himg-wrapper.{$random_id} .jag-hoverimage-bottom{
					background-color: {$jag_himg_bordercolor};
				}
				@media(max-width:767px){
					.jag-himg-wrapper.{$random_id} .jag-hoverimage-card{
						height: {$jag_himg_mheight}px;
					}
					.jag-himg-wrapper.{$random_id} .jag-hoverimage-title{
						font-size: {$jag_himg_mtitlesize}px;
						line-height: {$mtitlelh}px;
					}
					.jag-himg-wrapper.{$random_id} .jag-hoverimage-short-desc{
						font-size: {$jag_himg_mstitlesize}px;
						line-height: {$msubtitlelh}px;
					}
				}
				";
		
	wp_add_inline_style( 'jag-wp-himg-base-theme', $custom_css, 0);
	
	$jag_hover = '';
	$jag_mhover = '';
	if ($jag_himg_defaulthover == '1') :
		$jag_hover = ' jag-himg-hover';
	endif;
	if ($jag_himg_mdefaulthover == '1') :
		$jag_mhover = ' jag-himg-mhover';
	endif;	

	
	?>
	
	<div class="jag-hoverimage-card<?php echo $jag_hover.' '.$jag_himg_style.''.$jag_mhover; ?>" onclick="">
			<div class="jag-hoverimage-overlay"></div>
			<?php if ($jag_himg_style == 'jag-himg-s2' || $jag_himg_style == 'jag-himg-s3') : ?>
				<div class="jag-hoverimage-left jag-transition-delay3"></div>
				<div class="jag-hoverimage-right jag-transition-delay3"></div>
				<div class="jag-hoverimage-top jag-transition-delay3"></div>
				<div class="jag-hoverimage-bottom jag-transition-delay3"></div>
			<?php endif; ?>
			<div class="jag-hoverimage-content <?php echo $jag_himg_align.' '.$jag_himg_valign; ?>">
				<?php 
				//Title
				if ($jag_himg_title) : ?>
					<div class="clearfix"></div>
					<div class="jag-hoverimage-title">
						<?php echo $jag_himg_title; ?>
					</div>
				<?php endif; 
				
				//Subtitle
				if ($jag_himg_subtitle) : ?>
					<div class="clearfix"></div>
					<div class="jag-hoverimage-short-desc">
						<?php echo $jag_himg_subtitle; ?>
					</div>
				<?php endif;
				if ($jag_himg_showbutton == '1') :
				?>
					<div class="clearfix"></div>
					<div class="jag-himg-readmore-wrapper">
						<a class="jag-himg-readmore <?php echo $jag_himg_btnsize.' '.$jag_himg_btntype; ?>" title="<?php echo $jag_himg_buttonurl['title']; ?>" target="<?php echo $jag_himg_buttonurl['target']; ?>" href="<?php echo esc_url($jag_himg_buttonurl['url']); ?>">
							<?php echo $jag_himg_buttontext; ?>
						</a> 
					</div>
				<?php endif; ?>
			</div>
	</div>
	<?php
}