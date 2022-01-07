$(document).ready(function(){
    $('.comment-btn').on('click',()=>{
        var id_film=$('#filmid').val();
        var id_user=$('#userid').val();
        var text=$('#comment-text').val();
        $.ajax({
            url: 'app/controllers/comments.php',
            type: 'post',
            dataType:'json',
            data: {
                'id_film': id_film,
                'id_user': id_user,
                'text':text
            },
            success: function(data){
                res = JSON.parse(JSON.stringify(data));
                $('.comment-list').append(insertComment(res));
            }
        });
    });
});

function insertComment(comm){
    let str=`<div class="comment-item" data-id="${comm.id_comment}">
                                    <div class="comment-item--header">
                                        <div class="comment-item--login">
                                            <span>${comm.username}</span>
                                            <time class="comment-item--datetime">
                                                <time datetime="Thu Dec 30 2021 06:14:50 GMT+0300 (Москва, стандартное время)">${comm.timeadded}</time>
                                            </time>
                                        </div>
                                        <div class="comment-item--rate" data-id="123">
                                                <a href="#" class="comment-item--rate_up comment-item--rate-item" title="Нравится (+)" alt="Нравится (+)">
                                                    <svg viewBox="61.9 84.9 200.8 194.4"><path d="M237,146c-4-0.8-8.8-0.8-11.2-0.8h-41V98.6c0-8-6.4-13.7-13.7-13.7h-19.3c-7.2,0-12.9,4.8-15.3,11.2l-11.2,47.4c0,0.8-1.6,3.2-1.6,3.2l-19.3,20.1c0,0-0.8,0.8-0.8,1.6c-0.8,0-1.6,0.8-1.6,0.8H78.8c-8.8,0-16.9,5.6-16.9,14.5v61c0,8.8,8,16.1,16.9,16.1h23.3c1.6,0,3.2-0.8,4.8-0.8l16.1,13.7c4,3.2,9.6,5.6,14.5,5.6h72.3c39.4,0,53-31.3,53-57v-41.8C261.1,158,245.8,148.4,237,146z M81.2,186.9h18.5v56.2H81.2L81.2,186.9L81.2,186.9z M243.4,222.3c0,11.2-3.2,36.9-34.5,36.9h-72.3c-0.8,0-2.4-0.8-2.4-0.8l-16.1-12.9v-0.8v-61v-1.6c0-0.8,0-1.6,0.8-1.6l19.3-20.1c3.2-3.2,5.6-7.2,6.4-11.2l10.4-44.2h9.6v43.4c0,8,7.2,14.5,15.3,14.5h45c2.4,0,5.6,0,6.4,0.8c1.6,0.8,10.4,4,10.4,16.1C243.4,180.5,243.4,222.3,243.4,222.3z"></path></svg>
                                                </a>
                                                <span class="comment-item--rate_count">0</span>
                                                <a href="#" class="comment-item--rate_down comment-item--rate-item" title="Не нравится (-)" alt="Не нравится (-)">
                                                    <svg viewBox="97.6 84.8 200.8 194.4"><path d="M298.4,183.6v-41.8c0-25.7-12.9-57-53-57h-72.3c-4.8,0-10.4,2.4-14.5,5.6l-16.1,13.7c-1.6-0.8-3.2-0.8-4.8-0.8h-23.3c-8.8,0-16.9,7.2-16.9,16.1v61c0,8.8,8,14.5,16.9,14.5h23.3c0.8,0,1.6,0.8,1.6,0.8s0,0.8,0.8,1.6l19.3,20.1c0.8,0.8,1.6,2.4,1.6,3.2l11.2,47.4c1.6,6.4,8,11.2,15.3,11.2h19.3c7.2,0,13.7-5.6,13.7-13.7v-45.8h41c2.4,0,7.2,0,11.2-0.8C283.1,215.7,298.4,206.1,298.4,183.6z M118.5,120.2H137v56.2h-18.5V120.2z M279.9,183.6c0,12.9-8.8,16.1-10.4,16.1c-1.6,0-4,0.8-6.4,0.8h-45c-8,0-15.3,6.4-15.3,14.5v43.4h-11.2l-10.4-44.2c-0.8-4-4-8-6.4-11.2l-19.3-20.1l-0.8-1.6v-1.6v-61v-0.8l16.1-12.9c0.8,0,1.6-0.8,2.4-0.8h72.3c31.3,0,34.5,25.7,34.5,36.9V183.6z"></path></svg>
                                                </a>
                                        </div>
                                    </div>
                                    <div class="comment-item--content">
                                        <span class="comment-item-text">
                                          ${comm.text}
                                        </span>
                                    </div>
                                </div>
`;
    return str;
}