<?php
require_once 'BaseController.php';
require_once 'models/indexModel.php';
class IndexController extends BaseController{
	//thuoc tinh
	//phuong thuc
	function Home(){
		$a = new IndexModel;
		$featuredproduct = $a->getFeaturedProduct();
		$topsellers = $a->getTopSellers();
		$slider = $a->getSlider();
		$bestseller = $a->getBestSeller();
		$onsale = $a-> getOnSale();
		$data = ['featuredproduct' => $featuredproduct, 'topsellers' => $topsellers, 'slider' => $slider, 'bestseller' => $bestseller, 'onsale' => $onsale]; //dat vao mang de truyen vao phuong thuc
		$this->callView('home', $data);
	}
}
?>