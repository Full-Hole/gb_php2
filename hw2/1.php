<?php
/**
 * Заглушка
 */

class BaseClass {
     function __construct() {
         echo "Конструктор класса BaseClass\n";
     }
}
class SubClass extends BaseClass {
     function __construct() {
         parent::__construct();
         echo "Конструктор класса SubClass\n";
     }
}
$obj = new BaseClass();
$obj = new SubClass();
?>
