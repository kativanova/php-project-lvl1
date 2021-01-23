<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\run;

define('LENGTH_OF_PROGRESSION', 10);

function startGame()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_ATTEMPTS; $i++) {
        $progression = getProgression();
        $missingIndex = rand(0, 9);
        $progressionString = "";
        for ($j = 0; $j < LENGTH_OF_PROGRESSION; $j++) {
            if ($j != $missingIndex) {
                $progressionString .= $progression[$j];
            } else {
                $progressionString .= "..";
            }
            $progressionString .= " ";
        }

        $questionsAndAnswers[] = [$progressionString, $progression[$missingIndex]];
    }
    run('What number is missing in the progression?', $questionsAndAnswers);
}

function getRules()
{
    return 'What number is missing in the progression?';
}

function getProgression(): array
{
    $a1 = rand(MIN_NUMBER, MAX_NUMBER);
    $d = rand(0, 10);
    $progression = [];

    for ($i = 0; $i < LENGTH_OF_PROGRESSION; $i++) {
        $progression[] = $a1 + $i * $d;
    }
    return $progression;
}