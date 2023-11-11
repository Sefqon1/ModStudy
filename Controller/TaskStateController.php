<?php
class TaskStateController
{
    public function index($connection,$args) {
        $argParts = explode(':', $args);
        $table = $argParts[0];
        $id = $argParts[1];
        echo 'entered index';
        if (isset($_POST['check'])) {
            echo 'entered isset if';
            switch ($table) {
                case 'childtask':
                    $repository = new ChildTaskRepository($connection);
                    $repository->updateState($table, $id);
                    $parentId = $repository->getById($table, $id)->getParentTaskId();
                    header("Location: index.php?page=task/" . $parentId);
                    break;
                case 'parenttask':
                    $repository = new TaskRepository($connection);
                    $repository->updateState($table, $id);
                    header("Location: index.php?page=/");
                    break;
            }
        } else if ($table == 'parenttask') {
            echo '<form method="post">
            <p>Are you sure you want to mark this task as done? This can not be reversed!</p>
            <input type="submit" name="check" value="Yes">
            <a href="index.php?page=/">No</a>
            </form>';
        }
    }
}