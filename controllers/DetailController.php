<?php  
require_once 'BaseController.php';
require_once 'models/detailModel.php';
class DetailController extends BaseController{
	//thuoc tinh
	//phuong thuc
	function Detail(){
		$url = $_GET['url'];
		$a = new DetailModel;
		$urlproduct = $a->getUrl($url);
		$relatedproducts = $a->getRelatedProducts($url);
		$data = ['urlproduct' => $urlproduct, 'relatedproducts' => $relatedproducts];
		$this->callView('detail', $data);	
	}
}
?>