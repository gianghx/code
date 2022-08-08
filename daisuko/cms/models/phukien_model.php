<?php
class phukien_model extends Model
{
   function __construct()
   {
       parent::__construct();
   }

   function getFetObj()
   {
       $dieukien = ' WHERE tinh_trang=1 ';
       $query = $this->db->query("SELECT *,
        (SELECT GROUP_CONCAT(name SEPARATOR ' + ') FROM sanpham 
                WHERE a.san_pham LIKE CONCAT('%,',sanpham.id,',%') 
                OR a.san_pham LIKE CONCAT('%,',sanpham.id) 
                OR a.san_pham LIKE CONCAT(sanpham.id,',%')
                OR a.san_pham LIKE CONCAT(sanpham.id)) AS sanpham
        FROM phukien a $dieukien ORDER BY id DESC ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function sanpham()
   {
       $query = $this->db->query("SELECT id,name FROM sanpham WHERE tinh_trang=1 ");
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

    function getrow($id)
   {
       $query = $this->db->query("SELECT * FROM phukien WHERE tinh_trang=1 AND id=$id ");
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp[0];
   }

   function addObj($data)
   {
       $query = $this->insert("phukien", $data);
       return $query;
   }

   function updateObj($id, $data)
   {
       $query = $this->update("phukien", $data, "id = $id");
       return $query;
   }


   function delObj($id)
   {
       $query = $this->delete("phukien", "id=$id");
       return $query;
   }

}
?>
