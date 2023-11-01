<?php
require_once 'dependencies.php';
class HomeController
{
    public function index(): void
    {
        $databaseConnection = new DatabaseConnection();
        $connection = $databaseConnection->getConnection();
        $taskRepository = new TaskRepository($connection);
        $tasks = $taskRepository->getAll('parenttask');
        require 'View/Home.php';
    }
}
