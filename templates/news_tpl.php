<link href="css/_tintuc.css" type="text/css" rel="stylesheet" />
<div class="news-content">
 	<?php for($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++){ ?>
        <div class="news-items">
            <div class="news-items__image"><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html" title="<?=$tintuc[$i]['ten']?>"><img src="<?php if($tintuc[$i]['thumb']!=NULL)echo _upload_tintuc_l.$tintuc[$i]['thumb'];else echo 'images/noimage.png';?>" alt="<?=$tintuc[$i]['ten']?>" /></a></div>
            <div class="new-items__info">
                <h3><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html" title="<?=$tintuc[$i]['ten']?>"><?=$tintuc[$i]['ten']?></a></h3>
                <div class="mota"><?=$tintuc[$i]['mota']?></div>
            </div>
            <div class="clear"></div>         
        </div><!---END .box_new--> 
    <?php } ?>
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link ,$totalRows ,$pageSize, $offset)?></div>
</div><!---END .box_container-->