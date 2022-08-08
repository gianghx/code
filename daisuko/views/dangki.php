<?php
   if (isset($_POST['btndangky'])) {
       $name= isset($_POST['name'])?$_POST['name']:'';
       $dienthoai= isset($_POST['dienthoai'])?$_POST['dienthoai']:'';
       $email= isset($_POST['email'])?$_POST['email']:'';
           $lienhe= array('name'=>$name,'email'=>$email,'noi_dung'=>'Khách hàng đăng ký nhận tin','ngay_gio'=>date("Y-m-d H:i:s"),'tinh_trang'=>1);
       $send= $data->themlienhe($lienhe);

           if ($send) {
          echo "<script>alert('Cảm ơn bạn đã đăng ký, thông tin mới nhất sẽ được gửi qua email !');window.history.back();</script>";
           }else{
              echo "<script>alert('Đã có lỗi sảy ra vui lòng thực hiện lại!');;window.history.back();</script>";
           }
       
    
  ?>

<?php }else{
   echo "<script>window.history.back();</script>";
   } ?>