jQuery(function($) {
    "use strict";

    // Home Top Slider
    if($('.main_top_slider').length){
        $('.main_top_slider').flexslider({
            animation: 'fade',
            slideshowSpeed: '9000',
            directionNav:false,
            pauseOnHover: true
        });
    }

    if($('.gardener_slider').length){
        $('.gardener_slider').slick({
            autoplay:true,
            pauseOnHover:true,
            slidesToShow: 1,
            variableWidth: true,
            adaptiveHeight: true,
            arrows: true,
            nextArrow: '.next_gardener',
            prevArrow: '.previous_gardener',
        });
    }

    /* Services Buttons Actions */
    $('.service_button').on('click',function(){
        var selected_button = $(this).data('id');

        $('.item_service').addClass('display_none').removeClass('display');
        $('.image_container').addClass('display_none').removeClass('display');

        $('.item_service[data-id="'+selected_button+'"]').removeClass('display_none').addClass('display');
        $('.image_container[data-id="'+selected_button+'"]').removeClass('display_none').addClass('display');


        $('.service_button').removeClass('active').addClass('no-active');
        $(this).removeClass('no-active').addClass('active');
    });


    if($('.partners_slider').length){

        $('.partners_slider').on('init', function(event, slick){
            var currentIndex = $('.slick-current').data('slick-index') + 1;
            var slide_data = $('.slick-current .hidden_data').html();

            $('.current_slide').text(currentIndex);
            $('.partner_contents_data').html(slide_data);
        });

        $('.partners_slider').slick({
            slidesToShow: 3,
            verticalSwiping:true,
            draggable: false,
            infinite:true,
            adaptiveHeight: true,
            centerMode: true,
            vertical:true,
            nextArrow: '.bottom_slide',
            prevArrow: '.top_slide'
        });

        $('.partners_slider').on('afterChange', function(event, slick){
            var currentIndex = $('.partners_slider').slick('slickCurrentSlide');
            var slide_data = $('.slick-current .hidden_data').html();

            $('.current_slide').text(currentIndex + 1);
            $('.partner_contents_data').html(slide_data);
        });
    }


    if($('.testimonials_slider').length){
        $('.testimonials_slider').slick({
            autoplay:true,
            pauseOnHover:true,
            slidesToShow: 1,
            adaptiveHeight: true,
            //arrows: false,
            nextArrow: '.next_testy',
            prevArrow: '.previous_testy',
            fade: true
        });
        var $carousel =  $('.testimonials_slider');
        $(document).on('keydown', function(e) {
            if(e.keyCode == 37) {
                $carousel.slick('slickPrev');
            }
            if(e.keyCode == 39) {
                $carousel.slick('slickNext');
            }
        });
    }


    if($('.portfolio_slider').length){

        $('.portfolio_slider').on('init', function(event, slick){
            var currentIndex = $('.portfolio_item_slide.slick-current').data('slick-index') + 1;
            $('.current_project_slide').text(currentIndex);
        });

        $('.portfolio_slider').slick({
            autoplay:false,
            pauseOnHover:true,
            slidesToShow: 1,
            adaptiveHeight: true,
            //arrows: false,
            nextArrow: '.right_slide_project',
            prevArrow: '.left_slide_project'

        });

        $('.portfolio_slider').on('afterChange', function(event, slick){
            var currentIndex = $('.portfolio_item_slide.slick-current').data('slick-index') + 1;
            $('.current_project_slide').text(currentIndex);
        });

        var $carousel =  $('.portfolio_slider');
        $(document).on('keydown', function(e) {
            if(e.keyCode == 37) {
                $carousel.slick('slickPrev');
            }
            if(e.keyCode == 39) {
                $carousel.slick('slickNext');
            }
        });
    }



});
