<?php

namespace App\Controller;

use App\Controller\Deck;
use App\Controller\User;

class Game
{
    private $dealer;
    private $player;
    private $deck;

    public function __construct()
    {
        $this->deck = new Deck();
        $deck = $this->deck->getDeck();

        $this->dealer = new User($deck);
        $this->player = new User($deck);

        $this->dealer->calculatePoint($this);
        $this->player->calculatePoint($this);
    }

    public function play()
    {
        if ($this->dealer->getPoint() === 21) {
            return "Le croupier a gagné par 21 au premier tour";
        } elseif($this->player->getPoint() === 21) {
            return "Julien a gagné par 21 au premier tour";
        }

        if($this->countCards($this->player, 17)) {
            return "Julien a gagné par 21 au comptage";
        }

        if ($this->player->getPoint() > 21) {
            return "Julien a perdue la partie par score supérieur à 21";
        }

        if($this->countCards($this->dealer, $this->player->getPoint())) {
            return "Le croupier a gagné par 21 au comptage";
        }

        if ($this->dealer->getPoint() > 21) {
            return "Le croupier a perdue la partie par score supérieur à 21";
        }

    }

    public function countCards(User $user, int $limit)
    {
        while ($user->getPoint() <= $limit) {
            $user->addHand($this->deck->getDeck()[array_rand($this->deck->getDeck())]);
            $user->calculatePoint($this);
            if ($user->getPoint() === 21) {
                return true;
                break;
            }
        }
    }

    public function splitCardFace(string $card)
    {
        $cardStrings = explode("_", $card);

        return $cardStrings[0];
    }

    public function countCard($card)
    {
        $faceCard = $this->splitCardFace($card);

        
        
        if (is_numeric($faceCard)) {
            return intval($faceCard);
        } elseif ($faceCard === 'A') {
            return 11;
        } else {
            return 10;
        }
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
