<?php

namespace BrainGames\Games\GcdGame;

function generateGcdGameQuestion($start = 0, $end = 100)
{
    $firstNum = rand($start, $end);
    $secondNum = rand($start, $end);

    return "{$firstNum} {$secondNum}";
}

function checkGcdGameAnswer($numbers, $playerAnswer)
{
    [$firstNum, $secondNum] = explode(' ', $numbers);
    $result = findGcd($firstNum, $secondNum);
    return $result == $playerAnswer;
}

function getCorrectGcdGameAnswer($gameQuestionNum)
{
    [$firstNum, $secondNum] = explode(' ', $gameQuestionNum);
    return findGcd($firstNum, $secondNum);
}

function findGcd($firstNum, $secondNum)
{
    return ($firstNum % $secondNum) ? findGcd($secondNum, $firstNum % $secondNum) : $secondNum;
}
