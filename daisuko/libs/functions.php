<?php
class functions {
    public static function uploadfile($filename,$dir,$name) {
        if ($_FILES[$filename]["size"] > 5000000)  // gioi han kich thuoc file 5M
            return false;
        // elseif(getimagesize($_FILES[$filename]["tmp_name"]) == false) // kiểm tra xem có phải là file ảnh ko?
        //     return false;
        else {
            $imageFileType = strtolower(pathinfo(basename($_FILES[$filename]["name"]),PATHINFO_EXTENSION));
            $newfile=$name.'.'.$imageFileType;
            $target = $dir.$newfile;
            $i=1;
            while (file_exists($target)) {
                $newfile=$name.'.'.$i.'.'.$imageFileType;
                $target = $dir.$newfile;
                $i++;
            }
            if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target))
                return $newfile;
            else
                return false;
        }
    }

    public static function convertname($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = str_replace(" ","-",$str);
        $str = str_replace("!","-",$str);
        $str = str_replace("@","-",$str);
        $str = str_replace("#","-",$str);
        $str = str_replace("$","-",$str);
        $str = str_replace("%","-",$str);
        $str = str_replace("&","-",$str);
        $str = str_replace("&amp;","-",$str);
        $str = str_replace("*","-",$str);
        $str = str_replace("?","-",$str);
        $str = str_replace(";","-",$str);
        $str = str_replace(":","-",$str);
        $str = str_replace(",","-",$str);
        $str = str_replace(".","-",$str);
        $str = str_replace("\"","-",$str);
        $str = str_replace('“',"-",$str);
        $str = str_replace('”',"-",$str);
        $str = str_replace('"',"-",$str);
        $str = str_replace("(","-",$str);
        $str = str_replace(")","-",$str);
        $str = str_replace("{","-",$str);
        $str = str_replace("}","-",$str);
        $str = str_replace("[","-",$str);
        $str = str_replace("]","-",$str);
        $str = str_replace("/","-",$str);
        $str = str_replace("----","-",$str);
        $str = str_replace("---","-",$str);
        $str = str_replace("--","-",$str);
        $str = rtrim(strtolower($str),'-');
        return $str;
    }

	public static function dequy($menu,$parentid,$level) {
		if (!isset($ketqua)) $ketqua=array();
		global $ketqua;
		$level=($parentid==0)?0:$level+1;
		foreach($menu as $value) {
			$value['level']=$level;
			if($value['cha'] == $parentid) {
				$ketqua[]=$value;
				functions::dequy($menu,$value['id'],$level);
			}
		}
		return $ketqua;
	}

  public static function text_limit($str, $limit) 
    {
        $str_s = '';
        if (stripos($str, " ")) {
            $ex_str = explode(" ", $str);
            if (count($ex_str) > $limit) {
                for ($i = 0; $i < $limit; $i++) {
                    $str_s .= $ex_str[$i] . " ";
                }
                return $str_s.' ...' ;
            } else {
                return $str;
            }
        } else {
            return $str;
        }
    }

    public static function text_limit1($str, $limit) 
    {
        $str_s = '';
        if (stripos($str, " ")) {
            $ex_str = explode(" ", $str);
            if (count($ex_str) > $limit) {
                for ($i = $limit; $i < count($ex_str); $i++) {
                    $str_s .= $ex_str[$i] . " ";
                }
                return $str_s ;
            } else {
                return '';
            }
        } else {
            return '';
        }
    }

  public static function convertDate($text) { //convert 31/12/2019 thang 2019-12-31
		if ($text != '') {
			list ( $date, $month, $year ) = explode ( "/", $text );
			$text = $year . '-' . $month . '-' . $date;
		}
		return $text;
	}

  // public static function workingday($month,$year,$hours) { // tinh so ngay lam viec thong thang
  //   $type = CAL_GREGORIAN;
  //   $day_count = cal_days_in_month($type, $month, $year);
  //   $workday=0;
  //   $workhours=0;
  //   for ($i = 1; $i <= $day_count; $i++) {
  //       // if ($i<10) $i = '0'.$i;
  //       $date = $year.'-'.$month.'-'.$i; //format date
  //       $get_name = date('l', strtotime($date)); //get week day
  //       $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
  //       if ($day_name == 'Sun')
  //           $workhours = $workhours + $hours[1];
  //       elseif ($day_name == 'Mon')
  //           $workhours = $workhours + $hours[2];
  //       elseif ($day_name == 'Tue')
  //           $workhours = $workhours + $hours[3];
  //       elseif ($day_name == 'Wed')
  //           $workhours = $workhours + $hours[4];
  //       elseif ($day_name == 'Thu')
  //           $workhours = $workhours + $hours[5];
  //       elseif ($day_name == 'Fri')
  //           $workhours = $workhours + $hours[6];
  //       elseif ($day_name == 'Sat')
  //           $workhours = $workhours + $hours[7];
  //   }
  //   $workday = ROUND($workhours/8,1);
  //   return $workday;
  // }



}
?>
