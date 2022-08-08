<?php
class donhangadd_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function sanpham()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query           = $this->db->query("SELECT * FROM sanpham $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function khachhang()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query           = $this->db->query("SELECT id, name FROM khachhang $dieukien  ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function diachi($id)
    {
        $query           = $this->db->query("SELECT dia_chi FROM khachhang WHERE id=$id ");
        $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $temp[0]['dia_chi'];
    }

    function nhanvien()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query           = $this->db->query("SELECT id,name FROM nhanvien $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function savedon($donhang, $data)
    {
        $query = $this->insert("donhang", $donhang);
        if ($query) {
            $id=$this->db->lastInsertId();
            $rows = json_decode($data,true);
            foreach ($rows as $row) {
                $item = ['don_hang'=>$id, 'hang_hoa'=>$row[0],'so_luong'=>$row[1],
                'don_gia'=>$row[2],'chiet_khau'=>$row[3],'chiet_khau_pt'=>$row[4],'tinh_trang'=>1];
                $query = $this->insert("hanghoa", $item);
            }
        }
        return $query;
    }

}

?>
