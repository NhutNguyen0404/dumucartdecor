<div class="item">
    <a href="<?= $product['tenkhongdau'] ?>-<?= $product['id'] ?>.html"
       title="<?= $product['ten'] ?>" itemprop="name"><img style="width: 100%;"
                                                               src="<?php if ($product['photo'] != NULL) echo _upload_sanpham_l . $product['photo']; else echo 'images/noimage.png'; ?>"
                                                               alt="<?= $product['ten'] ?>"/></a>
    <div class="tomtat">
        <h3 class="sp_name"><a href="<?= $product['tenkhongdau'] ?>-<?= $product['id'] ?>.html"
                               title="<?= $product['ten'] ?>" itemprop="name"><?= $product['ten'] ?> - <?= $product['masp'] ?></a>
        </h3>
        <p class="mota"><?= $product['mota'] ?></p>
    </div>
    <div class="price-product">
        <div class="price price-items"><?= number_format($product['gia']) ?> vnd</div>
        <a class="buy-now price-items" data-id="<?= $product['id'] ?>" href="#">Mua ngay</a>
    </div>

</div><!---END .item-->