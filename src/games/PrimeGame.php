<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\GameCore\run as start;

const GAME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".' . PHP_EOL;

function run()
{
    return start(GAME_RULE, fn () => generatePrimeGameQuestion());
}

function generatePrimeGameQuestion()
{
    $question = rand(0, 100);
    $correctAnswer = isPrimeNum($question) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function isPrimeNum($number)
{
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
