<?php

require 'dependencies.php';
class TaskCreationController
{
    public function index($connection) {
        if (isset($_POST['submit'])) {
            $this->createTask($connection);
        }
        require 'View/TaskCreation.php';
     }
     public function createTask($connection) {
         $taskRepository = new TaskRepository($connection);
         $taskName = $_POST['taskName'];
         $taskDescription = $_POST['taskDescription'];
         $dueDate = new DateTime($_POST['dueDate']);
         $task = new ParentTask((int)null, $taskName, $taskDescription, $dueDate, (bool)null);
         if($taskRepository->createTask('parenttask', $task))
         {
             header('Location: index.php?page=/');
         } else {
             throw new Exception('Task Creation Failed');
         }

     }
}