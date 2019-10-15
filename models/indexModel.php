<?php
require_once 'dbconnect.php'; 
class IndexModel extends DBConnect {
    //phuong thuc
    //Lay san pham noi bat
    function getFeaturedProduct(){
        $sql = 'SELECT products.*, page_url.id AS `idurl`, page_url.url
                FROM products, page_url
                WHERE status = 1 AND products.id_url = page_url.id';
        return $this->getMoreRows($sql);
    }
    //Lay san pham ban chay
    function getTopSellers(){
        $sql = 'SELECT products.*, page_url.url, bill_detail.quantity, SUM(bill_detail.quantity) AS `soluong` 
                FROM products, bill_detail, page_url 
                WHERE products.id = bill_detail.id_product AND products.id_url = page_url.id
                GROUP BY bill_detail.id_product 
                ORDER BY soluong DESC';
        return $this->getMoreRows($sql);
    }
    //Lay san pham chay tren slider
    function getSlider(){
        $sql = 'SELECT *
                FROM `slide`
                WHERE status = 1';
        return $this->getMoreRows($sql);
    }

    //Lay cac san pham ban chay nhat
    function getBestSeller(){
        $sql ='SELECT products.*, page_url.url, bill_detail.quantity, SUM(bill_detail.quantity) AS soluong 
               FROM products, bill_detail, page_url 
               WHERE products.status = 1 AND products.id = bill_detail.id_product AND products.id_url = page_url.id
               GROUP BY bill_detail.id_product 
               ORDER BY soluong DESC 
               LIMIT 4';
        return $this->getMoreRows($sql);
    }

    //Lay san pham dang ban(new = 1)
    function getOnSale(){
        $sql = 'SELECT products.*, page_url.url
                FROM products, page_url
                WHERE products.new = 1 AND products.id_url = page_url.id
                LIMIT 3';
        return $this->getMoreRows($sql);
    }
}
?>