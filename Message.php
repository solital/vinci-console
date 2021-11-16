<?php

namespace Solital\Core\Console;

use Codedungeon\PHPCliColors\Color;

class Message
{
    /**
     * @var string
     */
    protected static string $message;

    /**
     * @var Color|null
     */
    protected static ?Color $color_reset = null;

    /**
     * @var Color|null
     */
    protected static ?Color $color_success = null;

    /**
     * @var Color|null
     */
    protected static ?Color $color_info = null;

    /**
     * @var Color|null
     */
    protected static ?Color $color_warning = null;

    /**
     * @var Color|null
     */
    protected static ?Color $color_error = null;

    /**
     * @var Color|null
     */
    protected static ?Color $color_line = null;

    /**
     * Private construct
     */
    private function __construct()
    {
        if ($this->colorIsSupported() || $this->are256ColorsSupported()) {
            self::$color_reset = Color::RESET;
            self::$color_success = Color::green();
            self::$color_info = Color::cyan();
            self::$color_warning = Color::yellow();
            self::$color_error = Color::bg_red();
            self::$color_line = Color::white();
        }
    }

    /**
     * Get the value of message
     *
     * @return  string
     */
    public function getMessage()
    {
        return self::$message;
    }

    /**
     * @param string $message
     * @param mixed $color
     * @param bool $space
     * 
     * @return new static
     */
    public static function set(string $message): Message
    {
        self::$message =  $message;

        return new static;
    }

    /**
     * @param bool $space
     * 
     * @return Message
     */
    public function success(bool $space = false): Message
    {
        if ($space == true) {
            self::$message = "  " . self::$color_success . self::$message . self::$color_reset;
        } else {
            self::$message = self::$color_success . self::$message . self::$color_reset;
        }

        return $this;
    }

    /**
     * @param bool $space
     * 
     * @return Message
     */
    public function info(bool $space = false): Message
    {
        if ($space == true) {
            self::$message = "  " . self::$color_info . self::$message . self::$color_reset;
        } else {
            self::$message = self::$color_info . self::$message . self::$color_reset;
        }

        return $this;
    }

    /**
     * @param bool $space
     * 
     * @return Message
     */
    public function warning(bool $space = false): Message
    {
        if ($space == true) {
            self::$message = "  " . self::$color_warning . self::$message . self::$color_reset;
        } else {
            self::$message = self::$color_warning . self::$message . self::$color_reset;
        }

        return $this;
    }

    /**
     * @param bool $space
     * 
     * @return Message
     */
    public function error(bool $space = false): Message
    {
        if ($space == true) {
            self::$message = "  " . self::$color_error . self::$message . self::$color_reset;
        } else {
            self::$message = self::$color_error . self::$message . self::$color_reset;
        }

        return $this;
    }

    /**
     * @param bool $space
     * 
     * @return Message
     */
    public function line(bool $space = false): Message
    {
        if ($space == true) {
            self::$message = "  " . self::$color_line . self::$message . self::$color_reset;
        } else {
            self::$message = self::$color_line . self::$message . self::$color_reset;
        }

        return $this;
    }

    /**
     * @return Message
     */
    public function print(): Message
    {
        echo self::$message;

        return $this;
    }

    /**
     * @return Message
     */
    public function break($repeat = false): Message
    {
        if ($repeat == true) {
            echo PHP_EOL . PHP_EOL;
        } else {
            echo PHP_EOL;
        }

        return $this;
    }

    /**
     * @return void
     */
    public function exit(): void
    {
        exit;
    }

    /**
     * @return bool
     */
    public function colorIsSupported()
    {
        if (DIRECTORY_SEPARATOR === '\\') {
            if (function_exists('sapi_windows_vt100_support') && @sapi_windows_vt100_support(STDOUT)) {
                return true;
            } elseif (getenv('ANSICON') !== false || getenv('ConEmuANSI') === 'ON') {
                return true;
            }
            return false;
        } else {
            return function_exists('posix_isatty') && @posix_isatty(STDOUT);
        }
    }

    /**
     * @return bool
     */
    public function are256ColorsSupported()
    {
        if (DIRECTORY_SEPARATOR === '\\') {
            return function_exists('sapi_windows_vt100_support') && @sapi_windows_vt100_support(STDOUT);
        } else {
            return str_starts_with(getenv('TERM'), '256color');
        }
    }
}
