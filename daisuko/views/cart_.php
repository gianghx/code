<?php
    if (isset($_POST['id'])) {
        $id= $_POST['id'];
        $phien= $_POST['phien'];
        $num= $_POST['num'];
        $giadat= $_POST['giadat'];
        $sanpham= $data->getphien1($id,$phien);
        if (!isset($_SESSION['cart'])) {
            $cart=array();
            $cart[$id]=array(
                'id' => $id,
                'phien'=>$phien,
                'name'=>$sanpham['name'],
                'num'=>(int)$num,
                'gia'=>$sanpham['gia_san'],
                'giast'=>$sanpham['gia_st'],
                'hinhanh'=>$sanpham['hinhanh'],
                'url' =>$sanpham['url'],
                'giadat' =>$giadat
            );
        }else{
            $cart=$_SESSION['cart'];
            if (array_key_exists($id, $cart)) {
                $cart[$id]=array(
                'id' => $id,
                'phien'=>$phien,
                'name'=>$sanpham['name'],
                'num'=>(int)$cart[$id]['num'] +(int)$num,
                'gia'=>$sanpham['gia_san'],
                'giast'=>$sanpham['gia_st'],
                'hinhanh'=>$sanpham['hinhanh'],
                'url' =>$sanpham['url'],
                'giadat' =>$giadat
            );
            }else{
                $cart[$id]=array(
                'id' => $id,
                'phien'=>$phien,
                'name'=>$sanpham['name'],
                'num'=>(int)$num,
                'gia'=>$sanpham['gia_san'],
                'giast'=>$sanpham['gia_st'],
                'hinhanh'=>$sanpham['hinhanh'],
                'url' =>$sanpham['url'],
                'giadat' =>$giadat
                );
            }
        }
        $_SESSION['cart']=$cart;
    }
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart']=$_SESSION['cart'];
    }else{
        $_SESSION['cart']=array();
    }
?>

<style type="text/css">
    @media only screen and (max-width: 600px) {
    .vuot{
      display: block !important;
      color: red;
      font-style: italic;
      font-weight: normal;
    }

}
</style>

<!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Giỏ hàng đặt</h2>
              <p>Trang chủ <span>-</span> Giỏ hàng đặt</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive" id="cartxx">
          <table class="table" id="cartxx">
            <thead>
              <tr>
                <th scope="col">Sản phẩm <span class="vuot" style="display:none;">(vuốt sang phải để đặt)</span></th>
                <th scope="col">Giá bán</th>
                <th scope="col">Giá shop</th>
                <!-- <th scope="col">Giá shop</th> -->
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
                <th scope="col" style="padding-bottom: 7px;">Xóa</th>
              </tr>
            </thead>
            <tbody>
             <?php $tong=0; foreach ($_SESSION['cart'] as  $value) {
                $tt= $value['num']*$value['gia'];
             ?>
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <a href="product/<?=$value['url']?>?phien=<?=$value['phien']?>"><img src="<?=$value['hinhanh']?>" alt="<?=$value['name']?>" style="width: 80px;height: 80px;object-fit: cover;" /></a>
                    </div>
                    <div class="media-body">
                      <p><?=$value['name']?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5><?=number_format($value['gia'])?></h5>
                </td>
                <td>
                  <h5><?=number_format($value['giast'])?></h5>
                </td>
                <!-- <td>
                  <h5><?=number_format($value['giadat'])?></h5>
                </td> -->
                <td>
                  <div class="product_count">

                      <input type="number" class="qty input-text" id="qty<?=$value['id']?>" name="quantity" size="4" value="<?=$value['num']?>" onchange="suasl(<?=$value['id']?>)" maxlength="3" max="100" min="1">

                  </div>
                </td>
                <td>
                  <h5><?=number_format($tt)?>đ</h5>
                </td>
                <td>
                  <img src="https://www.freeiconspng.com/uploads/remove-icon-png-3.png" width="20" onclick="xoaphieu(<?=$value['id']?>)">
                </td>
              </tr>
              <?php $tong+=$tt; } ?>

              <tr class="bottom_button">
                <td>
                  <!-- <a class="btn_1" href="<?=HOME?>">Tiếp tục mua hàng</a> -->
                </td>
                <td></td>
                <td></td>
                <td colspan="2"><a class="btn btn-success" href="<?=HOME?>" role="button" style="    height: 40px;margin-top: 2px;">Thêm sản phẩm khác</a>
                  </td>
                <td colspan="2">
                  <!-- <div class="cupon_text float-right"> -->
                      <button class="btn-detail btn-color-add" onclick="checkout()" name="add" style="width: 100%; height: 40px; padding-left:30px">Đặt hàng</button>
                  <!-- </div> -->
                </td>
              </tr>
              <!-- <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Tổng:</h5>
                </td>
                <td>
                  <h5><?=number_format($tong)?>đ</h5>
                </td>
              </tr> -->

            </tbody>
          </table>
          <script type="text/javascript">
            function checkout(){
              window.location.href="checkout";
            }
          </script>
          <div class="checkout_btn_inner float-right">

          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
