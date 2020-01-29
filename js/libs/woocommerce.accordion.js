(function($){$.fn.accordion=function(options){return this.each(function(){var settings=$.extend({firstChildExpand:true,multiExpand:false,slideSpeed:500,dropDownIcon:'&#9660'},options);$(this).children("h1").each(function(){$(this).next('div').andSelf().wrapAll("<div class='accordion-item'></div>");});$(this).children().children('div').addClass("accordion-content");$(this).find("h1").wrap("<div class='accordion-header'></div>");$(this).find("h1").after("<div class='accordion-header-icon'>"+settings.dropDownIcon+"</div>");$(this).children('.accordion-item').wrap('<div class="drawer"></div>');if(settings.firstChildExpand==true){$(this).find(".accordion-header:first").toggleClass("accordion-header-active");$(this).find(".accordion-header:first").parent().toggleClass("accordion-item-active");$(this).find(".accordion-header:first").next().slideToggle(0);$(this).find(".accordion-header:first").children(".accordion-header-icon").toggleClass("accordion-header-icon-active");}$(this).find(".accordion-header").click(function(){if(settings.multiExpand==false){if(!$(this).hasClass('accordion-header-active')){$(this).parent().parent().parent().find(".accordion-header-active").removeClass('accordion-header-active');$(this).parent().parent().parent().find(".accordion-item-active").children(".accordion-content").slideUp(settings.slideSpeed);$(this).parent().parent().parent().find(".accordion-header-icon-active").removeClass("accordion-header-icon-active");$(this).parent().parent().parent().find(".accordion-item-active").removeClass("accordion-item-active");}}$(this).toggleClass("accordion-header-active");$(this).parent().toggleClass("accordion-item-active");$(this).next().slideToggle(settings.slideSpeed);$(this).children(".accordion-header-icon").toggleClass("accordion-header-icon-active");});});}}(jQuery));

(function ($) {
    $('#accordion-container').accordion({
        firstChildExpand: true,
        slideSpeed: 500,
        dropDownIcon: '<i class="fa fa-dot-circle-o" aria-hidden="true"></i>'
    });

    $( 'a.woocommerce-review-link' ).click( function(e) {
        e.preventDefault();
        if( $('#tab-reviews').is(':hidden') )
            $( '.reviews_tab' ).click();
        $('html, body').animate({
            scrollTop: $("#tab-reviews").offset().top - 40
        }, 1000);
        return true;
    });

    var hash  = window.location.hash;
    var url   = window.location.href;
    if ( hash.toLowerCase().indexOf( 'comment-' ) >= 0 || hash === '#reviews' ) {
        $( 'li.reviews_tab' ).click();
    } else if ( url.indexOf( 'comment-page-' ) > 0 || url.indexOf( 'cpage=' ) > 0 ) {
        $( 'li.reviews_tab' ).click();
    }
})(jQuery);