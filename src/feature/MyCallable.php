<?php

namespace Feature;

class MyCallable
{
    public static function myCallbackMethod() {
        echo "Hello World!\n";
    }

    function bar($arg, $arg2) {
        echo __METHOD__, " got $arg and $arg2\n";
    }
}