<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SimpleFunctionTest extends TestCase
{

    public function testBasicTest()
    {
        $hello = function ($name) {
            return "Hello, $name";
        };

        $this->assertEquals("Hello, Tona", $hello("Tona"));
    }
}