<?php

namespace Solital\Core\Test;

use Solital\Core\Console\Command;
use Solital\Core\Console\Interface\CommandInterface;

class MyCommands extends Command implements CommandInterface
{
    protected string $command = "user:teste";
    protected array $arguments = [
        "--argument-custom-second"
    ];
    protected string $description = "Description user command";

    public function handle(object $arguments, object $options): void
    {
        var_dump($this->getCommand());
    }
}
