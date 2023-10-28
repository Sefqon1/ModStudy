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
    foreach ($entities as $entity) {
        echo '
        <div class="task-card">
            <div class="row">
                <input type="checkbox">
                <input type="text" value="' . $entity->getName() . '">
                <input type="date">
            </div>
            <div class="row">
                <!-- Progress bar stand-in -->
                <div class="progress-bar"> Progress Bar</div>
                <button onclick="window.location.href=\'index.php?page=task/' . $entity->getId() . '\'">See More</button>
            </div>
        </div>';
    }
    ?>
</div>

<?php
include('View/Footer.php');
?>
