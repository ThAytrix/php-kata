<?php

namespace Tests;

use App\Controller\Deck;
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
  public function testDeckAttributeNumber()
  {
    $deckObj = new Deck();
    $target = $deckObj->getDeck();

    $this->assertCount(52, $target);
  }

  /**
   * @depends testDeckAttributeNumber
   */
  public function testDeckAttributeCards()
  {
    $deckObj = new Deck();
    $target = $deckObj->getDeck();
    $exceptedCards = ["A_coeur", "A_trefle",	"A_pique",	"A_carreau",	"2_coeur",	"2_trefle",	"2_pique",	"2_carreau",	"3_coeur",	"3_trefle",
      "3_pique",	"3_carreau",	"4_coeur",	"4_trefle",	"4_pique",	"4_carreau",	"5_coeur",	"5_trefle",	"5_pique",	"5_carreau",	"6_coeur",
        "6_trefle",	"6_pique",	"6_carreau",	"7_coeur",	"7_trefle",	"7_pique",	"7_carreau",	"8_coeur",	"8_trefle",	"8_pique",	"8_carreau",
          "9_coeur",	"9_trefle",	"9_pique",	"9_carreau",	"10_coeur",	"10_trefle",	"10_pique",	"10_carreau",	"J_coeur",	"J_trefle",	"J_pique",
            "J_carreau",	"Q_coeur",	"Q_trefle",	"Q_pique",	"Q_carreau",	"K_coeur",	"K_trefle",	"K_pique",	"K_carreau"];

    $this->assertEquals($exceptedCards, $target, "\$canonicalize = true", 0.0, 10, true);
  }
}
