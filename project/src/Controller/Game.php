<?php

namespace App\Controller;

use App\Controller\Deck;
use App\Controller\User;

class Game
{
    private $dealer;
    private $player;

    public function __construct()
    {
        $deckClass = new Deck();
        $this->dealer = new User();
        $this->player = new User();

        $deck = $deckClass->getDeck();

        $hand = [];

        $hand[] = $deck[array_rand($deck)];
        $hand[] = $deck[array_rand($deck)];


        $this->dealer->setHand($hand);
      
    }

    public function getDealer(): User
    {
        return $this->dealer;
    }

    public function getPlayer(): User
    {
        return $this->player;
    }
}