<?php

namespace BrainGames\GameCore;

use function cli\line;
use function cli\prompt;

const NUM_OF_GAME_ROUNDS = 3;

function run($gameRule, $gameQuestionGenerator)
{
    line('Welcome to the Brain Games!');
    line($gameRule);
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!" . PHP_EOL, $playerName);

    for ($i = 0; $i < NUM_OF_GAME_ROUNDS; $i++) {
        [$question, $correctAnswer] = $gameQuestionGenerator();

        line("Question: %s", $question);
        $playerAnswer = prompt('Your answer');

        if ($correctAnswer !== $playerAnswer) {
            wrongAnswerMsg($playerName, $playerAnswer, $correctAnswer);
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $playerName);
}

function wrongAnswerMsg($playerName, $wrongAnswer, $correctAnswer)
{
    return [
        line('"' . $wrongAnswer . '" is wrong answer ;(. Correct answer was "' . $correctAnswer . '".'),
        line('Let\'s try again, %s', $playerName),
    ];
}
