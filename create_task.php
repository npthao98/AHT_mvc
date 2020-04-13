<?php
// create_user.php
use Models\Task;

require_once "bootstrap.php";

$newUsername = $argv[1];

$task = new Task();
$post = $task
    ->setTitle('test1')
    ->setDescription('test1');
$entity_manager->persist($post);
$entity_manager->flush();
echo "Created User with";
