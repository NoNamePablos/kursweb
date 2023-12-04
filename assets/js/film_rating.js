$(document).ready(function(){
    // if the user clicks on the like button ...
    $('.rate-like').on('click', function(){
        var post_id = $(this).data('id');
        $clicked_btn = $(this);
        if ($clicked_btn.hasClass('rate__positiv')) {
            action = 'like';
        } else if($clicked_btn.hasClass('rate__clc__positiv')){
            action = 'unlike';
        }
        $.ajax({
            url: 'app/controllers/film_rating.php',
            type: 'post',
            data: {
                'action': action,
                'id_film': post_id
            },
            success: function(data){
                res = JSON.parse(data);
                if(action=='like'){
                    $clicked_btn.removeClass('rate__positiv');
                    $clicked_btn.addClass('rate__clc__positiv');
                }
                if(action=='unlike'){
                    $clicked_btn.removeClass('rate__clc__positiv');
                    $clicked_btn.addClass('rate__positiv');
                }
                $clicked_btn.find('span.likes').text(res.likes);
                $clicked_btn.find('span.dislikes').text(res.dislikes);
            }
        });
    });
    $('.rate-dislike').on('click', function(){
        var post_id = $(this).data('id');
        $clicked_btn = $(this);
        if ($clicked_btn.hasClass('rate__negativ')) {
            action = 'dislike';
        } else if($clicked_btn.hasClass('rate__clc__negativ')){
            action = 'undislike';
        }
        $.ajax({
            url: 'app/controllers/film_rating.php',
            type: 'post',
            data: {
                'action': action,
                'id_film': post_id
            },
            success: function(data){
                res = JSON.parse(data);
                if(action=='dislike'){
                    $clicked_btn.removeClass('rate__negativ');
                    $clicked_btn.addClass('rate__clc__negativ');
                }
                if(action=='undislike'){
                    $clicked_btn.removeClass('rate__clc__negativ');
                    $clicked_btn.addClass('rate__negativ');
                }
                $clicked_btn.find('span.likes').text(res.likes);
                $clicked_btn.find('span.dislikes').text(res.dislikes);
            }
        });
    });
});
