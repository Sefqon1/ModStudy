<?php
require_once 'Model/Repository/DatabaseConnection.php';
require_once 'Model/Interfaces/IEntity.php';
require_once 'Model/Interfaces/IRepository.php';
require_once 'Model/Repository/AbstractRepository.php';
require_once 'Model/Repository/EntityRepository.php';
require_once 'Model/Repository/TaskRepository.php';
class DeletionController
{
    public function index($id) {

        $databaseConnection = new DatabaseConnection();
        $connection = $databaseConnection->getConnection();
        $taskRepository = new TaskRepository($connection);
        $taskRepository->delete('parenttask', $id);
    }

}

