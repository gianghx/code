<?php
class donhangadd extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require('layouts/header.php');
       $this->view->data = $this->model->sanpham();
       $this->view->khachhang = $this->model->khachhang();
       $this->view->nhanvien = $this->model->nhanvien();
       $this->view->thanhpho = $this->model->thanhpho();
       $this->view->render('donhangadd');
       require('layouts/footer.php');
   }

   function save()
   {
       $data = $_REQUEST['data'];
       $khachhang = $_REQUEST['khachhang'];
       $nhanvien = $_REQUEST['nhanvien'];
       $diachi = $_REQUEST['diachi'];
       $phiship = str_replace(',','',$_REQUEST['phiship']);
       $sotien = str_replace(',','',$_REQUEST['sotien']);
       $madon = $this->model->password_generate(6);
       $donhang = ['ngay_gio'=>date('Y-m-d H:i:s'), 'khach_hang'=>$khachhang, 'nhan_vien'=>$nhanvien,
          'ma_don'=>$madon, 'tien_hang'=>$sotien, 'phi_ship'=>$phiship, 'tinh_trang'=>1,'dia_chi'=>$diachi];
       if ($this->model->savedon($donhang,$data)) {
           $jsonObj['msg'] = 'Cập nhật thành công';
           $jsonObj['success'] = true;
       } else {
           $jsonObj['msg'] = $data;
           $jsonObj['success'] = false;
       }
       echo json_encode($jsonObj);
   }

   function quanhuyen()
   {
       $id = $_REQUEST['id'];
       $quanhuyen = $this->model->quanhuyen($id);
       $str = '<select style="height:40px; width:100%" id="quanhuyen" name="quanhuyen" onchange="phiship(this.value)"><option value="0">Quận/huyện</option>';
       foreach ($quanhuyen AS $item) {
           $str.='<option value="'.$item['phi_ship'].'">'.$item['name'].'</option>';
       }
       $str.= '</select>';
       echo $str;
   }

   function diachi()
   {
       $id = $_REQUEST['id'];
       $diachi = $this->model->diachi($id);
       echo $diachi;
   }


}
?>
