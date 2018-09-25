jQuery(document).ready(function() {
    var pull = jQuery('.menu-collapser'),
     menu = jQuery('.primary-menu');

    jQuery(pull).on('click', function() {
        menu.slideToggle();
    });
    
    jQuery(window).resize(function() {
        var w = jQuery(window).width();
        if (w > 960 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
});


jQuery(window).scroll(function() {
    var height = jQuery(window).scrollTop();
    if (height > 100) {
        jQuery('#totop').fadeIn();
    } else {
        jQuery('#totop').fadeOut();
    }
});
jQuery(document).ready(function() {
    jQuery("#totop").click(function(event) {
        event.preventDefault();
        jQuery("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});


jQuery(document).ready(function() {
    var pull = jQuery('.sumit-search'),
     menu = jQuery('.consult-header-search-box');

    jQuery(pull).on('click', function() {
        menu.slideToggle();
    });
    
    jQuery(window).resize(function() {
        var w = jQuery(window).width();
        if (w > 960 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
});