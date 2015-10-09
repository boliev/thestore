<?php
require_once (__DIR__."/../src/bootstrap.php");
if(!isset($_GET['sum'])) {
    exit;
}
$cart = new Models\Cart($products);
$cart->generateRandom((int)$_GET['sum']);

header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="cart.csv"');
foreach($cart->getCartList() as $product) {
    echo $product['title'].";".$product['price']."\n";
}