<?php
require_once 'Model/Repository/DatabaseConnection.php';
require_once 'Model/Interfaces/IEntity.php';
require_once 'Model/Interfaces/IRepository.php';
require_once 'Model/Repository/AbstractRepository.php';
require_once 'Model/Repository/TaskRepository.php';
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
