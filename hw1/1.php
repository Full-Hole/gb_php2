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