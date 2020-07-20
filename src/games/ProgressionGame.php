<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\GameCore\run as start;

const NUMS_IN_PROGRESSION = 10;
const GAME_RULE = 'What number is missing in the progression?' . PHP_EOL;

function run()
{
    return start(GAME_RULE, fn () => generateProgressionGameQuestion());
}

function generateProgressionGameQuestion()
{
    $progression = getProgression(rand(0, 100), NUMS_IN_PROGRESSION, rand(1, 10));
    $guessingNumIndex = rand(0, NUMS_IN_PROGRESSION - 1);
    $correctAnswer = $progression[$guessingNumIndex];
    $progression[$guessingNumIndex] = '..';
    $question = implode(' ', $progression);

    return [$question, (string) $correctAnswer];
}

function getProgression($initNum, $numsInProgression, $progressionStep)
{
    $progression[] = $initNum;

    for ($i = 1; $i < $numsInProgression; $i++) {
        $initNum += $progressionStep;
        $progression[] = $initNum;
    }

    return $progression;
}
