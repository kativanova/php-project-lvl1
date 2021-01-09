<?php

namespace Brain\Games\Even;

define("MIN_NUMBER", 0);
define("MAX_NUMBER", 100);

function isEven($number)
{
    return $number % 2 === 0;
}

function isCorrectAnswer($number, $responce)
{
    return isEven($number) && $responce === 'yes'
            || !isEven($number) && $responce === 'no';
}

function getCorrectAnswer($number)
{
    return isEven($number) ? 'yes' : 'no';
}

function getRandoNumber()
{
    return rand(MIN_NUMBER, MAX_NUMBER);
}
