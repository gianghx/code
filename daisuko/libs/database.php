<?php
class database extends PDO{
	public function __construct(){
		try {
			parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
		} catch (Exception $e) {
			echo "Lỗi kết nối";
		}
		
	}	
}
?>