<?php
namespace Models;

class Cart {
    private $products = null;
    private $cart = array();
    private $sum = 0;
    private $count = 0;

    function __construct(ProductsCollection $products) {
        $this->products = $products;
    }

    public function generateRandom($to) {
        $middleProduct = $this->products->getMiddleProduct();
        $cheapestProduct = $this->products->getCheapestProduct();

        // От середины до самого дорогого
        $cursor = $this->products->find()->sort(array('price'=>1))->where('price', array('$gte' => $middleProduct->get('price')));
        foreach($cursor as $product) {
            if($this->sum + (int) $product->get('price') <= $to) {
                $this->addToCart($product);
            } else {
                break;
            }
        }

        // От середины до самого дешевого
        $cursor = $this->products->find()->sort(array('price'=>-1))->where('price', array('$lt' => $middleProduct->get('price')));
        foreach($cursor as $product) {
            if($this->sum + (int) $product->get('price') <= $to) {
                $this->addToCart($product);
            } else {
                if($this->sum + (int) $cheapestProduct->get('price') > $to) {
                    break;
                }
            }
        }

    }

    private function addToCart(\Sokil\Mongo\Document $product) {
        $this->cart[] = array(
            'title' => $product->get('title'),
            'price' => $product->get('price')
        );
        $this->sum += (int) $product->get('price');
        $this->count++;
    }

    public function getCount(){
        return $this->count;
    }

    public function getSum(){
        return $this->sum;
    }

    public function getCartList() {
        return $this->cart;
    }

}