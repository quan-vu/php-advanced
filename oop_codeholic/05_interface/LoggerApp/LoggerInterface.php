<?php

interface LoggerInterface
{
    public function info(string $message);
    public function error(string $message);
    public function warning(string $message);
    public function success(string $message);
    public function log(string $level, string $message);
}