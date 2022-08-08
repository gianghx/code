<?php
$banner = $data->getbanner();
$banner1 = $data->getbanner1();
$sanphammoi = $data->getsanphammoi();
$banchay = $data->banchay();
$danhmuc = $data->danhmucsp();
$daugia = $data->daugia();
?>
<!-- banner part start-->
<style type="text/css">
    .owl-nav{
        display: none;
    }
</style>
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">
                    <?php foreach ($banner as $value) { ?>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1><?= $value['name'] ?></h1>
                                            <!-- <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p> -->
                                            <a href="<?= $value['url'] ?>" class="btn_2">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="<?= $value['hinh_anh'] ?>" alt="<?= $value['name'] ?>">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Cloth & Wood
                                            Sofa</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                        <a href="#" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="template/img/banner_img.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Wood & Cloth
                                            Sofa</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                        <a href="#" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="template/img/banner_img.png" alt="">
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Cloth $ Wood Sofa</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                        <a href="#" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="template/img/banner_img.png" alt="">
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="slider-counter"></div> -->
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<!--<section class="feature_part padding_top">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-lg-8">-->
<!--                <div class="section_tittle text-center">-->
<!--                    <h2>Danh mục sản phẩm</h2>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row align-items-center justify-content-between">-->
            <?php //for ($i = 0; $i < 4; $i++) { ?>
<!--                <div class="col-lg-6 col-sm-6">-->
<!--             <div class="single_feature_post_text" style="background-image: url('<?//= $danhmuc[$i]['hinh_anh'] ?>/*');background-position: center;background-repeat: no-repeat;">-->
                        <!-- <p>Premium Quality</p> -->
<!--                        <h3>--><?//= $danhmuc[$i]['name'] ?><!--</h3>-->
                        <!--                        <img src="--><? //=$danhmuc[2]['hinh_anh']?><!--" alt="-->
                        <? //=$danhmuc[2]['name']?><!--" style="max-height:200px;">-->
<!--                        <a href="product/1/--><?//= $danhmuc[$i]['url'] ?><!--" class="feature_btn">CHI TIẾT<i-->
<!--                                    class="fas fa-play"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
        
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- upcoming_event part start-->

<!-- product_list start-->
<!-- <section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            <?php foreach ($daugia as $key => $value) {
                                if ($key < 8) {
                                    $date1=date("Y-m-d H:i:s");
                                    $date2= $value['date_end'];
                                    $diff = abs(strtotime($date2) - strtotime($date1));     $years = floor($diff / (365*60*60*24));   $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));   $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));   $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));   $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);   $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
                                 ?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single_product_item">
                                            <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>">
                                                <img src="<?= $value['hinhanh'] ?>" alt="<?= $value['name'] ?>"
                                                     style="max-height: 230px;height: 230px;object-fit: contain;">
                                            </a>
                                            <div class="single_product_text">
                                                <h4><?= $value['name'] ?></h4>
                                                <div class="row m-0">
                                                    <div class="col-6 p-0">
                                                      <h3><b>Giá sàn:</b> <?= number_format($value['don_gia']) ?></h3>
                                                        <h3><b>Giá siêu thị:</b> <?= number_format($value['don_giast']) ?></h3>
                                                        <h3><b>Số sản phẩm:</b> <?= $value['so_luong'] ?></h3>
                                                        <h3><b>Số khách đã đặt:</b> <?= $value['sokhach'] ?></h3>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                      <h3><b>Số lượng đã đặt:</b> <?= $value['sldat'] ?></h3>
                                                        <h3><b>Giá đặt cao nhất:</b> <?= number_format($value['giamax']) ?></h3>
                                                        <h3><b>Giá đặt thấp nhất:</b> <?= number_format($value['giamin']) ?></h3>
                                                        <h3><b>Còn:</b> <?php echo $days." ngày, ".$hours." giờ, ".$minutes." phút, ".$seconds." giây"; ?>
                                                        </h3>
                                                    </div>
                                                  </div>
                                                
                                                
                                                
                                                <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>"
                                                   class="add_cart">Click để đấu giá<i class="ti-shift-right"></i></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } ?>


                                
                                
                               
                            </div>
                        </div>

                            
                        </div>
                    </div>
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            <?php foreach ($daugia as $key => $value) {
                                if ($key >= 8) { ?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single_product_item">
                                            <img src="template/img/product/product_1.png" alt="">
                                            <div class="single_product_text">
                                                <h5><?= $value['name'] ?></h5>
                                                <h3>300,000 đ</h3>
                                                <a href="#" class="add_cart">Click để đấu giá<i
                                                            class="ti-heart"></i></a>
                                                <a href="#" class="add_cart">Xem chi tiết<i class="ti-shift-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- product_list part start-->

<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php foreach ($daugia as $value) {
                        $date1=date("Y-m-d H:i:s");
                                    $date2= $value['date_end'];
                                    $diff = abs(strtotime($date2) - strtotime($date1));     $years = floor($diff / (365*60*60*24));   $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));   $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));   $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));   $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);   $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
                     ?>
                        <div class="single_product_item">
                            <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>"><img src="<?= $value['hinhanh'] ?>" style="height: 210px;object-fit: contain;"
                                 alt="<?= $value['name'] ?>"></a>
                            <div class="single_product_text">
                                <h5><?= $value['name'] ?></h5>
                                <div class="row m-0">
                                    <div class="col-6 p-0">
                                        <span>Giá sàn: <br><b style="margin-left: 15px;"><?= number_format($value['gia_san']) ?> đ</b></span> <br>
                                        <span>Giá siêu thị: <br><b style="margin-left: 15px;"><?= number_format($value['gia_st']) ?> đ</b></span> <br>
                                        <span>Số sản phẩm: <b><?= $value['so_luong'] ?></b></span> <br>
                                        <span>Còn: <b id="demo<?=$value['id']?>"></b></span> <br>
                                    </div>
                                    <div class="col-6 pr-0 single_product_item--right">
                                        <span>Số khách đã đặt: <b><?= $value['sokhach'] ?></b></span> <br>
                                        <span>SL đã đặt: <b><?= $value['sldat'] ?></b></span> <br>
                                        <span>Giá đặt cao nhất: <br><b style="margin-left: 15px;"><?= number_format($value['giamax']) ?> đ</b></span> <br>
                                        <span>Giá đặt thấp nhất: <br><b style="margin-left: 15px;"><?= number_format($value['giamin']) ?> đ</b></span> <br>
                                    </div>
                                </div>
                                <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>"
                                                   class="add_cart">Click để đấu giá<i class="ti-shift-right"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
    </div>
