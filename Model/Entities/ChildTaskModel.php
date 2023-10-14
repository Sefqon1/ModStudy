<?php

class ChildTaskModel extends AbstractTaskModel
{
    private int $id;
    private string $name;
    private string $description;
    private bool $isTaskDone;
    private int $parentTaskId;

    public function __construct(int $id, string $name, string $description, bool $isTaskDone, int $parentTaskId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->isTaskDone = $isTaskDone;
        $this->parentTaskId = $parentTaskId;
    }


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

    public function setParentTaskId(int $parentTaskId): void {
    $this->parentTaskId = $parentTaskId;
}

    public function getParentTaskId(): int
    {
        return $this->parentTaskId;
    }

}