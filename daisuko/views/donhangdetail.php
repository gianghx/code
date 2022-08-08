<?php
    require '../libs/startup.php';
    require '../libs/database.php';
    $db = new database();
    $id = $_REQUEST['id'];
    $dieukien = " WHERE tinh_trang=1 AND don_hang=$id";
    $query = $db->query("SELECT *,
        (SELECT name FROM sanpham WHERE id=hang_hoa) AS hanghoa,
        ROUND((don_gia-chiet_khau)*(1-(chiet_khau_pt/100))*so_luong) AS thanhtien
        FROM hanghoa $dieukien ");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    $str = '';
    $stt = 1;
    $tong =0;
    foreach ($temp as $item) {
        $str.='<tr><td>'.$stt.'</td>';
        $str.='<td>'.$item['hanghoa'].'</td>';
        $str.='<td>'.$item['so_luong'].'</td>';
        $str.='<td align="right">'.number_format($item['don_gia']).'</td>';
        $str.='<td align="right">'.number_format($item['chiet_khau']).'</td>';
        $str.='<td>'.$item['chiet_khau_pt'].'</td>';
        $str.='<td align="right">'.number_format($item['thanhtien']).'</td>';
        $str.='</tr>';
        $stt++;
        $tong = $tong + $item['thanhtien'];
    }
    $str.='<tr><th></th><th>Tổng cộng</th><th></th><th></th><th></th><th></th><th>'.number_format($tong).'</th></tr>';
    echo $str;
?>
