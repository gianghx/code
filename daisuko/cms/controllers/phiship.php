<?php
class phiship extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require('layouts/header.php');
       $this->view->data = $this->model->getdata();
       $this->view->render('phiship');
       require('layouts/footer.php');
   }

   function save()
   {
       $id = $_REQUEST['id'];
       $phiship = str_replace(',','',$_REQUEST['phiship']);
       $data = ['phi_ship'=>$phiship];
       require 'layouts/header.php';
       if ($this->model->save($id,$data)) {
           $this->view->thongbao = 'Cập nhật thành công! <a href="phiship">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Cập nhật không thành công! <a href="phiship">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }

}
?>
