<?php
class nsx_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query           = $this->db->query("SELECT *
            FROM nsx $dieukien ");
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


    function saverow($id, $data)
    {
        if($id>0)
            $query = $this->update("nsx", $data, "id = $id");
        else {
            $data['tinh_trang']=1;
            $query = $this->insert("nsx", $data);
        }
        return $query;
    }

}

?>
