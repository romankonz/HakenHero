<?php

declare(strict_types=1);

namespace HakenHero\UseCase;

use HakenHero\Model\Task;
use HakenHero\Repository\TaskRepository;

class GetTaskUseCase
{

    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function execute(int $id): ?Task
    {
        return $this->taskRepository->fetchOne($id);

    }
}