<?php

declare(strict_types=1);

namespace HakenHero\Factory;

use HakenHero\UseCase\GetTaskUseCase;

class GetTaskUseCaseFactory
{
    public static function create(): GetTaskUseCase
    {
        return new GetTaskUseCase(
            TaskRepositoryFactory::create()
        );
    }
}