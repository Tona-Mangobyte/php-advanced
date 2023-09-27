<?php

namespace Tests\Reflection;

use Feature\Reflection\SimpleClass;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionFunction;
use ReflectionNamedType;

class SimpleClassTest extends TestCase
{
    public function testGetMethods() {
        $instance = new SimpleClass();
        $methods = (new ReflectionClass($instance))->getMethods();
        $methodOne = $methods[0];
        $this->assertEquals("hello", $methodOne->name);
        $this->assertInstanceOf(ReflectionNamedType::class, $methodOne->getReturnType());
        $this->assertEquals("string", $methodOne->getReturnType()->getName());
    }

    public function testGetMethods2() {
        $instance = new SimpleClass();
        $methods = get_class_methods($instance);
        $this->assertEquals("hello", $methods[0]);
    }

    public function testGetParameters() {
        $callback = function (int $id, string $name) {
            return "Id: $id and name: $name";
        };
        $params = (new ReflectionFunction($callback))->getParameters();
        $this->assertEquals("int",$params[0]->getType()->getName());
        $this->assertEquals("id",$params[0]->getName());
        $this->assertEquals("string",$params[1]->getType()->getName());
        $this->assertEquals("name",$params[1]->getName());
    }
}