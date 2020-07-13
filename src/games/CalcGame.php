<?php

namespace BrainGames\Games\CalcGame;

function generateCalGameQuestion($start = 0, $end = 10)
{
    $symbols = ['+', '-', '*'];
    $firstNum = rand($start, $end);
    $secondNum = rand($start, $end);
    $symbol = $symbols[array_rand($symbols)];

    return "{$firstNum} {$symbol} {$secondNum}";
}

function checkCalcGameAnswer($mathExpression, $playerAnswer)
{
    $result = calcMathExpression($mathExpression);
    return $result == $playerAnswer;
}

function getCorrectCalcGameAnswer($gameQuestionNum)
{
    return calcMathExpression($gameQuestionNum);
}

function calcMathExpression($mathExpression)
{
    [$firstNum, $sign, $secondNum] = explode(' ', $mathExpression);

    switch ($sign) {
        case "-":
            $result = $firstNum - $secondNum;
            break;
        case "+":
            $result = $firstNum + $secondNum;
            break;
        case "*":
            $result = $firstNum * $secondNum;
            break;
    }

    return $result;
}
