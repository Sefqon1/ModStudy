<?php

class TaskStateController
{
    public function index($connection,$args) {
        $argParts = explode(':', $args);
        $table = $argParts[0];
        $id = $argParts[1];
        if (isset($_POST['check'])) {
            switch ($table) {
                case 'childtask':
                    $repository = new ChildTaskRepository($connection);
                    $repository->updateState($table, $id);
                    $parentId = $repository->getById($table, $id)->getParentTaskId();
                    header("Location: index.php?page=task/" . $parentId);
                    break;
                case 'parenttask':


                    break;
            }
        }
    }

}