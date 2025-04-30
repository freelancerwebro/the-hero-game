<?php

declare(strict_types=1);

namespace HeroGame\Logger;

interface LoggerInterface
{
    public function output(array $log): void;
}