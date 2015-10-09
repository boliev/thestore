<?php
require_once (__DIR__."/../src/bootstrap.php");
if(isset($_GET['act'])) {
    if($_GET['act'] == 'getCart') {
        $cart = new Models\Cart($products);
        $cart->generateRandom((int)$_GET['sum']);
        echo json_encode(array(
            'sum'=> $cart->getSum(),
            'count'=> $cart->getCount()
        ));
    }

    if($_GET['act'] == 'generateProducts') {
        $generator = Faker\Factory::create('en_EN');
        $products->delete();
        for($i=0; $i<10000; $i++) {
            $product = \Models\ProductsCollection::generateProducts($generator);
            $products->insert($product);
        }
        echo json_encode(array(
            'max' => $products->getMostExpensiveProduct(),
            'min' => $products->getCheapestProduct(),
            'count' => $products->count()
        ));

    }
}