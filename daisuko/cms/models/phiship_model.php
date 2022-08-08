<?php
class phiship_model extends model
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
           (SELECT name FROM thanhpho WHERE id=thanh_pho) AS thanhpho
           FROM quanhuyen $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        $query = $this->update("quanhuyen", $data, "id = $id");
        return $query;
    }
}

?>
