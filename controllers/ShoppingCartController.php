<?php  
require_once 'BaseController.php';
require_once 'models/cartModel.php';
require_once 'helpers/Cart.php';
session_start();
class ShoppingCartController extends BaseController{
	//thuoc tinh
	//phuong thuc
	//phương thức thêm vào giỏ hàng
	function addToCart(){
		$id = $_POST['idProduct'];
		$a = new CartModel();
		$product = $a->getProducts($id);
		//kiem tra sp, nếu không thấy id hoặc id không hợp lệ thì thông báo lỗi
		//dùng đề bắt lỗi
		if($product == false){
			$data = [
				'error' => true,
				'mess' => 'Khong tim thay san pham!'
			];
			$json = json_encode($data);
			echo $json;
			return false;
		}
		//Khởi tạo số lượng đầu tiên
		$qty = 1;
		//Kiểm tra oldcart
		$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		$cart = new Cart($oldCart);
		$cart->add($product, $qty);
		$_SESSION['cart'] = $cart;
		//print_r($_SESSION['cart']);

		$data = [
			'error' => false,
			'mess' => 'Đã thêm vào giỏ hàng!'
		];
		$json = json_encode($data);
		echo $json;
	}
	
	//Phương thức xóa một sp ra khỏi giỏ hàng
	function removeFromCart(){
		$id = $_POST['id_remove'];
		//echo $id;
		$a = new CartModel();
		$product = $a->getProducts($id);
		//kiem tra sp, nếu không thấy id hoặc id không hợp lệ thì thông báo lỗi
		//dùng đề bắt lỗi
		if($product == false){
			$data = [
				'error' => true,
				'mess' => 'Không tìm thấy sản phẩm!'
			];
			$json = json_encode($data);
			echo $json;
			return false;
		}
		$qty = 1;
		$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		$cart = new Cart($oldCart);
		$cart->removeItem($id);
		$_SESSION['cart'] = $cart; //xóa xong cập nhật lại giỏ hàng
		//print_r($_SESSION['cart']);
		$data = [
			'error' => false,
			'mess' => 'Xóa sản phẩm trong giỏ hàng thành công!'
		];
		$json = json_encode($data);
		echo $json;


	}

	//Phương thức load view giỏ hàng
	function shoppingCart(){
		//lấy dữ liệu ở trong session
		$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		$cart = new Cart($oldCart); 
		//session_destroy();
		$data = ['datacart' => $cart];
		//print_r($_SESSION['cart']);
		$this->callView('shoppingcart', $data);
		
	}
}
?>