<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\GameCore\run as start;

function run()
{
    return start(gameRule(), function () {
        return generateEvenGameQuestion();
    });
}

function gameRule()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".' . PHP_EOL;
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
