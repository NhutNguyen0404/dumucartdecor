<script type="text/javascript">
    function del(pid, size, mausac) {
        if (confirm('Do you really mean to delete this item')) {
            document.form1.pid.value = pid;
            document.form1.size.value = size;
            document.form1.mausac.value = mausac;
            document.form1.command.value = 'delete';
            document.form1.submit();
        }
    }

    function clear_cart() {
        if (confirm('This will empty your shopping cart, continue?')) {
            document.form1.command.value = 'clear';
            document.form1.submit();
        }
    }

    function update_cart() {
        document.form1.command.value = 'update';
        document.form1.submit();
    }

    function quaylai() {
        history.go(-1);
    }

    function doEnter_update(evt) {
        var key;
        if (evt.keyCode == 13 || evt.which == 13) {
            update_cart(evt);
        }
    }
</script>

<!--Đánh giá sao-->
<script type="text/javascript">
    $(document).ready(function (e) {
        var giatri_default = "<?=$num_danhgiasao?>";
        $('.danhgiasao span:lt(' + giatri_default + ')').addClass('active');
        $('.danhgiasao span').hover(function () {
            var giatri = $(this).data('value');
            $('.danhgiasao span').removeClass('hover');
            $('.danhgiasao span:lt(' + giatri + ')').addClass('hover');
        }, function () {
            $('.danhgiasao span').removeClass('hover');
        });

        $('.danhgiasao span').click(function () {
            var url = $('.danhgiasao').data('url');
            var giatri = $(this).data('value');

            $.ajax({
                type: 'post',
                url: 'ajax/danhgiasao.php',
                data: {giatri: giatri, url: url},
                success: function (kq) {
                    if (kq == 1) {
                        $('.danhgiasao span:lt(' + giatri + ')').addClass('active');
                        alert('<?=_bandanhgia?>: ' + giatri + '/10');
                        $('.num_danhgia').html(+giatri + '/10');
                    }
                    else if (kq == 2) {
                        alert('<?=_danhgiaroi?>');
                    }
                    else {
                        alert('<?=_hethongloi?>');
                    }
                }
            });
        });
    });
</script>
<link href="css/_product.css" type="text/css" rel="stylesheet"/>
<div class="wap_item">
    <div class="content-seo">
        <?= $mota_seo ?>
    </div>
    <div class="content-products">
        <?php foreach ($products as $product) { ?>
            <?php include "layout/product_item.php"; ?>
        <?php } ?>
    </div>
    <div class="pagination"><?= pagesListLimitadmin($url_link, $totalRows, $pageSize, $offset) ?></div>
</div><!---END .wap_item-->