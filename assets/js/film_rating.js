$(document).ready(function(){
    // if the user clicks on the like button ...
    $('.rate__positiv').on('click', function(){
        var post_id = $(this).data('id');
        $clicked_btn = $(this);
        if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
            action = 'like';
        } else if($clicked_btn.hasClass('fa-thumbs-up')){
            action = 'unlike';
        }

        $.ajax({
            url: 'app/controllers/film_rating.php',
            type: 'post',
            data: {
                'action': 'like',
                'id_film': post_id
            },
            success: function(data){
                res = JSON.parse(data);
                /*
                * не работает siblings
                * */
                $clicked_btn.siblings('span.likes').text(res.likes);
                $clicked_btn.siblings('span.dislikes').text(res.dislikes);
                console.log( $('span.dislikes'));
            }
        });
    });
});
