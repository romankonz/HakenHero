<?php

declare(strict_types=1);

namespace HakenHero\Model;

use DateTime;

class Task
{

    public function __construct(
        private readonly ?int $id,
        private string $description,
        private bool $isDone = false,
    )
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }


}
