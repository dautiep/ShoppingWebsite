<?php  
require_once 'BaseController.php';
class CheckOutController extends BaseController{
	//thuoc tinh
	//phuong thuc
	function checkOut(){
		$this->callView('checkout');
	}
}
?>