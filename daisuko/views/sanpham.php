<?php
   $sanpham=$page['data'];
   if (count($sanpham)>0) {
      // unset($_SESSION['cart']);
      $danhmuc= $data->danhmucsp();
      $bannerqc = $data->getbannerqc();
      $cungdanhmuc= $data->getsanphammoi1();
      $thisurl  = isset($_GET['url']) ? $_GET['url'] : null;
      $phien= isset($_GET['phien'])?$_GET['phien']:0;
      $spphien=$data->getphien($phien);
?>
<style type="text/css">
    table tr td:last-child, table tr th:last-child {
    padding: 0px 20px 0 20px;
}
.lb1{
    font-size: 14px;
}
</style>

<div class="wrap-breadcrumb">
                    <div class="clearfix container">
                        <div class="row main-header">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                                <ol class="breadcrumb breadcrumb-arrows">
                                    <li><a href="<?=HOME?>" target="_self">Trang chủ</a></li>
                                    <li><a href="product" target="_self">Sản phẩm</a></li>
                                    <li class="active"><span><?=$sanpham['name']?></span></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="content" class="clearfix container">
                    <div class="row">
                        <div id="product" class="content-pages" data-sticky_parent="">
                            <div class="wrapper-sticky" style="display: block; width: 25%; margin: auto; position: relative; float: left; inset: auto; vertical-align: top; height: auto;">
                                <div class="col-md-3 col-sm-12 col-xs-12  leftsidebar-col" data-sticky_column="" style="width: 293px; position: relative; inset: auto;">
                                    <div class="group_sidebar">
                                        <div class="list-group navbar-inner ">
                                            <div class="mega-left-title btn-navbar title-hidden-sm">
                                                <h3 class="sb-title">Danh mục </h3>
                                            </div>
                                            <ul class="nav navs sidebar menu" id="cssmenu">
                                              <?php foreach ($danhmuc as $key => $value) {
                                              $con= $data->getdanhmuccon($value['id']);
                                              if (count($con)>0) { ?>
                                                <li class="item has-sub active first">
                                                    <a href="product/1/<?=$value['url']?>">
                                                        <span class="lbl"><?=$value['name']?></span>
                                                        <span data-toggle="collapse" data-parent="#cssmenu" href="#sub-item-<?=$value['id']?>" class="sign drop-down">
                                                        </span>
                                                    </a>
                                                    <ul class="nav children collapse" id="sub-item-<?=$value['id']?>">
                                                       <?php foreach ($con as $item) { ?>
                                                        <li class="first">
                                                            <a href="product/1/<?=$item['url']?>" title="<?=$item['name']?>">
                                                                <span><?=$item['name']?></span>
                                                            </a>
                                                        </li>
                                                       <?php } ?>
                                                    </ul>
                                                </li>
                                              <?php }else{ ?>
                                                  <li class="item current active  ">
                                                    <a href="product/1/<?=$value['url']?>">
                                                        <span><?=$value['name']?></span>
                                                    </a>
                                                </li>
                                              <?php } } ?>

                                            </ul>
                                        </div>
                                        <!-- Banner quảng cáo -->
                                        <div class="list-group_l banner-left hidden-sm hidden-xs">
                                            <a href="<?=$bannerqc['url']?>" target="_blank">
                                                <img src="<?=$bannerqc['hinh_anh']?>">
                                            </a>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            //$('ul li:has(ul)').addClass('hassub');
                                            $('#cssmenu ul ul li:odd').addClass('odd');
                                            $('#cssmenu ul ul li:even').addClass('even');
                                            $('#cssmenu > ul > li > a').click(function() {
                                                $('#cssmenu li').removeClass('active');
                                                $(this).closest('li').addClass('active');
                                                var checkElement = $(this).nextS();
                                                if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                                                    $(this).closest('li').removeClass('active');
                                                    checkElement.slideUp('normal');
                                                }
                                                if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                                                    $('#cssmenu ul ul:visible').slideUp('normal');
                                                    checkElement.slideDown('normal');
                                                }
                                                if ($(this).closest('li').find('ul').children().length == 0) {
                                                    return true;
                                                } else {
                                                    return false;
                                                }
                                            });

                                            $('.drop-down').click(function(e) {
                                                if ($(this).parents('li').hasClass('has-sub')) {
                                                    e.preventDefault();
                                                    if ($(this).hasClass('open-nav')) {
                                                        $(this).removeClass('open-nav');
                                                        $(this).parents('li').children('ul.lve2').slideUp('normal').removeClass('in');
                                                    } else {
                                                        $(this).addClass('open-nav');
                                                        $(this).parents('li').children('ul.lve2').slideDown('normal').addClass('in');
                                                    }
                                                } else {

                                                }
                                            });

                                        });

                                        $("#list-group-l ul.navs li.active").parents('ul.children').addClass("in");
                                    </script>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" data-sticky_column="">
                                <div id="wrapper-detail" class="product-page">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div id="surround">
                                                <a class="slide-prev slide-nav" href="javascript:">
                                                    <i class="fa fa-arrow-circle-o-left fa-2"></i>
                                                </a>
                                                <a class="slide-next slide-nav" href="javascript:">
                                                    <i class="fa fa-arrow-circle-o-right fa-2"></i>
                                                </a>
                                                <img class="product-image-feature" src="<?=$sanpham['hinh_anh']?>" alt="<?=$sanpham['name']?>">
                                                <div id="sliderproduct" class="">
                                                    <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                                        <ul class="slides" style="width: 1200%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                                            <?php if ($sanpham['hinh_anh']!='') { ?>
                                                            <li class="product-thumb active" style="float: left; display: block; width: 95px;">
                                                                <a href="javascript:" data-image="<?=$sanpham['hinh_anh']?>" data-zoom-image="<?=$sanpham['hinh_anh']?>">
                                                                    <img alt="$sanpham['name']" data-image="<?=$sanpham['hinh_anh']?>" src="<?=$sanpham['hinh_anh']?>" draggable="false">
                                                                </a>
                                                            </li>
                                                            <?php } ?>
                                                            <?php if ($sanpham['slide_1']!='') { ?>
                                                            <li class="product-thumb" style="float: left; display: block; width: 95px;">
                                                                <a href="javascript:" data-image="<?=$sanpham['slide_1']?>" data-zoom-image="<?=$sanpham['slide_1']?>">
                                                                    <img alt="$sanpham['name']" data-image="<?=$sanpham['slide_1']?>" src="<?=$sanpham['slide_1']?>" draggable="false">
                                                                </a>
                                                            </li>
                                                            <?php } ?>
                                                            <?php if ($sanpham['slide_2']!='') { ?>
                                                            <li class="product-thumb" style="float: left; display: block; width: 95px;">
                                                                <a href="javascript:" data-image="<?=$sanpham['slide_2']?>" data-zoom-image="<?=$sanpham['slide_2']?>">
                                                                    <img alt="$sanpham['name']" data-image="<?=$sanpham['slide_2']?>" src="<?=$sanpham['slide_2']?>" draggable="false">
                                                                </a>
                                                            </li>
                                                            <?php } ?>
                                                            <?php if ($sanpham['slide_3']!='') { ?>
                                                            <li class="product-thumb" style="float: left; display: block; width: 95px;">
                                                                <a href="javascript:" data-image="<?=$sanpham['slide_3']?>" data-zoom-image="<?=$sanpham['slide_3']?>">
                                                                    <img alt="$sanpham['name']" data-image="<?=$sanpham['slide_3']?>" src="<?=$sanpham['slide_3']?>" draggable="false">
                                                                </a>
                                                            </li>
                                                            <?php } ?>

                                                        </ul>
                                                    </div>
                                                    <ul class="flex-direction-nav">
                                                        <li><a class="flex-prev flex-disabled" href="javascript:" tabindex="-1">Previous</a></li>
                                                        <li><a class="flex-next" href="javascript:">Next</a></li>
                                                    </ul>
                                                </div>



                                            </div>

                                        </div>

                                        <style>
                                            .product-table {
                                                margin: 10px 0;
                                            }

                                            .product-table td {
                                                border: none;
                                                padding: 5px 0px;
                                            }

                                            .product-table td:last-child {
                                                border-left: 1px solid gray;
                                            }

                                            .product-table td div {
                                                display: flex;
                                                justify-content: space-between;
                                            }

                                            @media (max-width: 768px) {
                                                .product-table td div {
                                                    display: block;
                                                }
                                                .product-table td div label {
                                                    width: 100%;
                                                }
                                                .product-table td {
                                                    width: 50%;
                                                }
                                                .product-table td:last-child {
                                                    border-left: 1px solid gray;
                                                }
                                            }

                                            .product-table td span {
                                                /* margin: 0 0 0 auto; */
                                                padding-right: 20px;
                                                font-weight: bold;
                                                color: red;
                                            }

                                            .product-table td label {
                                                /* margin: 0 0 0 auto; */
                                                font-weight: normal;
                                            }

                                            .product-table td:last-child span {
                                                color: green;
                                            }

                                            .product-giadat {
                                                padding: 10px 0 20px 0;
                                            }

                                            .product-giadat b {
                                                padding-right: 30px;
                                            }

                                            .product-giadat input {
                                                height: 35px;
                                                width: 127px;
                                                font-size: 1em;
                                                margin: 0;
                                                padding: 0 2px;
                                                text-align: center;
                                                background: #fff;
                                                min-height: unset;
                                                box-shadow: none;
                                                border-radius: 0px;
                                                border: 1px solid #e5e5e5;
                                            }
                                            /* Chrome, Safari, Edge, Opera */

                                            .product-giadat input::-webkit-outer-spin-button,
                                            .product-giadat input::-webkit-inner-spin-button {
                                                -webkit-appearance: none;
                                                margin: 0;
                                            }
                                            /* Firefox */

                                            .product-giadat input[type=number] {
                                                -moz-appearance: textfield;
                                            }

                                            .product-giadat i {
                                                padding-left: 30px;
                                            }

                                            @media (max-width: 576px) {
                                                .product-giadat {
                                                    padding: 10px 0 10px 0;
                                                }
                                                .product-giadat i {
                                                    display: block;
                                                    padding-left: 0px;
                                                    padding-top: 10px;
                                                }
                                            }

                                            .product-soluong {
                                                padding: 0;
                                                margin-bottom: 20px;
                                            }

                                            .product-soluong b {
                                                padding-right: 46px;
                                            }

                                            .product-soluong input {
                                                width: 100px;
                                            }

                                            .product-soluong {
                                                display: flex;
                                                align-items: center;
                                                height: 40px;
                                                margin-bottom: 15px;
                                            }

                                            .product-soluong label {
                                                font-weight: 500;
                                                color: #1c1c1c;
                                                min-width: 100px;
                                                float: left;
                                                letter-spacing: 0.5px;
                                            }

                                            .product-soluong .custom-btn-numbers {
                                                float: left;
                                                box-shadow: none;
                                                padding: 0;
                                                border-radius: 0;
                                                border: 1px solid #e5e5e5;
                                                min-height: unset;
                                                width: auto;
                                                background-color: transparent;
                                                height: auto;
                                            }

                                            .product-soluong .custom-btn-numbers .btn-cts {
                                                font-size: 20px;
                                                line-height: 0px;
                                                border: none;
                                                display: inline-block;
                                                width: 35px;
                                                height: 35px;
                                                background: #fff;
                                                float: left;
                                                color: #333;
                                                text-align: center;
                                                padding: 0px;
                                                border-radius: 0;
                                            }

                                            .product-soluong .custom-btn-numbers #qty {
                                                height: 35px;
                                                font-size: 1em;
                                                margin: 0;
                                                width: 55px;
                                                padding: 0 2px;
                                                text-align: center;
                                                background: #fff;
                                                min-height: unset;
                                                display: block;
                                                float: left;
                                                box-shadow: none;
                                                border-radius: 0px;
                                                border: none;
                                            }

                                            .product-soluong input::-webkit-outer-spin-button,
                                            .product-soluong input::-webkit-inner-spin-button {
                                                -webkit-appearance: none;
                                                margin: 0;
                                            }
                                            /* Firefox */

                                            .product-soluong input[type=number] {
                                                -moz-appearance: textfield;
                                            }
                                        </style>

                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                            <div class="product-title">
                                                <h1><?=$sanpham['name']?></h1>
                                                <!-- <span id="pro_sku">Mã SP: <b>RS4903367093097</b></span> -->
                                            </div>
                                            <table class="product-table">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <label class="lb1">Giá bán:</label> <span class="pro-price"><?=number_format($spphien['gia_san'])?>đ</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <!-- <label class="lb1">Giá đặt cao nhất:</label> <span class="pro-price"> -->
                                                                <?php
                                                                // if ($spphien['caonhat']>0) {
                                                                //     echo number_format($spphien['caonhat']).' đ';
                                                                // }else{
                                                                //     echo '-';
                                                                // }
                                                                ?>
                                                            <!-- </span> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <label class="lb1">Giá shop:</label> <span class="pro-price">
                                                                <?php if ($spphien['gia_st']>0) {
                                                                    echo number_format($spphien['gia_st']).' đ';
                                                                }else{
                                                                    echo '-';
                                                                } ?>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <!-- <label class="lb1">Giá đặt thấp nhất:</label> <span class="pro-price"> -->
                                                                <?php
                                                                // if ($spphien['thapnhat']>0) {
                                                                //     echo number_format($spphien['thapnhat']).' đ';
                                                                // }else{
                                                                //     echo '-';
                                                                // }
                                                                ?>
                                                            <!-- </span> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <label class="lb1">Số sản phẩm:</label> <span class="pro-price"><?=$spphien['so_luong']?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <label class="lb1">Số khách đã đặt:</label> <span class="pro-price">
                                                                <?php if ($spphien['total']>0) {
                                                                    echo number_format($spphien['total']);
                                                                }else{
                                                                    echo '-';
                                                                } ?>

                                                                </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <label class="lb1">Hạn chót: </label><span class="pro-price" id="dem"></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <label class="lb1">Số lượng đã đặt:</label>
                                                            <span class="pro-price">
                                                                <?php if ($spphien['soluong']>0) {
                                                                    echo number_format($spphien['soluong']);
                                                                }else{
                                                                    echo '-';
                                                                } ?>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <script>
                                              var countDownDate = new Date("<?=$spphien['date_end']?>").getTime();

                                              // Update the count down every 1 second
                                              var x = setInterval(function() {

                                                  // Get todays date and time
                                                  var now = new Date().getTime();

                                                  // Find the distance between now an the count down date
                                                  var distance = countDownDate - now;

                                                  // Time calculations for days, hours, minutes and seconds
                                                  var day = Math.floor((distance) / (24*3600*1000));
                                                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                  // Output the result in an element with id="demo"
                                                  document.getElementById("dem").innerHTML =day+"d "+ hours + "h "
                                                  + minutes + "m " + seconds + "s ";

                                                  // If the count down is over, write some text
                                                  if (distance < 0) {
                                                      clearInterval(x);
                                                      document.getElementById("dem").innerHTML = "KẾT THÚC";
                                                  }
                                              }, 1000);

                                              </script>
                                            <!-- <form id="add-item-form" action="/cart/add" method="post" class="variants clearfix"> -->
                                                <input type="hidden" id="giasan" value="<?=$spphien['gia_san']?>">
                                                <!-- <div class="product-giadat"><b>GIÁ BẠN ĐẶT</b> <input type="text" onkeyup="javascript:this.value=comma(this.value);" id="giadat"> <i>(giá đặt > Giá bán)</i></div> -->
                                                <div class="row">
                                                    <table style="margin-left:12px">
                                                        <tr>
                                                            <td width="50%">
                                                                <label style="margin-top:10px"><b>SỐ LƯỢNG</b></label>
                                                                <div class="product-soluong">
                                                                    <!-- <b>SỐ LƯỢNG</b><br><br> -->
                                                                    <div class="custom custom-btn-numbers form-control">
                                                                        <button onclick="giam()" class="btn-minus btn-cts" type="button">–</button>
                                                                        <input type="number" class="qty input-text" id="qty" name="quantity" size="4" value="1" maxlength="3" max="100" min="1">
                                                                        <button onclick="tang()" class="btn-plus btn-cts" type="button">+</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label style="margin-top:3px"><b>SỐ TIỀN</b></label>
                                                                <div class="product-giadat" style="padding-top:0px">
                                                                    <!-- <b>SỐ TIỀN</b> -->
                                                                    <input type="text" value="<?=number_format($spphien['gia_san'])?>"
                                                                    onkeyup="javascript:this.value=comma(this.value);" id="giadat" style="width:137px; height:37px">
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </table>


                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button  class="btn-detail btn-color-add" onclick="addphieu(<?=$phien?>,<?=$sanpham['id']?>)" name="add" style="width: 100%; padding: 10px 30px; height: auto;">
                                                         Thêm vào giỏ đặt <br>
                                                        </button>
                                                        <center><small><i>Bấm xem <a href="blog/cách-dạt-hang" style="color:red;">CÁCH ĐẶT HÀNG</a></i></small></center>
                                                    </div>
                                                </div>
                                            <!-- </form> -->

                                            <div class="pt20">
                                                <!-- Begin tags -->
                                                <!-- <div class="tag-wrapper">
                                                    <label>
                      Tags:
                   </label>
                                                    <ul class="tags">

                                                        <li class="active">
                                                            <a href="#">trang trí</a>
                                                        </li>

                                                    </ul>
                                                </div> -->
                                                <!-- End tags -->
                                            </div>


                                            <div class="pt20">
                                                <!-- Begin social icons -->
                                                <div class="addthis_toolbox addthis_default_style ">

                                                    <div class="info-socials-article clearfix">
                                                        <div class="box-like-socials-article">
                                                            <div class="fb-send" data-href="<?=HOME.'/'.$thisurl?>">
                                                            </div>
                                                        </div>
                                                        <div class="box-like-socials-article">
                                                            <div class="fb-like fb_iframe_widget" data-href="<?=HOME.'/'.$thisurl?>" data-layout="button_count" data-action="like" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=0&amp;href=https%3A%2F%2Fdefault-furniture.myharavan.com%2Fproducts%2Ftuong-xe-vespa-lavanto&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 90px; height: 28px;"><iframe name="fb8a84e474c924" width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://web.facebook.com/v2.0/plugins/like.php?action=like&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df1b9a36ef419bec%26domain%3Ddefault-furniture.myharavan.com%26origin%3Dhttps%253A%252F%252Fdefault-furniture.myharavan.com%252Ff32623f91f19748%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fdefault-furniture.myharavan.com%2Fproducts%2Ftuong-xe-vespa-lavanto&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey" class="" style="border: none; visibility: visible; width: 90px; height: 28px;"></iframe></span></div>
                                                        </div>
                                                        <div class="box-like-socials-article">
                                                            <div class="fb-share-button fb_iframe_widget" data-href="<?=HOME.'/'.$thisurl?>" data-layout="button_count" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;href=https%3A%2F%2Fdefault-furniture.myharavan.com%2Fproducts%2Ftuong-xe-vespa-lavanto&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 0px; height: 0px;"><iframe name="f356a3aa271fe" width="1000px" height="1000px" data-testid="fb:share_button Facebook Social Plugin" title="fb:share_button Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://web.facebook.com/v2.0/plugins/share_button.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df1dcfa39bbe3334%26domain%3Ddefault-furniture.myharavan.com%26origin%3Dhttps%253A%252F%252Fdefault-furniture.myharavan.com%252Ff32623f91f19748%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fdefault-furniture.myharavan.com%2Fproducts%2Ftuong-xe-vespa-lavanto&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey" class="" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe></span></div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!-- End social icons -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                                            <div role="tabpanel" class="product-comment">
                                                <!-- Nav tabs -->
                                                <ul class="nav visible-lg visible-md" role="tablist">
                                                    <li role="presentation" class="active"><a data-spy="scroll" data-target="#mota" href="#mota" aria-controls="mota" role="tab">Mô tả sản phẩm</a></li>

                                                    <li role="presentation">
                                                        <a data-spy="scroll" href="#binhluan" aria-controls="binhluan" role="tab">Bình luận</a>
                                                    </li>


                                                    <li role="presentation">
                                                        <a data-spy="scroll" href="#like" aria-controls="like" role="tab">Sản phẩm khác</a>
                                                    </li>

                                                </ul>
                                                <!-- Tab panes -->

                                                <div id="mota">

                                                    <div class="title-bl visible-xs visible-sm">
                                                        <h2>Mô tả</h2>
                                                    </div>

                                                    <div class="product-description-wrapper">

                                                        <div class="rte">
                                                            <p align="center"><strong>THÔNG TIN SẢN PHẨM</strong></p>

                                                            <?=$sanpham['noi_dung']?>

                                                        </div>

                                                    </div>
                                                </div>

                                                <div id="binhluan">
                                                    <div class="title-bl">
                                                        <h2>Bình luận</h2>
                                                    </div>
                                                    <div class="product-comment-fb">
                                                        <div class="fb-comments" data-href="<?=HOME.'/'.$thisurl?>" data-width="100%" data-numposts="5"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12  list-like">
                                    <div id="like">
                                        <div class="title-like">
                                            <h2>Sản phẩm khác</h2>
                                        </div>
                                        <div class="row product-list ">
                                            <div class="content-product-list">
                                              <?php foreach ($cungdanhmuc as  $value) { ?>
                                                <div class="col-md-3 col-sm-6 col-xs-12 pro-loop">
                                                    <div class="product-block product-resize fixheight" style="height: 266px;">
                                                        <div class="product-img image-resize view view-third" style="height: 174px;">
                                                            <a href="product/<?=$value['url']?>?phien=<?=$value['id']?>" title="<?=$value['name']?>">
                                                                <img class="first-image  has-img" alt=" <?=$value['name']?> " src="<?=$value['hinhanh']?>" style="height: 174px;object-fit: cover;">

                                                                <img class="second-image" src="<?=$value['hinhanh1']?>" alt=" <?=$value['name']?>" style="height: 174px;object-fit: cover;">

                                                            </a>
                                                            <div class="actionss">
                                                                <div class="btn-cart-products">
                                                                    <a href="javascript:void(0);">
                                                                        <!-- <a href="javascript:void(0);" onclick="add_item_show_modalCart(1009791479)"> -->
                                                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                               <!--  <div class="view-details">
                                                                    <a href="product-details.html" class="view-detail">
                                                                        <span><i class="fa fa-clone"> </i></span>
                                                                    </a>
                                                                </div> -->
                                                                <div class="btn-quickview-products">
                                                                    <a href="product/<?=$value['url']?>?phien=<?=$value['id']?>" class="quickview" data-handle="product/<?=$value['url']?>?phien=<?=$value['id']?>"><i class="fa fa-eye"></i></a>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="product-detail clearfix">


                                                            <!-- sử dụng pull-left -->
                                                            <h3 class="pro-name"><a href="product/<?=$value['url']?>?phien=<?=$value['id']?>" title="<?=$value['name']?>"><?=$value['name']?> </a></h3>
                                                            <div class="pro-prices">
                                                                <p class="pro-price"><?=number_format($value['gia_san'])?>₫</p>
                                                                <p class="pro-price-del text-left"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              <?php } ?>

                                            </div>
                                        </div>
                                        <script>
                                            var add_to_wishlist = function() {
                                                if (typeof(Storage) !== "undefined") {
                                                    if (localStorage.recently_viewed) {

                                                        if (localStorage.recently_viewed.indexOf('1st-birthday-princess-basic-party-kit-18-guests') == -1)
                                                            localStorage.recently_viewed = '1st-birthday-princess-basic-party-kit-18-guests_' + localStorage.recently_viewed;

                                                    } else
                                                        localStorage.recently_viewed = '1st-birthday-princess-basic-party-kit-18-guests';
                                                } else {
                                                    console.log('Your Browser does not support storage!');
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <script>
                            $(".product-thumb img").click(function() {
                                $(".product-thumb").removeClass('active');
                                $(this).parents('li').addClass('active');
                                $(".product-image-feature").attr("src", $(this).attr("data-image"));
                                $(".product-image-feature").attr("data-zoom-image", $(this).attr("data-zoom-image"));
                            });

                            $(".product-thumb").first().addClass('active');
                        </script>
                        <script>
                            $(document).ready(function() {
                                $('#add-to-cart').click(function(e) {
                                    e.preventDefault();
                                    $(this).addClass('clicked_buy');
                                    add_item_show_modalCart($('#product-select').val());
                                });
                                $('#buy-now').click(function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        type: 'POST',
                                        async: false,
                                        url: '/cart/add.js',
                                        async: false,
                                        data: $('form#add-item-form').serialize(),
                                        success: function(line) {
                                            window.location = "/checkout";
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            alert('Sản phẩm bạn vừa mua đã vượt quá tồn kho');
                                        }
                                    });
                                });
                            });
                        </script>

                        <script>
                            $(document).ready(function() {
                                $('a[data-spy=scroll]').click(function() {
                                    event.preventDefault();
                                    $('body').animate({
                                        scrollTop: ($($(this).attr('href')).offset().top - 20) + 'px'
                                    }, 500);
                                })
                            });

                            /**
                            function deleteCart(variant_id){
                               var params = {
                                  type: 'POST',
                                  url: '/cart/change.js',
                                  data: 'quantity=0&id=' + variant_id,
                                  dataType: 'json',
                                  success: function(cart) {
                                     if ((typeof callback) === 'function') {
                                        callback(cart);
                                     } else {

                                        getCartAjax();
                                     }
                                  },
                                  error: function(XMLHttpRequest, textStatus) {
                                     Haravan.onError(XMLHttpRequest, textStatus);
                                  }
                               };
                               jQuery.ajax(params);
                            }
                            **/
                            // The following piece of code can be ignored.
                            $(function() {
                                $(window).resize(function() {
                                    $('#info').text("Page width: " + $(this).width());
                                });
                                $(window).trigger('resize');
                            });


                            var selectCallback = function(variant, selector) {
                                if (variant && variant.available) {
                                    if (variant.featured_image != null) {
                                        $(".product-thumb").removeClass('active');
                                        $(".product-thumb img[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'master') + "']").click().parents('li').addClass('active');
                                    }
                                    if (variant.sku != null) {
                                        jQuery('#pro_sku').html('SKU: ' + variant.sku);
                                    }
                                    jQuery('#add-to-cart').removeAttr('disabled').removeClass('disabled').html("Thêm vào giỏ");;
                                    jQuery('#buy-now').removeAttr('disabled').removeClass('disabled').html("Mua ngay").show();

                                    if (variant.price < variant.compare_at_price) {
                                        jQuery('#price-preview').html("<span>" + Haravan.formatMoney(variant.price, "{{amount}}₫") + "</span><del>" + Haravan.formatMoney(variant.compare_at_price, "{{amount}}₫") + "</del>");
                                        var pro_sold = variant.price;
                                        var pro_comp = variant.compare_at_price / 100;
                                        var sale = 100 - (pro_sold / pro_comp);
                                        var kq_sale = Math.round(sale);
                                        jQuery('#surround .product-sale span').html("<label class='sale-lb'>- </label> " + kq_sale + '%');
                                    } else {
                                        jQuery('#price-preview').html("<span>" + Haravan.formatMoney(variant.price, "{{amount}}₫" + "</span>"));
                                    }

                                } else {
                                    jQuery('#add-to-cart').addClass('disabled').attr('disabled', 'disabled').html("Hết hàng");
                                    jQuery('#buy-now').addClass('disabled').attr('disabled', 'disabled').html("Hết hàng").hide();
                                    var message = variant ? "Hết hàng" : "Không có hàng";
                                    jQuery('#price-preview').html("<span>" + message + "</span>");
                                }
                            };

                            jQuery(document).ready(function($) {

                                new Haravan.OptionSelectors("product-select", {
                                    product: {
                                        "available": true,
                                        "compare_at_price_max": 0.0,
                                        "compare_at_price_min": 0.0,
                                        "compare_at_price_varies": false,
                                        "compare_at_price": 0.0,
                                        "content": null,
                                        "description": "<p><span style=\"color: #000000;\" data-mce-style=\"color: #000000;\"><span style=\"font-family: Roboto, sans-serif; font-size: 12px; line-height: 20px;\" data-mce-style=\"font-family: Roboto, sans-serif; font-size: 12px; line-height: 20px;\">Chất liệu polyresin bền chắc, trọng lượng nhẹ.&nbsp;</span><span style=\"font-family: Roboto, sans-serif; font-size: 12px; line-height: 20px;\" data-mce-style=\"font-family: Roboto, sans-serif; font-size: 12px; line-height: 20px;\">&nbsp;Thiết kế độc đáo, tinh xảo.&nbsp;</span><span style=\"font-family: Roboto, sans-serif; font-size: 12px; line-height: 20px;\" data-mce-style=\"font-family: Roboto, sans-serif; font-size: 12px; line-height: 20px;\">Thích hợp dùng để trang trí&nbsp;hoặc làm quà tặng.<br><br></span>Thông số sản phẩm:</span><br><br></p><table class=\"table table-bordered mce-item-table\" id=\"tblGeneralAttribute\" style=\"box-sizing: border-box; border-collapse: collapse; border-spacing: 0px; width: 100%; min-width: 500px; max-width: 100%; margin-bottom: 20px; border: 1px solid #eeeeee; color: #333333; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\" data-mce-style=\"box-sizing: border-box; border-collapse: collapse; border-spacing: 0px; width: 100%; min-width: 500px; max-width: 100%; margin-bottom: 20px; border: 1px solid #eeeeee; color: #333333; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\"><tbody style=\"box-sizing: border-box;\" data-mce-style=\"box-sizing: border-box;\"><tr class=\"row-info\" style=\"box-sizing: border-box;\" data-mce-style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 200px; background-color: #f7f7f7 !important;\" data-mce-style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 200px; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif; color: #000000;\" data-mce-style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif; color: #000000;\">Màu sắc</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee;\" data-mce-style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee;\"><span style=\"color: #000000;\" data-mce-style=\"color: #000000;\">Đỏ</span></td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\" data-mce-style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 200px; background-color: #f7f7f7 !important;\" data-mce-style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 200px; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif; color: #000000;\" data-mce-style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif; color: #000000;\">Chất liệu</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee;\" data-mce-style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee;\"><span style=\"color: #000000;\" data-mce-style=\"color: #000000;\">Polyresin</span></td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\" data-mce-style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 200px; background-color: #f7f7f7 !important;\" data-mce-style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 200px; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif; color: #000000;\" data-mce-style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif; color: #000000;\">Kích thước</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee;\" data-mce-style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee;\"><span style=\"color: #000000;\" data-mce-style=\"color: #000000;\">9,5 x 3,5 x 6 (cm)</span></td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\" data-mce-style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 200px; background-color: #f7f7f7 !important;\" data-mce-style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 200px; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif; color: #000000;\" data-mce-style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif; color: #000000;\">Xuất xứ</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee;\" data-mce-style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee;\"><span style=\"color: #000000;\" data-mce-style=\"color: #000000;\">Việt Nam</span></td></tr></tbody></table><p><span style=\"color: #000000;\" data-mce-style=\"color: #000000;\">Thông tin sản phẩm:</span><br><br><span style=\"color: #000000; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\" data-mce-style=\"color: #000000; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\">-&nbsp;Tượng xe Vespa Lavanto Home Décor (Đỏ)&nbsp;được làm từ chất liệu polyresin cứng chắc, bền đẹp. Trọng lượng nhẹ, bề mặt trơn nhẵn nên dễ dàng lau chùi khi bị bám bẩn. Độ bền màu cao và&nbsp;hạn chế trầy xước, cho thời gian sử dụng lâu dài.</span><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\" data-mce-style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\"><span style=\"color: #000000; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\" data-mce-style=\"color: #000000; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\">- Thiết kế tượng&nbsp;hình chiếc xe Vespa&nbsp;ngộ nghĩnh, độc đáo. Màu sắc bắt mắt&nbsp;cùng&nbsp;đường nét&nbsp;sống động như thật, góp phần mang đến vẻ mới lạ, tươi vui&nbsp;cho không gian trưng bày.</span><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\" data-mce-style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\"><span style=\"color: #000000; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\" data-mce-style=\"color: #000000; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\">- Tượng&nbsp;thích hợp dùng để trang trí phòng khách, phòng ngủ, văn phòng làm việc và còn&nbsp;là món quà ý nghĩa dành tặng người thân, bạn bè.</span><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\" data-mce-style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\"><span style=\"color: #000000; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\" data-mce-style=\"color: #000000; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px;\">- Sản phẩm được sản xuất theo công nghệ tiên tiến, mang đậm phong cách của nghệ thuật điêu khắc tạo hình, đảm bảo tính thẩm mỹ cao và giá trị sử dụng lâu dài.</span></p>",
                                        "featured_image": "https://product.hstatic.net/1000150336/product/upload_c17c7ead06b64331bf89053b2e1ad345.jpg",
                                        "handle": "tuong-xe-vespa-lavanto",
                                        "id": 1003873612,
                                        "images": ["https://product.hstatic.net/1000150336/product/upload_c17c7ead06b64331bf89053b2e1ad345.jpg", "https://product.hstatic.net/1000150336/product/upload_58976ff07b1c4fbaa383dda2ac7694da.jpg", "https://product.hstatic.net/1000150336/product/upload_d306b46b023b43839cec4e33d5675b89.jpg", "https://product.hstatic.net/1000150336/product/upload_464dc12942eb4e0f841b0cd326db622a.jpg", "https://product.hstatic.net/1000150336/product/upload_af301aa03ac24593ac52e08cf517ed06.jpg", "https://product.hstatic.net/1000150336/product/upload_6b7b5503548e4579bd83175297de6bf4.jpg"],
                                        "options": ["Kích thước", "Màu sắc"],
                                        "price": 46000000.0,
                                        "price_max": 46000000.0,
                                        "price_min": 46000000.0,
                                        "price_varies": false,
                                        "tags": ["trang trí"],
                                        "template_suffix": null,
                                        "title": "Tượng xe Vespa Lavanto",
                                        "type": "Trang trí",
                                        "url": "<?=HOME.'/'.$thisurl?>",
                                        "pagetitle": "Tượng xe Vespa Lavanto",
                                        "metadescription": "Chất liệu polyresin bền chắc, trọng lượng nhẹ.  Thiết kế độc đáo, tinh xảo. Thích hợp dùng để trang trí hoặc làm quà tặng.\n\nThông số sản phẩm:\n\nMàu sắc\tĐỏ\nChất",
                                        "variants": [{
                                            "id": 1009791633,
                                            "barcode": null,
                                            "available": true,
                                            "price": 46000000.0,
                                            "sku": "SF004-1",
                                            "option1": "S",
                                            "option2": "Đỏ",
                                            "option3": "",
                                            "options": ["S", "Đỏ"],
                                            "inventory_quantity": 1,
                                            "old_inventory_quantity": 1,
                                            "title": "S / Đỏ",
                                            "weight": 0.0,
                                            "compare_at_price": 0.0,
                                            "inventory_management": null,
                                            "inventory_policy": "deny",
                                            "selected": false,
                                            "url": null,
                                            "featured_image": {
                                                "id": 1035543732,
                                                "created_at": "0001-01-01T00:00:00",
                                                "position": 1,
                                                "product_id": 1003873612,
                                                "updated_at": "0001-01-01T00:00:00",
                                                "src": "https://product.hstatic.net/1000150336/product/upload_c17c7ead06b64331bf89053b2e1ad345.jpg",
                                                "variant_ids": [1009791633, 1009791636]
                                            }
                                        }, {
                                            "id": 1009791635,
                                            "barcode": null,
                                            "available": true,
                                            "price": 46000000.0,
                                            "sku": "SF004-2",
                                            "option1": "S",
                                            "option2": "Trắng",
                                            "option3": "",
                                            "options": ["S", "Trắng"],
                                            "inventory_quantity": 1,
                                            "old_inventory_quantity": 1,
                                            "title": "S / Trắng",
                                            "weight": 0.0,
                                            "compare_at_price": 0.0,
                                            "inventory_management": null,
                                            "inventory_policy": "deny",
                                            "selected": false,
                                            "url": null,
                                            "featured_image": {
                                                "id": 1035543739,
                                                "created_at": "0001-01-01T00:00:00",
                                                "position": 5,
                                                "product_id": 1003873612,
                                                "updated_at": "0001-01-01T00:00:00",
                                                "src": "https://product.hstatic.net/1000150336/product/upload_af301aa03ac24593ac52e08cf517ed06.jpg",
                                                "variant_ids": [1009791635, 1009791637]
                                            }
                                        }, {
                                            "id": 1009791636,
                                            "barcode": null,
                                            "available": true,
                                            "price": 46000000.0,
                                            "sku": "SF004-3",
                                            "option1": "M",
                                            "option2": "Đỏ",
                                            "option3": "",
                                            "options": ["M", "Đỏ"],
                                            "inventory_quantity": 1,
                                            "old_inventory_quantity": 1,
                                            "title": "M / Đỏ",
                                            "weight": 0.0,
                                            "compare_at_price": 0.0,
                                            "inventory_management": null,
                                            "inventory_policy": "deny",
                                            "selected": false,
                                            "url": null,
                                            "featured_image": {
                                                "id": 1035543732,
                                                "created_at": "0001-01-01T00:00:00",
                                                "position": 1,
                                                "product_id": 1003873612,
                                                "updated_at": "0001-01-01T00:00:00",
                                                "src": "https://product.hstatic.net/1000150336/product/upload_c17c7ead06b64331bf89053b2e1ad345.jpg",
                                                "variant_ids": [1009791633, 1009791636]
                                            }
                                        }, {
                                            "id": 1009791637,
                                            "barcode": null,
                                            "available": true,
                                            "price": 46000000.0,
                                            "sku": "SF004-4",
                                            "option1": "M",
                                            "option2": "Trắng",
                                            "option3": "",
                                            "options": ["M", "Trắng"],
                                            "inventory_quantity": 1,
                                            "old_inventory_quantity": 1,
                                            "title": "M / Trắng",
                                            "weight": 0.0,
                                            "compare_at_price": 0.0,
                                            "inventory_management": null,
                                            "inventory_policy": "deny",
                                            "selected": false,
                                            "url": null,
                                            "featured_image": {
                                                "id": 1035543739,
                                                "created_at": "0001-01-01T00:00:00",
                                                "position": 5,
                                                "product_id": 1003873612,
                                                "updated_at": "0001-01-01T00:00:00",
                                                "src": "https://product.hstatic.net/1000150336/product/upload_af301aa03ac24593ac52e08cf517ed06.jpg",
                                                "variant_ids": [1009791635, 1009791637]
                                            }
                                        }],
                                        "vendor": "HPSG",
                                        "published_at": "2016-12-21T04:01:56.239Z",
                                        "created_at": "2016-12-21T04:01:57.237Z",
                                        "not_allow_promotion": false
                                    },
                                    onVariantSelected: selectCallback
                                });

                                // Add label if only one product option and it isn't 'Title'.


                                // Auto-select first available variant on page load.
                                $('.single-option-selector:eq(0)').val("S").trigger('change');

                                $('.single-option-selector:eq(1)').val("Đỏ").trigger('change');

                                $('.selector-wrapper select').each(function() {
                                    $(this).wrap('<span class="custom-dropdown custom-dropdown--white"></span>');
                                    $(this).addClass("custom-dropdown__select custom-dropdown__select--white");
                                });
                            });
                        </script>

                        <script>
                            $(document).ready(function() {
                                if ($(".slides .product-thumb").length > 4) {
                                    $('#sliderproduct').flexslider({
                                        animation: "slide",
                                        controlNav: false,
                                        animationLoop: false,
                                        slideshow: false,
                                        itemWidth: 95,
                                        itemMargin: 10,
                                    });
                                }
                                if ($(window).width() > 960) {
                                    jQuery(".product-image-feature").elevateZoom({
                                        gallery: 'sliderproduct',
                                        scrollZoom: true
                                    });
                                } else {

                                }
                                jQuery('.slide-next').click(function() {
                                    if ($(".product-thumb.active").prev().length > 0) {
                                        $(".product-thumb.active").prev().find('img').click();
                                    } else {
                                        $(".product-thumb:last img").click();
                                    }
                                });
                                jQuery('.slide-prev').click(function() {
                                    if ($(".product-thumb.active").next().length > 0) {
                                        $(".product-thumb.active").next().find('img').click();
                                    } else {
                                        $(".product-thumb:first img").click();
                                    }
                                });
                            });
                        </script>

                    </div>
                </section>
<?php }else{
    echo '<div class="container">';
    echo "<center><h1>Nội dung đang được cập nhập</h1></center>";
    echo '<a href="'.HOME.'" class="btn btn-primary btn-lg btn-block">Về trang chủ</a>';
    echo '</div>';
} ?>
<script>
    function giam(){
        var dongia = <?=$spphien['gia_san']?>;
        var result = document.getElementById('qty');
        var qty = result.value;
        var giadat = document.getElementById('giadat');
        var gia =  parseInt(giadat.value.replace(/,/g, ''));
         if( !isNaN(qty) && (qty > 1) )
         {
             result.value--;
             gia=gia-dongia;
             giadat.value = comma(gia);
         }

         return false;
    }
    function tang(){
        var dongia = <?=$spphien['gia_san']?>;
        var result = document.getElementById('qty');
        var qty = result.value;
        var giadat = document.getElementById('giadat');
        var gia =  parseInt(giadat.value.replace(/,/g, ''));
        if( !isNaN(qty))
        {
            result.value++;
            gia=gia+dongia;
            giadat.value = comma(gia);
        }

        return false;
    }
</script>
