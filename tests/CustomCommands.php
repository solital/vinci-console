<?php

namespace Solital\Core\Test;

use Solital\Core\Console\Command;
use Solital\Core\Console\Interface\CommandInterface;

class CustomCommands extends Command implements CommandInterface
{
    protected string $command = "create:teste";
    protected array $arguments = ["name", "email"];
    protected string $description = "Description command";

    public function handle(object $arguments, object $options): void
    {
        var_dump($arguments->name);
        var_dump($options->method);
    }
}
