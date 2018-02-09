<?php

// Пример синтаксиса, использующего пространство имен

namespace App\Model; // Определение пространств имен

/* 
    Названия пространств имен PHP и php, 
    и составные названия (PHP\Classes), 
    являются зарезервированными и их не следует использовать 
    в пользовательском коде. 
*/

class Foo
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2017-06-01';

    public function sampleFunction($a, $b = null)
    {
        if ($a === $b) {
            bar();
        } elseif ($a > $b) {
            $foo->bar($arg1);
        } else {
            BazClass::bar($arg2, $arg3);
        }
    }
 
    final public static function bar()
    {
        // тело метода
        return "тело метода";
    }
}



$a = new Foo;

var_dump(Foo::bar());
var_dump(\App\Model\Foo::bar());

var_dump($a->bar());

var_dump(Foo::DATE_APPROVED);

$c = new \App\Model\Foo; //  Глобальная область видимости

var_dump(\App\Model\Foo::DATE_APPROVED);

var_dump($c->bar());
