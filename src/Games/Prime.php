<?php

namespace Brain\Games\Prime;

function getQuestion(): array
{
    $number = rand(MIN_NUMBER, MAX_NUMBER);
    $response = isPrime($number) ? 'yes' : 'no';
    return [$number, $response];
}

function getRules()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function isPrime(int $number)
{
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
