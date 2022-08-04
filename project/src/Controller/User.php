<?php

namespace App\Controller;

class User
{
   private $hand;

   public function setHand(array $hand): self
   {
       $this->hand = $hand;

       return $this;
   }

    public function getHand(): array
    {
        return $this->hand;
    }

   public function addHand(array $hand): self
    {
        if (!array_search($hand, $this->hand)) {
            $this->hand[] = $hand;
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
}