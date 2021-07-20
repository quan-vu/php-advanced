<?php declare(strict_types=1);

interface DatabaseInterface
{
    public function get(): array;
    public function getById(int $id);
    public function create(array $data): bool;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}