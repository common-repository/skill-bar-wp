(function ($) {
    'use strict'

    jQuery(document).ready(function ($) {

        $('.skill-percentage').on('inview', function (event, isInView) {
            if (isInView) {
                $(this).css('width', function () {
                    return ($(this).attr('aria-valuenow') + '%');
                });

            }

        });

    });

})(jQuery);