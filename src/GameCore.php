<?php

namespace BrainGames\GameCore;

use function BrainGames\Games\EvenGame\generateEvenGameQuestion;
use function BrainGames\Games\CalcGame\generateCalGameQuestion;
use function BrainGames\Games\GcdGame\generateGcdGameQuestion;
use function BrainGames\Games\ProgressionGame\generateProgressionGameQuestion;
use function BrainGames\Games\PrimeGame\generatePrimeGameQuestion;
use function cli\line;
use function cli\prompt;

const NUM_OF_GAME_QUESTIONS = 3;

function run($nameOfTheGame)
{
    line('Welcome to the Brain Games!');
    gameRules($nameOfTheGame);
    $playerName = askPlayerName();
    playerGreeting($playerName);

    $step = 0;
    while ($step < NUM_OF_GAME_QUESTIONS) {
        [$gameQuestion, $correctAnswer] = generateGameQuestion($nameOfTheGame);
        
        line("Question: %s", $gameQuestion);
        $playerAnswer = prompt('Your answer');

        if ($correctAnswer == $playerAnswer) {
            rightAnswerMsg();
            $step++;
        } else {
            wrongAnswerMsg($playerName, $playerAnswer, $correctAnswer);
            return;
        }
    }
    winnerSlogan($playerName);
}

function generateGameQuestion($nameOfTheGame)
{
    $gameQuestion = [
        'brain-even'        => fn() => generateEvenGameQuestion(),
        'brain-calc'        => fn() => generateCalGameQuestion(),
        'brain-gcd'         => fn() => generateGcdGameQuestion(),
        'brain-progression' => fn() => generateProgressionGameQuestion(),
        'brain-prime'       => fn() => generatePrimeGameQuestion(),
    ];

    return $gameQuestion[$nameOfTheGame]();
}

function gameRules($nameOfTheGame)
{
    $gamesRules = [
        'brain-even'        => 'Answer "yes" if the number is even, otherwise answer "no".' . PHP_EOL,
        'brain-calc'        => 'What is the result of the expression?' . PHP_EOL,
        'brain-gcd'         => 'Find the greatest common divisor of given numbers.' . PHP_EOL,
        'brain-progression' => 'What number is missing in the progression?' . PHP_EOL,
        'brain-prime'       => 'Answer "yes" if given number is prime. Otherwise answer "no".' . PHP_EOL,
    ];

    return line($gamesRules[$nameOfTheGame]);
}

function askPlayerName()
{
    return prompt('May I have your name?', false, ' ');
}

function playerGreeting($playerName)
{
    return line("Hello, %s!" . PHP_EOL, $playerName);
}

function rightAnswerMsg()
{
    return line('Correct!');
}

function wrongAnswerMsg($playerName, $wrongAnswer, $correctAnswer)
{
    return [
        line('"' . $wrongAnswer . '" is wrong answer ;(. Correct answer was "' . $correctAnswer . '".'),
        line('Let\'s try again, %s', $playerName),
    ];
}

function winnerSlogan($playerName)
{
    return line('Congratulations, %s!', $playerName);
}
