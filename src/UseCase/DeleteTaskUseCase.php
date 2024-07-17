<?php

declare(strict_types=1);

namespace HakenHero\UseCase;

use HakenHero\Repository\TaskRepository;

class DeleteTaskUseCase
{
    public function __construct(
        private readonly TaskRepository $taskRepository
    )
    {
    }

    public function execute(int $id): void
    {
        $this->taskRepository->delete($id);
    }
}