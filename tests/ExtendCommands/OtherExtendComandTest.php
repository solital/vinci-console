<?php

namespace Solital\Core\Console\tests\ExtendCommands;

use Solital\Core\Console\Interface\ExtendCommandsInterface;

class OtherExtendComandTest implements ExtendCommandsInterface
{
    /**
     * @var array
     */
    protected array $command_class = [
        \Solital\Core\Test\MyCommandsTest::class
    ];

    public function getCommandClass(): array
    {
        return $this->command_class;
    }
}
