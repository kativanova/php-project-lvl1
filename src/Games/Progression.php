<?php

namespace Brain\Games\Progression;

function getQuestion(): array
{
    $a1 = rand(MIN_NUMBER, MAX_NUMBER);
    $d = rand(0, 10);
    $progression = [];

    $missingIndex = rand(0, 10);

    for ($i = 0; $i < LENGTH_OF_PROGRESSION; $i++) {
        $progression[] = $a1 + $i * $d;
    }

    $progressionString = "";
    for ($i = 0; $i < LENGTH_OF_PROGRESSION; $i++) {
        if ($i != $missingIndex) {
            $progressionString .= $progression[$i];
        } else {
            $progressionString .= "..";
        }
        $progressionString .= " ";
    }

    return [$progressionString, $progression[$missingIndex]];
}

function getRules()
{
    return 'What number is missing in the progression?';
}
