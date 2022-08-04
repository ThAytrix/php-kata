<?php

namespace App\Controller;

class Deck
{
    private $faces = ["A", 2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K"];
    private $suits = ["coeur", "trefle", "pique", "carreau"];
    private $deck = [];

    public function __construct() {
        foreach ($this->faces as $face) {
            foreach ($this->suits as $suit) {
                $this->deck[] = $face . "_" . $suit;
            }
        }
    }

    public function getDeck(): ?array
    {
        return $this->deck;
    }
}
