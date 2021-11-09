<?php

namespace Solital\Core\Console\Interface;

interface CommandInterface
{
    /**
     * @param object $arguments
     * @param object $options
     * 
     * @return void
     */
    public function handle(object $arguments, object $options): void;
}