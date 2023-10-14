<?php

abstract class AbstractTaskModel extends AbstractEntity
{
    private int $id;
    private string $name;
    private string $description;
    private bool $isTaskDone;



    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getIsTaskDone(): bool
    {
        return $this->isTaskDone;
    }

    public function setIsTaskDone(bool $isTaskDone): void
    {
        $this->isTaskDone = $isTaskDone;
    }
}