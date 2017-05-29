<?php
class Item{
    private $product;
    private $numbers;

    public function setProduct($product){
        $this->product = $product;
    }

    public function getProduct(){
        return $this->product;
    }

    public function setNumbers($numbers){
        $this->numbers = $numbers;
    }

    public function getNumbers(){
        return $this->numbers;
    }
}