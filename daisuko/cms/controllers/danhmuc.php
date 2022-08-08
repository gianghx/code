<?php
class danhmuc extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require('layouts/header.php');
       $this->view->data = $this->model->getdata();
       $this->view->render('danhmuc');
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
       $url = ($_REQUEST['url']!='')?$_REQUEST['url']:functions::convertname($name);
       $hinhanh = $_REQUEST['hinhanh'];
       $mota = $_REQUEST['mota'];
       $data = ['name'=>$name, 'mo_ta'=>$mota,'hinh_anh'=>$hinhanh,'url'=>$url];
       require 'layouts/header.php';
       if ($this->model->save($id,$data)) {
           $this->view->thongbao = 'Cập nhật thành công! <a href="danhmuc">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Cập nhật không thành công! <a href="danhmuc">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }

   function del()
   {
       $id = $_REQUEST['id'];
       require 'layouts/header.php';
       if ($this->model->del($id)) {
           $this->view->thongbao = 'Đã xóa bản ghi! <a href="danhmuc">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Có lỗi khi xóa bản ghi này! <a href="danhmuc">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }
}
?>
