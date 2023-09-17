<?php

namespace Anonymous;

class SimpleLogger
{
    public function err($message) {
        /*$logger = new class implements Logger {
            public function log(string $message): string
            {
                return "[Error]: ". $message;
            }
        };
        return $logger->log($message);*/
        return (new class implements Logger {
            public function log(string $message): string
            {
                return "[Error]: ". $message;
            }
        })->log($message);
    }
}