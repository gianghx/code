<?php
class baiviet extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require('layouts/header.php');
       $this->view->data = $this->model->getdata();
       $this->view->danhmuc = $this->model->danhmuc();
       $this->view->render('baiviet');
       require('layouts/footer.php');
   }

   function getrow()
   {
       $id = $_REQUEST['id'];
       $data = $this->model->getrow($id);
       if (count($data)>0) {
           $jsonObj['data'] = $data[0];
           $jsonObj['success'] = true;
       } else {
           $jsonObj['err'] = 'Lỗi đọc dữ liệu từ máy chủ';
           $jsonObj['success'] = false;
       }
       $this->view->jsonObj = json_encode($jsonObj);
       $this->view->render('json');
   }

   function save()
   {
       $id = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $nameen = $_REQUEST['name_en'];
       $url = ($_REQUEST['url']!='')?$_REQUEST['url']:functions::convertname($name);
       $hinhanh = $_REQUEST['hinhanh'];
       $danhmuc = $_REQUEST['danhmuc'];
       $mota = $_REQUEST['mota'];
       $motaen = $_REQUEST['motaen'];
       $noidung = $_REQUEST['noidung'];
       $noidungen = $_REQUEST['noidungen'];
       $vitri = $_REQUEST['vitri'];
       $data = ['name'=>$name,'name_en'=>$nameen, 'hinh_anh'=>$hinhanh,'com'=>$vitri,'mo_ta'=>$mota,'mo_ta_en'=>$motaen,'noi_dung'=>$noidung,'noi_dung_en'=>$noidungen,
          'url'=>$url,'danh_muc'=>$danhmuc, 'updated'=>date("Y-m-d")];
       require 'layouts/header.php';
       if ($this->model->save($id,$data)) {
           $this->view->thongbao = 'Cập nhật thành công! <a href="baiviet">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Cập nhật không thành công! <a href="baiviet">Nhấn vào đây để quay lại</a>'.$id;
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }

   function del()
   {
       $id = $_REQUEST['id'];
       require 'layouts/header.php';
       if ($this->model->del($id)) {
           $this->view->thongbao = 'Đã xóa bản ghi! <a href="baiviet">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Có lỗi khi xóa bản ghi này! <a href="data">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }
}
?>
