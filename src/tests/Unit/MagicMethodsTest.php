<?php

namespace Tests\Unit;

use Magic\Customer;
use Magic\FileReader;
use Magic\HtmlElement;
use Magic\MyClass;
use Magic\SimpleClass;
use Magic\Str;
use Magic\User;
use Magic\Sort;
use PHPUnit\Framework\TestCase;

/*
 * https://www.php.net/manual/en/language.oop5.magic.php
 * */
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

    public function testCall() {
        $s = new Str('Hello, World!');

        $this->assertEquals("HELLO, WORLD!", $s->upper());
        $this->assertEquals("hello, world!", $s->lower());
        $this->assertEquals(13, $s->length());
    }

    public function testCall2() {
        $this->assertEquals("HELLO, WORLD!", Str::upper('Hello, World!'));
        $this->assertEquals("hello, world!", Str::lower('Hello, World!'));
        $this->assertEquals(13, Str::len('Hello, World!'));
    }

    public function testInvoke() {
        $instance = new MyClass;
        $this->assertEquals("Called to the __invoke method", $instance());
        $this->assertEquals("Called to the __toString method", $instance);
    }

    public function testInvoke2() {
        $customers = [
            ['id' => 1, 'first_name' => 'John', 'last_name' => 'Do'],
            ['id' => 3, 'first_name' => 'Alice', 'last_name' => 'Gustav'],
            ['id' => 2, 'first_name' => 'Bob', 'last_name' => 'Filipe']
        ];

        // sort customers by first name
        usort($customers, new Sort('first_name'));

        $this->assertEquals(3, $customers[0]['id']);
        $this->assertEquals('Alice', $customers[0]['first_name']);

        // sort customers by last name
        usort($customers, new Sort('last_name'));

        $this->assertEquals(1, $customers[0]['id']);
        $this->assertEquals('John', $customers[0]['first_name']);
    }

    public function testSerialize() {
        $customer = new Customer(10, 'John Doe', 'john.doe@example.com');
        /*$str = serialize($customer);
        file_put_contents('customer.txt', $str);
        file_put_contents('customer.dat', $str);*/

        $this->assertTrue(true);
    }

    public function testUnserialize() {
        $str = file_get_contents('customer.txt');
        $customer = unserialize($str);
        var_dump($customer);
        $this->assertTrue(true);
    }
}