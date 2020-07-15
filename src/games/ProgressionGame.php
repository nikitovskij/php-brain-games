<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\GameCore\run as start;

const NUMS_IN_PROGRESSION = 9;

function run()
{
    return start(gameRule(), function () {
        return generateProgressionGameQuestion();
    });
}

function gameRule()
{
    return 'What number is missing in the progression?' . PHP_EOL;
}

function generateProgressionGameQuestion()
{
    $progression = getProgression(rand(0, 100), NUMS_IN_PROGRESSION);
    $guessingNum = rand(0, 9);
    $correctAnswer = $progression[$guessingNum];
    $progression[$guessingNum] = '..';
    $progressionQuestion = implode(' ', $progression);

    return [$progressionQuestion, (string) $correctAnswer];
}

function getProgression($initNum, $numsInProgression)
{
    $progression[] = $initNum;

    for ($i = 0; $i < $numsInProgression; $i++) {
        $initNum += 1;
        $progression[] = $initNum;
    }

    return $progression;
}
