<?php
require 'dependencies.php';
class ChildTaskCreationController
{
    public function index($id) {
        $databaseConnection = new DatabaseConnection();
        $connection = $databaseConnection->getConnection();
        $childTaskRepository = new ChildTaskRepository($connection);

        $parentId = (int)$id;

        if (isset($_POST['submit'])) {
            $taskName = $_POST['taskName'];
            $taskDescription = $_POST['taskDescription'];
            $childTask = new ChildTask((int)null, $taskName, $taskDescription, (int)null, $parentId);
            if($childTaskRepository->createTask('childtask', $childTask))
            {
                header("Location: index.php?page=task/" . $parentId);
            } else {
                echo 'Didnt work lol';
            }
        }
    }

}