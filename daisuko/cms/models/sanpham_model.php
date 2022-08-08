<?php
class sanpham_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query    = $this->db->query("SELECT id, name, ma_sp,
            CONCAT('<img src=\"',hinh_anh,'\" height=\"50\">') AS hinhanh,
            FORMAT(gia_niem_yet,0) AS gianiemyet,
            FORMAT(gia_ban,0) AS giaban,
            (SELECT name FROM admin WHERE id=author) AS nhanvien
            FROM sanpham $dieukien ORDER BY id DESC ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function danhmuc()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query           = $this->db->query("SELECT id,name,cha FROM danhmucsp $dieukien ORDER by cha ASC ");
        if ($query){
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }




    // function danhmuccha()
    // {
    //     $result   = array();
    //     $dieukien = " WHERE tinh_trang=1 AND cha=0 ";
    //     $query           = $this->db->query("SELECT id,name,cha FROM danhmucsp $dieukien ");
    //     if ($query){
    //         $result  = $query->fetchAll(PDO::FETCH_ASSOC);
    //         foreach ($result as $key => $value) {
    //             $cha= $value['id'];
    //             $result[$key]['id'] = $value['id'];
    //             $result[$key]['name'] = $value['name'];
    //             $con=0;
    //             do {
    //                 $query = $this->db->query("SELECT id,name,cha FROM danhmucsp WHERE tinh_trang=1 AND cha=$cha  ");
    //                 $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
    //                 $con= count($temp);
    //                 if ($con>0)

    //             } while ( $con > 0);
    //         }
    //     }
    //     return $result;
    // }


    function nhasx()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query           = $this->db->query("SELECT id, name FROM nsx $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 AND id=$id ";
        $query           = $this->db->query("SELECT * FROM sanpham $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        $url = $data['url'];
        $dieukien = " WHERE tinh_trang=1 AND url LIKE '$url%' AND id!=$id ";
        $query  = $this->db->query("SELECT url FROM sanpham $dieukien ORDER BY url DESC LIMIT 1 ");
        $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($temp[0]['url']))
            $data['url']=$temp[0]['url'].'.x';
        if($id>0)
            $query = $this->update("sanpham", $data, "id = $id");
        else{
            $data['tinh_trang']=1;
            $data['author']=$_SESSION['user']['id'];
            $query = $this->insert("sanpham", $data);
        }
        return $query;
    }

    function del($id)
    {
        $query = $this->db->query("UPDATE sanpham SET tinh_trang=0 WHERE id=$id ");
        return $query;
    }

}

?>
