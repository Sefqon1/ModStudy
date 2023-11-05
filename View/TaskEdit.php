<?php
include('View/Header.php');
?>

<div class="content">
    <div class="task-info">
        <form action="index.php?page=edit/<?php echo $task->getId();?>" method="post">
                <div>
                <label for="taskName"><strong>Task:</strong></label>
                <input type="text" class="form-control" id="taskName" name="taskName" value="<?= $task->getName(); ?>" >
            </div>
            <div>
                <label for="taskDescription"><strong>Description:</strong></label>
                <textarea class="form-control form-control-large" id="taskDescription" name="taskDescription"><?= $task->getDescription(); ?></textarea>
            </div>
            <div>
                <label for="dueDate"><strong>Date:</strong></label>
                <input type="date" class="form-control" id="dueDate" name="dueDate" value="<?= $formattedDate = $task->getDueDate()->format('Y-m-d');?>" >
            </div>
        </div>
    </div>
    <footer class="page-footer">
        <input type="submit" name="submit" value="Update" class="bottom-tab">
        <button onclick="window.location.href='index.php?page=/'" class="bottom-tab" >Cancel</button>
    </footer>
</form>
</body>
</html>