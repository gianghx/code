<?php
class donhang_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result = array();
        $query = $this->db->query("SELECT *, 
        (SELECT name from sanpham WHERE id = a.hang_hoa) as sanpham
         FROM donhang a WHERE tinh_trang > 0 AND tinh_trang!=2 ORDER BY id DESC ");
        if ($query) $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function sanpham()
    {
        $result = array();
        $query = $this->db->query("SELECT *
         FROM sanpham  WHERE tinh_trang > 0 ORDER BY id DESC ");
        if ($query) $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function khachhang1()
    {
        $result = array();
        $query = $this->db->query(" SELECT id,name
         FROM users_kh  WHERE tinh_trang > 0 ORDER BY id DESC ");
        if ($query) $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getkhachhang($id)
    {
        $query = $this->db->query(" SELECT id,name,dien_thoai,dia_chi
         FROM users_kh WHERE id=$id ");
        $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }

    function getsanpham($id)
    {
        $query = $this->db->query("SELECT *
         FROM sanpham  WHERE tinh_trang > 0 AND id=$id ");
        $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }

    function savedonhang($data){
        $query = $this->insert("donhang", $data);
        $iddh = $this->db->lastInsertId();
        foreach ($_SESSION['cart'] as  $value) {
            $data1=array(
                "don_hang"=>$iddh,
                "hang_hoa"=>$value['id'],
                "so_luong"=>$value['num'],
                "don_gia"=>$value['price'],
                "don_giast"=>$value['pricest'],
                "tinh_trang"=>1
            );
            $query = $this->insert("hanghoa", $data1);
        }
        return $query;

    }

    function indon($id)
    {
        $query = $this->db->query("SELECT *,
        (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS sanpham,
        (SELECT date FROM donhang WHERE id=a.don_hang) AS ngaygio,
        (SELECT name FROM khachhang WHERE id=(SELECT khach_hang FROM donhang WHERE id=don_hang)) as khachhang,
        (SELECT thanh_tien FROM donhang WHERE id=a.don_hang) AS thanhtien
        FROM hanghoa a WHERE don_hang=$id ");
        return ($query->fetchAll(PDO::FETCH_ASSOC));
    }

    function cartdetail($id)
    {
        $result = array();
        $query = $this->db->query("SELECT a.don_hang,a.hang_hoa as id,
        (SELECT name FROM sanpham WHERE id=a.hang_hoa) as name,
        a.so_luong as num,
        a.don_gia as price,
        a.don_giast as pricest,
        (SELECT hinh_anh FROM sanpham WHERE id=a.hang_hoa) as hinhanh
        FROM hanghoa a WHERE don_hang=$id ");
        if ($query)
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function cartinfo($id)
    {
        $result = array();
        $query = $this->db->query("SELECT *
        FROM donhang a WHERE id=$id ");
        if ($query)
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getchitietdon($keyword, $offset, $rows,$id)
    {
        $query = $this->db->query("SELECT count(id) AS total FROM hanghoa  WHERE don_hang=$id ");
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        $result['total'] = $row[0]['total'];
        $result['rows'] = array();
        $query = $this->db->query("SELECT *,
        (SELECT name FROM sanpham WHERE id=a.hang_hoa) AS sanpham
        FROM hanghoa a WHERE don_hang=$id LIMIT $offset,$rows ");
        if ($query)
        $result['rows']  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 AND don_hang=$id ";
        $query           = $this->db->query("SELECT don_hang,tinh_trang,
        (SELECT name FROM sanpham WHERE id=hang_hoa) as sanpham,
        (SELECT date FROM donhang WHERE id=don_hang) as ngaygio,
        (SELECT ghi_chu FROM donhang WHERE id=don_hang) as ghi_chu,
        (SELECT name FROM khachhang WHERE id=(SELECT khach_hang FROM donhang WHERE id=don_hang)) as ten_khach,
        (SELECT dia_chi FROM khachhang WHERE id=(SELECT khach_hang FROM donhang WHERE id=don_hang)) as dia_chi,
        (SELECT dien_thoai FROM khachhang WHERE id=(SELECT khach_hang FROM donhang WHERE id=don_hang)) as dien_thoai,
        (SELECT id FROM khachhang WHERE id=(SELECT khach_hang FROM donhang WHERE id=don_hang)) as idkh
         FROM hanghoa $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function updatedon($sdt, $date, $tt, $data)
    {
        if ($tt == 1) {
            $data['tinh_trang'] = 2;
            $query = $this->update("1_dathang", $data, " sdt=$sdt AND ngay_gio='$date' ");
        } else {
            $data['tinh_trang'] = 3;
            $query = $this->update("1_dathang", $data, " sdt=$sdt AND ngay_gio='$date' ");
        }

        return $query;
    }

    function delObj($id)
     {
        $data['tinh_trang'] =0;
        $query = $this->update("donhang", $data, " id = $id ");
        $query = $this->update("hanghoa", $data, " don_hang = $id ");
        return $query;
    }

    function saverow($madon,$data)
    {
        $query = $this->update("donhang", $data, "id = $madon");
        return $query;
    }
}
