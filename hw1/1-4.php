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
    public function getName(){
            return $this->name;
        }
        
    public function getPrice(){
        return $this->price;
    }
    public function getDesctription(){
        return $this->desctription;
    }
    protected function render(){
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

class PhoneProduct extends Product{
    private $simCardCount;
    protected $specs;

    public function __construct($id, $name, $price, $description = "No description", $img,$simCardCount) 
    {
        parent::__construct($id, $name, $price, $description = "No description", $img);
        $this->simCardCount = $simCardCount;
    }
    public function getSimCardCount(){
        return $this->simCardCount;
    }
    public function render(){
        return parent::render()."<div>Количесвто SIM-карт: $this->simCardCount</div>";
    }
    


}

// $prod = new Product(1,"Table", '2200.00', 'No descr',"nop");
// echo $prod -> getPrice() . PHP_EOL;
// echo $prod -> render() . PHP_EOL;
//$phone = new PhoneProduct(1,"Table", '2200.00', 'No descr',"nop", 2);