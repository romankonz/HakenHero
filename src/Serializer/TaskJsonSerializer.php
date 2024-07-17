<?php

declare(strict_types=1);

namespace HakenHero\Serializer;

use HakenHero\Model\Task;
use JsonException;

class TaskJsonSerializer
{
    /**
     * @throws JsonException
     */
    public static function serialize(Task $task): string
    {
        return json_encode([
            'id' => $task->getId(),
            'description' => $task->getDescription(),
            'is_done' => $task->isDone(),
        ], JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public static function deserialize(string $json): Task
    {
        $data = json_decode($json, associative: true, flags: JSON_THROW_ON_ERROR);
        return new Task(
            $data['id'] ?? null,
            $data['description'],
            $data['is_done'] ?? false,
        );
    }
}