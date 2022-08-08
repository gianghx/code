<?php
class controller {
	function __construct() {
		if (isset($_SESSION[SID])) {
			$this->view = new view();
		} else
			header('Location: '.URL);
		
	}
	
	public function loadModel($name) {
		$path = 'models/'.$name.'_model.php';
		if (file_exists($path)) {
			require 'models/'.$name.'_model.php';	
			$modelName = $name . '_model';
			$this->model = new $modelName();
		}		
	}
}
?>