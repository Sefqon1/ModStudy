<?php
require_once 'Model/Repository/DatabaseConnection.php';
require_once 'Model/Interfaces/IEntity.php';
require_once 'Model/Interfaces/IRepository.php';
require_once 'Model/Repository/AbstractRepository.php';
require_once 'Model/Repository/EntityRepository.php';
class ParentTaskController
{
    public function index(): void
    {
        $databaseConnection = new DatabaseConnection();
        $connection = $databaseConnection->getConnection();
        $entityRepository = new EntityRepository($connection);
        $entities = $entityRepository->getAll('entities');
        foreach ($entities as $entity) {
            echo "ID: {$entity->getId()}, Name: {$entity->getName()}\n";
        }
        $entity = $entityRepository->getById('entities', 1);
        echo "This is a the single entity:  {$entity->getId()}, Name: {$entity->getName()}";

        require 'View/ParentTask.php';
    }

}