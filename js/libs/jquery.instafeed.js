jQuery(function($) {

    /* Get token example - https://instagram.com/oauth/authorize/?client_id=[CLIENT_ID_HERE]&redirect_uri=http://localhost&response_type=token&scope=public_content */

    "use strict";

    $.ajax({
        url: 'https://api.instagram.com/v1/users/search',
        dataType: 'jsonp',
        type: 'GET',
        data: {access_token: olins_instagram.token, q: olins_instagram.username},
        success: function (data) {
            //console.log(data);
            $.ajax({
                url: 'https://api.instagram.com/v1/users/' + data.data[0].id + '/media/recent',
                dataType: 'jsonp',
                type: 'GET',
                data: {access_token: olins_instagram.token, count: olins_instagram.num_photos},
                success: function (data2) {
                    //console.log(data2);

                    $.each(data2.data, function (key, value) {
                        var thumb = '';

                        if(olins_instagram.thumb == 'standard_resolution'){
                            thumb = data2.data[key].images.standard_resolution.url
                        } else if(olins_instagram.thumb == 'thumbnail'){
                            thumb = data2.data[key].images.thumbnail.url
                        } else if(olins_instagram.thumb == 'low_resolution'){
                            thumb = data2.data[key].images.low_resolution.url
                        }
                        $('ul.ale_instagram_feed').append('<li><a href="'+data2.data[key].link+'" target="_blank"><img src="' + thumb + '" alt="'+data2.data[key].type+'"></a></li>');
                    });
                },
                error: function (data2) {
                    //console.log(data2);
                }
            });
        },
        error: function (data) {
            //console.log(data);
        }
    });
});