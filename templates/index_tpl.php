<link href="css/_product.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
    function loadData(page,id_tab,id_danhmuc,type){
        $.ajax({
            type: "POST",
            url: "paging_ajax/ajax_paging.php",
            data: {page:page,id_danhmuc:id_danhmuc,type:type},
            success: function(msg)
            {
                    $("#loadbody").fadeOut("fast");
                    $(id_tab).html(msg);
                      $(id_tab+" .pagination li.active").click(function(){
                        var pager = $(this).attr("p");
                        var id_danhmucr = $(this).parents().parents().parents().attr("data-rel");
                        
                        loadData(pager,".load_page_"+id_danhmucr,id_danhmucr);
                    });  
            }
        });
    }
    var slick = {
        //vertical:true,Chay dọc
        //fade: true,//Hiệu ứng fade của slider
        //slidesPerRow: 2,
        //cssEase: 'linear',//Chạy đều
        //lazyLoad: 'progressive',
        infinite: true,//Lặp lại
        accessibility:true,
        slidesToShow: 3,    //Số item hiển thị
        slidesToScroll: 1, //Số item cuộn khi chạy
        autoplay:true,  //Tự động chạy
        autoplaySpeed:3000,  //Tốc độ chạy
        speed:1000,//Tốc độ chuyển slider
        arrows:true, //Hiển thị mũi tên
        centerMode:false,  //item nằm giữa
        dots:false,  //Hiển thị dấu chấm
        draggable:true,  //Kích hoạt tính năng kéo chuột
        pauseOnHover:true,

        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false
                }
            },
            {
                breakpoint: 801,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: false
                }
            },
            {
                breakpoint: 361,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: false
                }
            }
            ,
            {
                breakpoint: 321,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: false
                }
            }
        ]

    };
</script>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('.size').click(function(){
			$('.size').removeClass('active_size');
			$(this).addClass('active_size');
		});
		$('.mausac').click(function(){
			$('.mausac').removeClass('active_mausac');
			$(this).addClass('active_mausac');
		});
		$('button.dathangkm').click(function(){
				if($('.size').length && $('.active_size').length==false)
				{
					alert('<?=_chonsize?>');
					return false;
				}
				if($('.active_size').length)
				{
					var size = $('.active_size').html();
				}
				else
				{
					var size = '';
				}
				
				if($('.mausac').length && $('.active_mausac').length==false)
				{
					alert('<?=_chonmau?>');
					return false;
				}
				if($('.active_mausac').length)
				{
					var mausac = $('.active_mausac').html();
				}
				else
				{
					var mausac = '';
				}
					var act = "dathang";
					var _seft = $(this);
                    var id = _seft.attr ('name');
                    var nam_sl ='.sl_km'+id;
					var soluong = $(nam_sl).val();
                    //alert(soluong);
					if(soluong>0)
					{
						$.ajax({
							type:'post',
							url:'ajax/cart.php',
							dataType:'json',
							data:{id:id,size:size,mausac:mausac,soluong:soluong,act:act},
							beforeSend: function() {
								$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  
							},
							error: function(){
								add_popup('<?=_hethongloi?>');
							},
							success:function(kq){
								add_popup2(kq.thongbao);
								$('#info_cart').html(kq.thongbao);
                                //alert(kq.sl);
								console.log(kq);
							}
						});
					}
					else
					{
						alert('<?=_nhapsoluong?>');
					}
			return false;  
		});
	});
	
	$(document).ready(function () {
        const showTab = $('.js-show-tab');
        const tabItems = $('.tab-items');
        showTab.click(function () {
            let dataTab = $(this).attr('data-tab');
            showTab.removeClass('actived');
            $(this).addClass('actived');
            let tabContent = $('#product-tab-item__'+dataTab);
            tabItems.removeClass('show');
            tabItems.addClass('hide');
            tabContent.removeClass('hide');
            tabContent.addClass('show');
            tabContent.find('.js-silder-product-index').slick('setPosition');
        });
    })
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.js-silder-product-index').slick(slick);
    });
</script>

<div class="tab-products">
    <ul>
        <li data-tab="all" class="actived js-show-tab">Tất cả</li>
        <?php for ($i=0; $i < count($product_danhmuc2); $i++) { ?>
            <li data-tab="<?=$product_danhmuc2[$i]['id']?>" class="js-show-tab"><?=$product_danhmuc2[$i]['ten']?></li>
        <?php } ?>
    </ul>
</div>
<div class="content-tab">
    <div class="actived tab-items" id="product-tab-item__all">
        <?php foreach ($productIndex['all'] as $list) { ?>
        <div class="content-category">
            <div class="tieude_giua"><div><?=$list['list']['ten']?></div><a href="san-pham/<?=$list['list']['tenkhongdau']?>-<?=$list['list']['id']?>">Xem tất cả</i></a></div>
            <div class="wap_item">
                <div class="content-item js-silder-product-index">
                    <?php foreach ($list['product'] as $product) { ?>
                        <?php include "layout/product_item.php"; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php foreach ($productIndex['child'] as $catItem) { ?>
        <?php foreach ($catItem as $cat) { ?>
        <div class="tab-items hide" id="product-tab-item__<?=$cat['cat']['id']?>">
            <?php foreach ($cat['listOfCat'] as $list) { ?>
                <div class="content-category">
                    <div class="tieude_giua"><div><?=$list['list']['ten']?></div><a href="san-pham/<?=$list['list']['tenkhongdau']?>-<?=$list['list']['id']?>">Xem tất cả</i></a></div>
                    <div class="wap_item">
                        <div class="content-item js-silder-product-index">
                            <?php foreach ($list['product'] as $product) { ?>
                                <?php include "layout/product_item.php"; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php } ?>
    <?php } ?>
</div>

