<?php

namespace Solital\Core\Test;

class OtherExtendComand
{
    /**
     * @var array
     */
    protected array $command_class = [
        \Solital\Core\Test\MyCommands::class
    ];

    public function getCommandClass()
    {
        return $this->command_class;
    }
}
