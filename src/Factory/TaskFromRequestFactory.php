<?php

declare(strict_types=1);

namespace HakenHero\Factory;

use HakenHero\Model\Task;
use HakenHero\Serializer\TaskJsonSerializer;

class TaskFromRequestFactory
{
    public static function create(): Task
    {
        return TaskJsonSerializer::deserialize(file_get_contents('php://input'));
    }
}