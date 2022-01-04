
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
                                    <a href="http://kursweb1/detalnaya.php?film=${film.id_film}>">
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

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-bg__upbg">
                                                        <a href='http://kursweb1/detalnaya.php?film=${film.id_film}>' class="card-bg__play">
<svg viewBox="83.1 54.3 61.5 73.1"><polygon points="83.1,54.3 83.1,127.4 144.7,90.9"></polygon></svg>
</a>
</div>
</div>
<img src="http://kursweb1/assets/uploads/${film.film_preview}" class="card-bg__image" alt="">

</div>
<div class="card-main--rate">
    <a href="#" class="rate rate__positiv">
                                          <span>
                                                <svg viewBox="61.9 84.9 200.8 194.4">
                                                <path d="M237,146c-4-0.8-8.8-0.8-11.2-0.8h-41V98.6c0-8-6.4-13.7-13.7-13.7h-19.3c-7.2,0-12.9,4.8-15.3,11.2l-11.2,47.4c0,0.8-1.6,3.2-1.6,3.2l-19.3,20.1c0,0-0.8,0.8-0.8,1.6c-0.8,0-1.6,0.8-1.6,0.8H78.8c-8.8,0-16.9,5.6-16.9,14.5v61c0,8.8,8,16.1,16.9,16.1h23.3c1.6,0,3.2-0.8,4.8-0.8l16.1,13.7c4,3.2,9.6,5.6,14.5,5.6h72.3c39.4,0,53-31.3,53-57v-41.8C261.1,158,245.8,148.4,237,146z M81.2,186.9h18.5v56.2H81.2L81.2,186.9L81.2,186.9z M243.4,222.3c0,11.2-3.2,36.9-34.5,36.9h-72.3c-0.8,0-2.4-0.8-2.4-0.8l-16.1-12.9v-0.8v-61v-1.6c0-0.8,0-1.6,0.8-1.6l19.3-20.1c3.2-3.2,5.6-7.2,6.4-11.2l10.4-44.2h9.6v43.4c0,8,7.2,14.5,15.3,14.5h45c2.4,0,5.6,0,6.4,0.8c1.6,0.8,10.4,4,10.4,16.1C243.4,180.5,243.4,222.3,243.4,222.3z"></path>
                                            </svg>
                                          </span>

    </a>
    <a href="" class="rate rate__negativ">
                                         <span>
                                                <svg viewBox="61.9 84.9 200.8 194.4">
                                                <path d="M237,146c-4-0.8-8.8-0.8-11.2-0.8h-41V98.6c0-8-6.4-13.7-13.7-13.7h-19.3c-7.2,0-12.9,4.8-15.3,11.2l-11.2,47.4c0,0.8-1.6,3.2-1.6,3.2l-19.3,20.1c0,0-0.8,0.8-0.8,1.6c-0.8,0-1.6,0.8-1.6,0.8H78.8c-8.8,0-16.9,5.6-16.9,14.5v61c0,8.8,8,16.1,16.9,16.1h23.3c1.6,0,3.2-0.8,4.8-0.8l16.1,13.7c4,3.2,9.6,5.6,14.5,5.6h72.3c39.4,0,53-31.3,53-57v-41.8C261.1,158,245.8,148.4,237,146z M81.2,186.9h18.5v56.2H81.2L81.2,186.9L81.2,186.9z M243.4,222.3c0,11.2-3.2,36.9-34.5,36.9h-72.3c-0.8,0-2.4-0.8-2.4-0.8l-16.1-12.9v-0.8v-61v-1.6c0-0.8,0-1.6,0.8-1.6l19.3-20.1c3.2-3.2,5.6-7.2,6.4-11.2l10.4-44.2h9.6v43.4c0,8,7.2,14.5,15.3,14.5h45c2.4,0,5.6,0,6.4,0.8c1.6,0.8,10.4,4,10.4,16.1C243.4,180.5,243.4,222.3,243.4,222.3z"></path>
                                            </svg>
                                         </span>
    </a>
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