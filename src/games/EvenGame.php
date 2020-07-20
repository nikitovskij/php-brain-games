<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\GameCore\run as start;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".' . PHP_EOL;

function run()
{
    return start(GAME_RULE, fn () => generateEvenGameQuestion());
}

function generateEvenGameQuestion()
{
    $question = rand(0, 100);
    $correctAnswer = isEven($question) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function isEven($number)
{
    return $number % 2 === 0;
}
