<?php
require_once 'Model/Repository/DatabaseConnection.php';
require_once 'Model/Interfaces/IEntity.php';
require_once 'Model/Interfaces/IRepository.php';
require_once 'Model/Repository/AbstractRepository.php';
require_once 'Model/Repository/EntityRepository.php';

class ParentTaskController
{
    public function index($id): void
    {
        $databaseConnection = new DatabaseConnection();
        $connection = $databaseConnection->getConnection();
        $entityRepository = new EntityRepository($connection);
        $entity = $entityRepository->getById('entities', $id);
        require 'View/ParentTask.php';
    }

}