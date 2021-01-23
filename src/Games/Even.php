<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\run;

function startGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_ATTEMPTS; $i++) {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $response = isEven($number) ? 'yes' : 'no';
        $questionsAndAnswers[] = [$number, $response];
    }
    run('Answer "yes" if the number is even, otherwise answer "no".', $questionsAndAnswers);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
