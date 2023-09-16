<?php

namespace Magic;


use RuntimeException;

class User
{
    private $user = [
        "name" => "John",
        "age" => 22,
        "email" => "john@gmail.com",
        "gender" => "Male"
    ];

    function __get($var_name){
        if(isset($this->user[$var_name])){
            return $this->user[$var_name];
        }
        throw new RuntimeException("\nSorry, the property \"{$var_name}\" does not exist.\n");
    }

    public function __set(string $var_name, $value): void
    {
        if(!array_key_exists($var_name, $this->user)){
            throw new RuntimeException("\nSorry, the property \"{$var_name}\" does not exist.\n");
        }
        $this->user[$var_name] = $value;
    }
}