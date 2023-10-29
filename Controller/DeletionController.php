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

        if (isset($_POST['confirm'])) {
            $taskRepository->delete('parenttask', $id);
            header('Location: index.php?page=/');
            exit();
        } else {
            echo '<form method="post">
        <p>Are you sure you want to delete this task?</p>
        <input type="submit" name="confirm" value="Yes">
        <a href="index.php?page=/">No</a>
    </form>';
        }


    }

}

