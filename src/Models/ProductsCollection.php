<?php
namespace Models;
// Custom collection
class ProductsCollection extends \Sokil\Mongo\Collection{

    public static function generateProducts(\Faker\Generator $generator) {
        $title_words = $generator->words(mt_rand(2,5));
        $title = implode(' ', $title_words);
        $price = mt_rand(1,10000);
        return array(
            'title' => $title,
            'price' => $price
        );
    }

    public function getMostExpensiveProduct() {
        return $this->find()->sort(array('price'=>-1))->limit(1)->current();
    }

    public function getCheapestProduct() {
        return $this->find()->sort(array('price'=>1))->limit(1)->current();
    }

    public function getMiddleProduct() {
        $middle = (int) ($this->count()/2);
        return $this->find()->skip($middle)->sort(array('price'=>1))->limit(1)->current();
    }

}
