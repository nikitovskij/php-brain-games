<?php

namespace Php\Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function isEven($number)
{
    return $number % 2 == 0;
}


function run()
{
    line('Welcome ot the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".' . PHP_EOL);
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!" . PHP_EOL, $playerName);
    
    $step = 0;
    while ($step < 3) {

        $guessingNumber = rand($start = 0, $end = 1000);
        $isEvenNumber = isEven($guessingNumber);

        line("Question: %s", $guessingNumber);
        $playerAnswer = prompt('Your answer');

        if (($isEvenNumber && $playerAnswer === 'yes') || (!$isEvenNumber && $playerAnswer === 'no')) {
            line('Correct!');
            $step++;
        } else {
            line('"yes" is wrong answer ;(. Correct answer was "no".');
            line('Let\'s try again, %s', $playerName);
            return;
        }
    }
    line('Congratulations, %s!', $playerName);
}
