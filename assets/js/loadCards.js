
$( document ).ready(function() {
    var flag=0;
    $.ajax({

        url: 'app/helpers/card_loader.php',         /* Куда пойдет запрос */
        method: 'get',
        data: {
            'offset':0,
            'limit':2
        },     /* Параметры передаваемые в запросе. */
        success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
            let obj=JSON.parse(data);
            console.log("length",obj.length);
            for (var i = 0, len = obj.length; i < len; i++) {
                let x=insert(obj[i]);
                $('.films-list').append(x);
            }
            flag+=2;
        }
    });
    $(window).scroll(function (){
        if($(window).scrollTop()>=$(document).height()-$(window).height()){
            $.ajax({

                url: 'app/helpers/card_loader.php',         /* Куда пойдет запрос */
                method: 'get',
                data: {
                    'offset':flag,
                    'limit':2
                },     /* Параметры передаваемые в запросе. */
                success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                    let obj=JSON.parse(data);
                    for (var i = 0, len = obj.length; i < len; i++) {
                        let x=insert(obj[i]);
                        $('.films-list').append(x);
                    }
                    flag+=2;
                }
            });
        }
    });
});



function insert(film){
    let str=`
    <div class="films-item">
                                <h2 class="films-item--title">
                                    <a href="http://kursweb1/detalnaya.php?film=${film.id_film}">
                                       ${film.film_name}
                                    </a>
                                </h2>
                                <div class="films-item-content">
                                    <div class="films-card card-main">
                                        <div class="item">
                                            <div class="tooltip--wrapper">
                                                <div class="tooltip tooltip__type">Фильм</div>
                                                <div class="tooltip tooltip__typeadd">Новинка</div>
                                            </div>
                                            <div class="card-image">
                                                <div class="card-bg">
                                                    <div class="card-bg__info">
                                                        <div class="info--tooltip">
                                                            <div class="info--tooltip__popup">
                                                                 <div class="tooltip-content">
                                                        <span>${film.created_date}</span>
                                                        <span>${film.film_description}</span>
                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-bg__upbg">
                                                        <a href='http://kursweb1/detalnaya.php?film=${film.id_film}' class="card-bg__play">
<svg viewBox="83.1 54.3 61.5 73.1"><polygon points="83.1,54.3 83.1,127.4 144.7,90.9"></polygon></svg>
</a>
</div>
</div>
<img src="http://kursweb1/assets/uploads/${film.film_preview}" class="card-bg__image" alt="">

</div>
<h2 class="card-main--title">
    <a href="http://kursweb1/detalnaya.php?film=${film.id_film}">
   ${film.film_name}
    </a>
</h2>
</div>
</div>
<div class="films-item-content__settings">
    <div class="films-item-content__setting">
        <p>Премьера: <span class="films-item-content__setting-year">${film.film_year}</span></p>
    </div>
    <div class="films-item-content__setting">
        <p>Страна: <span class="films-item-content__setting-year">${film.film_country}</span></p>
    </div>
    <div class="films-item-content__setting">
        <p>Продолжительность: <span class="films-item-content__setting-year">${film.film_time}</span></p>
    </div>
    <div class="films-item-content__setting">
        <p>Возрастное ограничение: <span class="films-item-content__setting-year">${16}</span></p>
    </div>
    <div class="films-item-content__setting">
        <p>Жанр: <span class="films-item-content__setting-year">${film.film_genres}</span></p>
    </div>

    <div class="films-item-content__setting">
        <p>Режиссер: <span class="films-item-content__setting-year">${film.film_director}</span></p>
    </div>
    <div class="films-item-content__setting">
        <p>Актерский состав: <span class="films-item-content__setting-year">${film.film_acters}</span></p>
    </div>
    <div class="films-item-content__setting">
        <p>Описание: <span class="films-item-content__setting-year">${film.film_description}</span></p>
    </div>
</div>
</div>
</div>
    `;
    return str;
}



/*

*
*
* */