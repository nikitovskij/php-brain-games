<?php

namespace BrainGames\Games\GcdGame;

function generateGcdGameQuestion($start = 0, $end = 100)
{
    $firstNum = rand($start, $end);
    $secondNum = rand($start, $end);
    
    $question = "{$firstNum} {$secondNum}";
    $correctAnswer = findGcd($firstNum, $secondNum);

    return [$question, $correctAnswer];
}

function findGcd($firstNum, $secondNum)
{
    return ($firstNum % $secondNum) ? findGcd($secondNum, $firstNum % $secondNum) : $secondNum;
}
