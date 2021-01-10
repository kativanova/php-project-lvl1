<?php

namespace Brain\Games\Even;

function isEven($number)
{
    return $number % 2 === 0;
}

function getQuestion(): array
{
    $number = rand(MIN_NUMBER, MAX_NUMBER);
    $response = isEven($number) ? 'yes' : 'no';
    return [$number, $response];
}

function getRules(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}
