<?php  if(!defined('_source')) die("Error");
 
    $d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='sanpham' order by stt,id desc";
	$d->query($sql);
	$product_danhmuc2=$d->result_array();

    $d->reset();
    $sql="select ten$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and type='sanpham' and noibat=1 order by stt,id desc";
    $d->query($sql);
    $listProductTop=$d->result_array();

    $productIndex = array();

    foreach ($listProductTop as $list) {
        $d->reset();
        $sql = "select id,ten,tenkhongdau,photo,thumb,giacu,gia,spbanchay,masp,mota from table_product where hienthi=1 and id_list=" . $list["id"] . " and type='sanpham' order by stt asc";
        $d->query($sql);
        $product = $d->result_array();

        if(count($product) > 0) {
            $productIndex['all'][] = array(
                'list' => $list,
                'product' => $product
            );
        }
    }

    foreach ($product_danhmuc2 as $category) {
        $d->reset();
        $sql="select ten$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and type='sanpham' and id_danhmuc = ".$category['id']." order by stt,id desc";
        $d->query($sql);
        $listOfCategory = $d->result_array();

        if (count($listOfCategory) > 0) {
            $catProduct = array();
            foreach ($listOfCategory as $list) {
                $d->reset();
                $sql = "select id,ten,tenkhongdau,photo,thumb,giacu,gia,spbanchay,masp,mota from table_product where hienthi=1 and id_list=" . $list["id"] . " and type='sanpham' order by stt asc";
                $d->query($sql);
                $product = $d->result_array();
                if(count($product) > 0) {
                    $catProduct[] = array(
                        'list' => $list,
                        'product' => $product
                    );
                }
            }

            if (!empty($catProduct)) {
                $productIndex['child'][$category['id']][] = array(
                  'cat' => $category,
                  'listOfCat' => $catProduct
                );
            }

        }
    }
?>