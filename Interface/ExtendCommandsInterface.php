<?php

namespace Solital\Core\Console\Interface;

interface ExtendCommandsInterface
{
    /**
     * @return array
     */
    public function getCommandClass(): array;

    /**
     * @return string
     */
    public function getTypeCommands(): string;
}
