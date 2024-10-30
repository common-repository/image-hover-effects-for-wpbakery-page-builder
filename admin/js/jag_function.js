/*
 * jQuery for admin
 */
jQuery(document).ready(function () {
    var himg_template_path = js_wp_himg_custom_object.himg_template_path;
	//Change the theme demo image below dropdown on change of theme style dropdown.
    jQuery(document.body).on('change', '.wpb-select.jag_himg_style', function () {
	    jQuery('.theme_demo_image').attr('src', himg_template_path + jQuery(this).val() + '.png');
    });
	
});
