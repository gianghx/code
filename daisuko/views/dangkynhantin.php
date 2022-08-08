<?php
$email = $_REQUEST['email'];
$dataemail = ['name' => $email, 'email' => $email, 'ngay_gio' => date("Y-m-d H:i:s"), 'tinh_trang' => 1];
if ($data->insertlienhe($dataemail)) {
    $noidung = "Cám ơn bạn đã đăng ký nhận tin từ website";
    $data->sendmail("Website Daisuko",$email,'',"Đăng ký nhận tin",$noidung);
    echo '1';
}else
    echo '0';

?>