<?php declare(strict_types=1);

require_once 'DatabaseInterface.php';

class MysqlDb implements DatabaseInterface
{
    public function get(): array
    {
        echo "Calling method " . __METHOD__ . PHP_EOL;
        return [];
    }

    public function getById(int $id)
    {
        echo "Calling method " . __METHOD__ . PHP_EOL;
    }

    public function create(array $data): bool
    {
        echo "Calling method " . __METHOD__ . PHP_EOL;
        return true;
    }

    public function update(int $id, array $data): bool
    {
        echo "Calling method " . __METHOD__ . PHP_EOL;
        return true;
    }

    public function delete(int $id): bool
    {
        echo "Calling method " . __METHOD__ . PHP_EOL;
        return true;
    }
}