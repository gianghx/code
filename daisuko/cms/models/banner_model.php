<?php
class banner_model extends model
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
           FROM banner $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        if($id>0)
            $query = $this->update("banner", $data, " id = $id ");
        else {
            $data['tinh_trang']=1;
            $query = $this->insert("banner", $data);
        }
        return $query;
    }

    function del($id)
    {
            $data['tinh_trang']=0;
            $query = $this->update("banner", $data, " id = $id ");
        return $query;
    }
}

?>
