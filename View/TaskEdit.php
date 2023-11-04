<?php
include('View/Header.php');
?>

<div class="content">
    <div class="task-info">
        <form action="index.php?page=edit/<?php echo $task->getId();?>" method="post">
            <div>
                <label for="taskName">Task:</label>
                <input type="text" class="form-control" id="taskName" name="taskName" value="<?= $task->getName(); ?>" >
            </div>
            <div>
                <label for="taskDescription">Description:</label>
                <input type="text" class="form-control" id="taskDescription" name="taskDescription" value="<?= $task->getDescription(); ?>">
            </div>
            <div>
                <label for="dueDate">Due Date:</label>
                <input type="date" class="form-control" id="dueDate" name="dueDate" value="<?= $formattedDate = $task->getDueDate()->format('Y-m-d');?>" >
            </div>
                <div class="bottom-tabs">
                <input type="submit" name="submit" value="Update" class="bottom-tab">
                <button onclick="window.location.href='index.php?page=/'" class="bottom-tab" >Cancel</button>
                </div>
        </form>
    </div>
</div>
</body>
</html>