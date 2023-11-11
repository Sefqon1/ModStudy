<?php
include('View/Header.php');
?>
<div class="content">
    <div class="top-tabs">
        <button class="top-tab progress" onclick="window.location.href='index.php?page=/'" style="background: deepskyblue; color: #FAF9F6">In Progress</button>
        <button class="top-tab finished active" onclick="window.location.href='index.php?page=finished'" style="background: lightgreen">Finished</button>
    </div>
    <?php
    foreach ($tasks as $task) { ?>
        <div class="task-info">
            <div class="row">
                <?php
                $taskId = $task->getId();
                echo "<input disabled checked type='checkbox' name='check' >"
                ?>
                <input class="form-control" readonly size="35" type="text" value="<?= $task->getName() ?>" style="font-weight: bolder">
                <input class="form-control" readonly type="date" value="<?= $task->getDueDate()->format('Y-m-d') ?>">
            </div>
            <div class="row">
                <div id="progress-bar-<?= $taskId ?>" class="progress-bar">
                    <div id="progress-fill-<?= $taskId ?>" class="progress-fill">100%</div>
                </div>
                <form action="index.php?page=delete/parenttask:<?php echo $taskId ?>" method="post">
                    <input type="submit" name="submit" value="Delete">
                </form>
            </div>
        </div>
        <script>
            percentage = 100;
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



