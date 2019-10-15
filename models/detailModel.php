<?php
require_once 'dbconnect.php';
class DetailModel extends DBConnect{
    //thuoc tinh
    //phuong thuc
    //So sanh url tren duong dan va trong database
    function getUrl($url){
        $sql ="SELECT products.*, page_url.id AS `idurl`, page_url.url
               FROM products, page_url
               WHERE products.id_url = page_url.id AND page_url.url = '$url'";
        return $this->getOneRows($sql); //trả ve mot doi tuong, khong phai la mot mang
    }

    //Lay cac san pham cung loai
    function getRelatedProducts($url){
        $sql= "SELECT products.*, page_url.url
               FROM products, page_url
               WHERE products.id_url = page_url.id AND products.id_type = (SELECT products.id_type 
                                         FROM products, page_url 
                                         WHERE products.id_url = page_url.id AND page_url.url = '$url')";
        return $this->getMoreRows($sql);
    }

}
?>