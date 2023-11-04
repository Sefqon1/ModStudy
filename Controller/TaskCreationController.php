<?php

require 'dependencies.php';



class TaskCreationController
{
    public function index($connection) {
        $databaseConnection = new DatabaseConnection();
        $connection = $databaseConnection->getConnection();
        $taskRepository = new TaskRepository($connection);

        if (isset($_POST['submit'])) {
            $taskName = $_POST['taskName'];
            $taskDescription = $_POST['taskDescription'];
            $dueDate = new DateTime($_POST['dueDate']);
            $task = new ParentTask((int)null, $taskName, $taskDescription, $dueDate, (bool)null);
            if($taskRepository->createTask('parenttask', $task))
                {
                    header('Location: index.php?page=/');
                } else {
                echo 'Didnt work lol';
            }
        }
        require 'View/TaskCreation.php';
     }
}