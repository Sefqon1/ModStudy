<?php
include('View/Header.php');
?>
        <div class="content">
            <div class="top-tabs">
                <button class="top-tab" onclick="window.location.href='index.php?page=task'" style="background: deepskyblue; color: #FAF9F6">In Progress</button>
                <button class="top-tab" style="background: lightgreen">Finished</button>
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


