<?php

declare(strict_types=1);

namespace Tests\Logger;

use HeroGame\Logger\ConsoleLogger;
use PHPUnit\Framework\TestCase;

class ConsoleLoggerTest extends TestCase
{
    public function testItOutputsAllLogLinesToConsole()
    {
        $log = [
            'Orderus hits Wild Beast for 15 damage.',
            'Wild Beast remaining health: 85',
            'Orderus wins!'
        ];

        $logger = new ConsoleLogger();

        ob_start();
        $logger->output($log);
        $output = ob_get_clean();

        $expected = implode(PHP_EOL, $log) . PHP_EOL;

        $this->assertEquals($expected, $output);
    }
}
