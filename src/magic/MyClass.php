<?php

namespace Magic;

class MyClass
{
    public function __invoke(...$arguments): string
    {
        return 'Called to the __invoke method';
    }

    public function __toString(): string
    {
        return 'Called to the __toString method';
    }
}