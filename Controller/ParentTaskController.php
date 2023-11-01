<?php
require_once 'dependencies.php';

class ParentTaskController
{
    public function index($id): void
    {
        $databaseConnection = new DatabaseConnection();
        $connection = $databaseConnection->getConnection();
        $taskRepository = new TaskRepository($connection);
        $task = $taskRepository->getById('parenttask', $id);
        require 'View/ParentTask.php';
    }

}