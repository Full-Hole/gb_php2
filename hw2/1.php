<?php

/*
 1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза.
 У штучного товара обычная стоимость,
  у весового – в зависимости от продаваемого количества в килограммах.
   У всех формируется в конечном итоге доход с продаж.
д) Что можно вынести в абстрактный класс, наследование?
 */

namespace hw2;

abstract class Product
{
    const PROFIT_PERCENT = 10;
    //private $quantity; 
    
    abstract public function calcPrice(); //подсчет общего итоговой суммы
    //abstract protected function calcProfit(); //подсчет дохода
    abstract public function getPrice(); // получить стоимость единицы товара

    public function calcProfit(){
        return $this->calcPrice()/100 * self::PROFIT_PERCENT;
    }
    // public function getPrice()
    // {
    //     return $this->calcPrice();
    // }
}

class digitalProduct extends Product
{
    private $quantity;
    const PRICE = 1050;
    function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function getPrice(){
        return self::PRICE;
    }
    public function calcPrice()
    {
        return $this->getPrice() * $this->quantity;
        
    }

}
class simpleProduct extends digitalProduct
{

    function __construct(int $quantity)
    {
        $this->quantity = $quantity;
        $this->price = parent::PRICE;
    }
    public function getPrice(){
        
        return parent::PRICE * 2;
    }
    public function calcPrice()
    {
        return $this->getPrice() * $this->quantity;
        
    }
    
}
class weightProduct extends Product
{
    private $price;
    function __construct($price, float $quantity)
    {
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function getPrice(){
        return $this->price;
    }
    public function calcPrice()
    {
        return $this->quantity * $this->price;
    }
}


$digital = new digitalProduct(2);
$simple = new simpleProduct(2);
$weight = new weightProduct(100, 0.25);
// echo $digital->getPrice();
// echo $simple->getPrice();
// echo $weight->getPrice();

echo $digital->getPrice() . ' За единицу товара <br/>';
echo $digital->calcPrice() . ' Всего <br/>';
echo $digital->calcProfit() . ' Доход <br/>';

echo $simple ->getPrice() . ' За единицу товара <br/>';
echo $simple ->calcPrice() . ' Всего <br/>';
echo $simple ->calcProfit() . ' Доход <br/>';

echo $weight ->getPrice() . ' За единицу 100гр <br/>';
echo $weight ->calcPrice() . ' Всего <br/>';
echo $weight ->calcProfit() . ' Доход <br/>';

