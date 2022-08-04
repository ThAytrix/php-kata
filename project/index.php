<?php 

session_start();

require_once 'vendor/autoload.php';

use App\Controller\Game;

$game = new Game();
echo $game->play();



?>