<?php

declare(strict_types=1);

namespace HeroGame\Logger;

class ConsoleLogger
{
    public function output(array $log): void
    {
        foreach ($log as $message) {
            echo $message . PHP_EOL;
        }
    }
}