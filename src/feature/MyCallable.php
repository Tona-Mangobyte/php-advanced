<?php

namespace Feature;

class MyCallable
{
    public $baz = 10;
    public static function myCallbackMethod() {
        echo "Hello World!\n";
    }

    function bar($arg, $arg2) {
        echo __METHOD__, " got $arg and $arg2\n";
    }

    public static function ask($str) {
        return $str . "?";
    }
    public function brackets($str) {
        return "[$str]";
    }
}