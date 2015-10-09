<?php
require_once (__DIR__.'/../vendor/autoload.php');
use \Sokil\Mongo\Client;

$client = new Client('mongodb://127.0.0.1');

$client->map([
    'tz'  => [
        'products' => '\Models\ProductsCollection'
    ],
]);
$database = $client->getDatabase('tz');
$products = $database->getCollection('products');