</section>
<script>
// Set the date we're counting down to



var countDownDate = new Date("2021-06-03 23:36:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo7").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo7").innerHTML = "EXPIRED";
    }
}, 1000);

</script>

<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Sản phẩm mới</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php foreach ($sanphammoi as $value) {
                        $date1=date("Y-m-d H:i:s");
                                    $date2= $value['date_end'];
                                    $diff = abs(strtotime($date2) - strtotime($date1));     $years = floor($diff / (365*60*60*24));   $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));   $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));   $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));   $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);   $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
                     ?>
                        <div class="single_product_item">
                            <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>"><img src="<?= $value['hinhanh'] ?>" style="height: 210px;object-fit: contain;"
                                 alt="<?= $value['name'] ?>"></a>
                            <div class="single_product_text">
                                <h5><?= $value['name'] ?></h5>
                                <div class="row m-0">
                                    <div class="col-6 p-0">
                                        <span>Giá sàn: <br><b style="margin-left: 15px;"><?= number_format($value['gia_san']) ?> đ</b></span> <br>
                                        <span>Giá siêu thị: <br><b style="margin-left: 15px;"><?= number_format($value['gia_st']) ?> đ</b></span> <br>
                                        <span>Số sản phẩm: <b><?= $value['so_luong'] ?></b></span> <br>
                                        <span>Còn: <b><?php echo $days." ngày, ".$hours." giờ, ".$minutes." phút, ".$seconds." giây"; ?></b></span> <br>
                                    </div>
                                    <div class="col-6 pr-0 single_product_item--right">
                                        <span>Số khách đã đặt: <b><?= $value['sokhach'] ?></b></span> <br>
                                        <span>SL đã đặt: <b><?= $value['sldat'] ?></b></span> <br>
                                        <span>Giá đặt cao nhất: <br><b style="margin-left: 15px;"><?= number_format($value['giamax']) ?> đ</b></span> <br>
                                        <span>Giá đặt thấp nhất: <br><b style="margin-left: 15px;"><?= number_format($value['giamin']) ?> đ</b></span> <br>
                                    </div>
                                </div>
                                <a href="product/<?= $value['url'] ?>?phien=<?= $value['id'] ?>"
                                                   class="add_cart">Click để đấu giá<i class="ti-shift-right"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
    </div>
