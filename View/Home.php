<?php
include('View/Header.php');
?>
        <div class="content">
            <div class="top-tabs">
                <button class="top-tab" onclick="window.location.href='index.php?page=task'" style="background: deepskyblue; color: #FAF9F6">In Progress</button>
                <button class="top-tab" style="background: lightgreen">Finished</button>
            </div>
            <?php
            foreach ($tasks as $task) { ?>
                <div class="task-info">
                    <div class="row">
                        <input type="checkbox">
                        <input class="form-control" readonly size="35" type="text" value="<?= $task->getName() ?>" style="font-weight: bolder">
                        <input class="form-control" readonly type="date" value="<?= $task->getDueDate()->format('Y-m-d') ?>">
                    </div>
                    <div class="row">
                        <!-- Progress bar stand-in -->
                        <div class="progress-bar"> Progress Bar</div>
                        <button onclick="window.location.href='index.php?page=task/<?= $task->getId() ?>';">See More</button>
                    </div>
                </div>
           <?php } ?>
        </div>
    <footer class="page-footer">
        <button onclick="window.location.href='index.php?page=create/'" class="bottom-tab" >Create</button>
    </footer>
    </body>
</html>


