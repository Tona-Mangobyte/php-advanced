<?php

namespace Tests\Unit;

use Closure;
use PHPUnit\Framework\TestCase;

class ClosureAndCallableTest extends TestCase
{
    public function testExample() {
        // $this->callFunc1("xy"); // Catchable fatal error: Argument 1 passed to callFunc1() must be an instance of Closure, string given
        // $this->callFunc2("xy"); // Hello, World!

        $function = function() {
            echo "Hello, World!\n";
        };
        $this->callFunc1($function);
        $this->callFunc2($function);
        $this->assertTrue(true);
    }

    function callFunc1(Closure $closure) {
        $closure();
    }

    function callFunc2(Callable $callback) {
        $callback();
    }

    function xy() {
        echo 'Hello, World!';
    }
}