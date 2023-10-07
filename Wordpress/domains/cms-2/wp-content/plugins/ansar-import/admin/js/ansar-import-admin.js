(function ($) {
    'use strict';

    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

})(jQuery);
jQuery(document).ready(function ($) {

    // console.log(ansar_theme_object[0]);

// Product Show Method
    jQuery("#product_filter a").click(function (e) {
        e.preventDefault();
        jQuery(this).tab('show');
    });

    jQuery(".btn-preview").click(function () {
        jQuery(".preview-live-btn").addClass('uk-hidden');
        jQuery(".import-priview").removeClass('uk-hidden');
        for (var i = 0; i < ansar_theme_object.length; i++) {
            if (ansar_theme_object[i].id === jQuery(this).data('id')) {
                //console.log(ansar_theme_object[i]);
                jQuery("#theme_preview").attr('src', ansar_theme_object[i].preview_link);
                jQuery(".theme-screenshot").attr('src', ansar_theme_object[i].preview_url);
                //  alert(my_ajax_object.theme_name +'->'+ ansar_theme_object[i].theme_name);
                if (my_ajax_object.theme_name === ansar_theme_object[i].theme_name) {
                    jQuery(".import-priview").attr('data-id', jQuery(this).data('id'));
                    jQuery(".import-priview").removeClass('uk-hidden');
                    jQuery(".preview-buy").addClass('uk-hidden');
                } else {
                    jQuery(".import-priview").addClass('uk-hidden');
                    jQuery(".preview-buy").removeClass('uk-hidden');
                    jQuery(".preview-buy").attr('src', ansar_theme_object[i].pro_link);
                }

            }

        }
        if (jQuery(this).data('live') === 1) {
            jQuery(".import-priview").addClass('uk-hidden');
            jQuery(".preview-live-btn").removeClass('uk-hidden');
        }


        UIkit.modal('#AnsardemoPreview').show();

    });


    jQuery(".preview-desktop").click(function ($) {
        jQuery(".wp-full-overlay-main").removeClass('p-mobile');
        jQuery(".wp-full-overlay-main").removeClass('p-tablet');
    });
    jQuery(".preview-tablet").click(function ($) {
        jQuery(".wp-full-overlay-main").addClass('p-tablet');
        jQuery(".wp-full-overlay-main").removeClass('p-mobile');
    });
    jQuery(".preview-mobile").click(function ($) {
        jQuery(".wp-full-overlay-main").addClass('p-mobile');
        jQuery(".wp-full-overlay-main").removeClass('p-tablet');
    });

    jQuery(".collapse-sidebar").click(function ($) {


        var x = jQuery(this).attr("aria-expanded");
        if (x === "true")
        {
            jQuery(this).attr("aria-expanded", "false");
            jQuery(".theme-install-overlay").addClass('expanded').removeClass('collapsed');
        } else {
            jQuery(this).attr("aria-expanded", "true");
            jQuery(".theme-install-overlay").addClass('collapsed').removeClass('expanded');
        }





        // jQuery(this).attr("aria-expanded","false");
        //  jQuery(".theme-install-overlay").addClass('collapsed').removeClass('expanded');

    });


    jQuery(".close-full-overlay").click(function () {

        UIkit.modal('#AnsardemoPreview').hide();

    });

    jQuery(".btn-import").click(function () {
        jQuery("#theme_id").val(jQuery(this).data('id'));
        UIkit.modal('#AnsardemoPreview').hide();
        UIkit.modal('#Confirm').show();

    });


    jQuery("#import_data").on("click", function ($) {
        var theme_id = jQuery("#theme_id").val();
        UIkit.modal('#Confirm').hide();
        jQuery(".theme").addClass("focus");
        jQuery('.btn-import-' + theme_id).addClass('updating-message');
        jQuery('.btn-import-' + theme_id).html("Importing...");

        var data = {
            'action': 'import_action',
            'theme_id': theme_id,
            'nonce': my_ajax_object.nonce
        };
        jQuery.ajax({
            type: "POST",
            url: my_ajax_object.ajax_url,
            data: data,
            success: function (data) {
                // jQuery(".demo-ansar-container").hide();
                jQuery('.btn-import-' + theme_id).addClass("uk-hidden");
                jQuery('.live-btn-' + theme_id).removeClass("uk-hidden");


                console.log(data);
            },
            error: function (data) {
                alert(data);
            }

        });
        return false;

    });




});




