<?php

declare(strict_types=1);

namespace HakenHero\Factory;

use HakenHero\UseCase\DeleteTaskUseCase;

class DeleteTaskUseCaseFactory
{
    public static function create(): DeleteTaskUseCase
    {
        return new DeleteTaskUseCase(
            TaskRepositoryFactory::create()
        );
    }
}