<?php

declare(strict_types=1);

namespace HakenHero\Serializer;

use HakenHero\Model\Task;
use JsonException;

class TasksJsonSerializer
{
    /**
     * @param Task[] $tasks
     * @throws JsonException
     */
    public static function serialize(array $tasks): string
    {
        $tasksAsString =  array_map(
                static fn(Task $task) => TaskJsonSerializer::serialize($task),
                $tasks
            );
        return "[" . implode(",", $tasksAsString) . "]";
    }

    /**
     * @return Task[]
     * @throws JsonException
     */
    public static function deserialize(string $json): array
    {
        $data = json_decode($json, associative: true, flags: JSON_THROW_ON_ERROR);
        return array_map(
            static fn(array $task) => TaskJsonSerializer::deserialize($task),
            $data
        );
    }
}