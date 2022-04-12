<?php

trait Singletrait
{
    private static $_instance;  // Экземпляр объекта
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
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
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

Singleton::getInstance()->sayHi();

