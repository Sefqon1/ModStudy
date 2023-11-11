<?php
require_once 'dependencies.php';
class HomeController
{
    public function index($connection): void
    {
        $taskRepository = new TaskRepository($connection);
        $initialTasks = $taskRepository->getAll('parenttask');
        $tasks = [];
        foreach ($initialTasks as $task) {
            if (!$task->getIsTaskDone()) {
                $tasks[] = $task;
            }
        }

        require 'View/Home.php';
    }
}
