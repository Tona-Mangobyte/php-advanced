<?php

namespace Anonymous;

interface Logger
{
    public function log(string $message): string;
}