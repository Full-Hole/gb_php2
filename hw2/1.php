<?php

/*
 * Заглушка
 * 1. Создать структуру классов ведения товарной номенклатуры.
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
    private $quantity;
    protected static $price = 1050;
    
    abstract protected function calcPrice();
    public function getPrice()
    {
        return $this->calcPrice();
    }
}

class digitalProduct extends Product
{
    // function __construct(int $quantity)
    // {
    //     $this->quantity = $quantity;
    // }
    protected function calcPrice()
    {
        return (parent::$price / 2)."$ per unit".PHP_EOL;
    }
}
class simpleProduct extends Product
{

    protected function calcPrice()
    {
        return parent::$price."$ per unit".PHP_EOL;
    }
}
class weightProduct extends Product
{
    function __construct(float $quantity)
    {
        $this->quantity = $quantity;
    }
    protected function calcPrice()
    {
        return $this->quantity * parent::$price."$ per $this->quantity".PHP_EOL;
    }
}


$digital = new digitalProduct();
$simple = new simpleProduct();
$weight = new weightProduct(0.25);
echo $digital->getPrice();
echo $simple->getPrice();
echo $weight->getPrice();
