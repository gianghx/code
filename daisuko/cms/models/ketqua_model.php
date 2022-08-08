<?php

class ketqua_model extends model

{

    function __construct()

    {

        parent::__construct();

    }



    function getdata()

    {

        $result = array();

        $date= date("Y-m-d H:i:s");

        $query = $this->db->query("SELECT *,

        (SELECT COUNT(id) FROM ketqua WHERE phien = a.id) as ketqua,

        (SELECT name from sanpham WHERE id = a.hang_hoa) as sanpham

         FROM donhang a WHERE tinh_trang > 0 AND date_end<'$date'  ORDER BY ketqua DESC, date_end DESC ");

        if ($query) $result  = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    function gettinh($idtinh=0){

        $query = $this->db->query("SELECT * FROM tinh WHERE id = $idtinh ORDER BY id DESC");

        if ($query) $result  = $query->fetch(PDO::FETCH_ASSOC);

        return $result['name'];

    }
    function gethuyen($idhuyen=0){
         $query = $this->db->query("SELECT * FROM huyen WHERE id = $idhuyen ORDER BY id DESC");

        if ($query) $result  = $query->fetch(PDO::FETCH_ASSOC);

        return $result['name'];
    }

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



    function getchitiet($id)

    {

        $result = array();

        $query = $this->db->query("SELECT *,

            (SELECT name FROM dathang WHERE id=a.dat_hang LIMIT 1) AS name,

            (SELECT dien_thoai FROM dathang WHERE id=a.dat_hang LIMIT 1) AS sdt,

            (SELECT email FROM dathang WHERE id=a.dat_hang LIMIT 1) AS email,

            (SELECT dia_chi FROM dathang WHERE id=a.dat_hang LIMIT 1) AS diachi,

            (SELECT huyen FROM dathang WHERE id=a.dat_hang LIMIT 1) AS huyen,

            (SELECT tinh FROM dathang WHERE id=a.dat_hang LIMIT 1) AS tinh,

            (SELECT van_chuyen FROM dathang WHERE id=a.dat_hang LIMIT 1) AS vanchuyen,

            (SELECT thanh_toan FROM dathang WHERE id=a.dat_hang LIMIT 1) AS thanhtoan,

            (SELECT san_pham FROM dathang WHERE id=a.dat_hang LIMIT 1) AS san_pham,

            (SELECT nha_sx FROM dathang WHERE id=a.dat_hang LIMIT 1) AS nha_sx,

            (SELECT so_luong FROM dathang WHERE id=a.dat_hang LIMIT 1) AS sldat,

            (SELECT gia_dat FROM dathang WHERE id=a.dat_hang LIMIT 1) AS giadat

            FROM ketqua a  WHERE tinh_trang >0 AND phien=$id  ORDER BY id ASC ");

        if ($query) $result  = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }



    function getchitieterr($id)

    {

        $result = array();

        $query = $this->db->query("SELECT *

         FROM dathang  WHERE tinh_trang >0 AND phien=$id AND khach_hang NOT IN(SELECT khach_hang FROM ketqua WHERE tinh_trang>0 AND phien=$id)  ORDER BY id ASC ");

        if ($query) $result  = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }



    function save($id, $data)

    {

        if($id>0)

            $query = $this->update("ketqua", $data, " id = $id ");

        else {

            $data['tinh_trang']=1;

            $query = $this->insert("ketqua", $data);

        }

        return $query;

    }



    function del($id)

    {

            $data['tinh_trang']=0;

            $query = $this->update("donhang", $data, " id = $id ");

        return $query;

    }



    function duplicaterow($id)

    {

        $query = $this->db->query("INSERT INTO `donhang`(`date`, `date_end`, `ghi_chu`, `noi_bat`, `hang_hoa`, `gia_san`, `gia_st`, `so_luong`, `tinh_trang`)

        SELECT `date`, `date_end`, `ghi_chu`, `noi_bat`, `hang_hoa`, `gia_san`, `gia_st`, `so_luong`, `tinh_trang`

        FROM `donhang` WHERE id=$id");

        $query->fetchAll(PDO::FETCH_ASSOC);

        $idnew = $this->db->lastInsertId();



        $query = $this->db->query("SELECT hang_hoa, so_luong,

        gia_san, gia_st, date, date_end FROM donhang WHERE id=$id");

        $result  = $query->fetchAll(PDO::FETCH_ASSOC);

        $data1=array(

            "don_hang"=>$idnew,

            "hang_hoa"=>$result[0]['hang_hoa'],

            "so_luong"=>$result[0]['so_luong'],

            "don_gia"=>$result[0]['gia_san'],

            "don_giast"=>$result[0]['gia_st'],

            "tinh_trang"=>1

        );



        $query = $this->insert("hanghoa", $data1);

        $result[0]['id']= $idnew;

        return $result[0];

    }



    function saverow($madon,$data)

    {

        $query = $this->update("donhang", $data, "id = $madon");

        return $query;

    }

}



?>

