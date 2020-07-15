<?php

namespace BrainGames\Cli;

use function BrainGames\GameCore\run;
use function cli\line;
use function cli\prompt;

//TODO: choice non-existing number of game
//TODO: fix start()
function start()
{
    line('Welcome to the Brain Games!');
    line('The list of available games.' . PHP_EOL);
    listOfTheGames();
    line('Please, choose the game number.' . PHP_EOL);
    $choice = prompt('Your choice');
    line('------------------------------' . PHP_EOL);
    $nameOfTheGame = gameToPlay($choice);
    // run($nameOfTheGame);
}

function listOfTheGames()
{
    $listOfGames = [
        "1. Even number\n",
        "2. Calc math expression\n",
        "3. Greatest common divisor\n",
        "4. Progression\n",
        "5. Prime number\n"
    ];

    $availableGames = implode('', $listOfGames);
    return line($availableGames);
}

function gameToPlay($choice)
{
    $games = [
        '1' => 'brain-even',
        '2' => 'brain-calc',
        '3' => 'brain-gcd',
        '4' => 'brain-progression',
        '5' => 'brain-prime',
    ];

    return $games[$choice];
}
