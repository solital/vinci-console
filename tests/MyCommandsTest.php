<?php

namespace Solital\Core\Console\tests;

use Solital\Core\Console\Command;
use Solital\Core\Console\Interface\CommandInterface;

class MyCommandsTest extends Command implements CommandInterface
{
    protected string $command = "user:test";
    protected array $arguments = [
        "--argument-custom-second"
    ];
    protected string $description = "Description user command";

    public function handle(object $arguments, object $options): mixed
    {
        return $this->getCommand();
    }
}
