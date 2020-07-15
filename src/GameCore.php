<?php

namespace BrainGames\GameCore;

use function cli\line;
use function cli\prompt;

function run($gameRule, $gameQuestionGenerator)
{
    line('Welcome to the Brain Games!');
    line($gameRule);
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!" . PHP_EOL, $playerName);

    for ($i = 0; $i < 3; $i++) {
        [$question, $correctAnswer] = $gameQuestionGenerator();

        line("Question: %s", $question);
        $playerAnswer = prompt('Your answer');

        if ($correctAnswer !== $playerAnswer) {
            return wrongAnswerMsg($playerName, $playerAnswer, $correctAnswer);
        }

        line('Correct!');
    }

    return line('Congratulations, %s!', $playerName);
}

function wrongAnswerMsg($playerName, $wrongAnswer, $correctAnswer)
{
    return [
        line('"' . $wrongAnswer . '" is wrong answer ;(. Correct answer was "' . $correctAnswer . '".'),
        line('Let\'s try again, %s', $playerName),
    ];
}
