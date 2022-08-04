<?php

namespace App\Controller;

class User
{
   private $hand = [];
   private $point;

   public function __construct(array $deck)
   {
        $this->addHand($deck[array_rand($deck)]);
        $this->addHand($deck[array_rand($deck)]);
   }

    public function calculatePoint($game)
    {
        $point = 0; 
        
        foreach ($this->hand as $card) {
         
            $point = $point + $game->countCard($card);
        }

        $this->point = $point;
    }

   public function setHand(array $hand): self
   {
       $this->hand = $hand;

       return $this;
   }

    public function getHand(): array
    {
        return $this->hand;
    }

   public function addHand(string $card): self
    {
        if (!array_search($card, $this->hand)) {
            $this->hand[] = $card;
        }

        return $this;
    }

    public function removeHand(array $hand): self
    {

        if (($key = array_search($hand, $this->hand)) !== false) {
            unset($this->hand[$key]);
        }

        return $this;
    }

    public function setPoint(int $point): self
    {
        $this->point = $point;
 
        return $this;
    }
 
     public function getPoint(): int
     {
         return $this->point;
     }
}