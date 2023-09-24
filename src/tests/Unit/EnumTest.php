<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

require 'Enums.php';

class EnumTest extends TestCase
{

    public function testIndex() {
        $done = \ArrayableStatus::done;
        print_r($done->value . PHP_EOL);
        // print_r($done->toArray());

        $doneInt = \IntegerStatus::done;
        print_r($doneInt->value . PHP_EOL);
        $this->assertTrue(true);
    }
}