<?php

namespace Tests;

use App\Controller\Game;

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testSplitCardFace()
    {
        $gameObj = new Game();
        
        $excepted = "2";

        $actual = $gameObj->splitCardFace("2_carreau");

        $this->assertEquals($excepted, $actual);

        

        return [
            "gameObj" => $gameObj, 
            "actual" => $actual
        ];
    }

     /**
     * @depends testSplitCardFace
     */
    public function testCountCard($objAndActual)
    {
        $gameObj = $objAndActual["gameObj"];
        $actual = $objAndActual["actual"];

        $actual = $gameObj->countCard($actual);

        $this->assertLessThanOrEqual(12, $actual);
    }
    
}
