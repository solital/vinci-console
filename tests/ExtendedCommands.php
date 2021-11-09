<?php

namespace Solital\Core\Test;

class ExtendedCommands
{
    /**
     * @var array
     */
    protected array $command_class = [
        \Solital\Core\Test\CustomCommands::class,
        \Solital\Core\Test\Custom::class
    ];

    public function getCommandClass()
    {
        return $this->command_class;
    }
}
