<?php

namespace Magic\Client;

class Articlelists
{
    public function get($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);
        return $this->call('get', [$params], Article::class);
    }

    /*public function __call(string $name, array $arguments)
    {
        echo "Name: " . $name . PHP_EOL;
    }*/
}