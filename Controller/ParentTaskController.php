<?php
require_once 'dependencies.php';

class ParentTaskController
{
    public function index($connection, $id): void
    {
        $taskRepository = new TaskRepository($connection);
        $task = $taskRepository->getById('parenttask', $id);
        require 'View/ParentTask.php';
    }

}