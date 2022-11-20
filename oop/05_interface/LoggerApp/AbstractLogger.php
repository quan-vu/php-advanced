<?php declare(strict_types=1);

require_once 'LoggerInterface.php';

abstract class AbstractLogger implements LoggerInterface
{
    public function info(string $message)
    {
        $this->log('info', $message);
    }

    public function error(string $message)
    {
        $this->log('error', $message);
    }

    public function warning(string $message)
    {
        $this->log('warning', $message);
    }

    public function success(string $message)
    {
        $this->log('success', $message);
    }
}