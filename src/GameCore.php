<?php

namespace BrainGames\GameCore;

use function BrainGames\Games\EvenGame\{generateEvenGameQuestion, checkEvenGameAnswer, getCorrectEvenGameAnswer};
use function BrainGames\Games\CalcGame\{generateCalGameQuestion, checkCalcGameAnswer, getCorrectCalcGameAnswer};
use function cli\line;
use function cli\prompt;

function run($nameOfTheGame)
{
    line('Welcome to the Brain Games!');
    gameRules($nameOfTheGame);
    $playerName = prompt('May I have your name?', false, ' ');
    playerGreeting($playerName);

    $step = 0;
    while ($step < 3) {
        $gameQuestion =  generateGameQuestion($nameOfTheGame);
        line("Question: %s", $gameQuestion);
        $playerAnswer = prompt('Your answer');

        $isAnswerCorrect = isAnswerCorrect($nameOfTheGame, $gameQuestion, $playerAnswer);
        if ($isAnswerCorrect) {
            rightAnswerMsg();
            $step++;
        } else {
            $correctAnswer = correctAnswer($nameOfTheGame, $gameQuestion);
            wrongAnswerMsg($playerName, $playerAnswer, $correctAnswer);
            return;
        }
    }
    winnerSlogan($playerName);
}

function generateGameQuestion($nameOfTheGame)
{
    $gameQuestion = [
        'brain-even' => fn() => generateEvenGameQuestion(),
        'brain-calc' => fn() => generateCalGameQuestion()
    ];

    return $gameQuestion[$nameOfTheGame]();
}

function isAnswerCorrect($nameOfTheGame, $gameQuestion, $playerAnswer)
{
    $isAnswerCorrect = [
        'brain-even' => fn($question, $answer) => checkEvenGameAnswer($question, $answer),
        'brain-calc' => fn($question, $answer) => checkCalcGameAnswer($question, $answer),
    ];

    return $isAnswerCorrect[$nameOfTheGame]($gameQuestion, $playerAnswer);
}

function correctAnswer($nameOfTheGame, $gameQuestion)
{
    $correctAnswer = [
        'brain-even' => fn($question) => getCorrectEvenGameAnswer($question),
        'brain-calc' => fn($question) => getCorrectCalcGameAnswer($question),
    ];

    return $correctAnswer[$nameOfTheGame]($gameQuestion);
}

function gameRules($nameOfTheGame)
{
    $gamesRules = [
        'brain-even' => 'Answer "yes" if the number is even, otherwise answer "no".' . PHP_EOL,
        'brain-calc' => 'What is the result of the expression?' . PHP_EOL
    ];

    return line($gamesRules[$nameOfTheGame]);
}

function playerName()
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
