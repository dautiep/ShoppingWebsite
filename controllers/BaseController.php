<?php  	
class BaseController{
	//thuoc tinh
	//phuong thuc
	function callView($view = 'home', $data = []){
		require_once 'views/layout.php';
	}
		
}
?>