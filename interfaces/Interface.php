<?php

interface TableInterface {
    public function save(array $data);
}

interface LogInterface {
    public function log($message);
}

class Table implements TableInterface, LogInterface {
    public function save(array $data) {
        return 'foo';
    }

    public function log($message) {
        return $message . "\n";
    }

    public function count() {
        return 10;
    }
}

echo (new Table())->save([]);
echo (new Table())->count();
echo (new Table())->log(' interfaces are awesome.');
