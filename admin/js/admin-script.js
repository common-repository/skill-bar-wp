jQuery(function (jQuery) {

	/** 
	 * 
	 * Skill remove option
	 * 
	*/
	var accordion =
	{
		accordion_ul: '',
		init: function () {
			this.accordion_ul = jQuery('#wpskill_bar');

			this.accordion_ul.on('click', '.remove-button', function () {
				if (confirm('Are you sure you want to delete this?')) {
					jQuery(this).parent().parent().slideUp(600, function () {
						jQuery(this).remove('.single_filed_wrap');
					});
				}
				return false;
			});
			jQuery('#delete_all').on('click', function () {
				if (confirm('Are you sure you want to delete all the Faq?')) {
					jQuery("#wpskill_bar").slideUp(600, function () {
						jQuery("#wpskill_bar").remove();
					});
					jQuery('html, body').animate({ scrollTop: 0 }, 'fast');

				}
				return false;
			});

		}
	};
	accordion.init();

	/** 
	 * 
	 * Skill color settings
	 * 
	*/
	jQuery(document).ready(function ($) {
		$('.color_field').each(function () {
			$(this).wpColorPicker();
		});
	})


});