<?php
class phukien extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require 'layouts/header.php';
       $this->view->data = $this->model->getFetObj();
       $this->view->sanpham = $this->model->sanpham();
       $this->view->render('phukien/index');
       require 'layouts/footer.php';
   }


   function xoa()
   {
       $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->model->delObj($id);
       header('Location: ' . CMS . '/phukien');
   }

   function edit()
   {
       require 'layouts/header.php';
       $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       $this->view->data = $this->model->getrow($id);
       $this->view->sanpham = $this->model->sanpham();
       $this->view->render('phukien/edit');
       require 'layouts/footer.php';
   }


   function editsave()
   {
       $id   = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $ma = $_REQUEST['ma'];
       $nameen = $_REQUEST['name_en'];
       $dongia = $_REQUEST['dongia'];
       $dongia = str_replace(",","",$dongia);
       $dongiaen = $_REQUEST['dongia_en'];
       $dongiaen = str_replace(",","",$dongiaen);
       $sanpham = $_REQUEST['iddv'];
       $data = array(
                   'ma' => $ma,
                   'san_pham' => $sanpham,
                   'name' => $name,
                   'name_en' => $nameen,
                   'gia' => $dongia,
                   'gia_en'=>$dongiaen
        );
       if ($this->model->updateObj($id, $data))
            echo "<script>window.location.assign('".CMS."/phukien');</script>";
       else
             echo "<script>alert('Cập nhập thất bại!');window.location.assign('".CMS."/phukien');</script>";
   }


   function addsave()
   {
       $name = $_REQUEST['name'];
       $url = functions::convertname($name);
       $ma = $_REQUEST['ma'];
       $nameen = $_REQUEST['name_en'];
       $dongia = $_REQUEST['dongia'];
       $dongia = str_replace(",","",$dongia);
       $dongiaen = $_REQUEST['dongia_en'];
       $dongiaen = str_replace(",","",$dongiaen);
       $sanpham = $_REQUEST['iddv'];
       $data = array(
                   'ma' => $ma,
                   'url' =>$url,
                   'san_pham' => $sanpham,
                   'name' => $name,
                   'name_en' => $nameen,
                   'gia' => $dongia,
                   'gia_en'=>$dongiaen,
                   'tinh_trang'=>1
        ); 
       if ($this->model->addObj($data))
           echo "<script>window.location.assign('".CMS."/phukien');</script>";
       else
           echo "<script>alert('Thêm thất bại!');window.location.assign('".CMS."/phukien');</script>";
   }
}
?>
