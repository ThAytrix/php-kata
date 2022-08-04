<?php

namespace Tests;

use App\HelloWorld;
use PHPUnit\Framework\TestCase;

class CalculTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
    }
}
