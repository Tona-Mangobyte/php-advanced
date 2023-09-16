<?php

namespace Advanced\Magic;

class Foo
{
    public $bar;
    public function __get($name) {

        echo "Get:$name";
        return $this->$name;
    }

    public function __set($name, $value) {

        echo "Set:$name to $value";
        $this->$name = $value;
    }
}