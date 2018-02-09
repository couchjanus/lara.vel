<?php

namespace App\Lib; // Определение пространств имен

include 'Bar.php';

class Foo
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2017-06-01';
 
    final public static function bar()
    {
        // тело метода
        return "тело метода bar";
    }
}
echo "\nопределяется как класс App\Lib\Foo с методом bar\n";
echo Foo::bar(); // определяется как класс App\Lib\Foo с методом bar
echo "\nопределяется как константа App\Lib\Foo\VERSION\n";
echo Foo::VERSION; // определяется как константа App\Lib\Foo\VERSION


echo "\nопределяется как класс App\Lib\Helper\Bar c методом foo\n";
echo Helper\Bar::foo(); // определяется как класс App\Lib\Helper\Bar c методом foo
echo "\nопределяется как константа App\Lib\Helper\Bar\DATE_APPROVED\n";
echo Helper\Bar::DATE_APPROVED; // определяется как константа App\Lib\Helper\Bar\DATE_APPROVED
