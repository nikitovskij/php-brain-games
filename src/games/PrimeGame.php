<?php

namespace BrainGames\Games\PrimeGame;

function generatePrimeGameQuestion($start = 0, $end = 100)
{
    $guessingNumQuestion = rand($start, $end);
    $correctAnswer = isPrimeNum($guessingNumQuestion) ? 'yes' : 'no';

    return [$guessingNumQuestion, $correctAnswer];
}

function isPrimeNum($number)
{
    if ($number == 1) {
        return false;
    }

    for ($i = 2; $i <= $number/2; $i++){
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}
