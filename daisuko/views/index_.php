<?php
$banner = $data->getbanner();
$banner1 = $data->getbanner1();
$banner2 = $data->getbanner2();
$sanphammoi = $data->getsanphammoi();
$banchay = $data->banchay();
$clc = $data->getsanphamclc();
$danhmuc = $data->danhmucsp();
$daugia = $data->daugia();
$hangthanhly = $data->gethangthanhly();
$thucphamsach = $data->getthucphamsach();
?>
<style type="text/css">
    @media only screen and (max-width: 600px) {
        .info-product-home td {
            font-size: 12px;
        }

        .pro-price {
            font-size: 12px !important;
        }

    }
</style>
<!-- Begin slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php foreach ($banner as $key => $value) {
            if ($key == 0) {
                echo '<li data-target="#myCarousel" data-slide-to="' . $key . '" class="active"></li>';
            } else {
                echo '<li data-target="#myCarousel" data-slide-to="' . $key . '"></li>';
            }
        } ?>
        <!--  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li> -->
    </ol>
    <style>
        .hrv-caption-inner.fix {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hrv-title1 {
            color: #000;
            font-size: 30px;
        }

        .hrv-title2 {
            color: #fff;
            font-size: 30px;
            line-height: 35px;
            margin-bottom: 15px;
            letter-spacing: 2px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .hrv-url {
            color: #fff;
        }

        .pro-price {
            float: right;
        }

        @media only screen and (max-width: 600px) {
            .fixheight {
                height: 350px !important;
            }

            .hrv-title1 {
                font-size: 13px;
            }

            .hrv-title2 {
                font-size: 14px;
                line-height: 18px;
            }
        }
    </style>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php foreach ($banner as $key => $value) {
            if ($key == 0)
                $active = "active";
            else
                $active = "";
        ?>
            <div class="item <?= $active ?> ">
                <img src="<?= $value['hinh_anh'] ?>" alt="<?= $value['name'] ?>" style="width:100%;">
                <div id="hrv-banner-caption1" class="hrv-banner-caption hrv-caption" style="display: block;">
                    <div class="container">
                        <div class="hrv-caption-inner fix">
                            <div class="hrv-banner-content slider-1">
                                <h2 class="hrv-title1"><?= $value['name'] ?></h2>
                                <h3 class="hrv-title2"><?= $value['mo_ta'] ?></h3>
                                <!-- <a href="<?= $value['url'] ?>" class="hrv-url">Xem ngay</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- <div class="item">
                            <img src="https://hstatic.net/336/1000150336/1000203404/slideshow_2.jpg?v=24" alt="Chicago" style="width:100%;">
                            <div id="hrv-banner-caption2" class="hrv-banner-caption" style="display: block;">
                                <div class="container">
                                    <div class="hrv-caption-inner fix">
                                        <div class="hrv-banner-content slider-2">
                                            <h2 class="hrv-title1">Thiết kế đặc biệt</h2>
                                            <h3 class="hrv-title2">Salon gỗ sang trọng</h3>
                                            <a href="product.html" class="hrv-url">Xem ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <img src="https://hstatic.net/336/1000150336/1000203404/slideshow_3.jpg?v=24" alt="New york" style="width:100%;">
                            <div id="hrv-banner-caption3" class="hrv-banner-caption" style="display: block;">
                                <div class="container">
                                    <div class="hrv-caption-inner fix">
                                        <div class="hrv-banner-content slider-3">
                                            <h2 class="hrv-title1">Tháng vàng ưu đãi</h2>
                                            <h3 class="hrv-title2">Tiết kiệm đến 20%</h3>
                                            <a href="product.html" class="hrv-url">Xem ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
    </div>

    <!-- Left and right controls -->
    <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a> -->
</div>
</div>
<section id="content" class="clearfix container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Content-->
            <div class="product-list clearfix ">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <aside class="styled_header  use_icon ">
                            <h2 style="color: red;">Mời đặt giá</h2>
                            <h3>HÀNG KHUYẾN MẠI</h3>
                            <span class="icon"><img src="http://hstatic.net/336/1000150336/1000203404/icon_sale.png?v=24" alt="Newest trends"></span>
                        </aside>
                    </div>
                </div>
                <div class="row content-product-list products-resize">
                    <?php foreach ($hangthanhly as $key => $value) {
                    ?>
                        <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                            <div class="product-block product-resize fixheight" style="height: 267px;">
                                <div class="product-img image-resize view view-third" style="height: 175px;">
                                    <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="<?= $value['name'] ?>">
                                        <img class="first-image  has-img" alt=" <?= $value['name'] ?>" src="<?= $value['hinhanh'] ?>" style="height: 174px;object-fit: cover;">
                                        <img class="second-image" src="<?= $value['hinhanh1'] ?>" alt=" <?= $value['name'] ?> " style="height: 174px;object-fit: cover;">
                                    </a>
                                    <div class="actionss">
                                        <div class="btn-cart-products">
                                            <a href="javascript:void(0);" onclick="add_item_show_modalCart(1009791479)">
                                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="btn-quickview-products">
                                            <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" class="quickview" data-handle="product/<?= $value['url'] ?>"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detail clearfix">
                                    <!-- sử dụng pull-left -->
                                    <h3 class="pro-name"><a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="<?= $value['name'] ?>"><?= $value['name'] ?> </a></h3>
                                    <div class="pro-prices">
                                        <table class="info-product-home">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><img src="template/img/giasan.png" style="width: 10px;"> Giá sàn</td>
                                                <td><span class="pro-price"><?= number_format($value['gia_san']) ?>₫</span></td>
                                            </tr>
                                            <tr>
                                                <td><img src="template/img/sieuthi.png" style="width: 10px;"> Giá shop</td>
                                                <td><span class="pro-price"><?= number_format($value['gia_st']) ?>₫</span></td>
                                            </tr>
                                            <tr>
                                                <td><img src="template/img/timeleft.png" style="width: 10px;"> Còn lại</td>
                                                <td><span class="pro-price" id="dem3<?= $value['id'] ?>"></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-center"><a class="btn btn-success" href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" role="button">Đặt giá</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var countDownDate<?= $value['id'] ?> = new Date("<?= $value['date_end'] ?>").getTime();
                            var x<?= $value['id'] ?> = setInterval(function() {
                                var now<?= $value['id'] ?> = new Date().getTime();
                                var distance<?= $value['id'] ?> = countDownDate<?= $value['id'] ?> - now<?= $value['id'] ?>;
                                var day<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?>) / (24 * 3600 * 1000));
                                var hours<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60)) / 1000);

                                document.getElementById("dem3<?= $value['id'] ?>").innerHTML = day<?= $value['id'] ?> + "d" +
                                    hours<?= $value['id'] ?> + "h" +
                                    minutes<?= $value['id'] ?> + "m" + seconds<?= $value['id'] ?> + "s";

                                if (distance<?= $value['id'] ?> < 0) {
                                    clearInterval(x<?= $value['id'] ?>);
                                    document.getElementById("dem3<?= $value['id'] ?>").innerHTML = "Hết hạn";
                                }
                            }, 1000);
                        </script>
                    <?php } ?>
                </div>

                <div class="row">
                    <div class="col-lg-12 pull-center center ">
                        <a class="btn btn-readmore" href="product?k=4" role="button">Xem thêm</a>
                    </div>
                </div>
            </div>


            <div class="main-content">
                <!-- Sản phẩm trang chủ -->


                <!--Product loop-->
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="animation fade-in home-banner-1">
                            <a href="<?= $banner1['url'] ?>" target="_blank">
                                <aside class="banner-home-1" style="background: url(<?= $banner1['hinh_anh'] ?>);">
                                    <div class="divcontent"><span class="ad_banner_1"><?= $banner1['name'] ?></span>
                                        <span class="ad_banner_desc"><?= $banner1['mo_ta'] ?></span>
                                    </div>
                                    <div class="divstyle"></div>
                                </aside>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="product-list clearfix">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <aside class="styled_header  use_icon ">
                                <h3>Hàng nhập khẩu</h3>
                                <span class="icon"><img src="http://hstatic.net/336/1000150336/1000203404/icon_featured.png?v=24" alt=""></span>
                            </aside>
                        </div>
                    </div>
                    <!--Product loop-->
                    <div class="row content-product-list products-resize">
                        <?php foreach ($banchay as $key => $value) {

                        ?>
                            <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                <div class="product-block product-resize fixheight" style="height: 267px;">
                                    <div class="product-img image-resize view view-third" style="height: 175px;">
                                        <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="<?= $value['name'] ?>">
                                            <img class="first-image  has-img" alt=" <?= $value['name'] ?> " src="<?= $value['hinhanh'] ?>" style="height: 174px;object-fit: cover;">
                                            <img class="second-image" src="<?= $value['hinhanh1'] ?>" alt=" <?= $value['name'] ?>" style="height: 174px;object-fit: cover;">
                                        </a>
                                        <div class="actionss">
                                            <div class="btn-cart-products">
                                                <a href="javascript:void(0);" onclick="add_item_show_modalCart(1009791459)">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!-- <div class="btn-quickview-products">
                                                        <a href="javascript:void(0);" class="quickview" data-handle="/products/ban-sofa-thoi-trang-noguchi-home-furni"><i class="fa fa-eye"></i></a>
                                                    </div> -->
                                            <div class="btn-quickview-products">
                                                <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" class="quickview" data-handle="product/<?= $value['url'] ?>"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <!-- sử dụng pull-left -->
                                        <h3 class="pro-name"><a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="<?= $value['name'] ?>"><?= $value['name'] ?> </a></h3>
                                        <div class="pro-prices">
                                            <table class="info-product-home" style="width: 100%;">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/giasan.png" style="width: 10px;"> Giá sàn</td>
                                                    <td><span class="pro-price"><?= number_format($value['gia_san']) ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/sieuthi.png" style="width: 10px;"> Giá shop</td>
                                                    <td><span class="pro-price"><?= number_format($value['gia_st']) ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/timeleft.png" style="width: 10px;"> Còn lại</td>
                                                    <td><span class="pro-price" id="dem1<?= $value['id'] ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-center"><a class="btn btn-success" href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" role="button">Đặt giá</a></td>
                                                </tr>
                                            </table>
                                            <!-- <p class="pro-price">1,200,000₫</p>
                                                    <p class="pro-price-del text-left"></p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var countDownDate1<?= $value['id'] ?> = new Date("<?= $value['date_end'] ?>").getTime();
                                var x1<?= $value['id'] ?> = setInterval(function() {
                                    var now1<?= $value['id'] ?> = new Date().getTime();
                                    var distance1<?= $value['id'] ?> = countDownDate1<?= $value['id'] ?> - now1<?= $value['id'] ?>;
                                    var day1<?= $value['id'] ?> = Math.floor((distance1<?= $value['id'] ?>) / (24 * 3600 * 1000));
                                    var hours1<?= $value['id'] ?> = Math.floor((distance1<?= $value['id'] ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes1<?= $value['id'] ?> = Math.floor((distance1<?= $value['id'] ?> % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds1<?= $value['id'] ?> = Math.floor((distance1<?= $value['id'] ?> % (1000 * 60)) / 1000);

                                    document.getElementById("dem1<?= $value['id'] ?>").innerHTML = day1<?= $value['id'] ?> + "d" +
                                        hours1<?= $value['id'] ?> + "h" +
                                        minutes1<?= $value['id'] ?> + "m" + seconds1<?= $value['id'] ?> + "s";

                                    if (distance1<?= $value['id'] ?> < 0) {
                                        clearInterval(x1<?= $value['id'] ?>);
                                        document.getElementById("dem1<?= $value['id'] ?>").innerHTML = "Hết hạn";
                                    }
                                }, 1000);
                            </script>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12  pull-center center">
                            <a class="btn btn-readmore" href="product?k=2" role="button">Xem thêm</a>
                        </div>
                    </div>
                </div>

                <div class="banner-bottom">
                    <div class="row">
                        <?php foreach ($banner2 as $key => $value) { ?>
                            <div class="col-xs-12 col-sm-6 home-category-item-2">
                                <div class="block-home-category">
                                    <a href="<?= $value['url'] ?>" target="_blank">
                                        <img class="b-lazy b-   " src="<?= $value['hinh_anh'] ?>" alt="<?= $value['name'] ?>">
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <!--  <div class="col-xs-12 col-sm-6 home-category-item-3">
                                        <div class="block-home-category">
                                            <a href="collections/hot-products">
                                                <img class="b-lazy b-loaded" src="http://hstatic.net/336/1000150336/1000203404/block_home_category2.jpg?v=24" alt="Bộ ghế uống trà">
                                            </a>
                                        </div>
                                    </div> -->
                    </div>
                </div>

                <div class="product-list clearfix ">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <aside class="styled_header  use_icon ">
                                <h3>ThỰC PHẨM SẠCH</h3>
                                <span class="icon"><img src="http://hstatic.net/336/1000150336/1000203404/icon_sale.png?v=24" alt="Newest trends"></span>
                            </aside>
                        </div>
                    </div>
                    <div class="row content-product-list products-resize">
                        <?php foreach ($thucphamsach as $key => $value) {
                        ?>
                            <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                <div class="product-block product-resize fixheight" style="height: 267px;">
                                    <div class="product-img image-resize view view-third" style="height: 175px;">
                                        <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="<?= $value['name'] ?>">
                                            <img class="first-image  has-img" alt=" <?= $value['name'] ?>" src="<?= $value['hinhanh'] ?>" style="height: 174px;object-fit: cover;">
                                            <img class="second-image" src="<?= $value['hinhanh1'] ?>" alt=" <?= $value['name'] ?> " style="height: 174px;object-fit: cover;">
                                        </a>
                                        <div class="actionss">
                                            <div class="btn-cart-products">
                                                <a href="javascript:void(0);" onclick="add_item_show_modalCart(1009791479)">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="btn-quickview-products">
                                                <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" class="quickview" data-handle="product/<?= $value['url'] ?>"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <!-- sử dụng pull-left -->
                                        <h3 class="pro-name"><a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="<?= $value['name'] ?>"><?= $value['name'] ?> </a></h3>
                                        <div class="pro-prices">
                                            <table class="info-product-home">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/giasan.png" style="width: 10px;"> Giá sàn</td>
                                                    <td><span class="pro-price"><?= number_format($value['gia_san']) ?>₫</span></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/sieuthi.png" style="width: 10px;"> Giá shop</td>
                                                    <td><span class="pro-price"><?= number_format($value['gia_st']) ?>₫</span></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/timeleft.png" style="width: 10px;"> Còn lại</td>
                                                    <td><span class="pro-price" id="dem4<?= $value['id'] ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-center"><a class="btn btn-success" href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" role="button">Đặt giá</a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var countDownDate<?= $value['id'] ?> = new Date("<?= $value['date_end'] ?>").getTime();
                                var x<?= $value['id'] ?> = setInterval(function() {
                                    var now<?= $value['id'] ?> = new Date().getTime();
                                    var distance<?= $value['id'] ?> = countDownDate<?= $value['id'] ?> - now<?= $value['id'] ?>;
                                    var day<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?>) / (24 * 3600 * 1000));
                                    var hours<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60)) / 1000);

                                    document.getElementById("dem4<?= $value['id'] ?>").innerHTML = day<?= $value['id'] ?> + "d" +
                                        hours<?= $value['id'] ?> + "h" +
                                        minutes<?= $value['id'] ?> + "m" + seconds<?= $value['id'] ?> + "s";

                                    if (distance<?= $value['id'] ?> < 0) {
                                        clearInterval(x<?= $value['id'] ?>);
                                        document.getElementById("dem4<?= $value['id'] ?>").innerHTML = "Hết hạn";
                                    }
                                }, 1000);
                            </script>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 pull-center center ">
                            <a class="btn btn-readmore" href="product?k=5" role="button">Xem thêm</a>
                        </div>
                    </div>
                </div>

                <div class="product-list clearf2x ">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <aside class="styled_header  use_icon ">

                                <h3>Hàng Việt Nam chất lượng</h3>
                                <span class="icon"><img src="http://hstatic.net/336/1000150336/1000203404/icon_sale.png?v=24" alt="Newest trends"></span>
                            </aside>
                        </div>
                    </div>
                    <div class="row content-product-list products-resize">
                        <?php foreach ($sanphammoi as $key => $value) {
                        ?>
                            <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                <div class="product-block product-resize fixheight" style="height: 267px;">
                                    <div class="product-img image-resize view view-third" style="height: 175px;">
                                        <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="<?= $value['name'] ?>">
                                            <img class="first-image  has-img" alt=" <?= $value['name'] ?>" src="<?= $value['hinhanh'] ?>" style="height: 174px;object-fit: cover;">
                                            <img class="second-image" src="<?= $value['hinhanh1'] ?>" alt=" <?= $value['name'] ?> " style="height: 174px;object-fit: cover;">
                                        </a>
                                        <div class="actionss">
                                            <div class="btn-cart-products">
                                                <a href="javascript:void(0);" onclick="add_item_show_modalCart(1009791479)">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="btn-quickview-products">
                                                <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" class="quickview" data-handle="product/<?= $value['url'] ?>"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <!-- sử dụng pull-left -->
                                        <h3 class="pro-name"><a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="<?= $value['name'] ?>"><?= $value['name'] ?> </a></h3>
                                        <div class="pro-prices">
                                            <table class="info-product-home">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/giasan.png" style="width: 10px;"> Giá sàn</td>
                                                    <td><span class="pro-price"><?= number_format($value['gia_san']) ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/sieuthi.png" style="width: 10px;"> Giá shop</td>
                                                    <td><span class="pro-price"><?= number_format($value['gia_st']) ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/timeleft.png" style="width: 10px;"> Còn lại</td>
                                                    <td><span class="pro-price" id="dem<?= $value['id'] ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-center"><a class="btn btn-success" href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" role="button">Đặt giá</a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var countDownDate<?= $value['id'] ?> = new Date("<?= $value['date_end'] ?>").getTime();
                                var x<?= $value['id'] ?> = setInterval(function() {
                                    var now<?= $value['id'] ?> = new Date().getTime();
                                    var distance<?= $value['id'] ?> = countDownDate<?= $value['id'] ?> - now<?= $value['id'] ?>;
                                    var day<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?>) / (24 * 3600 * 1000));
                                    var hours<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60)) / 1000);

                                    document.getElementById("dem<?= $value['id'] ?>").innerHTML = day<?= $value['id'] ?> + "d" +
                                        hours<?= $value['id'] ?> + "h" +
                                        minutes<?= $value['id'] ?> + "m" + seconds<?= $value['id'] ?> + "s";

                                    if (distance<?= $value['id'] ?> < 0) {
                                        clearInterval(x<?= $value['id'] ?>);
                                        document.getElementById("dem<?= $value['id'] ?>").innerHTML = "Hết hạn";
                                    }
                                }, 1000);
                            </script>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 pull-center center ">
                            <a class="btn btn-readmore" href="product?k=1" role="button">Xem thêm</a>
                        </div>
                    </div>
                </div>

                <div class="product-list clearfix ">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <aside class="styled_header  use_icon ">
                                <h3>DỊCH VỤ - DU LỊCH - NGHỈ DƯỠNG</h3>
                                <span class="icon"><img src="http://hstatic.net/336/1000150336/1000203404/icon_sale.png?v=24" alt="Newest trends"></span>
                            </aside>
                        </div>
                    </div>
                    <div class="row content-product-list products-resize">
                        <?php foreach ($clc as $key => $value) {
                        ?>
                            <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                <div class="product-block product-resize fixheight" style="height: 267px;">
                                    <div class="product-img image-resize view view-third" style="height: 175px;">
                                        <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="<?= $value['name'] ?>">
                                            <img class="first-image  has-img" alt=" <?= $value['name'] ?>" src="<?= $value['hinhanh'] ?>" style="height: 174px;object-fit: cover;">
                                            <img class="second-image" src="<?= $value['hinhanh1'] ?>" alt=" <?= $value['name'] ?> " style="height: 174px;object-fit: cover;">
                                        </a>
                                        <div class="actionss">
                                            <div class="btn-cart-products">
                                                <a href="javascript:void(0);" onclick="add_item_show_modalCart(1009791479)">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="btn-quickview-products">
                                                <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" class="quickview" data-handle="product/<?= $value['url'] ?>"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <!-- sử dụng pull-left -->
                                        <h3 class="pro-name"><a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="<?= $value['name'] ?>"><?= $value['name'] ?> </a></h3>
                                        <div class="pro-prices">
                                            <table class="info-product-home">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/giasan.png" style="width: 10px;"> Giá sàn</td>
                                                    <td><span class="pro-price"><?= number_format($value['gia_san']) ?>₫</span></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/sieuthi.png" style="width: 10px;"> Giá shop</td>
                                                    <td><span class="pro-price"><?= number_format($value['gia_st']) ?>₫</span></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="template/img/timeleft.png" style="width: 10px;"> Còn lại</td>
                                                    <td><span class="pro-price" id="dem2<?= $value['id'] ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-center"><a class="btn btn-success" href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" role="button">Đặt giá</a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var countDownDate<?= $value['id'] ?> = new Date("<?= $value['date_end'] ?>").getTime();
                                var x<?= $value['id'] ?> = setInterval(function() {
                                    var now<?= $value['id'] ?> = new Date().getTime();
                                    var distance<?= $value['id'] ?> = countDownDate<?= $value['id'] ?> - now<?= $value['id'] ?>;
                                    var day<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?>) / (24 * 3600 * 1000));
                                    var hours<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds<?= $value['id'] ?> = Math.floor((distance<?= $value['id'] ?> % (1000 * 60)) / 1000);

                                    document.getElementById("dem2<?= $value['id'] ?>").innerHTML = day<?= $value['id'] ?> + "d" +
                                        hours<?= $value['id'] ?> + "h" +
                                        minutes<?= $value['id'] ?> + "m" + seconds<?= $value['id'] ?> + "s";

                                    if (distance<?= $value['id'] ?> < 0) {
                                        clearInterval(x<?= $value['id'] ?>);
                                        document.getElementById("dem2<?= $value['id'] ?>").innerHTML = "Hết hạn";
                                    }
                                }, 1000);
                            </script>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 pull-center center ">
                            <a class="btn btn-readmore" href="product?k=3" role="button">Xem thêm</a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end Content-->
        </div>
    </div>
</section>
