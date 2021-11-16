<?php

namespace Solital\Core\Test\ExtendCommands;

class OtherExtendComandTest
{
    /**
     * @var array
     */
    protected array $command_class = [
        \Solital\Core\Test\MyCommandsTest::class
    ];

    public function getCommandClass()
    {
        return $this->command_class;
    }
}
