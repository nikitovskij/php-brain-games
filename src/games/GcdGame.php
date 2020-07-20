<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\GameCore\run as start;

const GAME_RULE = 'Find the greatest common divisor of given numbers.' . PHP_EOL;

function run()
{
    return start(GAME_RULE, fn () => generateGcdGameQuestion());
}

function generateGcdGameQuestion()
{
    $firstNum = rand(0, 100);
    $secondNum = rand(0, 100);

    $question = "{$firstNum} {$secondNum}";
    $correctAnswer = findGcd($firstNum, $secondNum);

    return [$question, (string) $correctAnswer];
}

function findGcd($firstNum, $secondNum)
{
    if ($secondNum === 0) {
        return $firstNum;
    }

    return findGcd($secondNum, $firstNum % $secondNum);
}
