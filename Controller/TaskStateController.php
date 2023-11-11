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
                    if (isset($_POST['confirm'])) {
                        $repository = new TaskRepository($connection);
                        $repository->updateState($table, $id);
                        header("Location: index.php?page=/");
                    } else {
                        echo '<form method="post">
                        <p>Are you sure you want to mark this task as complete? This is not reversible!</p>
                        <input type="submit" name="confirm" value="Yes">
                        <a href="index.php?page=/">No</a>
                        </form>';
                    }
                    break;
            }
        }
    }
}

