<?php

namespace Solital\Core\Test;

use Solital\Core\Console\Command;
use Solital\Core\Console\Interface\CommandInterface;

class Custom extends Command implements CommandInterface
{
    protected string $command = "create:testesecond";
    protected array $arguments = [
        "--argument-custom-second"
    ];
    protected string $description = "Description second command";

    public function handle(object $arguments, object $options): void
    {
        #$res = $this->getArguments();
        var_dump($this->getCommand());
    }
}
