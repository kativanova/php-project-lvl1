<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\run;

function startGame()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_ATTEMPTS; $i++) {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $response = isPrime($number) ? 'yes' : 'no';
        $questionsAndAnswers[] = [$number, $response];
    }
    run('Answer "yes" if given number is prime. Otherwise answer "no".', $questionsAndAnswers);
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
