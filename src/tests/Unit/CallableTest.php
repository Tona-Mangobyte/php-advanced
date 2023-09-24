<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Feature\MyCallable;

class CallableTest extends TestCase
{
    public function testSimple() {
        // An anonymous function
        $func = function($str) { return substr($str, 0, 5); };
        $this->printFormatted($func , "Hello World");

        // A string containing the name of a function
        $this->printFormatted("strtoupper", "Hello World");

        // An array describing a static class method
        //$this->printFormatted(["MyCallable", "ask"], "Hello World");

        // An array describing an object method
        $obj = new MyCallable();
        $this->printFormatted([$obj, "brackets"], "Hello World");


        $this->assertTrue(true);
    }

    function printFormatted(callable $format, $str) {
        echo $format($str);
        echo PHP_EOL;
    }
}