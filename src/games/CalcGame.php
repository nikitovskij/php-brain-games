<?php

namespace BrainGames\Games\CalcGame;

function generateCalGameQuestion($start = 0, $end = 10)
{
    $symbols = ['+', '-', '*'];
    $firstNum = rand($start, $end);
    $secondNum = rand($start, $end);
    $symbol = $symbols[array_rand($symbols)];

    $question = "{$firstNum} {$symbol} {$secondNum}";
    $correctAnswer = calcMathExpression($question);

    return [$question, $correctAnswer];
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
