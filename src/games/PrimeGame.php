<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\GameCore\run as start;

function run()
{
    return start(gameRule(), function () {
        return generatePrimeGameQuestion();
    });
}

function gameRule()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".' . PHP_EOL;
}

function generatePrimeGameQuestion()
{
    $guessingNumQuestion = rand(0, 100);
    $correctAnswer = isPrimeNum($guessingNumQuestion) ? 'yes' : 'no';

    return [$guessingNumQuestion, (string) $correctAnswer];
}

function isPrimeNum($number)
{
    $number = abs($number);

    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
