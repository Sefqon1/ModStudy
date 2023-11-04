<?php
require_once "dependencies.php";
class TaskEditController
{
    public function index($connection,$id): void
    {
        $taskRepository = new TaskRepository($connection);
        $task = $taskRepository->getById('parenttask', $id);
        if (isset($_POST['submit'])) {
            $this->updateTask($taskRepository, $id);
        }


        require 'View/TaskEdit.php';
    }

    public function updateTask($taskRepository, $id) {

        $taskName = $_POST['taskName'];
        $taskDescription = $_POST['taskDescription'];
        $dueDate = new DateTime($_POST['dueDate']);

        $updatedTask = new ParentTask($id, $taskName, $taskDescription, $dueDate, (bool)null);

        if($taskRepository->update('parenttask', $updatedTask))
        {
            header("Location: index.php?page=task/" . $id);
        } else {
            throw new Exception('Editing Task Failed');
        }
    }

}