<?php

namespace Solital\Core\Test\ExtendCommands;

class ExtendedCommandsTest
{
    /**
     * @var array
     */
    protected array $command_class = [
        \Solital\Core\Test\CustomCommandsTest::class,
        \Solital\Core\Test\CustomTest::class
    ];

    public function getCommandClass()
    {
        return $this->command_class;
    }
}
