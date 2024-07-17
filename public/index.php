<?php

declare(strict_types=1);

use HakenHero\Factory\CreateTaskUseCaseFactory;
use HakenHero\Factory\DeleteTaskUseCaseFactory;
use HakenHero\Factory\GetTasksUseCaseFactory;
use HakenHero\Factory\GetTaskUseCaseFactory;
use HakenHero\Factory\TaskFromRequestFactory;
use HakenHero\Factory\TaskRepositoryFactory;
use HakenHero\Factory\UpdateTaskUseCaseFactory;
use HakenHero\Serializer\TaskJsonSerializer;
use HakenHero\Serializer\TasksJsonSerializer;

if (file_exists(__DIR__ . '/' . $_SERVER['REQUEST_URI'])) {
    return false; // serve the requested resource as-is.
}

require_once __DIR__ . '/../vendor/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$taskRepository = TaskRepositoryFactory::create();

if($path === '/api/tasks/' && $method === 'GET') {
   $tasks = GetTasksUseCaseFactory::create()->execute();
   echo TasksJsonSerializer::serialize($tasks);

} elseif($path === '/api/tasks/' && $method === 'POST') {
    $task = TaskFromRequestFactory::create();
    CreateTaskUseCaseFactory::create()->execute($task);
} elseif(preg_match('/\/api\/tasks\/(\d+)/', $path, $matches) && $method === 'GET') {
    $task = GetTaskUseCaseFactory::create()->execute((int) $matches[1]);
    echo TaskJsonSerializer::serialize($task);
} elseif(preg_match('/\/api\/tasks\/(\d+)/', $path, $matches) && $method === 'PUT') {
    $task = TaskFromRequestFactory::create();
    UpdateTaskUseCaseFactory::create()->execute($task);
} elseif(preg_match('/\/api\/tasks\/(\d+)/', $path, $matches) && $method === 'DELETE') {
    DeleteTaskUseCaseFactory::create()->execute((int) $matches[1]);
} else {
    http_response_code(404);
    echo "not found";
}
