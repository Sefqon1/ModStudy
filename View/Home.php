<?php
include('View/Header.php');
?>
<div class="content">
    <div class="top-tabs">
        <button class="top-tab progress active" onclick="window.location.href='index.php?page=/'">In Progress</button>
        <button class="top-tab finished" onclick="window.location.href='index.php?page=finished'">Finished</button>
    </div>
    <?php
    foreach ($tasks as $task) { ?>
        <div class="task-info">
            <div class="row">
                <?php
                $checked = $task->getIsTaskDone() ? 'checked' : '';
                $disabled = $task->getIsTaskDone() ? 'disabled' : '';
                $taskId = $task->getId();
                echo "<form method='POST' action='index.php?page=taskstate/parenttask:$taskId'>";
                echo "<input type='hidden' name='check' value='0'>";
                echo "<input type='checkbox' name='check' value='1' $checked $disabled onclick='this.form.submit()'>";
                echo "</form>";
                ?>
                <input class="form-control" readonly size="35" type="text" value="<?= $task->getName() ?>" style="font-weight: bolder">
                <input class="form-control" readonly type="date" value="<?= $task->getDueDate()->format('Y-m-d') ?>">
            </div>
            <div class="row">
                <div id="progress-bar-<?= $taskId ?>" class="progress-bar">
                    <div id="progress-fill-<?= $taskId ?>" class="progress-fill">0%</div>
                </div>
                <button onclick="window.location.href='index.php?page=task/<?= $task->getId() ?>';">See More</button>
            </div>
        </div>
        <script>
            var total = <?php echo $task->getChildTasksCount() ?>;
            var done = <?php echo $task->getDoneChildTasksCount() ?>;
            var percentage;
            if (total === 0) {
                percentage = 0;
            } else {
                percentage = Math.round((done / total) * 100);
            }
            var progressFill = document.getElementById("progress-fill-<?= $taskId ?>");
            progressFill.style.width = percentage + "%";
            progressFill.innerHTML = percentage + "%";
        </script>
    <?php } ?>
</div>
<footer class="page-footer">
    <button onclick="window.location.href='index.php?page=create/'" class="bottom-tab" >Create</button>
</footer>
</body>


</html>


