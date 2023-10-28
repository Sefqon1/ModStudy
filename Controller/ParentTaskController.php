<?php
require_once 'Model/Repository/DatabaseConnection.php';
require_once 'Model/Interfaces/IEntity.php';
require_once 'Model/Interfaces/IRepository.php';
require_once 'Model/Repository/AbstractRepository.php';
require_once 'Model/Repository/EntityRepository.php';
require_once 'Model/Repository/TaskRepository.php';

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