<?php
class danhmucsp_model extends model
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
            IF(cha=0,'Root',(SELECT name FROM danhmucsp WHERE id=a.cha)) AS cha1
            FROM danhmucsp a $dieukien ");
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

    function save($id, $data)
    {
        $url = $data['url'];
        $dieukien = " WHERE tinh_trang=1 AND url='$url' AND id!=$id ";
        $query  = $this->db->query(" SELECT url FROM danhmucsp $dieukien LIMIT 1 ");
        $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($temp[0]['url']))
            $data['url']=$temp[0]['url'].'.x';
        if($id>0)
            $query = $this->update("danhmucsp", $data, "id = $id");
        else {
            $data['tinh_trang']=1;
            $query = $this->insert("danhmucsp", $data);
        }
        return $query;
    }

}

?>
