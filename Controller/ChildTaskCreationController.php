<?php
require 'dependencies.php';
class ChildTaskCreationController
{
    public function index($connection, $id) {

        if (isset($_POST['submit'])) {
            $this->createTask($connection, $id);
        }

    }

    public function createTask($connection,$id) {

        $childTaskRepository = new ChildTaskRepository($connection);
        $parentId = (int)$id;

        $taskName = $_POST['taskName'];
        $taskDescription = $_POST['taskDescription'];
        $childTask = new ChildTask((int)null, $taskName, $taskDescription, (int)null, $parentId);
        if($childTaskRepository->createTask('childtask', $childTask))
        {
            header("Location: index.php?page=task/" . $parentId);
        } else {
            throw new Exception('Subtask Creation Failed');
        }


    }

}

/*if (isset($_POST['submit'])) {
    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];
    $childTask = new ChildTask((int)null, $taskName, $taskDescription, (int)null, $parentId);
    if($childTaskRepository->createTask('childtask', $childTask))
    {
        header("Location: index.php?page=task/" . $parentId);
    } else {
        echo 'Subtask Creation Failed. :(';
    }
}*/