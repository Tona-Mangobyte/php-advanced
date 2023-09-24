<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Feature\MyCallable;

/*
 * @see https://www.php.net/manual/en/language.types.callable.php
 * */
class MyCallableTest extends TestCase
{
    public function testMyCallable() {
        // Type 2: Static class method call
        // call_user_func(array('MyCallable', 'myCallbackMethod'));

        // Type 3: Object method call
        $obj = new MyCallable();
        call_user_func(array($obj, 'myCallbackMethod'));
        call_user_func_array(array($obj, 'bar'), array("three", "four"));

        // Type 4: Static class method call
        //call_user_func('MyCallable::myCallbackMethod');

        //MyCallable::myCallbackMethod();
        $this->assertTrue(true);
    }
}