<?php

namespace Tests\Unit;

use Magic\HtmlElement;
use Magic\SimpleClass;
use Magic\User;
use PHPUnit\Framework\TestCase;

class MagicMethodsTest extends TestCase
{
    public function testGetOrSet() {

        $div = new HtmlElement('div');
        $div->id = 'page';
        $div->class = 'light';
        $this->assertEquals('<div id="page" class="light">Hello</div>', $div->html('Hello'));
        $this->assertTrue(true);
    }

    public function testGetOrSet2() {

        $student = new SimpleClass();
        $student->name = 'Tona';
        $student->gender = 'Male';
        $this->assertEquals('Tona', $student->name);
        $this->assertEquals('Male', $student->gender);
    }

    public function testGetOrSet3() {

        $name = function () {
            return "Tona";
        };
        $student = new SimpleClass();
        $student->name = $name;
        $student->gender = 'Male';
        $student->{"address"} = 'PP';
        $isClosure = $student->name instanceof \Closure;
        $this->assertTrue($isClosure);
        $this->assertEquals('Male', $student->gender);
        $this->assertEquals('PP', $student->address);
    }

    public function testGetOrSet4() {
        $user = new User();
        $this->assertEquals("John", $user->name);
        $user->name = "Tona";
        $this->assertEquals("Tona", $user->name);
    }
}