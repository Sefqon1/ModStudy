<?php

require 'dependencies.php';

class ParentTask extends AbstractEntity
{
    private string $description;
    private DateTime $dueDate;
    private bool $isTaskDone;
    private array $childTasks = [];

    public function __construct(int $id, string $name, string $description, DateTime $dueDate, bool $isTaskDone)
    {
        parent::__construct($id, $name);
        $this->description = $description;
        $this->dueDate = $dueDate;
        $this->isTaskDone = $isTaskDone;
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

    public function &getChildTasks() {
        return $this->childTasks;
    }

    public function setChildTask($childTasks): void {
        foreach ($childTasks as $childTask) {
            $this->getChildTasks()[] = $childTask;
        }
    }

    public function getChildTasksCount(): int {
        return count($this->getChildTasks());
    }
    public function getDoneChildTasksCount(): int {
        $counter = 0;
        foreach ($this->childTasks as $childTask) {
            if ($childTask->getIsTaskDone()) {
                $counter++;
            }
        }
        return $counter;
    }

}