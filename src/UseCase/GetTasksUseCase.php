<?php

declare(strict_types=1);

namespace HakenHero\UseCase;

use HakenHero\Repository\TaskRepository;

class GetTasksUseCase
{
    public function __construct(
        private readonly TaskRepository $taskRepository
    )
    {
    }

    public function execute(): array
    {
        return $this->taskRepository->fetchAll();
    }
}