<?php

namespace Tests;

use App\Controller\Game;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
   
    public function testUserNumber()
    {

        $game = new Game();

        $users = [$game->getDealer(), $game->getPlayer()];

        $this->assertCount(2, $users);

        return $users;
    }

    /**
     * @depends testUserNumber
     */
    public function testUserHandNumber($users)
    {
        foreach ($users as $user) {
            $target = $user->getHand();

            $this->assertCount(2, $target);

            return $target;
        }

        
    }

    /**
     * @depends testUserHandNumber
     */
    public function testUserHandCard(array $target)
    {
        $exceptedCards = ["A_coeur", "A_trefle",	"A_pique",	"A_carreau",	"2_coeur",	"2_trefle",	"2_pique",	"2_carreau",	"3_coeur",	"3_trefle",
        	"3_pique",	"3_carreau",	"4_coeur",	"4_trefle",	"4_pique",	"4_carreau",	"5_coeur",	"5_trefle",	"5_pique",	"5_carreau",	"6_coeur",
          	"6_trefle",	"6_pique",	"6_carreau",	"7_coeur",	"7_trefle",	"7_pique",	"7_carreau",	"8_coeur",	"8_trefle",	"8_pique",	"8_carreau",
            	"9_coeur",	"9_trefle",	"9_pique",	"9_carreau",	"10_coeur",	"10_trefle",	"10_pique",	"10_carreau",	"J_coeur",	"J_trefle",	"J_pique",
              	"J_carreau",	"Q_coeur",	"Q_trefle",	"Q_pique",	"Q_carreau",	"K_coeur",	"K_trefle",	"K_pique",	"K_carreau"];

                

        $this->assertContains($target[0],  $exceptedCards);
        $this->assertContains($target[1],  $exceptedCards);
    }

     /**
     * @depends testUserHandNumber
     */
    public function testCalculatePoint()
    {
        $game = new Game();

        $target = $game->getDealer()->calculatePoint($game);
    }
}
