<?php

require_once 'Application.php';
require_once 'MysqlDb.php';
require_once 'SqliteDb.php';
require_once 'RESTDb.php';

// Only change happends here
$app = new Application(
    // new MysqlDb()
    new SqliteDb
    // new RESTDb()
);

$app->db->get();
$app->db->getById(1);
$app->db->create([]);
$app->db->update(1, []);
$app->db->delete(1);

// Run app
// php index.php