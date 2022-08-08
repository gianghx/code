<?php
$baiviet= $page['data'];
$xemthem=$data->xemthem($baiviet['id'],$baiviet['blog']);
?>
<style type="text/css">
    .abc img{
        width: 100%;
    }
</style>


<!--     <div class="site-section" data-aos="fade-up">-->
<!--      <div class="container">-->
<!--        <div class="row align-items-center">-->
<!--          <div class="col-md-12">-->
<!--            <img src="--><?php //echo $baiviet['hinh_anh']; ?><!--" alt="Image" class="img-fluid" style="width: 100%;height: 512px;object-fit: cover;">-->
<!--         </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->

<div class="site-section" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 pr-md-5">
                <h2 class="text-black"><?php echo $baiviet['name']; ?></h2>
                <div class="abc">
                    <p class="lead"><?php echo $baiviet['noi_dung']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  <div class="slide-one-item owl-carousel">
   <div class="bg-image center overlay" style="background-image: url('template/images/hero_bg_1.jpg'); "></div>
   <div class="bg-image center overlay" style="background-image: url('template/images/hero_bg_2.jpg'); "></div>
   <div class="bg-image center overlay" style="background-image: url('template/images/hero_bg_3.jpg'); "></div>
   <div class="bg-image center overlay" style="background-image: url('template/images/hero_bg_4.jpg'); "></div>
 </div> -->

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="text-black">Xem thêm</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($xemthem as $key) {?>
                <div class="col-md-6 col-lg-4">
                    <div class="post-entry">
                        <div class="image">
                            <img src="<?php echo $key['hinh_anh']; ?>" alt="Image" class="img-fluid" style="width: 100%;height: 227px;object-fit: cover;">
                        </div>
                        <div class="text p-4">
                            <h2 class="h5 text-black"><a href="blog/<?php echo $key['url']; ?>"><?php echo $key['name']; ?></a></h2>
                            <span class="text-uppercase date d-block mb-3"><small><?php echo date('jS F Y',strtotime($key['ngay_cap_nhat'])); ?></small></span>
                            <p class="mb-0"><?php echo $key['mo_ta']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>