</section>

<!-- sản phẩm nổi bật-->
<?php
$tintucnoibat = $data->getbaivietfooter(1);
?>
<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Tin tức nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php
                    foreach ($tintucnoibat as $value) {?>
                        <div class="single_product_item">
                            <a href="<?= HOME.'/blog/'.$value['url'] ?>" target="_blank"><img src="<?= $value['hinh_anh'] ?>" style="height: 210px;object-fit: cover;"
                                                                                              alt="<?= ($value['name']) ?>"></a>
                            <a href="<?= HOME.'/blog/'.$value['url'] ?>" target="_blank">
                                <div class="single_product_text">
                                    <h5>
                                        <?= functions::text_limit($value['name'],10) ?>
                                    </h5>
                                    <!--                                <h3>--><?//= functions::text_limit($value['mo_ta'],5) ?><!-- </h3>-->
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <!-- <div class="single_product_item">
                        <img src="template/img/product/product_2.png" alt="">
                        <div class="single_product_text">
                            <h5>Hộp khử mùi, khử khuẩn trên Ôtô</h5>
                            <h3>300,000 đ</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="template/img/product/product_3.png" alt="">
                        <div class="single_product_text">
                            <h5>Hộp khử mùi, khử khuẩn trên Ôtô</h5>
                            <h3>300,000 đ</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="template/img/product/product_4.png" alt="">
                        <div class="single_product_text">
                            <h5>Hộp khử mùi, khử khuẩn trên Ôtô</h5>
                            <h3>300,000 đ</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="template/img/product/product_5.png" alt="">
                        <div class="single_product_text">
                            <h5>Hộp khử mùi, khử khuẩn trên Ôtô</h5>
                            <h3>300,000 đ</h3>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end sản phẩn nổi bật -->

<!-- subscribe_area part start-->
<section class="subscribe_area section_padding" style="background-image: url(<?= $banner1['hinh_anh'] ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="subscribe_area_text text-center">
                    <h5>Đăng ký nhận thông tin</h5>
                    <h2>Để lại email để nhận thông tin mới nhất từ chúng tôi</h2>
                    <div class="input-group">
                        <input type="text" class="form-control" id="emailindex" placeholder="Nhập email của bạn"
                               aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <a href="javascript:void(0)" class="input-group-text btn_2" onclick="dangkyindex()"
                               id="basic-addon2">đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function dangkyindex() {
        var email = document.getElementById('emailindex').value;
        if (isValidEmail(email))
            $.get("dangkynhantin?email=" + email, function(data, status) {
                if(data==1) {
                    alert("Cám ơn bạn đã đăng ký nhận tin tại website!");
                    document.getElementById('emailindex').value='';
                }
                else
                    alert(data);
            });
        else{
            alert("Chưa đúng định dang email!");
            document.getElementById('emailindex').focus();
        }
    }

    function isValidEmail(email) {
        return /^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}$/.test(email)
            && /^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/.test(email);
    }
</script>
<!--::subscribe_area part end::-->

<!-- subscribe_area part start-->
<!--   <section class="client_logo padding_top">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-12">
                  <div class="single_client_logo">
                      <img src="template/img/client_logo/client_logo_1.png" alt="">
                  </div>
                  <div class="single_client_logo">
                      <img src="template/img/client_logo/client_logo_2.png" alt="">
                  </div>
                  <div class="single_client_logo">
                      <img src="template/img/client_logo/client_logo_3.png" alt="">
                  </div>
                  <div class="single_client_logo">
                      <img src="template/img/client_logo/client_logo_4.png" alt="">
                  </div>
                  <div class="single_client_logo">
                      <img src="template/img/client_logo/client_logo_5.png" alt="">
                  </div>
                  <div class="single_client_logo">
                      <img src="template/img/client_logo/client_logo_3.png" alt="">
                  </div>
                  <div class="single_client_logo">
                      <img src="template/img/client_logo/client_logo_1.png" alt="">
                  </div>
                  <div class="single_client_logo">
                      <img src="template/img/client_logo/client_logo_2.png" alt="">
                  </div>
                  <div class="single_client_logo">
                      <img src="template/img/client_logo/client_logo_3.png" alt="">
                  </div>
                  <div class="single_client_logo">
                      <img src="template/img/client_logo/client_logo_4.png" alt="">
                  </div>
              </div>
          </div>
      </div>
  </section> -->
<!--::subscribe_area part end::-->