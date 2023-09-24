<?php

namespace Tests\Unit;

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
        print_r($new_numbers);
        $this->assertTrue(true);
    }
}