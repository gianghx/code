<?php
class thongtin_en_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query           = $this->db->query("SELECT * FROM thongtin_en $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 AND id=$id ";
        $query           = $this->db->query("SELECT * FROM thongtin_en $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        if($id>0)
            $query = $this->update("thongtin_en", $data, "id = $id");
        else
            $query = $this->insert("thongtin_en", $data);
        return $query;
    }

}

?>
