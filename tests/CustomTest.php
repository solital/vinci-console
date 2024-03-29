<?php

namespace Solital\Core\Console\tests;

use Solital\Core\Console\Command;
use Solital\Core\Console\Interface\CommandInterface;

class CustomTest extends Command implements CommandInterface
{
    protected string $command = "create:testsecond";
    protected array $arguments = ["name"];
    protected string $description = "Description second command";

    #[\Override]
    public function handle(object $arguments, object $options): mixed
    {
        if (isset($options->nondefinedopt)) {
            var_dump(true);
        }
        
        return $arguments->name;
    }
}
