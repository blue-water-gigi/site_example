<?php
declare(strict_types=1);

$config = require __DIR__ . '/../../config.php';
$db = new Database($config['database']);


$notes = $db->query('select * from notes where user_id = 1')->findAll();
//dd($notes);

require __DIR__ . '/../../views/notes/index.view.php';