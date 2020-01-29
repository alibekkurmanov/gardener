jQuery(function($){

if($('body').hasClass('woocommerce-page')){
    //Do not Init Infinite Scroll
} else if($('body').hasClass('single-post')){
    //Do not Init Infinite Scroll
} else if($('.blog_posts .story').length) {
    $('.blog_posts .story').append('<span class="load-infinite"></span>');
    var button = $('.blog_posts .story .load-infinite');
    var page = 2;
    var loading = false;
    var scrollHandling = {
        allow: true,
        reallow: function () {
            scrollHandling.allow = true;
        },
        delay: 400 //(milliseconds) adjust to the highest acceptable value
    };

    $(window).scroll(function () {
        if (!loading && scrollHandling.allow) {
            scrollHandling.allow = false;
            setTimeout(scrollHandling.reallow, scrollHandling.delay);
            var offset = $(button).offset().top - $(window).scrollTop();

            if (1500 > offset) {
                loading = true;
                var data = {
                    action: 'ale_ajax_load_more',
                    nonce: aleloadmore.nonce,
                    page: page,
                    query: aleloadmore.query,
                };
                $.post(aleloadmore.url, data, function (res) {
                    if (res.success) {
                        var $content = $(res.data);

                        if ($('.blog_posts .grid').length) {
                            //With Masonry init
                            $($content).imagesLoaded( function() {
                                $('.blog_posts .story .grid').append($content).masonry('appended', $content);
                            });

                        } else {
                            $('.blog_posts .story .blog_grid').append($content)
                        }

                        $('.story').append(button);
                        page = page + 1;
                        loading = false;
                    } else {
                        //console.log(res);
                    }
                }).fail(function (xhr, textStatus, e) {
                    //console.log(xhr.responseText);
                });

            }
        }
    });
}
});