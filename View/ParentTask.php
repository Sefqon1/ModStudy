<?php
include('View/Header.php');
?>

<div class="content"">
    <?php
    $formattedDate = $task->getDueDate()->format('Y-m-d');
    ?>
<div class="task-info">
    <h1><?= $task->getName() ?></h1>
    <hr>
    <p><strong>Due on:</strong> <input readonly type="date" value="<?= $formattedDate ?>"></p>
    <p><strong>Description:</strong> <textarea readonly rows='4' cols='50'><?= $task->getDescription() ?></textarea></p>

    <hr>
</div>
    <h3>Subtasks:</h3>

    <?php
    foreach ($task->getChildTasks() as $childTask) {
        $formattedDate = $task->getDueDate()->format('Y-m-d');
        ?>
        <div class="task-card">
            <div class="row">
                <input type="checkbox">
                <input readonly size="35" type="text" value="<?= $childTask->getName() ?>">
                <hr>
                <textarea readonly rows="2" cols="25"><?= $childTask->getDescription() ?></textarea>
            </div>
            <div class="row">
                <!-- Progress bar stand-in -->
            </div>
        </div>
        <?php
    }
    ?>
</div>






<?php
echo '
<div class="bottom-tabs">
    <button onclick="" class="bottom-tab" style="background: yellow">Edit</button>
    <button onclick="window.location.href=\'index.php?page=delete/' . $task->getId() . '\'" style="background: red; color: white" class="bottom-tab" >Delete</button>

</div>
<!-- Include your PHP logic for repeating elements here -->

<!--<script src="script.js"></script>  You can link your JavaScript file here -->

</body>
</html>
'
?>
