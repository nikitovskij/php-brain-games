<?php

namespace BrainGames\Games\EvenGame;

function generateEvenGameQuestion($start = 0, $end = 100)
{
    return rand($start, $end);
}

function checkEvenGameAnswer($gameQuestionNum, $playerAnswer)
{
    $isEvenNumber = isEven($gameQuestionNum);
    return ($isEvenNumber && $playerAnswer === 'yes') || (!$isEvenNumber && $playerAnswer === 'no');
}

function getCorrectEvenGameAnswer($gameQuestionNum)
{
    return isEven($gameQuestionNum) ? 'yes' : 'no';
}

function isEven($number)
{
    return $number % 2 === 0;
}
