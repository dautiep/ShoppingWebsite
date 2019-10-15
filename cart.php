<?php 
require_once 'controllers/ShoppingCartController.php';
$a = new ShoppingCartController();
if(isset($_POST['idProduct'])){
    $a->addToCart();
}elseif(isset($_POST['id_remove'])){
    $a->removeFromCart();
}
else{
    $a->shoppingCart();
}

// $a->addToCart();
?>