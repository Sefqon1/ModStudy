<?php
require_once "dependencies.php";
class TaskEditController
{
    public function index($id): void
    {
        $databaseConnection = new DatabaseConnection();
        $connection = $databaseConnection->getConnection();
        $taskRepository = new TaskRepository($connection);
        $task = $taskRepository->getById('parenttask', $id);

        if (isset($_POST['submit'])) {
            $taskName = $_POST['taskName'];
            $taskDescription = $_POST['taskDescription'];
            $dueDate = new DateTime($_POST['dueDate']);
            $updatedTask = new ParentTask($id, $taskName, $taskDescription, $dueDate, (bool)null);
            if($taskRepository->update('parenttask', $updatedTask))
            {
                header("Location: index.php?page=task/" . $id);
            } else {
                echo 'Didnt work lol';
            }
        }


        require 'View/TaskEdit.php';
    }

}