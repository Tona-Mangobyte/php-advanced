<?php

namespace Tests\LarConcept;

use LarConcept\Routing\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function testExample() {
        $result = (new Router)->get('/article', [SimpleController::class, 'index']);
        $result2 = (new Router)->get('/article', "SimpleController@index");
        $result3 = (new Router)->get('/article', function () {
            return "hello";
        });
        $this->assertEquals("Tests\LarConcept\SimpleController", $result[0]);
        $this->assertEquals("SimpleController@index", $result2['controller']);
        $this->assertInstanceOf(\Closure::class, $result3);
    }

}

class SimpleController {
    function index() {
        return "hello world";
    }
}