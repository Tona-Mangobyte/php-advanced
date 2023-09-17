<?php

namespace Tests\Unit;

use Anonymous\SimpleLogger;
use PHPUnit\Framework\TestCase;

class AnonymousClassTest extends TestCase
{
    public function testSimple() {
        $logger = new class {
            public function log(string $message): string
            {
                return "[Error]: ". $message;
            }
        };

        $this->assertEquals("[Error]: System err", $logger->log('System err'));
    }

    public function testSimple2() {
        $logger = new SimpleLogger();
        $this->assertEquals("[Error]: System err", $logger->err('System err'));
    }
}