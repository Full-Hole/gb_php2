<?php

class Product{
    protected $id;
    protected $name;
    protected $price;
    protected $description;
    protected $img;
    function __construct($id, $name, $price, $description = "No description", $img){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->img = $img;
        }

    function getPrice(){
        return $this->price;
    }
    function render(){
        return "<div><h3>$this->name</h3><img src=\"$this->img\"><p>$this->description</p><h4>$this->price</h4></div>";
    }        

}

class ProductInfo extends Product{
    protected $imgList;
    protected $specs;

    private function loadProduct(){
     /*Load data from DB */   
    }

}

// $prod = new Product(1,"Table", '2200.00', 'No descr',"nop");
// echo $prod -> getPrice() . PHP_EOL;
// echo $prod -> render() . PHP_EOL;
//$single = new ProductInfo()