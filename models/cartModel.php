<?php 
require_once 'dbconnect.php';
class CartModel extends DBConnect{
    //thuoc tinh
    //phuong thuc
    function getProducts($id){
        $sql = "SELECT products.id, products.name, products.price, products.image, products.promotion_price
                FROM products
                WHERE id = '$id'";
        return $this->getOneRows($sql);
    }
}
?>