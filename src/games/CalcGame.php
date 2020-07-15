<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\GameCore\run as start;

const CALC_SYMBOLS = ['+', '-', '*'];

function run()
{
    return start(gameRule(), function () {
        return generateCalGameQuestion();
    });
}

function gameRule()
{
    return 'What is the result of the expression?' . PHP_EOL;
}

function generateCalGameQuestion()
{
    $firstOperand = rand(0, 10);
    $secondOperand = rand(0, 10);
    $operant = CALC_SYMBOLS[rand(0, 2)];

    $question = "{$firstOperand} {$operant} {$secondOperand}";
    $correctAnswer = calcMathExpression($firstOperand, $secondOperand, $operant);

    return [$question, (string) $correctAnswer];
}

function calcMathExpression($firstNum, $secondNum, $sign)
{
    switch ($sign) {
        case "-":
            return $firstNum - $secondNum;
        case "+":
            return $firstNum + $secondNum;
        case "*":
            return $firstNum * $secondNum;
        default:
            throw new \Exception("Operator does not exist.");
    }
}
