<?php

namespace App\Logging;

use Monolog\Logger;

class MeticulousLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        return new Logger(
            env('APP_NAME'),
            [
                new MeticulousLoggerHandler(),
            ]
        );
    }
}
