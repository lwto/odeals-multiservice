/*
Template: Datum - Responsive Bootstrap 4 Admin Dashboard Template
Author: iqonic.design
Design and Developed by: iqonic.design
NOTE: This file contains the styling for responsive Template.
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------

:: Tooltip
:: Fixed Nav
:: Sidebar Widget
:: Page Loader
:: Close  navbar Toggle
:: user toggle
:: Data tables
:: Form Validation
:: Flatpicker
:: Scrollbar
:: checkout
:: Datatables
:: SVG Animation
------------------------------------------------
Index Of Script
----------------------------------------------*/

(function(jQuery) {



    "use strict";

    jQuery(document).ready(function() {

        /*---------------------------------------------------------------------
        Tooltip
        -----------------------------------------------------------------------*/
        jQuery('[data-toggle="popover"]').popover();
        jQuery('[data-toggle="tooltip"]').tooltip();

        /*---------------------------------------------------------------------
        Fixed Nav
        -----------------------------------------------------------------------*/

        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 0) {
                $('.iq-top-navbar').addClass('fixed');
            } else {
                $('.iq-top-navbar').removeClass('fixed');
            }
        });

        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 0) {
                $('.white-bg-menu').addClass('sticky-menu');
            } else {
                $('.white-bg-menu').removeClass('sticky-menu');
            }
        });


       /*---------------------------------------------------------------------
        Sidebar Widget
        -----------------------------------------------------------------------*/

        jQuery(document).on("click", '.side-menu > li > a', function() {
            jQuery('.side-menu > li > a').parent().removeClass('active');
            jQuery(this).parent().addClass('active');
        });

        // Active menu
        var parents = jQuery('li.active').parents('.submenu.collapse');

        parents.addClass('show');


        parents.parents('li').addClass('active');
        jQuery('li.active > a[aria-expanded="false"]').attr('aria-expanded', 'true');

        /*---------------------------------------------------------------------
        Page Loader
        -----------------------------------------------------------------------*/
        jQuery("#load").fadeOut();
        jQuery("#loading").delay().fadeOut("");

        /*---------------------------------------------------------------------
        Page Menu
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.wrapper-menu', function() {
            jQuery(this).toggleClass('open');
        });

        jQuery(document).on('click', ".wrapper-menu", function() {
            jQuery("body").toggleClass("sidebar-main");
        });


      /*---------------------------------------------------------------------
       Close  navbar Toggle
       -----------------------------------------------------------------------*/

        jQuery('.close-toggle').on('click', function () {
            jQuery('.h-collapse.navbar-collapse').collapse('hide');
        });

        /*---------------------------------------------------------------------
        user toggle
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.user-toggle', function() {
            jQuery(this).parent().addClass('show-data');
        });

        jQuery(document).on('click', ".close-data", function() {
            jQuery('.user-toggle').parent().removeClass('show-data');
        });
        jQuery(document).on("click", function(event){
        var $trigger = jQuery(".user-toggle");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            jQuery(".user-toggle").parent().removeClass('show-data');
        }
        });

        /*---------------------------------------------------------------------
        Data tables
        -----------------------------------------------------------------------*/
        if($.fn.DataTable){
            const table = $('.data-table').DataTable();
        }


        /*---------------------------------------------------------------------
        Form Validation
        -----------------------------------------------------------------------*/

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);

        /*---------------------------------------------------------------------
        Scrollbar
        -----------------------------------------------------------------------*/

        jQuery('.data-scrollbar').each(function () {
            var attr = $(this).attr('data-scroll');
            if (typeof attr !== typeof undefined && attr !== false){
            let Scrollbar = window.Scrollbar;
            var a = jQuery(this).data('scroll');
            Scrollbar.init(document.querySelector('div[data-scroll= "' + a + '"]'));
            }
        });

    });


    $(document).on('click', '[data-toggel-extra="side-nav"]', function () {
        const pannel = $(this).attr('data-expand-extra')
        $(pannel).addClass('active')
    })

    $(document).on('click', '[data-toggel-extra="side-nav-close"]', function () {
        const pannel = $(this).attr('data-expand-extra')
        $(pannel).removeClass('active')
    })

    $(document).on('click', '[data-toggel-extra="right-sidenav"]', function () {
        const target = $(this).data('target')
        $(target).addClass('active')
    })

    $(document).on('click', '[data-extra-dismiss="right-sidenav"]', function () {
        $(this).closest('.right-sidenav').removeClass('active')
    })

    $(document).on('click', '[data-toggle="end-call"]', function(){
        $(this).closest('.tab-pane').removeClass('active').removeClass('show')
        $($(this).attr('data-target')).tab('show')
        $('.chat-action').find('[data-toggle="tab"]').removeClass('active')
    })

    $(document).on('click', '[data-toggle-extra="tab"]', function () {
        const target = $(this).attr('data-target-extra')
        $('[data-toggle-extra="tab-content"]').removeClass('active')
        $(target).addClass('active')
        $(this).parent().find('.active').removeClass('active')
        $(this).addClass('active')
    })

    $('.dropdown-menu').on('click', function(event){
        event.stopPropagation();
    });

})(jQuery);
