<?php
$k = isset($_GET['k']) ? $_GET['k'] : 0;
$sanpham = $data->getsanphamall($k);
$tongbv = count($sanpham);
$trang = isset($_GET['p']) ? $_GET['p'] : 1;
$sotrang = ceil($tongbv / 12);
$sanpham1 = $data->getsanphamall1($trang, $k);
$danhmucall = $data->danhmucsp();
$bannerqc = $data->getbannerqc();


?>
<style type="text/css">
    @media only screen and (max-width: 600px) {
        .info-product-home td {
            font-size: 12px;
        }

        .pro-price {
            font-size: 12px !important;
            float: right;
        }

        .wrapper-sticky {
            width: 0px !important;
        }

    }

    .pro-price {
        float: right;
    }
</style>
<div class="wrap-breadcrumb">
    <div class="clearfix container">
        <div class="row main-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                <ol class="breadcrumb breadcrumb-arrows">
                    <li><a href="<?= HOME ?>" target="_self">Trang chủ</a></li>
                    <li class="active"><span>Sản phẩm</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section id="content" class="clearfix container">
    <div class="row">
        <div id="collection" class="content-pages collection-page" data-sticky_parent="">
            <!-- Begin collection info -->
            <!-- Content-->
            <div class="col-lg-12 visible-sm visible-xs">
                <div class="visible-sm visible-xs">
                    <h1 class="title-sm">
                        <?php if ($k == 1) {
                            echo 'SẢN PHẨM OCOP VIỆT NAM';
                        } elseif ($k == 2) {
                            echo 'HÀNG NHẬP KHẨU';
                        } elseif ($k == 3) {
                            echo 'DỊCH VỤ - DU -LỊCH - NGHỈ DƯỠNG';
                        } elseif ($k == 4) {
                            echo 'HÀNG TỐT THANH LÝ';
                        } elseif ($k == 5) {
                            echo 'THỰC PHẨM SẠCH';
                        } else {
                            echo 'Tất cả sản phẩm';
                        }
                        if (count($sanpham1) == 0) {
                            echo ': Không tìm thấy sản phẩm giao dịch';
                        }
                        ?>
                    </h1>
                </div>
                <div class="filter-by-wrapper">
                    <div class="filter-by">
                        <div class="sort-filter-option navbar-inactive" id="navbar-inner">
                            <div class="filterBtn txtLeft btn-navbar-collection">
                                <span class="list-coll">
                                    <i class="fa fa-server" aria-hidden="true"></i>
                                    Danh mục
                                </span>
                            </div>
                        </div>
                        <!-- <div class="sort-filter-option js-promoteTooltip">
                                            <div class="filterBtn txtLeft showOverlay">
                                                <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                                                <span class="custom-dropdown custom-dropdown--white">
                                          <select class="sort-by custom-dropdown__select custom-dropdown__select--white">
                                             <option value="price-ascending">Giá: Tăng dần</option>
                                             <option value="price-descending">Giá: Giảm dần</option>
                                             <option value="title-ascending">Tên: A-Z</option>
                                             <option value="title-descending">Tên: Z-A</option>
                                             <option value="created-ascending">Cũ nhất</option>
                                             <option value="created-descending">Mới nhất</option>
                                             <option value="best-selling">Bán chạy nhất</option>
                                          </select>
                                       </span>
                                            </div>
                                        </div> -->
                    </div>
                </div>
            </div>
            <div class="wrapper-sticky" style="display: block; margin: auto; position: relative; float: left; inset: auto; vertical-align: top; height: 662px; width: 25%;">
                <div class="col-md-3 col-sm-12 col-xs-12 leftsidebar-col" data-sticky_column="" style="inset: 0px auto auto 0px; width: 242px; position: absolute;">
                    <div class="group_sidebar">
                        <div class="list-group navbar-inner ">
                            <div class="mega-left-title btn-navbar title-hidden-sm">
                                <h3 class="sb-title">Danh mục </h3>
                            </div>
                            <ul class="nav navs sidebar menu" id="cssmenu">
                                <?php foreach ($danhmucall as $key => $value) {
                                    $con = $data->getdanhmuccon($value['id']);
                                    if (count($con) > 0) { ?>
                                        <li class="item has-sub active first">
                                            <a href="product/1/<?= $value['url'] ?>">
                                                <span class="lbl"><?= $value['name'] ?></span>
                                                <span data-toggle="collapse" data-parent="#cssmenu" href="#sub-item-<?= $value['id'] ?>" class="sign drop-down">
                                                </span>
                                            </a>
                                            <ul class="nav children collapse" id="sub-item-<?= $value['id'] ?>">
                                                <?php foreach ($con as $item) { ?>
                                                    <li class="first">
                                                        <a href="product/1/<?= $item['url'] ?>" title="<?= $item['name'] ?>">
                                                            <span><?= $item['name'] ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } else { ?>
                                        <li class="item current active  ">
                                            <a href="product/1/<?= $value['url'] ?>">
                                                <span><?= $value['name'] ?></span>
                                            </a>
                                        </li>
                                <?php }
                                } ?>

                            </ul>
                        </div>
                        <!-- Banner quảng cáo -->
                        <div class="list-group_l banner-left hidden-sm hidden-xs">
                            <a href="<?= $bannerqc['url'] ?>">
                                <img src="<?= $bannerqc['hinh_anh'] ?>">
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
            <div class="content-col col-md-9 col-sm-12 col-xs-12" data-sticky_column="">
                <div class="row">
                    <div class="main-content">
                        <div class="col-md-12 hidden-sm hidden-xs">
                            <div class="sort-collection">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <h1>
                                            <?php if ($k == 1) {
                                                echo 'SẢN PHẨM OCOP VIỆT NAM';
                                            } elseif ($k == 2) {
                                                echo 'HÀNG NHẬP KHẨU';
                                            } elseif ($k == 3) {
                                                echo 'DỊCH VỤ - DU -LỊCH - NGHỈ DƯỠNG';
                                            } elseif ($k == 4) {
                                                echo 'HÀNG TỐT THANH LÝ';
                                            } elseif ($k == 5) {
                                                echo 'THỰC PHẨM SẠCH';
                                            } else {
                                                echo 'Tất cả sản phẩm';
                                            } ?>
                                        </h1>
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <div class="browse-tags">
                                                            <span>Sắp xếp theo:</span>
                                                            <span class="custom-dropdown custom-dropdown--white">
                                                   <select class="sort-by custom-dropdown__select custom-dropdown__select--white">
                                                      <option value="price-ascending">Giá: Tăng dần</option>
                                                      <option value="price-descending">Giá: Giảm dần</option>
                                                      <option value="title-ascending">Tên: A-Z</option>
                                                      <option value="title-descending">Tên: Z-A</option>
                                                      <option value="created-ascending">Cũ nhất</option>
                                                      <option value="created-descending">Mới nhất</option>
                                                      <option value="best-selling">Bán chạy nhất</option>
                                                   </select>
                                                </span>
                                                        </div>
                                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 content-product-list">
                            <div class="row product-list">
                                <?php foreach ($sanpham1 as $key => $value) {
                                ?>
                                    <div class="col-md-4  col-sm-6 col-xs-12 pro-loop">
                                        <div class="product-block product-resize fixheight" style="height: 304px;">
                                            <div class="product-img image-resize view view-third" style="height: 211px;">
                                                <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" title="Tượng xe Vespa Lavanto">
                                                    <img class="first-image  has-img" alt=" <?= $value['name'] ?> " src="<?= $value['hinhanh'] ?>" style="height: 174px;object-fit: cover;">
                                                    <img class="second-image" src="<?= $value['hinhanh1'] ?>" alt=" <?= $value['name'] ?>" style="height: 174px;object-fit: cover;">
                                                </a>
                                                <div class="actionss">
                                                    <div class="btn-cart-products">
                                                        <a href="javascript:void(0);" onclick="add_item_show_modalCart(1009791633)">
                                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                    <!--  <div class="view-details">
                                                                    <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>" class="view-detail">
                                                                        <span><i class="fa fa-clone"> </i></span>
                                                                    </a>
                                                                </div> -->
                                                    <div class="btn-quickview-products">
                                                        <a href="javascript:void(0);" class="quickview" data-handle="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>"><i class="fa fa-eye"></i></a>
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
                                                            <td><span class="pro-price"><?= number_format($value['gia_san']) ?>₫</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="template/img/sieuthi.png" style="width: 10px;"> Giá siêu thị</td>
                                                            <td><span class="pro-price"><?= number_format($value['gia_st']) ?>₫</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="template/img/timeleft.png" style="width: 10px;"> Còn</td>
                                                            <td><span class="pro-price" id="dem<?= $value['id'] ?>"></span></td>
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
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                            <div class="clearfix">
                                <div id="pagination" class="">
                                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                        <?php if ($trang > 1 && $sotrang > 1) {
                                            echo '<a class="prev fa fa-angle-left" href="product?p=' . ($trang - 1) . '&k=' . $k . '"><span>Trang trước</span></a>';
                                        } ?>

                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-center">
                                        <?php for ($i = 1; $i <= $sotrang; $i++) {
                                            if ($trang == $i) {
                                                echo '<span class="page-node current">' . $i . '</span>';
                                            } else {
                                                echo '<a class="page-node" href="product?p=' . $i . '&k=' . $k . '">' . $i . '</a>';
                                            }
                                        } ?>


                                        <!-- <a class="page-node" href="product?page=3">3</a> -->
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
                                        <?php if ($trang < $sotrang) {
                                            echo '<a class="pull-right next fa fa-angle-right" href="product?p=' . ($trang + 1) . '&k=' . $k . '"><span>Trang sau</span></a>';
                                        } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End collection info -->
            <!-- Begin no products -->
            <!-- End no products -->
        </div>
        <script>
            Haravan.queryParams = {};
            if (location.search.length) {
                for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
                    aKeyValue = aCouples[i].split('=');
                    if (aKeyValue.length > 1) {
                        Haravan.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
                    }
                }
            }
            var collFilters = jQuery('.coll-filter');
            collFilters.change(function() {
                var newTags = [];
                var newURL = '';
                delete Haravan.queryParams.page;
                collFilters.each(function() {
                    if (jQuery(this).val()) {
                        newTags.push(jQuery(this).val());
                    }
                });

                newURL = '/collections/' + 'all';
                if (newTags.length) {
                    newURL += '/' + newTags.join('+');
                }
                var search = jQuery.param(Haravan.queryParams);
                if (search.length) {
                    newURL += '?' + search;
                }
                location.href = newURL;

            });
            jQuery('.sort-by')
                .val('created-descending')
                .bind('change', function() {
                    Haravan.queryParams.sort_by = jQuery(this).val();
                    location.search = jQuery.param(Haravan.queryParams);
                });
        </script>
    </div>
</section>
