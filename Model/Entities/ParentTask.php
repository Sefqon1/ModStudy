<?php

class ParentTask extends Entity
{
    private int $id;
    private string $name;
    private string $description;
    private $dueDate;
    private bool $isTaskDone;
    private array $childTasks = [];

    public function __construct(int $id, string $name, string $description, $dueDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->dueDate = $dueDate;
        $this->isTaskDone = false;
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

    public function getDueDate() {
        return $this->dueDate;
    }

    public function setDueDate($dueDate) {
        $this->dueDate = $dueDate;
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