<?php
class model
{
   function __construct()
   {
       $this->db = new database();
   }
   // các hàm thao tác trên database
   function insert($table, $array)
   {
       $cols = array();
       $bind = array();
       foreach ($array as $key => $value) {
           $cols[] = $key;
           $value= addslashes($value);
           $bind[] = "'" . $value . "'";
       }
       $query = $this->db->query("INSERT IGNORE INTO " . $table . " (" . implode(",", $cols) . ") VALUES (" . implode(",", $bind) . ")");
       return $query;
   }

   function update($table, $array, $where)
   {
       $set = array();
       foreach ($array as $key => $value) {
          $value= str_replace("'", "\'", $value);
           $set[] = $key . " = '" . $value . "'";
       }
       $query = $this->db->query("UPDATE " . $table . " SET " . implode(",", $set) . " WHERE " . $where);
       return $query;
   }

   function delete($table, $where = '')
   {
       if ($where == '') {
           $query = $this->db->query("DELETE FROM " . $table);
       } else {
           $query = $this->db->query("DELETE FROM " . $table . " WHERE " . $where);
       }
       return $query;
   }

   //  Các hàm dùng chung

   function password_generate($chars)
   {
       $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
       return substr(str_shuffle($data), 0, $chars);
   }

   function thanhpho()
   {
       $query = $this->db->query("SELECT * FROM thanhpho WHERE tinh_trang=1 ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function quanhuyen($id)
   {
       $query = $this->db->query("SELECT * FROM quanhuyen WHERE tinh_trang=1 AND thanh_pho=$id ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }
   

   // Chưa sử dụng



   function mainmenu(){
            $query = $this->db->query("SELECT id, name, link, icon,mobile FROM menu WHERE parentid = 0 AND active=1 ORDER BY thu_tu");
            return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function submenu($id)
   {
       $submenu = array();
       $query = $this->db->query("SELECT id, name, link, icon FROM menu WHERE active=1 AND parentid = $id ORDER BY thu_tu");
       $temp = $query->fetchAll(PDO::FETCH_ASSOC);
       foreach ($temp AS $item) {
           $found = false;
           if ($_SESSION['user']['id']==1)
               $found = true;
           else {
               $conid = $item['id'];
               $query = $this->db->query("SELECT menu FROM users WHERE id=".$_SESSION['user']['id']);
               $a = $query->fetchAll(PDO::FETCH_ASSOC);
               $menu = explode(',',$a[0]['menu']);
               if (in_array($conid, $menu))
                   $found=true;
               else {
                   $query = $this->db->query("SELECT id FROM menu WHERE active=1 AND parentid = $conid ");
                   $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                   if (sizeof($rows)>0)
                       foreach ($rows AS $chau)
                           if (in_array($chau['id'], $menu)) {$found=true;break;}
               }
           }
           if ($found)
               $submenu[$item['id']] = $item;
       }
       return $submenu;
   }




   function checkright($text)  // kiem tra quyen truy xuat menu
   {
       $yes = false;
       if ($_SESSION['user']['id']==1)
           $yes = true;
       else {
         $query = $this->db->query("SELECT id FROM menu WHERE active=1 AND link = '$text' ");
         $temp = $query->fetchAll(PDO::FETCH_ASSOC);
         $conid = $temp[0]['id'];
         $query = $this->db->query("SELECT menu FROM users WHERE id=".$_SESSION['user']['id']);
         $a = $query->fetchAll(PDO::FETCH_ASSOC);
         $menu = explode(',',$a[0]['menu']);
         if (in_array($conid, $menu))
             $yes = true;
         else {
             $query = $this->db->query("SELECT id FROM menu WHERE active=1 AND parentid = $conid ");
             $rows = $query->fetchAll(PDO::FETCH_ASSOC);
             if (sizeof($rows)>0)
                 foreach ($rows AS $chau)
                     if (in_array($chau['id'], $menu)) {$yes = true; break;}
         }
       }
       return $yes;
   }

   function getfun($module)
   {
       $return = array();
       $query           = $this->db->query("SELECT id FROM menu WHERE link='$module' ");
       $row             = $query->fetchAll(PDO::FETCH_ASSOC);
       if (isset($row[0]['id'])) {
           $parid = $row[0]['id'];
           $query = $this->db->query(" SELECT * FROM menu WHERE parentid=$parid AND active=1 ORDER BY thu_tu");
           $rows = $query->fetchAll(PDO::FETCH_ASSOC);
           if (sizeof($rows)>0) {
               $uid = $_SESSION['user']['id'];
               if ($uid==1) {
                  $return = $rows;
               } else {
                   $query = $this->db->query(" SELECT menu FROM users WHERE id=$uid ");
                   $temp = $query->fetchAll(PDO::FETCH_ASSOC);
                   if(isset($temp[0]['menu'])) {
                        $menu = explode(',',$temp[0]['menu']);
                        foreach ($rows AS $item)
                            if (in_array($item['id'], $menu))
                                $return[$item['id']]=$item;
                   }
               }
           }
       }
       return $return;
   }

   function chamcong()  // chấm công khi login
   {
        $ok = false;
        $nhanvien = $_SESSION['user']['nhan_vien'];
        $query = $this->db->query("SELECT ip FROM chinhanh WHERE id=(SELECT van_phong FROM nhanvien WHERE id=$nhanvien) ");
        $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($temp[0]['ip'])) {
            $ipvanphong = $temp[0]['ip'];
            $iplogin = $_SERVER["REMOTE_ADDR"];
            if ($ipvanphong==$iplogin) {  // nếu check in bằng wifi văn phòng
                $today = date("Y-m-d");
                $query = $this->db->query("SELECT * FROM chamcong WHERE nhan_vien=$nhanvien AND ngay='$today' ");
                $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
                if (isset($temp[0]['tinh_trang'])) {
                    if ($temp[0]['tinh_trang']==0)   // chưa kết công
                        if($temp[0]['gio_vao']=='00:00:00') { // giờ vào chưa cập nhật
                            $id = $temp[0]['id'];
                            $ca = $this->ca($nhanvien,$today);
                            $data =  array('gio_vao'=>date("H:i:s"),'ca_vao'=>$ca['vao'], 'ca_ra'=>$ca['ra']);
                            $ok = $this->update("chamcong", $data, "id = $id");
                        }
                } else {
                    $ca = $this->ca($nhanvien,$today);
                    $data =  array('nhan_vien'=>$nhanvien, 'ngay'=>$today, 'gio_vao'=>date("H:i:s"),
                              'ca_vao'=>$ca['vao'], 'ca_ra'=>$ca['ra']);
                    $ok = $this->insert("chamcong", $data);
                }
            }
        }
        return $ok;
   }

   function ca($nhanvien, $date) { // Lấy giờ vào ra chuẩn theo ca
      $ca = array();
      $query    = $this->db->query("SELECT * FROM ca WHERE id=(SELECT ca FROM nhanvien WHERE id=$nhanvien) ");
      $temp     = $query->fetchAll(PDO::FETCH_ASSOC);
      $get_name = date('l', strtotime($date)); //get week day
      $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
      if ($day_name == 'Sun') {
          $ca['vao'] = $temp[0]['cn_in'];
          $ca['ra'] = $temp[0]['cn_out'];
      }
      elseif ($day_name == 'Mon') {
          $ca['vao'] = $temp[0]['t2_in'];
          $ca['ra'] = $temp[0]['t2_out'];
      }
      elseif ($day_name == 'Tue') {
          $ca['vao'] = $temp[0]['t3_in'];
          $ca['ra'] = $temp[0]['t3_out'];
      }
      elseif ($day_name == 'Wed') {
          $ca['vao'] = $temp[0]['t4_in'];
          $ca['ra'] = $temp[0]['t4_out'];
      }
      elseif ($day_name == 'Thu') {
          $ca['vao'] = $temp[0]['t5_in'];
          $ca['ra'] = $temp[0]['t5_out'];
      }
      elseif ($day_name == 'Fri') {
          $ca['vao'] = $temp[0]['t6_in'];
          $ca['ra'] = $temp[0]['t6_out'];
      }
      elseif ($day_name == 'Sat') {
          $ca['vao'] = $temp[0]['t7_in'];
          $ca['ra'] = $temp[0]['t7_out'];
      }
      return $ca;
   }

  function workingday($month,$year,$nhanvien) { // tinh so ngay lam viec trong thang theo nhân viên
      $query    = $this->db->query("SELECT * FROM ca WHERE id=(SELECT ca FROM nhanvien WHERE id=$nhanvien) ");
      $temp     = $query->fetchAll(PDO::FETCH_ASSOC);
      $hours[1] = $temp[0]['cn_out'] - $temp[0]['cn_in'];
          if ($hours[1]>4) $hours[1]  = $hours[1] - $temp[0]['lun_interval'];
      $hours[2] = $temp[0]['t2_out'] - $temp[0]['t2_in'];
          if ($hours[2]>4) $hours[2]  = $hours[2] - $temp[0]['lun_interval'];
      $hours[3] = $temp[0]['t3_out'] - $temp[0]['t3_in'];
          if ($hours[3]>4) $hours[3]  = $hours[3] - $temp[0]['lun_interval'];
      $hours[4] = $temp[0]['t4_out'] - $temp[0]['t4_in'];
          if ($hours[4]>4) $hours[4]  = $hours[4] - $temp[0]['lun_interval'];
      $hours[5] = $temp[0]['t5_out'] - $temp[0]['t5_in'];
          if ($hours[5]>4) $hours[5]  = $hours[5] - $temp[0]['lun_interval'];
      $hours[6] = $temp[0]['t6_out'] - $temp[0]['t6_in'];
          if ($hours[6]>4) $hours[6]  = $hours[6] - $temp[0]['lun_interval'];
      $hours[7] = $temp[0]['t7_out'] - $temp[0]['t7_in'];
          if ($hours[7]>4) $hours[7]  = $hours[7] - $temp[0]['lun_interval'];

     $type = CAL_GREGORIAN;
     $day_count = cal_days_in_month($type, $month, $year);
     $workday=0;
     $workhours=0;
     for ($i = 1; $i <= $day_count; $i++) {
         // if ($i<10) $i = '0'.$i;
         $date = $year.'-'.$month.'-'.$i; //format date
         $get_name = date('l', strtotime($date)); //get week day
         $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
         if ($day_name == 'Sun')
             $workhours = $workhours + $hours[1];
         elseif ($day_name == 'Mon')
             $workhours = $workhours + $hours[2];
         elseif ($day_name == 'Tue')
             $workhours = $workhours + $hours[3];
         elseif ($day_name == 'Wed')
             $workhours = $workhours + $hours[4];
         elseif ($day_name == 'Thu')
             $workhours = $workhours + $hours[5];
         elseif ($day_name == 'Fri')
             $workhours = $workhours + $hours[6];
         elseif ($day_name == 'Sat')
             $workhours = $workhours + $hours[7];
     }
     $workday = ROUND($workhours/8,1);
     return $workday;
   }




    // Các hàm mở rộng
    // function updateip($userip)
    // {
    //     $query = $this->db->query("SELECT COUNT(*) AS total FROM users WHERE id=1 AND ip='$userip' ");
    //     $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
    //     if ($temp[0]['total'] == 0)
    //         $this->db->query("UPDATE users SET ip='$userip' ");
    // }

    // function chamcong($nhanvien, $userip, $time)
    // {
    //     $query = $this->db->query("SELECT COUNT(*) AS total FROM system WHERE id=1 AND value='$userip' ");
    //     $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
    //     if ($temp[0]['total'] == 1) {
    //         $ngay  = substr($time, 0, 10);
    //         $gio   = substr($time, -8);
    //         $query = $this->db->query("SELECT COUNT(*) AS total FROM chamcong WHERE nhan_vien=$nhanvien
    //             AND ngay='$ngay' ");
    //         $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
    //         if ($temp[0]['total'] == 0) {
    //             if ($gio < "08:00:01")
    //                 $chamcong = 1;
    //             elseif ($gio < "09:00:01")
    //                 $chamcong = 3;
    //             elseif ($gio < "13:30:01")
    //                 $chamcong = 5;
    //             else
    //                 $chamcong = 0;
    //             if ($chamcong==1 || $chamcong==3)
    //                $cong=1;
    //            elseif ($chamcong==5)
    //                $cong = 0.5;
    //            else
    //                $cong=0;
    //             $data = array(
    //                 'nhan_vien' => $nhanvien,
    //                 'ngay' => $ngay,
    //                 'gio_vao' => $gio,
    //                 'ghi_chu' => 'chấm công',
    //                 'cham_cong' => $chamcong,
    //                 'cong' => $cong
    //             );
    //             $this->insert("chamcong", $data);
    //             if ($chamcong==3) {
    //               $data = array(
    //                   'nhan_vien' => $nhanvien,
    //                   'ngay_gio' => $time,
    //                   'event' => 2,
    //                   'so_tien' =>-50000,
    //                   'ghi_chu' => '',
    //                   'tinh_trang' => 1
    //               );
    //               $this->insert("thuongphat", $data);
    //             }
    //         }
    //     }
    // }

    // if ($temp[0]['total']==1) // đã chấm vào rồi
    //      $ok=true;
    // else  { // chưa chấm vào
    //         $query           = $this->db->query("SELECT id,ca,
    //             (SELECT t2_in FROM ca WHERE id=a.ca) AS t2in,
    //             (SELECT t2_out FROM ca WHERE id=a.ca) AS t2out,
    //             (SELECT t3_in FROM ca WHERE id=a.ca) AS t3in,
    //             (SELECT t3_out FROM ca WHERE id=a.ca) AS t3out,
    //             (SELECT t4_in FROM ca WHERE id=a.ca) AS t4in,
    //             (SELECT t4_out FROM ca WHERE id=a.ca) AS t4out,
    //             (SELECT t5_in FROM ca WHERE id=a.ca) AS t5in,
    //             (SELECT t5_out FROM ca WHERE id=a.ca) AS t5out,
    //             (SELECT t6_in FROM ca WHERE id=a.ca) AS t6in,
    //             (SELECT t6_out FROM ca WHERE id=a.ca) AS t6out,
    //             (SELECT t7_in FROM ca WHERE id=a.ca) AS t7in,
    //             (SELECT t7_out FROM ca WHERE id=a.ca) AS t7out
    //             FROM users a WHERE nhan_vien=$nhanvien AND ca>0");
    //         $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    //         if(sizeof($temp)>0) {  // nhân viên đã assign chi nhánh và ca
    //             $day = date('l');
    //             if ($day=='Monday') {$gio_vao=$temp[0]['t2in'];$gio_ra=$temp[0]['t2out']; }
    //             elseif ($day=='Tuesday') {$gio_vao=$temp[0]['t3in'];$gio_ra=$temp[0]['t3out']; }
    //             elseif ($day=='Wednesday') {$gio_vao=$temp[0]['t4in'];$gio_ra=$temp[0]['t4out']; }
    //             elseif ($day=='Thursday') {$gio_vao=$temp[0]['t5in'];$gio_ra=$temp[0]['t5out']; }
    //             elseif ($day=='Friday') {$gio_vao=$temp[0]['t6in'];$gio_ra=$temp[0]['t6out']; }
    //             elseif ($day=='Saturday') {$gio_vao=$temp[0]['t7in'];$gio_ra=$temp[0]['t7out']; }
    //             else {$gio_vao=''; $gio_ra='';}
    //             $giovao   = date("H:i:s");
    //             $dieukien = " WHERE ngay='$today' AND nhan_vien=$nhanvien ";
    //             $query = $this->db->query("SELECT COUNT(1) AS total FROM chamcong $dieukien ");
    //             $row = $query->fetchAll(PDO::FETCH_ASSOC);
    //             if ($row[0]['total']==0) {
    //               if ($giovao < "08:00:01")
    //                 $chamcong = 1;
    //               elseif ($giovao < "09:00:01")
    //                 $chamcong = 3;
    //               elseif ($giovao < "13:30:01")
    //                 $chamcong = 5;
    //               else
    //                 $chamcong = 0;
    //               if ($chamcong==1 || $chamcong==3)
    //                 $cong=1;
    //               elseif ($chamcong==5)
    //                 $cong = 0.5;
    //               else
    //                 $cong=0;
    //               $data = array
    //                 ('nhan_vien' => $nhanvien,
    //                   'ngay' => $today,
    //                   'gio_vao' => $giovao,
    //                   'ca_vao' => $gio_vao,
    //                   'ca_ra' => $gio_ra,
    //                   'ghi_chu' => 'chấm công',
    //                   'cham_cong' => $chamcong,
    //                   'cong' => $cong
    //                 );
    //               $ok = $this->insert("chamcong", $data);
    //             } else {
    //                 $ok = $this->db->query("UPDATE chamcong  SET gio_vao='$giovao', ca_vao='$gio_vao', ca_ra='$gio_ra'  $dieukien ");
    //             }
    //
    //         }


    function mobilemenu(){
        $query = $this->db->query("SELECT id, name, link, icon FROM menu
            WHERE active=1 AND id!=3 AND mobile=1 AND parentid IN (SELECT id FROM menu WHERE active=1 AND parentid=0) ");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    // function checkrole($name) // lấy menu id để kiểm tra xem có được phân quyền truy xuất module này ko
    // {
    //     if ($_SESSION['user']['id']==1)
    //         return false;
    //     else {
    //         $query  = $this->db->query("SELECT id FROM menu WHERE link='$name' ");
    //         $temp   = $query->fetchAll(PDO::FETCH_ASSOC);
    //         $id = $temp[0]['id'];
    //         $query = $this->db->query("SELECT menu FROM users WHERE id=".$_SESSION['user']['id']);
    //         $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    //         $role = explode(',',$temp[0]['menu']);
    //         if (in_array($id,$role))
    //             return false;
    //         else
    //             return true;
    //     }
    // }
    // function menucon($link){
    //            $query = $this->db->query("SELECT id, name, link, icon, functions FROM menu WHERE active=1 AND
    //              parentid = (SELECT id FROM menu WHERE link='$link')
    //            ORDER BY thu_tu");
    //            return $query->fetchAll(PDO::FETCH_ASSOC);
    // }

// ***************************
    // function getmenu($uid) // lấy menu id cho user admin
    // {
    //     $menu = '';
    //     if ($uid==1) {
    //         $query  = $this->db->query("SELECT id FROM menu WHERE active=1 ");
    //         $temp   = $query->fetchAll(PDO::FETCH_ASSOC);
    //         foreach ($temp as $item) {
    //             $menu.= $item['id'].',';
    //         }
    //         $menu = rtrim($menu,',');
    //     } else {
    //         $query  = $this->db->query("SELECT menu FROM users WHERE id=$uid ");
    //         $temp   = $query->fetchAll(PDO::FETCH_ASSOC);
    //         $menu = $temp[0]['menu'];
    //     }
    //     return explode(',',$menu);
    // }




    // hien thi menu con
    // function get_menucon($userid, $id)
    // {
    //     if ($userid == 7) {
    //         $query = $this->db->query("SELECT id, name, link, icon, functions FROM tblmenu WHERE parentid = $id
    //         AND active=1 ORDER BY thu_tu");
    //         return $query->fetchAll();
    //     } else {
    //         $query   = $this->db->query("SELECT menu FROM tblnhanvien WHERE id = $userid ");
    //         $menuids = $query->fetchAll();
    //         $dkien   = $menuids[0]['menu'];
    //         if ($dkien == '')
    //             return false;
    //         else {
    //             $query = $this->db->query("SELECT id, name, link, icon FROM tblmenu WHERE parentid = $id
    //             AND id IN ($dkien) AND active=1 ORDER BY thu_tu");
    //             return $query->fetchAll();
    //         }
    //     }
    // }
    //
    // function getmodule($name) // lấy menu id để kiểm tra xem có được phân quyền truy xuất module này ko
    // {
    //     $query  = $this->db->query("SELECT id FROM menu WHERE link='$name' ");
    //     $temp   = $query->fetchAll(PDO::FETCH_ASSOC);
    //     return $temp[0]['id'];
    // }
    // function checkfun($name) // Kiem tra quyen truy xuat chuc nang them xoa sua
    // {
    //     if ($_SESSION['user']['id']==1)
    //         return array("1"=>true,"2"=>true,"3"=>true);
    //     else {
    //         $fun=array("1"=>false,"2"=>false,"3"=>false);
    //         $query = $this->db->query("SELECT menu FROM users WHERE id=".$_SESSION['user']['id']);
    //         $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    //         if (isset($temp[0]['menu']) && ($temp[0]['menu']!='')) {
    //             $role = explode(',',$temp[0]['menu']);
    //             $query = $this->db->query("SELECT id FROM menu WHERE active=1 AND link = '$name' ");
    //             $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    //             if (in_array($temp[0]['id'].'.1',$role))
    //                 $fun[1]=true;
    //             if (in_array($temp[0]['id'].'.2',$role))
    //                 $fun[2]=true;
    //             if (in_array($temp[0]['id'].'.3',$role))
    //                 $fun[3]=true;
    //         }
    //         return $fun;
    //     }
    // }
}
?>
