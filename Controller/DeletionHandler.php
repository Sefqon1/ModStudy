<?php
require_once 'dependencies.php';
class DeletionHandler
{
    public function index($connection,$args) {


        $argParts = explode(':', $args);
        $table = $argParts[0];
        $id = $argParts[1];



        if (isset($_POST['confirm'])) {
            switch ($table) {
                case 'childtask':
                    $repository = new ChildTaskRepository($connection);
                    $childTask = $repository->getById($table, $id);
                    $parentId = $childTask->getParentTaskId();
                    $repository->delete($table, $id);
                    header("Location: index.php?page=task/" . $parentId);
                    exit();
                case 'parenttask':
                    $repository = new TaskRepository($connection);
                    $repository->delete($table, $id);
                    header('Location: index.php?page=/');
                    exit();
            }
        } else {
            echo '<form method="post">
        <p>Are you sure you want to delete this task?</p>
        <input type="submit" name="confirm" value="Yes">
        <a href="index.php?page=/">No</a>
    </form>';
        }
    }

}

