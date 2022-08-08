<?php
class baiviet_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query           = $this->db->query("SELECT *,
            CONCAT('<img src=\"',hinh_anh,'\" height=\"50\">') AS hinhanh,
            (SELECT name FROM danhmuc WHERE id=danh_muc) AS danhmuc
            FROM baiviet $dieukien ORDER BY id DESC ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function danhmuc()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query           = $this->db->query("SELECT id,name FROM danhmuc $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 AND id=$id ";
        $query           = $this->db->query("SELECT * FROM baiviet $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        $url = $data['url'];
        $dieukien = " WHERE tinh_trang=1 AND url LIKE '$url%' AND id!=$id ";
        $query  = $this->db->query("SELECT url FROM baiviet $dieukien ORDER BY url DESC LIMIT 1 ");
        $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($temp[0]['url']))
            $data['url']=$temp[0]['url'].'.x';
        if($id>0)
            $query = $this->update("baiviet", $data, " id = $id ");
        else {
            $data['tinh_trang']=1;
            $data['ngay_dang']=date("Y-m-d");
            $data['author']=$_SESSION['user']['id'];
            $query = $this->insert("baiviet", $data);
        }
        return $query;
    }

    function del($id)
    {
        $query = $this->db->query("UPDATE baiviet SET tinh_trang=0 WHERE id=$id ");
        return $query;
    }

}

?>
