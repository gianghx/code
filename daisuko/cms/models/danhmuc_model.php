<?php
class danhmuc_model extends model
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
            CONCAT('<img src=\"',hinh_anh,'\" height=\"50\">') AS hinhanh
            FROM danhmuc $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 AND id=$id ";
        $query           = $this->db->query("SELECT * FROM data $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        $url = $data['url'];
        $dieukien = " WHERE tinh_trang=1 AND url LIKE '$url%' AND id!=$id ";
        $query  = $this->db->query("SELECT url FROM danhmuc $dieukien ORDER BY url DESC LIMIT 1 ");
        $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($temp[0]['url']))
            $data['url']=$temp[0]['url'].'.x';
        if($id>0)
            $query = $this->update("danhmuc", $data, "id = $id");
        else {
            $data['tinh_trang']=1;
            $query = $this->insert("danhmuc", $data);
        }
        return $query;
    }

    function del($id)
    {
        $query = $this->db->query("UPDATE danhmuc SET tinh_trang=0 WHERE id=$id ");
        return $query;
    }

}

?>
