<?php

namespace Brain\Games\GCD;

use function Brain\Games\Engine\run;

function startGame()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_ATTEMPTS; $i++) {
        $number1 = rand(MIN_NUMBER, MAX_NUMBER);
        $number2 = rand(MIN_NUMBER, MAX_NUMBER);
        $questionsAndAnswers[] = ["{$number1} {$number2}", getGCD($number1, $number2)];
    }
    run('Find the greatest common divisor of given numbers.', $questionsAndAnswers);
}

function getGCD(int $num1, int $num2)
{
    if ($num1 == 0 || $num2 == 0) {
        return 1;
    }
    $greater = $num1 > $num2 ? $num1 : $num2;
    $smaller = $num1 < $num2 ? $num1 : $num2;

    $rest = $greater % $smaller;

    while ($rest != 0) {
        $greater = $smaller;
        $smaller = $rest;
        $rest = $greater % $smaller;
    }
    return $smaller;
}
