<?php
include('View/Header.php');
?>

    <div class="content">
        <div class="task-info">
            <form action="index.php?page=create/\" method="post">
                <div>
                <label for="taskName">Task:</label>
                <input type="text" class="form-control" id="taskName" name="taskName" required>
                </div>
                <div>
                <label for="taskDescription">Description:</label>
                <input type="text" class="form-control" id="taskDescription" name="taskDescription">
                </div>
                <div>
                <label for="dueDate">Due Date:</label>
                <input type="date" class="form-control" id="dueDate" name="dueDate" required>
                </div>
                <div class="bottom-tabs">
                <input type="submit" name="submit" value="Submit" class="bottom-tab">
                <button onclick="window.location.href='index.php?page=/'" class="bottom-tab" >Cancel</button>
            </form>
        </div>
    </div>
    </body>
</html>


