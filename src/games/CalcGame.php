<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\GameCore\run as start;

const OPERATORS = ['+', '-', '*'];
const GAME_RULE = 'What is the result of the expression?' . PHP_EOL;

function run()
{
    return start(GAME_RULE, fn () => generateCalGameQuestion());
}

function generateCalGameQuestion()
{
    $firstOperand = rand(0, 10);
    $secondOperand = rand(0, 10);
    $operator = OPERATORS[rand(0, count(OPERATORS) - 1)];

    $question = "{$firstOperand} {$operator} {$secondOperand}";
    $correctAnswer = calcMathExpression($firstOperand, $secondOperand, $operator);

    return [$question, (string) $correctAnswer];
}

function calcMathExpression($firstOperand, $secondOperand, $operator)
{
    switch ($operator) {
        case "-":
            return $firstOperand - $secondOperand;
        case "+":
            return $firstOperand + $secondOperand;
        case "*":
            return $firstOperand * $secondOperand;
        default:
            throw new \Exception("Operator does not exist.");
    }
}
