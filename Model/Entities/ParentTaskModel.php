<?php

class ParentTaskModel extends AbstractTaskModel
{

    private int $id;
    private string $name;
    private string $description;
    private bool $isTaskDone;
    private array $childTasks = [];

    public function __construct(int $id, string $name, string $description, bool $isTaskDone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->isTaskDone = $isTaskDone;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getIsTaskDone(): bool {
        return $this->isTaskDone;
    }

    public function setIsTaskDone(bool $isTaskDone): void {
        $this->isTaskDone = $isTaskDone;
    }

    public function getChildTasks(): array {
        return $this->childTasks;
    }

    public function setChildTask($childTask): void {
        $this->getChildTasks()[] = $childTask;
    }

    public function getChildTasksCount(): int {
        return count($this->getChildTasks());
    }


}