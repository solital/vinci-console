<?php

namespace Solital\Core\Console;

use Performance\Performance;
use Solital\Core\Console\Message;

trait DefaultCommandsTrait
{
    /**
     * @var array
     */
    protected array $default_commands = [
        'help' => 'help',
        'about' => 'about',
        'list' => 'list',
        'performance' => 'performance'
    ];

    /**
     * @param string $command
     * @param array $arguments
     * 
     * @return void
     */
    public function verifyDefaultCommand(string $command, array $arguments = []): void
    {
        foreach ($this->default_commands as $method => $class) {
            if (strcmp($command, $method) === 0) {
                if (method_exists(__TRAIT__, $command)) {
                    $this->$method($command, $arguments);
                    exit;
                }
            }
        }
    }

    /**
     * @param string $command
     * @param array $arguments
     * 
     * @return void
     */
    private function help(string $command, array $arguments = []): void
    {
        $res = $this->getCommandClass();

        if (isset($res)) {
            foreach ($res as $class) {
                $cmd = (new $class())->getCommand();
                $command = $this->getArgument($cmd);

                if (str_contains($cmd, $command)) {
                    $instance = new $class();

                    Message::set("Usage:")->warning()->print()->break();
                    Message::set($instance->getCommand())->line(true)->print()->break(true);

                    Message::set("Description:")->warning()->print()->break();
                    Message::set($instance->getDescription())->line(true)->print()->break(true);

                    Message::set("Arguments:")->warning()->print()->break();

                    foreach ($instance->getAllArguments() as $args) {
                        Message::set($args)->line(true)->print()->break();
                    }
                } else {
                    Message::set("$cmd - Command not found")->error()->print()->break()->exit();
                }
            };
        }
    }

    /**
     * @param string $command
     * @param array $arguments
     * 
     * @return void
     */
    private function list(string $command, array $arguments = []): void
    {
        $res = $this->getCommandClass();

        foreach ($res as $res) {
            if (isset($res)) {
                foreach ($res as $class) {
                    $value = new $class(null);
                    $all_cmd = $value->getCommand();
                    $all_description = $value->getDescription();
                    $all_commands[$all_cmd] = $all_description;
                }
            }
        }

        ksort($all_commands);
        foreach ($all_commands as $key => $values) {
            $this->all_commands[$key] = $values;
        }

        $console = Message::set("Vinci Console ")->getMessage();
        $version = Message::set($this->getVersion())->success()->getMessage();

        echo $console . $version . PHP_EOL . PHP_EOL;

        Message::set("Usage:")->warning()->print()->break();
        Message::set("command <argument>")->line(true)->print()->break(true);

        Message::set("All commands")->warning()->print()->break();
        TableBuilder::formattedArray($this->all_commands, margin: true);
    }

    /**
     * @param string $command
     * @param array $arguments
     * 
     * @return void
     */
    public function performance(string $command, array $arguments = []): void
    {
        Performance::point();
        Performance::results();
    }

    /**
     * @param string $command
     * @param array $arguments
     * 
     * @return void
     */
    private function about(string $command, array $arguments = []): void
    {
        $about = Message::set("Vinci Console ")->line()->getMessage();
        $version = Message::set(self::getVersion())->success()->getMessage();
        $date = Message::set(" (" . self::getDateVersion() . ")")->line()->getMessage();

        echo $about . $version . $date . PHP_EOL . PHP_EOL;
        Message::set("PHP Version (" . PHP_VERSION . ")")->line()->print()->break();
        Message::set("By Solital Framework. Access http://solitalframework.com/")->line()->print()->break();
    }
}
