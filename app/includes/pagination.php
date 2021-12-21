<div class="pagination p7">
    <ul>

        <?php if($page>1):?>
        <a  href="?page=<?php echo ($page-1);?>"><li>Previous</li></a>
            <a  href="?page=<?php echo 1;?>"><li>First</li></a>
       <?php ;endif?>
        <?php if($page<$total_pages):?>
        <a href="?page=<?php echo ($page+1);?>"><li>Next</li></a>
        <?php endif;?>
    </ul>
</div>
