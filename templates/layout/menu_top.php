<!--Hover menu-->
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        //Hover vào menu xổ xuống
        $("#menu ul li").hover(function () {
            $(this).find('ul:first').css({visibility: "visible", display: "none"}).show(300);
        }, function () {
            $(this).find('ul:first').css({visibility: "hidden"});
        });
        $("#menu ul li").hover(function () {
            $(this).find('>a').addClass('active2');
        }, function () {
            $(this).find('>a').removeClass('active2');
        });
        //-----------------
        //Hover vào menu xổ xuống
        /*$("#danhmuc ul li").hover(function(){
            $(this).find('ul:first').css({visibility: "visible",display: "none"}).show(300);
            },function(){
            $(this).find('ul:first').css({visibility: "hidden"});
            });
        $("#danhmuc ul li").hover(function(){
                $(this).find('>a').addClass('active2');
            },function(){
                $(this).find('>a').removeClass('active2');
        }); */
        //Click vào danh mục xổ xuống
        /*$("#danhmuc ul li a").click(function(){
            if($(this).parents('li').children('ul').find('li').length>0)
            {
                $("#danhmuc ul li ul").hide(300);

                if($(this).hasClass('active'))
                {
                    $("#danhmuc ul li ul").removeClass('active');
                    $(this).parents('li').find('ul:first').hide(300);
                    $(this).removeClass('active2');
                }
                else
                {
                    $("#danhmuc ul li ul").removeClass('active');
                    $(this).parents('li').find('ul:first').show(300);
                    $(this).addClass('active2');
                }
                return false;
            }
        });*/

    });
</script>
<!--Hover menu-->
<link href="css/_menutop.css" type="text/css" rel="stylesheet"/>
<div class="wap_menu">
    <div class="menu">
        <nav id="menu_mobi" style="height:0; overflow:hidden;"></nav>
        <div class="header"><a href="#menu_mobi" class="hien_menu"><i class="fa fa-bars" aria-hidden="true"></i> <i
                        class="fa fa-caret-right" aria-hidden="true"></i></a>
        </div>
        <nav id="menu">
            <ul>
                <li class="logo-top">
                    <a class="<?php if ((!isset($_REQUEST['com'])) or ($_REQUEST['com'] == NULL) or $_REQUEST['com'] == 'index') echo 'active'; ?>"
                       href=""><img src="<?=_upload_hinhanh_l.$row_banner['photo']?>" /></a></li>
                </li>
                <li>
                    <a class="<?php if ((!isset($_REQUEST['com'])) or ($_REQUEST['com'] == NULL) or $_REQUEST['com'] == 'index') echo 'active'; ?>"
                       href=""><?= _trangchu ?></a></li>
                <li><a class="<?php if ($_REQUEST['com'] == 'cua-hang') echo 'active'; ?>"
                       href="cua-hang.html"><?= _cuahang ?></a>
                    <?php if (count($danhmuc_product) > 0) { ?>
                        <ul class="sub-menu">
                            <?php for ($i = 0; $i < count($danhmuc_product); $i++) { ?>
                                <li>
                                    <a href="san-pham/<?= $danhmuc_product[$i]['tenkhongdau'] ?>-<?= $danhmuc_product[$i]['id'] ?>"><?= $danhmuc_product[$i]['ten'] ?></a>
                                    <?php
                                    $d->reset();
                                    $sql = "select id,ten$lang as ten,tenkhongdau,mota$lang as mota from #_product_list where type='sanpham' and hienthi=1 and id_danhmuc = " . $danhmuc_product[$i]['id'] . " order by stt,id desc";
                                    $d->query($sql);
                                    $danhmuc_list_mn = $d->result_array();
                                    if (count($danhmuc_list_mn) > 0) {
                                        ?>
                                        <ul>
                                            <?php for ($j = 0; $j < count($danhmuc_list_mn); $j++) { ?>
                                                <li>
                                                    <a href="san-pham/<?= $danhmuc_list_mn[$j]['tenkhongdau'] ?>-<?= $danhmuc_list_mn[$j]['id'] ?>/"><?= $danhmuc_list_mn[$j]['ten'] ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
                <li><a class="<?php if ($_REQUEST['com'] == 'thi-cong-noi-that') echo 'active'; ?>"
                       href="thi-cong-noi-that.html">Thi công nội thất</a></li>
                <li><a class="<?php if ($_REQUEST['com'] == 'thiet-ke-noi-that') echo 'active'; ?>"
                       href="thiet-ke-noi-that.html">Thiết kế nội thất</a></li>
                <li><a class="<?php if ($_REQUEST['com'] == 'tu-van') echo 'active'; ?>" href="tu-van.html">Tư vấn</a></li>
                <li><a class="<?php if ($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>"
                       href="gioi-thieu.html"><?= _gioithieu ?></a></li>
                <li><a class="<?php if ($_REQUEST['com'] == 'lien-he') echo 'active'; ?>"
                       href="lien-he.html"><?= _lienhe ?></a></li>
            </ul>
            <div class="clear"></div>
        </nav>
    </div><!---END .menu-->
</div><!---END .wap_menu-->
