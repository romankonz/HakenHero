<?php

declare(strict_types=1);

namespace HakenHero\Factory;

use HakenHero\UseCase\UpdateTaskUseCase;

class UpdateTaskUseCaseFactory
{
    public static function create(): UpdateTaskUseCase
    {
        return new UpdateTaskUseCase(
            TaskRepositoryFactory::create()
        );
    }
}