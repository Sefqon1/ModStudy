<?php

class HomeFinishedController
{
    public function index($connection): void
    {
        $taskRepository = new TaskRepository($connection);
        $initialTasks = $taskRepository->getAll('parenttask');
        $tasks = [];
        foreach ($initialTasks as $task) {
            if ($task->getIsTaskDone()) {
                $tasks[] = $task;
            }
        }

        require 'View/HomeFinished.php';
    }
}