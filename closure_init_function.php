<?php

// инициализация параметров функции через возврат безымянной функции с замкнутыми в ней переменными
// как раз замкнутые переменные используются в качестве конфига изменяющего работу функции
function initSomeFunc($a, $b)
{
    return function ($param) use ($a, $b)
    {
        if ($a > $b) {
            return $a + $param;
        } else {
            return $b + $param;
        }
    };
}

$variousOne = initSomeFunc(101, 201); // всегда будет возвращать второй аргумент (201), прибавленный к $param
/*
return function ($param) use (101, 201)
{
    return 201+$param
}
*/

$variousTwo = initSomeFunc(202, 102); // всегда будет возвращать первый аргумент (202), прибавленный к $param
/*
return function ($param) use (202, 102)
{
    return 202+$param
}
*/

// использование
echo $variousOne(100) . PHP_EOL; // выведет 301
echo $variousTwo(100) . PHP_EOL; // выведет 302
