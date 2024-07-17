<?php

declare(strict_types=1);

namespace HakenHero\Factory;

use HakenHero\UseCase\CreateTaskUseCase;

class CreateTaskUseCaseFactory
{
    public static function create(): CreateTaskUseCase
    {
        return new CreateTaskUseCase(
            TaskRepositoryFactory::create()
        );
    }
}