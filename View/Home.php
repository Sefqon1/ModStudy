<?php
include('View/Header.php');
?>

<div class="content">
    <div class="top-tabs">
        <button class="top-tab" onclick="window.location.href='View/TaskEdit.php'" style="background: lightblue">To Do</button>
        <button class="top-tab" onclick="window.location.href='index.php?page=task'" style="background: deepskyblue; color: #FAF9F6">In Progress</button>
        <button class="top-tab" style="background: lightgreen">Finished</button>
    </div>

    <?php
    foreach ($tasks as $task) {
        $formattedDate = $task->getDueDate()->format('Y-m-d');
        echo '
        <div class="task-card">
            <div class="row">
                <input type="checkbox">
                <input readonly size="35" type="text" value="' . $task->getName() . '">
                <input readonly type="date" value="'. $formattedDate . '">
            </div>
            <div class="row">
                <!-- Progress bar stand-in -->
                <div class="progress-bar"> Progress Bar</div>
                <button onclick="window.location.href=\'index.php?page=task/' . $task->getId() . '\'">See More</button>
            </div>
        </div>';
    }
    ?>
</div>

<?php
include('View/Footer.php');
?>
