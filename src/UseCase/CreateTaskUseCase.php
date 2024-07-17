<?php

declare(strict_types=1);

namespace HakenHero\UseCase;

use HakenHero\Model\Task;
use HakenHero\Repository\TaskRepository;

class CreateTaskUseCase
{
    public function __construct(
        private readonly TaskRepository $taskRepository
    )
    {
    }

    public function execute(Task $task): void
    {
        $this->taskRepository->create($task);
    }
}