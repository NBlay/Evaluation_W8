<?php

spl_autoload_register(function ($class) {
    require 'classes/' . $class . '.php';
});

$player1 = new Ranger ('Alleria');
$player2 = new Mage ('Magicien');

//var_dump($player1 , $player2);

// Characters attacking while both alive
while ($player1->isAlive() && $player2->isAlive()) {
    // First Character attacking the 2nd
    echo $player1->action($player2);
    echo "<br>";
    $status = "{$player1->pseudo} à gagné!";
    // Check if target is alive
    if ($player2->isAlive()) {
        // Second Character attacking the first
        echo $player2->action($player1);
        echo "<br>";
        $status = "{$player2->pseudo} a gagné!";
        //break;
    }
}

echo $status;
