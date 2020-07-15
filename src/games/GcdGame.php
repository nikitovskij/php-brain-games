<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\GameCore\run as start;

function run()
{
    return start(gameRule(), function () {
        return generateGcdGameQuestion();
    });
}

function gameRule()
{
    return 'Find the greatest common divisor of given numbers.' . PHP_EOL;
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

    return ($firstNum % $secondNum) ? findGcd($secondNum, $firstNum % $secondNum) : $secondNum;
}
