<?php

trait Singletrait
{
    private static $instance;  // Экземпляр объекта
    // Защищаем от создания через new Singleton
    final function __construct()
    { /* ... @return Singleton */
    }
    // Защищаем от создания через клонирование
    final function __clone()
    { /* ... @return Singleton */
    }
    // Защищаем от создания через unserialize
    final function __wakeup()
    { /* ... @return Singleton */
    }
    // Возвращает единственный экземпляр класса. @return Singleton
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

class Singleton
{
    use Singletrait;
    public function sayHi()
    {
        echo "Hello";
    }
}

class Juston extends Singleton
{
    public $word = "Word";
    public function sayHi()
    {
        parent::sayHi();
        echo $this->word;
    }
}
Singleton::getInstance()->sayHi();
$a = new Juston();
$a->sayHi();
