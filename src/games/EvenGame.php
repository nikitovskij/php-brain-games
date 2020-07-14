<?php

namespace BrainGames\Games\EvenGame;

function generateEvenGameQuestion($start = 0, $end = 100)
{
    $question = rand($start, $end);
    $correctAnswer = isEven($question) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function isEven($number)
{
    return $number % 2 === 0;
}
