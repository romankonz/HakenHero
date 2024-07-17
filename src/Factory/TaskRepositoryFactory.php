<?php

declare(strict_types=1);

namespace HakenHero\Factory;

use HakenHero\Repository\TaskRepository;

class TaskRepositoryFactory
{
    public static function create(): TaskRepository
    {
        return new TaskRepository(
            new \PDO('mysql:host=mariadb;dbname=hakenhero', 'hakenhero', 'hakenhero')
        );
    }
}