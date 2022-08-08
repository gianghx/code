<?php

class model

{

    function __construct()

    {

        $this->db = new database();

        define("admin", 'admin');

        define("thongtin", 'thongtin');

        define("menu", 'menu');

        define("danhmuc", 'danhmuc');

        define("baiviet", 'baiviet');

        define("danhmucsp", 'danhmucsp');

        define("sanpham", 'sanpham');

        define("media", 'media');

        define("donhang", 'donhang');

        define("dathang", '1_dathang');

        define("khachhang", 'khachhang');

        define("nhanvien", 'nhanvien');

    }



    //------------------- các hàm thao tác trên database ---------------

    function insert($table, $array)

    {

            $cols = array();

            $bind = array();

            foreach ($array as $key => $value) {

                $cols[] = $key;

                $bind[] = "'" . $value . "'";

            }

            $query = $this->db->query("INSERT IGNORE INTO " . $table . " (" . implode(",", $cols) . ")

             VALUES (" . implode(",", $bind) . ")");

            return $query;

    }



    function update($table, $array, $where)

    {

            $set = array();

            foreach ($array as $key => $value) {

                $set[] = $key . " = '" . $value . "'";

            }

            $query = $this->db->query("UPDATE " . $table . " SET " . implode(",", $set) . " WHERE " . $where);

            return $query;

    }



    function delete($table, $where = '')

   {

       if ($where == '') {

           $query = $this->db->query("DELETE FROM " . $table);

       } else {

           $query = $this->db->query("DELETE FROM " . $table . " WHERE " . $where);

       }

       return $query;

   }



    //------------------- các hàm xử lý frontend ---------------

    // kết quả đấu giá

   function ketqua(){

         $date= date("Y-m-d H:i:s");

         $query = $this->db->query("SELECT * FROM donhang a WHERE tinh_trang =1 AND date_end<'$date' ");

         $result  = $query->fetchAll(PDO::FETCH_ASSOC);

         if (count($result)>0) {

             foreach ($result as $key => $value) {

                 $phien= $value['id'];

                 $soluongdau= (int)$value['so_luong'];

                 $query1 = $this->db->query("SELECT *,(SELECT SUM(so_luong) FROM dathang WHERE tinh_trang=1 AND phien=$phien) AS total FROM dathang  WHERE tinh_trang =1 AND phien=$phien ORDER BY gia_dat DESC ");

                 $temp  = $query1->fetchAll(PDO::FETCH_ASSOC);

                 $query4 = $this->update("donhang", ['tinh_trang'=>2], " id = $phien ");

                 if (count($temp)>0) {

                     $totalcl=$soluongdau;

                     foreach ($temp as $key =>  $item) {

                         if ($item['so_luong']>=$totalcl && $key==0) {

                             $ketqua= ['phien'=>$phien,'dat_hang'=>$item['id'],'so_luong'=>$soluongdau,'gia'=>$item['gia_dat'],'tinh_trang'=>1];

                             $query3 = $this->insert("ketqua", $ketqua);

                             break;

                         }else{

                            if ($item['total']<=$soluongdau) {

                                $ketqua= ['phien'=>$phien,'dat_hang'=>$item['id'],'so_luong'=>$item['so_luong'],'gia'=>$item['gia_dat'],'tinh_trang'=>1];

                                $query3 = $this->insert("ketqua", $ketqua);

                                $query5 = $this->update("ketqua", ['gia'=>$item['gia_dat']], " phien = $phien ");

                            }else{



                                if ($totalcl>$item['so_luong']) {

                                    $ketqua= ['phien'=>$phien,'dat_hang'=>$item['id'],'so_luong'=>$item['so_luong'],'gia'=>$item['gia_dat'],'tinh_trang'=>1];

                                    $query3 = $this->insert("ketqua", $ketqua);

                                    $query5 = $this->update("ketqua", ['gia'=>$item['gia_dat']], " phien = $phien ");

                                }else{

                                    $ketqua= ['phien'=>$phien,'dat_hang'=>$item['id'],'so_luong'=>$totalcl,'gia'=>$item['gia_dat'],'tinh_trang'=>1];

                                    $query3 = $this->insert("ketqua", $ketqua);

                                    $query5 = $this->update("ketqua", ['gia'=>$item['gia_dat']], " phien = $phien ");

                                    break;

                                }

                                $totalcl= $totalcl-(int)$item['so_luong'];

                            }



                         }

                     }

                 }else{

                    break;

                 }

             }

        }

    }



    function guiketqua(){

        $query = $this->db->query("SELECT *,

         (SELECT name FROM dathang WHERE id=a.dat_hang LIMIT 1) AS name,

         (SELECT dien_thoai FROM dathang WHERE id=a.dat_hang LIMIT 1) AS sdt,

         (SELECT email FROM dathang WHERE id=a.dat_hang LIMIT 1) AS email,

         (SELECT dia_chi FROM dathang WHERE id=a.dat_hang LIMIT 1) AS diachi,

         (SELECT hinh_anh FROM sanpham WHERE id=(SELECT hang_hoa FROM donhang WHERE id=a.phien LIMIT 1) LIMIT 1) AS hinhanh,

         (SELECT name FROM sanpham WHERE id=(SELECT hang_hoa FROM donhang WHERE id=a.phien LIMIT 1) LIMIT 1) AS sanpham

         FROM ketqua a WHERE tinh_trang =1 ");

        $result  = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($result)>0) {

            foreach ($result as $value) {

                 $noidung='<div style="font-family:&quot;Arial&quot;,Helvetica Neue,Helvetica,sans-serif;line-height:14pt;padding:20px 0px;font-size:14px;max-width:580px;margin:0 auto">

   <div class="adM">

   </div>

   <div style="padding:0 10px;margin-bottom:25px">

      <div class="adM">

      </div>

      <p>Xin chào '.$value['name'].'</p>

      <p>Cảm ơn Anh/chị đã đấu giá tại <strong>VinaTender</strong>!</p>

      <p>Chúc mừng anh chị đã trúng thầu đấu giá với kết quả như sau:</p>

   </div>

   <hr>

   <div style="padding:0 10px">

      <table style="width:100%;border-collapse:collapse;margin-top:20px">

         <thead>

            <tr>

               <th style="text-align:left;width:50%;font-size:medium;padding:5px 0"><strong>Thông tin khách hàng</strong>

               </th>

               <th style="text-align:left;width:50%;font-size:medium;padding:5px 0"><strong>Địa chỉ nhận hàng</strong></th>

            </tr>

         </thead>

         <tbody>

            <tr>

               <td style="padding-right:15px">

                  <table style="width:100%">

                     <tbody>

                        <tr>

                           <td> '.$value['name'].'</td>

                        </tr>

                        <tr>

                           <td> '.$value['sdt'].'</td>

                        </tr>

                        <tr>

                           <td style="word-break:break-word;word-wrap:break-word"><a href="mailto: '.$value['email'].'" target="_blank"> '.$value['email'].'</a></td>

                        </tr>

                        <tr>

                           <td style="word-break:break-word;word-wrap:break-word">

                               '.$value['diachi'].'

                           </td>

                        </tr>

                     </tbody>

                  </table>

               </td>

               <td>

                  <table style="width:100%">

                     <tbody>

                        <tr>

                           <td> '.$value['name'].'</td>

                        </tr>

                        <tr>

                           <td> '.$value['sdt'].'</td>

                        </tr>

                        <tr>

                           <td style="word-break:break-word;word-wrap:break-word">

                              '.$value['diachi'].'

                           </td>

                        </tr>

                     </tbody>

                  </table>

               </td>

            </tr>

         </tbody>

      </table>

      <table style="width:100%;border-collapse:collapse;margin-top:20px">

         <thead>

            <tr>

               <th style="text-align:left;width:50%;font-size:medium;padding:5px 0">Hình thức thanh toán:</th>

               <th style="text-align:left;width:50%;font-size:medium;padding:5px 0"></th>

            </tr>

         </thead>

         <tbody>

            <tr>

               <td style="padding-right:15px">Thanh toán khi giao hàng (COD)</td>

               <td>

               </td>

            </tr>

         </tbody>

      </table>

   </div>

   <div style="margin-top:20px;padding:0 10px">

      <div style="padding-top:10px;font-size:medium"><strong>Thông tin đơn hàng</strong></div>

      <table style="width:100%;margin:10px 0">

         <tbody>

            <tr>

               <td style="width:50%;padding-right:15px">Mã đơn hàng: DSK '.$value['dat_hang'].'</td>

               <td style="width:50%">Ngày đặt hàng: '.date("d/m/Y").'</td>

            </tr>

         </tbody>

      </table>

      <ul style="padding-left:0;list-style-type:none;margin-bottom:0">

         <li>

            <table style="width:100%;border-bottom:1px solid #e4e9eb">

               <tbody>

                  <tr>

                     <td style="width:100%;padding:25px 10px 0px 0" colspan="2">

                        <div style="float:left;width:80px;height:80px;border:1px solid #ebeff2;overflow:hidden">

                           <img style="max-width:100%;max-height:100%" src="'.$value['hinhanh'].'" class="CToWUd">

                        </div>

                        <div style="margin-left:100px">

                           <a style="color:#357ebd;text-decoration:none" target="_blank">'.$value['sanpham'].'</a>

                           <p style="color:#678299;margin-bottom:0;margin-top:8px">

                              Mặc định

                           </p>

                           <p style="color:#678299;margin-bottom:0;margin-top:8px">SKU: DSK'.$value['phien'].'</p>

                        </div>

                     </td>

                  </tr>

                  <tr>

                     <td style="width:70%;padding:5px 0px 25px">

                        <div style="margin-left:100px">

                           '.number_format($value['gia']).' VND <span style="margin-left:20px">x '.$value['so_luong'].'</span>

                        </div>

                     </td>

                     <td style="text-align:right;width:30%;padding:5px 0px 25px">

                        '.number_format(($value['gia']*$value['so_luong'])).' VND

                     </td>

                  </tr>

               </tbody>

            </table>

         </li>

      </ul>

      <table style="width:100%;border-collapse:collapse;margin-bottom:50px;margin-top:10px">

         <tbody>

            <tr>

               <td style="width:20%"></td>

               <td style="width:80%">

                  <table style="width:100%;float:right">

                     <tbody>

                        <tr>

                           <td style="padding-bottom:10px">Phí vận chuyển:</td>

                           <td style="font-weight:bold;text-align:right;padding-bottom:10px">

                              Thỏa thuận

                           </td>

                        </tr>

                        <tr style="border-top:1px solid #e5e9ec">

                           <td style="padding-top:10px">Thành tiền</td>

                           <td style="font-weight:bold;text-align:right;font-size:16px;padding-top:10px">

                              '.number_format(($value['gia']*$value['so_luong'])).' VND

                           </td>

                        </tr>

                     </tbody>

                  </table>

               </td>

            </tr>

         </tbody>

      </table>

   </div>

   <div style="clear:both"></div>



   <div style="clear:both"></div>

   <div style="padding:0 10px">

      <div style="clear:both"></div>

      <p style="margin:30px 0">VINATENDER sẽ liên hệ với a/c để hoàn thành thủ tục giao hàng và thanh toán !</p>

      <p style="text-align:right"><i>Trân trọng,</i></p>

      <p style="text-align:right"><strong>Trung tâm CSKH VinaTender</strong></p>

   </div>

</div>';

$this->update("ketqua",['tinh_trang'=>2],'id='.$value['id']);

// $this->sendmail('VinaTender',$value['email'],'','Kết quả đấu giá',$noidung);

}

return true;



        }else{

            return true;

        }

    }



    function thongtin()

    {

        $query = $this->db->query("SELECT * FROM " . thongtin);

        // echo var_dump("SELECT * FROM " . thongtin); exit();

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }



    function thongtin_en()

    {

        $query = $this->db->query("SELECT * FROM thongtin_en ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }



    function topmenu()

    {

        $dieukien = " WHERE tinh_trang=1 AND cha=0 ";

        $query = $this->db->query("SELECT * FROM " . menu . " $dieukien  ORDER BY thu_tu ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function topmenu_en()

    {

        $dieukien = " WHERE tinh_trang=1 AND cha=0 ";

        $query = $this->db->query("SELECT * FROM menu_en $dieukien  ORDER BY thu_tu ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function submenu($cha)

    {

        $temp = array();

        $dieukien = " WHERE tinh_trang=1 AND cha=$cha ";

        $query = $this->db->query("SELECT * FROM " . menu . " $dieukien ORDER BY thu_tu  ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }



    function danhmucsp()

    {

        $query = $this->db->query("SELECT * FROM " . danhmucsp . " WHERE tinh_trang=1 AND cha=0 ORDER BY thu_tu ASC  ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getphien($phien)

    {

       $query = $this->db->query(" SELECT *,

         (SELECT COUNT(id) FROM dathang WHERE phien=a.id AND tinh_trang=1) AS total,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id AND tinh_trang=1) AS soluong,

         (SELECT MAX(gia_dat) FROM dathang WHERE phien=a.id AND tinh_trang=1) AS caonhat,

         (SELECT MIN(gia_dat) FROM dathang WHERE phien=a.id AND tinh_trang=1) AS thapnhat

         FROM donhang a WHERE id=$phien  ");

        $temp= $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0];

    }



    function getphien1($id,$phien)

    {

       $query = $this->db->query(" SELECT *,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

         (SELECT nsx FROM sanpham WHERE id=a.hang_hoa) AS nha_sx,

         (SELECT id FROM sanpham WHERE id=a.hang_hoa) AS idsp,

         (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

         (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a WHERE id=$phien  ");

        $temp= $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0];

    }



    function getbanner()

    {

        $query = $this->db->query("SELECT * FROM banner WHERE publish=1 AND com=1 ORDER BY thu_tu ASC LIMIT 3");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getbanner1()

    {

        $query = $this->db->query("SELECT * FROM banner WHERE publish=1 AND com=2 ORDER BY id DESC LIMIT 1 ");

        $temp= $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0];

    }



    function getbanner2()

    {

        $query = $this->db->query("SELECT * FROM banner WHERE publish=1 AND com=3 ORDER BY id DESC LIMIT 2 ");

        $temp= $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }



    function getbannerqc()

    {

        $query = $this->db->query("SELECT * FROM banner WHERE publish=1 AND com=4 ORDER BY id DESC LIMIT 1 ");

        $temp= $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0];

    }



    function gettinh()

    {

        $query = $this->db->query("SELECT id,name FROM tinh WHERE tinh_trang=1 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getnsx($id)

    {

        $query = $this->db->query("SELECT name FROM nsx WHERE id=$id ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        if (isset($temp[0]['name']))

            return $temp[0]['name'];

        else

            return 'Unknown';

    }



    function getcity($id)

    {

        $query = $this->db->query("SELECT name FROM tinh WHERE id=$id ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0]['name'];

    }



    function getquanhuyen($id)

    {

        $query = $this->db->query("SELECT name FROM huyen WHERE id=$id ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0]['name'];

    }





    function daugia()

    {

        $date=date("Y-m-d H:i:s");

        // $query = $this->db->query(" SELECT *,

        //  (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        //  (SELECT id FROM sanpham WHERE id=a.hang_hoa) AS idsp,

        //  (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        //  (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url,

        //  (SELECT max(gia_dat) FROM dathangct WHERE san_pham=a.hang_hoa) AS giamax,

        //  (SELECT min(gia_dat) FROM dathangct WHERE san_pham=a.hang_hoa) AS giamin,

        //  (SELECT SUM(so_luong) FROM dathangct WHERE san_pham=a.hang_hoa) AS sldat,

        //  (SELECT COUNT(id) FROM dathangct WHERE san_pham=a.hang_hoa) AS sokhach,

        //  (SELECT date_end FROM donhang WHERE id=a.don_hang LIMIT 1) AS date_end

        //  FROM hanghoa a WHERE don_hang IN(SELECT id FROM donhang WHERE tinh_trang=1 AND donhang.date<='$date' AND donhang.date_end>='$date') AND noi_bat=1 ");

        $query = $this->db->query(" SELECT *,

         (SELECT COUNT(id) FROM dathang WHERE phien=a.id) AS sokhach,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id) AS sldat,

         (SELECT max(gia_dat) FROM dathang WHERE phien=a.id) AS giamax,

         (SELECT min(gia_dat) FROM dathang WHERE phien=a.id) AS giamin,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a WHERE tinh_trang=1 AND noi_bat=1 AND date<='$date' AND date_end>='$date' ");

        return $query->fetchAll(PDO::FETCH_ASSOC);





    }





    // function getdanhmucsearch()

    // {

    //     $result   = array();

    //     $dieukien = " WHERE tinh_trang=1 ";

    //     $query           = $this->db->query("SELECT * FROM danhmucsp $dieukien ");

    //     if ($query)

    //         $result=functions::dequy($query->fetchAll(PDO::FETCH_ASSOC),0,0);

    //     return $result;

    // }







    function banchay()

    {

        $date=date("Y-m-d H:i:s");

        $query = $this->db->query("SELECT *,

        (SELECT COUNT(id) FROM dathang WHERE phien=a.id) AS sokhach,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id) AS sldat,

         (SELECT max(gia_dat) FROM dathang WHERE phien=a.id) AS giamax,

         (SELECT min(gia_dat) FROM dathang WHERE phien=a.id) AS giamin,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        (SELECT slide_1 FROM sanpham WHERE id=a.hang_hoa) AS hinhanh1,

        (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a WHERE tinh_trang=1 AND noi_bat=2 AND date<='$date' AND date_end>='$date' ORDER BY id DESC LIMIT 8 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



     function nhasanxuat()

    {

        $query = $this->db->query("SELECT *,

        (SELECT COUNT(id) FROM sanpham WHERE tinh_trang=1 AND  nsx=a.id) AS soluong

         FROM nsx a WHERE tinh_trang=1 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



     function getdanhmuccon($danhmuc)

    {

        $query = $this->db->query("SELECT *

        FROM " . danhmucsp . " a  WHERE tinh_trang=1 AND cha=$danhmuc ");

        $temp= $query->fetchAll(PDO::FETCH_ASSOC);

        if (isset($temp) && sizeof($temp)>0)

            return $temp;

        else

            return array();

    }



    function getdanhmuccon1($danhmuc,$trang,$loc)

    {

        $from= ($trang-1)*9;

        if ($loc==0)

            $order= " ORDER BY id DESC ";

        elseif($loc==1)

             $order= " ORDER BY name ASC ";

        else

             $order= " ORDER BY name DESC ";

        $query = $this->db->query("SELECT *,

        (SELECT COUNT(id) FROM sanpham WHERE danh_muc= a.id) AS tong,

        IF(hinh_anh='0','uploads/home/INA_t.jpg',hinh_anh) AS hinh_anh

        FROM " . danhmucsp . " a  WHERE tinh_trang=1 AND cha=$danhmuc $order LIMIT $from,9 ");

        $temp= $query->fetchAll(PDO::FETCH_ASSOC);

        if (isset($temp) && sizeof($temp)>0)

            return $temp;

        else

            return array();

    }



    function getsanphammoi()

    {

        $date=date("Y-m-d H:i:s");

        $query = $this->db->query(" SELECT *,

         (SELECT COUNT(id) FROM dathang WHERE phien=a.id) AS sokhach,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id) AS sldat,

         (SELECT max(gia_dat) FROM dathang WHERE phien=a.id) AS giamax,

         (SELECT min(gia_dat) FROM dathang WHERE phien=a.id) AS giamin,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        (SELECT slide_1 FROM sanpham WHERE id=a.hang_hoa) AS hinhanh1,

        (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a WHERE tinh_trang=1 AND noi_bat=1 AND date<='$date' AND date_end>='$date' LIMIT 8 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);



    }



    function getsanphamclc()

    {

        $date=date("Y-m-d H:i:s");

        $query = $this->db->query(" SELECT *,

         (SELECT COUNT(id) FROM dathang WHERE phien=a.id) AS sokhach,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id) AS sldat,

         (SELECT max(gia_dat) FROM dathang WHERE phien=a.id) AS giamax,

         (SELECT min(gia_dat) FROM dathang WHERE phien=a.id) AS giamin,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        (SELECT slide_1 FROM sanpham WHERE id=a.hang_hoa) AS hinhanh1,

        (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a WHERE tinh_trang=1 AND noi_bat=3 AND date<='$date' AND date_end>='$date' LIMIT 8 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function gethangthanhly()

    {

        $date=date("Y-m-d H:i:s");

        $query = $this->db->query(" SELECT *,

         (SELECT COUNT(id) FROM dathang WHERE phien=a.id) AS sokhach,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id) AS sldat,

         (SELECT max(gia_dat) FROM dathang WHERE phien=a.id) AS giamax,

         (SELECT min(gia_dat) FROM dathang WHERE phien=a.id) AS giamin,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        (SELECT slide_1 FROM sanpham WHERE id=a.hang_hoa) AS hinhanh1,

        (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a WHERE tinh_trang=1 AND noi_bat=4 AND date<='$date' AND date_end>='$date' LIMIT 8 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getthucphamsach()

    {

        $date=date("Y-m-d H:i:s");

        $query = $this->db->query(" SELECT *,

         (SELECT COUNT(id) FROM dathang WHERE phien=a.id) AS sokhach,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id) AS sldat,

         (SELECT max(gia_dat) FROM dathang WHERE phien=a.id) AS giamax,

         (SELECT min(gia_dat) FROM dathang WHERE phien=a.id) AS giamin,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        (SELECT slide_1 FROM sanpham WHERE id=a.hang_hoa) AS hinhanh1,

        (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a WHERE tinh_trang=1 AND noi_bat=5 AND date<='$date' AND date_end>='$date' LIMIT 8 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getsanpham_dm($danhmuc)

    {

        $date=date("Y-m-d H:i:s");

        $query = $this->db->query(" SELECT COUNT(1) AS total FROM danhmucsp WHERE cha = $danhmuc ");

        $temp =  $query->fetchAll(PDO::FETCH_ASSOC);

        if($temp[0]['total']>0)

            $query = $this->db->query(" SELECT id

                FROM donhang a WHERE tinh_trang=1 AND date<='$date' AND date_end>='$date'

                AND hang_hoa IN (SELECT id FROM sanpham WHERE danh_muc=$danhmuc OR danh_muc IN (SELECT id FROM danhmucsp WHERE cha = $danhmuc) )  ");

        else

            $query = $this->db->query(" SELECT id

                FROM donhang a WHERE tinh_trang=1 AND date<='$date' AND date_end>='$date'

                AND hang_hoa IN (SELECT id FROM sanpham WHERE danh_muc=$danhmuc)  ");



        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getsanpham_dm1($danhmuc,$trang)

    {

        $from= ($trang-1)*12;

        $date=date("Y-m-d H:i:s");

        $query = $this->db->query(" SELECT *,

         (SELECT COUNT(id) FROM dathang WHERE phien=a.id) AS sokhach,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id) AS sldat,

         (SELECT max(gia_dat) FROM dathang WHERE phien=a.id) AS giamax,

         (SELECT min(gia_dat) FROM dathang WHERE phien=a.id) AS giamin,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        (SELECT slide_1 FROM sanpham WHERE id=a.hang_hoa) AS hinhanh1,

        (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a WHERE tinh_trang=1 AND date<='$date' AND date_end>='$date' AND hang_hoa IN(SELECT id FROM sanpham WHERE danh_muc=$danhmuc OR danh_muc IN (SELECT id FROM danhmucsp WHERE cha = $danhmuc) ) LIMIT $from,12  ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getsanphamall($k)

    {

        $date=date("Y-m-d H:i:s");

        $dieukien = "WHERE tinh_trang=1 AND date<='$date' AND date_end>='$date'";

        if($k > 0){

            $dieukien .= " AND noi_bat=$k";

        }

        $query = $this->db->query(" SELECT id

         FROM donhang a $dieukien ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getsanphamsearch($key)

    {

       $date=date("Y-m-d H:i:s");

        $query = $this->db->query(" SELECT id

         FROM donhang a WHERE tinh_trang=1 AND hang_hoa IN(SELECT id FROM sanpham WHERE name LIKE'%$key%' OR mo_ta LIKE'%$key%') AND date<='$date' AND date_end>='$date'  ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getsanphamsearch1($key,$trang)

    {

        $from= ($trang-1)*12;

        $date=date("Y-m-d H:i:s");

        $query = $this->db->query(" SELECT *,

         (SELECT COUNT(id) FROM dathang WHERE phien=a.id) AS sokhach,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id) AS sldat,

         (SELECT max(gia_dat) FROM dathang WHERE phien=a.id) AS giamax,

         (SELECT min(gia_dat) FROM dathang WHERE phien=a.id) AS giamin,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        (SELECT slide_1 FROM sanpham WHERE id=a.hang_hoa) AS hinhanh1,

        (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a WHERE tinh_trang=1 AND hang_hoa IN(SELECT id FROM sanpham WHERE name LIKE'%$key%' OR mo_ta LIKE'%$key%') AND date<='$date' AND date_end>='$date' LIMIT $from,12  ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getsanphamall1($trang,$k)

    {

        $from= ($trang-1)*12;

        $date=date("Y-m-d H:i:s");

        $dieukien = "WHERE tinh_trang=1 AND date<='$date' AND date_end>='$date'";

        if($k > 0){

            $dieukien .= " AND noi_bat=$k";

        }

        $query = $this->db->query(" SELECT *,

         (SELECT COUNT(id) FROM dathang WHERE phien=a.id) AS sokhach,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id) AS sldat,

         (SELECT max(gia_dat) FROM dathang WHERE phien=a.id) AS giamax,

         (SELECT min(gia_dat) FROM dathang WHERE phien=a.id) AS giamin,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        (SELECT slide_1 FROM sanpham WHERE id=a.hang_hoa) AS hinhanh1,

        (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a $dieukien LIMIT $from,12  ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function online(){

        $guest_id = session_id();

        $time = time();

        $time_check = $time-100;

        $query = $this->db->query(" SELECT * FROM guest_online WHERE guest_id='$guest_id' ");

        $tc = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($tc)==0) {

             $data = array(

                        'guest_id' => $guest_id,

                        'time' => $time

                    );

            $this->insert('guest_online', $data);

        }else{

            $data = array(

                        'time' => $time

                    );

            $this->update('guest_online', $data, " guest_id=$guest_id ");

        }

        $query1 = $this->db->query("SELECT * FROM guest_online ");

        $online = $query1->fetchAll(PDO::FETCH_ASSOC);

        $count_user= sizeof($online);

        $this->delete("guest_online"," time<$time_check ");

        return $count_user;

    }



    function totalviews()

    {

        $result = array();

        $dieukien = " WHERE tinh_trang>0 ";

        $query = $this->db->query("SELECT count(id) as total FROM views $dieukien");

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result[0]['total'];

    }



    function checkviews()

    {

        $session = session_id();

        $ip = $_SERVER['REMOTE_ADDR'];

//        $ip = '118.78.12.13';

        if ($session != '' && $ip != '') {

            $query = $this->db->query("SELECT * FROM views

            WHERE sessions='$session' AND ip='$ip' AND tinh_trang>0 ORDER BY id DESC LIMIT 1");

            $views = $query->fetchAll(PDO::FETCH_ASSOC);

            if ($views) {

                $city = $views[0]['city'];

                $loc = $views[0]['loc'];

                $time1 = strtotime($views[0]['times']);

                $time2 = strtotime(date('Y-m-d H:i:s'));

                if (($time2 - $time1) > 3600) {

                    $data = array(

                        'sessions' => $session,

                        'ip' => $ip,

                        'city' => $city,

                        'loc' => $loc,

                        'times' => date('Y-m-d H:i:s'),

                        'tinh_trang' => 1

                    );

                    $this->insert('views', $data);

                }

            } else {

                $query = $this->db->query("SELECT city,loc FROM views

                WHERE ip='$ip' AND tinh_trang>0 ORDER BY id DESC LIMIT 1");

                $views = $query->fetchAll(PDO::FETCH_ASSOC);

                if ($views) {

                    $city = $views[0]['city'];

                    $loc = $views[0]['loc'];

                } else {

                    $details = json_decode(file_get_contents("https://ipwhois.app/json/$ip"), true);

                    $city = isset($details['city']) ? $details['city'] : '';

                    $lat = isset($details['latitude']) ? $details['latitude'] : '';

                    $lon = isset($details['longitude']) ? $details['longitude'] : '';

                    $loc = $lat . ',' . $lon;

                }

                $dataview = array(

                    'sessions' => $session,

                    'ip' => $ip,

                    'city' => $city,

                    'loc' => $loc,

                    'times' => date('Y-m-d H:i:s'),

                    'tinh_trang' => 1

                );

                $this->insert('views', $dataview);

            }

        }

    }



    function search_post($keyword){

     $query = $this->db->query("SELECT id

      FROM ".sanpham." WHERE tinh_trang = 1 AND (name LIKE '%".$keyword."%' OR mo_ta LIKE '%".$keyword."%' OR mo_ta_en LIKE '%".$keyword."%' OR noi_dung LIKE '%".$keyword."%' OR noi_dung_en LIKE '%".$keyword."%') ORDER BY id DESC ");

     if ($query)

       return $query->fetchAll(PDO::FETCH_ASSOC);

     else

      return array();

   }



   function search_post3($keyword,$trang){

     $from= ($trang-1)*30;

     $query = $this->db->query("SELECT *,

        (SELECT name FROM danhmucsp WHERE id=danh_muc) AS danhmuc,

        (SELECT name_en FROM danhmucsp WHERE id=danh_muc) AS danhmuc_en,

        (SELECT url FROM danhmucsp WHERE id=danh_muc) AS urldanhmuc,

        (SELECT name FROM nsx WHERE id=nsx) AS nsx,

        (SELECT name_en FROM nsx WHERE id=nsx) AS nsx_en,

        (SELECT id FROM nsx WHERE id=nsx) AS idnsx

      FROM ".sanpham." WHERE tinh_trang = 1 AND (name LIKE '%".$keyword."%' OR mo_ta LIKE '%".$keyword."%' OR mo_ta_en LIKE '%".$keyword."%' OR noi_dung LIKE '%".$keyword."%' OR noi_dung_en LIKE '%".$keyword."%') ORDER BY id DESC LIMIT $from,30 ");

     if ($query)

       return $query->fetchAll(PDO::FETCH_ASSOC);

     else

      return array();

   }



    function phukien($sanpham)

    {

        $query = $this->db->query("SELECT *

         FROM phukien WHERE tinh_trang=1 AND (san_pham LIKE '$sanpham' OR san_pham LIKE '$sanpham,%' OR san_pham LIKE '%,$sanpham' OR san_pham LIKE '%,$sanpham,%') ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function cungdanhmuc($danhmuc)

    {

        $date=date("Y-m-d H:i:s");

        $query = $this->db->query("SELECT *,

         (SELECT id FROM donhang WHERE tinh_trang=1 AND hang_hoa= )

         FROM " . sanpham . " WHERE tinh_trang=1 AND danh_muc=$danhmuc AND id IN(SELECT hang_hoa FROM donhang WHERE tinh_trang=1 AND date<='$date' AND date_end>='$date') ORDER BY id DESC LIMIT 4 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }







    function getsanphammoi1()

    {

        $date=date("Y-m-d H:i:s");

        $query = $this->db->query(" SELECT *,

         (SELECT COUNT(id) FROM dathang WHERE phien=a.id) AS sokhach,

         (SELECT SUM(so_luong) FROM dathang WHERE phien=a.id) AS sldat,

         (SELECT max(gia_dat) FROM dathang WHERE phien=a.id) AS giamax,

         (SELECT min(gia_dat) FROM dathang WHERE phien=a.id) AS giamin,

         (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS name,

        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) AS hinhanh,

        (SELECT slide_1 FROM sanpham WHERE id=a.hang_hoa) AS hinhanh1,

        (SELECT url FROM sanpham WHERE id=a.hang_hoa) AS url

         FROM donhang a WHERE tinh_trang=1 AND date<='$date' AND date_end>='$date' LIMIT 4 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);



    }



     function getlink()

    {

        $query = $this->db->query("SELECT *

         FROM links WHERE tinh_trang=1 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function themnsx($cha,$nameen,$i,$namevn)

    {

        if ($cha==2) {

            $cha1=0;

        }elseif ($cha==4) {

            $query = $this->db->query("SELECT id FROM danhmucsp WHERE tinh_trang = 1 AND com=2 ORDER BY id DESC LIMIT 1 ");

            $temp=$query->fetchAll(PDO::FETCH_ASSOC);

            $cha1=$temp[0]['id'];

        }elseif ($cha==6) {

            $query = $this->db->query("SELECT id FROM danhmucsp WHERE tinh_trang = 1 AND com=4 ORDER BY id DESC LIMIT 1 ");

            $temp=$query->fetchAll(PDO::FETCH_ASSOC);

            $cha1=$temp[0]['id'];

        }elseif ($cha==8) {

            $query = $this->db->query("SELECT id FROM danhmucsp WHERE tinh_trang = 1 AND com=6 ORDER BY id DESC LIMIT 1 ");

            $temp=$query->fetchAll(PDO::FETCH_ASSOC);

            $cha1=$temp[0]['id'];

        }elseif ($cha==10) {

            $query = $this->db->query("SELECT id FROM danhmucsp WHERE tinh_trang = 1 AND com=8 ORDER BY id DESC LIMIT 1 ");

            $temp=$query->fetchAll(PDO::FETCH_ASSOC);

            $cha1=$temp[0]['id'];

        }elseif ($cha==12) {

            $query = $this->db->query("SELECT id FROM danhmucsp WHERE tinh_trang = 1 AND com=10 ORDER BY id DESC LIMIT 1 ");

            $temp=$query->fetchAll(PDO::FETCH_ASSOC);

            $cha1=$temp[0]['id'];

        }elseif ($cha==14) {

            $query = $this->db->query("SELECT id FROM danhmucsp WHERE tinh_trang = 1 AND com=12 ORDER BY id DESC LIMIT 1 ");

            $temp=$query->fetchAll(PDO::FETCH_ASSOC);

            $cha1=$temp[0]['id'];

        }

        $url = functions::convertname($nameen);

        if ($namevn=='')

            $namevn=$nameen;

        $data= array('url'=>$url,'name'=>$namevn,'name_en'=>$nameen,'cha'=>$cha1,'com'=>$cha,'thu_tu'=>$i,'tinh_trang'=>1);

        $abc = $this->insert("danhmucsp", $data);

        return $abc;

    }



     function search_post1($loc){

      if ($loc==0)

            $order= " ORDER BY id DESC ";

        elseif($loc==1)

             $order= " ORDER BY name ASC ";

        elseif($loc==2)

             $order= " ORDER BY name DESC ";

        elseif($loc==3)

             $order= " ORDER BY gia_ban ASC ";

        else

             $order= " ORDER BY gia_ban DESC ";

     $query = $this->db->query("SELECT id

      FROM ".sanpham." WHERE tinh_trang = 1 $order ");

     if ($query)

       return $query->fetchAll(PDO::FETCH_ASSOC);

     else

      return array();

   }



    function search_post2($trang,$loc){

      if ($loc==0)

            $order= " ORDER BY id DESC ";

        elseif($loc==1)

             $order= " ORDER BY name ASC ";

        elseif($loc==2)

             $order= " ORDER BY name DESC ";

        elseif($loc==3)

             $order= " ORDER BY gia_ban ASC ";

        else

             $order= " ORDER BY gia_ban DESC ";

     $from=($trang-1)*30;

     $query = $this->db->query("SELECT *,

        (SELECT name FROM danhmucsp WHERE id=danh_muc) AS danhmuc,

        (SELECT name_en FROM danhmucsp WHERE id=danh_muc) AS danhmuc_en,

        (SELECT url FROM danhmucsp WHERE id=danh_muc) AS urldanhmuc,

        (SELECT name FROM nsx WHERE id=nsx) AS nsx,

        (SELECT name_en FROM nsx WHERE id=nsx) AS nsx_en,

        (SELECT id FROM nsx WHERE id=nsx) AS idnsx

      FROM ".sanpham." WHERE tinh_trang = 1 $order LIMIT $from,30 ");

     if ($query)

       return $query->fetchAll(PDO::FETCH_ASSOC);

     else

      return array();

   }









    function pageinfo($url)

    {

        $page = array();

        if ($url[0] == 'blog')

            if (sizeof($url) == 2) {

                $query = $this->db->query("SELECT *,

                    DATE_FORMAT(ngay_dang, '%d/%m/%Y') as ngaydang,

                   (SELECT name FROM admin WHERE id=author) AS nhanvien,

                   (SELECT name FROM danhmuc WHERE id=danh_muc) AS danhmuc,

                   (SELECT url FROM danhmuc WHERE id=danh_muc) AS danhmucurl



                   FROM " . baiviet . " WHERE url='" . $url[1] . "' AND tinh_trang=1 ");

                $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                $page['title'] = $temp[0]['name'];

                $page['description'] = $temp[0]['mo_ta'];

                $page['keywords'] = $temp[0]['tag'];

                $page['image'] = $temp[0]['hinh_anh'];

                $page['data'] = $temp[0];

            }elseif(sizeof($url) == 3){

                $query = $this->db->query("SELECT * FROM danhmuc WHERE tinh_trang=1 AND url='" . $url[2] . "' ");

                $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                $page['title'] = $temp[0]['name'];

                $page['description'] = $temp[0]['mo_ta'];

                $page['keywords'] = $temp[0]['name'];

                $page['image'] = $temp[0]['hinh_anh'];

                $page['data'] = $temp;

            } else {

                $query = $this->db->query("SELECT * FROM ".baiviet." WHERE tinh_trang=1 ");

                $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                $page['title'] = 'Tin mới';

                $page['description'] = 'Tin tức mới nhất';

                $page['keywords'] = 'Tin tức';

                $page['image'] = $temp[0]['hinh_anh'];

                $page['data'] = $temp;

            }

        elseif ($url[0] == 'product')

            if (sizeof($url) == 2) {

                $query = $this->db->query("SELECT *,

                  (SELECT name FROM ".danhmucsp." WHERE id=danh_muc) AS danhmuc,

                  (SELECT name_en FROM ".danhmucsp." WHERE id=danh_muc) AS danhmuc_en,

                  (SELECT name FROM nsx WHERE id=nsx) AS nsx,

                  (SELECT name_en FROM nsx WHERE id=nsx) AS nsx_en,

                  (SELECT url FROM ".danhmucsp." WHERE id=danh_muc) AS danhmucurl

                  FROM " . sanpham . " WHERE url='" . $url[1] . "' ");

                $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                $page['title'] = $temp[0]['name'];

                $page['description'] =$temp[0]['name'];

                $page['keywords'] = $temp[0]['tag'];

                $page['image'] = $temp[0]['hinh_anh'];

                $page['data'] = $temp[0];

            } elseif(sizeof($url) == 3) {

                $query = $this->db->query("SELECT * FROM ".danhmucsp." WHERE url='$url[2]' ");

                $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                if (isset($temp) && sizeof($temp)>0) {

                $page['title'] = $temp[0]['name'];

                $page['description'] = $temp[0]['mo_ta'];

                $page['keywords'] = $temp[0]['name'];

                $page['cha'] = $temp[0]['cha'];

                $page['id'] = $temp[0]['id'];

                $page['image'] = $temp[0]['hinh_anh'];

                $page['data'] = $temp[0];

                }else{

                    $query = $this->db->query("SELECT * FROM " . thongtin);

                    $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                    $page['title'] = $temp[0]['value'];

                    $page['description'] = $temp[5]['value'];

                    $page['keywords'] = $temp[6]['value'];

                    $page['image'] = $temp[7]['value'];

                    $page['data']= array();

                }

            }else{

                $query = $this->db->query("SELECT * FROM ".danhmucsp." WHERE tinh_trang=1 ");

                $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                if (isset($temp) && sizeof($temp)>0) {

                $page['title'] = $temp[0]['name'];

                $page['description'] = $temp[0]['mo_ta'];

                $page['keywords'] = $temp[0]['name'];

                $page['cha'] = $temp[0]['cha'];

                $page['id'] = $temp[0]['id'];

                $page['image'] = $temp[0]['hinh_anh'];

                $page['data'] = $temp[0];

                }else{

                    $query = $this->db->query("SELECT * FROM " . thongtin);

                    $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                    $page['title'] = $temp[0]['value'];

                    $page['description'] = $temp[5]['value'];

                    $page['keywords'] = $temp[6]['value'];

                    $page['image'] = $temp[7]['value'];

                    $page['data']= array();

                }

            }

        else {

            if (isset($_SESSION['en']) && $_SESSION['en']>0) {

                $query = $this->db->query("SELECT * FROM thongtin_en ");

                $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                $page['title'] = $temp[0]['value'];

                $page['description'] = $temp[5]['value'];

                $page['keywords'] = $temp[6]['value'];

                $page['image'] = $temp[7]['value'];

                $page['data']['nhanvien'] = 'Admin';

            }else{

                $query = $this->db->query("SELECT * FROM " . thongtin);

                $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                $page['title'] = $temp[0]['value'];

                $page['description'] = $temp[5]['value'];

                $page['keywords'] = $temp[6]['value'];

                $page['image'] = $temp[7]['value'];

                $page['data']['nhanvien'] = 'Admin';

            }

        }

        return $page;

    }



    function homepro($com,$limit)

    {

        $query = $this->db->query("SELECT * FROM " . sanpham . " WHERE tinh_trang=1 AND com=$com ORDER BY id DESC LIMIT $limit ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function homeblog($com,$limit)

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 AND com=$com ORDER BY id DESC LIMIT $limit ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function newpost($limit)

    {

        $query = $this->db->query("SELECT *,

            DATE_FORMAT(updated, '%d/%m/%Y') as ngaydang

         FROM " . baiviet . " WHERE tinh_trang=1 ORDER BY id DESC LIMIT $limit ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function dieukhoan()

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 AND danh_muc=16 ORDER BY id DESC LIMIT 6 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function danhmuc()

    {

        $query = $this->db->query("SELECT *, (SELECT count(1) FROM ".baiviet." WHERE tinh_trang=1 AND danh_muc=a.id) AS total

        FROM " . danhmuc . " a WHERE tinh_trang=1 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



     function getsanphamcart($id)

   {

       $query = $this->db->query("SELECT * FROM " . sanpham . " WHERE tinh_trang=1 AND id=$id ");

       $temp= $query->fetchAll(PDO::FETCH_ASSOC);

       return $temp[0];

   }



   function getbaiviet1($trang)

   {

       $from= ($trang-1)*5;

       $query = $this->db->query("SELECT *,

         DATE_FORMAT(updated, '%d/%m/%Y') as ngaydang,

         (SELECT name FROM danhmuc WHERE id=danh_muc) AS danhmuc,

         (SELECT url FROM danhmuc WHERE id=danh_muc) AS urldanhmuc

        FROM " . baiviet . " WHERE tinh_trang=1 ORDER BY id DESC LIMIT $from,5 ");

       $temp= $query->fetchAll(PDO::FETCH_ASSOC);

       return $temp;

   }



   function getbaivietdanhmuc($danhmuc)

   {

       $query = $this->db->query("SELECT id

        FROM " . baiviet . " WHERE tinh_trang=1 AND danh_muc=$danhmuc ");

       $temp= $query->fetchAll(PDO::FETCH_ASSOC);

       return $temp;

   }



   function getbaivietdanhmuc1($danhmuc,$trang)

   {

        $from= ($trang-1)*5;

       $query = $this->db->query("SELECT *,

         DATE_FORMAT(updated, '%d/%m/%Y') as ngaydang,

         (SELECT name FROM danhmuc WHERE id=danh_muc) AS danhmuc,

         (SELECT url FROM danhmuc WHERE id=danh_muc) AS urldanhmuc

        FROM " . baiviet . " WHERE tinh_trang=1 AND danh_muc=$danhmuc ORDER BY id DESC LIMIT $from,5 ");

       $temp= $query->fetchAll(PDO::FETCH_ASSOC);

       return $temp;

   }



   function adddonhang($name,$email,$sdt,$diachi,$sp,$sl,$date,$ghichu)

   {

       $query = $this->db->query("INSERT ".dathang." (name,email,sdt,dia_chi,id_sp,so_luong,ngay_gio,ghi_chu,tinh_trang) VALUES (N'$name','$email','$sdt',N'$diachi','$sp','$sl','$date',N'$ghichu',1) ");

       return $query;

   }





    function tongsp($danhmuc)

    {

        $query = $this->db->query("SELECT id

                   FROM " . sanpham . " WHERE tinh_trang=1 AND danh_muc=$danhmuc ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }



    function danhmuchome()

    {

        $query = $this->db->query("SELECT * FROM " . danhmucsp . " WHERE tinh_trang=1 AND cha=0 ORDER BY id DESC LIMIT 3 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function danhmuchome1()

    {

        $query = $this->db->query("SELECT * FROM " . danhmucsp . " WHERE tinh_trang=1 AND cha=0 ORDER BY id ASC LIMIT 4 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



     function getcha($dmcon)

    {

        $query = $this->db->query("SELECT * FROM " . danhmucsp . " WHERE id=(SELECT cha FROM danhmucsp WHERE id=$dmcon LIMIT 1) ");

        $temp= $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0];

    }







    function gioithieu($danhmuc)

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 AND danh_muc=$danhmuc ORDER BY id DESC LIMIT 1 ");

        $temp= $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0];

    }



    function muahang($danhmuc)

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 AND danh_muc=$danhmuc ORDER BY id DESC LIMIT 1 ");

        $temp= $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0];

    }



    function catchuoi($str,$num)

    {

        $result = '';

        $words = explode(" ",$str);

        $num = ($num<count($words))?$num:count($words);

        for ($i=0;$i<$num;$i++) $result.=$words[$i].' ';

        $result.='...';

        return $result;

    }



    function demgiohang()

    {

        $soluong = 0;

        if(isset($_SESSION['giohang']) && ($_SESSION['giohang']!='')) {

            $giohang = explode(',',$_SESSION['giohang']); // tách chuỗi cart thành 1 mảng array items

            // $temp = array_count_values($giohang);

            $soluong = count($giohang);

        }

        return $soluong;

    }



    function thanhpho()

    {

        $query = $this->db->query("SELECT * FROM thanhpho WHERE tinh_trang=1 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function themkhachhang($khachhang)

   {

       $email=$khachhang['email'];

       $query = $this->db->query("SELECT id FROM users_kh WHERE tinh_trang=1 AND email='$email' ");

       $temp=$query->fetchAll(PDO::FETCH_ASSOC);

       if (sizeof($temp)>0) {

           return $temp[0]['id'];

       }else{

           $query = $this->insert("users_kh", $khachhang);

           $id = $this->db->lastInsertId();

           return $id;

       }



   }



   function themlienhe($lienhe)

   {

       $query = $this->insert("lienhe", $lienhe);

       return $query;

   }



   function adddathang($dathang)

   {

       $query = $this->insert("dathang", $dathang);

       $id = $this->db->lastInsertId();

       return $id;

   }



   function adddathangct($dathangct)

   {

       $query = $this->insert("dathangct", $dathangct);

       return $query;

   }



    function quanhuyen($id)

    {

        $query = $this->db->query("SELECT id,name FROM huyen WHERE tinh_trang=1 AND tinh_thanh=$id ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function cart()

    {

        $cart = [];

        if(isset($_SESSION['giohang']) && ($_SESSION['giohang']!='')) {

            $giohang = explode(',',$_SESSION['giohang']); // tách chuỗi cart thành 1 mảng array items

            $temp = array_count_values($giohang);

            foreach ($temp AS $key=>$item) {

                $query = $this->db->query("SELECT name,hinh_anh,gia_ban FROM " . sanpham . " WHERE id=$key ");

                $sp = $query->fetchAll(PDO::FETCH_ASSOC);

                $cart[]=['id'=>$key,'name'=>$sp[0]['name'],'hinhanh'=>$sp[0]['hinh_anh'],'soluong'=>$item,

                'dongia'=>$sp[0]['gia_ban'],'thanhtien'=>$item*$sp[0]['gia_ban']];

            }

        }

        return $cart;

    }



    function donhang($data,$hoten,$dienthoai)

    {

        $query = $this->db->query("SELECT id, name FROM " . khachhang . " WHERE dien_thoai=$dienthoai ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        if (isset($temp[0]['id'])) {

            $data['khach_hang']=$temp[0]['id'];

            $hoten=$temp[0]['name'];

        } else {

            $khachhang = ['name'=>$hoten, 'dien_thoai'=>$dienthoai, 'thanh_pho'=>$data['thanh_pho'],

              'quan_huyen'=>$data['quan_huyen'],'dia_chi'=>$data['dia_chi']];

            $query = $this->insert(khachhang,$khachhang);

            $id=$this->db->lastInsertId();

            $data['khach_hang']=$id;

        }

        $query = $this->insert(donhang,$data);

        if ($query) {

            $id=$this->db->lastInsertId();

            $giohang = explode(",",$_SESSION['giohang']);

            $hanghoa = array_count_values($giohang);

            foreach ($hanghoa AS $key=>$item) {

                $query = $this->db->query("SELECT gia_ban FROM " . sanpham . " WHERE id=$key ");

                $temp = $query->fetchAll(PDO::FETCH_ASSOC);

                $x = ['don_hang'=>$id, 'hang_hoa'=>$key,'so_luong'=>$item, 'don_gia'=>$temp[0]['gia_ban'],'tinh_trang'=>1];

                $query = $this->insert("hanghoa",$x);

            }

            $from = "Website YBC";

            $email = 'hai@vdata.com.vn';

            $cc = '';

            $subject = "Đơn hàng mới từ website YBC";

            $noidung = 'ĐƠN ĐẶT HÀNG TỪ WEBSITE YBC <br>';

            $noidung.= 'Khách hàng: '. $hoten .'<br>';

            $noidung.= 'Địa chỉ nhận hàng: '. $data['dia_chi'] .'<br>';

            $noidung.= 'Điện thoại: '. $dienthoai .'<br>';

            $noidung.= 'Mã đơn hàng: '. $data['ma_don'] .'<br>';

            $noidung.= 'Số tiền: '. number_format($data['tien_hang']) .'<br>';

            $query = $this->sendmail($from,$email,$cc,$subject,$noidung);

            // $khachhang = ['name'=>$data['name'],'dien_thoai'=>$data['dien_thoai'], 'dia_chi'=>$data['dia_chi'],

            //   'thanh_pho'=>$data['thanh_pho'],'quan_huyen'=>$data['quan_huyen']];

            // $query = $this->insertkhachhang($khachhang);

        }

        return $query;

    }



    function password_generate($chars)

    {

        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';

        return substr(str_shuffle($data), 0, $chars);

    }



    function sendmail($from, $email,$cc,$subject, $noidung)

   {

       $ok = false;

       require_once 'libs/mailin.php';

       $mailin = new Mailin('hotjob.vip@gmail.com', 'pQx0KI4wgC1OjH8P');

       $mailin->

       addTo($email, 'Khách hàng đăng ký từ WEBSITE')->

       // addCc($cc, 'Quản trị viên')->

       setFrom('Daisuko.com@gmail.com', $from)->

       setReplyTo('Daisuko.com@gmail.com', $from)->

       setSubject($subject)->

       setHtml($noidung);

       $ok = $mailin->send();

       if ($ok) {

           $ok = true;

       }

       return $ok;

   }



    function insertkhachhang($data)

    {

        $query = false;

        $dienthoai = $data['dien_thoai'];

        $query = $this->db->query("SELECT COUNT(1) AS numrow FROM ".khachhang." WHERE dien_thoai=$dienthoai AND tinh_trang=1 ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($temp[0]['numrow']==0)

              $query = $this->insert(khachhang, $data);

        return $query;

    }



    function checklogin($sdt, $pass)

    {

        $temp = [];

        $query = $this->db->query("SELECT id, name, dien_thoai FROM ".khachhang." WHERE tinh_trang=1 AND dien_thoai='$sdt' AND password='$pass' LIMIT 1");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($temp)==1)

            $temp[0]['level']=1;  //khach hang

        else {

            $query = $this->db->query("SELECT id, name, dien_thoai, email FROM ".nhanvien." WHERE tinh_trang=1 AND dien_thoai='$sdt' AND password='$pass' LIMIT 1");

            $temp = $query->fetchAll(PDO::FETCH_ASSOC);

            if (count($temp)==1)

                $temp[0]['level']=2 ; //Nhan vien

        }

        return $temp;

    }



    function getdonhang($id,$level)

    {

        $temp = [];

        if ($level==1)

            $dieukien = " WHERE tinh_trang=1 AND khach_hang=$id";

        else

            $dieukien = " WHERE tinh_trang=1 AND nhanvien=$id";

        $query = $this->db->query(" SELECT *,

           (SELECT name FROM nhanvien WHERE id=nhan_vien) AS nhanvien,

           IF(tinh_trang=1,'Đang xử lý',IF(tinh_trang=2,'Đã gửi',IF(tinh_trang=1,'Đã nhận','Hủy'))) AS tinhtrang

           FROM ".donhang." $dieukien  ORDER BY id DESC ");

        if ($query) {

            $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        }

        return $temp;

    }





    //-------------- chua dung den -------------















    function re_pass($id, $pass)

    {

        $pass1 = md5(md5($pass));

        $data = array('password' => $pass1);

        $ok = $this->update(taikhoan, $data, " id=$id ");

        return $ok;

    }



    function getvideo($com)

    {

        $query = $this->db->query("SELECT * FROM " . banner . " WHERE com=$com ORDER BY id DESC LIMIT 1");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }





    function thongtin_tk($id)

    {

        $query = $this->db->query("SELECT * FROM " . taikhoan . " WHERE id=$id");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }



    function MuaTip($sdt, $loaitip)

    {

        $query = $this->db->query("SELECT id,khach_hang  FROM 1_muatip WHERE tinh_trang=0 AND loai_tip=$loaitip");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        $result = 0;

        if ($temp) {

            $kh = explode(',', $temp[0]['khach_hang']);

            if (in_array($sdt, $kh))

                $result = 0;

            else {

                $id = $temp[0]['id'];

                if ($temp[0]['khach_hang'] == '')

                    $khachhang = $temp[0]['khach_hang'] = $sdt;

                else

                    $khachhang = $temp[0]['khach_hang'] .= ',' . $sdt;

                $data = array(

                    'khach_hang' => $khachhang,

                );

                $result = $this->update('1_muatip', $data, " id=$id ");

            }

        } else {

            $khachhang = $sdt;

            $data = array(

                'khach_hang' => $khachhang,

                'loai_tip' => $loaitip

            );

            $result = $this->insert('1_muatip', $data);

        }

            $date = date('Y-m-d H:i:s');

            $query = $this->db->query("SELECT id,tip FROM 1_tip WHERE tinh_trang=0 AND kieu_tip=$loaitip ORDER BY id DESC LIMIT 1");

            $tip = $query->fetchAll(PDO::FETCH_ASSOC);

            if ($tip) {

                $tipid = $tip[0]['id'];

                $query1 = $this->db->query("SELECT id FROM 1_tinnhan WHERE tip=$tipid AND khach_hang=$sdt ");

                $tinnhan = $query1->fetchAll(PDO::FETCH_ASSOC);

                if(!$tinnhan) {

                    $phone = '{"number":"' . $sdt . '","text_param":["' . $tip[0]['tip'] . '"],"user_id":1}';

                    $content = '{"text":"#param#","port":[0],"param":[' . $phone . ']}';

                    $ipapi = $this->info();

                    $url = 'https://' . $ipapi['ip'] . '/api/send_sms';

                    $curl = curl_init($url);

                    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);

                    curl_setopt($curl, CURLOPT_HEADER, true);

                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type:application/json;"));

                    curl_setopt($curl, CURLOPT_USERPWD, "admin:Vdata@123");

                    curl_setopt($curl, CURLOPT_POST, true);

                    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

                    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

                    $result = curl_exec($curl);

                    $split = explode(" ", $result);

                    $split2 = ltrim($split[count($split) - 1], "application/json");

                    $temp = json_decode($split2, true);

                    $ok = $temp['error_code'];

                    curl_close($curl);

                    if ($ok == '202')

                        $tinh_trang = 1;

                    else

                        $tinh_trang = 0;

                    $data = array(

                        'tip' => $tipid,

                        'ngay' => $date,

                        'khach_hang' => $sdt,

                        'tinh_trang' => $tinh_trang

                    );

                    $this->insert('1_tinnhan', $data);

                }

            }

        return $result;

    }



    function checkdienthoai($sdt)

    {

        $query = $this->db->query("SELECT COUNT(1) AS total FROM " . taikhoan . " WHERE sdt='$sdt' ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0]['total'];

    }



    function checkpass($id, $pass)

    {

        $pass1 = md5(md5($pass));

        $query = $this->db->query("SELECT id FROM " . taikhoan . " WHERE id=$id AND password='$pass1' ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }



    function checkdienthoai1($id, $sdt)

    {

        $query = $this->db->query("SELECT COUNT(1) AS total FROM " . taikhoan . " WHERE sdt='$sdt' AND id!=$id");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0]['total'];

    }







    function thanhvien($thanhvien)

    {

        $query = $this->db->query("SELECT *,(SELECT so_du FROM 1_taikhoan WHERE 1_taikhoan.id=1_giaodich.tai_khoan) AS sodu FROM 1_giaodich WHERE tai_khoan=$thanhvien ORDER BY id DESC");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }







    function getpost1($url)

    {

        $dieukien = " WHERE tinh_trang=1  AND blog IN(SELECT id FROM " . danhmuc . " WHERE url='" . $url . "')";

        $query = $this->db->query("SELECT id

          FROM " . baiviet . "  $dieukien");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }











    function hometab()

    {

        $query = $this->db->query("SELECT * FROM " . sanpham . " WHERE tinh_trang=1

        AND danh_muc IN (SELECT id FROM " . cate . " WHERE tinh_trang=1 AND com=1) AND com=3

        ORDER BY luot_xem DESC ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function danhmucbaiviet()

    {

        $query = $this->db->query("SELECT * FROM " . danhmuc . " WHERE tinh_trang=1  ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($temp as $key => $item) {

            $id = $item['id'];

            $query = $this->db->query("SELECT COUNT(1) AS total FROM " . baiviet . "

                WHERE tinh_trang=1 AND (blog LIKE '$id' OR blog LIKE '$id,%' OR blog LIKE '%,$id' OR blog LIKE '%,$id,%') ");

            $baiviet = $query->fetchAll(PDO::FETCH_ASSOC);

            $temp[$key]['total'] = $baiviet[0]['total'];

        }

        return $temp;

    }





    function baivietmoi()

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 ORDER BY id DESC LIMIT 6 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function tamdiem($com)

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 AND com=$com ORDER BY id DESC");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function tinhot()

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 ORDER BY luot_xem DESC LIMIT 3");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function faq()

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 AND blog=21 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function xemthem($id, $blog)

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 AND blog=$blog AND id!=$id ORDER BY id DESC LIMIT 3");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function xemthem1()

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 ORDER BY id DESC LIMIT 3");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }





    function chuyengia()

    {

        $query = $this->db->query("SELECT * FROM " . chuyengia . " WHERE chuc_vu=2");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function lichsu()

    {

        $query = $this->db->query("SELECT *,tinh_trang,

       (SELECT tran_dau FROM 1_trandau WHERE id=a.tran_dau) as tran_dau,

       (SELECT ket_qua FROM 1_trandau WHERE id=a.tran_dau) as ket_qua,

       (SELECT name FROM 1_verdict WHERE id=a.tinh_trang) as verdict,

       (SELECT ma_giai FROM 1_giaidau WHERE id=(SELECT id FROM 1_trandau WHERE id=a.tran_dau)) AS giai_dau

       FROM 1_tip a WHERE tinh_trang>0 AND tinh_trang!=6

        ORDER BY  ngay_gio DESC LIMIT 50");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    function lichsuchitiet($thang)

    {

        $query = $this->db->query("SELECT *,tinh_trang,

       (SELECT tran_dau FROM 1_trandau WHERE id=a.tran_dau) as tran_dau,

        (SELECT odd FROM 1_trandau WHERE id=a.tran_dau) as odd,

       (SELECT ket_qua FROM 1_trandau WHERE id=a.tran_dau) as ket_qua,

       (SELECT name FROM 1_verdict WHERE id=a.tinh_trang) as verdict,

       (SELECT ma_giai FROM 1_giaidau WHERE id=(SELECT id FROM 1_trandau WHERE id=a.tran_dau)) AS giai_dau

       FROM 1_tip a WHERE tinh_trang>0 AND tinh_trang!=6 AND ngay_gio LIKE '%$thang%'

        ORDER BY  ngay_gio DESC ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    function lichsuthang()

    {

        $query = $this->db->query(" SELECT DATE_FORMAT(ngay_gio, '%m/%Y') as ngay,DATE_FORMAT(ngay_gio, '%Y-%m') as ngay_gio FROM 1_tip

        WHERE tinh_trang>0 AND tinh_trang!=6 GROUP BY ngay ORDER BY ngay DESC");

        $rowsthang = $query->fetchAll(PDO::FETCH_ASSOC);

        $result = array();

        foreach ($rowsthang as $item)

        {

            $tongtran = 0;

            $win=0;

            $draw = 0;

            $lose = 0;

            $tilewin = 0;

            $thang = $item['ngay_gio'];

            $qr = $this->db->query("SELECT tinh_trang

            FROM 1_tip a WHERE tinh_trang>0 AND tinh_trang!=6 AND ngay_gio LIKE '%$thang%'");

            $rows = $qr->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $temp)

            {

                $tongtran++;

                if($temp['tinh_trang'] == 1 || $temp['tinh_trang']==3)

                    $win++;

                elseif($temp['tinh_trang'] == 2 || $temp['tinh_trang']==4)

                    $lose++;

                elseif($temp['tinh_trang'] == 5)

                    $draw++;



            }

            $tilewin = ceil($win /$tongtran * 100);

            array_push($result , array(

                'thang' => $thang,

                'trandau' => $tongtran,

                'win' => $win,

                'lose' => $lose,

                'draw' => $draw,

                'tilewin'=>$tilewin

            ));

        }



        return $result;

    }



    function lichsutip()

    {

        $dieukien = " WHERE tinh_trang NOT IN (0,6) ";

        $query = $this->db->query("SELECT *,

           (SELECT tran_dau FROM 1_trandau WHERE id=a.tran_dau) as tran_dau,

           (SELECT ket_qua FROM 1_trandau WHERE id=a.tran_dau) as ket_qua,

           (SELECT odd FROM 1_trandau WHERE id=a.tran_dau) as odd,

           (SELECT name FROM 1_verdict WHERE id = a.tinh_trang) as verdict,

           (SELECT ma_giai FROM 1_giaidau WHERE id=(SELECT id FROM 1_trandau WHERE id=a.tran_dau)) AS giai_dau

           FROM 1_tip a $dieukien ORDER BY id DESC");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function get_baivietmoi()

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 ORDER BY ngay_cap_nhat DESC LIMIT 3");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function nhanvien()

    {

        $query = $this->db->query("SELECT name, hinh_anh,quote,chuc_vu FROM admin WHERE id!=1 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }





    function noibat()

    {

        $query = $this->db->query("SELECT * FROM " . sanpham . " WHERE tinh_trang=1  ORDER BY luot_xem DESC LIMIT 9");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getdanhmuc()

    {

        $query = $this->db->query("SELECT *,

           ( SELECT count(id) FROM sanpham WHERE danh_muc= a.id ) AS total

         FROM danhmucsp a WHERE tinh_trang=1  ORDER BY thu_tu ASC ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getdanhmuc_all($com)

    {

        $query = $this->db->query("SELECT * FROM " . danhmuc . " WHERE tinh_trang=1 AND com=$com ORDER BY id ASC");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getbaivietfooter($com)

    {

        $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE tinh_trang=1 AND com = $com");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getbaiviet()

    {

        $query = $this->db->query("SELECT id FROM " . baiviet . " WHERE tinh_trang=1");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



     function getbaiviethd($url)

    {

        $query = $this->db->query("SELECT id FROM " . baiviet . " WHERE tinh_trang=1 AND url='$url' ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }







    function homecomment()

    {

        $query = $this->db->query("SELECT * FROM " . khachhang . " WHERE tinh_trang=1 LIMIT 3  ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function khachhang($otp)

    {

        $query = $this->db->query("SELECT * FROM " . khachhang . " WHERE mat_khau='$otp'  ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getprod($danhmuc, $trang)

    {

        $from = ($trang - 1) * 9;

        $dieukien = " WHERE tinh_trang=1  AND  (danh_muc LIKE '" . $danhmuc . "' OR danh_muc LIKE '%," . $danhmuc . "' OR danh_muc LIKE '" . $danhmuc . ",%' OR danh_muc LIKE '%," . $danhmuc . ",%')  ";

        // $query = $this->db->query("SELECT *, CONCAT('product/',url) AS link

        //    FROM ".sanpham."  $dieukien ORDER BY ngay_cap_nhat ");

        $query = $this->db->query("SELECT * FROM " . sanpham . " $dieukien ORDER BY id DESC LIMIT $from,9");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }



    function getprod1($danhmuc)

    {

        $dieukien = " WHERE tinh_trang=1  AND  (danh_muc LIKE '" . $danhmuc . "' OR danh_muc LIKE '%," . $danhmuc . "' OR danh_muc LIKE '" . $danhmuc . ",%' OR danh_muc LIKE '%," . $danhmuc . ",%')  ";

        // $query = $this->db->query("SELECT *, CONCAT('product/',url) AS link

        //    FROM ".sanpham."  $dieukien ORDER BY ngay_cap_nhat ");

        $query = $this->db->query("SELECT * FROM " . sanpham . " $dieukien ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }



    function gettemp($danhmuc)

    {

        $dieukien = " WHERE tinh_trang=1  AND  (danh_muc LIKE '" . $danhmuc . "' OR danh_muc LIKE '%," . $danhmuc . "' OR danh_muc LIKE '" . $danhmuc . ",%' OR danh_muc LIKE '%," . $danhmuc . ",%')  ";

        $query = $this->db->query("SELECT * FROM " . temp . " $dieukien ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }



    function getpost($danhmuc)

    {

        $dieukien = " WHERE tinh_trang=1  AND  (blog LIKE '" . $danhmuc . "' OR blog LIKE '%," . $danhmuc . "' OR blog LIKE '" . $danhmuc . ",%' OR blog LIKE '%," . $danhmuc . ",%')  ";

        $query = $this->db->query("SELECT *

          FROM " . baiviet . "  $dieukien ORDER BY ngay_cap_nhat DESC ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp;

    }





    function category()

    {

        $query = $this->db->query("SELECT id, name, cha, url, CONCAT('product/1/',url) AS link

            FROM " . cate . " WHERE tinh_trang=1 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function productdetail($id)

    {

        $query = $this->db->query("SELECT * FROM " . sanpham . " WHERE id=$id ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        return $temp[0];

    }



    function spnoibat()

    {

        $query = $this->db->query("SELECT * FROM " . sanpham . " WHERE tinh_trang=1 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }







    function checkspam($session, $email)

    {

        $query = $this->db->query("SELECT COUNT(id) AS total FROM " . khachhang . " WHERE session_id='$session' OR email='$email' ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($temp[0]['total'] > 0)

            return true;

        else

            return false;

    }



    function user($email, $passwd)

    {

        $user = array();

        $query = $this->db->query("SELECT email,dien_thoai,ho_ten,hinh_anh FROM " . khachhang . "

       WHERE email='$email' AND mat_khau='$passwd' ");

        $user = $query->fetchAll(PDO::FETCH_ASSOC);

        return $user;

    }



    function setpass($password, $retype, $id)

    {

        $ok = false;

        if ($password == $retype) {

            $data = array('mat_khau' => md5(md5($password)), 'tinh_trang' => 1);

            $ok = $this->update(khachhang, $data, " id=$id ");

        }

        return $ok;

    }











    function ketquatrandau($date)

    {

        $date = functions::convertDate($date);

        $query = $this->db->query("SELECT *,(SELECT ma_giai FROM 1_giaidau WHERE id=giai_dau) AS giai_dau,

            (SELECT tinh_trang FROM 1_tip WHERE tran_dau=a.id) AS win

            FROM 1_trandau a WHERE tinh_trang=1 AND thoi_gian LIKE '$date%' ORDER BY  thoi_gian DESC");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function cactrandau()

    {

        $date = date('Y-m-d H:i:s');

        $dieukien = " WHERE tinh_trang=1 AND thoi_gian > '" . $date . "'";

        $query = $this->db->query("SELECT *,(SELECT ma_giai FROM 1_giaidau WHERE id=giai_dau) AS giai_dau FROM 1_trandau $dieukien ORDER BY thoi_gian ASC");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function ngaydau()

    {

        $date = date('Y-m-d H:i:s');

        $dieukien = " WHERE tinh_trang=1 AND thoi_gian > '" . $date . "'";

        $query = $this->db->query("SELECT DATE_FORMAT(thoi_gian, '%Y-%m-%d') AS ngay FROM 1_trandau $dieukien GROUP BY ngay");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getDateketqua()

    {

        $query = $this->db->query("SELECT MAX(thoi_gian) AS thoi_gian FROM 1_trandau WHERE tinh_trang=1 ORDER BY  thoi_gian DESC");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function getSodu($id)

    {

        $query = $this->db->query("SELECT id,so_du FROM 1_taikhoan WHERE id='$id' AND tinh_trang = 1 ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function addGiaodich($id, $noidung, $money, $sodumoi)

    {

        $ngaygio = date("Y-m-d H:i:s");

        $query = $this->db->query("INSERT INTO 1_giaodich (ngay,noi_dung,so_tien,so_du,tai_khoan) VALUES ('$ngaygio','$noidung','$money',$sodumoi,'$id') ");



        return $query->fetchAll(PDO::FETCH_ASSOC);

    }



    function updateTaikhoan($id, $sodu, $tip)

    {

        $query1 = $this->db->query("SELECT id,tip_ngay,tip_vip FROM 1_taikhoan WHERE id='$id' AND tinh_trang = 1 ");

        $result = $query1->fetchAll(PDO::FETCH_ASSOC);

        $tipngay = $result[0]['tip_ngay'];

        $tipvip = $result[0]['tip_vip'];

        if ($tip == 1)

            $tipngay++;

        elseif ($tip == 2)

            $tipngay = $tipngay + 15;

        elseif ($tip == 3)

            $tipvip++;

        $query = $this->db->query("UPDATE 1_taikhoan SET so_du = $sodu, tip_ngay = $tipngay, tip_vip = $tipvip WHERE id=$id");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }





    function lichsutiptv($thanhvien)

    {

        // $dieukien = " WHERE tinh_trang NOT IN (0,6) ";

        // $dieukien .= " AND (SELECT khach_hang FROM 1_tinnhan WHERE tip=a.id ORDER BY id DESC LIMIT 1) LIKE '%" . $thanhvien . "%' ";

        // $query = $this->db->query("SELECT *, ngay_gio as ngay,

        // (SELECT odd FROM 1_trandau WHERE id=a.tran_dau) AS odd,

        // (SELECT ket_qua FROM 1_trandau WHERE id=a.tran_dau) AS ketqua,

        // (SELECT tran_dau FROM 1_trandau WHERE id=a.tran_dau) AS tran_dau,

        // (SELECT name FROM 1_verdict WHERE id = a.tinh_trang) as verdict,

        // (SELECT name FROM admin WHERE id=a.chuyen_gia) AS chuyen_gia

        // FROM 1_tip a $dieukien ORDER BY ngay_gio DESC");



        $query = $this->db->query("SELECT *, (SELECT tran_dau FROM 1_tip WHERE id=a.tip) AS midi,

              (SELECT tinh_trang FROM 1_tip WHERE id=a.tip) AS vidi,

              (SELECT ket_qua FROM 1_trandau WHERE id=midi) AS ketqua,

              (SELECT tran_dau FROM 1_trandau WHERE id=midi) AS tran_dau,

              (SELECT tip FROM 1_tip WHERE id=a.tip) AS tip,

              (SELECT name FROM 1_verdict WHERE id = vidi) as verdict

              FROM 1_tinnhan a WHERE khach_hang='$thanhvien' AND tip IN (SELECT id FROM 1_tip WHERE tinh_trang NOT IN (0,6) ) ");

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    function info(){

        $id=1;//$_SESSION['userdata']['meta_id'];

        $query = $this->db->query("SELECT ip FROM 1_thongtin WHERE id=$id " );

        $temp=$query->fetchAll(PDO::FETCH_ASSOC);

        return($temp[0]);

        return array();

    }

    function insertlienhe($data)

    {

        $query = false;

        $email = $data['email'];

        $query = $this->db->query("SELECT COUNT(1) AS numrow FROM lienhe WHERE email='$email' AND tinh_trang=1 ");

        $temp = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($temp[0]['numrow']==0)

            $query = $this->insert("lienhe", $data);

        return $query;

    }

}



?>

