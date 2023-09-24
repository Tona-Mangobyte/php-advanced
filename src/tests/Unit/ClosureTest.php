<?php

namespace Tests\Unit;

use Feature\MyCallable;
use PHPUnit\Framework\TestCase;

class ClosureTest extends TestCase
{
    public function testClosure() {
        // Our closure
        $double = function($a) {
            return $a * 2;
        };
        // This is our range of numbers
        $numbers = range(1, 5);
        // Use the closure as a callback here to
        // double the size of each element in our
        // range
        $new_numbers = array_map($double, $numbers);
        $this->assertEquals(2, $new_numbers[0]); // 4
        $this->assertEquals(10, $new_numbers[4]); // 10
    }

    public function testClosure2() {
        $fb = new MyCallable();

        $inject = function($i){return $this->baz * $i;};
        $cb1 = \Closure::bind($inject, $fb);
        $cb2 = $inject->bindTo($fb);

        $this->assertEquals(20, $cb1->call($fb, 2)); // 20
        $this->assertEquals(30, $cb2(3)); // 30
    }
}