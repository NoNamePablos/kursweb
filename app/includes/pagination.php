<div class="pagination p7">
       <?php if($page<$total_pages):?>
    <div class="pagination-wrapper">
        <div class="pagination-prev pagination-item pagination-disabled">
            <span>
            <svg viewBox="123.5 120.5 129.1 200"><polygon points="123.5,291.4 152.6,320.5 252.6,220.5 152.6,120.5 123.5,147.8 196.3,220.5"></polygon></svg>
            </span>
        </div>
        <div class="pagination-settings">
            <div class="pagination-setting">
                <input type="text" name=""
                       class="pagination-input"
                       placeholder="Всего страниц: <?=$total_pages;?>"
                       onchange="document.getElementById('link').href='http://kursweb1/catalog.php?page='+escape(this.value)" />
                <a id="link" class="btn pagination-link" href="">Перейти</a>
            </div>
        </div>
       <a href="?page=<?php echo ($page+1);?>">
           <div class="pagination-next pagination-item pagination-active">
            <span>
            <svg viewBox="123.5 120.5 129.1 200"><polygon points="123.5,291.4 152.6,320.5 252.6,220.5 152.6,120.5 123.5,147.8 196.3,220.5"></polygon></svg>
            </span>
           </div>
       </a>
    </div>
       <?php endif;?>

    <?php if($page>1):?>
    <div class="pagination-wrapper">
        <a  href="?page=<?php echo ($page-1);?>">
        <div class="pagination-prev pagination-item pagination-active">
            <span>
            <svg viewBox="123.5 120.5 129.1 200"><polygon points="123.5,291.4 152.6,320.5 252.6,220.5 152.6,120.5 123.5,147.8 196.3,220.5"></polygon></svg>
            </span>
        </div>
        </a>
        <div class="pagination-settings">
            <div class="pagination-setting">
                <input type="text" name=""
                       class="pagination-input"
                       placeholder="Всего страниц: <?=$total_pages;?>"
                       onchange="document.getElementById('link').href='http://kursweb1/catalog.php?page='+escape(this.value)" />
                <a id="link" class="btn pagination-link" href="">Перейти</a>
            </div>
        </div>
        <div class="pagination-next pagination-item pagination-disabled ">
            <span>
            <svg viewBox="123.5 120.5 129.1 200"><polygon points="123.5,291.4 152.6,320.5 252.6,220.5 152.6,120.5 123.5,147.8 196.3,220.5"></polygon></svg>
            </span>
        </div>
    </div>
    <?php endif;?>



   <!-- <ul>
        <?php /*if($page>1):*/?>
        <a  href="?page=<?php /*echo ($page-1);*/?>"><li>Previous</li></a>
            <a  href="?page=<?php /*echo 1;*/?>"><li>First</li></a>
       <?php /*;endif*/?>
        <?php /*if($page<$total_pages):*/?>
        <a href="?page=<?php /*echo ($page+1);*/?>"><li>Next</li></a>
        <?php /*endif;*/?>
    </ul>-->
</div>
