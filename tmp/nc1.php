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
}

function myfunction() 
{
    return "Hello There";
}

const MYCONST = 1;

$a = new Foo;

var_dump($a);

$c = new \App\Model\Foo; //  Глобальная область видимости

var_dump($c);

$d = namespace\MYCONST;      // константа __NAMESPACE__
var_dump($d);



