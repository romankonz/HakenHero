<?php

declare(strict_types=1);

namespace HakenHero\Repository;

use HakenHero\Model\Task;
use PDO;

class TaskRepository
{
        public function __construct(private PDO $pdo)
        {

        }

    public function fetchAll(): array
        {
            $tasks = [];

            $statement = $this->pdo->query('SELECT id, description, is_done FROM task');

            while ($row = $statement->fetch()) {
                $tasks[] = new Task(
                    $row['id'],
                    $row['description'],
                    (bool) $row['is_done']
                );
            }

            return $tasks;
        }

        public function fetchOne(int $id): ?Task
        {
            $statement = $this->pdo->prepare('SELECT id, description, is_done FROM task WHERE id = :id');
            $statement->execute(['id' => $id]);
            $row = $statement->fetch();

            if ($row === false) {
                return null;
            }

            return new Task(
                $row['id'],
                $row['description'],
                (bool) $row['is_done']
            );
        }

        public function create(Task $task): void
        {
            $statement = $this->pdo->prepare('INSERT INTO task (description, is_done) VALUES (:description, :is_done)');
            $statement->execute([
                'description' => $task->getDescription(),
                'is_done' => $task->isDone()? 1 : 0
            ]);
        }

        public function update(Task $task): void
        {
            $statement = $this->pdo->prepare('UPDATE task SET description = :description, is_done = :is_done WHERE id = :id');
            $statement->execute([
                'id' => $task->getId(),
                'description' => $task->getDescription(),
                'is_done' => $task->isDone()? 1 : 0
            ]);
        }

        public function delete(int $id): void
        {
            $statement = $this->pdo->prepare('DELETE FROM task WHERE id = :id');
            $statement->execute(['id' => $id]);
        }
}