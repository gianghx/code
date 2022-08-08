<?php
if(isset($_REQUEST['thang']))
{
$thang = $_REQUEST['thang'];
$danhmuc = $data->getdanhmuc();
$baivietmoi = $data->get_baivietmoi();
$tamdiem = $data->tamdiem(3);
$chuyengia = $data->chuyengia();
$tiphomnay = $data->tiphomnay();

?>

<div class="site-blocks-vs site-section bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <h2 class="text-uppercase text-black font-weight-bold mb-3">Lịch sử tips tháng <?php echo date('m/Y',strtotime($thang)); ?></h2>
                <div class="site-block-tab">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show" id="pills-0" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            <?php $lichsu = $data->lichsuchitiet($thang); ?>
                            <div class="row align-items-center">
                                <div class="col-md-12">

                                    <div class="table-responsive">
                                        <table class="table table-dark">
                                            <thead>
                                            <tr>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Ngày</th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Trận đấu
                                                </th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Tip</th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Bóng chấp</th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Kết quả
                                                </th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Win/Lose
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;
                                            foreach ($lichsu

                                            as $ls) { ?>
                                            <tr>
                                                <th scope="row"><?php echo date("d/m/Y", strtotime($ls['ngay_gio'])); ?></th>
                                                <td><?php echo $ls['tran_dau']; ?></td>
                                                <td><?php echo $ls['tip']; ?></td>
                                                <td><?php echo $ls['odd']; ?></td>
                                                <td><?php echo $ls['ket_qua']; ?></td>
                                                <td><?php echo $ls['verdict'];?></td>
                                                <?php if($ls['tinh_trang'] == 1 || $ls['tinh_trang'] == 3) $i++;}?>
                                            </tr>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th scope="col" colspan="4"></th>
                                                <th scope="col" style="color: yellow;font-weight: unset;">Tỉ lệ
                                                    thắng:
                                                </th>
                                                <th scope="col"
                                                    style="color: yellow;font-weight: unset;"><?php if (sizeof($lichsu) > 0) echo ceil($i / sizeof($lichsu) * 100); ?>
                                                    %
                                                </th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>

                            </div>
                            <script type="text/javascript">
                                document.getElementById("pills-0").classList.add("active");
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section pt-0 feature-blocks-1" data-aos="fade" data-aos-delay="100" style="margin-top:20px">
    <div class="container">
        <div class="row">
            <?php foreach ($danhmuc as $value) { ?>
                <div class="col-md-6 col-lg-4">
                    <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg"
                         style="background-image: url('<?php echo $value['hinh_anh']; ?>');">
                        <div class="text">
                            <h2 class="h5 text-white"><?php echo $value['name']; ?></h2>
                            <p><?php echo $value['mo_ta']; ?></p>
                            <p class="mb-0"><a href="blog/1/<?php echo $value['url']; ?>"
                                               class="btn btn-primary btn-sm px-4 py-2 rounded-0">Xem chi tiết</a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="col-md-6 col-lg-4">
              <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('template/images/img_2.jpg');">
                <div class="text">
                  <h2 class="h5 text-white">Premium League</h2>
                  <p>13/15 trận sân nhà gần nhất của Benevento tại Serie A đều có nhiều hơn 2.5 bàn thắng</p>
                  <p class="mb-0"><a href="#" class="btn btn-primary btn-sm px-4 py-2 rounded-0">Xem chi tiết</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('template/images/img_3.jpg');">
                <div class="text">
                  <h2 class="h5 text-white">Buldesliga Championship</h2>
                  <p>Borussia Dortmund thắng 5/6 trận sân khách gần nhất trước Werder Bremen</p>
                  <p class="mb-0"><a href="#" class="btn btn-primary btn-sm px-4 py-2 rounded-0">Xem chi tiết</a></p>
                </div>
              </div>
            </div> -->
        </div>
    </div>
</div>


<!-- <div class="slide-one-item home-slider owl-carousel">
  <div class="site-blocks-cover overlay" style="background-image: url(template/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-start">
        <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
          <h1 class="bg-text-line">Tips chính xác từ chuyên gia</h1>
          <p><a href="" class="btn btn-primary btn-sm rounded-0 py-3 px-5">Mua ngay</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-blocks-cover overlay" style="background-image: url(template/images/hero_bg_4.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-start">
        <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
          <h1 class="bg-text-line">Lịch sử tip trên 80%</h1>
          <p><a href="" class="btn btn-primary btn-sm rounded-0 py-3 px-5">Xem chi tiết</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-blocks-cover overlay" style="background-image: url(template/images/hero_bg_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-start">
        <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
          <h1 class="bg-text-line">Chi phí cực thấp cho thành viên</h1>
          <p><a href="" class="btn btn-primary btn-sm rounded-0 py-3 px-5">Xem chi tiết</a></p>
        </div>
      </div>
    </div>
  </div>
</div> -->

<div class="site-section block-13 bg-primary fixed overlay-primary bg-image"
     style="background-image: url('template/images/hero_bg_3.jpg');" data-stellar-background-ratio="0.5">

    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="text-white">Các trận đấu tâm điểm</h2>
            </div>
        </div>

        <div class="row">
            <div class="nonloop-block-13 owl-carousel">
                <?php foreach ($tamdiem as $item) { ?>
                    <div class="item">
                        <!-- uses .block-12 -->
                        <div class="block-12">
                            <figure>
                                <img src="<?php echo $item['hinh_anh'] ?>" alt="Image" class="img-fluid"
                                     style="width: 100%;height: 248px;object-fit: cover;">
                            </figure>
                            <div class="text">
                                <span class="meta">May 20th 2020</span>
                                <div class="text-inner">
                                    <h2 class="heading mb-3"><a href="blog/<?php echo $item['url'] ?>"
                                                                class="text-black"><?php echo $item['name'] ?></a></h2>
                                    <p><?php echo $item['mo_ta'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="text-black">Tin mới cập nhật</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($baivietmoi as $key) { ?>
                <div class="col-md-6 col-lg-4">
                    <div class="post-entry">
                        <div class="image">
                            <img src="<?php echo $key['hinh_anh']; ?>" alt="Image" class="img-fluid"
                                 style="width: 100%;height: 227px;object-fit: cover;">
                        </div>
                        <div class="text p-4">
                            <h2 class="h5 text-black"><a
                                    href="blog/<?php echo $key['url']; ?>"><?php echo $key['name']; ?></a></h2>
                            <span class="text-uppercase date d-block mb-3"><small><?php echo date('d/m/Y', strtotime($key['ngay_cap_nhat'])); ?></small></span>
                            <p class="mb-0"><?php echo $key['mo_ta']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php }?>