<?php

namespace BrainGames\Games\ProgressionGame;

const NUMS_IN_PROGRESSION = 9;

function generateProgressionGameQuestion($start = 0, $end = 100)
{
    $progression = getProgression(rand($start, $end), NUMS_IN_PROGRESSION);
    $guessingNum = rand(0, 9);
    $correctAnswer = $progression[$guessingNum];
    $progression[$guessingNum] = '..';
    $progressionQuestion = implode(' ', $progression);

    return [$progressionQuestion, $correctAnswer];
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

