<?php
include('View/Header.php');
?>

<div class="content">
    <div class="task-info">
        <h2><?= $task->getName() ?></h2>
        <?php
        $checked = $task->getIsTaskDone() ? 'checked' : '';
        $disabled = $task->getIsTaskDone() ? 'disabled' : '';
        $taskId = $task->getId();
        echo "<form method='POST' action='index.php?page=taskstate/parenttask:$taskId'>";
        echo "<input type='hidden' name='check' value='0'>";
        echo "<input type='checkbox' name='check' value='1' $checked $disabled onclick='this.form.submit()'>";
        echo "</form>";
        ?>
        <hr>
        <p><strong>Due on:</strong> <input readonly class="form-control" type="date" value="<?= $task->getDueDate()->format('Y-m-d'); ?>"></p>
        <p><strong>Description:</strong> <textarea readonly class="form-control" rows='4' cols='50'><?= $task->getDescription() ?></textarea></p>
        <hr>
        <div id="progress-bar" class="progress-bar">
            <div id="progress-fill" class="progress-fill">0%</div>
        </div>
    </div>
        <h3><?= $task->getChildTasksCount() ?> Subtasks:</h3>
        <?php
        foreach ($task->getChildTasks() as $childTask) {
            ?>
            <div class="task-info">
                <div class="row">
                    <?php
                    $checked = $childTask->getIsTaskDone() ? 'checked' : '';
                    $childTaskId = $childTask->getId();
                    echo "<form method='POST' action='index.php?page=taskstate/childtask:$childTaskId'>";
                    echo "<input type='hidden' name='check' value='0'>";
                    echo "<input type='checkbox' name='check' value='1' $checked onclick='this.form.submit()'>";
                    echo "</form>";

                    ?>
                    <input readonly size="35" type="text" value="<?= $childTask->getName() ?>">
                    <hr>
                    <textarea readonly rows="2" cols="25"><?= $childTask->getDescription() ?></textarea>
                </div>
                <form action="index.php?page=delete/childtask:<?php echo $childTask->getId();?>" method="post">
                    <input type="submit" name="submit" value="Delete">
                </form>
            </div>
            <?php } ?>
    <div class="task-info">
        <form action="index.php?page=childtask/<?php echo $task->getId();?>\" method="post">
            <h5>Add new Subtask:</h5>
            <div class="row">
            <label for="taskName">Subtask:</label>
            <input type="text" class="form-control" id="taskName" name="taskName" required>
            </div>
            <div class="row">
                <label for="taskDescription">Description:</label>
                <input type="text" class="form-control" id="taskDescription" name="taskDescription">
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</div>


    <footer class="page-footer">
            <button onclick="window.location.href='index.php?page=edit/<?php echo $task->getId();?>'" class="bottom-tab" style="background: yellow">Edit</button>
            <button onclick="window.location.href='index.php?page=delete/parenttask:<?php echo $task->getId();?>'" style="background: red; color: white" class="bottom-tab" >Delete</button>
    </footer>
    </body>
    <script>
        var total = <?php echo $task->getChildTasksCount() ?>;
        var done = <?php echo $task->getDoneChildTasksCount() ?>;
        var percentage;
        if (total === 0) {
            percentage = 0;
        } else {
            percentage = Math.round((done / total) * 100);
        }
        var progressFill = document.getElementById("progress-fill");
        progressFill.style.width = percentage + "%";
        progressFill.innerHTML = percentage + "%";

    </script>

    </html>
