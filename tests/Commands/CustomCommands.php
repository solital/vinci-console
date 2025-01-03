<?php

namespace Solital\Core\Console\Tests\Commands;

use Solital\Core\Console\Command;
use Solital\Core\Console\Interface\CommandInterface;

class CustomCommands extends Command implements CommandInterface
{
    protected string $command = "create:test";
    //protected array $arguments = ["argument-custom-second"];
    protected string $description = "Description command";
    protected array $options = ["--option", "--witharg="];

    #[\Override]
    public function handle(object $arguments, object $options): mixed
    {
        if (isset($options->option)) {
            return $options->option;
        }

        if (isset($options->witharg)) {
            return $options->witharg;
        }

        return null;
    }
}
