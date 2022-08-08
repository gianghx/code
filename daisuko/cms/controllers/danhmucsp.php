<?php
class danhmucsp extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require('layouts/header.php');
       $danhmuc=functions::dequy($this->model->danhmuc(),0,0);
        $this->view->danhmuc=json_encode($danhmuc);
       $this->view->data = $this->model->getdata();
       $this->view->render('danhmucsp');
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
       $name_en = $_REQUEST['name_en'];
       $url = ($_REQUEST['url']!='')?$_REQUEST['url']:functions::convertname($name);
       $hinhanh = $_REQUEST['hinhanh'];
       $mota = $_REQUEST['mota'];
       $mota_en = $_REQUEST['mota_en'];
       $cha=$_REQUEST['danhmuccha'];
       $thutu=$_REQUEST['thutu'];
       $data = ['name'=>$name,'name_en'=>$name_en, 'mo_ta'=>$mota,'mo_ta_en'=>$mota_en,'hinh_anh'=>$hinhanh,'url'=>$url,'cha'=>$cha,'thu_tu'=>$thutu];
       require 'layouts/header.php';
       if ($this->model->save($id,$data)) {
           $this->view->thongbao = 'Cập nhật thành công! <a href="danhmucsp">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Cập nhật không thành công! <a href="danhmucsp">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }

   function del()
   {
       $id = $_REQUEST['id'];
       $data = ['tinh_trang'=>0];
       require 'layouts/header.php';
       if ($this->model->save($id,$data)) {
           $this->view->thongbao = 'Đã xóa bản ghi! <a href="danhmucsp">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Có lỗi khi xóa bản ghi này! <a href="danhmucsp">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }
}
?>
