/************************************************
* JAG FLIP BOX JS
*************************************************/
jQuery(function () {
	jQuery('.jag-flip-back').show();
    jQuery(".xhover").flip({
		axis: "x", // y or x
		trigger: "hover", // click or hover
		speed: '1000',
		front: '.jag-flip-front',
		back: '.jag-flip-back'
	});
	jQuery(".yhover").flip({
		axis: "y", // y or x
		trigger: "hover", // click or hover
		speed: '1000',
		front: '.jag-flip-front',
		back: '.jag-flip-back'
	});
	jQuery(".xclick").flip({
		axis: "x", // y or x
		trigger: "click", // click or hover
		speed: '1000',
		front: '.jag-flip-front',
		back: '.jag-flip-back'
	});
	jQuery(".yclick").flip({
		axis: "y", // y or x
		trigger: "click", // click or hover
		speed: '1000',
		front: '.jag-flip-front',
		back: '.jag-flip-back'
	});
});
