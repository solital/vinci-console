<?php

namespace Solital\Core\Console;

class InputOutput
{
    /**
     * @var string
     */
    private string $message;

    /**
     * @var string
     */
    private string $confirm;

    /**
     * @var string
     */
    private string $refuse;

    /**
     * @var bool
     */
    private bool $case_sensitive;

    /**
     * @param string $message
     * @param string $confirm
     * @param string $refuse
     * 
     * @return InputOutput
     */
    public function confirmDialog(string $message, string $confirm, string $refuse, bool $case_sensitive = true): InputOutput
    {
        $this->message = readline($message . ": [$confirm, $refuse] ");
        $this->confirm = $confirm;
        $this->refuse = $refuse;
        $this->case_sensitive = $case_sensitive;

        return $this;
    }

    /**
     * @param string $message
     * 
     * @return InputOutput
     */
    public function dialog(string $message): InputOutput
    {
        $this->message = readline($message);
        return $this;
    }

    /**
     * @param callable $callback
     * 
     * @return void
     */
    public function action(callable $callback): void
    {
        call_user_func($callback, $this->message);
    }

    /**
     * @param callable $callback
     * 
     * @return InputOutput
     */
    public function confirm(callable $callback): InputOutput
    {
        if ($this->case_sensitive == true) {
            if (str_contains($this->confirm, $this->message)) {
                call_user_func($callback);
                exit;
            }
        } else if ($this->case_sensitive == false) {
            if (strcasecmp($this->confirm, $this->message) === 0) {
                call_user_func($callback);
                exit;
            }
        }

        return $this;
    }

    /**
     * @param callable $callback
     * 
     * @return void
     */
    public function refuse(callable $callback): void
    {
        if ($this->case_sensitive == true) {
            if (str_contains($this->refuse, $this->message)) {
                call_user_func($callback);
                exit;
            }
        } else if ($this->case_sensitive == false) {
            if (strcasecmp($this->refuse, $this->message) === 0) {
                call_user_func($callback);
                exit;
            }
        }

        Message::set('Option not found')->error()->print()->break()->exit();
    }
}
