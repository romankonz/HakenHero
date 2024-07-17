<?php

declare(strict_types=1);

namespace HakenHero\Factory;

use HakenHero\UseCase\GetTasksUseCase;

class GetTasksUseCaseFactory
{
    public static function create(): GetTasksUseCase
    {
        return new GetTasksUseCase(
            TaskRepositoryFactory::create()
        );
    }
}